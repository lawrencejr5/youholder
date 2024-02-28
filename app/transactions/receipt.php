<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');
// !$_GET['amt'] && !$_GET['curr'] && !$_GET['address'] &&
//     header('location: ../deposit');
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YieldFincs Transaction Receipt</title>
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
    <!-- end css -->

    <!-- favicon -->
    <link rel="shortcut icon" href="/youholder/public/logos/favicon.png">

</head>

<body>
    <div class="position-relative">
        <div class="containt-parent">
            <div class="main-containt">

                <!-- main-containt -->
                <div class="bg-white pxy-62 shadow" id="depositConfirm">
                    <center><img src="/youholder/public/logos/yield-logo.png" width="150px" height="auto" alt=""></center>

                    <form>
                        <input type="hidden" name="_token" value="kIte8862DuGRvS3wAffFj2TC0j1SygL6deKEbxei" autocomplete="off"> <input type="hidden" name="method" id="method" value="6">
                        <input type="hidden" name="amount" id="amount" value="501.6">
                        <?php $transaction = $modules->getSingleTransaction($_GET['transac_id'], $_GET['transac_type']) ?>
                        <?php foreach ($transaction as $t) { ?>
                            <!-- Confirm Details -->
                            <div class="mt-32 param-ref text-center transac-box">
                                <div class="mt-40 transaction-box">
                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Transaction type</p>
                                        <p class="mb-0 f-16 gilroy-medium text-dark text-capitalize"><?= $t['transaction_type'] ?></p>
                                    </div>
                                    <hr>
                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Amount</p>
                                        <p class="mb-0 f-16 gilroy-medium text-dark"><?= $t['amount'] ?> <?= $t['wallet'] ?></p>
                                    </div>
                                    <hr>
                                    <?php if ($t['transaction_type'] == 'deposit') { ?>
                                        <!-- Total -->
                                        <div class="d-flex justify-content-between mt-3 total">
                                            <p class="mb-0 f-16 gilroy-medium text-dark">Deposited Amount</p>
                                            <p class="mb-0 f-16 gilroy-medium text-dark text-uppercase"><?= $t['deposit_amt'] ?> <?= $t['currency'] ?></p>
                                        </div>
                                        <hr>
                                    <?php } ?>
                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Wallet</p>
                                        <p class="mb-0 f-16 gilroy-medium text-dark"><?= $t['wallet'] ?></p>
                                    </div>
                                    <hr>
                                    <?php if ($t['transaction_type'] == 'deposit' || $t['transaction_type'] == 'withdrawal') { ?>
                                        <!-- Total -->
                                        <div class="d-flex justify-content-between mt-3 total">
                                            <p class="mb-0 f-16 gilroy-medium text-dark">Address</p>
                                            <p class="mb-0 f-16 gilroy-medium text-dark"><?= $t['crypto_address'] ?></p>
                                        </div>
                                        <hr>
                                    <?php } ?>
                                    <?php if ($t['from_to']) { ?>
                                        <!-- Total -->
                                        <?php if ($t['transaction_type'] == 'transfer from') { ?>
                                            <div class="d-flex justify-content-between mt-3 total">
                                                <p class="mb-0 f-16 gilroy-medium text-dark">From your account</p>
                                                <p class="mb-0 f-16 gilroy-medium text-dark"><?= $t['from_to'] ?></p>
                                            </div>
                                            <hr>
                                        <?php } elseif ($t['transaction_type'] == 'transfer to') { ?>
                                            <div class="d-flex justify-content-between mt-3 total">
                                                <p class="mb-0 f-16 gilroy-medium text-dark">Transfered to account</p>
                                                <p class="mb-0 f-16 gilroy-medium text-dark"><?= $t['from_to'] ?></p>
                                            </div>
                                            <hr>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($t['transaction_type'] == 'transfer from' || $t['transaction_type'] == 'transfer to') { ?>
                                        <!-- Total -->
                                        <div class="d-flex justify-content-between mt-3 total">
                                            <p class="mb-0 f-16 gilroy-medium text-dark">Notes</p>
                                            <p class="mb-0 f-16 gilroy-medium text-dark"></p>
                                        </div>
                                        <hr>
                                    <?php } ?>
                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Date</p>
                                        <p class="mb-0 f-16 gilroy-medium text-dark"><?= $t['datetime'] ?></p>
                                    </div>
                                    <hr>
                                    <!-- Total -->
                                    <div class="d-flex justify-content-between mt-3 total">
                                        <p class="mb-0 f-16 gilroy-medium text-dark">Status</p>
                                        <?php if ($t['verified'] == '1') { ?>
                                            <p class="mb-0 f-16 gilroy-medium text-success">Success</p>
                                        <?php } elseif ($t['verified'] == '0') { ?>
                                            <p class="mb-0 f-16 gilroy-medium text-warning">Pending</p>
                                        <?php } elseif ($t['verified'] == '2') { ?>
                                            <p class="mb-0 f-16 gilroy-medium text-danger">Declined</p>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        <?php } ?>
                        <button class="btn btn-lg btn-primary dash-print-btn mt-24 green-btn" type="button" onclick="window.print()">
                            <svg class="mr-10" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.23077 12.8333H10.7692V10.5H3.23077V12.8333ZM3.23077 7H10.7692V3.5H9.42308C9.19872 3.5 9.00801 3.41493 8.85096 3.24479C8.69391 3.07465 8.61538 2.86806 8.61538 2.625V1.16667H3.23077V7ZM12.9231 7.58333C12.9231 7.42535 12.8698 7.28863 12.7632 7.17318C12.6567 7.05773 12.5304 7 12.3846 7C12.2388 7 12.1126 7.05773 12.006 7.17318C11.8994 7.28863 11.8462 7.42535 11.8462 7.58333C11.8462 7.74132 11.8994 7.87804 12.006 7.99349C12.1126 8.10894 12.2388 8.16667 12.3846 8.16667C12.5304 8.16667 12.6567 8.10894 12.7632 7.99349C12.8698 7.87804 12.9231 7.74132 12.9231 7.58333ZM14 7.58333V11.375C14 11.454 13.9734 11.5224 13.9201 11.5801C13.8668 11.6378 13.8037 11.6667 13.7308 11.6667H11.8462V13.125C11.8462 13.3681 11.7676 13.5747 11.6106 13.7448C11.4535 13.9149 11.2628 14 11.0385 14H2.96154C2.73718 14 2.54647 13.9149 2.38942 13.7448C2.23237 13.5747 2.15385 13.3681 2.15385 13.125V11.6667H0.269231C0.196314 11.6667 0.133213 11.6378 0.0799279 11.5801C0.0266426 11.5224 0 11.454 0 11.375V7.58333C0 7.1033 0.158453 6.69162 0.475361 6.34831C0.792268 6.00499 1.17228 5.83333 1.61538 5.83333H2.15385V0.875C2.15385 0.631944 2.23237 0.425347 2.38942 0.255208C2.54647 0.0850694 2.73718 0 2.96154 0H8.61538C8.83974 0 9.08654 0.0607639 9.35577 0.182292C9.625 0.303819 9.83814 0.449653 9.99519 0.619792L11.274 2.00521C11.4311 2.17535 11.5657 2.40625 11.6779 2.69792C11.7901 2.98958 11.8462 3.25694 11.8462 3.5V5.83333H12.3846C12.8277 5.83333 13.2077 6.00499 13.5246 6.34831C13.8415 6.69162 14 7.1033 14 7.58333Z" fill="Currentcolor" />
                            </svg>
                            <span class="f-12 leading-20 gilroy-medium">Print Receipt</span>
                        </button>
                        <button class="btn btn-lg btn-dark dash-print-btn mt-24 green-btn" type="button" onclick="history.go(-1)">
                            <span class="f-12 leading-20 gilroy-medium">Back</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>