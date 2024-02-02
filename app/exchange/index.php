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
    <meta name="csrf-token" content="qb1QM8RsLbLH2VAZWJopBTfxWK5gnxizsKMLjfI7">

    <title>Money Exchange | Pay Money</title>

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
    <?php $page = "exchange"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 pt-62 shadow" id="exchangeMoneyCreate">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Exchange Money</p>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20">Exchange currencies from the comfort of your home, quickly, safely with a minimal fees.Select the wallet &amp; put the amount you want to exchange.</p>

                        <form method="post" action="https://demo.paymoney.techvill.net/exchange-of-money" id="exchangeMoneyCreateForm">
                            <input type="hidden" value="" id="wallet_id_from">
                            <input type="hidden" value="" id="wallet_id_to">
                            <input type="hidden" value="<?= $uID ?>" id="uid">
                            <input type="hidden" value="" id="balance">

                            <div class="row my-auto">

                                <!-- From Currency Wallet -->
                                <div class="col-5 extra-col-width p-form">
                                    <div class="param-ref money-ref r-mt-11">
                                        <label class="gilroy-medium text-gray-100 mb-2 f-16 mt-28 r-mt-0">From</label>
                                        <span class="f-12 mob-f-12 gilroy-medium mtop-10 mb-0">
                                            <!-- <span class="balance-text text-gray-100">Balance: </span><span class="d-none balance-color" id="fromCurrencyWalletBalanceDiv">( <span id="fromWalletCurrencyBalance"></span> <span id="fromWalletCurrencyCode"></span> )</span> -->
                                        </span>

                                        <div class="avoid-blink">
                                            <select class="select2" data-minimum-results-for-search="Infinity" name="from_wallet" id="from_wallet" onchange="checkAmt()">
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
                                </div>
                                <div class="col-1 position-relative p-form p-to">
                                    <div class="direction-icon d-flex justify-content-center align-items-end">
                                        <div class="h-60 d-flex align-items-center justify-content-center direction"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8047 4.19526C14.0651 4.45561 14.0651 4.87772 13.8047 5.13807L11.1381 7.80474C10.8777 8.06509 10.4556 8.06509 10.1953 7.80474C9.93491 7.54439 9.93491 7.12228 10.1953 6.86193L11.7239 5.33333L2.66667 5.33333C2.29848 5.33333 2 5.03485 2 4.66666C2 4.29847 2.29848 4 2.66667 4L11.7239 4L10.1953 2.4714C9.93491 2.21105 9.93491 1.78894 10.1953 1.52859C10.4556 1.26824 10.8777 1.26824 11.1381 1.52859L13.8047 4.19526ZM4.27614 10.6667L13.3333 10.6667C13.7015 10.6667 14 10.9651 14 11.3333C14 11.7015 13.7015 12 13.3333 12L4.27614 12L5.80474 13.5286C6.06509 13.7889 6.06509 14.2111 5.80474 14.4714C5.54439 14.7318 5.12228 14.7318 4.86193 14.4714L2.19526 11.8047C1.93491 11.5444 1.93491 11.1223 2.19526 10.8619L4.86193 8.19526C5.12228 7.93491 5.54439 7.93491 5.80474 8.19526C6.06509 8.45561 6.06509 8.87772 5.80474 9.13807L4.27614 10.6667Z" fill="currentColor" />
                                            </svg></div>
                                    </div>
                                </div>

                                <!-- To Currency Wallet -->
                                <div class="col-5 extra-col-width p-to">
                                    <div class="param-ref money-ref r-mt-11">
                                        <label class="gilroy-medium text-gray-100 mb-2 f-16 mt-28 r-mt-0">To</label>
                                        <span class="f-12 mob-f-12 gilroy-medium mtop-10 mb-0 d-none" id="toCurrencyWalletBalanceDiv">
                                            <span class="balance-text text-gray-100">Balance: </span><span class="balance-color">( <span id="toWalletCurrencyBalance"></span> <span id="toWalletCurrencyCode"></span> )</span>
                                        </span>

                                        <div class="avoid-blink">
                                            <select class="select2" data-minimum-results-for-search="Infinity" name="to_wallet" id="to_wallet" onchange="checkAmt()">
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
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-16">Your Amount</label>
                                <input type="number" class="form-control input-form-control apply-bg l-s2" id="amount" name="amount" placeholder="Enter amount" onkeyup="checkAmt()">
                                <span class="custom-error" id="amountLimitError">
                            </div>

                            <!-- Converted Amount -->
                            <div class="mb-4 label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-16">Converted Amount</label>
                                <input type="text" class="form-control input-form-control apply-bg l-s2" value="" id="convertedAmount" placeholder="0.00" readonly>
                            </div>

                            <!-- submit button -->
                            <div class="d-grid">
                                <button type="button" class="btn btn-lg btn-primary" id="exchangeBtn">
                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <span id="exchangeMoneyCreateSubmitBtnText">Proceed</span>
                                    <span id="exchangeMoneySvgIcon"><svg class="position-relative ms-1 rtl-wrap-one nscaleX-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        const convert = async (wallet, curr, amount) => {
            try {
                const res = await fetch(`https://api.coinconvert.net/convert/${curr}/${wallet}?amount=${amount}`);
                const data = await res.json()
                const test = Object.values(data)
                const val = test[2];
                if (!val) {
                    return amount
                }
                return val
            } catch (error) {
                console.log(error);
            }

        }

        const checkAmt = async () => {
            try {
                const converted_value = document.querySelector('#convertedAmount')
                const wallet_from = document.querySelector('#from_wallet').value
                const wallet_to = document.querySelector('#to_wallet').value
                const amount = document.querySelector('#amount').value
                const val = await convert(wallet_to, wallet_from, parseFloat(amount))
                if (val) {
                    converted_value.value = val
                    console.log(val);
                } else {
                    converted_value.value = ''
                }
            } catch (error) {
                console.log(error);
            }

        }

        const wallet_from = document.querySelector("#from_wallet");
        wallet_from.onchange = function(event) {
            const wid = event.target.options[event.target.selectedIndex].dataset.wid;
            const bal = event.target.options[event.target.selectedIndex].dataset.bal;
            const wallet_id = document.querySelector('#wallet_id_from')
            const balance = document.querySelector('#balance')
            wallet_id.value = wid
            balance.value = bal
        };
        const wallet_to = document.querySelector("#to_wallet");
        wallet_to.onchange = function(event) {
            const wid = event.target.options[event.target.selectedIndex].dataset.wid;
            const wallet_id = document.querySelector('#wallet_id_to')
            wallet_id.value = wid
        };

        const exchange = document.querySelector('#exchangeBtn')
        exchange.addEventListener('click', () => {
            exchange.innerHTML = "...."
            const widf = document.querySelector('#wallet_id_from').value
            const widt = document.querySelector('#wallet_id_to').value
            const uid = document.querySelector('#uid').value
            const bal = document.querySelector('#balance').value
            const wallet_from = document.querySelector('#from_wallet').value
            const wallet_to = document.querySelector('#to_wallet').value
            const amount = document.querySelector('#amount').value
            const converted = document.querySelector('#convertedAmount').value
            if (!wallet_from || !wallet_to) {
                toastr.error("Select wallet from and wallet to", "Required", {
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
                exchange.innerHTML = "Proceed"
            } else if (!converted) {
                toastr.error("Currency not converted yet", "Required", {
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
                exchange.innerHTML = "Proceed"
            } else if (amount > bal) {
                toastr.error("Not enough money in wallet", "Error", {
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
                exchange.innerHTML = "Proceed"
            } else {
                $.ajax({
                    url: '../backend/actions/exchange.php',
                    dataType: 'json',
                    type: 'post',
                    data: {
                        widf,
                        widt,
                        uid,
                        bal,
                        wallet_from,
                        wallet_to,
                        amount,
                        converted
                    },
                    success: (res) => {
                        if (res.header == 'exchanged') {
                            document.querySelector('#exchangeBtn').innerHTML = "Proceed"
                            toastr.success("You have successfully made an exchange between wallets", "Success", {
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
    <!-- end js -->

</body>

</html>