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

    <title>Investment Plans | Yield Fiancial Services</title>

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
    <?php $page = "invest_plans"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="text-center inv-title px-326">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Investment plans</p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 leading-26 r-f-12 mt-2 inv-title tran-title ">Here is our several investment plans. You can invest daily, weekly or monthly and get higher returns in your investment.</p>

                    </div>
                    <div class="row">
                        <?php foreach ($data['invest_plans'] as $i) { ?>
                            <div class="col-xl-4 col-top">
                                <div class="invest-plan plan-diamond bg-white bdr-8">

                                    <p class="text-dark d-title f-20 leading-24 gilroy-Semibold text-uppercase text-center"><?= $i['plan'] ?></p>

                                    <div class="mt-14 profit-duration d-flex justify-content-between bg-white-100">
                                        <div class="daily-profit">
                                            <p class="mb-0 f-13 leading-16 gilroy-medium text-dark">Percentage Profit</p>
                                            <p class="mb-0 f-20 leading-24 text-primary gilroy-Semibold mt-2"><?= $i['monthly'] ?>%</p>
                                        </div>
                                        <div class="duration text-end">
                                            <p class="mb-0 f-13 leading-16 gilroy-medium text-dark">Duration</p>
                                            <p class="mb-0 f-20 leading-24 text-primary gilroy-Semibold mt-2"><?= $i['dura'] ?></p>
                                        </div>
                                    </div>

                                    <div class="min-max-amount border-b-EF d-flex justify-content-between">
                                        <div class="min-max-left">
                                            <p class="mb-0 f-13 leading-16 gilroy-medium text-gray-100">Min Amount</p>
                                            <p class="mb-0 f-16 leading-20 gilroy-Semibold text-dark mt-2"><?= $i['min'] ?> USD</p>
                                        </div>
                                        <div class="min-max-right">
                                            <p class="mb-0 f-13 leading-16 gilroy-medium text-gray-100">Max Amount</p>
                                            <p class="mb-0 f-16 leading-20 gilroy-Semibold text-dark mt-2"><?= $i['max'] ?> USD</p>
                                        </div>
                                    </div>
                                    <div class="terms mt-20">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Profit cumulation</p>
                                            <p class="mb-0 f-14 leading-17 gilroy-medium text-dark">Daily (Monday - Sunday)</p>
                                        </div>
                                        <div class="d-flex justify-content-between mt-16">
                                            <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Withdraw Profit Before Matured</p>
                                            <p class="mb-0 f-14 leading-17 gilroy-medium text-dark">No</p>
                                        </div>
                                        <div class="d-flex justify-content-between mt-16">
                                            <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Withdrawal</p>
                                            <p class="mb-0 f-14 leading-17 gilroy-medium text-dark">After Matured</p>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <a href="../invest?planid=<?= $i['id'] ?>" class="investment-btn green-btn cursor-pointer bg-primary d-flex justify-content-center mt-24 b-none">
                                            <span class="f-14 leading-20 gilroy-regular inv-btn text-white">Invest Now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- main-containt -->

                </div>
            </div>
        </div>

        <?php include '../master/footer.php' ?>

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