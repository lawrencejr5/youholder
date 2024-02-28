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

    <title>Transactions | Yield Fiancial Services</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/daterangepicker-3.14.1/daterangepicker.min.css">
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
    <?php $page = "transactions"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="text-center">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Transactions</p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 r-f-12 l-sp64  mt-2 tran-title">History of
                            transactions in your account</p>
                    </div>
                    <div class="mt-22 mt-sm-4">
                        <div class="d-flex justify-content-between align-items-center r-pb-8 pb-10">
                            <p class="mb-0 text-gray-100 f-16 r-f-12 gilroy-medium dark-CDO">All Transactions</p>
                            <!-- <div class="d-flex align-items-center">
                                <p class="mb-0 text-gray-100 f-16 r-f-12 gilroy-medium dark-CDO pt-5p">Filter</p>
                                <a class="fil-btn ml-12">
                                    <img src="../public/dist/images/filter-on.svg">
                                    <img class="cross-none" src="../public/dist/images/filter-cross.svg">
                                </a>
                            </div> -->
                        </div>
                        <form action="" method="get">
                            <div class="filter-panel">
                                <div class="d-flex flex-wrap justify-content-between pb-26">
                                    <div class="d-flex flex-wrap align-items-center pb-2 pb-xl-0">

                                        <input id="startfrom" type="hidden" name="from" value="">
                                        <input id="endto" type="hidden" name="to" value="">

                                        <!-- DateRange Picker -->
                                        <div class="me-2">
                                            <div id="daterange-btn" class="param-ref filter-ref h-45 custom-daterangepicker">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1C8.55229 1 9 1.44772 9 2V3H15V2C15 1.44772 15.4477 1 16 1C16.5523 1 17 1.44772 17 2V3.00163C17.4755 3.00489 17.891 3.01471 18.2518 3.04419C18.8139 3.09012 19.3306 3.18868 19.816 3.43597C20.5686 3.81947 21.1805 4.43139 21.564 5.18404C21.8113 5.66937 21.9099 6.18608 21.9558 6.74817C22 7.28936 22 7.95372 22 8.75868V17.2413C22 18.0463 22 18.7106 21.9558 19.2518C21.9099 19.8139 21.8113 20.3306 21.564 20.816C21.1805 21.5686 20.5686 22.1805 19.816 22.564C19.3306 22.8113 18.8139 22.9099 18.2518 22.9558C17.7106 23 17.0463 23 16.2413 23H7.75868C6.95372 23 6.28936 23 5.74817 22.9558C5.18608 22.9099 4.66937 22.8113 4.18404 22.564C3.43139 22.1805 2.81947 21.5686 2.43597 20.816C2.18868 20.3306 2.09012 19.8139 2.04419 19.2518C1.99998 18.7106 1.99999 18.0463 2 17.2413V8.7587C1.99999 7.95373 1.99998 7.28937 2.04419 6.74817C2.09012 6.18608 2.18868 5.66937 2.43597 5.18404C2.81947 4.43139 3.43139 3.81947 4.18404 3.43597C4.66937 3.18868 5.18608 3.09012 5.74818 3.04419C6.10898 3.01471 6.52454 3.00489 7 3.00163V2C7 1.44772 7.44772 1 8 1ZM7 5.00176C6.55447 5.00489 6.20463 5.01356 5.91104 5.03755C5.47262 5.07337 5.24842 5.1383 5.09202 5.21799C4.7157 5.40973 4.40973 5.71569 4.21799 6.09202C4.1383 6.24842 4.07337 6.47262 4.03755 6.91104C4.00078 7.36113 4 7.94342 4 8.8V9H20V8.8C20 7.94342 19.9992 7.36113 19.9624 6.91104C19.9266 6.47262 19.8617 6.24842 19.782 6.09202C19.5903 5.7157 19.2843 5.40973 18.908 5.21799C18.7516 5.1383 18.5274 5.07337 18.089 5.03755C17.7954 5.01356 17.4455 5.00489 17 5.00176V6C17 6.55228 16.5523 7 16 7C15.4477 7 15 6.55228 15 6V5H9V6C9 6.55228 8.55229 7 8 7C7.44772 7 7 6.55228 7 6V5.00176ZM20 11H4V17.2C4 18.0566 4.00078 18.6389 4.03755 19.089C4.07337 19.5274 4.1383 19.7516 4.21799 19.908C4.40973 20.2843 4.7157 20.5903 5.09202 20.782C5.24842 20.8617 5.47262 20.9266 5.91104 20.9624C6.36113 20.9992 6.94342 21 7.8 21H16.2C17.0566 21 17.6389 20.9992 18.089 20.9624C18.5274 20.9266 18.7516 20.8617 18.908 20.782C19.2843 20.5903 19.5903 20.2843 19.782 19.908C19.8617 19.7516 19.9266 19.5274 19.9624 19.089C19.9992 18.6389 20 18.0566 20 17.2V11Z" fill="currentColor" />
                                                </svg>
                                                <p class="mb-0 gilroy-medium f-13 px-2">Pick a date range</p>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.40165 3.23453C1.6403 2.99588 2.02723 2.99588 2.26589 3.23453L5.50043 6.46908L8.73498 3.23453C8.97363 2.99588 9.36057 2.99588 9.59922 3.23453C9.83788 3.47319 9.83788 3.86012 9.59922 4.09877L5.93255 7.76544C5.6939 8.00409 5.30697 8.00409 5.06831 7.76544L1.40165 4.09877C1.16299 3.86012 1.16299 3.47319 1.40165 3.23453Z" fill="currentColor" />
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Transaction Types -->
                                        <!-- <div class="me-2">
                                            <div class="param-ref filter-ref w-135 h-45">
                                                <select class="select2 f-13" data-minimum-results-for-search="Infinity" id="type" name="type">
                                                    <option value="all" selected>All Type</option>
                                                    <option value="deposit">Deposit</option>
                                                    <option value="withdrawal">Withdrawal</option>
                                                    <option value="transferred">Transferred</option>
                                                    <option value="received">Received</option>
                                                    <option value="exchange_from">Exchange From</option>
                                                    <option value="exchange_to">Exchange To</option>
                                                    <option value="request_sent">Request Sent</option>
                                                    <option value="request_received">Request Received</option>
                                                    <option value="payment_sent">Payment Sent</option>
                                                    <option value="payment_received">Payment Received</option>
                                                    <option value="crypto_sent">Crypto Sent</option>
                                                    <option value="crypto_received">Crypto Received</option>
                                                    <option value="crypto_swap">Crypto Swap</option>
                                                    <option value="crypto_buy">Crypto Buy</option>
                                                    <option value="crypto_sell">Crypto Sell</option>
                                                    <option value="investment">Investment</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <!-- Status -->
                                        <div class="me-2">
                                            <div class="param-ref filter-ref w-135 h-45">
                                                <select class="select2 f-13" data-minimum-results-for-search="Infinity" id="status" name="status">
                                                    <option value="all" selected>All Status</option>
                                                    <option value="Success">Success</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Blocked">Cancelled</option>
                                                    <option value="Refund">Refunded</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Currency -->
                                        <div class="me-2">
                                            <div class="param-ref filter-ref w-135 h-45">
                                                <select class="select2 f-13" data-minimum-results-for-search="Infinity" id="wallet" name="wallet">
                                                    <option value="all" selected>All Currency</option>
                                                    <option value="2">GBP</option>
                                                    <option value="1">USD</option>
                                                    <option value="3">EUR</option>
                                                    <option value="9">LTCTEST</option>
                                                    <option value="10">BTC</option>
                                                    <option value="11">ETH</option>
                                                    <option value="30">DOGETEST</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-flex align-items-center p-2">
                                        <a href="https://demo.paymoney.techvill.net/transactions" class="reset-btn text-gray-100 f-14 gilroy-medium leading-17 tran-title">Reset</a>
                                        <button type="submit" class="apply-filter f-14 gilroy-medium leading-17 b-none">Apply
                                            Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if ($numOfTransactions == 0) { ?>
                        <p class="mb-0 f-18 leading-22 text-dark gilroy-Semibold">Nothing to see here...</p>
                        <img src="../public/dist/images/not-found.png" class="mt-24" alt="">
                    <?php } ?>
                    <?php foreach ($data['transactions'] as $t) { ?>


                        <div class="transac-parent cursor-pointer" data-id="<?= $t['id'] ?>" data-type="<?= $t['transaction_type'] ?>">
                            <div class="d-flex justify-content-between transac-child">
                                <div class="d-flex w-50">

                                    <!-- Image -->
                                    <div class="deposit-circle d-flex justify-content-center align-items-center">
                                        <img src="../public/uploads/currency_logos/<?= $t['wallet_img'] ?>" alt="Transaction">
                                    </div>

                                    <div class="ml-20 r-ml-8">
                                        <!-- Transaction Type -->

                                        <p class="mb-0 text-dark f-16 gilroy-medium theme-tran" style="text-transform: capitalize;"><?= $t['transaction_type'] ?></p>
                                        <div class="d-flex flex-wrap">

                                            <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">

                                                <?= $t['from_to'] ? $t['from_to'] : $fullname ?></p>

                                            <!-- Dot & Transaction Date -->
                                            <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                                <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2" cy="2" r="2" fill="currentColor" />
                                                </svg>
                                            </p>
                                            <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                                <?= $t['datetime'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">
                                            <?php if ($t['transaction_type'] == 'deposit') { ?>
                                                <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                                </svg>
                                            <?php } elseif ($t['transaction_type'] == 'withdrawal') { ?>
                                                <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                                </svg>
                                            <?php } elseif ($t['transaction_type'] == 'transfer from') { ?>

                                                <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                                </svg>
                                            <?php } elseif ($t['transaction_type'] == 'transfer to') { ?>
                                                <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                                </svg>
                                            <?php } elseif ($t['transaction_type'] == 'exchange from') { ?>
                                                <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                                </svg>
                                            <?php } elseif ($t['transaction_type'] == 'exchange to') { ?>
                                                <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                                </svg>
                                            <?php } ?>
                                            <?= $t['amount'] . ' ' . $t['wallet'] ?>
                                        </p>

                                        <?php if ($t['verified'] == 0) { ?>
                                            <p class="text-warning f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">Pending</p>
                                        <?php } elseif ($t['verified'] == 1) { ?>
                                            <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">Success</p>
                                        <?php } else { ?>
                                            <p class="text-danger f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">Failed</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


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

    <script>
        document.querySelectorAll('.transac-parent').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const transac_id = e.currentTarget.dataset.id
                const transac_type = e.currentTarget.dataset.type
                window.location = `./details.php?transac_id=${transac_id}&transac_type=${transac_type}`
            })
        })
    </script>

    <script src="../public/dist/plugins/daterangepicker-3.14.1/moment.min.js"></script>
    <script src="../public/dist/plugins/daterangepicker-3.14.1/daterangepicker.min.js"></script>
    <script>
        'use strict';
        let dateRangePickerText = 'Pick a date range';
        var startDate = "";
        var endDate = "";
        var cancellingText = "Cancelling...";
        var cancelledText = "Cancelled";
        var requestPaymentCancelUrl = "https://demo.paymoney.techvill.net/request_payment/cancel";
        var requestPaymentCreatorStatusCheckUrl = "https://demo.paymoney.techvill.net/request_payment/check-creator-status";
        var requestPaymentCreatorSuspendUrl = "https://demo.paymoney.techvill.net/check-request-creator-suspended-status";
        var requestPaymentCreatorInactiveUrl = "https://demo.paymoney.techvill.net/check-request-creator-inactive-status";
        var userStatus = "Active";
        var userStatusCheckUrl = "https://demo.paymoney.techvill.net/check-user-status";
    </script>
    <script src="../public/user/customs/js/user-status.min.js"></script>
    <script src="../public/user/customs/js/user-transaction.min.js"></script>
    <script src="../public/user/customs/js/transaction.min.js"></script>
    <!-- end js -->

</body>

</html>