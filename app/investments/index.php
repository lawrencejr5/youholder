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

    <title>Investment List | Yield Fiancial Services</title>

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
    <?php $page = "investments"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="text-center" id="invest_list">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Investment list</p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 r-f-12 mt-2 tran-title p-inline-block">List of all the investments you had or currently have ongoing</p>
                    </div>

                    <div class="d-flex justify-content-between mt-24 r-mt-22 align-items-center">
                        <div class="me-2 me-3">

                        </div>

                        <a href="../invest_plans/" class="btn bg-primary text-light Add-new-btn w-176 addnew">
                            <span class="f-14 gilroy-medium"> + New Investment</span>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive mt-23 table-scrolbar overflow-auto thin-scrollbar inv-table">
                                <table class="table investment-list-table yellow-table table-bordered border-bottom-last-child">
                                    <thead>
                                        <tr class="payment-parent-section-title td-p-20">
                                            <th class="p-0 pb-10">
                                                <p class="mb-0 ml-20 f-13 leading-16 gilroy-regular text-gray-100">Plan</p>
                                            </th>
                                            <th class="p-0 pb-10">
                                                <p class="mb-0 ml-20 f-13 leading-16 gilroy-regular text-gray-100">Invested Amount / Currency</p>
                                            </th>
                                            <th class="p-0 pb-10">
                                                <p class="mb-0 ml-20 f-13 leading-16 gilroy-regular text-gray-100">Start Date / End Date</p>
                                            </th>
                                            <th class="p-0 pb-10">
                                                <p class="mb-0 ml-20 f-13 leading-16 gilroy-regular text-gray-100">Net Profit / Total</p>
                                            </th>
                                            <th class="p-0 pb-10">
                                                <p class="mb-0 ml-20 f-13 leading-16 gilroy-regular text-gray-100">Status</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['myInvestments'] as $i) { ?>
                                            <tr class="bg-white">
                                                <td>
                                                    <div class="td-p-20">
                                                        <p class="mb- d-flex"><a href="" class="mb-0 f-16 leading-20 text-dark gilroy-medium cursor-pointer"><?= $i['plan'] ?> </a></p>
                                                        <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-regular mt-2">
                                                            <?= $i['to_earn'] . ' ' . $i['currency'] ?> bi-weekly in 30 days
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-p-20">
                                                        <p class="mb-0 f-16 leading-20 text-dark gilroy-medium l-sp64"><?= $i['amount'] ?></p>
                                                        <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-regular mt-2"><?= $i['currency'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-p-20">
                                                        <p class="mb-0 f-16 leading-20 text-dark gilroy-medium"><?= $i['start_date'] ?></p>
                                                        <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-regular mt-2"><?= $i['end_date'] ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="td-p-20">
                                                            <p class="mb-0 f-16 leading-20 text-dark gilroy-medium l-sp64"><?= $i['earned'] ?></p>
                                                            <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-regular mt-2 l-sp64"><?= $i['expected'] + $i['amount'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="td-p-20">
                                                            <p class="mb-0 f-14 leading-14 gilroy-medium l-sp64 inv-status-badge bg-warning text-white" style="text-transform: capitalize;"><?= $i['status'] ?></p>
                                                        </div>
                                                        <div class="arrow-hover">
                                                            <a href="" class="">
                                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52925C3.27085 1.7896 3.27085 2.21171 3.5312 2.47206L7.0598 6.00065L3.5312 9.52925C3.27085 9.7896 3.27085 10.2117 3.5312 10.4721C3.79155 10.7324 4.21366 10.7324 4.47401 10.4721L8.47401 6.47205C8.73436 6.21171 8.73436 5.7896 8.47401 5.52925L4.47401 1.52925C4.21366 1.2689 3.79155 1.2689 3.5312 1.52925Z" fill="#9998A0" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">

                            </div>
                        </div>
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

    <script src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/js/user/invest.min.js" type="text/javascript"></script>
    <!-- end js -->

</body>

</html>