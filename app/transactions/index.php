<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">

    <title>Transactions | Pay Money</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/daterangepicker-3.14.1/daterangepicker.min.css">
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
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-gray-100 f-16 r-f-12 gilroy-medium dark-CDO pt-5p">Filter</p>
                                <a class="fil-btn ml-12">
                                    <img src="../public/dist/images/filter-on.svg">
                                    <img class="cross-none" src="../public/dist/images/filter-cross.svg">
                                </a>
                            </div>
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
                                        <div class="me-2">
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
                                        </div>

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
                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-0">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">

                                <!-- Image -->
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="../public/uploads/user-profile/1532333460.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <!-- Transaction Type -->
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Crypto Received</p>
                                    <div class="d-flex flex-wrap">

                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Kyla Sarah</p>

                                        <!-- Dot & Transaction Date -->
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            11-12-2023 12:16 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">

                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg>
                                        Ɖ 2
                                    </p>


                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success</p>
                                </div>
                                <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-0">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Modal -->
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
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="../public/uploads/user-profile/1532333460.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Received&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                Ɖ 2</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                11-12-2023 12:16 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/transactions/crypto-sent-received-print/eyJpdiI6InVUdzJ5dG1qVmczK0o5LzJSTHRZNUE9PSIsInZhbHVlIjoibkdOOGU4eXRQZEtpNyt0Y1dZMmZyZz09IiwibWFjIjoiYTBkMDlmZGE2Y2Y3ZDExOGM4NTE3MjJiYmU1YTM4NjBlZmEwNDAwM2VkZjBhMjkxYzY4OWU0M2NmOTdjODljOCIsInRhZyI6IiJ9" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center" target="__blank">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;
                                                    <span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <!-- Crypto Address -->
                                            <div class="row gx-sm-5">
                                                <div class="col-12">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Sender
                                                        Address</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        njsBLaRgk66e1yzqdvAK4SFNapuLfMZugE
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Sender</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Kyla Sarah</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        DOGETEST</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        C346154FE1948</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">

                                                        -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        TatumIo</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p id="status_150" class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Received&nbsp;Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        Ɖ 2</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        Ɖ 2</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->


                                            <!-- Accept and Cancel button -->

                                            <!-- Open dispute -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-1">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Investment</p>
                                    <div class="d-flex flex-wrap">
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Dimond</p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                            23-07-2023 11:13 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">
                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg> £ 300</span>
                                    </p>

                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success
                                    </p>
                                </div>
                                <div class="cursor-pointer transaction-arrow  ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-1">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-overly" id="transaction-Info-1" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Transaction&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                £ 300</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                23-07-2023 11:13 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/investment-money/print/147" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;<span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        GBP</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        A14352BA13BAC</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Pay Money</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        £ 300</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        £ 300</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-2">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Investment</p>
                                    <div class="d-flex flex-wrap">
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Premium Plan</p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                            23-07-2023 10:03 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">
                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg> $ 350</span>
                                    </p>

                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success
                                    </p>
                                </div>
                                <div class="cursor-pointer transaction-arrow  ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-2">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-overly" id="transaction-Info-2" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Transaction&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                $ 350</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                23-07-2023 10:03 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/investment-money/print/145" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;<span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        USD</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        F2F2AD2D5858E</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Paypal</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        $ 350</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        $ 350</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-3">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Investment</p>
                                    <div class="d-flex flex-wrap">
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Silver</p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                            23-07-2023 10:01 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">
                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg> € 250</span>
                                    </p>

                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success
                                    </p>
                                </div>
                                <div class="cursor-pointer transaction-arrow  ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-3">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-overly" id="transaction-Info-3" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Transaction&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                € 250</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                23-07-2023 10:01 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/investment-money/print/144" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;<span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        EUR</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        6A367EBF02619</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Stripe</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        € 250</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        € 250</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-4">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Investment</p>
                                    <div class="d-flex flex-wrap">
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Platinum</p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                            22-11-2022 11:09 PM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">
                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg> Ł 300</span>
                                    </p>

                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success
                                    </p>
                                </div>
                                <div class="cursor-pointer transaction-arrow  ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-4">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-overly" id="transaction-Info-4" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="https://demo.paymoney.techvill.net/Modules/Investment/Resources/assets/investment.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Transaction&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                Ł 300</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                22-11-2022 11:09 PM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/investment-money/print/143" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;<span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        LTC</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        D7B1A9B94F1E0</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Pay Money</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Invested Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        Ł 300</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        Ł 300</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-5">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">

                                <!-- Image -->
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="../public/dist/images/gateways/crypto.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <!-- Transaction Type -->
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Withdrawal</p>
                                    <div class="d-flex flex-wrap">

                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Crypto</p>

                                        <!-- Dot & Transaction Date -->
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            24-07-2023 5:19 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">

                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                        </svg>
                                        Ξ 0.053
                                    </p>


                                    <p class="text-warning f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Pending</p>
                                </div>
                                <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-5">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Modal -->
                    <div class="modal fade modal-overly" id="transaction-Info-5" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="../public/dist/images/gateways/crypto.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Withdrawal&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                Ξ 0.053</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                24-07-2023 5:19 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/withdrawal-money/print/140" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center" target="__blank">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;
                                                    <span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <!-- Crypto Address -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Withdrawal By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        ETH</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        D3DCDAF1ACA18</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">

                                                        Ξ 0.00646
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Crypto</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p id="status_140" class="mb-0 mt-5p text-warning gilroy-medium f-15 leading-22 r-text">
                                                        Pending</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Withdrawal&nbsp;Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        Ξ 0.053</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        Ξ -0.05946</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Withdrawal Account</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        0x6BcA3DdEf6c42Cc8B741F8604b7cf7185f016782</p>
                                                </div>
                                            </div>

                                            <!-- Accept and Cancel button -->

                                            <!-- Open dispute -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-6">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">

                                <!-- Image -->
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="../public/uploads/merchant/1532329173.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <!-- Transaction Type -->
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Payment Received</p>
                                    <div class="d-flex flex-wrap">

                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">Pay
                                            Money</p>

                                        <!-- Dot & Transaction Date -->
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            20-07-2023 6:56 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">

                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg>
                                        $ 38
                                    </p>


                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success</p>
                                </div>
                                <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-6">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Modal -->
                    <div class="modal fade modal-overly" id="transaction-Info-6" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="../public/uploads/merchant/1532329173.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Payment&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                $ 38</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                20-07-2023 6:56 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/transactions/merchant-payment-print/139" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center" target="__blank">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;
                                                    <span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <!-- Crypto Address -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Kyla Sarah</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        USD</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        36A208F51C4CA</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">

                                                        $ 7.99
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Pay Money</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p id="status_139" class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment&nbsp;Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        $ 38</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        $ 45.99</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->


                                            <!-- Accept and Cancel button -->

                                            <!-- Open dispute -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-7">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">

                                <!-- Image -->
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="../public/uploads/currency_logos/icons8-euro-64.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <!-- Transaction Type -->
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Exchange To</p>
                                    <div class="d-flex flex-wrap">

                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">EUR
                                        </p>

                                        <!-- Dot & Transaction Date -->
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            20-07-2023 6:54 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">

                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                        </svg>
                                        € 85
                                    </p>


                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success</p>
                                </div>
                                <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-7">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Modal -->
                    <div class="modal fade modal-overly" id="transaction-Info-7" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="../public/uploads/currency_logos/icons8-euro-64.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Exchanged&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                € 85</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                20-07-2023 6:54 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/transactions/exchangeTransactionPrintPdf/137" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center" target="__blank">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;
                                                    <span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <!-- Crypto Address -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Exchanged By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        EUR</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        6E58B0B6B61A7</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">

                                                        -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        -</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p id="status_137" class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Exchanged&nbsp;Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        € 85</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        € 85</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->


                                            <!-- Accept and Cancel button -->

                                            <!-- Open dispute -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-8">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">

                                <!-- Image -->
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="../public/uploads/currency_logos/icons8-us-dollar-64.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <!-- Transaction Type -->
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Exchange From</p>
                                    <div class="d-flex flex-wrap">

                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">USD
                                        </p>

                                        <!-- Dot & Transaction Date -->
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            20-07-2023 6:54 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">

                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                        </svg>
                                        $ 100
                                    </p>


                                    <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Success</p>
                                </div>
                                <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-8">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Modal -->
                    <div class="modal fade modal-overly" id="transaction-Info-8" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="../public/uploads/currency_logos/icons8-us-dollar-64.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Exchanged&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                $ 100</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                20-07-2023 6:54 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/transactions/exchangeTransactionPrintPdf/136" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center" target="__blank">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;
                                                    <span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <!-- Crypto Address -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Exchanged By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        USD</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        6E58B0B6B61A7</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">

                                                        $ 1.12
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        -</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p id="status_136" class="mb-0 mt-5p text-success gilroy-medium f-15 leading-22 r-text">
                                                        Success</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Exchanged&nbsp;Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        $ 100</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        $ -101.12</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->


                                            <!-- Accept and Cancel button -->

                                            <!-- Open dispute -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="transac-parent cursor-pointer" data-bs-toggle="modal" data-bs-target="#transaction-Info-9">
                        <div class="d-flex justify-content-between transac-child">
                            <div class="d-flex w-50">

                                <!-- Image -->
                                <div class="deposit-circle d-flex justify-content-center align-items-center">
                                    <img src="../public/dist/images/gateways/paypal.png" alt="Transaction">
                                </div>

                                <div class="ml-20 r-ml-8">
                                    <!-- Transaction Type -->
                                    <p class="mb-0 text-dark f-16 gilroy-medium theme-tran">Withdrawal</p>
                                    <div class="d-flex flex-wrap">

                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                            Paypal</p>

                                        <!-- Dot & Transaction Date -->
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </p>
                                        <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                            20-07-2023 6:53 AM
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">

                                        <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                        </svg>
                                        £ 50
                                    </p>


                                    <p class="text-danger f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">
                                        Cancelled</p>
                                </div>
                                <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                    <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-9">
                                        <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Modal -->
                    <div class="modal fade modal-overly" id="transaction-Info-9" tabindex="-1" aria-hidden="true">
                        <div class="transac modal-dialog modal-dialog-centered modal-lg res-dialog">
                            <div class="modal-content modal-transac transaction-modal">
                                <div class="modal-body modal-themeBody">
                                    <div class="d-flex position-relative modal-res">
                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                            <svg class="position-absolute close-btn text-gray-100" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <div class="deposit-transac d-flex flex-column justify-content-center p-4 text-wrap">
                                            <div class="d-flex justify-content-center text-primary align-items-center transac-img">
                                                <img src="../public/dist/images/gateways/paypal.png" alt="Transaction" class="img-fluid">
                                            </div>
                                            <p class="mb-0 mt-28 text-dark gilroy-medium f-15 r-f-12 r-mt-18 text-center">
                                                Withdrawal&nbsp;Amount</p>
                                            <p class="mb-0 text-dark gilroy-Semibold f-24 leading-29 r-f-26 text-center l-s2 mt-10">
                                                £ 50</p>
                                            <p class="mb-0 mt-18 text-gray-100 gilroy-medium f-13 leading-20 r-f-14 text-center">
                                                20-07-2023 6:53 AM</p>
                                            <div class="d-flex justify-content-center">
                                                <a href="https://demo.paymoney.techvill.net/withdrawal-money/print/135" class="infoBtn-print cursor-pointer f-14 gilroy-medium text-dark mt-35 d-flex justify-content-center align-items-center" target="__blank">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.15385 16.5H13.8462V13.5H4.15385V16.5ZM4.15385 9H13.8462V4.5H12.1154C11.8269 4.5 11.5817 4.39062 11.3798 4.17188C11.1779 3.95312 11.0769 3.6875 11.0769 3.375V1.5H4.15385V9ZM16.6154 9.75C16.6154 9.54688 16.5469 9.37109 16.4099 9.22266C16.2728 9.07422 16.1106 9 15.9231 9C15.7356 9 15.5733 9.07422 15.4363 9.22266C15.2993 9.37109 15.2308 9.54688 15.2308 9.75C15.2308 9.95312 15.2993 10.1289 15.4363 10.2773C15.5733 10.4258 15.7356 10.5 15.9231 10.5C16.1106 10.5 16.2728 10.4258 16.4099 10.2773C16.5469 10.1289 16.6154 9.95312 16.6154 9.75ZM18 9.75V14.625C18 14.7266 17.9657 14.8145 17.8972 14.8887C17.8287 14.9629 17.7476 15 17.6538 15H15.2308V16.875C15.2308 17.1875 15.1298 17.4531 14.9279 17.6719C14.726 17.8906 14.4808 18 14.1923 18H3.80769C3.51923 18 3.27404 17.8906 3.07212 17.6719C2.87019 17.4531 2.76923 17.1875 2.76923 16.875V15H0.346154C0.252404 15 0.171274 14.9629 0.102764 14.8887C0.0342548 14.8145 0 14.7266 0 14.625V9.75C0 9.13281 0.203726 8.60352 0.611178 8.16211C1.01863 7.7207 1.50721 7.5 2.07692 7.5H2.76923V1.125C2.76923 0.8125 2.87019 0.546875 3.07212 0.328125C3.27404 0.109375 3.51923 0 3.80769 0H11.0769C11.3654 0 11.6827 0.078125 12.0288 0.234375C12.375 0.390625 12.649 0.578125 12.851 0.796875L14.4952 2.57812C14.6971 2.79688 14.8702 3.09375 15.0144 3.46875C15.1587 3.84375 15.2308 4.1875 15.2308 4.5V7.5H15.9231C16.4928 7.5 16.9814 7.7207 17.3888 8.16211C17.7963 8.60352 18 9.13281 18 9.75Z" fill="currentColor" />
                                                    </svg>&nbsp;
                                                    <span>Print</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-20 trans-details">
                                            <p class="mb-0 mt-9 text-dark dark-5B f-20 gilroy-Semibold transac-title">
                                                Transaction Details</p>

                                            <!-- Crypto Address -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Withdrawal By</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Irish Watson</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Currency</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        GBP</p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction ID</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        8B1818D0732E6</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Transaction Fee</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">

                                                        £ 3.1
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Payment Method</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        Paypal</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Status</p>
                                                    <p id="status_135" class="mb-0 mt-5p text-danger gilroy-medium f-15 leading-22 r-text">
                                                        Cancelled</p>
                                                </div>
                                            </div>
                                            <p class="hr-border w-100 mb-0"></p>
                                            <div class="row gx-sm-5">

                                                <!-- Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Withdrawal&nbsp;Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        £ 50</p>
                                                </div>

                                                <!-- Total Amount -->
                                                <div class="col-6">
                                                    <p class="mb-0 mt-4 text-gray-100 dark-B87 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Total Amount</p>
                                                    <p class="mb-0 mt-5p text-dark dark-CDO gilroy-medium f-15 leading-22 r-text">
                                                        £ -53.1</p>
                                                </div>
                                            </div>

                                            <!-- Transaction Note -->

                                            <div class="row gx-sm-5">
                                                <div class="col-6">
                                                    <p class="mb-0 mt-20 text-gray-100 gilroy-medium f-13 leading-20 r-f-9 r-mt-11">
                                                        Withdrawal Account</p>
                                                    <p class="mb-0 mt-5p text-dark gilroy-medium f-15 leading-22 r-text">
                                                        irish@gmail.com</p>
                                                </div>
                                            </div>

                                            <!-- Accept and Cancel button -->

                                            <!-- Open dispute -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <div class="mt-3">
                            <nav class="pagi-nav f-13 gilroy-regular d-flex justify-content-between align-items-center" aria-label="...">
                                <ul class="pagination mb-0 r-pagi">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript:void(0)">
                                            <svg class="me-1 nscaleX-1 rtl-wrap-two" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.05603 1.27356C7.27299 1.49052 7.27299 1.84227 7.05603 2.05923L4.11554 4.99973L7.05603 7.94022C7.27299 8.15718 7.27299 8.50894 7.05603 8.7259C6.83907 8.94286 6.48731 8.94286 6.27036 8.7259L2.93702 5.39257C2.72007 5.17561 2.72007 4.82385 2.93702 4.60689L6.27036 1.27356C6.48732 1.0566 6.83907 1.0566 7.05603 1.27356Z" fill="currentColor" />
                                            </svg>
                                            Prev
                                        </a>
                                    </li>



                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=2">2</a></li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=3">3</a></li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=4">4</a></li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=5">5</a></li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=6">6</a></li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=7">7</a></li>
                                    <li class="page-item"><a class="page-link" href="https://demo.paymoney.techvill.net/transactions?page=8">8</a></li>


                                    <li class="page-item">
                                        <a class="page-link dark-A0" href="https://demo.paymoney.techvill.net/transactions?page=2">
                                            Next
                                            <svg class="ms-1 rtl-wrap-one nscaleX-1" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.94397 1.27356C2.72701 1.49052 2.72701 1.84227 2.94397 2.05923L5.88446 4.99973L2.94397 7.94022C2.72701 8.15718 2.72701 8.50894 2.94397 8.7259C3.16093 8.94286 3.51269 8.94286 3.72964 8.7259L7.06298 5.39257C7.27993 5.17561 7.27993 4.82385 7.06298 4.60689L3.72964 1.27356C3.51268 1.0566 3.16093 1.0566 2.94397 1.27356Z" fill="currentColor" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                <div>
                                    <p class="mb-0 text-gray-100 tran-title page-limite">Showing: 1 - 10 of 71</p>
                                </div>
                            </nav>
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