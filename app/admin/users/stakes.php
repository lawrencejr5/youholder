<?php
include "../../backend/adminData.php";

$data['user_wallets'] = $adminModule->getUserWallets($_GET['userid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MTS">
    <title>Wallets | Yield Financial Services</title>
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


    <!-- dataTables -->
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css">

    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/css/style.min.css">

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
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show mt-20" role="alert">
                        <?= $_SESSION['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['msg']); } ?>

                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 f-14">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover pt-3" id="eachuserwallet">
                                                <thead>
                                                    <tr>
                                                        <th title="ID">ID</th>
                                                        <th title="First Name">First name</th>
                                                        <th title="First Name">Last name</th>
                                                        <th title="Phone">Plan</th>
                                                        <th title="Email">Staked</th>
                                                        <th title="Email">Expected</th>
                                                        <th title="Email">Daily Earned</th>
                                                        <th title="Status">Earned</th>
                                                        <th title="Status">Start date</th>
                                                        <th title="Status">End Date</th>
                                                        <th title="Action">Status</th>
                                                        <th title="Action">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sn = 1;
                                                    $data['stakings'] = $adminModule->getUserStakes($_GET['userid']);
                                                    foreach ($data['stakings'] as $s) { ?>
                                                        <tr>
                                                            <td><?= $sn++ ?></td>
                                                            <td><?= $s['fname'] ?></td>
                                                            <td><?= $s['lname'] ?></td>
                                                            <td><?= $s['plan_name'] ?></td>
                                                            <td><?= $s['staked'] ?></td>
                                                            <td><?= $s['expected'] ?></td>
                                                            <td><?= $s['daily_earned'] ?></td>
                                                            <td><?= $s['earned'] ?></td>
                                                            <td><?= $s['start_date'] ?></td>
                                                            <td><?= $s['end_date'] ?></td>
                                                            <td><?= $s['status'] ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-info edit-btn" 
                                                                    data-id="<?= $s['id'] ?>" 
                                                                    data-staked="<?= $s['staked'] ?>" 
                                                                    data-expected="<?= $s['expected'] ?>" 
                                                                    data-daily="<?= $s['daily_earned'] ?>" 
                                                                    data-earned="<?= $s['earned'] ?>" 
                                                                    data-start="<?= $s['start_date'] ?>" 
                                                                    data-end="<?= $s['end_date'] ?>" 
                                                                    data-status="<?= $s['status'] ?>" 
                                                                    onclick="setEditStakeData(this)" 
                                                                    data-bs-toggle="modal" data-bs-target="#editStakeModal">
                                                                    <i class="fa fa-edit"></i></button>

                                                                <button type="button" class="btn btn-danger delete-btn" data-id="<?= $s['id'] ?>" data-type="staking" onclick="setDeleteData(this)" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></button>
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

            <!-- Edit Stake Modal -->
            <div class="modal fade" id="editStakeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content aliceblue">
                        <form action="../../backend/actionsAdmin/manageStakes.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Stake</h5>
                                <button type="button" class="btn-close f-18" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit_stake_id">
                                <div class="form-group mb-3">
                                    <label>Staked Amount</label>
                                    <input type="text" name="staked" id="edit_staked" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Expected Amount</label>
                                    <input type="text" name="expected" id="edit_expected" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Daily Earned</label>
                                    <input type="text" name="daily_earned" id="edit_daily" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Earned</label>
                                    <input type="text" name="earned" id="edit_earned" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Start Date</label>
                                    <input type="text" name="start_date" id="edit_start" class="form-control" required placeholder="YYYY-MM-DD">
                                </div>
                                <div class="form-group mb-3">
                                    <label>End Date</label>
                                    <input type="text" name="end_date" id="edit_end" class="form-control" required placeholder="YYYY-MM-DD">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select name="status" id="edit_status" class="form-control">
                                        <option value="staking">Staking</option>
                                        <option value="unstaked">Unstaked</option>
                                        <option value="ended">Ended</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updateStake" class="btn btn-theme">Update Stake</button>
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

    <script type="text/javascript">
        "use strict";
        var url = "https://demo.paymoney.techvill.net/change-lang";
        var token = "AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui";
    </script>
    <script src="../public/admin/customs/js/body_script.min.js"></script>

    <!-- jquery.dataTables js -->
    <script src="../public/dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            $("#eachuserwallet").DataTable({
                "order": [],
                "language": '',
                "pageLength": '25',
                "stateSave": true
            });
        });

        function setEditStakeData(btn) {
            var id = btn.getAttribute('data-id');
            var staked = btn.getAttribute('data-staked');
            var expected = btn.getAttribute('data-expected');
            var daily = btn.getAttribute('data-daily');
            var earned = btn.getAttribute('data-earned');
            var start = btn.getAttribute('data-start');
            var end = btn.getAttribute('data-end');
            var status = btn.getAttribute('data-status');

            document.getElementById('edit_stake_id').value = id;
            document.getElementById('edit_staked').value = staked;
            document.getElementById('edit_expected').value = expected;
            document.getElementById('edit_daily').value = daily;
            document.getElementById('edit_earned').value = earned;
            document.getElementById('edit_start').value = start;
            document.getElementById('edit_end').value = end;
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