<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');
!$_GET['amt'] && !$_GET['curr'] && !$_GET['address'] &&
    header('location: ../deposit');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">
    <title>Make Deposit | Yield Fiancial Services</title>

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
    <?php $page = "deposit"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 shadow" id="depositConfirm">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Deposit Money</p>
                        <p class="mb-0 text-center f-13 gilroy-medium text-gray mt-4 dark-A0">Step: 2 of 2</p>
                        <p class="mb-0 text-center f-18 gilroy-medium text-dark dark-5B mt-2">Make deposit and head back to wallets</p>
                        <div class="text-center"><svg class="mt-18 nscaleX-1" width="314" height="6" viewBox="0 0 314 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="100" height="6" rx="3" fill="#635BFE" />
                                <!-- <rect x="107" width="100" height="6" rx="3" fill="#635BFE" /> -->
                                <rect class="rect" x="214" width="100" height="6" rx="3" fill="#635BFE" />
                            </svg></div>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20">Check your deposit information before confirmation.</p>

                        <form method="post" action="https://demo.paymoney.techvill.net/deposit/gateway" id="depositConfirmForm" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="kIte8862DuGRvS3wAffFj2TC0j1SygL6deKEbxei" autocomplete="off"> <input type="hidden" name="method" id="method" value="6">
                            <input type="hidden" name="amount" id="amount" value="501.6">

                            <!-- Confirm Details -->
                            <div class="mt-32 param-ref text-center">
                                <div class="mt-40 transaction-box">
                                    <!-- Amount -->
                                    <div class="d-flex justify-content-between border-b-EF pb-13">
                                        <p class="mb-0 f-16 gilroy-regular text-gray-100">Deposit Amount</p>
                                        <p class="mb-0 f-16 gilroy-regular text-gray-100"><?= $_GET['amt'] . ' ' . $_GET['curr'] ?></p>
                                    </div>

                                    <!-- Fee -->
                                    <div class="d-flex justify-content-between border-b-EF pb-13 mt-3">
                                        <p class="mb-0 f-16 gilroy-regular text-gray-100">Fee</p>
                                        <p class="mb-0 f-16 gilroy-regular text-gray-100">0 <?= $_GET['curr'] ?></p>
                                    </div>

                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Total</p>
                                        <p class="mb-0 f-16 gilroy-medium text-dark"><?= $_GET['amt'] . ' ' . $_GET['curr'] ?></p>
                                    </div>
                                    <hr>
                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Address</p>
                                        <p class="mb-0 f-16 gilroy-medium text-dark"><?= $_GET['address'] ?></p>
                                    </div>
                                    <hr>
                                    <!-- Total -->
                                    <p class="mb-0 f-16 gilroy-medium text-dark">Scan qr code to copy address</p><br>
                                    <div class="d-flex justify-content-center mt-3 total">
                                        <img width="170" height="170" src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?= $_GET['address'] ?>&choe=UTF-8&chld=H|0" alt="addressqrcode">
                                    </div>

                                </div>
                            </div>

                            <!-- Confirm Button -->
                            <div class="d-grid">
                                <button type="button" class="btn btn-lg btn-primary mt-4" id="depositConfirmBtn">
                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <svg class="position-relative nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.47075 10.4709C8.7311 10.2105 8.7311 9.78842 8.47075 9.52807L4.94216 5.99947L8.47075 2.47087C8.7311 2.21053 8.7311 1.78842 8.47075 1.52807C8.2104 1.26772 7.78829 1.26772 7.52794 1.52807L3.52795 5.52807C3.2676 5.78842 3.2676 6.21053 3.52795 6.47088L7.52794 10.4709C7.78829 10.7312 8.2104 10.7312 8.47075 10.4709Z" fill="currentColor" />
                                    </svg>
                                    <span class="px-1" id="depositConfirmBtnText">Back to wallets</span>
                                    </span>
                                </button>
                            </div>


                        </form>
                    </div>
                    <!-- main-containt -->

                </div>
            </div>
        </div>

        <?php include '../master/footer.php' ?>

    </div>

    <!-- js -->
    <script src="https://demo.paymoney.techvill.net/public/dist/libraries/jquery-3.6.1/jquery-3.6.1.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/dist/libraries/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/dist/plugins/select2-4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/user/templates/js/chart.umd.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/user/templates/js/main.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/user/customs/js/common.min.js"></script>

    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        const btn = document.querySelector('#depositConfirmBtn')
        btn.addEventListener('click', () => {
            window.location = "../wallets/"
        })
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
        'use strict';
        let confirmBtnText = "Confirming...";
        let pretext = "Confirm &amp; Deposit";
    </script>
    <script src="https://demo.paymoney.techvill.net/public/user/customs/js/deposit.min.js"></script>
    <!-- end js -->

</body>

</html>