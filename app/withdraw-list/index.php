<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">

    <title>Payouts | Pay Money</title>

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
    <?php $page = "withdraw-list"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="text-center">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Withdraw List
                        </p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 r-f-12 mt-2 tran-title">History of all your
                            withdrawals in your account</p>
                    </div>
                    <div class="withdraw-list-parent mt-32">
                        <div class="d-flex withdraw-list-child">
                            <div class="d-flex flex-wraps flex-grows-1">
                                <div class="transaction-medium d-flex width-50">
                                    <div class="d-flex justify-content-center sm-send_medium">
                                        <img src="../public/dist/images/gateways/paypal.png" alt="Paypal">
                                    </div>
                                    <div class="ml-20 date_and-status">
                                        <p class="text-dark gilroy-medium f-16 mb-0 mt-medium-2p leading-20">Paypal</p>
                                        <p class="f-13 gilroy-regular d-flex justify-content-center align-items-center mb-0 mt-8">
                                            <span class="text-gray-100">30-08-2023 4:31 PM</span>
                                            <svg class="mx-between-date_and_sattus" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="#2AAA5E"></circle>
                                            </svg>
                                            <span class="text-success">Success</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center width-75 addres">
                                    <p class="text-start mb-0 f-16 leading-20 text-dark gilroy-medium">irish@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="currency-with-fees d-flex align-items-end flex-column mt-medium-2p width-25">
                                <p class="mb-0 f-16 leading-20 gilroy-medium text-start w-space l-sp64"><span class="text-dark">EUR 20</span></p>
                                <p class="mb-0 f-13  text-gray-100 gilroy-regular text-end ml-24 fee-mt-8 w-space">EUR
                                    2.02</p>
                            </div>
                        </div>
                        <div class="d-flex withdraw-list-child">
                            <div class="d-flex flex-wraps flex-grows-1">
                                <div class="transaction-medium d-flex width-50">
                                    <div class="d-flex justify-content-center sm-send_medium">
                                        <img src="../public/dist/images/gateways/crypto.png" alt="Crypto">
                                    </div>
                                    <div class="ml-20 date_and-status">
                                        <p class="text-dark gilroy-medium f-16 mb-0 mt-medium-2p leading-20">Crypto</p>
                                        <p class="f-13 gilroy-regular d-flex justify-content-center align-items-center mb-0 mt-8">
                                            <span class="text-gray-100">24-07-2023 5:19 AM</span>
                                            <svg class="mx-between-date_and_sattus" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="#2AAA5E"></circle>
                                            </svg>
                                            <span class="text-warning">Pending</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center width-75 addres">
                                    <p class="text-start mb-0 f-16 leading-20 text-dark gilroy-medium">
                                        0x6BcA3DdEf6c42Cc8B741F8604b7cf7185f016782</p>
                                </div>
                            </div>
                            <div class="currency-with-fees d-flex align-items-end flex-column mt-medium-2p width-25">
                                <p class="mb-0 f-16 leading-20 gilroy-medium text-start w-space l-sp64"><span class="text-dark">ETH 0.053</span></p>
                                <p class="mb-0 f-13  text-gray-100 gilroy-regular text-end ml-24 fee-mt-8 w-space">ETH
                                    0.00646</p>
                            </div>
                        </div>
                        <div class="d-flex withdraw-list-child">
                            <div class="d-flex flex-wraps flex-grows-1">
                                <div class="transaction-medium d-flex width-50">
                                    <div class="d-flex justify-content-center sm-send_medium">
                                        <img src="../public/dist/images/gateways/paypal.png" alt="Paypal">
                                    </div>
                                    <div class="ml-20 date_and-status">
                                        <p class="text-dark gilroy-medium f-16 mb-0 mt-medium-2p leading-20">Paypal</p>
                                        <p class="f-13 gilroy-regular d-flex justify-content-center align-items-center mb-0 mt-8">
                                            <span class="text-gray-100">20-07-2023 6:53 AM</span>
                                            <svg class="mx-between-date_and_sattus" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="#2AAA5E"></circle>
                                            </svg>
                                            <span class="text-danger">Blocked</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center width-75 addres">
                                    <p class="text-start mb-0 f-16 leading-20 text-dark gilroy-medium">irish@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="currency-with-fees d-flex align-items-end flex-column mt-medium-2p width-25">
                                <p class="mb-0 f-16 leading-20 gilroy-medium text-start w-space l-sp64"><span class="text-dark">GBP 50</span></p>
                                <p class="mb-0 f-13  text-gray-100 gilroy-regular text-end ml-24 fee-mt-8 w-space">GBP
                                    3.1</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">

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

    <!-- end js -->

</body>

</html>