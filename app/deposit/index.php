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

    <title>Deposit | Pay Money</title>

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
    <?php $page = "deposit"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 shadow" id="depositCreate">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Deposit Money</p>
                        <p class="mb-0 text-center f-13 gilroy-medium text-gray mt-4 dark-A0">Step: 1 of 3</p>
                        <p class="mb-0 text-center f-18 gilroy-medium text-dark dark-5B mt-2">Create Deposit</p>
                        <div class="text-center"><svg class="mt-18 nscaleX-1" width="314" height="6" viewBox="0 0 314 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="100" height="6" rx="3" fill="#635BFE" />
                                <rect class="rect-B87" x="107" width="100" height="6" rx="3" fill="#DDD3FD" />
                                <rect class="rect-B87" x="214" width="100" height="6" rx="3" fill="#DDD3FD" />
                            </svg></div>

                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20">You can deposit to your
                            wallets using our popular payment methods. Fill the details correctly &amp; the amount you
                            want to deposit.</p>


                        <form method="post" action="./deposit/confirm" id="depositCreateForm">
                            <input type="hidden" name="_token" value="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU" autocomplete="off"> <input type="hidden" name="percentage_fee" id="percentage_fee" value="">
                            <input type="hidden" name="fixed_fee" id="fixed_fee" value="">
                            <input type="hidden" name="total_fee" id="total_fee" value="">

                            <!-- Currency -->
                            <div class="mt-28 param-ref">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15" for="currency_id">Currency</label>
                                <div class="avoid-blink">
                                    <select class="select2" data-minimum-results-for-search="Infinity" name="currency_id" id="currency_id">
                                        <option data-type="fiat" value="1" selected=&quot;selected&quot;>USD</option>
                                        <option data-type="fiat" value="2">GBP</option>
                                        <option data-type="fiat" value="3">EUR</option>
                                        <option data-type="crypto" value="11">ETH</option>
                                    </select>
                                </div>
                                <p class="mb-0 text-gray-100 dark-B87 gilroy-regular f-12 mt-2">Fee (<span class="pFees">0%</span>+<span class="fFees"> 0</span>) Total Fee: <span class="total_fees">0.00</span></p>
                            </div>

                            <!-- Amount -->
                            <div class="mt-20 label-top">
                                <label class="gilroy-medium text-gray-100 mb-2 f-15" for="amount">Amount</label>
                                <input type="text" class="form-control input-form-control apply-bg l-s2" name="amount" id="amount" placeholder="Enter amount" onkeypress="return isNumberOrDecimalPointKey(this, event);" oninput="restrictNumberToPrefdecimalOnInput(this)" value="" required data-value-missing="This field is required.">
                                <span class="amountLimit custom-error"></span>
                            </div>

                            <!-- Payment Methods Empty -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-20 param-ref d-none" id="paymentMethodEmpty">
                                        <label class="gilroy-medium text-warning mb-2 f-15">Fees Limit or Payment Method
                                            are currently inactive.</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Methods -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-20 param-ref" id="paymentMethodSection">
                                        <label class="gilroy-medium text-gray-100 mb-2 f-15" for="payment_method">Payment Method</label>
                                        <div class="avoid-blink">
                                            <select class="select2" data-minimum-results-for-search="Infinity" name="payment_method" id="payment_method"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-primary mt-4" id="depositCreateSubmitBtn">
                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <span class="px-1" id="depositCreateSubmitBtnText">Proceed</span>
                                    <span id="rightAngleSvgIcon"><svg class="position-relative ms-1 rtl-wrap-one nscaleX-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    <script src="../public/dist/plugins/debounce-1.1/jquery.ba-throttle-debounce.min.js"></script>


    <script type="text/javascript">
        'use strict';
        var token = $('[name="_token"]').val();
        var paymentMethodListUrl = "https://demo.paymoney.techvill.net/deposit/payment-methods-list";
        var feesLimitUrl = "https://demo.paymoney.techvill.net/deposit/getDepositFeesLimit";
        var transactionTypeId = "1";
        var selectedPaymentMethod = "";
        var submitBtnText = "Processing...";
    </script>

    <script src="../public/user/customs/js/deposit.min.js"></script>
    <!-- end js -->

</body>

</html>