<?php
session_start();
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
                        <p class="mb-0 text-center f-13 gilroy-medium text-gray mt-4 dark-A0">Step: 1 of 3</p>
                        <p class="mb-0 text-center f-18 gilroy-medium text-dark dark-5B mt-2">Setup Money</p>
                        <div class="text-center"><svg class="mt-18 nscaleX-1" width="314" height="6" viewBox="0 0 314 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="100" height="6" rx="3" fill="#635BFE" />
                                <rect class="rect-B87" x="107" width="100" height="6" rx="3" fill="#DDD3FD" />
                                <rect class="rect-B87" x="214" width="100" height="6" rx="3" fill="#DDD3FD" />
                            </svg></div>

                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20">Exchange currencies from the comfort of your home, quickly, safely with a minimal fees.Select the wallet &amp; put the amount you want to exchange.</p>

                        <form method="post" action="https://demo.paymoney.techvill.net/exchange-of-money" id="exchangeMoneyCreateForm">
                            <input type="hidden" name="_token" value="qb1QM8RsLbLH2VAZWJopBTfxWK5gnxizsKMLjfI7" autocomplete="off">
                            <input type="hidden" name="percentage_fee" id="feesPercentage">
                            <input type="hidden" name="fixed_fee" id="feesFixed">
                            <input type="hidden" name="total_fee" id="totalFees">
                            <input type="hidden" name="final_amount" id="finalAmount">
                            <input type="hidden" name="sessionToWalletCode" id="sessionToWalletCode">
                            <input type="hidden" name="sessionFromWalletCode" id="sessionFromWalletCode">
                            <input type="hidden" name="destinationCurrencyRate" id="destinationCurrencyRate">
                            <input type="hidden" name="destinationCurrencyCode" id="destinationCurrencyCode">

                            <div class="row my-auto">

                                <!-- From Currency Wallet -->
                                <div class="col-5 extra-col-width p-form">
                                    <div class="param-ref money-ref r-mt-11">
                                        <label class="gilroy-medium text-gray-100 mb-2 f-16 mt-28 r-mt-0">From</label>
                                        <span class="f-12 mob-f-12 gilroy-medium mtop-10 mb-0">
                                            <span class="balance-text text-gray-100">Balance: </span><span class="d-none balance-color" id="fromCurrencyWalletBalanceDiv">( <span id="fromWalletCurrencyBalance"></span> <span id="fromWalletCurrencyCode"></span> )</span>
                                        </span>

                                        <div class="avoid-blink">
                                            <select class="select2" data-minimum-results-for-search="Infinity" id="fromCurrencyWallet" name="from_currency_id">
                                                <option data-type="fiat" value="1" selected=&quot;selected&quot;>USD</option>
                                                <option data-type="fiat" value="2">GBP</option>
                                                <option data-type="fiat" value="3">EUR</option>
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
                                            <select class="select2" data-minimum-results-for-search="Infinity" id="toCurrencyWallet" name="currency_id"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-16">Your Amount</label>
                                <input type="text" class="form-control input-form-control apply-bg l-s2" id="amount" name="amount" onkeypress="return isNumberOrDecimalPointKey(this, event);" oninput="restrictNumberToPrefdecimalOnInput(this)" placeholder="0.00" value="" required data-value-missing="This field is required">
                                <span class="custom-error" id="amountLimitError">
                            </div>
                            <small class="mb-0 gilroy-medium f-12 mob-f-12 mt-11 r-mt-10 text-gray" id="feesLimitDiv">
                                Fee(<span id="formattedFeesPercentage">0</span>%+<span id="formattedFeesFixed">0</span>)
                                Total Fee: <span id="formattedTotalFees">0.00</span>
                            </small>

                            <!-- Converted Amount -->
                            <div class="mb-4 label-top mt-20">
                                <label class="gilroy-medium text-gray-100 mb-2 f-16">Converted Amount</label>
                                <input type="text" class="form-control input-form-control apply-bg l-s2" value="" id="convertedAmount" placeholder="0.00" readonly>
                            </div>

                            <!-- Exchange rate -->
                            <div class="mt-2 mb-4" id="exchangeRateDiv">
                                <p class="mb-0 dark-B87 gilroy-medium f-14 text-center">Exchange rate: 1 <span class="text-primary" id="exchangeRateFromWalletCode"></span> = <span class="text-primary" id="exchangeRate"></span> <span class="text-primary" id="exchangeRateToWalletCode"></span></p>
                            </div>

                            <!-- submit button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-primary" id="exchangeMoneyCreateSubmitBtn">
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


    <script type="text/javascript">
        function restrictNumberToPrefdecimal(e, type) {
            let decimalFormat =
                type === "fiat" ?
                "2" :
                "8";

            let num = $.trim(e.value);
            if (num.length > 0 && !isNaN(num)) {
                e.value = digitCheck(num, 8, decimalFormat);
                return e.value;
            }
        }

        function digitCheck(num, beforeDecimal, afterDecimal) {
            return num
                .replace(/[^\d.]/g, "")
                .replace(new RegExp("(^[\\d]{" + beforeDecimal + "})[\\d]", "g"), "$1")
                .replace(/(\..*)\./g, "$1")
                .replace(new RegExp("(\\.[\\d]{" + afterDecimal + "}).", "g"), "$1");
        }
    </script>
    <script>
        var isNumberOrDecimalPointKey = function(value, e) {

            var charCode = (e.which) ? e.which : e.keyCode;

            if (charCode == 46) {
                if (value.value.indexOf('.') === -1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            }
            return true;
        }
    </script>

    <script src="../public/dist/plugins/html5-validation-1.0.0/validation.min.js"></script>
    <script src="../public/dist/libraries/sweetalert/sweetalert-unpkg.min.js"></script>
    <script src="../public/dist/plugins/debounce-1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script>
        "use strict";
        var csrfToken = $('[name="_token"]').val();
        var convertedCurrency = "";
        var currencyListExceptSelectedUrl = "https://demo.paymoney.techvill.net/exchange/get-converted-currencies";
        var walletBalanceUrl = "https://demo.paymoney.techvill.net/exchange/selected-currency-wallet-balance";
        var currentUrl = "https://demo.paymoney.techvill.net/exchange";
        var exchangeRateUrl = "https://demo.paymoney.techvill.net/exchange/get-currencies-exchange-rate";
        var amountLimitCheckUrl = "https://demo.paymoney.techvill.net/exchange/amount-limit-check"
        var toWalletOptionText = "Select Wallet";
        var submitButtonText = "Submiting...";
        var swalTitleText = "Please Wait...";
        var swalBodyText = "Loading...";
        var transactionTypeId = '5';
        var lowBalanceText = "Not have enough balance !";
        var failedText = 'Error';
        let submitBtnText = 'Processing...';
    </script>
    <script src="../public/user/customs/js/exchange-currency.min.js"></script>
    <!-- end js -->

</body>

</html>