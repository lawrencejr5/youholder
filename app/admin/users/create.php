<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="MTS">
    <title>Add User | Pay Money</title>
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


    <link rel="stylesheet" type="text/css" href="../public/dist/plugins/intl-tel-input-17.0.19/css/intlTelInput.min.css">

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

                <div class="box box-info" id="user-create">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add User</h3>
                    </div>
                    <form action="https://demo.paymoney.techvill.net/admin/users/store" class="form-horizontal" id="user_form" method="POST">
                        <input type="hidden" value="AFPUgjA9zxV2UPj9WMPFDAGWhz5OzqNQTrudrvui" name="_token" id="token">
                        <input type="hidden" name="defaultCountry" id="defaultCountry" class="form-control">
                        <input type="hidden" name="carrierCode" id="carrierCode" class="form-control">
                        <input type="hidden" name="formattedPhone" id="formattedPhone" class="form-control">
                        <div class="box-body">

                            <!-- FirstName -->
                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label text-sm-end f-14 fw-bold" for="first_name">First Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control f-14" placeholder="Enter first name" name="first_name" type="text" id="first_name" value="" required data-value-missing="This field is required." maxlength="30" data-max-length="First name length should be maximum 30 charcters.">
                                </div>
                            </div>

                            <!-- LastName -->
                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label text-sm-end f-14 fw-bold" for="last_name">Last Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control f-14" placeholder="Enter last name" name="last_name" type="text" id="last_name" value="" required data-value-missing="This field is required." maxlength="30" data-max-length="Last name length should be maximum 30 character.">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label text-sm-end f-14 fw-bold" for="phone">Phone</label>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control f-14" id="phone" name="phone">
                                    <span id="duplicate-phone-error"></span>
                                    <span id="tel-error"></span>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label require text-sm-end f-14 fw-bold" for="email">Email</label>
                                <div class="col-sm-6">
                                    <input class="form-control f-14" placeholder="Enter a valid email." name="email" type="email" id="email" required oninvalid="this.setCustomValidity('This field is required.')" data-type-mismatch="Enter a valid email.">
                                    <span id="email_error"></span>
                                    <span id="email_ok" class="text-success"></span>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label require text-sm-end f-14 fw-bold" for="role">Group</label>
                                <div class="col-sm-6">
                                    <select class="select2 f-14" name="role" id="role" required oninvalid="this.setCustomValidity('This field is required.')">
                                        <option value='2'> Default User</option>
                                        <option value='3'> Merchant Regular</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label require text-sm-end f-14 fw-bold" for="password">Password</label>
                                <div class="col-sm-6">
                                    <input class="form-control f-14" placeholder="Enter new Password" name="password" type="password" id="password" required oninvalid="this.setCustomValidity('This field is required.')" minlength="6" data-min-length="Password should contain at least 6 characters.">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label require text-sm-end f-14 fw-bold" for="password_confirmation">Confirm Password</label>
                                <div class="col-sm-6">
                                    <input class="form-control f-14" placeholder="Confirm password" name="password_confirmation" type="password" id="password_confirmation" required oninvalid="this.setCustomValidity('This field is required.')" minlength="6" data-min-length="Password should contain at least 6 characters.">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label class="col-sm-3 mt-11 control-label require text-sm-end f-14 fw-bold" for="status">Status</label>
                                <div class="col-sm-6">
                                    <select class="select2 f-14" name="status" id="status" required oninvalid="this.setCustomValidity('This field is required.')">
                                        <option value='Active'>Active</option>
                                        <option value='Inactive'>Inactive</option>
                                        <option value='Suspended'>Suspended</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 offset-md-3">
                                    <a class="btn btn-theme-danger f-14 me-1" href="https://demo.paymoney.techvill.net/admin/users" id="users_cancel">Cancel</a>
                                    <button type="submit" class="btn btn-theme f-14" id="users_create"><i class="fa fa-spinner fa-spin d-none"></i> <span id="users_create_text">Create</span></button>
                                </div>
                            </div>

                        </div>
                    </form>
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
    <script src="../public/dist/plugins/html5-validation-1.0.0/validation.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/intl-tel-input-17.0.19/js/intlTelInput-jquery.min.js" type="text/javascript"></script>
    <script src="../public/dist/js/isValidPhoneNumber.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        'use strict';
        var countryShortCode = 'US';
        var userNameError = 'Please enter only alphabet and spaces';
        var userNameLengthError = 'Name length can not be more than 30 characters';
        var passwordMatchErrorText = 'Please enter same value as the password field.';
        var creatingText = 'Creating...';
        var utilsScriptLoadingPath = '../public/dist/plugins/intl-tel-input-17.0.19/js/utils.min.js';
        var validPhoneNumberErrorText = 'Please enter a valid international phone number.';
    </script>
    <script src="../public/admin/customs/js/user/user.min.js" type="text/javascript"></script>
</body>

</html>