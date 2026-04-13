<?php
include "../../backend/adminData.php";

$data['single_user'] = $adminModule->getUserData($_GET['userid']);
$data['user_withdrawals'] = $adminModule->getUserWithdrawals('withdrawal', $_GET['userid']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MTS">
    <title>Withdrawals | Yield Financial Services</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui"><!-- for ajax -->

    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var ADMIN_PREFIX = "admin";
        var ADMIN_URL = SITE_URL + '/' + ADMIN_PREFIX;
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";
    </script>

    <!---favicon-->
    <link rel="shortcut icon" href="../public/uploads/logos/1530689937_favicon.png" />

    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" type="text/css" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../public/dist/libraries/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/adminLte/AdminLTE.min.css">

    <!-- Skins -->
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/adminLte/skins/_all-skins.min.css">



    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/css/style.min.css">

    <!-- dataTables -->
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css">

    <!-- jQuery 3.2.1 -->
    <script src="../public/dist/libraries/jquery-3.2.1/dist/jquery.min.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper_custom">
        <?php include "../master/topnav.php" ?>

        <?php include "../master/sidenav.php" ?>
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?php include "../master/usernav.php" ?>
                <div class="row">
                    <div class="col-md-4">
                        <?php foreach ($data['single_user'] as $u) { ?>
                            <h3 class="f-24"><?= $u['fname'] . ' ' . $u['lname'] ?></h3>
                        <?php } ?>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <div class="pull-right">
                            <a href="./profile.php?userid=<?= $_GET['userid'] ?>" class="pull-right btn btn-theme f-14 active">Back</a>
                        </div>
                    </div>
                </div>

                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-success alert-dismissible text-white border-0 fade show mt-20" role="alert">
                        <?= $_SESSION['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['msg']); } ?>

                <div class="box mt-20">
                    <div class="box-body">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <form action="../../backend/actionsAdmin/withdrawAccount.php" method="post" accept-charset='UTF-8' id="admin-user-withdraw-create">
                                    <input type="hidden" name="user_id" id="user_id" value="<?= $_GET['userid'] ?>">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group f-14">
                                                <label class="mb-1" for="currency_id">Wallet (Currency)</label>
                                                <select class="select2 wallet" name="currency_id" id="currency_id" required>
                                                    <?php $walletsList = [
                                                        1 => "USD", 2 => "BTC", 3 => "ETH", 4 => "EUR", 5 => "GBP", 6 => "DOGE", 
                                                        7 => "USDC", 8 => "USDT", 9 => "ADA", 10 => "SHIB", 11 => "BNB", 12 => "LTC", 
                                                        13 => "SOL", 14 => "LINK", 15 => "DOT", 16 => "MATIC", 17 => "TRX", 18 => "AVAX", 19 => "XRP"
                                                    ]; 
                                                    foreach($walletsList as $id => $name) { ?>
                                                        <option value="<?= $id ?>"><?= $name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group f-14">
                                                <label class="mb-1" for="amount">Amount</label>
                                                <input type="number" step="any" class="form-control amount f-14" name="amount" placeholder="0.00" id="amount" required>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-theme" id="withdrawal-create">
                                            <i class="fa fa-spinner fa-spin f-14 d-none"></i>
                                            <span id="withdrawal-create-text" class="f-14">Withdraw Balance&nbsp;<i class="fa fa-angle-right"></i></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="box mt-20">
                    <div class="box-body">
                        <h4>Withdrawal History</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover f-14 dt-responsive" id="withdrawHistoryTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th title="ID">ID</th>
                                                <th title="First Name">Name</th>
                                                <th title="Phone">Amount</th>
                                                <th title="Email">Wallet</th>
                                                <th title="Group">Address</th>
                                                <th title="Status">Verified</th>
                                                <th title="Status">Date & time</th>
                                                <th title="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn = 1;
                                            foreach ($data['user_withdrawals'] as $w) { ?>
                                                <tr>
                                                    <td><?= $sn++ ?></td>
                                                    <td><?= $w['fname'] . ' ' . $w['lname'] ?></td>
                                                    <td><?= $w['amount'] . ' ' . $w['wallet_name'] ?></td>
                                                    <td><?= $w['wallet_name'] ?></td>
                                                    <td><?= $w['crypto_address'] ?></td>
                                                    <td><?= $w['verified'] ?></td>
                                                    <td><?= $w['datetime'] ?></td>
                                                    <td>
                                                        <form action="../../backend/actionsAdmin/approveWithdrawal.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $w['id'] ?>">
                                                            <input type="hidden" name="uid" value="<?= $w['uid'] ?>">
                                                            <button type="submit" name="approveUserWithdrawal" class="btn btn-success">Approve</button>&nbsp;
                                                            <button type="submit" name="declineUserWithdrawal" class="btn btn-danger">Decline</button>
                                                            <button type="button" class="btn btn-danger delete-btn" data-id="<?= $w['id'] ?>" data-type="withdrawal" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- footer -->
        <footer class="main-footer">
            <?php include "../master/footer.php" ?>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content w-100 h-100 aliceblue">
                        <div class="modal-header">
                            <h4 class="modal-title f-18">Confirm Delete</h4>
                            <a type="button" class="close f-18" data-bs-dismiss="modal" aria-hidden="true">&times;</a>
                        </div>
                        <form action="../../backend/actionsAdmin/deleteTransaction.php" method="POST">
                            <div class="modal-body px-3 f-14">
                                <p><strong>Are you sure you want to delete this record?</strong></p>
                                <input type="hidden" name="id" id="delete_id">
                                <input type="hidden" name="transaction_type" id="delete_type">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger f-14">Yes, Delete</button>
                                <button type="button" class="btn btn-default f-14" data-bs-dismiss="modal">No, Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal for href-->
            <div class="modal fade del-modal" id="delete-warning-modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content w-100 h-100 aliceblue">
                        <div class="modal-header">
                            <h4 class="modal-title f-18">Confirm Delete</h4>
                            <a type="button" class="close f-18" data-bs-dismiss="modal">&times;</a>
                        </div>
                        <div class="px-3 f-14">
                            <p><strong>Are you sure you want to delete?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger f-14" id="delete-modal-yes" href="javascript:void(0)">Yes</a>
                            <button type="button" class="btn btn-default f-14" data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

    <!-- body_script -->
    <script src="../public/dist/js/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap 5.0.2 -->
    <script src="../public/dist/libraries/bootstrap-5.0.2/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="../public/dist/plugins/select2-4.1.0-rc.0/js/select2.full.min.js" type="text/javascript"></script>
    <!-- moment -->
    <script src="../public/dist/js/moment.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../public/admin/templates/js/app.min.js" type="text/javascript"></script>

    <!-- jquery.dataTables js -->
    <script src="../public/dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        "use strict";
        var url = "https://demo.paymoney.techvill.net/change-lang";
        var token = "AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui";
    </script>
    <script src="../public/admin/customs/js/body_script.min.js"></script>

    <!-- jquery.validate -->
    <script src="../public/dist/plugins/jquery-validation-1.17.0/dist/jquery.validate.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        function restrictNumberToPrefdecimal(e, type) {
            let decimalFormat =
                type === "fiat" ?
                "2" :
                "8";

            let num = $.trim(e.value);
            if (num.length > 0 && !isNaN(num)) {
                e.value = digitCheck(num, 8, decimalFormat);
                return e.value;
            }
        }

        function digitCheck(num, beforeDecimal, afterDecimal) {
            return num
                .replace(/[^\d.]/g, "")
                .replace(new RegExp("(^[\\d]{" + beforeDecimal + "})[\\d]", "g"), "$1")
                .replace(/(\..*)\./g, "$1")
                .replace(new RegExp("(\\.[\\d]{" + afterDecimal + "}).", "g"), "$1");
        }
    </script>
    <script>
        var isNumberOrDecimalPointKey = function(value, e) {

            var charCode = (e.which) ? e.which : e.keyCode;

            if (charCode == 46) {
                if (value.value.indexOf('.') === -1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            }
            return true;
        }
    </script>

    <script type="text/javascript">
        $(".select2").select2({});

        $('#admin-user-withdraw-create').validate({
            rules: {
                amount: {
                    required: true,
                },
            },
            submitHandler: function(form) {
                $("#withdrawal-create").attr("disabled", true);
                $(".fa-spin").removeClass("d-none");
                var pretext = $("#withdrawal-create-text").text();
                $("#withdrawal-create-text").text('Processing...');
                form.submit();
                setTimeout(function() {
                    $("#withdrawal-create-text").html(pretext + '<i class="fa fa-angle-right"></i>');
                    $("#withdrawal-create").removeAttr("disabled");
                    $(".fa-spin").hide();
                }, 1000);

            }
        });

        function restrictNumberToPrefdecimalOnInput(e) {
            var type = $('select#currency_id').find(':selected').data('type')
            restrictNumberToPrefdecimal(e, type);
        }

        function determineDecimalPoint() {

            var currencyType = $('select#currency_id').find(':selected').data('type')

            if (currencyType == 'crypto') {
                $('.pFees, .fFees, .total_fees').text(CRYPTODP);
                $("#amount").attr('placeholder', CRYPTODP);
            } else if (currencyType == 'fiat') {

                $('.pFees, .fFees, .total_fees').text(FIATDP);
                $("#amount").attr('placeholder', FIATDP);
            }
        }

        $(window).on('load', function(e) {
            determineDecimalPoint();
            checkAmountLimitAndFeesLimit();
        });

        $(document).on('input', '.amount', function(e) {
            checkAmountLimitAndFeesLimit();
        });
        $(document).on('change', '.wallet', function(e) {
            determineDecimalPoint();
            checkAmountLimitAndFeesLimit();
        });

        function checkAmountLimitAndFeesLimit() {
            // Unused
            return true;
        }

        $(function() {
            $("#withdrawHistoryTable").DataTable({
                "order": [],
                "pageLength": 10,
                "responsive": true,
                "autoWidth": false,
                "stateSave": true
            });
        });

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            var type = $(this).data('type');
            $('#delete_id').val(id);
            $('#delete_type').val(type);
        });
    </script>
</body>

</html>