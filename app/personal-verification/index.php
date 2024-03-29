<?php
include '../backend/udata.php';
!$_SESSION['id'] && header('location: ../../login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Techvillage">
    <meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">

    <title>Identity Verification | Yield Fiancial Services</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
    <!-- end css -->

    <!-- favicon -->
    <link rel="shortcut icon" href="/youholder/public/logos/favicon.png">

    <!-- theme-color -->
    <meta name="theme-color" content="#130e80" />

    <script>
        'use strict';
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        if (localStorage.getItem('dark') === '1') {
            document.documentElement.classList.add('dark');
        }

        if (localStorage.getItem('lang') == 'ar') {
            document.getElementsByTagName("html")[0].setAttribute("dir", "rtl");
            document.querySelector("html").setAttribute("dir", "rtl");
        } else {
            document.querySelector("html").removeAttribute("dir", "rtl");
        }
    </script>
</head>

<body>

    <!-- sidebar section -->
    <!-- Sidebar Start -->
    <?php $page = "personal-verification"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>


        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="bg-white pxy-62 exchange pt-62 shadow" id="identitiyVerify">
                        <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center">Identity Verification</p>
                        <?php if ($level == 2 || $level == 3) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <!-- <nav>
                                    <div class="nav-tab-parent d-flex justify-content-center mt-4">
                                        <div class="d-flex p-2 border-1p rounded-pill gap-1 bg-white nav-tab-child">
                                            <a href="../personal-verification" class="tablink-edit text-gray-100 tabactive">Identity Verification</a>
                                            <a href="../address-verification" class="tablink-edit text-gray-100">Address Verfication</a>
                                        </div>
                                    </div>
                                </nav> -->
                                    <div class="mt-28 label-top">
                                        <form method="post" action="../backend/actions/personalVerification.php" enctype="multipart/form-data" id="identitiyVerifyForm">
                                            <div class="mt-28 param-ref">
                                                <label class="gilroy-medium text-gray-100 mb-2 f-15">Identity Type</label>
                                                <!-- <span class="gilroy-medium text-success f-15"> (approved)</span> -->
                                                <div class="avoid-blink">
                                                    <select class="select2" data-minimum-results-for-search="Infinity" name="identity_type" id="identity_type" required data-value-missing="This field is required.">
                                                        <option value="national_id">National ID</option>
                                                        <option value="driving_license">Driving License</option>
                                                        <option value="passport" selected>Passport</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="label-top mt-20">
                                                <label class="gilroy-medium text-gray-100 f-15 mb-2">Identity Number</label>
                                                <input type="text" class="form-control input-form-control apply-bg l-s2" name="identity_number" id="identity_number" value="" required data-value-missing="This field is required.">
                                            </div>
                                            <div class="attach-file attach-print amount-label">
                                                <label class="gilroy-medium text-B87 f-15 mb-2 mt-24 r-mt-amount r-mt-6" for="identity_file">Attach Identity Proof (Front)</label>
                                                <input type="file" class="form-control upload-filed" name="identity_file_front" id="identity_file" required data-value-missing="This field is required.">
                                            </div>
                                            <p class="mb-0 f-11 gilroy-regular text-B87 mt-10">Upload front document (Max: 2
                                                mb)</p>
                                            <div class="attach-file attach-print amount-label">
                                                <label class="gilroy-medium text-B87 f-15 mb-2 mt-24 r-mt-amount r-mt-6" for="identity_file">Attach Identity Proof (Back)</label>
                                                <input type="file" class="form-control upload-filed" name="identity_file_back" id="identity_file" required data-value-missing="This field is required.">
                                            </div>
                                            <p class="mb-0 f-11 gilroy-regular text-B87 mt-10">Upload back document (Max: 2
                                                mb)</p>

                                            <!-- <div class="proof-btn-div d-flex justify-content-start mt-3">
                                            <a href="https://demo.paymoney.techvill.net/kyc-proof-download/1688456042.png/identity-proof" class='btn f-10 leading-12 proof-btn p-0 border-DF bg-FFF text-dark'><span>passport.png</span>
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="26" height="26" rx="4" fill="" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 8C13.2761 8 13.5 8.22386 13.5 8.5V14.2929L15.6464 12.1464C15.8417 11.9512 16.1583 11.9512 16.3536 12.1464C16.5488 12.3417 16.5488 12.6583 16.3536 12.8536L13.3536 15.8536C13.1583 16.0488 12.8417 16.0488 12.6464 15.8536L9.64645 12.8536C9.45118 12.6583 9.45118 12.3417 9.64645 12.1464C9.84171 11.9512 10.1583 11.9512 10.3536 12.1464L12.5 14.2929V8.5C12.5 8.22386 12.7239 8 13 8ZM8 17.5C8 17.2239 8.22386 17 8.5 17H17.5C17.7761 17 18 17.2239 18 17.5C18 17.7761 17.7761 18 17.5 18H8.5C8.22386 18 8 17.7761 8 17.5Z" fill="currentColor" />
                                                </svg>
                                            </a>
                                        </div> -->

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary px-4 py-2 mt-3" id="identitiyVerifySubmitBtn" name="verify_document">
                                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                                        <span class="visually-hidden"></span>
                                                    </div>
                                                    <span id="identitiyVerifySubmitBtnText">Verify Identity</span>
                                                </button>
                                            </div>
                                        </form>
                                        <!-- 2nd step end-->
                                    </div>
                                </div>
                            </div>
                        <?php } elseif ($level == 1) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-support bg-white">
                                        <div class="d-flex">
                                            <div class="messages-box">
                                                <img src="../../public/icons/up.png" alt="" width="40px" height="auto">
                                            </div>
                                            <div class="ml-12 mt-9">
                                                <p class="f-18 text-dark leading-22 gilroy-Semibold">Upgrade To Level 2</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-100 gilroy-medium">You account is currently a level <?= $level ?> account. You will have to fill in your personal details in order to verify documents.</p>
                                        <a href="../profile/#pinfo" class="mt-32 btn btn-sm btn-primary ticket-btn green-btn">
                                            <span class="f-14 leading-20 gilroy-medium text-white">Update personal information</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- main-containt -->

                </div>
            </div>
        </div>

        <?php include '../master/footer.php' ?>

    </div>

    <!-- js -->
    <script src="../public/dist/libraries/jquery-3.6.1/jquery-3.6.1.min.js"></script>
    <script src="../public/dist/libraries/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../public/dist/plugins/select2-4.1.0-rc.0/js/select2.min.js"></script>
    <script src="../public/user/templates/js/chart.umd.min.js"></script>
    <script src="../public/user/templates/js/main.min.js"></script>
    <script src="../public/user/customs/js/common.min.js"></script>

    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        $(document).ready(function() {
            $("#select_language").on("change", function() {
                if ($("#select_language select").val() == 'ar') {
                    localStorage.setItem('lang', 'ar');
                    let lang = $("#select_language select").val();

                    $.ajax({
                        type: 'get',
                        url: 'https://demo.paymoney.techvill.net/change-lang',
                        data: {
                            lang: lang
                        },
                        success: function(msg) {
                            if (msg == 1) {
                                location.reload();
                                $("html").attr("dir", "rtl");
                            }
                        }
                    });

                } else {
                    let lang = $("#select_language select").val();
                    $.ajax({
                        type: 'get',
                        url: 'https://demo.paymoney.techvill.net/change-lang',
                        data: {
                            lang: lang
                        },
                        success: function(msg) {
                            if (msg == 1) {
                                location.reload()
                                localStorage.setItem('lang', lang);
                                $("html").removeAttr("dir", "rtl");
                            }
                        }
                    });
                }
            });
        });
    </script>

    <script src="../public/dist/plugins/html5-validation-1.0.0/validation.min.js"></script>
    <script>
        'use strict';
        var csrfToken = $('[name="_token"]').val();
        var submitButtonText = "Submitting...";
    </script>
    <script src="../public/user/customs/js/settings.min.js"></script>
    <!-- end js -->

</body>

</html>