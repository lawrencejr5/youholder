<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Via Bank | Pay Money </title>
    <script src="https://demo.paymoney.techvill.net/public/frontend/templates/js/flashesh-dark.min.js"></script>
    <link rel="stylesheet" href="https://demo.paymoney.techvill.net/public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.paymoney.techvill.net/public/frontend/templates/css/style.min.css">
    <link rel="stylesheet" href="https://demo.paymoney.techvill.net/public/frontend/templates/css/owl-css/owl.min.css">
    <link rel="stylesheet" href="https://demo.paymoney.techvill.net/public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
    <link rel="shortcut icon" href="https://demo.paymoney.techvill.net/public/uploads/logos/1530689937_favicon.png" />

    <script>
        var SITE_URL = "https://demo.paymoney.techvill.net";
    </script>

</head>

<body class="bg-body-muted">
    <div class="container-fluid container-layout px-0">

        <div class="section-payment">

            <div class="transaction-details-module">

                <div class="total-amount">
                    <h2>Transaction Details</h2>
                    <div class="d-flex justify-content-between mb-10">
                        <p>You are sending</p>
                        <p>Medium</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <h3>
                                USD 501.6
                                <br>

                            </h3>
                        </div>
                        <div class="amount-logo" id="bank_logo">
                            <img src="https://demo.paymoney.techvill.net/public/dist/images/gateways/payments/bank.png" class="img-fluid">
                        </div>
                    </div>

                </div>


                <form action="https://demo.paymoney.techvill.net/gateway/confirm-payment" method="POST" accept-charset="UTF-8" id="bank_deposit_form" enctype="multipart/form-data">

                    <input value="kIte8862DuGRvS3wAffFj2TC0j1SygL6deKEbxei" name="_token" id="token" type="hidden">
                    <input value="6" name="payment_method_id" id="payment_method_id" type="hidden">
                    <input type="hidden" name="payment_type" id="payment_type" value="deposit">
                    <input type="hidden" name="transaction_type" id="transaction_type" value="1">
                    <input type="hidden" name="gateway" id="transaction_type" value="bank">
                    <input type="hidden" name="amount" id="amount" value="501.6">
                    <input type="hidden" name="total_amount" id="total_amount" value="501.6">
                    <input type="hidden" name="redirect_url" id="redirect_url" value="https://demo.paymoney.techvill.net/deposit/complete">
                    <input type="hidden" name="uuid" id="uuid" value="CB9D21490892C">
                    <input type="hidden" name="params" value="CB9D21490892C">

                    <div class="param-ref">
                        <!-- Selected Bank Name -->
                        <div>
                            <label class="form-label text-gray-100 gilroy-medium">Select Bank</label>
                            <select class="form-control bank form-select" name="bank_id" id="bank">
                                <option value="1" selected>HSBC</option>
                                <option value="2">AIG</option>
                                <option value="3">Alfala</option>
                            </select>
                        </div>


                        <!-- Account Details -->
                        <div class="d-flex mt-3">
                            <!-- Account Name -->
                            <div class="w-50">
                                <p class="form-label text-gray-100 gilroy-medium">Account Name</p>
                                <p class="form-label text-gray-100 gilroy-medium" id="account_name">maria jane</p>
                            </div>

                            <!-- Account Number -->
                            <div class="ms-4 ms-sm-5 w-50">
                                <p class="form-label text-gray-100 gilroy-medium">Account Number</p>
                                <p class="form-label text-gray-100 gilroy-medium" id="account_number">43536</p>
                            </div>
                        </div>

                        <!-- Bank Name -->
                        <div class="d-flex r-mt-16 mt-2">
                            <div class="w-50">
                                <p class="form-label text-gray-100 gilroy-medium">Bank Name</p>
                                <p class="form-label text-gray-100 gilroy-medium" id="bank_name">Alfala</p>
                            </div>
                        </div>

                        <!-- Attachment -->
                        <div class="mb-3attach-file attach-print">
                            <label for="formFileMultiple" class="form-label text-gray-100 gilroy-medium">Attached File</label>
                            <input class="form-control upload-filed" type="file" id="formFileMultiple" name="file" multiple required data-value-missing="This field is required.">
                            <p class="form-label text-gray-100 gilroy-medium f-12">Upload your documents (Max: 2 MB)</p>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary" type="submit" id="bank-button-submit">
                                    <div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    <span id="bankSubmitBtnText" class="px-1">Pay with Bank</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>


                <div class="d-flex justify-content-center align-items-center mt-2 back-direction">
                    <button class="text-gray gilroy-medium d-inline-flex align-items-center position-relative back-btn bg-transparent border-0" id="goBackButton">
                        <svg class="position-relative nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.47075 10.4709C8.7311 10.2105 8.7311 9.78842 8.47075 9.52807L4.94216 5.99947L8.47075 2.47087C8.7311 2.21053 8.7311 1.78842 8.47075 1.52807C8.2104 1.26772 7.78829 1.26772 7.52794 1.52807L3.52795 5.52807C3.2676 5.78842 3.2676 6.21053 3.52795 6.47088L7.52794 10.4709C7.78829 10.7312 8.2104 10.7312 8.47075 10.4709Z" fill="currentColor" />
                        </svg>
                        <span class="ms-1 back-btn ns depositConfirmBackBtnText">Back</span>
                    </button>
                </div>

            </div>
        </div>

    </div>
    <script src="https://demo.paymoney.techvill.net/public/dist/libraries/jquery-3.6.1/jquery-3.6.1.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/frontend/templates/js/owl.carousel.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/dist/libraries/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/frontend/templates/js/main.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/dist/plugins/select2-4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://demo.paymoney.techvill.net/public/frontend/customs/js/gateways/back.min.js"></script>


    <script src="https://demo.paymoney.techvill.net/public/dist/plugins/jquery-validation-1.17.0/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script src="https://demo.paymoney.techvill.net/public/dist/plugins/jquery-validation-1.17.0/dist/additional-methods.min.js" type="text/javascript"></script>

    <script>
        "use strict";
        var bankDetailsUrl = "https://demo.paymoney.techvill.net/deposit/bank-payment/get-bank-detail";
        var confirming = "Confirming..."
        var token = "kIte8862DuGRvS3wAffFj2TC0j1SygL6deKEbxei";
        var extensionText = "Please select (png, jpg, jpeg, gif, bmp, pdf, docx, txt or rtf) file!";
        var requiredText = "This field is required.";
    </script>
    <script src="https://demo.paymoney.techvill.net/public/frontend/customs/js/gateways/bank.min.js"></script>


</body>

</html>