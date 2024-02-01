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

    <title>Payout | Pay Money</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- end css -->

    <!-- favicon -->
    <link rel="shortcut icon" href="../public/uploads/logos/1530689937_favicon.png">

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
    <?php $page = "withdraw"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 shadow" id="withdrawalCreate">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Withdraw Money</p>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20">
                            Accumulated wallet funds can simply be withdrawn at any time, to your crypto wallet address
                        </p>
                        <form id="withdrawalCreateForm">
                            <input type="hidden" value="" id="wallet_id">
                            <input type="hidden" value="<?= $uID ?>" id="uid">
                            <input type="hidden" value="" id="balance">
                            <!-- Payment Methods -->
                            <div class="mt-28 param-ref">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15">Wallet</label>
                                <div class="avoid-blink">
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
                                </div>
                            </div>



                            <!-- Amount -->
                            <div class="label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15">Address</label>
                                <input class="form-control input-form-control apply-bg l-s2" name="crypto_address" type="text" placeholder="Crypto address" id="address" value="">
                            </div>
                            <p class="mb-0 gilroy-medium f-12 mob-f-12 mt-select-to-p text-gray-100" id="walletHelp">...Mind you that the address must match with the wallet selected, e.g. Btc wallet, Btc address, if not, please go to the exchange and convert to your desired currency.</p>


                            <!-- Amount -->
                            <div class="label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15">Amount</label>
                                <input class="form-control input-form-control apply-bg l-s2" name="amount" id="amount" value="">
                            </div>

                            <span class="amountLimit text-danger" id="amountLimit"></span>
                            <div class="form-group d-none" id="bank">
                                <span id="withdrawalMethodInfo"></span>
                            </div>
                            <div class="d-grid">
                                <button type="button" id="withdraw" class="btn btn-lg btn-primary mt-4">
                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <span class="px-1" id="withdrawalCreateSubmitBtnText">Continue</span>
                                    <span id="withdrawalSvgIcon"><svg class="position-relative ms-1 rtl-wrap-one nscaleX-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.11648 12.216C3.81274 11.9123 3.81274 11.4198 4.11648 11.1161L8.23317 6.99937L4.11648 2.88268C3.81274 2.57894 3.81274 2.08647 4.11648 1.78273C4.42022 1.47899 4.91268 1.47899 5.21642 1.78273L9.88309 6.4494C10.1868 6.75314 10.1868 7.2456 9.88309 7.54934L5.21642 12.216C4.91268 12.5198 4.42022 12.5198 4.11648 12.216Z" fill="currentColor" />
                                        </svg></span>
                                </button>
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
        const selection = document.querySelector('#wallet')
        selection.onchange = function(event) {
            const wid = event.target.options[event.target.selectedIndex].dataset.wid;
            const bal = event.target.options[event.target.selectedIndex].dataset.bal;
            document.querySelector('#wallet_id').value = wid
            document.querySelector('#balance').value = bal
        };

        const withdraw = document.querySelector('#withdraw')
        withdraw.addEventListener('click', () => {
            withdraw.innerHTML = "...."
            const uid = document.querySelector('#uid').value;
            const wallet_name = document.querySelector('#wallet').value
            const wallet_id = document.querySelector('#wallet_id').value
            const address = document.querySelector('#address').value
            let amount = document.querySelector('#amount').value
            amount = parseFloat(amount)
            let bal = document.querySelector('#balance').value
            bal = parseFloat(bal)
            if (!amount || !wallet_name || !address) {
                toastr.error("All fields are required", "Required", {
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
                withdraw.innerHTML = "Continue"
            } else if (amount > bal) {
                toastr.error("Your wallet balance is not up to amount requested", "Error", {
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
                withdraw.innerHTML = "Continue"
            } else {
                $.ajax({
                    url: '../backend/actions/addWithdrawal.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        uid,
                        wallet_name,
                        wallet_id,
                        address,
                        amount
                    },
                    success: (res) => {
                        if (res.header == 'good') {
                            toastr.success("Your withdrawal request has been sent", "Successful", {
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
                        }
                        setTimeout(() => {
                            window.location = `./requested.php?wallet=${wallet_name}&amt=${amount}&address=${address}`
                        }, 1500)
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

    <!-- <script src="../public/dist/plugins/html5-validation-1.0.0/validation.min.js"></script>
    <script src="../public/dist/plugins/debounce-1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script src="../public/dist/libraries/sweetalert/sweetalert-unpkg.min.js"></script> -->
    <!-- end js -->

</body>

</html>