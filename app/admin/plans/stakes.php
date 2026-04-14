<?php
include "../../backend/adminData.php";
$stakePlans = $adminModule->getStakePlans();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stake Plans | Yield Financial Services</title>
    <link rel="stylesheet" type="text/css" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/dist/libraries/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/adminLte/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/adminLte/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/css/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="../public/dist/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="../public/dist/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css">
    <script src="../public/dist/libraries/jquery-3.2.1/dist/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper_custom">
        <?php include "../master/topnav.php" ?>
        <?php include "../master/sidenav.php" ?>

        <div class="content-wrapper">
            <section class="content">
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert">
                        <?= $_SESSION['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['msg']);
                } ?>

                <div class="box box-default">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="top-bar-title padding-bottom pull-left">Stake Plans</div>
                            </div>
                            <div>
                                <button class="btn btn-theme f-14" data-bs-toggle="modal"
                                    data-bs-target="#addPlanModal">Add Stake Plan</button>
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
                                        <table class="table table-striped table-hover f-14 dt-responsive" id="planTable"
                                            width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Plan Name</th>
                                                    <th>Crypto</th>
                                                    <th>APY (%)</th>
                                                    <th>Min</th>
                                                    <th>Max</th>
                                                    <th>Max Val ($)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sn = 1;
                                                foreach ($stakePlans as $p) { ?>
                                                    <tr>
                                                        <td><?= $sn++ ?></td>
                                                        <td><?= $p['plan'] ?></td>
                                                        <td><?= $p['crypto'] ?></td>
                                                        <td><?= $p['apy'] ?>%</td>
                                                        <td><?= $p['min'] ?></td>
                                                        <td><?= $p['max'] ?></td>
                                                        <td><?= is_numeric($p['max_val']) ? number_format($p['max_val'], 2) : $p['max_val'] ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info edit-btn"
                                                                data-id="<?= $p['id'] ?>" data-plan="<?= $p['plan'] ?>"
                                                                data-crypto="<?= $p['crypto'] ?>"
                                                                data-apy="<?= $p['apy'] ?>" data-min="<?= $p['min'] ?>"
                                                                data-max="<?= $p['max'] ?>"
                                                                data-max_val="<?= $p['max_val'] ?>"
                                                                onclick="setEditData(this)" data-bs-toggle="modal"
                                                                data-bs-target="#editPlanModal">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                                data-id="<?= $p['id'] ?>" data-type="stake_plan"
                                                                onclick="setDeleteData(this)" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
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

        <footer class="main-footer">
            <?php include "../master/footer.php" ?>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content w-100 h-100 aliceblue">
                        <div class="modal-header">
                            <h4 class="modal-title f-18">Confirm Delete</h4>
                            <a type="button" class="close f-18" data-bs-dismiss="modal" aria-hidden="true">&times;</a>
                        </div>
                        <form action="../../backend/actionsAdmin/manageStakePlans.php" method="POST">
                            <div class="modal-body px-3 f-14">
                                <p><strong>Are you sure you want to delete this stake plan?</strong></p>
                                <input type="hidden" name="id" id="delete_id">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="deleteStakePlan" class="btn btn-danger f-14">Yes,
                                    Delete</button>
                                <button type="button" class="btn btn-default f-14" data-bs-dismiss="modal">No,
                                    Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Add Plan Modal -->
    <div class="modal fade" id="addPlanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../backend/actionsAdmin/manageStakePlans.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Stake Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Plan Name</label>
                            <input type="text" name="plan" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Crypto</label>
                            <input type="text" name="crypto" class="form-control" required placeholder="e.g. BTC">
                        </div>
                        <div class="form-group mb-3">
                            <label>APY (%)</label>
                            <input type="number" step="0.01" name="apy" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Min Stake</label>
                            <input type="number" step="0.00000001" name="min" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Max Stake Value ($)</label>
                            <input type="number" step="0.00000001" name="max" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Max Value Text ($)</label>
                            <input type="text" name="max_val" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addStakePlan" class="btn btn-theme">Save Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Plan Modal -->
    <div class="modal fade" id="editPlanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../backend/actionsAdmin/manageStakePlans.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Stake Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group mb-3">
                            <label>Plan Name</label>
                            <input type="text" name="plan" id="edit_plan" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Crypto</label>
                            <input type="text" name="crypto" id="edit_crypto" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>APY (%)</label>
                            <input type="number" step="0.01" name="apy" id="edit_apy" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Min Stake</label>
                            <input type="number" step="0.00000001" name="min" id="edit_min" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Max Stake Value ($)</label>
                            <input type="number" step="0.00000001" name="max" id="edit_max" class="form-control"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Max Value Text ($)</label>
                            <input type="text" name="max_val" id="edit_max_val" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updateStakePlan" class="btn btn-theme">Update Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../public/dist/libraries/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    <script src="../public/admin/templates/js/app.min.js"></script>
    <script src="../public/dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="../public/dist/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $("#planTable").DataTable({
                "order": [],
                "pageLength": 10,
                "responsive": true
            });
        });

        function setEditData(btn) {
            document.getElementById('edit_id').value = btn.getAttribute('data-id');
            document.getElementById('edit_plan').value = btn.getAttribute('data-plan');
            document.getElementById('edit_crypto').value = btn.getAttribute('data-crypto');
            document.getElementById('edit_apy').value = btn.getAttribute('data-apy');
            document.getElementById('edit_min').value = btn.getAttribute('data-min');
            document.getElementById('edit_max').value = btn.getAttribute('data-max');
            document.getElementById('edit_max_val').value = btn.getAttribute('data-max_val');
        }

        function setDeleteData(btn) {
            document.getElementById('delete_id').value = btn.getAttribute('data-id');
        }
    </script>
</body>

</html>