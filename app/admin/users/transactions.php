<?php
include "../../backend/adminData.php";


!$_GET['userid'] && header('location: ./');
$data['user_deposits'] = $adminModule->getUserDeposits('deposit', $_GET['userid']);
$data['user_withdrawals'] = $adminModule->getUserWithdrawals('withdrawal', $_GET['userid']);
$data['user_transfers'] = $adminModule->getUserTransfers('transfer from', 'transfer to', $_GET['userid']);
$data['user_exchanges'] = $adminModule->getUserExchanges('exchange from', 'exchange to', $_GET['userid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MTS">
    <title>Transactions | Pay Money</title>
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


    <!-- Bootstrap daterangepicker -->
    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/daterangepicker-3.1/daterangepicker.min.css">

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
                <div class="box">
                    <div class="box-body">
                        <h4>Deposits</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover f-14 dt-responsive transactions" id="depositTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th title="ID">ID</th>
                                                <th title="First Name">Name</th>
                                                <th title="Phone">Deposit amount</th>
                                                <th title="Email">Converted amount</th>
                                                <th title="Email">Wallet</th>
                                                <th title="Group">Datetime</th>
                                                <th title="Status">Verified</th>
                                                <th title="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn = 1;
                                            foreach ($data['user_deposits'] as $d) { ?>
                                                <tr>
                                                    <td><?= $sn++ ?></td>
                                                    <td><?= $d['fname'] . ' ' . $d['lname'] ?></td>
                                                    <td><?= $d['deposit_amt'] . ' ' . strtoupper($d['currency']) ?></td>
                                                    <td><?= $d['return_amt'] . ' ' . $d['wallet'] ?></td>
                                                    <td><?= $d['wallet'] ?></td>
                                                    <td><?= $d['datetime'] ?></td>
                                                    <td><?= $d['approved'] ?></td>
                                                    <td><button class="btn btn-success">Verify</button>&nbsp;<button class="btn btn-danger">Delete</button></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <h4>Withdrawals</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover f-14 dt-responsive transactions" id="withdrawTable" width="100%" cellspacing="0">
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
                                                    <td><button class="btn btn-success">Verify</button>&nbsp;<button class="btn btn-danger">Delete</button></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <h4>Transfers</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover f-14 dt-responsive transactions" id="transferTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th title="ID">ID</th>
                                                <th title="First Name">Name</th>
                                                <th title="Phone">Amount</th>
                                                <th title="Group">From/To</th>
                                                <th title="Status">Date & time</th>
                                                <!-- <th title="Action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn = 1;
                                            foreach ($data['user_transfers'] as $t) { ?>
                                                <tr>
                                                    <td><?= $sn++ ?></td>
                                                    <td><?= $t['fname'] . ' ' . $t['lname'] ?></td>
                                                    <td><?= $t['amount'] . ' ' . $t['wallet'] ?></td>
                                                    <td><?= $t['from_to'] ?></td>
                                                    <td><?= $t['datetime'] ?></td>
                                                    <!-- <td><button class="btn btn-success">Verify</button>&nbsp;<button class="btn btn-danger">Delete</button></td> -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <h4>Exchanges</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover f-14 dt-responsive transactions" id="exchangeTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th title="ID">ID</th>
                                                <th title="First Name">Name</th>
                                                <th title="Group">Exchange type</th>
                                                <th title="Phone">Wallet</th>
                                                <th title="Phone">Amount</th>
                                                <th title="Status">Date & time</th>
                                                <!-- <th title="Action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn = 1;
                                            foreach ($data['user_exchanges'] as $e) { ?>
                                                <tr>
                                                    <td><?= $sn++ ?></td>
                                                    <td><?= $e['fname'] . ' ' . $e['lname'] ?></td>
                                                    <td><?= $e['transaction_type'] ?></td>
                                                    <td><?= $e['wallet'] ?></td>
                                                    <td><?= $e['amount'] . ' ' . $e['wallet'] ?></td>
                                                    <td><?= $e['datetime'] ?></td>
                                                    <!-- <td><button class="btn btn-success">Verify</button>&nbsp;<button class="btn btn-danger">Delete</button></td> -->
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

    <script type="text/javascript">
        "use strict";
        var url = "https://demo.paymoney.techvill.net/change-lang";
        var token = "AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui";
    </script>
    <script src="../public/admin/customs/js/body_script.min.js"></script>

    <!-- Bootstrap daterangepicker -->
    <script src="../public/dist/plugins/daterangepicker-3.1/daterangepicker.min.js" type="text/javascript"></script>

    <!-- jquery.dataTables js -->
    <script src="../public/dist/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        $(".select2").select2({});

        var sDate;
        var eDate;

        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                var sessionDate = 'dd-mm-yyyy';
                var sessionDateFinal = sessionDate.toUpperCase();

                sDate = moment(start, 'MMMM D, YYYY').format(sessionDateFinal);
                $('#startfrom').val(sDate);

                eDate = moment(end, 'MMMM D, YYYY').format(sessionDateFinal);
                $('#endto').val(eDate);

                $('#daterange-btn span').html('&nbsp;' + sDate + ' - ' + eDate + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        )

        $(document).ready(function() {
            $("#daterange-btn").mouseover(function() {
                $(this).css('background-color', 'white');
                $(this).css('border-color', 'grey !important');
            });

            var startDate = "";
            var endDate = "";
            // alert(startDate);

            if (startDate == '') {
                $('#daterange-btn span').html('<i class="fa fa-calendar"></i> &nbsp;&nbsp; Pick a date range &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            } else {
                $('#daterange-btn span').html(startDate + ' - ' + endDate + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#depositTable").DataTable({
                "order": [],
                "language": '',
                "pageLength": '10'
            });
        });
        $(function() {
            $("#withdrawTable").DataTable({
                "order": [],
                "language": '',
                "pageLength": '10'
            });
        });
        $(function() {
            $("#transferTable").DataTable({
                "order": [],
                "language": '',
                "pageLength": '10'
            });
        });
        $(function() {
            $("#exchangeTable").DataTable({
                "order": [],
                "language": '',
                "pageLength": '10'
            });
        });
    </script>
</body>

</html>