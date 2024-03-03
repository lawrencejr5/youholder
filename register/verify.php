<?php !$_GET['em_verify'] && !$_GET['fname'] && header('location: ./') ?>
<!DOCTYPE html>
<html lang="en" class="scrol-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">
    <meta name="description" content="Login">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#130e80" />
    <title>Verify Email | Yield Financial Services</title>
    <!-- <script src="./public/frontend/templates/js/flashesh-dark.min.js"></script> -->
    <link rel="stylesheet" href="./public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/frontend/templates/css/style.min.css">
    <link rel="stylesheet" href="./public/frontend/templates/css/owl-css/owl.min.css">
    <link rel="stylesheet" href="./public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link href="/youholder/public/logos/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="/youholder/public/logos/favicon.png" rel="apple-touch-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="./public/frontend/templates/css/toastr.min.css"> -->

    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
    </script>

</head>

<body>

    <!-- Start scroll-top button -->
    <div id="scroll-top-area">
        <a href="https://demo.paymoney.techvill.net/login#top-header"><i class="fas fa-arrow-up"></i></a>
    </div>
    <!-- End scroll-top button -->

    <!-- Start Header -->
    <!-- navbar -->

    <!-- Login section start -->
    <div class="container-fluid container-layout px-0">
        <div class="main-auth-div">
            <div class="d-flex justify-content-start mt-24 ml-18 position-fixed">
                <div class="logo-div">
                    <a href="/youholder/">
                        <img src="/youholder/public/logos/yield-logo.png" height="auto" width="150px" alt="Brand Logo">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-5 hide-small-device">
                    <div class="bg-pattern">
                        <div class="bg-content">
                            <div class="transaction-block">
                                <div class="transaction-text">
                                    <h3 class="mb-6p">Hassle free money</h3>
                                    <h1 class="mb-2p">Transactions</h1>
                                    <h2>Right at you fingertips</h2>
                                </div>
                            </div>
                            <div class="transaction-image">
                                <div class="static-image">
                                    <img class="img img-fluid" src="./public/frontend/templates/images/login/signup-static-img.svg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 col-xl-7">
                    <div class="auth-section signin-top d-flex align-items-center">
                        <div class="auth-module">
                            <div class="d-flex align-items-center back-direction mb-2 back-signin">
                                <a onclick="history.go(-1)" class="d-inline-flex align-items-center back-btn">
                                    <svg class="position-relative nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.47075 10.4709C8.7311 10.2105 8.7311 9.78842 8.47075 9.52807L4.94216 5.99947L8.47075 2.47087C8.7311 2.21053 8.7311 1.78842 8.47075 1.52807C8.2104 1.26772 7.78829 1.26772 7.52794 1.52807L3.52795 5.52807C3.2676 5.78842 3.2676 6.21053 3.52795 6.47088L7.52794 10.4709C7.78829 10.7312 8.2104 10.7312 8.47075 10.4709Z" fill="currentColor" />
                                    </svg>
                                    <span class="ms-1">Back</span>
                                </a>
                            </div>

                            <form action="" method="post" id="login-form">
                                <input type="hidden" id="em_verify" value="<?= $_GET['em_verify'] ?>" autocomplete="off">
                                <input type="hidden" id="fname" value="<?= $_GET['fname'] ?>" autocomplete="off">
                                <div class="auth-module-header">
                                    <p class="mb-0 text-start auth-title">Verify your email</p>
                                    <p class="mb-0 text-start auth-text mt-12">We have sent a verification code to <a href="<?= $_GET['em_verify'] ?>"><?= $_GET['em_verify'] ?></a>, please make sure to check your spam if you didn't see code</p>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Verification code <span class="star">*</span></label>
                                            <div id="show_hide_password" class="position-relative">
                                                <input type="number" class="form-control input-form-control" id="verify" placeholder="000000" name="verify" required="" data-value-missing="This field is required.">
                                            </div>
                                        </div>
                                        <!-- reCaptcha -->
                                        <div class="d-grid mb-3 mb-3p">
                                            <button class="btn btn-lg" type="button" id="verify-btn" style="background-color: #130e80;">
                                                <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                                    <span class="visually-hidden"></span>
                                                </div>
                                                <span class="px-1" id="login-btn-text">Verify</span>
                                                <span id="rightAngleSvgIcon"><svg class="position-relative ms-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5286 10.4698C3.26825 10.2094 3.26825 9.78732 3.5286 9.52697L7.05719 5.99837L3.5286 2.46978C3.26825 2.20943 3.26825 1.78732 3.5286 1.52697C3.78895 1.26662 4.21106 1.26662 4.47141 1.52697L8.47141 5.52697C8.73176 5.78732 8.73176 6.20943 8.47141 6.46978L4.47141 10.4698C4.21106 10.7301 3.78895 10.7301 3.5286 10.4698Z" fill="currentColor"></path>
                                                    </svg></span>

                                            </button>
                                        </div>
                                        <!-- <div class="forgot-link text-center mb-3 pt-1">
                                            <a href="../forget-password/">Forgot
                                                Password?</a>
                                        </div> -->
                                    </div>
                                </div>
                            </form>
                            <p class="mb-0 text-start auth-text mt-12">Didn't get verification code?
                            <form>
                                <input type="hidden" id="resend_code" value="<?php echo rand(100000, 999999) ?>">
                                <button type="button" id="resend_btn" style="color: blue; border: none; background: transparent; padding: 0;">Resend</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login section end -->

    <div class="d-none bottom-footer">
        <div class="px-240 d-flex justify-content-between btn-footer align-center">
            <div class="mt-18">
                <p class="mb-0 OpenSans-600 text-white">
                    Copyright&nbsp;© 2024 &nbsp;&nbsp; YieldFincs | All Rights Reserved
                </p>
            </div>
            <div>
                <div class="d-flex align-center justify-center-res sp mt-18">
                    <span class="text-white OpenSans-600 lan">Language : </span>
                    <div class="form-group OpenSans-600 selectParent footer-font-16 OpenSans-600">
                        <select class="select2 form-control footer-font-16 mb-2n" data-minimum-results-for-search="Infinity" id="lang">
                            <option class="footer-font-16" selected value='en'>English</option>
                            <option class="footer-font-16" value='ar'>عربى</option>
                            <option class="footer-font-16" value='fr'>Français</option>
                            <option class="footer-font-16" value='pt'>Português</option>
                            <option class="footer-font-16" value='ru'>Русский</option>
                            <option class="footer-font-16" value='es'>Español</option>
                            <option class="footer-font-16" value='tr'>Türkçe</option>
                            <option class="footer-font-16" value='ch'>中文 (繁體)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->

    <!-- <script src="./public/dist/libraries/jquery-3.6.1/jquery-3.6.1.min.js"></script> -->
    <script src="./public/frontend/templates/js/owl.carousel.min.js"></script>
    <script src="./public/dist/libraries/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    <script src="./public/frontend/templates/js/main.min.js"></script>
    <script src="./public/dist/plugins/select2-4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(".custom-select").select2()
    </script>

    <!--Google Analytics Tracking Code-->


    <script type="text/javascript">
        const resend_btn = document.querySelector('#resend_btn')
        resend_btn.addEventListener('click', () => {

            resend_btn.innerHTML = 'Resending...'

            const resend_code = document.querySelector('#resend_code').value
            const email = document.querySelector('#em_verify').value
            const fname = document.querySelector('#fname').value

            $.ajax({
                url: '../app/backend/actions/resend.php',
                type: 'post',
                dataType: 'json',
                data: {
                    resend_code,
                    email,
                    fname
                },
                success: (res) => {
                    if (res.header == 'resent') {
                        toastr.success("A new verification code has been sent to ur email", "Resent", {
                            positionClass: "toast-top-center",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        })
                        setTimeout(() => {
                            window.location.reload()
                        }, 3000)
                    } else if (res.header == 'err') {
                        toastr.error("An error occured", "Error", {
                            positionClass: "toast-top-center",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        })
                        setTimeout(() => {
                            window.location.reload()
                        }, 3000)
                    }
                }
            })
        })
        const verify_btn = document.querySelector('#verify-btn')
        verify_btn.addEventListener('click', () => {

            verify_btn.innerHTML = 'Verifying...'

            const code = document.querySelector('#verify').value
            const email = document.querySelector('#em_verify').value
            const fname = document.querySelector('#fname').value

            if (code.length < 6) {
                toastr.warning("Code cannot be less than 6", "Warning", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                verify_btn.innerHTML = 'Try again'
            } else if (code.length > 6) {
                toastr.warning("Code cannot be more than 6", "Warning", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                verify_btn.innerHTML = 'Try again'
            } else {
                $.ajax({
                    url: '../app/backend/actions/verify.php',
                    dataType: 'json',
                    type: 'post',
                    data: {
                        code,
                        email,
                        fname
                    },
                    success: (res) => {
                        if (res.header == 'wrong') {
                            toastr.error("Verification code is wrong", "Error", {
                                positionClass: "toast-top-center",
                                timeOut: 5e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1
                            })
                            verify_btn.innerHTML = 'Try again'
                        } else if (res.header == 'err') {
                            toastr.error("Email does not exist, try registering again", "Error", {
                                positionClass: "toast-top-center",
                                timeOut: 5e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1
                            })
                            setTimeout(() => {
                                window.location = './'
                            }, 3000)
                        } else if (res.header == 'verified') {
                            toastr.success("Your email has been verified", "Redirecting", {
                                positionClass: "toast-top-center",
                                timeOut: 5e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1
                            })
                            setTimeout(() => {
                                window.location = '../login/'
                            }, 3000)
                        }
                    }
                })
            }
        })


        //Language script
        $('#lang').on('change', function(e) {
            e.preventDefault();
            lang = $(this).val();
            url = 'https://demo.paymoney.techvill.net/change-lang';

            $.ajax({
                type: 'get',
                url: url,
                data: {
                    lang: lang
                },
                success: function(msg) {
                    if (msg == 1) {
                        if (lang == 'ar') {
                            localStorage.setItem('lang', 'ar');
                            localStorage.setItem('selected', 'ar');
                        } else {
                            localStorage.setItem('lang', lang)
                            localStorage.setItem('selected', lang)
                        }
                        location.reload();
                    }
                }
            });
        });

        // custom dropdown
    </script>


    <script src="./public/dist/libraries/fingerprintjs2/fingerprintjs2.min.js" type="text/javascript"></script>
    <script src="./public/dist/plugins/html5-validation-1.0.0/validation.min.js"></script>
    <script src="./public/frontend/templates/js/toastr.min.js" type="text/javascript"></script>


    <script>
        'use strict';
        let errorMessage = "";
        let errorMessageClass = "";
        let loginButtonText = "Signing In...";
    </script>
    <script src="./public/frontend/customs/js/login/login.min.js" type="text/javascript"></script>

</body>

</html>