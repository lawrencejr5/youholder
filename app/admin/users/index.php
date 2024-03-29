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
    <title>Users | Pay Money</title>
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
                <div class="box box-default">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="top-bar-title padding-bottom pull-left">Users</div>
                            </div>

                            <div>
                                <a href="./create.php" class="btn btn-theme f-14"><span class="fa fa-plus"> &nbsp;</span>Add User</a>
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
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover f-14 dt-responsive" id="usersTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th title="ID">ID</th>
                                                        <th title="First Name">First Name</th>
                                                        <th title="Last Name">Last Name</th>
                                                        <th title="Phone">Phone</th>
                                                        <th title="Email">Email</th>
                                                        <th title="Adress">Addrss1</th>
                                                        <th title="Address">Address2</th>
                                                        <th title="Country">Country</th>
                                                        <th title="State">State</th>
                                                        <th title="City">City</th>
                                                        <th title="Level">Level</th>
                                                        <th title="Date & Time">Date & Time Joined</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data['users'] as $u) { ?>
                                                        <tr>
                                                            <td><?= $u['id'] ?></td>
                                                            <td><?= $u['fname'] ?></td>
                                                            <td><?= $u['lname'] ?></td>
                                                            <td><?= $u['phone'] ?></td>
                                                            <td><?= $u['email'] ?></td>
                                                            <td><?= $u['address1'] ?></td>
                                                            <td><?= $u['address2'] ?></td>
                                                            <td><?= $u['country'] ?></td>
                                                            <td><?= $u['state'] ?></td>
                                                            <td><?= $u['city'] ?></td>
                                                            <td><?= $u['level'] ?></td>
                                                            <td><?= $u['datetime'] ?></td>
                                                            <td><a href="profile.php?userid=<?= $u['id'] ?>"><button style="border: none; outline: none; background: transparent;"><i class="fa fa-chevron-right"></i></button></a></td>
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
            <div class="pull-right hidden-xs f-14">
                <b>Version</b> 4.1.1
            </div>
            <strong class="f-14">Copyright &copy; 2024 <a href="https://demo.paymoney.techvill.net/admin/home" target="_blank">Pay Money</a> | </strong> <span class="f-14">All rights reserved</span>

            <!-- Delete Modal for buttons-->
            <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content w-100 h-100 aliceblue">
                        <div class="modal-header">
                            <h4 class="modal-title f-18">Confirm Delete</h4>
                            <a type="button" class="close f-18" data-bs-dismiss="modal" aria-hidden="true">&times;</a>
                        </div>
                        <div class="px-3 f-14">
                            <p><strong>Are you sure you want to delete?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger f-14" id="confirm">Yes</button>
                            <button type="button" class="btn btn-default f-14" data-bs-dismiss="modal">No</button>
                        </div>
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
        var token = "OTpM8byuH3VBQSARTeNYjYvSnedO9Nxuy9BhbgsC";
    </script>
    <script src="../public/admin/customs/js/body_script.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#usersTable").DataTable({
                "order": [],
                "language": '',
                "pageLength": '25'
            });
        });
    </script>
</body>

</html>