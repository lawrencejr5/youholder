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
    <title>Dashboard | Pay Money</title>
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

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper_custom">



        <?php include "../master/topnav.php" ?>
        <?php include "../master/sidenav.php" ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <section class="content">

                    <div class="row">
                        <div class="col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $numOfUsers ?></h3>

                                    <p>Total Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="../users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?= $numOfTransactions ?></h3>

                                    <p>Total Transactions</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="../transactions" class="small-box-footer">More info<i class="fa fa-arrow-circle-right ms-1"></i></a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $numOfStakes ?></h3>
                                    <p>Total Stakes</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <a href="../stakings/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $numOfInvests ?></h3>

                                    <p>Total Investments</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="../investments" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-20">
                        <!--Graph Line Chart last 30 days start-->

                        <div class="row">

                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <div class="fs-5 fw-bold ms-2">
                                            Wallet Balances
                                        </div>
                                    </div>
                                    <div class="box box-body f-14">
                                        <?php
                                        foreach ($data['wallets'] as $w) {
                                            $dpAmt = $adminModule->getTotalWalletDpAmt($w['wallet_name']);
                                            $wtAmt = $adminModule->getTotalWalletWtAmt($w['wallet_name']);
                                            foreach ($dpAmt as $a) {
                                                foreach ($wtAmt as $b) {
                                        ?>
                                                    <div class="wallet-parent">
                                                        <div class="float-start w-60pct">
                                                            <div class="min-h-25"><?= $w['wallet_name'] ?></div>
                                                            <div class="clearfix"></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="wal-amount">
                                                            <?= $a['amt'] - $b['amt'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </section>
        </div>

        <!-- footer -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs f-14">
                <b>Version</b> 4.1.1
            </div>
            <strong class="f-14">Copyright &copy; 2024 <a href="../home" target="_blank">Pay Money</a> | </strong> <span class="f-14">All rights reserved</span>

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

    <script type="text/javascript">
        "use strict";
        var url = "https://demo.paymoney.techvill.net/change-lang";
        var token = "AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui";
    </script>
    <script src="../public/admin/customs/js/body_script.min.js"></script>

    <script src="../public/dist/libraries/chartjs/Chart.min.js" type="text/javascript"></script>


</body>

</html>