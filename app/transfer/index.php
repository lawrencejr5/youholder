<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">

    <title>Money Transfer | Yield Fiancial Services</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- end css -->

    <!-- favicon -->
    <link rel="shortcut icon" href="/youholder/public/logos/favicon.png">

    <!-- theme-color -->
    <meta name="theme-color" content="#130e80" />

    <script>
        'use strict';
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        if (localStorage.getItem('dark') === '1') {
            document.documentElement.classList.add('dark');
        }

        if (localStorage.getItem('lang') == 'ar') {
            document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
            document.querySelector("html").setAttribute("dir", "rtl");
        } else {
            document.querySelector("html").removeAttribute("dir", "rtl");
        }
    </script>
</head>

<body>

    <!-- sidebar section -->
    <!-- Sidebar Start -->
    <?php $page = "transfer"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 shadow" id="sendMoneyCreate">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Send Money</p>
                        <p class="mb-0 text-center f-18 gilroy-medium text-dark dark-5B mt-2">Start Transfer</p>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20">Enter your recipients email address &amp; then add an amount with currency. You can also provide a note for reference.</p>

                        <form method="post" action="" id="sendMoneyCreateForm">
                            <input type="hidden" id="uid">
                            <input type="hidden" id="from">
                            <input type="hidden" id="to">
                            <input type="hidden" value="" id="wallet_id">
                            <input type="hidden" value="<?= $uID ?>" id="myUid">
                            <input type="hidden" id="profile_pic">
                            <input type="hidden" value="" id="balance">

                            <!-- Recipient -->
                            <div class="mt-28 label-top">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15">Recipient</label>
                                <input type="text" class="form-control input-form-control apply-bg" name="receiver" id="receiver" value="" placeholder="Please enter valid account no (ex: yf-user001234567)" onkeyup="fetchUsers()">
                                <span class="receiverError custom-error"></span>
                            </div>
                            <p class="mb-0 text-gray-100 gilroy-regular f-12 mt-2"><em id="username"></em></p>
                            <!-- Currency -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="param-ref mt-20">
                                        <label class="gilroy-medium text-gray-100 mb-2 f-15">Wallet</label>
                                        <select class="select2" data-minimum-results-for-search="Infinity" name="wallet" id="wallet">
                                            <option value="">Select Wallet</option>
                                            <?php foreach ($data['user_wallets'] as $w) {
                                                $data['total_deposits'] = $modules->getTotalDeposits($uID, $w['wallet_name']);
                                                $data['total_withdrawals'] = $modules->getTotalWithdrawals($uID, $w['wallet_name']);
                                                foreach ($data['total_deposits'] as $td) {
                                                    foreach ($data['total_withdrawals'] as $tw) {

                                            ?>
                                                        <option data-wid="<?= $w['wallet_id'] ?>" data-bal="<?= $td['amount'] - $tw['amount'] ?>" value="<?= $w['wallet_name'] ?>"><?= $w['wallet_name'] . ' - ' . $td['amount'] - $tw['amount'] ?></option>
                                            <?php }
                                                }
                                            } ?>
                                        </select>
                                        <span id="walletlHelp" class="mb-0 text-gray-100 dark-B87 gilroy-regular f-12 mt-2">
                                            Fee (<span id="formattedFeesPercentage">0.00</span>%+<span id="formattedFeesFixed">0.00</span>)&nbsp;Total Fee:&nbsp;<span id="formattedTotalFees">0.00</span>
                                        </span>
                                    </div>
                                </div>

                                <!-- Amount -->
                                <div class="col-md-6">
                                    <div class="label-top mt-20">
                                        <label class="gilroy-medium text-gray-100 mb-2 f-15">Amount</label>
                                        <input type="number" class="form-control input-form-control apply-bg l-s2" name="amount" id="amount" placeholder="0.00" value="">

                                        <label class="custom-error amount-limit-error"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15" for="floatingTextarea">Note</label>
                                <textarea class="form-control l-s0 input-form-control h-100p" id="note" name="note" required data-value-missing="This field is required."></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="button" class="btn btn-lg btn-primary mt-4" id="transferBtn">
                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <span class="px-1" id="sendMoneyCreateSubmitBtnText">Proceed</span>
                                    <span id="sendMoneySvgIcon"><svg class="position-relative ms-1 rtl-wrap-one nscaleX-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.11648 12.216C3.81274 11.9123 3.81274 11.4198 4.11648 11.1161L8.23317 6.99937L4.11648 2.88268C3.81274 2.57894 3.81274 2.08647 4.11648 1.78273C4.42022 1.47899 4.91268 1.47899 5.21642 1.78273L9.88309 6.4494C10.1868 6.75314 10.1868 7.2456 9.88309 7.54934L5.21642 12.216C4.91268 12.5198 4.42022 12.5198 4.11648 12.216Z" fill="currentColor" />
                                        </svg></span>
                                    </a>
                            </div>
                        </form>
                    </div>
                    <!-- main-containt -->

                </div>
            </div>
        </div>

        <!-- footer -->
        <footer class="d-flex align-items-center justify-content-between bg-white w-100 px-4 footer-sec">
            <div class="res-order d-flex align-items-center">
                <p class="mb-0 gilroy-medium">Copyright &copy; 2024&nbsp;<a href="https://demo.paymoney.techvill.net" class="link-text">Pay Money</a>&nbsp;|&nbsp;All Rights Reserved.</p>
                <span class="d-none">4.1.1</span>
            </div>
            <div class="d-flex f-link align-items-center">
                <div>
                    <div class="d-flex align-items-center text-gray-100 f-13 blink-w sp" id="select_language">
                        <div class="form-group selectParent f-13">
                            <select class="select2 form-control f-13 mb-2n" data-minimum-results-for-search="Infinity" id="select-height">
                                <option class="f-13 gilroy-medium" selected value='en'>English</option>
                                <option class="f-13 gilroy-medium" value='ar'>عربى</option>
                                <option class="f-13 gilroy-medium" value='fr'>Français</option>
                                <option class="f-13 gilroy-medium" value='pt'>Português</option>
                                <option class="f-13 gilroy-medium" value='ru'>Русский</option>
                                <option class="f-13 gilroy-medium" value='es'>Español</option>
                                <option class="f-13 gilroy-medium" value='tr'>Türkçe</option>
                                <option class="f-13 gilroy-medium" value='ch'>中文 (繁體)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </footer> <!-- end footer -->

    </div>

    <!-- js -->
    <script src="../public/dist/libraries/jquery-3.6.1/jquery-3.6.1.min.js"></script>
    <script src="../public/dist/libraries/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../public/dist/plugins/select2-4.1.0-rc.0/js/select2.min.js"></script>
    <script src="../public/user/templates/js/chart.umd.min.js"></script>
    <script src="../public/user/templates/js/main.min.js"></script>
    <script src="../public/user/customs/js/common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script>
        const fetchUsers = async () => {
            const username = document.querySelector('#username')
            username.innerHTML = 'Searching user....'
            const url = 'http://localhost/youholder/app/backend/api/users.php';
            try {
                const res = await fetch(url);
                const data = await res.json();
                const {
                    users
                } = data
                const receiver = document.querySelector('#receiver').value
                const uid = document.querySelector('#uid')
                const from = document.querySelector('#from')
                const to = document.querySelector('#to')
                const profile_pic = document.querySelector('#profile_pic')
                const singleUser = users.find((user) => user.account_no === receiver)
                uid.value = singleUser.id
                from.value = `From: <?= $fullname ?>`
                to.value = `To: ${singleUser.fname} ${singleUser.lname}`
                username.innerHTML = `${singleUser.fname} ${singleUser.lname}`;
                profile_pic.value = singleUser.profile_pic
            } catch (err) {
                return err;
            }
        }
        const selection = document.querySelector('#wallet')
        selection.onchange = function(event) {
            const wid = event.target.options[event.target.selectedIndex].dataset.wid;
            const bal = event.target.options[event.target.selectedIndex].dataset.bal;
            document.querySelector('#wallet_id').value = wid
            document.querySelector('#balance').value = bal
        };
        const transferBtn = document.querySelector('#transferBtn')
        transferBtn.addEventListener('click', () => {
            transferBtn.innerHTML = '......'
            const uid = document.querySelector('#uid').value
            const myuid = document.querySelector('#myUid').value
            const bal = document.querySelector('#balance').value
            const wallet_id = document.querySelector('#wallet_id').value
            const receiver = document.querySelector('#receiver').value
            const wallet_name = document.querySelector('#wallet').value
            const amount = document.querySelector('#amount').value
            const note = document.querySelector('#note').value
            const from = document.querySelector('#from').value
            const to = document.querySelector('#to').value
            const profile_pic = document.querySelector('#profile_pic').value
            if (!amount || !wallet || !receiver) {
                toastr.error("All fields are required to proceed", "Required", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                transferBtn.innerHTML = 'Proceed'
            } else if (!to) {
                toastr.error("User does not exist", "Required", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                transferBtn.innerHTML = 'Proceed'
            } else if (from == to) {
                toastr.error("You cannot make a transfer to yourself", "Error", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                transferBtn.innerHTML = 'Proceed'
            } else if (parseFloat(amount) > parseFloat(bal)) {
                toastr.error("You dont have up to that", "Error", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                transferBtn.innerHTML = 'Proceed'
            } else {
                $.ajax({
                    url: '../backend/actions/makeTransfer.php',
                    dataType: 'json',
                    type: 'post',
                    data: {
                        uid,
                        myuid,
                        amount,
                        wallet_id,
                        note,
                        wallet_name,
                        receiver,
                        from,
                        to
                    },
                    success: (res) => {
                        if (res.msg == 'sent') {
                            setTimeout(() => {
                                window.location = `./sent.php?p=${profile_pic}&i=${uid}&r=${receiver}&a=${amount}&w=${wallet_name}`
                            }, 1000)
                        } else {
                            toastr.error("An error occured", "Error", {
                                positionClass: "toast-top-center",
                                timeOut: 5e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1
                            })
                            console.log(res.header);
                        }
                    }
                })
            }
        })
    </script>

    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        $(document).ready(function() {
            $("#select_language").on("change", function() {
                if ($("#select_language select").val() == 'ar') {
                    localStorage.setItem('lang', 'ar');
                    let lang = $("#select_language select").val();

                    $.ajax({
                        type: 'get',
                        url: 'https://demo.paymoney.techvill.net/change-lang',
                        data: {
                            lang: lang
                        },
                        success: function(msg) {
                            if (msg == 1) {
                                location.reload();
                                $("html").attr("dir", "rtl");
                            }
                        }
                    });

                } else {
                    let lang = $("#select_language select").val();
                    $.ajax({
                        type: 'get',
                        url: 'https://demo.paymoney.techvill.net/change-lang',
                        data: {
                            lang: lang
                        },
                        success: function(msg) {
                            if (msg == 1) {
                                location.reload()
                                localStorage.setItem('lang', lang);
                                $("html").removeAttr("dir", "rtl");
                            }
                        }
                    });
                }
            });
        });
    </script>


    <script src="../public/dist/plugins/html5-validation-1.0.0/validation.min.js"></script>
    <script src="../public/dist/plugins/debounce-1.1/jquery.ba-throttle-debounce.min.js"></script>

    <script type="text/javascript">
        'use strict';
        let token = $('[name="_token"]').val();
        let processedBy = "email";
        let transactionTypeId = "3";
        let placeHolder = "Please enter valid :x";
        let validEmailMessage = placeHolder.replace(':x', 'email (ex: user@gmail.com)');
        let validPhoneMessage = placeHolder.replace(':x', 'phone (ex: +12015550123)');
        let validEmailOrPhoneMessage = placeHolder.replace(':x', 'email (ex: user@gmail.com) or phone (ex: +12015550123)');
        let lowBalanceText = "Not have enough balance !";
        let receiverStatusUrl = "https://demo.paymoney.techvill.net/transfer-user-email-phone-receiver-status-validate";
        let checkAmountLimitUrl = "https://demo.paymoney.techvill.net/amount-limit";
        let submitBtnText = 'Processing...';
    </script>
    <script src="../public/user/customs/js/send-money.min.js"></script>
    <!-- end js -->

</body>

</html>