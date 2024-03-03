<!DOCTYPE html>
<html lang="en" class="scrol-pt">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU">
	<meta name="description" content="Register">
	<meta name="keywords" content="">
	<meta name="theme-color" content="#130e80" />
	<title>Register | Yield Financial Services</title>
	<!-- <script src="./public/frontend/templates/js/flashesh-dark.min.js"></script> -->
	<link rel="stylesheet" href="./public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./public/frontend/templates/css/style.min.css">
	<link rel="stylesheet" href="./public/frontend/templates/css/owl-css/owl.min.css">
	<link rel="stylesheet" href="./public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
	<link href="/youholder/public/logos/favicon.png" rel="shortcut icon" type="image/x-icon" />
	<link href="/youholder/public/logos/favicon.png" rel="apple-touch-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="./public/dist/plugins/intl-tel-input-17.0.19/css/intlTelInput.min.css">

</head>

<body>

	<!-- Start scroll-top button -->
	<div id="scroll-top-area">
		<a href="https://demo.paymoney.techvill.net/register#top-header"><i class="fas fa-arrow-up"></i></a>
	</div>
	<!-- End scroll-top button -->
	<script type="text/javascript">
		var SITE_URL = "https://demo.paymoney.techvill.net";
	</script>

	<!-- Sign-up section start -->
	<div class="container-fluid container-layout px-0" id="personal-info-store">
		<div class="main-auth-div">
			<div class="d-flex justify-content-start position-fixed mt-24 ml-18">
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
					<div class="auth-section d-flex align-items-center create-account">
						<div class="auth-module">
							<div class="d-flex align-items-center back-direction mb-2 back-signin">
								<a onclick="history.go(-1)" class="d-inline-flex align-items-center back-btn">
									<svg class="position-relative nscaleX-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M8.47075 10.4709C8.7311 10.2105 8.7311 9.78842 8.47075 9.52807L4.94216 5.99947L8.47075 2.47087C8.7311 2.21053 8.7311 1.78842 8.47075 1.52807C8.2104 1.26772 7.78829 1.26772 7.52794 1.52807L3.52795 5.52807C3.2676 5.78842 3.2676 6.21053 3.52795 6.47088L7.52794 10.4709C7.78829 10.7312 8.2104 10.7312 8.47075 10.4709Z" fill="currentColor" />
									</svg>
									<span class="ms-1">Back</span>
								</a>
							</div>
							<form class="form-horizontal" id="personal-info-form" method="POST">
								<input type="hidden" name="_token" value="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU" autocomplete="off"> <input type="hidden" name="defaultCountry" id="defaultCountry" class="form-control">
								<input type="hidden" name="carrierCode" id="carrierCode" class="form-control">
								<input type="hidden" name="formattedPhone" id="formattedPhone" class="form-control">

								<div class="auth-module-header">
									<p class="mb-0 text-start auth-title">Create Account</p>
									<p class="mb-0 text-start auth-text mt-12"> Already have an account? <a href="../login">Sign in here</a></p>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group mb-3">
											<label class="form-label">First Name <span class="star">*</span></label>
											<input type="text" class="form-control input-form-control" id="first_name" name="first_name" value="" required data-value-missing="This field is required." maxlength="30" data-max-length="First name length should be maximum 30 charcters.">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group mb-3">
											<label class="form-label">Last Name <span class="star">*</span></label>
											<input type="text" class="form-control input-form-control" id="last_name" name="last_name" value="" required data-value-missing="This field is required." maxlength="30" data-max-length="Last name length should be maximum 30 charcters.">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group mb-3">
											<label class="form-label">Email <span class="star">*</span></label>
											<input type="email" class="form-control input-form-control" id="email" name="email" value="" required data-type-mismatch="Enter a valid email.">
											<span id="email_error"></span>
											<span id="email_ok" class="text-success"></span>
										</div>
										<div class="form-group mb-3">
											<label class="form-label">Phone</label>
											<input type="tel" class="form-control input-form-control" id="tel" name="phone">
											<span id="duplicate-phone-error"></span>
											<span id="tel-error"></span>
										</div>
										<div class="form-group mb-3">
											<label class="form-label">Password <span class="star">*</span></label>
											<div id="password-div" class="position-relative">
												<input type="password" class="form-control input-form-control" name="password" id="password" required minlength="6" data-min-length="Password should contain at least 6 characters.">
												<span class="eye-icon cursor-pointer" id="eye-icon-show">
													<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M1.71998 1.71967C2.01287 1.42678 2.48775 1.42678 2.78064 1.71967L5.50969 4.44872C5.55341 4.48345 5.59378 4.52354 5.62977 4.5688L13.423 12.3621C13.4739 12.4011 13.5204 12.4471 13.561 12.5L16.2806 15.2197C16.5735 15.5126 16.5735 15.9874 16.2806 16.2803C15.9877 16.5732 15.5129 16.5732 15.22 16.2803L12.8547 13.915C11.771 14.5491 10.479 15 9.00031 15C6.85406 15 5.10432 14.0515 3.80787 12.9694C2.51318 11.8889 1.62553 10.6393 1.18098 9.93536C1.1751 9.92606 1.16907 9.91657 1.16291 9.90687C1.07468 9.768 0.960135 9.5877 0.902237 9.33506C0.85549 9.13108 0.855506 8.86871 0.902276 8.66474C0.960212 8.41207 1.07508 8.23131 1.16354 8.09212C1.16975 8.08235 1.17583 8.07278 1.18175 8.06341C1.63353 7.34824 2.55099 6.05644 3.89682 4.95717L1.71998 2.78033C1.42709 2.48744 1.42709 2.01256 1.71998 1.71967ZM4.96371 6.02406C3.73433 6.99464 2.87554 8.19074 2.44991 8.86452C2.42329 8.90666 2.40463 8.93624 2.38903 8.96192C2.37862 8.97905 2.37176 8.99088 2.36719 8.99912C2.36719 8.99941 2.36719 8.99969 2.36719 8.99998C2.36719 9.00029 2.36719 9.00059 2.36719 9.00089C2.3717 9.00902 2.37845 9.02067 2.38868 9.0375C2.40417 9.06302 2.42272 9.09243 2.44923 9.1344C2.84872 9.76697 3.6393 10.8749 4.76902 11.8178C5.89697 12.7592 7.31781 13.5 9.00031 13.5C10.015 13.5 10.9334 13.2311 11.7506 12.8109L10.5242 11.5845C10.0776 11.8483 9.55635 12 9.00031 12C7.34346 12 6.00031 10.6569 6.00031 9C6.00031 8.44396 6.15203 7.92272 6.41579 7.47614L4.96371 6.02406ZM7.551 8.61135C7.51791 8.73524 7.50031 8.86549 7.50031 9C7.50031 9.82843 8.17188 10.5 9.00031 10.5C9.13482 10.5 9.26507 10.4824 9.38896 10.4493L7.551 8.61135ZM9.00031 4.5C8.71392 4.5 8.43614 4.52137 8.1669 4.56117C7.75714 4.62176 7.37586 4.33869 7.31527 3.92893C7.25469 3.51917 7.53776 3.13789 7.94751 3.0773C8.28789 3.02698 8.63899 3 9.00031 3C11.1466 3 12.8963 3.94854 14.1928 5.03057C15.4874 6.11113 16.3751 7.36072 16.8196 8.06464C16.8255 8.07394 16.8316 8.08343 16.8377 8.09312C16.9259 8.23201 17.0405 8.41232 17.0984 8.66498C17.1451 8.86897 17.1451 9.13136 17.0983 9.33533C17.0404 9.58804 16.9253 9.76906 16.8367 9.90844C16.8305 9.91825 16.8244 9.92786 16.8184 9.93727C16.5797 10.3152 16.2174 10.8436 15.7374 11.4168C15.4715 11.7344 14.9985 11.7763 14.6809 11.5104C14.3633 11.2445 14.3214 10.7714 14.5873 10.4539C15.0158 9.94209 15.3393 9.47006 15.5503 9.13608C15.577 9.09384 15.5957 9.06416 15.6114 9.0384C15.6219 9.02109 15.6288 9.00916 15.6334 9.00086C15.6334 9.00059 15.6334 9.00031 15.6334 9.00003C15.6334 8.99972 15.6334 8.99942 15.6334 8.99911C15.6289 8.99099 15.6222 8.97934 15.6119 8.9625C15.5965 8.93698 15.5779 8.90757 15.5514 8.8656C15.1519 8.23303 14.3613 7.12506 13.2316 6.18218C12.1037 5.24078 10.6828 4.5 9.00031 4.5Z" fill="#6A6B87"></path>
													</svg>
												</span>
												<span class="eye-icon-hide d-none cursor-pointer" id="eye-icon-hide">
													<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M4.76901 6.18218C3.63929 7.12505 2.84871 8.23303 2.44922 8.8656C2.42271 8.90757 2.40417 8.93697 2.38868 8.96248C2.37845 8.97932 2.3717 8.99097 2.36719 8.99909C2.36719 8.99939 2.36719 8.9997 2.36719 9C2.36719 9.0003 2.36719 9.00061 2.36719 9.00091C2.3717 9.00903 2.37845 9.02068 2.38868 9.03752C2.40417 9.06303 2.42271 9.09243 2.44922 9.1344C2.84871 9.76697 3.63929 10.8749 4.76901 11.8178C5.89696 12.7592 7.3178 13.5 9.0003 13.5C10.6828 13.5 12.1036 12.7592 13.2316 11.8178C14.3613 10.8749 15.1519 9.76697 15.5514 9.1344C15.5779 9.09243 15.5964 9.06303 15.6119 9.03751C15.6222 9.02068 15.6289 9.00903 15.6334 9.00091C15.6334 9.00061 15.6334 9.0003 15.6334 9C15.6334 8.9997 15.6334 8.99939 15.6334 8.99909C15.6289 8.99097 15.6222 8.97932 15.6119 8.96249C15.5964 8.93697 15.5779 8.90757 15.5514 8.8656C15.1519 8.23303 14.3613 7.12505 13.2316 6.18218C12.1036 5.24077 10.6828 4.5 9.0003 4.5C7.3178 4.5 5.89696 5.24078 4.76901 6.18218ZM3.80786 5.03057C5.10431 3.94854 6.85405 3 9.0003 3C11.1466 3 12.8963 3.94854 14.1927 5.03057C15.4874 6.11113 16.3751 7.36071 16.8196 8.06464C16.8255 8.07394 16.8315 8.08343 16.8377 8.09313C16.9259 8.23198 17.0405 8.41227 17.0984 8.66488C17.1451 8.86884 17.1451 9.13116 17.0984 9.33512C17.0405 9.58773 16.9259 9.76802 16.8377 9.90687C16.8315 9.91657 16.8255 9.92606 16.8196 9.93536C16.3751 10.6393 15.4874 11.8889 14.1927 12.9694C12.8963 14.0515 11.1466 15 9.0003 15C6.85405 15 5.10431 14.0515 3.80786 12.9694C2.51318 11.8889 1.62553 10.6393 1.18097 9.93536C1.17509 9.92606 1.16906 9.91657 1.1629 9.90688C1.07469 9.76802 0.960152 9.58774 0.902251 9.33512C0.8555 9.13116 0.8555 8.86884 0.902251 8.66488C0.960152 8.41226 1.07469 8.23198 1.1629 8.09312C1.16906 8.08343 1.17509 8.07394 1.18097 8.06464C1.62553 7.36071 2.51318 6.11113 3.80786 5.03057ZM9.0003 7.5C8.17188 7.5 7.5003 8.17157 7.5003 9C7.5003 9.82843 8.17188 10.5 9.0003 10.5C9.82873 10.5 10.5003 9.82843 10.5003 9C10.5003 8.17157 9.82873 7.5 9.0003 7.5ZM6.0003 9C6.0003 7.34315 7.34345 6 9.0003 6C10.6572 6 12.0003 7.34315 12.0003 9C12.0003 10.6569 10.6572 12 9.0003 12C7.34345 12 6.0003 10.6569 6.0003 9Z" fill="#6A6B87"></path>
													</svg>
												</span>

											</div>
										</div>
										<div class="form-group mb-3" id="confirm-password-div">
											<label class="form-label">Confirm Password <span class="star">*</span></label>
											<input type="password" class="form-control input-form-control" id="password_confirmation" name="password_confirmation" required minlength="6" data-min-length="Password should contain at least 6 characters.">
										</div>
										<div class="d-grid mb-3 mb-3p">
											<button class="btn btn-lg" type="button" id="registerBtn" style="background-color: #130e80;">
												<div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
													<span class="visually-hidden"></span>
												</div>
												<span class="px-1" id="registrationSubmitBtnTxt">Continue</span>
												<span id="rightAngle"><svg class="position-relative ms-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M3.5286 10.4698C3.26825 10.2094 3.26825 9.78732 3.5286 9.52697L7.05719 5.99837L3.5286 2.46978C3.26825 2.20943 3.26825 1.78732 3.5286 1.52697C3.78895 1.26662 4.21106 1.26662 4.47141 1.52697L8.47141 5.52697C8.73176 5.78732 8.73176 6.20943 8.47141 6.46978L4.47141 10.4698C4.21106 10.7301 3.78895 10.7301 3.5286 10.4698Z" fill="currentColor"></path>
													</svg></span>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Sign-up section end -->


	<div class="d-none bottom-footer">
		<div class="px-240 d-flex justify-content-between btn-footer align-center">
			<div class="mt-18">
				<p class="mb-0 OpenSans-600 text-white">
					Copyright&nbsp;© 2024 &nbsp;&nbsp; YieldFincs| All Rights Reserved
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


	<script type="text/javascript">
		// Registration ajax setup
		$(document).ready(() => {
			const registerBtn = $('#registerBtn')

			registerBtn.on('click', () => {
				registerBtn.html('Registering....')

				const fname = $('#first_name').val()
				const lname = $('#last_name').val()
				const email = $('#email').val()
				const phone = $('#tel').val()
				const pass = $('#password').val()
				const cpass = $('#password_confirmation').val()

				if (!fname || !lname || !email || !pass) {
					toastr.warning("Input required fields!!!", "Error", {
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
					registerBtn.html('Try again')
				} else if (pass.length < 6) {
					toastr.warning("Password must be at least 6 characters", "Password too short", {
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
					registerBtn.html('Try again')
				} else if (pass !== cpass) {
					toastr.warning("Passwords do not match!!!", "Confirm", {
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
					registerBtn.html('Try again')
				} else {
					$.ajax({
						type: 'post',
						dataType: 'json',
						url: '../app/backend/actions/register.php',
						data: {
							fname,
							lname,
							email,
							phone,
							pass
						},
						success: (res) => {
							if (res.header == 'exists') {
								toastr.error("Email already exists!!!", "Sorry", {
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
								registerBtn.html('Try again')
							} else if (res.header == 'good') {
								toastr.success("A verification code was sent to your email", "Verify your email", {
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
								window.setTimeout(() => {
									window.location = `./verify.php?em_verify=${email}&fname=${fname}`
								}, 3000)
							} else if (res.header == 'wrong') {
								toastr.error("Email not valid", "Invalid Email", {
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
								registerBtn.html('Try again')
							}
						}
					})
				}
			})
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
	</script>

	<script src="./public/dist/plugins/html5-validation-1.0.0/validation.min.js" type="text/javascript"></script>
	<script src="./public/dist/plugins/intl-tel-input-17.0.19/js/intlTelInput-jquery.min.js" type="text/javascript"></script>
	<script src="./public/dist/js/isValidPhoneNumber.min.js" type="text/javascript"></script>

	<script>
		'use strict';
		let requiredText = 'This field is required.';
		let validEmailText = 'Please enter a valid email address.';
		let samePasswordText = 'Please enter the same value again.'
		let confirmSamePasswordText = 'Please enter same value as the password field.';
		let alphabetSpaceText = 'Please enter only alphabet and spaces.';
		let signingUpText = 'Continuing...';
		let countryShortCode = 'US';
		let validPhoneNumberText = 'Please enter a valid international phone number.'
		let utilsJsScript = './public/dist/plugins/intl-tel-input-17.0.19/js/utils.min.js';
	</script>
	<script src="./public/frontend/customs/js/register/register.min.js" type="text/javascript"></script>
</body>

</html>