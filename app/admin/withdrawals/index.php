<?php
include "../../backend/adminData.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MTS">
    <title>Users | Yield Financial Services</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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


    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/daterangepicker-3.1/daterangepicker.min.css">

    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/css/style.min.css">

    <!-- dataTables -->
    <link rel="stylesheet" type="text/css"
        href="../public/dist/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="../public/dist/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css">



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
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">
                        <?= $_SESSION['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['msg']);
                } ?>
                <div class="box box-default">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="top-bar-title padding-bottom pull-left">All Withdrawals</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover f-14 dt-responsive"
                                            id="withdrawTable" width="100%" cellspacing="0">
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
                                                foreach ($data['withdrawals'] as $w) { ?>
                                                    <tr>
                                                        <td><?= $sn++ ?></td>
                                                        <td><?= $w['fname'] . ' ' . $w['lname'] ?></td>
                                                        <td><?= $w['amount'] . ' ' . $w['wallet_name'] ?></td>
                                                        <td><?= $w['wallet_name'] ?></td>
                                                        <td><?= $w['crypto_address'] ?></td>
                                                        <td><?= $w['verified'] ?></td>
                                                        <td><?= $w['datetime'] ?></td>
                                                        <td>
                                                            <form action="../../backend/actionsAdmin/approveWithdrawal.php"
                                                                method="post" style="display:inline;">
                                                                <input type="hidden" name="id" value="<?= $w['id'] ?>">
                                                                <button type="submit" name="approveWithdrawal"
                                                                    class="btn btn-success">Approve</button>&nbsp;
                                                                <button type="submit" name="declineWithdrawal"
                                                                    class="btn btn-danger">Decline</button>
                                                            </form>
                                                            <button type="button" class="btn btn-info edit-btn"
                                                                data-id="<?= $w['id'] ?>" data-amount="<?= $w['amount'] ?>"
                                                                data-wallet_name="<?= $w['wallet_name'] ?>"
                                                                data-crypto_address="<?= $w['crypto_address'] ?>"
                                                                data-datetime="<?= $w['datetime'] ?>"
                                                                data-transaction_type="<?= $w['transaction_type'] ?>"
                                                                data-from_to="<?= $w['from_to'] ?>"
                                                                data-status="<?= $w['verified'] ?>"
                                                                onclick="setEditWithdrawData(this)" data-bs-toggle="modal"
                                                                data-bs-target="#editWithdrawModal">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger delete-btn"
                                                                data-id="<?= $w['id'] ?>" data-type="withdrawal"
                                                                onclick="setDeleteData(this)" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal"><i
                                                                    class="fa fa-trash"></i></button>
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
                </div>
            </section>
        </div>

        <!-- footer -->
        <footer class="main-footer">
            <?php include "../master/footer.php" ?>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
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
                                <button type="button" class="btn btn-default f-14" data-bs-dismiss="modal">No,
                                    Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Withdrawal Modal -->
            <div class="modal fade" id="editWithdrawModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content aliceblue">
                        <form action="../../backend/actionsAdmin/manageWithdrawals.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Withdrawal</h5>
                                <button type="button" class="btn-close f-18" data-bs-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit_withdraw_id">
                                <div class="form-group mb-3">
                                    <label>Amount</label>
                                    <input type="text" name="amount" id="edit_amount" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Wallet Name</label>
                                    <input type="text" name="wallet_name" id="edit_wallet_name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Crypto Address</label>
                                    <input type="text" name="crypto_address" id="edit_crypto_address"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Transaction Type</label>
                                    <input type="text" name="transaction_type" id="edit_transaction_type"
                                        class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>From/To</label>
                                    <input type="text" name="from_to" id="edit_from_to" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Datetime</label>
                                    <input type="text" name="datetime" id="edit_datetime" class="form-control" required
                                        placeholder="YYYY-MM-DD HH:MM:SS">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select name="status" id="edit_status" class="form-control">
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Declined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updateWithdrawal" class="btn btn-theme">Update
                                    Withdrawal</button>
                            </div>
                        </form>
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
    <script src="../public/dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"
        type="text/javascript"></script>
    <script src="../public/dist/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"
        type="text/javascript"></script>


    <script type="text/javascript">
        "use strict";
        var url = "https://demo.paymoney.techvill.net/change-lang";
        var token = "OTpM8byuH3VBQSARTeNYjYvSnedO9Nxuy9BhbgsC";
    </script>
    <script src="../public/admin/customs/js/body_script.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#withdrawTable").DataTable({
                "order": [],
                "pageLength": 10,
                "responsive": true,
                "autoWidth": false,
                "stateSave": true
            });
        });

        function setEditWithdrawData(btn) {
            var id = btn.getAttribute('data-id');
            var amount = btn.getAttribute('data-amount');
            var wallet_name = btn.getAttribute('data-wallet_name');
            var crypto_address = btn.getAttribute('data-crypto_address');
            var datetime = btn.getAttribute('data-datetime');
            var transaction_type = btn.getAttribute('data-transaction_type');
            var from_to = btn.getAttribute('data-from_to');
            var status = btn.getAttribute('data-status');

            document.getElementById('edit_withdraw_id').value = id;
            document.getElementById('edit_amount').value = amount;
            document.getElementById('edit_wallet_name').value = wallet_name;
            document.getElementById('edit_crypto_address').value = crypto_address;
            document.getElementById('edit_datetime').value = datetime;
            document.getElementById('edit_transaction_type').value = transaction_type;
            document.getElementById('edit_from_to').value = from_to;
            document.getElementById('edit_status').value = status;
        }

        function setDeleteData(btn) {
            var id = btn.getAttribute('data-id');
            var type = btn.getAttribute('data-type');
            document.getElementById('delete_id').value = id;
            document.getElementById('delete_type').value = type;
        }
    </script>
</body>

</html>