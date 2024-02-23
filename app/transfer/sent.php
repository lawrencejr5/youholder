<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');

if (!$_GET['i'] || !$_GET['r'] || !$_GET['a'] || !$_GET['w']) {
    header('location: ./');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="Iu765mySM14LkDX4k7mvwEQlTNEP6QR7IOPcGUT1">

    <title>Sent | Yield Finacial Services</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
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
    <!-- Sidebar End -->
    <!-- end sidebar section -->

    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>
        <!-- end header section -->

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 shadow">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Send Money</p>
                        <p class="mb-0 text-center f-18 gilroy-medium text-dark dark-5B mt-2">Money transfer complete</p>

                        <div class="mt-36 d-flex justify-content-center position-relative h-44">
                            <lottie-player class="position-absolute success-anim" src="../public/user/templates/animation/confirm.json" background="transparent" style="color: red;" speed="1" autoplay></lottie-player>
                        </div>
                        <p class="mb-0 gilroy-medium f-20 success-text text-dark mt-20 text-center dark-5B r-mt-16">Success!</p>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-CDO mt-6 r-mt-8 leading-25">Money has been transferred successfully.</p>
                        <div class="print-mail mt-4">
                            <div class="d-flex gap-18 justify-content-center">
                                <div class="d-flex align-items-center justify-content-center user-mail mt-20">
                                    <img src="../backend/actions/uploads/<?= !$_GET['p'] ? '1532005837.jpg' : $_GET['p']; ?>" class="img-fluid">
                                </div>
                                <div class="d-flex">
                                    <div class="mt-26">
                                        <p class="mb-0 text-dark gilroy-medium f-16 theme-font"><?= $_GET['r'] ?></p>
                                        <p class="mb-0 text-gray-100 dark-B87 gilroy-regular f-12 mt-2 leading-20 theme-amount">Transferred Amount</p>
                                        <p class="mb-0 text-primary dark-B87 gilroy-medium mt-2p f-16 theme-usd"><?= $_GET['a'] . ' ' . $_GET['w'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p trnsfer-details mt-4 r-mt-8 leading-26">
                            The recipient will be notified via an email or phone number after money has been successfully transferred to their account.
                        </p>
                        <!-- <div class="d-flex justify-content-center mt-28 r-mt-20">
                            <a href="https://demo.paymoney.techvill.net/moneytransfer/print/155" class="print-btn d-flex justify-content-center align-items-center gap-10 b-none" target="_blank">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                </svg>
                                <span>Print</span>
                            </a>

                            <a href="https://demo.paymoney.techvill.net/moneytransfer" class="bg-white repeat-btn d-flex justify-content-center align-items-center ml-20">
                                <span class="gilroy-medium">Send Again</span>
                            </a>
                        </div> -->
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

    <script src="../public/dist/js/lottie-player.min.js"></script>
    <!-- end js -->

</body>

</html>