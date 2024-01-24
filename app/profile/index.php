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

    <title>User Profile | Pay Money</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/intl-tel-input-17.0.19/css/intlTelInput.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- end css -->

    <!-- favicon -->
    <link rel="shortcut icon" href="../public/uploads/logos/1530689937_favicon.png">

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
    <?php $page = "profile"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="text-center">
                        <p class="mb-0 gilroy-Semibold f-26 text-dark theme-tran r-f-20 text-uppercase">Your Profile</p>
                        <p class="mb-0 gilroy-medium text-gray-100 f-16 r-f-12 profile-header mt-2 tran-title">You have
                            full control to manage your own account setting</p>
                    </div>
                    <div class="row" id="profileUpdate">
                        <div class="col-xl-12 col-xxl-6">
                            <!-- Profile Image Div -->
                            <div class="avatar-left-div bg-white mt-32">
                                <div class="d-flex justify-content-between">
                                    <div class="left-avatar-desc">
                                        <p class="mb-0 f-20 leading-25 gilroy-Semibold text-dark">Irish Watson</p>
                                        <p class="mb-0 f-14 leading-22 gilroy-medium text-gray-100 mt-8">Please set your
                                            profile image.</p>
                                        <p class="mb-0 f-12 leading-18 gilroy-medium fst-italic text-gray mt-3p">
                                            Supported format: jpeg, png, bmp, gif, or svg</p>
                                        <div class="d-flex mt-26 align-items-center justify-content-between">
                                            <div class="camera">
                                                <input id="upload" type="file">
                                                <input type="hidden" id="file_name" />

                                                <a class="bg-primary green-btn" href="javascript:changeProfile()" id="changeProfile">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.1683 0.750003C7.1741 0.750004 7.17995 0.750006 7.18586 0.750006L10.8317 0.750003C10.9144 0.749983 10.9863 0.749965 11.0549 0.754121C11.9225 0.806667 12.6823 1.35427 13.0065 2.16076C13.0321 2.22455 13.0549 2.29277 13.081 2.3712L13.0865 2.38783C13.1213 2.49221 13.1289 2.5138 13.1353 2.52975C13.2433 2.79858 13.4966 2.98112 13.7858 2.99863C13.8028 2.99966 13.8282 3.00001 13.9458 3.00001C13.96 3.00001 13.974 3 13.9877 3C14.2239 2.99995 14.3974 2.99992 14.5458 3.01462C15.9687 3.15561 17.0944 4.28127 17.2354 5.70422C17.2501 5.85261 17.2501 6.01915 17.25 6.24402C17.25 6.25679 17.25 6.26976 17.25 6.28292V12.181C17.25 12.7847 17.25 13.283 17.2169 13.6889C17.1824 14.1104 17.1085 14.498 16.923 14.862C16.6354 15.4265 16.1765 15.8854 15.612 16.173C15.248 16.3585 14.8605 16.4324 14.4389 16.4669C14.033 16.5 13.5347 16.5 12.931 16.5H5.06902C4.4653 16.5 3.96703 16.5 3.56114 16.4669C3.13957 16.4324 2.75204 16.3585 2.38804 16.173C1.82355 15.8854 1.36461 15.4265 1.07699 14.862C0.891523 14.498 0.817599 14.1104 0.783156 13.6889C0.749993 13.283 0.75 12.7847 0.75001 12.181L0.75001 6.28292C0.75001 6.26976 0.750008 6.25679 0.750005 6.24402C0.749959 6.01915 0.749925 5.85261 0.764628 5.70422C0.905612 4.28127 2.03128 3.15561 3.45422 3.01462C3.60266 2.99992 3.77616 2.99995 4.01231 3C4.02606 3 4.04002 3.00001 4.0542 3.00001C4.1718 3.00001 4.19725 2.99966 4.21421 2.99863C4.50342 2.98112 4.75667 2.79858 4.86475 2.52975C4.87116 2.5138 4.8787 2.49222 4.9135 2.38783C4.91537 2.38222 4.91722 2.37666 4.91906 2.37115C4.94517 2.29275 4.96789 2.22453 4.99353 2.16076C5.31775 1.35427 6.0775 0.806667 6.94513 0.754121C7.01375 0.749965 7.08565 0.749983 7.1683 0.750003ZM7.18586 2.25001C7.07584 2.25001 7.05297 2.25034 7.03581 2.25138C6.7466 2.26889 6.49335 2.45143 6.38528 2.72026C6.37886 2.73621 6.37132 2.75779 6.33652 2.86218C6.33465 2.86779 6.3328 2.87335 6.33097 2.87886C6.30485 2.95726 6.28213 3.02548 6.25649 3.08925C5.93227 3.89574 5.17252 4.44334 4.30489 4.49589C4.23623 4.50005 4.16095 4.50003 4.07344 4.50001C4.06709 4.50001 4.06068 4.50001 4.0542 4.50001C3.75811 4.50001 3.66633 4.50095 3.60212 4.50731C2.89064 4.57781 2.32781 5.14064 2.25732 5.85211C2.25093 5.91658 2.25001 6.00223 2.25001 6.28292V12.15C2.25001 12.7924 2.25059 13.2292 2.27817 13.5667C2.30504 13.8955 2.35373 14.0637 2.4135 14.181C2.55731 14.4632 2.78678 14.6927 3.06902 14.8365C3.18632 14.8963 3.35448 14.945 3.68329 14.9718C4.02086 14.9994 4.45758 15 5.10001 15H12.9C13.5424 15 13.9792 14.9994 14.3167 14.9718C14.6455 14.945 14.8137 14.8963 14.931 14.8365C15.2132 14.6927 15.4427 14.4632 15.5865 14.181C15.6463 14.0637 15.695 13.8955 15.7218 13.5667C15.7494 13.2292 15.75 12.7924 15.75 12.15V6.28292C15.75 6.00223 15.7491 5.91658 15.7427 5.85211C15.6722 5.14064 15.1094 4.57781 14.3979 4.50731C14.3337 4.50095 14.2419 4.50001 13.9458 4.50001L13.9266 4.50001C13.8391 4.50003 13.7638 4.50005 13.6951 4.49589C12.8275 4.44334 12.0677 3.89574 11.7435 3.08925C11.7179 3.02547 11.6952 2.95724 11.669 2.87881L11.6635 2.86218C11.6287 2.7578 11.6212 2.73621 11.6147 2.72026C11.5067 2.45143 11.2534 2.26889 10.9642 2.25138C10.947 2.25034 10.9242 2.25001 10.8142 2.25001H7.18586ZM9.00001 7.12501C7.75737 7.12501 6.75001 8.13236 6.75001 9.37501C6.75001 10.6176 7.75737 11.625 9.00001 11.625C10.2427 11.625 11.25 10.6176 11.25 9.37501C11.25 8.13236 10.2427 7.12501 9.00001 7.12501ZM5.25001 9.37501C5.25001 7.30394 6.92894 5.62501 9.00001 5.62501C11.0711 5.62501 12.75 7.30394 12.75 9.37501C12.75 11.4461 11.0711 13.125 9.00001 13.125C6.92894 13.125 5.25001 11.4461 5.25001 9.37501Z" fill="currentColor" />
                                                    </svg>
                                                    <span class="f-14 leading-20 text-white mx-2 gilroy-medium">Change
                                                        Photo</span>
                                                </a>
                                                <span id="file-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-avatar-img">
                                        <img src="../public/uploads/user-profile/1532005837.jpg" alt="Profile" id="profileImage">
                                    </div>
                                </div>
                            </div>
                            <!-- Default Wallet Div -->
                            <div class="default-wallet-div d-flex justify-content-between bg-white mt-24">
                                <div class="wallet-text d-flex">

                                    <p class="wallet-text-hover mb-0 text-dark f-20 leading-25 gilroy-Semibold">Default
                                        Wallet</p>

                                    <div class="cursor-pointer wallet-svg d-flex align-items-center">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <svg class="ml-12" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8448 2.09484C12.759 1.18063 14.2412 1.18063 15.1554 2.09484C16.0696 3.00905 16.0696 4.49129 15.1554 5.4055L5.73337 14.8276C5.71852 14.8424 5.70381 14.8571 5.68921 14.8718C5.47363 15.0878 5.28355 15.2782 5.0544 15.4186C4.85309 15.542 4.63361 15.6329 4.40403 15.688C4.1427 15.7507 3.87364 15.7505 3.56847 15.7502C3.54781 15.7502 3.52698 15.7502 3.50598 15.7502H2.25008C1.83586 15.7502 1.50008 15.4144 1.50008 15.0002V13.7443C1.50008 13.7233 1.50006 13.7025 1.50004 13.6818C1.49975 13.3766 1.4995 13.1076 1.56224 12.8462C1.61736 12.6167 1.70827 12.3972 1.83164 12.1959C1.97206 11.9667 2.16249 11.7766 2.37848 11.5611C2.3931 11.5465 2.40784 11.5317 2.42269 11.5169L11.8448 2.09484ZM14.0948 3.1555C13.7663 2.82707 13.2339 2.82707 12.9054 3.1555L3.48335 12.5776C3.19868 12.8622 3.14619 12.9215 3.1106 12.9796C3.06948 13.0467 3.03917 13.1199 3.0208 13.1964C3.0049 13.2626 3.00008 13.3417 3.00008 13.7443V14.2502H3.50598C3.90857 14.2502 3.98762 14.2453 4.05386 14.2294C4.13039 14.2111 4.20354 14.1808 4.27065 14.1396C4.32873 14.1041 4.38804 14.0516 4.67271 13.7669L14.0948 4.34484C14.4232 4.01641 14.4232 3.48393 14.0948 3.1555ZM8.25006 15.0002C8.25006 14.586 8.58584 14.2502 9.00006 14.2502H15.7501C16.1643 14.2502 16.5001 14.586 16.5001 15.0002C16.5001 15.4144 16.1643 15.7502 15.7501 15.7502H9.00006C8.58584 15.7502 8.25006 15.4144 8.25006 15.0002Z" fill="currentColor" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="modal fade modal-overly" id="exampleModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg res-dialog">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header w-modal-header">
                                                        <p class="modal-title gilroy-Semibold text-dark">Set Default
                                                            Wallet</p>
                                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                                            <span class="close-div position-absolute modal-close-btn rtl-wrap-four text-gray-100 d-flex align-items-center justify-content-center">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body modal-body-pxy">
                                                        <form method="post" action="https://demo.paymoney.techvill.net/profile/change-default-currency" id="defaultCurrencyForm">
                                                            <input type="hidden" name="_token" value="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU" autocomplete="off"> <input type="hidden" name="user_id" id="user_id" value="2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div id="settingId"></div>
                                                                    <div class="col-md-12">
                                                                        <div class="param-ref param-ref-withdraw  money-ref r-mt-11">
                                                                            <label class="gilroy-medium text-gray-100 mb-7 f-14 leading-17 r-mt-0">Select
                                                                                Wallet
                                                                            </label>
                                                                            <select class="select2 withdraw-type" data-minimum-results-for-search="Infinity" name="default_wallet" id="default_wallet">
                                                                                <option value="11">EUR</option>
                                                                                <option value="7" Selected>USD</option>
                                                                                <option value="2">GBP</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-20">
                                                                <div class="col-md-12 pd-bottom pb-2">
                                                                    <button type="submit" class="btn bg-primary add-option-btn w-100 setting-btn f-16 leading-20 gilroy-medium" id="defaultCurrencySubmitBtn">
                                                                        <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                                                            <span class="visually-hidden"></span>
                                                                        </div>
                                                                        <span id="defaultCurrencySubmitBtnText">Save
                                                                            Changes</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 f-20 leading-25 gilroy-Semibold text-uppercase text-primary">USD</p>
                            </div>
                        </div>

                        <div class="col-xl-12 col-xxl-6">
                            <div class="bg-white profile-qr-code mt-32">
                                <h4>Login details</h4>
                                <!-- Password Div -->
                                <div class="profile-qr-bootom d-flex justify-content-between align-items-center mt-26">
                                    <div class="d-flex align-items-center">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 7.33301C5.5 4.29544 7.96244 1.83301 11 1.83301C13.2568 1.83301 15.1941 3.19209 16.042 5.13267C16.2446 5.59658 16.0329 6.13697 15.569 6.33967C15.1051 6.54236 14.5647 6.3306 14.362 5.86668C13.7953 4.56977 12.5021 3.66634 11 3.66634C8.97496 3.66634 7.33333 5.30796 7.33333 7.33301V8.25117C7.55123 8.24967 7.78286 8.24967 8.02881 8.24968H13.9712C14.7091 8.24966 15.3181 8.24965 15.8142 8.29019C16.3294 8.33228 16.8031 8.42264 17.248 8.64932C17.9379 9.00085 18.4988 9.56178 18.8504 10.2517C19.077 10.6966 19.1674 11.1702 19.2095 11.6855C19.25 12.1816 19.25 12.7906 19.25 13.5285V14.8876C19.25 15.6254 19.25 16.2344 19.2095 16.7305C19.1674 17.2458 19.077 17.7194 18.8504 18.1643C18.4988 18.8542 17.9379 19.4152 17.248 19.7667C16.8031 19.9934 16.3294 20.0837 15.8142 20.1258C15.3181 20.1664 14.7091 20.1664 13.9712 20.1663H8.02879C7.29091 20.1664 6.68192 20.1664 6.18583 20.1258C5.67057 20.0837 5.19693 19.9934 4.75204 19.7667C4.06211 19.4152 3.50118 18.8542 3.14964 18.1643C2.92296 17.7194 2.83261 17.2458 2.79051 16.7305C2.74998 16.2344 2.74999 15.6254 2.75 14.8875V13.5285C2.74999 12.7906 2.74998 12.1816 2.79051 11.6855C2.83261 11.1702 2.92296 10.6966 3.14964 10.2517C3.50118 9.56178 4.06211 9.00085 4.75204 8.64932C4.9923 8.5269 5.24094 8.44424 5.5 8.38747V7.33301ZM6.33512 10.1174C5.93324 10.1503 5.72772 10.2098 5.58435 10.2828C5.23939 10.4586 4.95892 10.7391 4.78316 11.084C4.71011 11.2274 4.65059 11.4329 4.61776 11.8348C4.58405 12.2474 4.58333 12.7811 4.58333 13.5663V14.8497C4.58333 15.6349 4.58405 16.1686 4.61776 16.5812C4.65059 16.9831 4.71011 17.1886 4.78316 17.332C4.95892 17.677 5.23939 17.9574 5.58435 18.1332C5.72772 18.2062 5.93324 18.2658 6.33512 18.2986C6.7477 18.3323 7.28147 18.333 8.06667 18.333H13.9333C14.7185 18.333 15.2523 18.3323 15.6649 18.2986C16.0668 18.2658 16.2723 18.2062 16.4157 18.1332C16.7606 17.9574 17.0411 17.677 17.2168 17.332C17.2899 17.1886 17.3494 16.9831 17.3822 16.5812C17.416 16.1686 17.4167 15.6349 17.4167 14.8497V13.5663C17.4167 12.7811 17.416 12.2474 17.3822 11.8348C17.3494 11.4329 17.2899 11.2274 17.2168 11.084C17.0411 10.7391 16.7606 10.4586 16.4157 10.2828C16.2723 10.2098 16.0668 10.1503 15.6649 10.1174C15.2523 10.0837 14.7185 10.083 13.9333 10.083H8.06667C7.28147 10.083 6.7477 10.0837 6.33512 10.1174ZM11 12.3747C11.5063 12.3747 11.9167 12.7851 11.9167 13.2913V15.1247C11.9167 15.6309 11.5063 16.0413 11 16.0413C10.4937 16.0413 10.0833 15.6309 10.0833 15.1247V13.2913C10.0833 12.7851 10.4937 12.3747 11 12.3747Z" fill="currentColor" />
                                        </svg>
                                        <p class="ml-12 mb-0 f-16 leading-20 gilroy-medium text-dark">Change Password
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="mb-0 f-16 leading-20 gilroy-medium d-flex align-items-center text-gray-100 password-text pass-height">
                                            *************</div>
                                        <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal-2">
                                            <svg class="ml-14" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="24" height="24" rx="4" fill="#635BFE" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2139 6.62899C14.925 5.91794 16.0778 5.91794 16.7889 6.62899C17.4999 7.34005 17.4999 8.4929 16.7889 9.20395L9.46059 16.5322C9.44904 16.5438 9.4376 16.5552 9.42624 16.5666C9.25857 16.7346 9.11073 16.8827 8.9325 16.9919C8.77592 17.0879 8.60522 17.1586 8.42666 17.2015C8.2234 17.2503 8.01413 17.2501 7.77678 17.2498C7.76071 17.2498 7.74451 17.2498 7.72818 17.2498H6.75136C6.4292 17.2498 6.16803 16.9886 6.16803 16.6665V15.6897C6.16803 15.6733 6.16801 15.6571 6.168 15.6411C6.16778 15.4037 6.16758 15.1945 6.21638 14.9912C6.25925 14.8126 6.32996 14.6419 6.42591 14.4853C6.53513 14.3071 6.68324 14.1593 6.85123 13.9916C6.8626 13.9803 6.87407 13.9688 6.88562 13.9573L14.2139 6.62899ZM15.9639 7.45395C15.7085 7.19851 15.2943 7.19851 15.0389 7.45395L7.71058 14.7822C7.48916 15.0036 7.44834 15.0498 7.42065 15.0949C7.38867 15.1471 7.3651 15.204 7.35081 15.2635C7.33844 15.3151 7.33469 15.3765 7.33469 15.6897V16.0831H7.72818C8.0413 16.0831 8.10279 16.0794 8.1543 16.067C8.21382 16.0527 8.27073 16.0292 8.32292 15.9972C8.36809 15.9695 8.41422 15.9287 8.63563 15.7073L15.9639 8.37899C16.2193 8.12355 16.2193 7.7094 15.9639 7.45395ZM11.418 16.6665C11.418 16.3443 11.6792 16.0831 12.0013 16.0831H17.2513C17.5735 16.0831 17.8347 16.3443 17.8347 16.6665C17.8347 16.9886 17.5735 17.2498 17.2513 17.2498H12.0013C11.6792 17.2498 11.418 16.9886 11.418 16.6665Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="modal fade modal-overly" id="exampleModal-2" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg res-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header w-modal-header">
                                                        <p class="modal-title gilroy-Semibold text-dark">Change Password
                                                        </p>
                                                        <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                                            <span class="close-div position-absolute modal-close-btn rtl-wrap-four text-gray-100 d-flex align-items-center justify-content-center">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body modal-body-pxy">
                                                        <form id="profileResetPasswordForm">
                                                            <div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="label-top mt-withdraw">
                                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 r-mt-amount r-mt-6">Old
                                                                                Password</label>
                                                                            <input type="password" class="form-control input-form-control input-form-control-withdraw apply-bg" name="old_password" id="old_password" placeholder="Old Password" required data-value-missing="This field is required.">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="label-top mt-withdraw position-r">
                                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">New
                                                                                Password</label>
                                                                            <div id="show_hide_password">
                                                                                <input type="password" class="form-control input-form-control input-form-control-withdraw apply-bg" name="password" id="password" placeholder="New Password" required data-value-missing="This field is required.">
                                                                            </div>

                                                                            <span class="eye-icon-hide d-none cursor-pointer" id="eye-icon-show">
                                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.23782 5.4956C3.23362 6.33371 2.53089 7.31858 2.17578 7.88086C2.15222 7.91816 2.13574 7.9443 2.12196 7.96698C2.11288 7.98194 2.10688 7.9923 2.10287 7.99952C2.10287 7.99979 2.10286 8.00006 2.10286 8.00033C2.10286 8.0006 2.10287 8.00087 2.10287 8.00113C2.10688 8.00835 2.11288 8.01871 2.12196 8.03367C2.13574 8.05635 2.15222 8.08249 2.17578 8.1198C2.53089 8.68208 3.23362 9.66694 4.23782 10.5051C5.24044 11.3419 6.50341 12.0003 7.99897 12.0003C9.49452 12.0003 10.7575 11.3419 11.7601 10.5051C12.7643 9.66694 13.467 8.68208 13.8222 8.11979C13.8457 8.08249 13.8622 8.05635 13.876 8.03367C13.8851 8.01871 13.8911 8.00835 13.8951 8.00113C13.8951 8.00086 13.8951 8.0006 13.8951 8.00033C13.8951 8.00006 13.8951 7.99979 13.8951 7.99952C13.8911 7.9923 13.8851 7.98194 13.876 7.96698C13.8622 7.9443 13.8457 7.91816 13.8222 7.88086C13.467 7.31858 12.7643 6.33371 11.7601 5.4956C10.7575 4.65879 9.49452 4.00033 7.99897 4.00033C6.50341 4.00033 5.24044 4.65879 4.23782 5.4956ZM3.38346 4.47195C4.53586 3.51014 6.09119 2.66699 7.99897 2.66699C9.90675 2.66699 11.4621 3.51014 12.6145 4.47195C13.7653 5.43244 14.5543 6.54318 14.9495 7.16889C14.9547 7.17716 14.9601 7.1856 14.9655 7.19422C15.044 7.31764 15.1458 7.4779 15.1972 7.70244C15.2388 7.88374 15.2388 8.11691 15.1972 8.29821C15.1458 8.52276 15.044 8.68301 14.9655 8.80644C14.9601 8.81505 14.9547 8.82349 14.9495 8.83176C14.5543 9.45747 13.7653 10.5682 12.6145 11.5287C11.4621 12.4905 9.90675 13.3337 7.99897 13.3337C6.09119 13.3337 4.53586 12.4905 3.38347 11.5287C2.23263 10.5682 1.44361 9.45747 1.04845 8.83176C1.04322 8.82349 1.03786 8.81506 1.03239 8.80644C0.953976 8.68301 0.852166 8.52276 0.800698 8.29821C0.759142 8.11691 0.759142 7.88374 0.800698 7.70244C0.852166 7.47789 0.953976 7.31764 1.03239 7.19421C1.03786 7.1856 1.04322 7.17716 1.04845 7.16889C1.44361 6.54318 2.23263 5.43244 3.38346 4.47195ZM7.99897 6.66699C7.26259 6.66699 6.66563 7.26395 6.66563 8.00033C6.66563 8.73671 7.26259 9.33366 7.99897 9.33366C8.73535 9.33366 9.3323 8.73671 9.3323 8.00033C9.3323 7.26395 8.73535 6.66699 7.99897 6.66699ZM5.3323 8.00033C5.3323 6.52757 6.52621 5.33366 7.99897 5.33366C9.47173 5.33366 10.6656 6.52757 10.6656 8.00033C10.6656 9.47308 9.47173 10.667 7.99897 10.667C6.52621 10.667 5.3323 9.47308 5.3323 8.00033Z" fill="currentColor" />
                                                                                </svg>
                                                                            </span>

                                                                            <span class="eye-icon cursor-pointer" id="eye-icon-hide">
                                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.71998 1.71967C2.01287 1.42678 2.48775 1.42678 2.78064 1.71967L5.50969 4.44872C5.55341 4.48345 5.59378 4.52354 5.62977 4.5688L13.423 12.3621C13.4739 12.4011 13.5204 12.4471 13.561 12.5L16.2806 15.2197C16.5735 15.5126 16.5735 15.9874 16.2806 16.2803C15.9877 16.5732 15.5129 16.5732 15.22 16.2803L12.8547 13.915C11.771 14.5491 10.479 15 9.00031 15C6.85406 15 5.10432 14.0515 3.80787 12.9694C2.51318 11.8889 1.62553 10.6393 1.18098 9.93536C1.1751 9.92606 1.16907 9.91657 1.16291 9.90687C1.07468 9.768 0.960135 9.5877 0.902237 9.33506C0.85549 9.13108 0.855506 8.86871 0.902276 8.66474C0.960212 8.41207 1.07508 8.23131 1.16354 8.09212C1.16975 8.08235 1.17583 8.07278 1.18175 8.06341C1.63353 7.34824 2.55099 6.05644 3.89682 4.95717L1.71998 2.78033C1.42709 2.48744 1.42709 2.01256 1.71998 1.71967ZM4.96371 6.02406C3.73433 6.99464 2.87554 8.19074 2.44991 8.86452C2.42329 8.90666 2.40463 8.93624 2.38903 8.96192C2.37862 8.97905 2.37176 8.99088 2.36719 8.99912C2.36719 8.99941 2.36719 8.99969 2.36719 8.99998C2.36719 9.00029 2.36719 9.00059 2.36719 9.00089C2.3717 9.00902 2.37845 9.02067 2.38868 9.0375C2.40417 9.06302 2.42272 9.09243 2.44923 9.1344C2.84872 9.76697 3.6393 10.8749 4.76902 11.8178C5.89697 12.7592 7.31781 13.5 9.00031 13.5C10.015 13.5 10.9334 13.2311 11.7506 12.8109L10.5242 11.5845C10.0776 11.8483 9.55635 12 9.00031 12C7.34346 12 6.00031 10.6569 6.00031 9C6.00031 8.44396 6.15203 7.92272 6.41579 7.47614L4.96371 6.02406ZM7.551 8.61135C7.51791 8.73524 7.50031 8.86549 7.50031 9C7.50031 9.82843 8.17188 10.5 9.00031 10.5C9.13482 10.5 9.26507 10.4824 9.38896 10.4493L7.551 8.61135ZM9.00031 4.5C8.71392 4.5 8.43614 4.52137 8.1669 4.56117C7.75714 4.62176 7.37586 4.33869 7.31527 3.92893C7.25469 3.51917 7.53776 3.13789 7.94751 3.0773C8.28789 3.02698 8.63899 3 9.00031 3C11.1466 3 12.8963 3.94854 14.1928 5.03057C15.4874 6.11113 16.3751 7.36072 16.8196 8.06464C16.8255 8.07394 16.8316 8.08343 16.8377 8.09312C16.9259 8.23201 17.0405 8.41232 17.0984 8.66498C17.1451 8.86897 17.1451 9.13136 17.0983 9.33533C17.0404 9.58804 16.9253 9.76906 16.8367 9.90844C16.8305 9.91825 16.8244 9.92786 16.8184 9.93727C16.5797 10.3152 16.2174 10.8436 15.7374 11.4168C15.4715 11.7344 14.9985 11.7763 14.6809 11.5104C14.3633 11.2445 14.3214 10.7714 14.5873 10.4539C15.0158 9.94209 15.3393 9.47006 15.5503 9.13608C15.577 9.09384 15.5957 9.06416 15.6114 9.0384C15.6219 9.02109 15.6288 9.00916 15.6334 9.00086C15.6334 9.00059 15.6334 9.00031 15.6334 9.00003C15.6334 8.99972 15.6334 8.99942 15.6334 8.99911C15.6289 8.99099 15.6222 8.97934 15.6119 8.9625C15.5965 8.93698 15.5779 8.90757 15.5514 8.8656C15.1519 8.23303 14.3613 7.12506 13.2316 6.18218C12.1037 5.24078 10.6828 4.5 9.00031 4.5Z" fill="#6A6B87" />
                                                                                </svg>
                                                                            </span>

                                                                            <p class="mb-0 text-gray-100 dark-B87 gilroy-regular f-12 mt-2">
                                                                                <em>*Password should contain minimum 6
                                                                                    characters</em>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="label-top mt-withdraw">
                                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">
                                                                                Confirm Password</label>
                                                                            <input type="password" class="form-control input-form-control input-form-control-withdraw apply-bg" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required data-value-missing="This field is required.">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-20">
                                                                <div class="col-md-12 pd-bottom pb-2">
                                                                    <button type="button" class="btn bg-primary add-option-btn w-100 setting-btn f-16 leading-20 gilroy-medium" id="updatePasswordBtn">
                                                                        <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                                                            <span class="visually-hidden"></span>
                                                                        </div>
                                                                        <span id="profileResetPasswordSubmitBtnText">Save
                                                                            Changes</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Email Div -->
                                <div class="profile-qr-bootom d-flex justify-content-between align-items-center mt-27">
                                    <div class="d-flex align-items-center">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4274 1.89848C10.8032 1.81118 11.1942 1.81118 11.57 1.89848C11.9992 1.99821 12.3807 2.24442 12.8148 2.52455C12.8449 2.54402 12.8754 2.56367 12.9061 2.58343L18.9475 6.47054C18.962 6.47985 18.9766 6.48927 18.9914 6.49877L19.1793 6.61966C19.1944 6.62938 19.2099 6.63932 19.2259 6.6495C19.3974 6.75901 19.6131 6.89677 19.7774 7.09139C19.9195 7.2598 20.0263 7.45459 20.0915 7.66435C20.1668 7.90677 20.1659 8.16088 20.1652 8.36287C20.1652 8.38166 20.1651 8.39999 20.1651 8.41782V14.4996C20.1651 15.1635 20.1651 15.7115 20.1283 16.1579C20.09 16.6216 20.0079 17.0478 19.8018 17.4481C19.4822 18.069 18.9723 18.5737 18.3451 18.8901C17.9407 19.094 17.5101 19.1753 17.0417 19.2132C16.5907 19.2497 16.0371 19.2497 15.3663 19.2497H6.63105C5.96027 19.2497 5.40666 19.2497 4.95568 19.2132C4.48728 19.1753 4.05671 19.094 3.65228 18.8901C3.02509 18.5737 2.51517 18.069 2.1956 17.4481C1.98953 17.0478 1.90739 16.6216 1.86912 16.1579C1.83228 15.7115 1.83228 15.1635 1.8323 14.4995L1.8323 8.41782C1.8323 8.39999 1.83223 8.38166 1.83217 8.36287C1.83147 8.16088 1.8306 7.90677 1.90591 7.66435C1.97108 7.45458 2.07787 7.2598 2.22003 7.09139C2.38433 6.89677 2.60004 6.75901 2.77151 6.6495C2.78746 6.63932 2.80302 6.62938 2.81813 6.61966L3.00603 6.49876C3.02077 6.48926 3.03542 6.47984 3.0499 6.47053C3.0571 6.4659 3.06426 6.46129 3.07138 6.45672L9.09129 2.58344C9.12202 2.56367 9.15245 2.54403 9.18263 2.52455C9.61671 2.24442 9.99822 1.99821 10.4274 1.89848ZM9.99958 3.96664L4.19465 7.7016L9.99958 11.4366C10.579 11.8094 10.7006 11.8736 10.8083 11.8986C10.9335 11.9277 11.0639 11.9277 11.1891 11.8986C11.2968 11.8736 11.4184 11.8094 11.9978 11.4366L17.8027 7.7016L11.9978 3.96664C11.4184 3.59381 11.2968 3.52959 11.1891 3.50456C11.0639 3.47546 10.9335 3.47546 10.8083 3.50456C10.7006 3.52959 10.579 3.59381 9.99958 3.96664ZM18.4985 9.22156L12.9061 12.8198C12.8754 12.8395 12.845 12.8592 12.8148 12.8786C12.3807 13.1588 11.9992 13.405 11.57 13.5047C11.1942 13.592 10.8032 13.592 10.4274 13.5047C9.99822 13.405 9.6167 13.1588 9.18263 12.8786C9.15245 12.8592 9.12201 12.8395 9.09129 12.8198L3.49891 9.22156V14.4655C3.49891 15.172 3.49956 15.6523 3.53021 16.0236C3.56006 16.3852 3.61416 16.5702 3.68056 16.6992C3.84035 17.0096 4.09531 17.262 4.4089 17.4201C4.53923 17.4859 4.72606 17.5394 5.0914 17.569C5.46646 17.5993 5.95169 17.5999 6.66549 17.5999H15.3319C16.0457 17.5999 16.5309 17.5993 16.906 17.569C17.2713 17.5394 17.4582 17.4859 17.5885 17.4201C17.9021 17.262 18.157 17.0096 18.3168 16.6992C18.3832 16.5702 18.4373 16.3852 18.4672 16.0236C18.4978 15.6523 18.4985 15.172 18.4985 14.4655V9.22156Z" fill="currentColor" />
                                        </svg>
                                        <p class="ml-12 mb-0 f-16 leading-20 gilroy-medium text-dark">Email Address</p>
                                    </div>
                                    <p class="mb-0 f-15 leading-18 gilroy-medium d-flex align-items-center text-gray-100 responsive-mail-text">
                                        <?= $email ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Information Div -->
                    <div class="profile-personal-information bg-white mt-18">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 f-24 leading-30 gilroy-Semibold text-dark">Personal Information</p>
                            <div class="hover-qr-code cursor-pointer wallet-svg  position-r">
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal-3">
                                    <svg class="ml-12" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8448 2.09484C12.759 1.18063 14.2412 1.18063 15.1554 2.09484C16.0696 3.00905 16.0696 4.49129 15.1554 5.4055L5.73337 14.8276C5.71852 14.8424 5.70381 14.8571 5.68921 14.8718C5.47363 15.0878 5.28355 15.2782 5.0544 15.4186C4.85309 15.542 4.63361 15.6329 4.40403 15.688C4.1427 15.7507 3.87364 15.7505 3.56847 15.7502C3.54781 15.7502 3.52698 15.7502 3.50598 15.7502H2.25008C1.83586 15.7502 1.50008 15.4144 1.50008 15.0002V13.7443C1.50008 13.7233 1.50006 13.7025 1.50004 13.6818C1.49975 13.3766 1.4995 13.1076 1.56224 12.8462C1.61736 12.6167 1.70827 12.3972 1.83164 12.1959C1.97206 11.9667 2.16249 11.7766 2.37848 11.5611C2.3931 11.5465 2.40784 11.5317 2.42269 11.5169L11.8448 2.09484ZM14.0948 3.1555C13.7663 2.82707 13.2339 2.82707 12.9054 3.1555L3.48335 12.5776C3.19868 12.8622 3.14619 12.9215 3.1106 12.9796C3.06948 13.0467 3.03917 13.1199 3.0208 13.1964C3.0049 13.2626 3.00008 13.3417 3.00008 13.7443V14.2502H3.50598C3.90857 14.2502 3.98762 14.2453 4.05386 14.2294C4.13039 14.2111 4.20354 14.1808 4.27065 14.1396C4.32873 14.1041 4.38804 14.0516 4.67271 13.7669L14.0948 4.34484C14.4232 4.01641 14.4232 3.48393 14.0948 3.1555ZM8.25006 15.0002C8.25006 14.586 8.58584 14.2502 9.00006 14.2502H15.7501C16.1643 14.2502 16.5001 14.586 16.5001 15.0002C16.5001 15.4144 16.1643 15.7502 15.7501 15.7502H9.00006C8.58584 15.7502 8.25006 15.4144 8.25006 15.0002Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>

                            <div class="modal fade modal-overly" id="exampleModal-3" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg res-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header w-modal-header">
                                            <p class="modal-title gilroy-Semibold text-dark">Profile Information</p>
                                            <button type="button" class="cursor-pointer close-btn" data-bs-dismiss="modal" aria-label="Close">
                                                <span class="close-div position-absolute modal-close-btn rtl-wrap-four text-gray-100 d-flex align-items-center justify-content-center">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.24408 5.24408C5.56951 4.91864 6.09715 4.91864 6.42259 5.24408L10 8.82149L13.5774 5.24408C13.9028 4.91864 14.4305 4.91864 14.7559 5.24408C15.0814 5.56951 15.0814 6.09715 14.7559 6.42259L11.1785 10L14.7559 13.5774C15.0814 13.9028 15.0814 14.4305 14.7559 14.7559C14.4305 15.0814 13.9028 15.0814 13.5774 14.7559L10 11.1785L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L8.82149 10L5.24408 6.42259C4.91864 6.09715 4.91864 5.56951 5.24408 5.24408Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body modal-body-pxy">
                                            <form id="profileUpdateForm">

                                                <div class="row">
                                                    <!-- First Name -->
                                                    <div class="col-6 column-pr-unset2">
                                                        <div class="label-top mt-withdraw">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 r-mt-amount r-mt-6">First
                                                                Name <span class="f-16 text-F30">*</span></label>
                                                            <input type="text" class="form-control input-form-control input-form-control-withdraw apply-bg" name="first_name" id="first_name" value="<?= $fname ?>" required data-value-missing="This field is required.">
                                                        </div>
                                                    </div>
                                                    <!-- Last Name -->
                                                    <div class="col-6 column-pl-unset2">
                                                        <div class="label-top mt-withdraw position-r">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 r-mt-amount r-mt-6">Last
                                                                Name <span class="f-16 text-F30">*</span></label>
                                                            <input type="text" class="form-control input-form-control input-form-control-withdraw apply-bg" name="last_name" id="last_name" value="<?= $lname ?>" required data-value-missing="This field is required.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Phone -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="label-top mt-withdraw">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">Phone</label>
                                                            <input type="tel" class="form-control apply-bg" id="phone" name="phone" value="<?= $phone ?>">
                                                            <span id="phone-error"></span>
                                                            <span id="tel-error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Adress 1 -->
                                                    <div class="col-6 column-pl-unset2">
                                                        <div class="label-top mt-withdraw">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">Adress
                                                                1</label>
                                                            <textarea class="form-control input-form-control input-form-control-withdraw apply-bg" name="address_1" id="address_1" rows="2" value=""><?= $address1 ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Adress 2 -->
                                                    <div class="col-6 column-pl-unset2">
                                                        <div class="label-top mt-withdraw">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">Adress
                                                                2</label>
                                                            <textarea class="form-control input-form-control input-form-control-withdraw apply-bg" name="address_2" id="address_2" rows="2"><?= $address2 ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- City -->
                                                    <div class="col-6 column-pr-unset2">
                                                        <div class="label-top mt-withdraw">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">City</label>
                                                            <input type="text" class="form-control input-form-control input-form-control-withdraw apply-bg" name="city" id="city" value="<?= $city ?>">
                                                        </div>
                                                    </div>
                                                    <!-- State -->
                                                    <div class="col-6 column-pl-unset2">
                                                        <div class="label-top mt-withdraw position-r">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-amount r-mt-6">State</label>
                                                            <input type="text" class="form-control input-form-control input-form-control-withdraw apply-bg" name="state" id="state" value="<?= $state ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <!-- Country -->
                                                    <div class="col-6 column-pr-unset2">
                                                        <div class="param-ref param-ref-withdraw param-ref-withdraw-modal money-ref-2">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-0">Country</label>
                                                            <select class="select2" name="country_id" id="country" value="<?= $country ?>">
                                                                <option value="<?= $country ?>"><?= $country ?></option>
                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola">Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antarctica">Antarctica</option>
                                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                <option value="Argentina">Argentina</option>
                                                                <option value="Armenia">Armenia</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Austria">Austria</option>
                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                <option value="Bahamas">Bahamas</option>
                                                                <option value="Bahrain">Bahrain</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbados">Barbados</option>
                                                                <option value="Belarus">Belarus</option>
                                                                <option value="Belgium">Belgium</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="Benin">Benin</option>
                                                                <option value="Bermuda">Bermuda</option>
                                                                <option value="Bhutan">Bhutan</option>
                                                                <option value="Bolivia">Bolivia</option>
                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Bouvet Island">Bouvet Island</option>
                                                                <option value="Brazil">Brazil</option>
                                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                                                </option>
                                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                <option value="Bulgaria">Bulgaria</option>
                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                <option value="Burundi">Burundi</option>
                                                                <option value="Cambodia">Cambodia</option>
                                                                <option value="Cameroon">Cameroon</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="Cape Verde">Cape Verde</option>
                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                <option value="Central African Republic">Central African Republic</option>
                                                                <option value="Chad">Chad</option>
                                                                <option value="Chile">Chile</option>
                                                                <option value="China">China</option>
                                                                <option value="Christmas Island">Christmas Island</option>
                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Congo">Congo</option>
                                                                <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                                                <option value="Croatia">Croatia</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Cyprus">Cyprus</option>
                                                                <option value="Czech Republic">Czech Republic</option>
                                                                <option value="Denmark">Denmark</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominica">Dominica</option>
                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                <option value="Ecuador">Ecuador</option>
                                                                <option value="Egypt">Egypt</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                <option value="Eritrea">Eritrea</option>
                                                                <option value="Estonia">Estonia</option>
                                                                <option value="Ethiopia">Ethiopia</option>
                                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>
                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="French Southern Territories">French Southern Territories</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia">Gambia</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Greece">Greece</option>
                                                                <option value="Greenland">Greenland</option>
                                                                <option value="Grenada">Grenada</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guinea">Guinea</option>
                                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Haiti">Haiti</option>
                                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                                                                </option>
                                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                                                </option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hong Kong">Hong Kong</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="India">India</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Israel">Israel</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>
                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea, Democratic People's
                                                                    Republic of">Korea, Democratic People's
                                                                    Republic of</option>
                                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Lao People's Democratic
                                                                    Republic">Lao People's Democratic
                                                                    Republic</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>
                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macao">Macao</option>
                                                                <option value="Macedonia, the Former Yugoslav
                                                                    Republic of">Macedonia, the Former Yugoslav
                                                                    Republic of</option>
                                                                <option value="Madagascar">Madagascar</option>
                                                                <option value="Malawi">Malawi</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <option value="Maldives">Maldives</option>
                                                                <option value="Mali">Mali</option>
                                                                <option value="Malta">Malta</option>
                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                <option value="Martinique">Martinique</option>
                                                                <option value="Mauritania">Mauritania</option>
                                                                <option value="Mauritius">Mauritius</option>
                                                                <option value="Mayotte">Mayotte</option>
                                                                <option value="Mexico">Mexico</option>
                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of
                                                                </option>
                                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montserrat">Montserrat</option>
                                                                <option value="Morocco">Morocco</option>
                                                                <option value="Mozambique">Mozambique</option>
                                                                <option value="Myanmar">Myanmar</option>
                                                                <option value="Namibia">Namibia</option>
                                                                <option value="Nauru">Nauru</option>
                                                                <option value="Nepal">Nepal</option>
                                                                <option value="Netherlands">Netherlands</option>
                                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                <option value="New Caledonia">New Caledonia</option>
                                                                <option value="New Zealand">New Zealand</option>
                                                                <option value="Nicaragua">Nicaragua</option>
                                                                <option value="Niger">Niger</option>
                                                                <option value="Nigeria">Nigeria</option>
                                                                <option value="Niue">Niue</option>
                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                <option value="Norway">Norway</option>
                                                                <option value="Oman">Oman</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Palau">Palau</option>
                                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                                                                </option>
                                                                <option value="Panama">Panama</option>
                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                <option value="Paraguay">Paraguay</option>
                                                                <option value="Peru">Peru</option>
                                                                <option value="Philippines">Philippines</option>
                                                                <option value="Pitcairn">Pitcairn</option>
                                                                <option value="Poland">Poland</option>
                                                                <option value="Portugal">Portugal</option>
                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Reunion">Reunion</option>
                                                                <option value="Romania">Romania</option>
                                                                <option value="Russian Federation">Russian Federation</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="Saint Helena">Saint Helena</option>
                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
                                                                </option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>
                                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>
                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="South Georgia and the South Sandwich
                                                                    Islands">South Georgia and the South Sandwich
                                                                    Islands</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="Sudan">Sudan</option>
                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                                                </option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Timor-Leste">Timor-Leste</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>
                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                <option value="Tuvalu">Tuvalu</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>
                                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                                                                </option>
                                                                <option value="Uruguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Viet Nam">Viet Nam</option>
                                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                <option value="Western Sahara">Western Sahara</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Timezone -->
                                                    <div class="col-6 column-pl-unset2">
                                                        <div class="param-ref param-ref-withdraw param-ref-withdraw-modal money-ref-2">
                                                            <label class="gilroy-medium text-gray-100 mb-2 f-14 leading-17 mt-20 r-mt-0">Time
                                                                Zone</label>
                                                            <select class="select2" name="timezone" id="timezone" value="<?= $timezone ?>">
                                                                <option value="<?= $timezone ?>"><?= $timezone ?></option>
                                                                <option value="Africa/Abidjan">UTC/GMT +00:00 -
                                                                    Africa/Abidjan</option>
                                                                <option value="Africa/Accra">UTC/GMT +00:00 -
                                                                    Africa/Accra</option>
                                                                <option value="Africa/Addis_Ababa">UTC/GMT +03:00 -
                                                                    Africa/Addis_Ababa</option>
                                                                <option value="Africa/Algiers">UTC/GMT +01:00 -
                                                                    Africa/Algiers</option>
                                                                <option value="Africa/Asmara">UTC/GMT +03:00 -
                                                                    Africa/Asmara</option>
                                                                <option value="Africa/Bamako">UTC/GMT +00:00 -
                                                                    Africa/Bamako</option>
                                                                <option value="Africa/Bangui">UTC/GMT +01:00 -
                                                                    Africa/Bangui</option>
                                                                <option value="Africa/Banjul">UTC/GMT +00:00 -
                                                                    Africa/Banjul</option>
                                                                <option value="Africa/Bissau">UTC/GMT +00:00 -
                                                                    Africa/Bissau</option>
                                                                <option value="Africa/Blantyre">UTC/GMT +02:00 -
                                                                    Africa/Blantyre</option>
                                                                <option value="Africa/Brazzaville">UTC/GMT +01:00 -
                                                                    Africa/Brazzaville</option>
                                                                <option value="Africa/Bujumbura">UTC/GMT +02:00 -
                                                                    Africa/Bujumbura</option>
                                                                <option value="Africa/Cairo">UTC/GMT +02:00 -
                                                                    Africa/Cairo</option>
                                                                <option value="Africa/Casablanca">UTC/GMT +01:00 -
                                                                    Africa/Casablanca</option>
                                                                <option value="Africa/Ceuta">UTC/GMT +01:00 -
                                                                    Africa/Ceuta</option>
                                                                <option value="Africa/Conakry">UTC/GMT +00:00 -
                                                                    Africa/Conakry</option>
                                                                <option value="Africa/Dakar">UTC/GMT +00:00 -
                                                                    Africa/Dakar</option>
                                                                <option value="Africa/Dar_es_Salaam">UTC/GMT +03:00 -
                                                                    Africa/Dar_es_Salaam</option>
                                                                <option value="Africa/Djibouti">UTC/GMT +03:00 -
                                                                    Africa/Djibouti</option>
                                                                <option value="Africa/Douala">UTC/GMT +01:00 -
                                                                    Africa/Douala</option>
                                                                <option value="Africa/El_Aaiun">UTC/GMT +01:00 -
                                                                    Africa/El_Aaiun</option>
                                                                <option value="Africa/Freetown">UTC/GMT +00:00 -
                                                                    Africa/Freetown</option>
                                                                <option value="Africa/Gaborone">UTC/GMT +02:00 -
                                                                    Africa/Gaborone</option>
                                                                <option value="Africa/Harare">UTC/GMT +02:00 -
                                                                    Africa/Harare</option>
                                                                <option value="Africa/Johannesburg">UTC/GMT +02:00 -
                                                                    Africa/Johannesburg</option>
                                                                <option value="Africa/Juba">UTC/GMT +02:00 - Africa/Juba
                                                                </option>
                                                                <option value="Africa/Kampala">UTC/GMT +03:00 -
                                                                    Africa/Kampala</option>
                                                                <option value="Africa/Khartoum">UTC/GMT +02:00 -
                                                                    Africa/Khartoum</option>
                                                                <option value="Africa/Kigali">UTC/GMT +02:00 -
                                                                    Africa/Kigali</option>
                                                                <option value="Africa/Kinshasa">UTC/GMT +01:00 -
                                                                    Africa/Kinshasa</option>
                                                                <option value="Africa/Lagos">UTC/GMT +01:00 -
                                                                    Africa/Lagos</option>
                                                                <option value="Africa/Libreville">UTC/GMT +01:00 -
                                                                    Africa/Libreville</option>
                                                                <option value="Africa/Lome">UTC/GMT +00:00 - Africa/Lome
                                                                </option>
                                                                <option value="Africa/Luanda">UTC/GMT +01:00 -
                                                                    Africa/Luanda</option>
                                                                <option value="Africa/Lubumbashi">UTC/GMT +02:00 -
                                                                    Africa/Lubumbashi</option>
                                                                <option value="Africa/Lusaka">UTC/GMT +02:00 -
                                                                    Africa/Lusaka</option>
                                                                <option value="Africa/Malabo">UTC/GMT +01:00 -
                                                                    Africa/Malabo</option>
                                                                <option value="Africa/Maputo">UTC/GMT +02:00 -
                                                                    Africa/Maputo</option>
                                                                <option value="Africa/Maseru">UTC/GMT +02:00 -
                                                                    Africa/Maseru</option>
                                                                <option value="Africa/Mbabane">UTC/GMT +02:00 -
                                                                    Africa/Mbabane</option>
                                                                <option value="Africa/Mogadishu">UTC/GMT +03:00 -
                                                                    Africa/Mogadishu</option>
                                                                <option value="Africa/Monrovia">UTC/GMT +00:00 -
                                                                    Africa/Monrovia</option>
                                                                <option value="Africa/Nairobi">UTC/GMT +03:00 -
                                                                    Africa/Nairobi</option>
                                                                <option value="Africa/Ndjamena">UTC/GMT +01:00 -
                                                                    Africa/Ndjamena</option>
                                                                <option value="Africa/Niamey">UTC/GMT +01:00 -
                                                                    Africa/Niamey</option>
                                                                <option value="Africa/Nouakchott">UTC/GMT +00:00 -
                                                                    Africa/Nouakchott</option>
                                                                <option value="Africa/Ouagadougou">UTC/GMT +00:00 -
                                                                    Africa/Ouagadougou</option>
                                                                <option value="Africa/Porto-Novo">UTC/GMT +01:00 -
                                                                    Africa/Porto-Novo</option>
                                                                <option value="Africa/Sao_Tome">UTC/GMT +00:00 -
                                                                    Africa/Sao_Tome</option>
                                                                <option value="Africa/Tripoli">UTC/GMT +02:00 -
                                                                    Africa/Tripoli</option>
                                                                <option value="Africa/Tunis">UTC/GMT +01:00 -
                                                                    Africa/Tunis</option>
                                                                <option value="Africa/Windhoek">UTC/GMT +02:00 -
                                                                    Africa/Windhoek</option>
                                                                <option value="America/Adak">UTC/GMT -10:00 -
                                                                    America/Adak</option>
                                                                <option value="America/Anchorage">UTC/GMT -09:00 -
                                                                    America/Anchorage</option>
                                                                <option value="America/Anguilla">UTC/GMT -04:00 -
                                                                    America/Anguilla</option>
                                                                <option value="America/Antigua">UTC/GMT -04:00 -
                                                                    America/Antigua</option>
                                                                <option value="America/Araguaina">UTC/GMT -03:00 -
                                                                    America/Araguaina</option>
                                                                <option value="America/Argentina/Buenos_Aires">UTC/GMT
                                                                    -03:00 - America/Argentina/Buenos_Aires</option>
                                                                <option value="America/Argentina/Catamarca">UTC/GMT
                                                                    -03:00 - America/Argentina/Catamarca</option>
                                                                <option value="America/Argentina/Cordoba">UTC/GMT -03:00
                                                                    - America/Argentina/Cordoba</option>
                                                                <option value="America/Argentina/Jujuy">UTC/GMT -03:00 -
                                                                    America/Argentina/Jujuy</option>
                                                                <option value="America/Argentina/La_Rioja">UTC/GMT
                                                                    -03:00 - America/Argentina/La_Rioja</option>
                                                                <option value="America/Argentina/Mendoza">UTC/GMT -03:00
                                                                    - America/Argentina/Mendoza</option>
                                                                <option value="America/Argentina/Rio_Gallegos">UTC/GMT
                                                                    -03:00 - America/Argentina/Rio_Gallegos</option>
                                                                <option value="America/Argentina/Salta">UTC/GMT -03:00 -
                                                                    America/Argentina/Salta</option>
                                                                <option value="America/Argentina/San_Juan">UTC/GMT
                                                                    -03:00 - America/Argentina/San_Juan</option>
                                                                <option value="America/Argentina/San_Luis">UTC/GMT
                                                                    -03:00 - America/Argentina/San_Luis</option>
                                                                <option value="America/Argentina/Tucuman">UTC/GMT -03:00
                                                                    - America/Argentina/Tucuman</option>
                                                                <option value="America/Argentina/Ushuaia">UTC/GMT -03:00
                                                                    - America/Argentina/Ushuaia</option>
                                                                <option value="America/Aruba">UTC/GMT -04:00 -
                                                                    America/Aruba</option>
                                                                <option value="America/Asuncion">UTC/GMT -03:00 -
                                                                    America/Asuncion</option>
                                                                <option value="America/Atikokan">UTC/GMT -05:00 -
                                                                    America/Atikokan</option>
                                                                <option value="America/Bahia">UTC/GMT -03:00 -
                                                                    America/Bahia</option>
                                                                <option value="America/Bahia_Banderas">UTC/GMT -06:00 -
                                                                    America/Bahia_Banderas</option>
                                                                <option value="America/Barbados">UTC/GMT -04:00 -
                                                                    America/Barbados</option>
                                                                <option value="America/Belem">UTC/GMT -03:00 -
                                                                    America/Belem</option>
                                                                <option value="America/Belize">UTC/GMT -06:00 -
                                                                    America/Belize</option>
                                                                <option value="America/Blanc-Sablon">UTC/GMT -04:00 -
                                                                    America/Blanc-Sablon</option>
                                                                <option value="America/Boa_Vista">UTC/GMT -04:00 -
                                                                    America/Boa_Vista</option>
                                                                <option value="America/Bogota">UTC/GMT -05:00 -
                                                                    America/Bogota</option>
                                                                <option value="America/Boise">UTC/GMT -07:00 -
                                                                    America/Boise</option>
                                                                <option value="America/Cambridge_Bay">UTC/GMT -07:00 -
                                                                    America/Cambridge_Bay</option>
                                                                <option value="America/Campo_Grande">UTC/GMT -04:00 -
                                                                    America/Campo_Grande</option>
                                                                <option value="America/Cancun">UTC/GMT -05:00 -
                                                                    America/Cancun</option>
                                                                <option value="America/Caracas">UTC/GMT -04:00 -
                                                                    America/Caracas</option>
                                                                <option value="America/Cayenne">UTC/GMT -03:00 -
                                                                    America/Cayenne</option>
                                                                <option value="America/Cayman">UTC/GMT -05:00 -
                                                                    America/Cayman</option>
                                                                <option value="America/Chicago">UTC/GMT -06:00 -
                                                                    America/Chicago</option>
                                                                <option value="America/Chihuahua">UTC/GMT -06:00 -
                                                                    America/Chihuahua</option>
                                                                <option value="America/Ciudad_Juarez">UTC/GMT -07:00 -
                                                                    America/Ciudad_Juarez</option>
                                                                <option value="America/Costa_Rica">UTC/GMT -06:00 -
                                                                    America/Costa_Rica</option>
                                                                <option value="America/Creston">UTC/GMT -07:00 -
                                                                    America/Creston</option>
                                                                <option value="America/Cuiaba">UTC/GMT -04:00 -
                                                                    America/Cuiaba</option>
                                                                <option value="America/Curacao">UTC/GMT -04:00 -
                                                                    America/Curacao</option>
                                                                <option value="America/Danmarkshavn">UTC/GMT +00:00 -
                                                                    America/Danmarkshavn</option>
                                                                <option value="America/Dawson">UTC/GMT -07:00 -
                                                                    America/Dawson</option>
                                                                <option value="America/Dawson_Creek">UTC/GMT -07:00 -
                                                                    America/Dawson_Creek</option>
                                                                <option value="America/Denver">UTC/GMT -07:00 -
                                                                    America/Denver</option>
                                                                <option value="America/Detroit">UTC/GMT -05:00 -
                                                                    America/Detroit</option>
                                                                <option value="America/Dominica">UTC/GMT -04:00 -
                                                                    America/Dominica</option>
                                                                <option value="America/Edmonton">UTC/GMT -07:00 -
                                                                    America/Edmonton</option>
                                                                <option value="America/Eirunepe">UTC/GMT -05:00 -
                                                                    America/Eirunepe</option>
                                                                <option value="America/El_Salvador">UTC/GMT -06:00 -
                                                                    America/El_Salvador</option>
                                                                <option value="America/Fort_Nelson">UTC/GMT -07:00 -
                                                                    America/Fort_Nelson</option>
                                                                <option value="America/Fortaleza">UTC/GMT -03:00 -
                                                                    America/Fortaleza</option>
                                                                <option value="America/Glace_Bay">UTC/GMT -04:00 -
                                                                    America/Glace_Bay</option>
                                                                <option value="America/Goose_Bay">UTC/GMT -04:00 -
                                                                    America/Goose_Bay</option>
                                                                <option value="America/Grand_Turk">UTC/GMT -05:00 -
                                                                    America/Grand_Turk</option>
                                                                <option value="America/Grenada">UTC/GMT -04:00 -
                                                                    America/Grenada</option>
                                                                <option value="America/Guadeloupe">UTC/GMT -04:00 -
                                                                    America/Guadeloupe</option>
                                                                <option value="America/Guatemala">UTC/GMT -06:00 -
                                                                    America/Guatemala</option>
                                                                <option value="America/Guayaquil">UTC/GMT -05:00 -
                                                                    America/Guayaquil</option>
                                                                <option value="America/Guyana">UTC/GMT -04:00 -
                                                                    America/Guyana</option>
                                                                <option value="America/Halifax">UTC/GMT -04:00 -
                                                                    America/Halifax</option>
                                                                <option value="America/Havana">UTC/GMT -05:00 -
                                                                    America/Havana</option>
                                                                <option value="America/Hermosillo">UTC/GMT -07:00 -
                                                                    America/Hermosillo</option>
                                                                <option value="America/Indiana/Indianapolis">UTC/GMT
                                                                    -05:00 - America/Indiana/Indianapolis</option>
                                                                <option value="America/Indiana/Knox">UTC/GMT -06:00 -
                                                                    America/Indiana/Knox</option>
                                                                <option value="America/Indiana/Marengo">UTC/GMT -05:00 -
                                                                    America/Indiana/Marengo</option>
                                                                <option value="America/Indiana/Petersburg">UTC/GMT
                                                                    -05:00 - America/Indiana/Petersburg</option>
                                                                <option value="America/Indiana/Tell_City">UTC/GMT -06:00
                                                                    - America/Indiana/Tell_City</option>
                                                                <option value="America/Indiana/Vevay">UTC/GMT -05:00 -
                                                                    America/Indiana/Vevay</option>
                                                                <option value="America/Indiana/Vincennes">UTC/GMT -05:00
                                                                    - America/Indiana/Vincennes</option>
                                                                <option value="America/Indiana/Winamac">UTC/GMT -05:00 -
                                                                    America/Indiana/Winamac</option>
                                                                <option value="America/Inuvik">UTC/GMT -07:00 -
                                                                    America/Inuvik</option>
                                                                <option value="America/Iqaluit">UTC/GMT -05:00 -
                                                                    America/Iqaluit</option>
                                                                <option value="America/Jamaica">UTC/GMT -05:00 -
                                                                    America/Jamaica</option>
                                                                <option value="America/Juneau">UTC/GMT -09:00 -
                                                                    America/Juneau</option>
                                                                <option value="America/Kentucky/Louisville">UTC/GMT
                                                                    -05:00 - America/Kentucky/Louisville</option>
                                                                <option value="America/Kentucky/Monticello">UTC/GMT
                                                                    -05:00 - America/Kentucky/Monticello</option>
                                                                <option value="America/Kralendijk">UTC/GMT -04:00 -
                                                                    America/Kralendijk</option>
                                                                <option value="America/La_Paz">UTC/GMT -04:00 -
                                                                    America/La_Paz</option>
                                                                <option value="America/Lima">UTC/GMT -05:00 -
                                                                    America/Lima</option>
                                                                <option value="America/Los_Angeles">UTC/GMT -08:00 -
                                                                    America/Los_Angeles</option>
                                                                <option value="America/Lower_Princes">UTC/GMT -04:00 -
                                                                    America/Lower_Princes</option>
                                                                <option value="America/Maceio">UTC/GMT -03:00 -
                                                                    America/Maceio</option>
                                                                <option value="America/Managua">UTC/GMT -06:00 -
                                                                    America/Managua</option>
                                                                <option value="America/Manaus">UTC/GMT -04:00 -
                                                                    America/Manaus</option>
                                                                <option value="America/Marigot">UTC/GMT -04:00 -
                                                                    America/Marigot</option>
                                                                <option value="America/Martinique">UTC/GMT -04:00 -
                                                                    America/Martinique</option>
                                                                <option value="America/Matamoros">UTC/GMT -06:00 -
                                                                    America/Matamoros</option>
                                                                <option value="America/Mazatlan">UTC/GMT -07:00 -
                                                                    America/Mazatlan</option>
                                                                <option value="America/Menominee">UTC/GMT -06:00 -
                                                                    America/Menominee</option>
                                                                <option value="America/Merida">UTC/GMT -06:00 -
                                                                    America/Merida</option>
                                                                <option value="America/Metlakatla">UTC/GMT -09:00 -
                                                                    America/Metlakatla</option>
                                                                <option value="America/Mexico_City">UTC/GMT -06:00 -
                                                                    America/Mexico_City</option>
                                                                <option value="America/Miquelon">UTC/GMT -03:00 -
                                                                    America/Miquelon</option>
                                                                <option value="America/Moncton">UTC/GMT -04:00 -
                                                                    America/Moncton</option>
                                                                <option value="America/Monterrey">UTC/GMT -06:00 -
                                                                    America/Monterrey</option>
                                                                <option value="America/Montevideo">UTC/GMT -03:00 -
                                                                    America/Montevideo</option>
                                                                <option value="America/Montserrat">UTC/GMT -04:00 -
                                                                    America/Montserrat</option>
                                                                <option value="America/Nassau">UTC/GMT -05:00 -
                                                                    America/Nassau</option>
                                                                <option value="America/New_York">UTC/GMT -05:00 -
                                                                    America/New_York</option>
                                                                <option value="America/Nome">UTC/GMT -09:00 -
                                                                    America/Nome</option>
                                                                <option value="America/Noronha">UTC/GMT -02:00 -
                                                                    America/Noronha</option>
                                                                <option value="America/North_Dakota/Beulah">UTC/GMT
                                                                    -06:00 - America/North_Dakota/Beulah</option>
                                                                <option value="America/North_Dakota/Center">UTC/GMT
                                                                    -06:00 - America/North_Dakota/Center</option>
                                                                <option value="America/North_Dakota/New_Salem">UTC/GMT
                                                                    -06:00 - America/North_Dakota/New_Salem</option>
                                                                <option value="America/Nuuk">UTC/GMT -02:00 -
                                                                    America/Nuuk</option>
                                                                <option value="America/Ojinaga">UTC/GMT -06:00 -
                                                                    America/Ojinaga</option>
                                                                <option value="America/Panama">UTC/GMT -05:00 -
                                                                    America/Panama</option>
                                                                <option value="America/Paramaribo">UTC/GMT -03:00 -
                                                                    America/Paramaribo</option>
                                                                <option value="America/Phoenix">UTC/GMT -07:00 -
                                                                    America/Phoenix</option>
                                                                <option value="America/Port-au-Prince">UTC/GMT -05:00 -
                                                                    America/Port-au-Prince</option>
                                                                <option value="America/Port_of_Spain">UTC/GMT -04:00 -
                                                                    America/Port_of_Spain</option>
                                                                <option value="America/Porto_Velho">UTC/GMT -04:00 -
                                                                    America/Porto_Velho</option>
                                                                <option value="America/Puerto_Rico">UTC/GMT -04:00 -
                                                                    America/Puerto_Rico</option>
                                                                <option value="America/Punta_Arenas">UTC/GMT -03:00 -
                                                                    America/Punta_Arenas</option>
                                                                <option value="America/Rankin_Inlet">UTC/GMT -06:00 -
                                                                    America/Rankin_Inlet</option>
                                                                <option value="America/Recife">UTC/GMT -03:00 -
                                                                    America/Recife</option>
                                                                <option value="America/Regina">UTC/GMT -06:00 -
                                                                    America/Regina</option>
                                                                <option value="America/Resolute">UTC/GMT -06:00 -
                                                                    America/Resolute</option>
                                                                <option value="America/Rio_Branco">UTC/GMT -05:00 -
                                                                    America/Rio_Branco</option>
                                                                <option value="America/Santarem">UTC/GMT -03:00 -
                                                                    America/Santarem</option>
                                                                <option value="America/Santiago">UTC/GMT -03:00 -
                                                                    America/Santiago</option>
                                                                <option value="America/Santo_Domingo">UTC/GMT -04:00 -
                                                                    America/Santo_Domingo</option>
                                                                <option value="America/Sao_Paulo">UTC/GMT -03:00 -
                                                                    America/Sao_Paulo</option>
                                                                <option value="America/Scoresbysund">UTC/GMT -01:00 -
                                                                    America/Scoresbysund</option>
                                                                <option value="America/Sitka">UTC/GMT -09:00 -
                                                                    America/Sitka</option>
                                                                <option value="America/St_Barthelemy">UTC/GMT -04:00 -
                                                                    America/St_Barthelemy</option>
                                                                <option value="America/St_Johns">UTC/GMT -03:30 -
                                                                    America/St_Johns</option>
                                                                <option value="America/St_Kitts">UTC/GMT -04:00 -
                                                                    America/St_Kitts</option>
                                                                <option value="America/St_Lucia">UTC/GMT -04:00 -
                                                                    America/St_Lucia</option>
                                                                <option value="America/St_Thomas">UTC/GMT -04:00 -
                                                                    America/St_Thomas</option>
                                                                <option value="America/St_Vincent">UTC/GMT -04:00 -
                                                                    America/St_Vincent</option>
                                                                <option value="America/Swift_Current">UTC/GMT -06:00 -
                                                                    America/Swift_Current</option>
                                                                <option value="America/Tegucigalpa">UTC/GMT -06:00 -
                                                                    America/Tegucigalpa</option>
                                                                <option value="America/Thule">UTC/GMT -04:00 -
                                                                    America/Thule</option>
                                                                <option value="America/Tijuana">UTC/GMT -08:00 -
                                                                    America/Tijuana</option>
                                                                <option value="America/Toronto">UTC/GMT -05:00 -
                                                                    America/Toronto</option>
                                                                <option value="America/Tortola">UTC/GMT -04:00 -
                                                                    America/Tortola</option>
                                                                <option value="America/Vancouver">UTC/GMT -08:00 -
                                                                    America/Vancouver</option>
                                                                <option value="America/Whitehorse">UTC/GMT -07:00 -
                                                                    America/Whitehorse</option>
                                                                <option value="America/Winnipeg">UTC/GMT -06:00 -
                                                                    America/Winnipeg</option>
                                                                <option value="America/Yakutat">UTC/GMT -09:00 -
                                                                    America/Yakutat</option>
                                                                <option value="Antarctica/Casey">UTC/GMT +11:00 -
                                                                    Antarctica/Casey</option>
                                                                <option value="Antarctica/Davis">UTC/GMT +07:00 -
                                                                    Antarctica/Davis</option>
                                                                <option value="Antarctica/DumontDUrville">UTC/GMT +10:00
                                                                    - Antarctica/DumontDUrville</option>
                                                                <option value="Antarctica/Macquarie">UTC/GMT +11:00 -
                                                                    Antarctica/Macquarie</option>
                                                                <option value="Antarctica/Mawson">UTC/GMT +05:00 -
                                                                    Antarctica/Mawson</option>
                                                                <option value="Antarctica/McMurdo">UTC/GMT +13:00 -
                                                                    Antarctica/McMurdo</option>
                                                                <option value="Antarctica/Palmer">UTC/GMT -03:00 -
                                                                    Antarctica/Palmer</option>
                                                                <option value="Antarctica/Rothera">UTC/GMT -03:00 -
                                                                    Antarctica/Rothera</option>
                                                                <option value="Antarctica/Syowa">UTC/GMT +03:00 -
                                                                    Antarctica/Syowa</option>
                                                                <option value="Antarctica/Troll">UTC/GMT +00:00 -
                                                                    Antarctica/Troll</option>
                                                                <option value="Antarctica/Vostok">UTC/GMT +06:00 -
                                                                    Antarctica/Vostok</option>
                                                                <option value="Arctic/Longyearbyen">UTC/GMT +01:00 -
                                                                    Arctic/Longyearbyen</option>
                                                                <option value="Asia/Aden">UTC/GMT +03:00 - Asia/Aden
                                                                </option>
                                                                <option value="Asia/Almaty">UTC/GMT +06:00 - Asia/Almaty
                                                                </option>
                                                                <option value="Asia/Amman">UTC/GMT +03:00 - Asia/Amman
                                                                </option>
                                                                <option value="Asia/Anadyr">UTC/GMT +12:00 - Asia/Anadyr
                                                                </option>
                                                                <option value="Asia/Aqtau">UTC/GMT +05:00 - Asia/Aqtau
                                                                </option>
                                                                <option value="Asia/Aqtobe">UTC/GMT +05:00 - Asia/Aqtobe
                                                                </option>
                                                                <option value="Asia/Ashgabat">UTC/GMT +05:00 -
                                                                    Asia/Ashgabat</option>
                                                                <option value="Asia/Atyrau">UTC/GMT +05:00 - Asia/Atyrau
                                                                </option>
                                                                <option value="Asia/Baghdad">UTC/GMT +03:00 -
                                                                    Asia/Baghdad</option>
                                                                <option value="Asia/Bahrain">UTC/GMT +03:00 -
                                                                    Asia/Bahrain</option>
                                                                <option value="Asia/Baku">UTC/GMT +04:00 - Asia/Baku
                                                                </option>
                                                                <option value="Asia/Bangkok">UTC/GMT +07:00 -
                                                                    Asia/Bangkok</option>
                                                                <option value="Asia/Barnaul">UTC/GMT +07:00 -
                                                                    Asia/Barnaul</option>
                                                                <option value="Asia/Beirut">UTC/GMT +02:00 - Asia/Beirut
                                                                </option>
                                                                <option value="Asia/Bishkek">UTC/GMT +06:00 -
                                                                    Asia/Bishkek</option>
                                                                <option value="Asia/Brunei">UTC/GMT +08:00 - Asia/Brunei
                                                                </option>
                                                                <option value="Asia/Chita">UTC/GMT +09:00 - Asia/Chita
                                                                </option>
                                                                <option value="Asia/Choibalsan">UTC/GMT +08:00 -
                                                                    Asia/Choibalsan</option>
                                                                <option value="Asia/Colombo">UTC/GMT +05:30 -
                                                                    Asia/Colombo</option>
                                                                <option value="Asia/Damascus">UTC/GMT +03:00 -
                                                                    Asia/Damascus</option>
                                                                <option value="Asia/Dhaka">UTC/GMT +06:00 -
                                                                    Asia/Dhaka</option>
                                                                <option value="Asia/Dili">UTC/GMT +09:00 - Asia/Dili
                                                                </option>
                                                                <option value="Asia/Dubai">UTC/GMT +04:00 - Asia/Dubai
                                                                </option>
                                                                <option value="Asia/Dushanbe">UTC/GMT +05:00 -
                                                                    Asia/Dushanbe</option>
                                                                <option value="Asia/Famagusta">UTC/GMT +02:00 -
                                                                    Asia/Famagusta</option>
                                                                <option value="Asia/Gaza">UTC/GMT +02:00 - Asia/Gaza
                                                                </option>
                                                                <option value="Asia/Hebron">UTC/GMT +02:00 - Asia/Hebron
                                                                </option>
                                                                <option value="Asia/Ho_Chi_Minh">UTC/GMT +07:00 -
                                                                    Asia/Ho_Chi_Minh</option>
                                                                <option value="Asia/Hong_Kong">UTC/GMT +08:00 -
                                                                    Asia/Hong_Kong</option>
                                                                <option value="Asia/Hovd">UTC/GMT +07:00 - Asia/Hovd
                                                                </option>
                                                                <option value="Asia/Irkutsk">UTC/GMT +08:00 -
                                                                    Asia/Irkutsk</option>
                                                                <option value="Asia/Jakarta">UTC/GMT +07:00 -
                                                                    Asia/Jakarta</option>
                                                                <option value="Asia/Jayapura">UTC/GMT +09:00 -
                                                                    Asia/Jayapura</option>
                                                                <option value="Asia/Jerusalem">UTC/GMT +02:00 -
                                                                    Asia/Jerusalem</option>
                                                                <option value="Asia/Kabul">UTC/GMT +04:30 - Asia/Kabul
                                                                </option>
                                                                <option value="Asia/Kamchatka">UTC/GMT +12:00 -
                                                                    Asia/Kamchatka</option>
                                                                <option value="Asia/Karachi">UTC/GMT +05:00 -
                                                                    Asia/Karachi</option>
                                                                <option value="Asia/Kathmandu">UTC/GMT +05:45 -
                                                                    Asia/Kathmandu</option>
                                                                <option value="Asia/Khandyga">UTC/GMT +09:00 -
                                                                    Asia/Khandyga</option>
                                                                <option value="Asia/Kolkata">UTC/GMT +05:30 -
                                                                    Asia/Kolkata</option>
                                                                <option value="Asia/Krasnoyarsk">UTC/GMT +07:00 -
                                                                    Asia/Krasnoyarsk</option>
                                                                <option value="Asia/Kuala_Lumpur">UTC/GMT +08:00 -
                                                                    Asia/Kuala_Lumpur</option>
                                                                <option value="Asia/Kuching">UTC/GMT +08:00 -
                                                                    Asia/Kuching</option>
                                                                <option value="Asia/Kuwait">UTC/GMT +03:00 - Asia/Kuwait
                                                                </option>
                                                                <option value="Asia/Macau">UTC/GMT +08:00 - Asia/Macau
                                                                </option>
                                                                <option value="Asia/Magadan">UTC/GMT +11:00 -
                                                                    Asia/Magadan</option>
                                                                <option value="Asia/Makassar">UTC/GMT +08:00 -
                                                                    Asia/Makassar</option>
                                                                <option value="Asia/Manila">UTC/GMT +08:00 - Asia/Manila
                                                                </option>
                                                                <option value="Asia/Muscat">UTC/GMT +04:00 - Asia/Muscat
                                                                </option>
                                                                <option value="Asia/Nicosia">UTC/GMT +02:00 -
                                                                    Asia/Nicosia</option>
                                                                <option value="Asia/Novokuznetsk">UTC/GMT +07:00 -
                                                                    Asia/Novokuznetsk</option>
                                                                <option value="Asia/Novosibirsk">UTC/GMT +07:00 -
                                                                    Asia/Novosibirsk</option>
                                                                <option value="Asia/Omsk">UTC/GMT +06:00 - Asia/Omsk
                                                                </option>
                                                                <option value="Asia/Oral">UTC/GMT +05:00 - Asia/Oral
                                                                </option>
                                                                <option value="Asia/Phnom_Penh">UTC/GMT +07:00 -
                                                                    Asia/Phnom_Penh</option>
                                                                <option value="Asia/Pontianak">UTC/GMT +07:00 -
                                                                    Asia/Pontianak</option>
                                                                <option value="Asia/Pyongyang">UTC/GMT +09:00 -
                                                                    Asia/Pyongyang</option>
                                                                <option value="Asia/Qatar">UTC/GMT +03:00 - Asia/Qatar
                                                                </option>
                                                                <option value="Asia/Qostanay">UTC/GMT +06:00 -
                                                                    Asia/Qostanay</option>
                                                                <option value="Asia/Qyzylorda">UTC/GMT +05:00 -
                                                                    Asia/Qyzylorda</option>
                                                                <option value="Asia/Riyadh">UTC/GMT +03:00 - Asia/Riyadh
                                                                </option>
                                                                <option value="Asia/Sakhalin">UTC/GMT +11:00 -
                                                                    Asia/Sakhalin</option>
                                                                <option value="Asia/Samarkand">UTC/GMT +05:00 -
                                                                    Asia/Samarkand</option>
                                                                <option value="Asia/Seoul">UTC/GMT +09:00 - Asia/Seoul
                                                                </option>
                                                                <option value="Asia/Shanghai">UTC/GMT +08:00 -
                                                                    Asia/Shanghai</option>
                                                                <option value="Asia/Singapore">UTC/GMT +08:00 -
                                                                    Asia/Singapore</option>
                                                                <option value="Asia/Srednekolymsk">UTC/GMT +11:00 -
                                                                    Asia/Srednekolymsk</option>
                                                                <option value="Asia/Taipei">UTC/GMT +08:00 - Asia/Taipei
                                                                </option>
                                                                <option value="Asia/Tashkent">UTC/GMT +05:00 -
                                                                    Asia/Tashkent</option>
                                                                <option value="Asia/Tbilisi">UTC/GMT +04:00 -
                                                                    Asia/Tbilisi</option>
                                                                <option value="Asia/Tehran">UTC/GMT +03:30 - Asia/Tehran
                                                                </option>
                                                                <option value="Asia/Thimphu">UTC/GMT +06:00 -
                                                                    Asia/Thimphu</option>
                                                                <option value="Asia/Tokyo">UTC/GMT +09:00 - Asia/Tokyo
                                                                </option>
                                                                <option value="Asia/Tomsk">UTC/GMT +07:00 - Asia/Tomsk
                                                                </option>
                                                                <option value="Asia/Ulaanbaatar">UTC/GMT +08:00 -
                                                                    Asia/Ulaanbaatar</option>
                                                                <option value="Asia/Urumqi">UTC/GMT +06:00 - Asia/Urumqi
                                                                </option>
                                                                <option value="Asia/Ust-Nera">UTC/GMT +10:00 -
                                                                    Asia/Ust-Nera</option>
                                                                <option value="Asia/Vientiane">UTC/GMT +07:00 -
                                                                    Asia/Vientiane</option>
                                                                <option value="Asia/Vladivostok">UTC/GMT +10:00 -
                                                                    Asia/Vladivostok</option>
                                                                <option value="Asia/Yakutsk">UTC/GMT +09:00 -
                                                                    Asia/Yakutsk</option>
                                                                <option value="Asia/Yangon">UTC/GMT +06:30 - Asia/Yangon
                                                                </option>
                                                                <option value="Asia/Yekaterinburg">UTC/GMT +05:00 -
                                                                    Asia/Yekaterinburg</option>
                                                                <option value="Asia/Yerevan">UTC/GMT +04:00 -
                                                                    Asia/Yerevan</option>
                                                                <option value="Atlantic/Azores">UTC/GMT -01:00 -
                                                                    Atlantic/Azores</option>
                                                                <option value="Atlantic/Bermuda">UTC/GMT -04:00 -
                                                                    Atlantic/Bermuda</option>
                                                                <option value="Atlantic/Canary">UTC/GMT +00:00 -
                                                                    Atlantic/Canary</option>
                                                                <option value="Atlantic/Cape_Verde">UTC/GMT -01:00 -
                                                                    Atlantic/Cape_Verde</option>
                                                                <option value="Atlantic/Faroe">UTC/GMT +00:00 -
                                                                    Atlantic/Faroe</option>
                                                                <option value="Atlantic/Madeira">UTC/GMT +00:00 -
                                                                    Atlantic/Madeira</option>
                                                                <option value="Atlantic/Reykjavik">UTC/GMT +00:00 -
                                                                    Atlantic/Reykjavik</option>
                                                                <option value="Atlantic/South_Georgia">UTC/GMT -02:00 -
                                                                    Atlantic/South_Georgia</option>
                                                                <option value="Atlantic/St_Helena">UTC/GMT +00:00 -
                                                                    Atlantic/St_Helena</option>
                                                                <option value="Atlantic/Stanley">UTC/GMT -03:00 -
                                                                    Atlantic/Stanley</option>
                                                                <option value="Australia/Adelaide">UTC/GMT +10:30 -
                                                                    Australia/Adelaide</option>
                                                                <option value="Australia/Brisbane">UTC/GMT +10:00 -
                                                                    Australia/Brisbane</option>
                                                                <option value="Australia/Broken_Hill">UTC/GMT +10:30 -
                                                                    Australia/Broken_Hill</option>
                                                                <option value="Australia/Darwin">UTC/GMT +09:30 -
                                                                    Australia/Darwin</option>
                                                                <option value="Australia/Eucla">UTC/GMT +08:45 -
                                                                    Australia/Eucla</option>
                                                                <option value="Australia/Hobart">UTC/GMT +11:00 -
                                                                    Australia/Hobart</option>
                                                                <option value="Australia/Lindeman">UTC/GMT +10:00 -
                                                                    Australia/Lindeman</option>
                                                                <option value="Australia/Lord_Howe">UTC/GMT +11:00 -
                                                                    Australia/Lord_Howe</option>
                                                                <option value="Australia/Melbourne">UTC/GMT +11:00 -
                                                                    Australia/Melbourne</option>
                                                                <option value="Australia/Perth">UTC/GMT +08:00 -
                                                                    Australia/Perth</option>
                                                                <option value="Australia/Sydney">UTC/GMT +11:00 -
                                                                    Australia/Sydney</option>
                                                                <option value="Europe/Amsterdam">UTC/GMT +01:00 -
                                                                    Europe/Amsterdam</option>
                                                                <option value="Europe/Andorra">UTC/GMT +01:00 -
                                                                    Europe/Andorra</option>
                                                                <option value="Europe/Astrakhan">UTC/GMT +04:00 -
                                                                    Europe/Astrakhan</option>
                                                                <option value="Europe/Athens">UTC/GMT +02:00 -
                                                                    Europe/Athens</option>
                                                                <option value="Europe/Belgrade">UTC/GMT +01:00 -
                                                                    Europe/Belgrade</option>
                                                                <option value="Europe/Berlin">UTC/GMT +01:00 -
                                                                    Europe/Berlin</option>
                                                                <option value="Europe/Bratislava">UTC/GMT +01:00 -
                                                                    Europe/Bratislava</option>
                                                                <option value="Europe/Brussels">UTC/GMT +01:00 -
                                                                    Europe/Brussels</option>
                                                                <option value="Europe/Bucharest">UTC/GMT +02:00 -
                                                                    Europe/Bucharest</option>
                                                                <option value="Europe/Budapest">UTC/GMT +01:00 -
                                                                    Europe/Budapest</option>
                                                                <option value="Europe/Busingen">UTC/GMT +01:00 -
                                                                    Europe/Busingen</option>
                                                                <option value="Europe/Chisinau">UTC/GMT +02:00 -
                                                                    Europe/Chisinau</option>
                                                                <option value="Europe/Copenhagen">UTC/GMT +01:00 -
                                                                    Europe/Copenhagen</option>
                                                                <option value="Europe/Dublin">UTC/GMT +00:00 -
                                                                    Europe/Dublin</option>
                                                                <option value="Europe/Gibraltar">UTC/GMT +01:00 -
                                                                    Europe/Gibraltar</option>
                                                                <option value="Europe/Guernsey">UTC/GMT +00:00 -
                                                                    Europe/Guernsey</option>
                                                                <option value="Europe/Helsinki">UTC/GMT +02:00 -
                                                                    Europe/Helsinki</option>
                                                                <option value="Europe/Isle_of_Man">UTC/GMT +00:00 -
                                                                    Europe/Isle_of_Man</option>
                                                                <option value="Europe/Istanbul">UTC/GMT +03:00 -
                                                                    Europe/Istanbul</option>
                                                                <option value="Europe/Jersey">UTC/GMT +00:00 -
                                                                    Europe/Jersey</option>
                                                                <option value="Europe/Kaliningrad">UTC/GMT +02:00 -
                                                                    Europe/Kaliningrad</option>
                                                                <option value="Europe/Kirov">UTC/GMT +03:00 -
                                                                    Europe/Kirov</option>
                                                                <option value="Europe/Kyiv">UTC/GMT +02:00 - Europe/Kyiv
                                                                </option>
                                                                <option value="Europe/Lisbon">UTC/GMT +00:00 -
                                                                    Europe/Lisbon</option>
                                                                <option value="Europe/Ljubljana">UTC/GMT +01:00 -
                                                                    Europe/Ljubljana</option>
                                                                <option value="Europe/London">UTC/GMT +00:00 -
                                                                    Europe/London</option>
                                                                <option value="Europe/Luxembourg">UTC/GMT +01:00 -
                                                                    Europe/Luxembourg</option>
                                                                <option value="Europe/Madrid">UTC/GMT +01:00 -
                                                                    Europe/Madrid</option>
                                                                <option value="Europe/Malta">UTC/GMT +01:00 -
                                                                    Europe/Malta</option>
                                                                <option value="Europe/Mariehamn">UTC/GMT +02:00 -
                                                                    Europe/Mariehamn</option>
                                                                <option value="Europe/Minsk">UTC/GMT +03:00 -
                                                                    Europe/Minsk</option>
                                                                <option value="Europe/Monaco">UTC/GMT +01:00 -
                                                                    Europe/Monaco</option>
                                                                <option value="Europe/Moscow">UTC/GMT +03:00 -
                                                                    Europe/Moscow</option>
                                                                <option value="Europe/Oslo">UTC/GMT +01:00 - Europe/Oslo
                                                                </option>
                                                                <option value="Europe/Paris">UTC/GMT +01:00 -
                                                                    Europe/Paris</option>
                                                                <option value="Europe/Podgorica">UTC/GMT +01:00 -
                                                                    Europe/Podgorica</option>
                                                                <option value="Europe/Prague">UTC/GMT +01:00 -
                                                                    Europe/Prague</option>
                                                                <option value="Europe/Riga">UTC/GMT +02:00 - Europe/Riga
                                                                </option>
                                                                <option value="Europe/Rome">UTC/GMT +01:00 - Europe/Rome
                                                                </option>
                                                                <option value="Europe/Samara">UTC/GMT +04:00 -
                                                                    Europe/Samara</option>
                                                                <option value="Europe/San_Marino">UTC/GMT +01:00 -
                                                                    Europe/San_Marino</option>
                                                                <option value="Europe/Sarajevo">UTC/GMT +01:00 -
                                                                    Europe/Sarajevo</option>
                                                                <option value="Europe/Saratov">UTC/GMT +04:00 -
                                                                    Europe/Saratov</option>
                                                                <option value="Europe/Simferopol">UTC/GMT +03:00 -
                                                                    Europe/Simferopol</option>
                                                                <option value="Europe/Skopje">UTC/GMT +01:00 -
                                                                    Europe/Skopje</option>
                                                                <option value="Europe/Sofia">UTC/GMT +02:00 -
                                                                    Europe/Sofia</option>
                                                                <option value="Europe/Stockholm">UTC/GMT +01:00 -
                                                                    Europe/Stockholm</option>
                                                                <option value="Europe/Tallinn">UTC/GMT +02:00 -
                                                                    Europe/Tallinn</option>
                                                                <option value="Europe/Tirane">UTC/GMT +01:00 -
                                                                    Europe/Tirane</option>
                                                                <option value="Europe/Ulyanovsk">UTC/GMT +04:00 -
                                                                    Europe/Ulyanovsk</option>
                                                                <option value="Europe/Vaduz">UTC/GMT +01:00 -
                                                                    Europe/Vaduz</option>
                                                                <option value="Europe/Vatican">UTC/GMT +01:00 -
                                                                    Europe/Vatican</option>
                                                                <option value="Europe/Vienna">UTC/GMT +01:00 -
                                                                    Europe/Vienna</option>
                                                                <option value="Europe/Vilnius">UTC/GMT +02:00 -
                                                                    Europe/Vilnius</option>
                                                                <option value="Europe/Volgograd">UTC/GMT +03:00 -
                                                                    Europe/Volgograd</option>
                                                                <option value="Europe/Warsaw">UTC/GMT +01:00 -
                                                                    Europe/Warsaw</option>
                                                                <option value="Europe/Zagreb">UTC/GMT +01:00 -
                                                                    Europe/Zagreb</option>
                                                                <option value="Europe/Zurich">UTC/GMT +01:00 -
                                                                    Europe/Zurich</option>
                                                                <option value="Indian/Antananarivo">UTC/GMT +03:00 -
                                                                    Indian/Antananarivo</option>
                                                                <option value="Indian/Chagos">UTC/GMT +06:00 -
                                                                    Indian/Chagos</option>
                                                                <option value="Indian/Christmas">UTC/GMT +07:00 -
                                                                    Indian/Christmas</option>
                                                                <option value="Indian/Cocos">UTC/GMT +06:30 -
                                                                    Indian/Cocos</option>
                                                                <option value="Indian/Comoro">UTC/GMT +03:00 -
                                                                    Indian/Comoro</option>
                                                                <option value="Indian/Kerguelen">UTC/GMT +05:00 -
                                                                    Indian/Kerguelen</option>
                                                                <option value="Indian/Mahe">UTC/GMT +04:00 - Indian/Mahe
                                                                </option>
                                                                <option value="Indian/Maldives">UTC/GMT +05:00 -
                                                                    Indian/Maldives</option>
                                                                <option value="Indian/Mauritius">UTC/GMT +04:00 -
                                                                    Indian/Mauritius</option>
                                                                <option value="Indian/Mayotte">UTC/GMT +03:00 -
                                                                    Indian/Mayotte</option>
                                                                <option value="Indian/Reunion">UTC/GMT +04:00 -
                                                                    Indian/Reunion</option>
                                                                <option value="Pacific/Apia">UTC/GMT +13:00 -
                                                                    Pacific/Apia</option>
                                                                <option value="Pacific/Auckland">UTC/GMT +13:00 -
                                                                    Pacific/Auckland</option>
                                                                <option value="Pacific/Bougainville">UTC/GMT +11:00 -
                                                                    Pacific/Bougainville</option>
                                                                <option value="Pacific/Chatham">UTC/GMT +13:45 -
                                                                    Pacific/Chatham</option>
                                                                <option value="Pacific/Chuuk">UTC/GMT +10:00 -
                                                                    Pacific/Chuuk</option>
                                                                <option value="Pacific/Easter">UTC/GMT -05:00 -
                                                                    Pacific/Easter</option>
                                                                <option value="Pacific/Efate">UTC/GMT +11:00 -
                                                                    Pacific/Efate</option>
                                                                <option value="Pacific/Fakaofo">UTC/GMT +13:00 -
                                                                    Pacific/Fakaofo</option>
                                                                <option value="Pacific/Fiji">UTC/GMT +12:00 -
                                                                    Pacific/Fiji</option>
                                                                <option value="Pacific/Funafuti">UTC/GMT +12:00 -
                                                                    Pacific/Funafuti</option>
                                                                <option value="Pacific/Galapagos">UTC/GMT -06:00 -
                                                                    Pacific/Galapagos</option>
                                                                <option value="Pacific/Gambier">UTC/GMT -09:00 -
                                                                    Pacific/Gambier</option>
                                                                <option value="Pacific/Guadalcanal">UTC/GMT +11:00 -
                                                                    Pacific/Guadalcanal</option>
                                                                <option value="Pacific/Guam">UTC/GMT +10:00 -
                                                                    Pacific/Guam</option>
                                                                <option value="Pacific/Honolulu">UTC/GMT -10:00 -
                                                                    Pacific/Honolulu</option>
                                                                <option value="Pacific/Kanton">UTC/GMT +13:00 -
                                                                    Pacific/Kanton</option>
                                                                <option value="Pacific/Kiritimati">UTC/GMT +14:00 -
                                                                    Pacific/Kiritimati</option>
                                                                <option value="Pacific/Kosrae">UTC/GMT +11:00 -
                                                                    Pacific/Kosrae</option>
                                                                <option value="Pacific/Kwajalein">UTC/GMT +12:00 -
                                                                    Pacific/Kwajalein</option>
                                                                <option value="Pacific/Majuro">UTC/GMT +12:00 -
                                                                    Pacific/Majuro</option>
                                                                <option value="Pacific/Marquesas">UTC/GMT -09:30 -
                                                                    Pacific/Marquesas</option>
                                                                <option value="Pacific/Midway">UTC/GMT -11:00 -
                                                                    Pacific/Midway</option>
                                                                <option value="Pacific/Nauru">UTC/GMT +12:00 -
                                                                    Pacific/Nauru</option>
                                                                <option value="Pacific/Niue">UTC/GMT -11:00 -
                                                                    Pacific/Niue</option>
                                                                <option value="Pacific/Norfolk">UTC/GMT +12:00 -
                                                                    Pacific/Norfolk</option>
                                                                <option value="Pacific/Noumea">UTC/GMT +11:00 -
                                                                    Pacific/Noumea</option>
                                                                <option value="Pacific/Pago_Pago">UTC/GMT -11:00 -
                                                                    Pacific/Pago_Pago</option>
                                                                <option value="Pacific/Palau">UTC/GMT +09:00 -
                                                                    Pacific/Palau</option>
                                                                <option value="Pacific/Pitcairn">UTC/GMT -08:00 -
                                                                    Pacific/Pitcairn</option>
                                                                <option value="Pacific/Pohnpei">UTC/GMT +11:00 -
                                                                    Pacific/Pohnpei</option>
                                                                <option value="Pacific/Port_Moresby">UTC/GMT +10:00 -
                                                                    Pacific/Port_Moresby</option>
                                                                <option value="Pacific/Rarotonga">UTC/GMT -10:00 -
                                                                    Pacific/Rarotonga</option>
                                                                <option value="Pacific/Saipan">UTC/GMT +10:00 -
                                                                    Pacific/Saipan</option>
                                                                <option value="Pacific/Tahiti">UTC/GMT -10:00 -
                                                                    Pacific/Tahiti</option>
                                                                <option value="Pacific/Tarawa">UTC/GMT +12:00 -
                                                                    Pacific/Tarawa</option>
                                                                <option value="Pacific/Tongatapu">UTC/GMT +13:00 -
                                                                    Pacific/Tongatapu</option>
                                                                <option value="Pacific/Wake">UTC/GMT +12:00 -
                                                                    Pacific/Wake</option>
                                                                <option value="Pacific/Wallis">UTC/GMT +12:00 -
                                                                    Pacific/Wallis</option>
                                                                <option value="UTC">UTC/GMT +00:00 - UTC</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-md-12 pd-bottom pb-2">
                                                        <button type="button" class="btn bg-primary add-option-btn w-100 setting-btn f-16 leading-20 gilroy-medium" id="updateProfileBtn">
                                                            <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
                                                                <span class="visually-hidden"></span>
                                                            </div>
                                                            <span id="">Save Changes</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Personal Information View Div  -->
                        <div class="profile-info-body d-flex profile-wraps justify-content-between mt-36">
                            <div class="left-profile-info w-50">
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">Name</p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end"><?= $fullname ?></p>
                                </div>
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">Phone</p>
                                    <p class="mb-0 f-15 leading-18 text-gray gilroy-medium text-align-end"><?= $phone ?></p>
                                </div>
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">Address 1
                                    </p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end"><?= $address1 ?></p>
                                </div>
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">Address 2
                                    </p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end"><?= $address2 ?></p>
                                </div>

                            </div>
                            <div class="ml-76 left-profile-info w-50">
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom responsive-mtop">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">City</p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end"><?= $city ?></p>
                                </div>
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">State</p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end"><?= $state ?></p>
                                </div>
                                <div class="d-flex gap-3 justify-content-between profile-borders-bottom">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">Country
                                    </p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end">
                                        <?= $country ?></p>
                                </div>
                                <div class="d-flex gap-3 justify-content-between profile-bottom b-unset">
                                    <p class="mb-0 f-15 leading-18 text-dark gilroy-medium text-align-initial">Time Zone
                                    </p>
                                    <p class="mb-0 f-15 leading-18 text-gray-100 gilroy-medium text-align-end">
                                        <?= $timezone ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main-containt -->

                </div>
            </div>
        </div>

        <!-- footer -->
        <footer class="d-flex align-items-center justify-content-between bg-white w-100 px-4 footer-sec">
            <div class="res-order d-flex align-items-center">
                <p class="mb-0 gilroy-medium">Copyright &copy; 2024&nbsp;<a href="https://demo.paymoney.techvill.net" class="link-text">Pay Money</a>&nbsp;|&nbsp;All Rights Reserved.</p>
                <span class="d-none">4.1.1</span>
            </div>
            <div class="d-flex f-link align-items-center">
                <div>
                    <div class="d-flex align-items-center text-gray-100 f-13 blink-w sp" id="select_language">
                        <div class="form-group selectParent f-13">
                            <select class="select2 form-control f-13 mb-2n" data-minimum-results-for-search="Infinity" id="select-height">
                                <option class="f-13 gilroy-medium" selected value='en'>English</option>
                                <option class="f-13 gilroy-medium" value='ar'>عربى</option>
                                <option class="f-13 gilroy-medium" value='fr'>Français</option>
                                <option class="f-13 gilroy-medium" value='pt'>Português</option>
                                <option class="f-13 gilroy-medium" value='ru'>Русский</option>
                                <option class="f-13 gilroy-medium" value='es'>Español</option>
                                <option class="f-13 gilroy-medium" value='tr'>Türkçe</option>
                                <option class="f-13 gilroy-medium" value='ch'>中文 (繁體)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </footer> <!-- end footer -->

    </div>

    <!-- js -->
    <script src="../public/dist/libraries/jquery-3.6.1/jquery-3.6.1.min.js"></script>
    <script src="../public/dist/libraries/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="../public/dist/plugins/select2-4.1.0-rc.0/js/select2.min.js"></script>
    <script src="../public/user/templates/js/chart.umd.min.js"></script>
    <script src="../public/user/templates/js/main.min.js"></script>
    <script src="../public/user/customs/js/common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        $(document).ready(function() {
            const updateBtn = $('#updateProfileBtn')
            updateBtn.on('click', () => {
                updateBtn.html("Saving...")
                const fname = $('#first_name').val()
                const lname = $('#last_name').val()
                const phone = $('#phone').val()
                const state = $('#state').val()
                const city = $('#city').val()
                const country = $('#country').val()
                const timezone = $('#timezone').val()
                const address1 = $('#address_1').val()
                const address2 = $('#address_2').val()

                if (!fname) {
                    toastr.error("Firstname is empty", "Required", {
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
                    updateBtn.html('Save Changes')
                } else if (!lname) {
                    toastr.error("Lastname is empty", "Required", {
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
                    updateBtn.html('Save Changes')
                } else {
                    $.ajax({
                        url: '../backend/actions/updateProfile.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            fname: fname,
                            lname: lname,
                            phone: phone,
                            address1: address1,
                            address2: address2,
                            state: state,
                            country: country,
                            city: city,
                            timezone: timezone
                        },
                        success: (res) => {
                            if (res.header == 'updated') {
                                toastr.success("Your personal profile was successfully updated", "Updated", {
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
                                updateBtn.html('Save Changes')
                                window.setTimeout(() => {
                                    window.location.reload();
                                }, 1000)
                            } else {
                                toastr.error("An error occurred", "Error", {
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
                                updateBtn.html('Save Changes')
                            }
                        }
                    })
                }
            })

            const updatePasswordBtn = $('#updatePasswordBtn')
            updatePasswordBtn.on('click', () => {
                updatePasswordBtn.html('Updating...')

                const oldPass = $('#old_password').val()
                const newPass = $('#password').val()
                const cPass = $('#password_confirmation').val()

                if (!oldPass) {
                    toastr.error("Input old password", "Required", {
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
                    updatePasswordBtn.html('Save changes')
                } else if (!newPass) {
                    toastr.error("New password cannot be empty", "Required", {
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
                    updatePasswordBtn.html('Save changes')
                } else if (!cPass) {
                    toastr.error("Confirm your new password", "Required", {
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
                    updatePasswordBtn.html('Save changes')
                } else if (newPass !== cPass) {
                    toastr.error("Passwords do not match", "Error", {
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
                    updatePasswordBtn.html('Save changes')
                } else {
                    $.ajax({
                        url: '../backend/actions/updatePassword.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            oldPass: oldPass,
                            newPass: newPass
                        },
                        success: (res) => {
                            if (res.header == 'updated') {
                                toastr.success("Login to restart your session", "Successful", {
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
                                    window.location = '../logout'
                                }, 1500)
                                updatePasswordBtn.html('Save changes')
                            } else if (res.header == 'failed') {
                                toastr.error("Old password is not correct", "Error", {
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
                                updatePasswordBtn.html('Save changes')
                            }
                        }
                    })
                }
            })



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

    <script src="../public/dist/plugins/html5-validation-1.0.0/validation.min.js" type="text/javascript"></script>
    <script src="../public/dist/plugins/intl-tel-input-17.0.19/js/intlTelInput-jquery.min.js" type="text/javascript"></script>
    <script src="../public/dist/js/isValidPhoneNumber.min.js" type="text/javascript"></script>
    <script src="../public/dist/libraries/sweetalert/sweetalert-unpkg.min.js" type="text/javascript"></script>
    <script src="../public/user/customs/js/phone.min.js" type="text/javascript"></script>
    <script src="../public/user/customs/js/profile.min.js" type="text/javascript"></script>
    <!-- end js -->

</body>

</html>