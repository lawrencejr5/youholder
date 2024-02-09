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

    <title>Invest Create | Pay Money</title>

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
    <?php $page = "invest_plans"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62" id="invest_add">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">New Investment</p>
                        <p class="mb-0 text-center f-18 gilroy-medium text-dark dark-5B mt-2">Fill Information</p>
                        <p class="mb-0 text-center f-14 gilroy-medium text-gray dark-p mt-20"> You can invest on any plan using our popular payment methods or wallet.</p>
                        <?php $data['invest_plan'] = $modules->getInvestPlan($_GET['planid']); ?>
                        <?php foreach ($data['invest_plan'] as $i) { ?>
                            <form method="" action="" id="invest-form">
                                <input type="hidden" value="<?= $uID ?>" name="user_id" id="uid">
                                <input type="hidden" value="" id="wid">
                                <input type="hidden" value="" id="bal">
                                <input type="hidden" value="USD" id="currency">
                                <input type="hidden" value="<?= $i['min'] ?>" id="min">
                                <input type="hidden" value="<?= $i['max'] ?>" id="max">
                                <input type="hidden" value="<?= $i['id'] ?>" id="plan_id">
                                <input type="hidden" value="<?= $i['bi_weekly'] ?>" id="bperc">
                                <input type="hidden" value="<?= $i['monthly'] ?>" id="mperc">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="label-top mt-20">
                                            <label class="gilroy-medium text-gray-100 mb-2 f-15" for="amount">Amount <span class="currency"></span></label>
                                            <input type="text" class="form-control input-form-control apply-bg l-s2 amount" value="<?= $i['plan'] ?>" name="user_amount" placeholder="Staking plans" id="plan" disabled>
                                        </div>
                                        <div class="custom-error amountLimit"></div>
                                        <div class="d-flex justify-content-between mt-10 d-none" id="amount-limit-div">

                                            <p class="mb-0 f-12 leading-15 gilroy-medium text-gray"><span class="text-gray-100" id="amount-range"></span></p>

                                            <p class="mb-0 f-12 leading-15 gilroy-medium text-gray"><span class="text-gray-100" id="maximum-amount"></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-28 param-ref">
                                            <label class="gilroy-medium text-gray-100 mb-2 f-15" for="plan">Wallet</label>
                                            <select class="select2" data-minimum-results-for-search="Infinity" name="wallet" id="wallet">
                                                <option value="">Select Wallet</option>
                                                <?php foreach ($data['user_wallets'] as $w) {
                                                    $data['total_deposits'] = $modules->getTotalDeposits($uID, $w['wallet_name']);
                                                    $data['total_withdrawals'] = $modules->getTotalWithdrawals($uID, $w['wallet_name']);
                                                    foreach ($data['total_deposits'] as $td) {
                                                        foreach ($data['total_withdrawals'] as $tw) {

                                                ?>
                                                            <option data-wid=" <?= $w['wallet_id'] ?>" data-bal="<?= $td['amount'] - $tw['amount'] ?>" value="<?= $w['wallet_name'] ?>"><?= $w['wallet_name'] . ' - ' . $td['amount'] - $tw['amount'] ?></option>
                                                <?php }
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="label-top mt-20">
                                            <label class="gilroy-medium text-gray-100 mb-2 f-15" for="amount">Amount <span class="currency"></span></label>
                                            <input type="text" class="form-control input-form-control apply-bg l-s2 amount" value="" name="user_amount" placeholder="Give an amount" id="amount" onkeyup="checkAmt()">
                                        </div>
                                        <div class="custom-error amountLimit"></div>

                                        <div class="d-flex justify-content-between mt-10 d-none" id="amount-limit-div">

                                            <p class="mb-0 f-12 leading-15 gilroy-medium text-gray"><span class="text-gray-100" id="amount-range"></span></p>

                                            <p class="mb-0 f-12 leading-15 gilroy-medium text-gray"><span class="text-gray-100" id="maximum-amount"></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-none" id="empty-payment">
                                    <div class="col-12">
                                        <div class="mt-20 param-ref">
                                            <span class="text-danger">Wallet or payment method is not available.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="label-top mt-20">
                                            <label class="gilroy-medium text-gray-100 mb-2 f-15" for="amount">USD value <span class="currency"></span></label>
                                            <input type="text" class="form-control input-form-control apply-bg l-s2 amount" value="" name="user_amount" placeholder="0.00" id="converted_value" disabled>
                                        </div>
                                        <div class="custom-error amountLimit"></div>

                                        <div class="d-flex justify-content-between mt-10 d-none" id="amount-limit-div">

                                            <p class="mb-0 f-12 leading-15 gilroy-medium text-gray"><span class="text-gray-100" id="amount-range"></span></p>

                                            <p class="mb-0 f-12 leading-15 gilroy-medium text-gray"><span class="text-gray-100" id="maximum-amount"></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="button" class="btn btn-lg btn-primary mt-4" id="investBtn">
                                        <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                            <span class="visually-hidden"></span>
                                        </div>
                                        <span>Invest</span>
                                        <svg class="position-relative ms-1 rtl-wrap-one nscaleX-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.11648 12.216C3.81274 11.9123 3.81274 11.4198 4.11648 11.1161L8.23317 6.99937L4.11648 2.88268C3.81274 2.57894 3.81274 2.08647 4.11648 1.78273C4.42022 1.47899 4.91268 1.47899 5.21642 1.78273L9.88309 6.4494C10.1868 6.75314 10.1868 7.2456 9.88309 7.54934L5.21642 12.216C4.91268 12.5198 4.42022 12.5198 4.11648 12.216Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
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
                const converted_value = document.querySelector('#converted_value')
                converted_value.value = ''
                const wallet = document.querySelector('#wallet').value
                const curr = document.querySelector('#currency').value
                const amount = document.querySelector('#amount').value
                const val = await convert(curr, wallet, parseFloat(amount))
                if (val) {
                    converted_value.value = val
                } else {
                    converted_value.value = ''
                }
            } catch (error) {
                console.log(error);
            }
        }

        const selection = document.querySelector("#wallet");
        selection.onchange = function(event) {
            checkAmt()
            const wid = event.target.options[event.target.selectedIndex].dataset.wid;
            const bal = event.target.options[event.target.selectedIndex].dataset.bal;
            const wallet_id = document.querySelector('#wid')
            const balance = document.querySelector('#bal')
            wallet_id.value = wid
            balance.value = bal
        };

        const investBtn = document.querySelector('#investBtn')
        investBtn.addEventListener('click', () => {
            const uid = document.querySelector('#uid').value
            const wid = document.querySelector('#wid').value
            const min = document.querySelector('#min').value
            const max = document.querySelector('#max').value
            const bal = document.querySelector('#bal').value
            const amount = document.querySelector('#amount').value
            const wname = document.querySelector('#wallet').value
            const planId = document.querySelector('#plan_id').value
            const planName = document.querySelector('#plan').value
            const usdVal = document.querySelector('#converted_value').value
            const bperc = document.querySelector('#bperc').value
            const mperc = document.querySelector('#mperc').value

            if (bal < amount) {
                console.log('err_bal');
            } else if (parseFloat(usdVal) < parseFloat(min)) {
                console.log('err_min');
            } else if (parseFloat(usdVal) > parseFloat(max)) {
                console.log('err_max');
            } else if (!usdVal) {
                console.log('empty');
            } else {
                $.ajax({
                    url: '../backend/actions/invest.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        uid,
                        wid,
                        amount,
                        wname,
                        planId,
                        planName,
                        bperc,
                        mperc,
                    },
                    success: (res) => {
                        if (res.header == 'invested') {
                            window.location = "../investments"
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