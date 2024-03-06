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

    <title>Dashboard | Yield Fiancial Services</title>

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
        var SITE_URL = "https://www.yieldfincs.com";
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
    <?php $page = "dashboard"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="d-flex justify-content-between dash-left-profile dash-profile-flex-wrap">
                        <div class="dash-left-profile d-flex gap-14">
                            <div class="dash-left-img">
                                <img src="<?= $profile_pic ? "../backend/actions/uploads/" . $profile_pic : '../public/uploads/user-profile/1532005837.jpg' ?>" alt="Profile" class="img-fluid">
                            </div>
                            <div class="qr-icon">
                                <p class="mb-0 f-32 gilroy-Semibold text-dark"><span><?= $fullname ?></span>
                                    <a href="../profile" class="px-1">
                                        <svg class="cursor-pointer" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8448 2.09484C12.759 1.18063 14.2412 1.18063 15.1554 2.09484C16.0696 3.00905 16.0696 4.49129 15.1554 5.4055L5.73337 14.8276C5.71852 14.8424 5.70381 14.8571 5.68921 14.8718C5.47363 15.0878 5.28355 15.2782 5.0544 15.4186C4.85309 15.542 4.63361 15.6329 4.40403 15.688C4.1427 15.7507 3.87364 15.7505 3.56847 15.7502C3.54781 15.7502 3.52698 15.7502 3.50598 15.7502H2.25008C1.83586 15.7502 1.50008 15.4144 1.50008 15.0002V13.7443C1.50008 13.7233 1.50006 13.7025 1.50004 13.6818C1.49975 13.3766 1.4995 13.1076 1.56224 12.8462C1.61736 12.6167 1.70827 12.3972 1.83164 12.1959C1.97206 11.9667 2.16249 11.7766 2.37848 11.5611C2.3931 11.5465 2.40784 11.5317 2.42269 11.5169L11.8448 2.09484ZM14.0948 3.1555C13.7663 2.82707 13.2339 2.82707 12.9054 3.1555L3.48335 12.5776C3.19868 12.8622 3.14619 12.9215 3.1106 12.9796C3.06948 13.0467 3.03917 13.1199 3.0208 13.1964C3.0049 13.2626 3.00008 13.3417 3.00008 13.7443V14.2502H3.50598C3.90857 14.2502 3.98762 14.2453 4.05386 14.2294C4.13039 14.2111 4.20354 14.1808 4.27065 14.1396C4.32873 14.1041 4.38804 14.0516 4.67271 13.7669L14.0948 4.34484C14.4232 4.01641 14.4232 3.48393 14.0948 3.1555ZM8.25006 15.0002C8.25006 14.586 8.58584 14.2502 9.00006 14.2502H15.7501C16.1643 14.2502 16.5001 14.586 16.5001 15.0002C16.5001 15.4144 16.1643 15.7502 15.7501 15.7502H9.00006C8.58584 15.7502 8.25006 15.4144 8.25006 15.0002Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </p>
                                <!-- <p class="mb-0 f-16 leading-18 gilroy-medium text-gray-100 mt-1 dash-w-262">Welcome,
                                    here is a brief summary of your account.</p> -->
                                <img src="../../public/icons/user.png" alt="" class="" width="17px" height="auto">&nbsp;
                                <span class="mb-0 f-16 leading-18 gilroy-medium text-gray-100 mt-1 dash-w-262">Level <?= $level ?> Portfolio</span>
                            </div>
                        </div>

                        <div class="dash-right-profile d-flex align-items-end">
                            <a href="../deposit" class="btn btn-lg btn-primary w-160">
                                <span class="mb-0 f-14 leading-20 gilroy-medium">Deposit Money</span>
                                <svg class="ml-10" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.75 12C13.1642 12 13.5 12.3358 13.5 12.75C13.5 13.1642 13.1642 13.5 12.75 13.5L5.25 13.5C4.83579 13.5 4.5 13.1642 4.5 12.75L4.5 5.25C4.5 4.83579 4.83579 4.5 5.25 4.5C5.66421 4.5 6 4.83579 6 5.25L6 10.9393L12.2197 4.71967C12.5126 4.42678 12.9874 4.42678 13.2803 4.71967C13.5732 5.01256 13.5732 5.48744 13.2803 5.78033L7.06066 12L12.75 12Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a href="../withdraw" class="btn btn-lg btn-light cursor-pointer ml-12 w-160 yellow-btn">
                                <span class="mb-0 f-14 leading-20 gilroy-medium text-dark">Withdraw Money</span>
                                <svg class="ml-10 nscaleX-1" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 6C4.83579 6 4.5 5.66421 4.5 5.25C4.5 4.83579 4.83579 4.5 5.25 4.5L12.75 4.5C13.1642 4.5 13.5 4.83579 13.5 5.25L13.5 12.75C13.5 13.1642 13.1642 13.5 12.75 13.5C12.3358 13.5 12 13.1642 12 12.75V7.06066L5.78033 13.2803C5.48744 13.5732 5.01256 13.5732 4.71967 13.2803C4.42678 12.9874 4.42678 12.5126 4.71967 12.2197L10.9393 6L5.25 6Z" fill="#3F405B" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex dasboard-wallet-card gap-20 flex-wrap mt-40">
                        <?php foreach ($data['user_walletsL'] as $w) { ?>
                            <div class="dash-wallet-box bg-white">
                                <div class="d-flex justify-content-between">
                                    <div class="dash-box-one">
                                        <p class="mb-0 gilroy-Semibold text-primary f-16 leading-20"><?= $w['wallet_name'] ?></p>
                                        <p class="mb-0 f-12 leading-15 text-gray-100 gilroy-regular mt-1"><?= $w['wallet_type'] ?></p>
                                    </div>
                                    <div class="dash-currency-sign d-flex justify-content-center align-items-center">
                                        <img src="../public/uploads/currency_logos/<?= $w['wallet_img'] ?>" alt="Currency" class="img-fluid">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-15">
                                    <?php
                                    $data['total_deposits'] = $modules->getTotalDeposits($uID, $w['wallet_name']);
                                    $data['total_withdrawals'] = $modules->getTotalWithdrawals($uID, $w['wallet_name']);
                                    foreach ($data['total_deposits'] as $td) {
                                        foreach ($data['total_withdrawals'] as $tw) {
                                    ?>
                                            <p class="mb-0 f-24 leading-30 gilroy-Semibold l-s1 text-dark"><?= $td['amount'] ? round($td['amount'], 2) - round($tw['amount'], 2) . ' ' . $w['wallet_name'] : 0 ?></p>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <p class="mb-0 text-success f-12 leading-15 l-s1 gilroy-medium d-flex align-items-center">
                                        <span></span>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($numOfWallets > 0) { ?>
                            <div class="dash-wallet-box bg-white d-flex gap-14 align-items-center h-112 cursor-pointer">
                                <div class="dash-check-all bg-white-50 d-flex justify-content-center align-items-center">
                                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.58887 0.562501L15.5361 0.562501C16.0303 0.562485 16.4567 0.562471 16.8078 0.591163C17.1785 0.621445 17.5471 0.688303 17.9019 0.869048C18.4311 1.13869 18.8613 1.56895 19.131 2.09816C19.3117 2.45289 19.3786 2.82153 19.4088 3.19216C19.4375 3.54332 19.4375 3.96965 19.4375 4.46385V5.8795C20.3635 6.20662 21.0631 7.00018 21.2585 7.98256C21.3131 8.25711 21.3128 8.56446 21.3125 8.92137C21.3125 8.94732 21.3125 8.97353 21.3125 9C21.3125 9.02649 21.3125 9.0527 21.3125 9.07866C21.3128 9.43556 21.3131 9.7429 21.2585 10.0174C21.0631 10.9998 20.3635 11.7934 19.4375 12.1205V13.5362C19.4375 14.0304 19.4375 14.4567 19.4088 14.8078C19.3786 15.1785 19.3117 15.5471 19.131 15.9018C18.8613 16.4311 18.4311 16.8613 17.9019 17.131C17.5471 17.3117 17.1785 17.3786 16.8078 17.4088C16.4567 17.4375 16.0304 17.4375 15.5362 17.4375L4.58885 17.4375C4.09465 17.4375 3.66832 17.4375 3.31716 17.4088C2.94653 17.3786 2.57788 17.3117 2.22315 17.131C1.69395 16.8613 1.26369 16.4311 0.994046 15.9018C0.813301 15.5471 0.746443 15.1785 0.716161 14.8078C0.68747 14.4567 0.687484 14.0303 0.687501 13.5361V4.46387C0.687484 3.96966 0.68747 3.54332 0.716161 3.19216C0.746443 2.82153 0.813302 2.45288 0.994046 2.09815C1.26369 1.56895 1.69395 1.13869 2.22315 0.869046C2.57788 0.688302 2.94653 0.621443 3.31716 0.591161C3.66833 0.56247 4.09467 0.562484 4.58887 0.562501ZM17.5625 12.2813H16.1563C16.1298 12.2813 16.1036 12.2813 16.0776 12.2813C15.7207 12.2816 15.4134 12.2818 15.1388 12.2272C14.0231 12.0053 13.151 11.1331 12.929 10.0174C12.8744 9.74289 12.8747 9.43555 12.875 9.07864C12.875 9.05269 12.875 9.02648 12.875 9C12.875 8.97352 12.875 8.94731 12.875 8.92136C12.8747 8.56446 12.8744 8.25711 12.929 7.98256C13.151 6.86687 14.0231 5.99472 15.1388 5.77279C15.4134 5.71818 15.7207 5.71843 16.0776 5.71871C16.1036 5.71873 16.1298 5.71875 16.1563 5.71875H17.5625V4.5C17.5625 3.95948 17.5618 3.61048 17.5401 3.34485C17.5193 3.09017 17.4839 2.99574 17.4603 2.94939C17.3704 2.77299 17.227 2.62957 17.0506 2.53969C17.0043 2.51607 16.9098 2.48074 16.6552 2.45994C16.3895 2.43823 16.0405 2.4375 15.5 2.4375H4.625C4.08448 2.4375 3.73548 2.43823 3.46985 2.45993C3.21516 2.48074 3.12074 2.51606 3.07439 2.53968C2.89798 2.62956 2.75457 2.77298 2.66468 2.94939C2.64107 2.99574 2.60574 3.09016 2.58493 3.34485C2.56323 3.61048 2.5625 3.95948 2.5625 4.5V13.5C2.5625 14.0405 2.56323 14.3895 2.58493 14.6552C2.60574 14.9098 2.64107 15.0043 2.66468 15.0506C2.75456 15.227 2.89798 15.3704 3.07439 15.4603C3.12074 15.4839 3.21516 15.5193 3.46985 15.5401C3.73548 15.5618 4.08448 15.5625 4.625 15.5625L15.5 15.5625C16.0405 15.5625 16.3895 15.5618 16.6552 15.5401C16.9098 15.5193 17.0043 15.4839 17.0506 15.4603C17.227 15.3704 17.3704 15.227 17.4603 15.0506C17.4839 15.0043 17.5193 14.9098 17.5401 14.6552C17.5618 14.3895 17.5625 14.0405 17.5625 13.5V12.2813ZM16.1563 7.59375C15.6757 7.59375 15.5723 7.59829 15.5046 7.61177C15.1327 7.68574 14.842 7.97646 14.768 8.34835C14.7545 8.41609 14.75 8.51945 14.75 9C14.75 9.48055 14.7545 9.58391 14.768 9.65165C14.842 10.0235 15.1327 10.3143 15.5046 10.3882C15.5723 10.4017 15.6757 10.4063 16.1563 10.4063H18.0313C18.5118 10.4063 18.6152 10.4017 18.6829 10.3882C19.0548 10.3143 19.3455 10.0235 19.4195 9.65165C19.433 9.58392 19.4375 9.48055 19.4375 9C19.4375 8.51945 19.433 8.41609 19.4195 8.34835C19.3455 7.97646 19.0548 7.68574 18.6829 7.61177C18.6152 7.59829 18.5118 7.59375 18.0313 7.59375H16.1563Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="check-all">
                                    <p class="mb-0 f-18 leading-22 text-dark gilroy-Semibold"> All Wallet Balance</p>
                                </div>
                                <a href="../wallets" class="nscaleX-1 cursor-pointer d-flex justify-content-center align-items-center dash-arrow-div">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1852 4.85247C11.8272 5.21045 11.8272 5.79085 12.1852 6.14883L16.1203 10.084H3.66667C3.16041 10.084 2.75 10.4944 2.75 11.0007C2.75 11.5069 3.16041 11.9173 3.66667 11.9173H16.1203L12.1852 15.8525C11.8272 16.2105 11.8272 16.7909 12.1852 17.1488C12.5431 17.5068 13.1235 17.5068 13.4815 17.1488L18.9815 11.6488C19.3395 11.2909 19.3395 10.7105 18.9815 10.3525L13.4815 4.85247C13.1235 4.49449 12.5431 4.49449 12.1852 4.85247Z" fill="#3F405B" />
                                    </svg>
                                </a>
                            </div>
                        <?php } else { ?>
                            <p class="mb-0 f-18 leading-22 text-dark gilroy-Semibold" style="width: 100%;">Add new wallet to get started...</p>
                            <div class="dash-wallet-box bg-white d-flex gap-14 align-items-center h-112 cursor-pointer">
                                <div class="dash-check-all bg-white-50 d-flex justify-content-center align-items-center">
                                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.58887 0.562501L15.5361 0.562501C16.0303 0.562485 16.4567 0.562471 16.8078 0.591163C17.1785 0.621445 17.5471 0.688303 17.9019 0.869048C18.4311 1.13869 18.8613 1.56895 19.131 2.09816C19.3117 2.45289 19.3786 2.82153 19.4088 3.19216C19.4375 3.54332 19.4375 3.96965 19.4375 4.46385V5.8795C20.3635 6.20662 21.0631 7.00018 21.2585 7.98256C21.3131 8.25711 21.3128 8.56446 21.3125 8.92137C21.3125 8.94732 21.3125 8.97353 21.3125 9C21.3125 9.02649 21.3125 9.0527 21.3125 9.07866C21.3128 9.43556 21.3131 9.7429 21.2585 10.0174C21.0631 10.9998 20.3635 11.7934 19.4375 12.1205V13.5362C19.4375 14.0304 19.4375 14.4567 19.4088 14.8078C19.3786 15.1785 19.3117 15.5471 19.131 15.9018C18.8613 16.4311 18.4311 16.8613 17.9019 17.131C17.5471 17.3117 17.1785 17.3786 16.8078 17.4088C16.4567 17.4375 16.0304 17.4375 15.5362 17.4375L4.58885 17.4375C4.09465 17.4375 3.66832 17.4375 3.31716 17.4088C2.94653 17.3786 2.57788 17.3117 2.22315 17.131C1.69395 16.8613 1.26369 16.4311 0.994046 15.9018C0.813301 15.5471 0.746443 15.1785 0.716161 14.8078C0.68747 14.4567 0.687484 14.0303 0.687501 13.5361V4.46387C0.687484 3.96966 0.68747 3.54332 0.716161 3.19216C0.746443 2.82153 0.813302 2.45288 0.994046 2.09815C1.26369 1.56895 1.69395 1.13869 2.22315 0.869046C2.57788 0.688302 2.94653 0.621443 3.31716 0.591161C3.66833 0.56247 4.09467 0.562484 4.58887 0.562501ZM17.5625 12.2813H16.1563C16.1298 12.2813 16.1036 12.2813 16.0776 12.2813C15.7207 12.2816 15.4134 12.2818 15.1388 12.2272C14.0231 12.0053 13.151 11.1331 12.929 10.0174C12.8744 9.74289 12.8747 9.43555 12.875 9.07864C12.875 9.05269 12.875 9.02648 12.875 9C12.875 8.97352 12.875 8.94731 12.875 8.92136C12.8747 8.56446 12.8744 8.25711 12.929 7.98256C13.151 6.86687 14.0231 5.99472 15.1388 5.77279C15.4134 5.71818 15.7207 5.71843 16.0776 5.71871C16.1036 5.71873 16.1298 5.71875 16.1563 5.71875H17.5625V4.5C17.5625 3.95948 17.5618 3.61048 17.5401 3.34485C17.5193 3.09017 17.4839 2.99574 17.4603 2.94939C17.3704 2.77299 17.227 2.62957 17.0506 2.53969C17.0043 2.51607 16.9098 2.48074 16.6552 2.45994C16.3895 2.43823 16.0405 2.4375 15.5 2.4375H4.625C4.08448 2.4375 3.73548 2.43823 3.46985 2.45993C3.21516 2.48074 3.12074 2.51606 3.07439 2.53968C2.89798 2.62956 2.75457 2.77298 2.66468 2.94939C2.64107 2.99574 2.60574 3.09016 2.58493 3.34485C2.56323 3.61048 2.5625 3.95948 2.5625 4.5V13.5C2.5625 14.0405 2.56323 14.3895 2.58493 14.6552C2.60574 14.9098 2.64107 15.0043 2.66468 15.0506C2.75456 15.227 2.89798 15.3704 3.07439 15.4603C3.12074 15.4839 3.21516 15.5193 3.46985 15.5401C3.73548 15.5618 4.08448 15.5625 4.625 15.5625L15.5 15.5625C16.0405 15.5625 16.3895 15.5618 16.6552 15.5401C16.9098 15.5193 17.0043 15.4839 17.0506 15.4603C17.227 15.3704 17.3704 15.227 17.4603 15.0506C17.4839 15.0043 17.5193 14.9098 17.5401 14.6552C17.5618 14.3895 17.5625 14.0405 17.5625 13.5V12.2813ZM16.1563 7.59375C15.6757 7.59375 15.5723 7.59829 15.5046 7.61177C15.1327 7.68574 14.842 7.97646 14.768 8.34835C14.7545 8.41609 14.75 8.51945 14.75 9C14.75 9.48055 14.7545 9.58391 14.768 9.65165C14.842 10.0235 15.1327 10.3143 15.5046 10.3882C15.5723 10.4017 15.6757 10.4063 16.1563 10.4063H18.0313C18.5118 10.4063 18.6152 10.4017 18.6829 10.3882C19.0548 10.3143 19.3455 10.0235 19.4195 9.65165C19.433 9.58392 19.4375 9.48055 19.4375 9C19.4375 8.51945 19.433 8.41609 19.4195 8.34835C19.3455 7.97646 19.0548 7.68574 18.6829 7.61177C18.6152 7.59829 18.5118 7.59375 18.0313 7.59375H16.1563Z" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="check-all">
                                    <p class="mb-0 f-18 leading-22 text-dark gilroy-Semibold"> Add New Wallet</p>
                                </div>
                                <a href="../wallet-add" class="nscaleX-1 cursor-pointer d-flex justify-content-center align-items-center dash-arrow-div">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1852 4.85247C11.8272 5.21045 11.8272 5.79085 12.1852 6.14883L16.1203 10.084H3.66667C3.16041 10.084 2.75 10.4944 2.75 11.0007C2.75 11.5069 3.16041 11.9173 3.66667 11.9173H16.1203L12.1852 15.8525C11.8272 16.2105 11.8272 16.7909 12.1852 17.1488C12.5431 17.5068 13.1235 17.5068 13.4815 17.1488L18.9815 11.6488C19.3395 11.2909 19.3395 10.7105 18.9815 10.3525L13.4815 4.85247C13.1235 4.49449 12.5431 4.49449 12.1852 4.85247Z" fill="#3F405B" />
                                    </svg>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mt-20 gy-4">
                        <p class="mb-0 f-18 leading-22 text-dark gilroy-Semibold" style="width: 100%;">YieldFincs Account Number</p>
                        <div class="col-12 col-xl-12">
                            <div class="dash-profile-qr-div bg-white profile-mt-12">
                                <div class="d-flex justify-content-between qr-icon">
                                    <p class="mb-0 f-16 leading-18 gilroy-medium text-gray-100 mt-0 dash-w-262"><?= $account_no ?></p>
                                    <a href="../profile"><svg class="ml-12" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8448 2.09484C12.759 1.18063 14.2412 1.18063 15.1554 2.09484C16.0696 3.00905 16.0696 4.49129 15.1554 5.4055L5.73337 14.8276C5.71852 14.8424 5.70381 14.8571 5.68921 14.8718C5.47363 15.0878 5.28355 15.2782 5.0544 15.4186C4.85309 15.542 4.63361 15.6329 4.40403 15.688C4.1427 15.7507 3.87364 15.7505 3.56847 15.7502C3.54781 15.7502 3.52698 15.7502 3.50598 15.7502H2.25008C1.83586 15.7502 1.50008 15.4144 1.50008 15.0002V13.7443C1.50008 13.7233 1.50006 13.7025 1.50004 13.6818C1.49975 13.3766 1.4995 13.1076 1.56224 12.8462C1.61736 12.6167 1.70827 12.3972 1.83164 12.1959C1.97206 11.9667 2.16249 11.7766 2.37848 11.5611C2.3931 11.5465 2.40784 11.5317 2.42269 11.5169L11.8448 2.09484ZM14.0948 3.1555C13.7663 2.82707 13.2339 2.82707 12.9054 3.1555L3.48335 12.5776C3.19868 12.8622 3.14619 12.9215 3.1106 12.9796C3.06948 13.0467 3.03917 13.1199 3.0208 13.1964C3.0049 13.2626 3.00008 13.3417 3.00008 13.7443V14.2502H3.50598C3.90857 14.2502 3.98762 14.2453 4.05386 14.2294C4.13039 14.2111 4.20354 14.1808 4.27065 14.1396C4.32873 14.1041 4.38804 14.0516 4.67271 13.7669L14.0948 4.34484C14.4232 4.01641 14.4232 3.48393 14.0948 3.1555ZM8.25006 15.0002C8.25006 14.586 8.58584 14.2502 9.00006 14.2502H15.7501C16.1643 14.2502 16.5001 14.586 16.5001 15.0002C16.5001 15.4144 16.1643 15.7502 15.7501 15.7502H9.00006C8.58584 15.7502 8.25006 15.4144 8.25006 15.0002Z" fill="currentColor" />
                                        </svg></a>
                                </div>
                                <div class="d-flex">
                                    <div class="dash-profile-qrCode mt-10">
                                        <img width="200px" height="auto" src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?= $account_no ?>&choe=UTF-8&chld=H|0" alt="account-qrcode">
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $account_no ?>" id="accNo">
                                <button class="btn btn-primary dash-print-btn mt-24 green-btn copyBtn" style="width: 100%" id="copyBtn" onclick="copy()">
                                    <span class="f-14 leading-20 gilroy-medium">Copy Account Number</span>
                                </button>
                            </div>
                        </div>
                        <div class="row mt-20 gy-4">
                            <p class="mb-0 f-18 gilroy-Semibold text-dark">Account summary</p>
                            <form>
                                <input type="hidden" value="<?= $numOfDeposits ?>" id="nd">
                                <input type="hidden" value="<?= $numOfExchanges ?>" id="ne">
                                <input type="hidden" value="<?= $numOfInvestments ?>" id="ni">
                                <input type="hidden" value="<?= $numOfStakes ?>" id="ns">
                                <input type="hidden" value="<?= $numOfTransfers ?>" id="nt">
                                <input type="hidden" value="<?= $numOfWithdrawals ?>" id="nw">
                            </form>
                            <div class="col-12 col-xl-6">
                                <div class="inv-terms bg-white d-flex justify-content-center">
                                    <canvas id="myChart" style="width:100%;max-width:700px;height:auto;"></canvas>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <?php foreach ($data['last_transaction'] as $d) { ?>
                                    <div class="dash-profile-qr-div bg-white profile-mt-12">
                                        <div class="d-flex justify-content-between qr-icon">
                                            <p class="mb-0 f-12 leading-22 text-dark gilroy-Semibold">Your Last Transaction (<?= $d['transaction_type'] ?>)</p>
                                            <a href="../transactions/details.php?transac_id=<?= $d['id'] ?>&transac_type=<?= $d['transaction_type'] ?>" class="fil-btn-arow ml-12 d-flex align-items-center justify-content-center">
                                                <svg class="nscaleX-1" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 3.96967C9.67678 4.26256 9.67678 4.73744 9.96967 5.03033L13.1893 8.25H3C2.58579 8.25 2.25 8.58579 2.25 9C2.25 9.41421 2.58579 9.75 3 9.75H13.1893L9.96967 12.9697C9.67678 13.2626 9.67678 13.7374 9.96967 14.0303C10.2626 14.3232 10.7374 14.3232 11.0303 14.0303L15.5303 9.53033C15.8232 9.23744 15.8232 8.76256 15.5303 8.46967L11.0303 3.96967C10.7374 3.67678 10.2626 3.67678 9.96967 3.96967Z" fill="white" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-0 f-24 leading-30 gilroy-Semibold l-s1 text-dark"><?= $d['amount'] ?> <?= $d['wallet'] ?></p>
                                        </div>
                                        <button class="btn btn-lg btn-primary dash-print-btn mt-24 green-btn" onclick="window.location = '../transactions'">
                                            <span class="f-14 leading-20 gilroy-medium">Transactions</span>
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <?php if ($level == 1) { ?>
                            <div class="col-12 col-xl-6">
                                <div class="contact-support bg-white">
                                    <div class="d-flex">
                                        <div class="messages-box">
                                            <img src="../../public/icons/up.png" alt="" width="40px" height="auto">
                                        </div>
                                        <div class="ml-12 mt-9">
                                            <p class="mb-0 f-18 text-dark leading-22 gilroy-Semibold w-break">Upgrade To Level 2</p>
                                        </div>
                                    </div>
                                    <p class="mb-0 f-14 leading-22 text-gray-100 gilroy-medium mt-18">You portfolio is currently at level <?= $level ?>. Your portfolio may be restricted from preforming certain actions. Simply fill in some personal information, this would help Yieldfincs know you better and serve you better</p>
                                    <a href="../profile/#pinfo" class="mt-32 btn btn-sm btn-primary ticket-btn green-btn">
                                        <span class="f-14 leading-20 gilroy-medium text-white">Update personal information</span>
                                    </a>

                                </div>
                            </div>
                        <?php } elseif ($level == 2) { ?>
                            <div class="col-12 col-xl-6">
                                <div class="contact-support bg-white">
                                    <div class="d-flex">
                                        <div class="messages-box">
                                            <img src="../../public/icons/up.png" alt="" width="40px" height="auto">
                                        </div>
                                        <div class="ml-12 mt-9">
                                            <p class="mb-0 f-18 text-dark leading-22 gilroy-Semibold w-break">Upgrade To Level 3</p>
                                        </div>
                                    </div>
                                    <p class="mb-0 f-14 leading-22 text-gray-100 gilroy-medium mt-18">You portfolio is currently at level <?= $level ?>. Your portfolio may be restricted from preforming certain actions. Simply verify a personal document, this would help Yieldfincs verify if you exist</p>
                                    <a href="../personal-verification" class="mt-32 btn btn-sm btn-primary ticket-btn green-btn">
                                        <span class="f-14 leading-20 gilroy-medium text-white">Verify document</span>
                                    </a>

                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div>
                        <div class="mt-22 mt-sm-4">
                            <div class="d-flex justify-content-between align-items-center r-pb-8 pb-10">
                                <p class="mb-0 text-gray-100 f-16 r-f-12 gilroy-medium dark-CDO">Recent Activities</p>
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 text-gray-100 f-16 r-f-12 gilroy-medium dark-CDO">See All
                                        Transactions</p>
                                    <a href="../transactions" class="fil-btn-arow ml-12 d-flex align-items-center justify-content-center">
                                        <svg class="nscaleX-1" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 3.96967C9.67678 4.26256 9.67678 4.73744 9.96967 5.03033L13.1893 8.25H3C2.58579 8.25 2.25 8.58579 2.25 9C2.25 9.41421 2.58579 9.75 3 9.75H13.1893L9.96967 12.9697C9.67678 13.2626 9.67678 13.7374 9.96967 14.0303C10.2626 14.3232 10.7374 14.3232 11.0303 14.0303L15.5303 9.53033C15.8232 9.23744 15.8232 8.76256 15.5303 8.46967L11.0303 3.96967C10.7374 3.67678 10.2626 3.67678 9.96967 3.96967Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction List -->
                    <?php foreach ($data['latest_transactions'] as $t) { ?>
                        <div class="transac-parent" data-id="<?= $t['id'] ?>" data-type="<?= $t['transaction_type'] ?>">
                            <div class="transac-parent cursor-pointer open-transac_modal">
                                <div class="d-flex justify-content-between transac-child">
                                    <div class="d-flex w-50">

                                        <!-- Image -->
                                        <div class="deposit-circle d-flex justify-content-center align-items-center">
                                            <img src="../public/uploads/currency_logos/<?= $t['wallet_img'] ?>" alt="Transaction">
                                        </div>

                                        <div class="ml-20 r-ml-8">
                                            <!-- Transaction Type -->

                                            <p class="mb-0 text-dark f-16 gilroy-medium theme-tran" style="text-transform: capitalize;"><?= $t['transaction_type'] ?></p>
                                            <div class="d-flex flex-wrap">

                                                <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2">
                                                    <?= $t['from_to'] ? $t['from_to'] : $fullname ?></p>

                                                <!-- Dot & Transaction Date -->
                                                <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                                    <svg class="mx-2 text-muted-100" width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="currentColor" />
                                                    </svg>
                                                </p>
                                                <p class="mb-0 text-gray-100 f-13 leading-17 gilroy-regular tran-title mt-2 d-flex justify-content-center align-items-center">
                                                    <?= $t['datetime'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div>
                                            <p class="mb-0 gilroy-medium text-gray-100 r-f-12 f-16 ph-20">
                                                <?php if ($t['transaction_type'] == 'deposit') { ?>
                                                    <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                                    </svg>
                                                <?php } elseif ($t['transaction_type'] == 'withdrawal') { ?>
                                                    <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                                    </svg>
                                                <?php } elseif ($t['transaction_type'] == 'transfer from') { ?>

                                                    <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                                    </svg>
                                                <?php } elseif ($t['transaction_type'] == 'transfer to') { ?>
                                                    <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                                    </svg>
                                                <?php } elseif ($t['transaction_type'] == 'exchange from') { ?>
                                                    <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.89992 6.15383L7.02742 4.28133L5.88409 3.13216C5.65113 2.89955 5.33538 2.76891 5.00617 2.76891C4.67697 2.76891 4.36122 2.89955 4.12826 3.13216L1.10659 6.15383C0.709923 6.5505 0.995756 7.22716 1.54992 7.22716H8.45659C9.01659 7.22716 9.29659 6.5505 8.89992 6.15383Z" fill="#D9204C"></path>
                                                    </svg>
                                                <?php } elseif ($t['transaction_type'] == 'exchange to') { ?>
                                                    <svg class="mx-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.89992 3.84617L7.02742 5.71867L5.88409 6.86784C5.65113 7.10045 5.33538 7.23109 5.00617 7.23109C4.67697 7.23109 4.36122 7.10045 4.12826 6.86784L1.10659 3.84617C0.709923 3.4495 0.995756 2.77284 1.54992 2.77284H8.45659C9.01659 2.77284 9.29659 3.4495 8.89992 3.84617Z" fill="#2AAA5E" />
                                                    </svg>
                                                <?php } ?>
                                                <?= $t['amount'] . ' ' . $t['wallet'] ?>
                                            </p>

                                            <?php if ($t['verified'] == 0) { ?>
                                                <p class="text-warning f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">Pending</p>
                                            <?php } elseif ($t['verified'] == 1) { ?>
                                                <p class="text-success f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">Success</p>
                                            <?php } else { ?>
                                                <p class="text-danger f-13 gilroy-regular text-end mt-6 mb-0 status-info rlt-txt">Failed</p>
                                            <?php } ?>
                                        </div>
                                        <!-- <div class="cursor-pointer transaction-arrow ml-28 r-ml-12">
                                        <a class="arrow-hovers" data-bs-toggle="modal" data-bs-target="#transaction-Info-0">
                                            <svg class="nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5312 1.52861C3.27085 1.78896 3.27085 2.21107 3.5312 2.47141L7.0598 6.00001L3.5312 9.52861C3.27085 9.78895 3.27085 10.2111 3.5312 10.4714C3.79155 10.7318 4.21366 10.7318 4.47401 10.4714L8.47401 6.47141C8.73436 6.21106 8.73436 5.78895 8.47401 5.52861L4.47401 1.52861C4.21366 1.26826 3.79155 1.26826 3.5312 1.52861Z" fill="currentColor" />
                                            </svg>
                                        </a>
                                    </div> -->
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php } ?>

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

    <script>
        'use strict';
        var cancellingText = "Cancelling...";
        var cancelledText = "Cancelled";
        var requestPaymentCancelUrl = "https://demo.paymoney.techvill.net/request_payment/cancel";
        var printQrCodeUrl = "https://demo.paymoney.techvill.net/profile/qr-code-print/2/user";
        var requestPaymentCreatorStatusCheckUrl = "https://demo.paymoney.techvill.net/request_payment/check-creator-status";
        var requestPaymentCreatorSuspendUrl = "https://demo.paymoney.techvill.net/check-request-creator-suspended-status";
        var requestPaymentCreatorInactiveUrl = "https://demo.paymoney.techvill.net/check-request-creator-inactive-status";
        var userStatus = "Active";
        var userStatusCheckUrl = "https://demo.paymoney.techvill.net/check-user-status";
        <?php if ($numOfWallets > 0) { ?>
            var walletRoute = "../wallets";
        <?php } else { ?>
            var walletRoute = "../wallet-add";
        <?php } ?>
    </script>
    <script src="../public/user/customs/js/user-status.min.js"></script>
    <!-- <script src="../public/user/customs/js/user-transaction.min.js"></script> -->
    <script src="../public/user/customs/js/dashboard.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        const ne = document.querySelector('#ne').value
        const ns = document.querySelector('#ns').value
        const ni = document.querySelector('#ni').value
        const nw = document.querySelector('#nw').value
        const nd = document.querySelector('#nd').value
        const nt = document.querySelector('#nt').value
        const xValues = ["Stakes", "Investments", "Deposits", "Withdrawals", "Transfers", "Exchanges"];
        const yValues = [ns, ni, nd, nw, nt, ne];
        const barColors = ['blue', 'brown', 'orange', 'grey', 'purple', 'green'];
        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Acccount Summary Chart"
                },
            }
        });
    </script>

    <script type="text/javascript">
        document.querySelectorAll('.transac-parent').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const transac_id = e.currentTarget.dataset.id
                const transac_type = e.currentTarget.dataset.type
                window.location = `../transactions/details.php?transac_id=${transac_id}&transac_type=${transac_type}`
            })
        })
        const copy = () => {
            const accNo = document.querySelector('#accNo').value
            const btn = document.querySelector('#copyBtn')
            navigator.clipboard.writeText(accNo)
            btn.innerHTML = `<span class="f-14 leading-20 gilroy-medium">Copied!!</span>`

            setTimeout(() => {
                btn.innerHTML = `<span class="f-14 leading-20 gilroy-medium">Copy Account Number</span>`
            }, 1500)
        }
    </script>

    <!-- end js -->

</body>

</html>