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
    <title>Wallet Addresses | Yield Financial Services</title>
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

    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="../public/admin/templates/css/style.min.css">

    <!-- jQuery 3.2.1 -->
    <script src="../public/dist/libraries/jquery-3.2.1/dist/jquery.min.js"></script>

    <!-- dataTables -->
    <link rel="stylesheet" type="text/css"
        href="../public/dist/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="../public/dist/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css">
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
                                <div class="top-bar-title padding-bottom pull-left">Wallet Addresses</div>
                            </div>
                            <div>
                                <button class="btn btn-theme f-14" data-bs-toggle="modal"
                                    data-bs-target="#addWalletModal">Add Wallet Address</button>
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
                                            id="walletTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Currency</th>
                                                    <th>Address</th>
                                                    <th>Network</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sn = 1;
                                                if (isset($data['wallet_addresses']) && is_array($data['wallet_addresses'])) {
                                                    foreach ($data['wallet_addresses'] as $w) { ?>
                                                        <tr>
                                                            <td><?= $sn++ ?></td>
                                                            <td><?= $w['currency'] ?></td>
                                                            <td><?= $w['address'] ?></td>
                                                            <td><?= $w['network'] ?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-info edit-btn"
                                                                    data-id="<?= $w['id'] ?>"
                                                                    data-currency="<?= $w['currency'] ?>"
                                                                    data-address="<?= $w['address'] ?>"
                                                                    data-network="<?= $w['network'] ?>"
                                                                    onclick="setEditData(this)" data-bs-toggle="modal"
                                                                    data-bs-target="#editWalletModal">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                                    data-id="<?= $w['id'] ?>" data-type="wallet_address"
                                                                    onclick="setDeleteData(this)" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>
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
        </footer>
    </div>

    <!-- Add Wallet Modal -->
    <div class="modal fade" id="addWalletModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../backend/actionsAdmin/manageWalletAddress.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Wallet Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Currency</label>
                            <input type="text" name="currency" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Network</label>
                            <input type="text" name="network" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addWalletAddress" class="btn btn-theme">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Wallet Modal -->
    <div class="modal fade" id="editWalletModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../backend/actionsAdmin/manageWalletAddress.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Wallet Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group mb-3">
                            <label>Currency</label>
                            <input type="text" name="currency" id="edit_currency" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <input type="text" name="address" id="edit_address" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Network</label>
                            <input type="text" name="network" id="edit_network" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updateWalletAddress" class="btn btn-theme">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../public/dist/js/popper.min.js" type="text/javascript"></script>
    <script src="../public/dist/libraries/bootstrap-5.0.2/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/select2-4.1.0-rc.0/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../public/admin/templates/js/app.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"
        type="text/javascript"></script>
    <script src="../public/dist/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"
        type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $("#walletTable").DataTable({
                "order": [],
                "pageLength": 10,
                "responsive": true,
                "autoWidth": false,
                "stateSave": true
            });
        });

        function setEditData(btn) {
            var id = btn.getAttribute('data-id');
            var currency = btn.getAttribute('data-currency');
            var address = btn.getAttribute('data-address');
            var network = btn.getAttribute('data-network');

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_currency').value = currency;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_network').value = network;
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