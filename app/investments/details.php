<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');
!$_GET['investId'] && header('location: ./');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="G4JibAnmCTItdbySLRyrCVHDHPlf8DYZFpP40emU">

    <title>Investment Detail | Yield Fiancial Services</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
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
                    <div class="text-center">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Investment Details</p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 r-f-12 mt-2 tran-title p-inline-block">Everything you need to know about your Investment</p>
                    </div>

                    <div class="d-flex align-items-center back-direction mt-24">
                        <a onclick="history.go(-1)" class="text-gray-100 f-16 leading-20 gilroy-medium d-inline-flex align-items-center position-relative back-btn">
                            <svg class="position-relative nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.47075 10.4709C8.7311 10.2105 8.7311 9.78842 8.47075 9.52807L4.94216 5.99947L8.47075 2.47087C8.7311 2.21053 8.7311 1.78842 8.47075 1.52807C8.2104 1.26772 7.78829 1.26772 7.52794 1.52807L3.52795 5.52807C3.2676 5.78842 3.2676 6.21053 3.52795 6.47088L7.52794 10.4709C7.78829 10.7312 8.2104 10.7312 8.47075 10.4709Z" fill="currentColor" />
                            </svg>
                            <span class="ms-1 back-btn">Back to list</span>
                        </a>
                    </div>
                    <?php $data['singleInvest'] = $modules->getSingleInvest($_GET['investId']) ?>
                    <?php foreach ($data['singleInvest'] as $s) { ?>
                        <div class="invested-Profit-plan bg-white mt-12">
                            <div class="plan_profit">
                                <div class="row col-gap-20">
                                    <div class="col-xl-12">
                                        <div class="inv-plan">
                                            <p class="mb-0 f-16 leading-20 text-gray gilroy-medium">Investment Plan</p>
                                            <div class="mb-0 d-flex gilroy-Semibold mt-2 gap-12">
                                                <span class="f-26 leading-32 text-dark platinum"><?= $s['plan'] ?></span>
                                                <?php if ($s['status'] == 'ended') { ?>
                                                    <span class="inv-status-badge f-11 leading-14 bg-gray text-white d-flex justify-content-center align-items-center align-self-center" style="text-transform: capitalize;"><?= $s['status'] ?></span>
                                                <?php } elseif ($s['status'] == 'active') { ?>
                                                    <span class="inv-status-badge f-11 leading-14 bg-warning text-white d-flex justify-content-center align-items-center align-self-center" style="text-transform: capitalize;"><?= $s['status'] ?></span>
                                                <?php } ?>
                                            </div>
                                            <p class="mb-0 f-16 leading-20 text-gray-100 gilroy-medium mt-2">
                                                Daily <?= $s['to_earn'] ?> <?= $s['currency'] ?> for <?= $s['duration'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="invest_profit bg-white-50">
                                            <p class="mb-0 f-14 leading-17 text-gray-100 gilroy-medium">Invested & Net profit</p>
                                            <p class="mb-0 f-22 leading-24 text-primary gilroy-Semibold mt-2"><?= $s['amount'] ?> <?= $s['currency'] ?></p>
                                            <P class="mb-0 f-16 leading-20 text-dark l-sp mt-5p gilroy-medium">+<?= $s['expected'] ?> <?= $s['currency'] ?></P>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mt-12">
                                        <div class="invest_capital bg-white h-100 d-flex flex-column">
                                            <p class="mb-0 f-14 leading-17 text-gray-100 gilroy-medium text-start">Total Earned</p>
                                            <p class="mb-0 f-22 leading-24 text-dark gilroy-Semibold mt-2 text-start"><?= $s['earned'] ?> <?= $s['currency'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-24 inv-row-gaps">
                            <div class="col-xl-12">
                                <div class="inv-terms bg-white d-flex justify-content-center">
                                    <canvas id="myChart" style="width:100%;max-width:700px;height:auto;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-24 inv-row-gaps">
                            <div class="col-xl-12">
                                <div class="invest_capital bg-white h-100 d-flex flex-column">
                                    <p class="mb-0 f-14 leading-17 text-gray-100 gilroy-medium">Available to withdraw</p>
                                    <p class="mb-0 f-14 leading-17 gilroy-medium text-warning-100 mt-12">Note that this amount is being deposited into your <?= $s['currency'] ?> wallet so make sure to go to wallets and add a/an <?= $s['currency'] ?> wallet before claiming rewards.</p>
                                    <p class="mb-0 f-22 leading-24 text-primary gilroy-Semibold mt-2"><?= $s['available_withdrawal'] ?> <?= $s['currency'] ?></p>


                                    <form class="d-flex justify-content-end">
                                        <input type="hidden" value="<?= $s['available_withdrawal'] ?>" id="amt">
                                        <input type="hidden" value="<?= $s['currency'] ?>" id="cur">
                                        <input type="hidden" value="<?= $s['uid'] ?>" id="uid">
                                        <input type="hidden" value="<?= $s['wid'] ?>" id="wid">
                                        <input type="hidden" value="<?= $s['id'] ?>" id="id">
                                        <?php if ($s['available_withdrawal'] > 0) { ?>
                                            <button type="button" id="withdrawProfit" class="btn btn-success fw-bold">Claim</button>
                                        <?php } else {
                                            '';
                                        } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-24 inv-row-gaps">
                            <div class="col-xl-12">
                                <div class="inv-terms bg-white">
                                    <div class="inv-terms-header border-b-EF">
                                        <p class="mb-0 f-18 leading-24 gilroy-Semibold text-dark">Other Details</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-24">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Invested</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['amount'] ?> <?= $s['currency'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Net profit</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['expected'] ?> <?= $s['currency'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Payment method</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['currency'] ?> Wallet</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Staking started at</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['start_date'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Staking ends at</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['start_date'] ?></p>
                                    </div>
                                    <form action="">
                                        <input type="hidden" value="<?= $s['num_of_days'] ?>" id="num_of_days">
                                        <input type="hidden" value="<?= $d = ($s['durationInt'] - $s['num_of_days']) ?>" id="days_remaining">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- main-containt -->

                </div>
            </div>
        </div>

        <!-- footer -->
        <footer class="d-flex align-items-center justify-content-between bg-white w-100 px-4 footer-sec">
            <div class="res-order d-flex align-items-center">
                <p class="mb-0 gilroy-medium">авторское право &copy; 2024&nbsp;<a href="https://demo.paymoney.techvill.net" class="link-text">Pay Money</a>&nbsp;|&nbsp;Все права защищены.</p>
                <span class="d-none">4.1.1</span>
            </div>
            <div class="d-flex f-link align-items-center">
                <div>
                    <div class="d-flex align-items-center text-gray-100 f-13 blink-w sp" id="select_language">
                        <div class="form-group selectParent f-13">
                            <select class="select2 form-control f-13 mb-2n" data-minimum-results-for-search="Infinity" id="select-height">
                                <option class="f-13 gilroy-medium" value='en'>English</option>
                                <option class="f-13 gilroy-medium" value='ar'>عربى</option>
                                <option class="f-13 gilroy-medium" value='fr'>Français</option>
                                <option class="f-13 gilroy-medium" value='pt'>Português</option>
                                <option class="f-13 gilroy-medium" selected value='ru'>Русский</option>
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


    <script type="text/javascript">
        const num_of_days = document.querySelector('#num_of_days').value
        const days_remaining = document.querySelector('#days_remaining').value
        const xValues = ["Days invested", "Days remaining"];
        const yValues = [num_of_days, days_remaining];
        const barColors = ['#130e80', 'grey'];
        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Track Investment"
                }
            }
        });
    </script>

    <script type="text/javascript">
        const withdrawProfit = document.querySelector('#withdrawProfit')
        withdrawProfit.addEventListener('click', () => {
            withdrawProfit.textContent = "Claiming..."
            const id = document.querySelector('#id').value
            const uid = document.querySelector('#uid').value
            const wid = document.querySelector('#wid').value
            const cur = document.querySelector('#cur').value
            const amt = document.querySelector('#amt').value

            $.ajax({
                url: '../backend/actions/claimInvestProfit.php',
                dataType: 'json',
                type: 'post',
                data: {
                    id,
                    uid,
                    wid,
                    cur,
                    amt
                },
                success: (res) => {
                    if (res.header == 'claimed') {
                        toastr.success(`${amt} ${cur} has been deposited in your ${cur} wallet`, "Claimed", {
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
                        setTimeout(() => {
                            window.location.reload()
                        }, 3000)
                    }
                }
            })
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