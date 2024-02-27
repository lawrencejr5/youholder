<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');
!$_GET['stakeId'] && header('location: ./');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="G4JibAnmCTItdbySLRyrCVHDHPlf8DYZFpP40emU">

    <title>Stake Detail | Yield Fiancial Services</title>

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
</head>

<body>

    <!-- sidebar section -->
    <!-- Sidebar Start -->
    <?php $page = "stakes"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="text-center">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Staking Details</p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 r-f-12 mt-2 tran-title p-inline-block">Everything you need to know about your Staking</p>
                    </div>

                    <div class="d-flex align-items-center back-direction mt-24">
                        <a onclick="history.go(-1)" class="text-gray-100 f-16 leading-20 gilroy-medium d-inline-flex align-items-center position-relative back-btn">
                            <svg class="position-relative nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.47075 10.4709C8.7311 10.2105 8.7311 9.78842 8.47075 9.52807L4.94216 5.99947L8.47075 2.47087C8.7311 2.21053 8.7311 1.78842 8.47075 1.52807C8.2104 1.26772 7.78829 1.26772 7.52794 1.52807L3.52795 5.52807C3.2676 5.78842 3.2676 6.21053 3.52795 6.47088L7.52794 10.4709C7.78829 10.7312 8.2104 10.7312 8.47075 10.4709Z" fill="currentColor" />
                            </svg>
                            <span class="ms-1 back-btn">Back to list</span>
                        </a>
                    </div>
                    <?php $data['singleStaking'] = $modules->getSingleStake($_GET['stakeId']) ?>
                    <?php foreach ($data['singleStaking'] as $s) { ?>
                        <div class="invested-Profit-plan bg-white mt-12">
                            <div class="plan_profit">
                                <div class="row col-gap-20">
                                    <div class="col-xl-12">
                                        <div class="inv-plan">
                                            <p class="mb-0 f-16 leading-20 text-gray gilroy-medium">Staking Plan</p>
                                            <div class="mb-0 d-flex gilroy-Semibold mt-2 gap-12">
                                                <span class="f-26 leading-32 text-dark platinum"><?= $s['plan_name'] ?></span>
                                                <?php if ($s['status'] == 'ended') { ?>
                                                    <span class="inv-status-badge f-11 leading-14 bg-gray text-white d-flex justify-content-center align-items-center align-self-center" style="text-transform: capitalize;"><?= $s['status'] ?></span>
                                                <?php } elseif ($s['status'] == 'staking') { ?>
                                                    <span class="inv-status-badge f-11 leading-14 bg-warning text-white d-flex justify-content-center align-items-center align-self-center" style="text-transform: capitalize;"><?= $s['status'] ?></span>
                                                <?php } elseif ($s['status'] == 'unstaked') { ?>
                                                    <span class="inv-status-badge f-11 leading-14 bg-danger text-white d-flex justify-content-center align-items-center align-self-center style=" text-transform: capitalize;"><?= $s['status'] ?></span>
                                                <?php } ?>
                                            </div>
                                            <p class="mb-0 f-16 leading-20 text-gray-100 gilroy-medium mt-2">
                                                Daily <?= $s['daily_earned'] ?> <?= $s['crypto'] ?> for 365 days
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="invest_profit bg-white-50">
                                            <p class="mb-0 f-14 leading-17 text-gray-100 gilroy-medium">Staked & Net profit</p>
                                            <p class="mb-0 f-22 leading-24 text-primary gilroy-Semibold mt-2"><?= $s['staked'] ?> <?= $s['crypto'] ?></p>
                                            <P class="mb-0 f-16 leading-20 text-dark l-sp mt-5p gilroy-medium">+<?= $s['expected'] ?> <?= $s['crypto'] ?></P>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mt-12">
                                        <div class="invest_capital bg-white h-100 d-flex flex-column">
                                            <p class="mb-0 f-14 leading-17 text-gray-100 gilroy-medium text-start">Total Earned</p>
                                            <p class="mb-0 f-22 leading-24 text-dark gilroy-Semibold mt-2 text-start"><?= $s['earned'] ?> <?= $s['crypto'] ?></p>
                                        </div>
                                    </div>
                                    <div class="dash-right-profile mt-12 d-flex align-items-end">
                                        <?php if ($s['status'] == 'staking') { ?>
                                            <a class="btn btn-xs btn-danger w-160" data-bs-toggle="modal" data-bs-target="#transaction-Info-0">
                                                <span class="mb-0 f-14 leading-20 gilroy-medium">Unstake</span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($s['status'] == 'ended' || $s['status'] == 'unstaked') { ?>
                            <div class="row mt-24 inv-row-gaps">
                                <div class="col-xl-12">
                                    <div class="inv-terms bg-white d-flex justify-content-center">
                                        <canvas id="myChart2" style="width:100%;max-width:700px;height:auto;"></canvas>
                                    </div>
                                    <form>
                                        <input type="hidden" value="<?= $s['days_until_withdrawal'] ?>" id="days_until_withdrawal">
                                    </form>
                                </div>
                            </div>
                        <?php } elseif ($s['status'] == 'staking') { ?>
                            <div class="row mt-24 inv-row-gaps">
                                <div class="col-xl-12">
                                    <div class="inv-terms bg-white d-flex justify-content-center">
                                        <canvas id="myChart" style="width:100%;max-width:700px;height:auto;"></canvas>
                                    </div>
                                    <form>
                                        <input type="hidden" value="<?= $s['num_of_days'] ?>" id="stakeDays">
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mt-24 inv-row-gaps">
                            <div class="col-xl-12">
                                <div class="invest_capital bg-white h-100 d-flex flex-column">
                                    <p class="mb-0 f-14 leading-17 text-gray-100 gilroy-medium">Available to claim</p>
                                    <p class="mb-0 f-14 leading-17 gilroy-medium text-warning-100 mt-12">Note that this amount is being deposited into your <?= $s['crypto'] ?> wallet so make sure to go to wallets and add a/an <?= $s['crypto'] ?> wallet before claiming rewards.</p>
                                    <p class="mb-0 f-22 leading-24 text-primary gilroy-Semibold mt-2"><?= $s['available_withdrawal'] ?> <?= $s['crypto'] ?></p>
                                    <form class="d-flex justify-content-end">
                                        <input type="hidden" value="<?= $s['available_withdrawal'] ?>" id="amt">
                                        <input type="hidden" value="<?= $s['crypto'] ?>" id="cur">
                                        <input type="hidden" value="<?= $s['uid'] ?>" id="uid">
                                        <input type="hidden" value="<?= $s['wid'] ?>" id="wid">
                                        <input type="hidden" value="<?= $s['id'] ?>" id="id">
                                        <?php if ($s['available_withdrawal'] > 0) { ?>
                                            <button type="button" id="withdrawProfit" class="btn btn-success fw-bold">Claim</button>
                                        <?php } ?>
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
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Staked</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['staked'] ?> <?= $s['crypto'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Expected profit</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['expected'] ?> <?= $s['crypto'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Staking started at</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['start_date'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Staking ends at</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['end_date'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Daily earn</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= $s['earned'] ?> <?= $s['crypto'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-20">
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-gray-100">Last updated</p>
                                        <p class="mb-0 f-14 leading-17 gilroy-medium text-dark"><?= date('D, M d Y h:m:s a', $s['last_updated']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div class="row mt-3">
                        <div class="col-12">
                            <div class="settings-wrapper inv-details wrapper">
                                <input type="radio" name="slider" checked="" id="cryp_exchange">
                                <input type="radio" name="slider" id="cryp_buy">
                                <input type="radio" name="slider" id="code">
                                <nav>
                                    <label for="cryp_exchange" class="cryp_exchange"><span class="mb-0 text-center f-14 leading-17 gilroy-medium">Profits</span></label>
                                    <label for="cryp_buy" class="cryp_buy"><span class="mb-0 text-center f-14 leading-17 gilroy-medium">Transfers</span></label>
                                    <div class="settings-slider slider"></div>
                                </nav>
                                <div class="sliding-content-parent mt-3">
                                    <div class="content content-1">
                                        <div class="tab-pane fade show active" id="crypto_exchange1" role="tabpanel">
                                            <div class="table-responsive table-scrolbar overflow-auto thin-scrollbar">
                                                <table class="table table-p table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="details">
                                                                    <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-medium">Details</p>
                                                                    <p class="mb-0 f-15 leading-18 text-primary gilroy-medium mt-2">Investments</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="details pl-8rem">
                                                                    <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-medium">Date &amp; Time</p>
                                                                    <p class="mb-0 f-15 leading-18 text-primary gilroy-medium mt-2">23-07-2023 5:13 PM</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="details">
                                                                    <p class="mb-0 f-13 leading-16 text-gray-100 gilroy-medium text-end">Amount</p>
                                                                    <p class="mb-0 f-15 leading-18 text-primary gilroy-medium mt-2 text-end l-sp64">
                                                                        + 300
                                                                        GBP
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content content-2">
                                        <div class="tab-pane fade show active" id="crypto_exchange2" role="tabpanel">
                                            <div class="notfound mt-16 bg-white p-4">
                                                <div class="d-flex flex-wrap justify-content-center align-items-center gap-26">
                                                    <div class="image-notfound">
                                                        <img src="../public/dist/images/not-found.png" class="img-fluid">
                                                    </div>
                                                    <div class="text-notfound">
                                                        <p class="mb-0 f-20 leading-25 gilroy-medium text-dark">Sorry! No data found.</p>
                                                        <p class="mb-0 f-16 leading-24 gilroy-regular text-gray-100 mt-12">The requested data does not exist for this feature overview.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- main-containt -->

                </div>
            </div>
        </div>
        <div class="modal fade modal-overly" id="transaction-Info-0" tabindex="-1" aria-hidden="true">
            <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                <div class="modal-content modal-transac transaction-modal">
                    <div class="modal-body modal-themeBody">
                        <div class="d-flex position-relative modal-res">
                            <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                </svg>
                            </button>

                            <div class="ml-20 trans-details">
                                <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                    Are you sure you would like to unstake?</p>

                                <!-- Crypto Address -->
                                <?php foreach ($data['singleStaking'] as $s) { ?>
                                    <div class="row gx-sm-5">
                                        <div class="col-6">
                                            <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                Total Earned</p>
                                            <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                <?= $s['earned'] ?> <?= $s['crypto'] ?></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                Expected Earnings</p>
                                            <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                <?= $s['expected'] ?> <?= $s['crypto'] ?></p>
                                        </div>
                                        <div class="col-12 mt-32">
                                            <form>
                                                <input type="hidden" value="<?= $_GET['stakeId'] ?>" id="stakeId">
                                                <button type="button" class="btn btn-xs btn-danger w-160" id="unstakeBtn">
                                                    <span class="mb-0 f-14 leading-20 gilroy-medium">Yes, go ahead</span>
                                                </button>
                                                <a class="btn btn-xs btn-warning cursor-pointer ml-12 w-160 yellow-btn" data-bs-dismiss="modal" aria-label="Close">
                                                    <span class="mb-0 f-14 leading-20 gilroy-medium text-dark">Cancel</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- Transaction Note -->


                                <!-- Accept and Cancel button -->

                                <!-- Open dispute -->
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        const unstakeBtn = document.querySelector('#unstakeBtn')
        unstakeBtn.addEventListener('click', () => {
            unstakeBtn.textContent = "unstaking..."
            const stakeId = document.querySelector('#stakeId').value
            if (!stakeId) {
                return;
            } else {
                $.ajax({
                    url: '../backend/actions/stake.php',
                    dataType: 'json',
                    type: 'post',
                    data: {
                        stakeId
                    },
                    success: (res) => {
                        if (res.header == 'unstaked') {
                            setTimeout(() => {
                                window.location.reload();
                            }, 2500)
                        }
                    }
                })
            }
        })
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
                url: '../backend/actions/claimStakeProfit.php',
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
    <script>
        const stakeDays = document.querySelector('#stakeDays').value
        const remainingDays = 365 - stakeDays;
        var xValues = ["Days stayed", "Days remaining"];
        var yValues = [stakeDays, remainingDays];
        var barColors = ['#130e80', 'brown'];
        new Chart("myChart", {
            type: "doughnut",
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
                    text: "Staking days"
                }
            }
        });

        const days_until_withdrawal = document.querySelector('#days_until_withdrawal').value
        var xValues = ["Total days", "Days remaining"];
        var yValues = [29, days_until_withdrawal];
        var barColors = ['#130e80', 'red'];
        new Chart("myChart2", {
            type: "doughnut",
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
                    text: "Days until capital return"
                }
            }
        });
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