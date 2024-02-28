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

    <title>Add Wallet | Yield Fiancial Services</title>

    <!-- css -->
    <link rel="stylesheet" href="../public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="../public/user/templates/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <style>
        .add_wallet_btn {
            padding: .2rem;
            height: auto;
            width: 100px;
            margin-bottom: 1rem;
            font-weight: 600;
            font-size: 14px;
            background-color: transparent;
            border: none;
            color: blue;
            border-radius: 3px;
        }
    </style>
</head>

<body>

    <!-- sidebar section -->
    <!-- Sidebar Start -->
    <?php $page = "all-wallets"  ?>
    <?php include "../master/sidenav.php" ?>
    <div class="my-container active-cont bg-white-50">

        <!-- header section -->
        <?php include "../master/topnav.php" ?>

        <div class="position-relative">
            <div class="containt-parent">
                <div class="main-containt">

                    <!-- main-containt -->
                    <div class="pb-34">
                        <div class="px-61 pb-20 helper-size">
                            <p class="mb-0 f-26 gilroy-Semibold text-uppercase text-center text-dark">Add Wallet</p>
                            <p class="mb-0 text-center f-16 leading-26 gilroy-medium text-gray-100 dark-c dark-p mt-8">
                                Here are the list of wallets that you can add.
                            </p>
                        </div>
                        <div class="px-28 helper-div">
                            <div class="dash-right-profile d-flex align-items-end">
                                <a href="../wallets" class="btn btn-lg btn-primary w-160">
                                    <span class="mb-0 f-14 leading-20 gilroy-medium text-light">My Wallets</span>
                                    <svg class="ml-10 nscaleX-1" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 6C4.83579 6 4.5 5.66421 4.5 5.25C4.5 4.83579 4.83579 4.5 5.25 4.5L12.75 4.5C13.1642 4.5 13.5 4.83579 13.5 5.25L13.5 12.75C13.5 13.1642 13.1642 13.5 12.75 13.5C12.3358 13.5 12 13.1642 12 12.75V7.06066L5.78033 13.2803C5.48744 13.5732 5.01256 13.5732 4.71967 13.2803C4.42678 12.9874 4.42678 12.5126 4.71967 12.2197L10.9393 6L5.25 6Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                            <br>
                            <div class="row r-mt-n">
                                <?php foreach ($data['wallets'] as $w) { ?>
                                    <div class="col-12 col-xl-6 mt-19">
                                        <div class="balance-box">
                                            <div class="d-flex justify-content-between">
                                                <div class="wallet-left-box d-flex gap-18">
                                                    <div class="curency-box d-flex align-items-center justify-content-center">
                                                        <img src="../public/uploads/currency_logos/<?= $w['wallet_img'] ?>" alt="Currency">
                                                    </div>
                                                    <div class="mt-n3p span-currency">
                                                        <span class="f-15 gilroy-medium text-gray"><?= $w['wallet_type'] ?></span>
                                                        <p class="mb-0 mt-6"><span class="f-28 gilroy-Semibold text-dark"><?= $w['wallet_name'] ?></span><span class="ml-2p f-15 text-primary gilroy-medium"></span></p>
                                                    </div>
                                                </div>
                                                <div class="wallet-right-box mt-n3p span-currency text-end">
                                                    <!-- <span class="f-15 gilroy-medium text-gray">Value</span>
                                                    <p class="mb-0 mt-6 f-28 gilroy-Semibold text-dark l-s2">1,977.98 USD</p> -->
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between span-currency">
                                                <div class="currency-mt-32">
                                                    <p class="text-gray mb-0 f-4 leading-16 gilroy-medium usdVal" data-coin=<?= $w['wallet_name'] ?>>Calculating...</p>
                                                </div>
                                                <div class="right-icon-div d-flex">
                                                    <div class="btn-block d-flex mt-20">
                                                        <form action="">
                                                            <?php
                                                            $wallet_added = $modules->checkWallet($uID, $w['id']);
                                                            if ($wallet_added == 0) {
                                                            ?>
                                                                <button class="add_wallet_btn" data-id="<?= $w['id'] ?>" data-uid="<?= $uID ?>" data-wallet_name="<?= $w['wallet_name'] ?>" type="button">Add Wallet <i class="bi bi-plus-lg"></i></button>
                                                            <?php } else { ?>
                                                                <button class="add_wallet_btn" data-id="<?= $w['id'] ?>" data-uid="<?= $uID ?>" data-wallet_name="<?= $w['wallet_name'] ?>" type="button">Added <i class="bi bi-check-lg"></i></button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <hr>
                                <hr>
                            </div>
                        </div>
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

    <script>
        const convert = async (wallet, curr, amount) => {
            try {
                const res = await fetch(`https://api.coinconvert.net/convert/${curr}/${wallet}?amount=${amount}`);
                const data = await res.json()
                const test = Object.values(data)
                const val = test[2];
                if (!val) {
                    return amount
                }
                return val
            } catch (error) {
                // console.log(error);
            }

        }
        const setUsdVal = () => {
            const element = document.querySelectorAll('.usdVal')
            element.forEach(async (elem) => {
                try {
                    const coin = elem.dataset.coin
                    const val = await convert('USD', coin, 1)
                    elem.textContent = `1 ${coin} = ${val} USD`
                } catch (err) {
                    elem.textContent = "Network err"
                }
            })
        }
        setUsdVal()
        setInterval(() => {
            setUsdVal()
        }, 10000)
    </script>

    <script type="text/javascript">
        var SITE_URL = "https://demo.paymoney.techvill.net";
        var FIATDP = "0.00";
        var CRYPTODP = "0.00000000";

        const addBtn = document.querySelectorAll('.add_wallet_btn')
        const addedBtn = document.querySelectorAll('.added_wallet_btn')
        addBtn.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const ct = e.currentTarget

                ct.textContent = "......"

                const uid = ct.dataset.uid
                const wallet_id = ct.dataset.id
                const wallet_name = ct.dataset.wallet_name

                $.ajax({
                    url: '../backend/actions/addWallet.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        uid,
                        wallet_id,
                        wallet_name
                    },
                    success: (res) => {
                        if (res.header == 'added') {
                            ct.innerHTML = `Added <i class="bi bi-check-lg">`;
                        } else if (res.header == 'removed') {
                            ct.innerHTML = `Add Wallet <i class="bi bi-plus-lg">`;
                        }
                    }
                })
            })
        })


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

    <!-- end js -->

</body>

</html>