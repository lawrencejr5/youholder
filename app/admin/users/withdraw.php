<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MTS">
    <title>Withdrawals | Pay Money</title>
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
                        <h3 class="f-24">Nishat Nuzhat</h3>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <div class="pull-right">
                            <a href="./profile.php" class="pull-right btn btn-theme f-14 active">Back</a>
                        </div>
                    </div>
                </div>

                <div class="box mt-20">
                    <div class="box-body">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <form action="" method="post" accept-charset='UTF-8' id="admin-user-withdraw-create">
                                    <input type="hidden" value="AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui" name="_token" id="token">

                                    <input type="hidden" name="user_id" id="user_id" value="4">
                                    <input type="hidden" name="fullname" id="fullname" value="Nishat Nuzhat">
                                    <input type="hidden" name="payment_method" id="payment_method" value="1">
                                    <input type="hidden" name="percentage_fee" id="percentage_fee" value="">
                                    <input type="hidden" name="fixed_fee" id="fixed_fee" value="">
                                    <input type="hidden" name="fee" class="total_fees" value="0.00">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group f-14">
                                                <label class="mb-1" for="currency_id">Currency</label>
                                                <select class="select2 wallet" name="currency_id" id="currency_id">
                                                    <option data-type="fiat" data-wallet="9" value="1">USD</option>
                                                </select>
                                            </div>
                                            <small id="walletlHelp" class="form-text text-muted f-12">
                                                Fee(<span class="pFees">0</span>%+<span class="fFees">0</span>),
                                                Total: <span class="total_fees">0.00</span>
                                            </small>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group f-14">
                                                <label class="mb-1" for="amount">Amount</label>
                                                <input type="text" class="form-control amount f-14" name="amount" placeholder="0.00" type="text" id="amount" onkeypress="return isNumberOrDecimalPointKey(this, event);" value="" oninput="restrictNumberToPrefdecimalOnInput(this)">
                                                <span class="amountLimit fw-bold text-danger"></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="https://demo.paymoney.techvill.net/admin/users/edit//4" class="btn btn-theme-danger me-1"><span class="f-14"><i class="fa fa-angle-left"></i>&nbsp;Back</span></a>
                                        <button type="submit" class="btn btn-theme" id="withdrawal-create">
                                            <i class="fa fa-spinner fa-spin f-14 d-none"></i>
                                            <span id="withdrawal-create-text" class="f-14">Next&nbsp;<i class="fa fa-angle-right"></i></span>
                                        </button>
                                    </div>
                                </form>
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
            var token = $("#token").val();
            var amount = $('#amount').val();
            var currency_id = $('#currency_id').val();
            var payment_method_id = $('#payment_method').val();

            $.ajax({
                    method: "POST",
                    url: SITE_URL + "/" + ADMIN_PREFIX + "/users/withdraw/amount-fees-limit-check",
                    dataType: "json",
                    data: {
                        "_token": token,
                        'amount': amount,
                        'currency_id': currency_id,
                        'payment_method_id': payment_method_id,
                        'user_id': '4',
                        'transaction_type_id': '2'
                    }
                })
                .done(function(response) {
                    // console.log(response);

                    if (response.success.status == 200) {
                        $("#percentage_fee").val(response.success.feesPercentage);
                        $("#fixed_fee").val(response.success.feesFixed);
                        $(".percentage_fees").html(response.success.feesPercentage);
                        $(".fixed_fees").html(response.success.feesFixed);
                        $(".total_fees").val(response.success.totalFees);
                        $('.total_fees').html(response.success.totalFeesHtml);
                        $('.pFees').html(response.success.pFeesHtml);
                        $('.fFees').html(response.success.fFeesHtml);

                        //Balance Checking
                        if (response.success.totalAmount > response.success.balance) {
                            $('.amountLimit').text("Insufficient Balance");
                            $("#withdrawal-create").attr("disabled", true);
                        } else {
                            $('.amountLimit').text('');
                            $("#withdrawal-create").attr("disabled", false);
                        }
                        return true;
                    } else {
                        if (amount == '') {
                            $('.amountLimit').text('');
                        } else {
                            $('.amountLimit').text(response.success.message);
                            $("#withdrawal-create").attr("disabled", true);
                            return false;
                        }
                    }
                });
        }
    </script>
</body>

</html>