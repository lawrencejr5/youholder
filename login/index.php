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
	<title>Login | Yield Financial Services</title>
	<!-- <script src="./public/frontend/templates/js/flashesh-dark.min.js"></script> -->
	<link rel="stylesheet" href="./public/dist/libraries/bootstrap-5.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./public/frontend/templates/css/style.min.css">
	<link rel="stylesheet" href="./public/frontend/templates/css/owl-css/owl.min.css">
	<link rel="stylesheet" href="./public/dist/plugins/select2-4.1.0-rc.0/css/select2.min.css">
	<link href="/youholder/public/icons/yield.png" rel="shortcut icon" type="image/x-icon" />
	<link href="/youholder/public/icons/yield.png" rel="apple-touch-icon" />
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
						<img src="/youholder/public/logos/yield-logo.png" height="auto" width="100px" alt="Brand Logo">
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
									<img class="img img-fluid" src="./public/frontend/templates/images/login/signin-static.svg">
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
								<input type="hidden" name="_token" value="PFhVNJMPXGAl78xl7DN1x28WvuRvz2vpVljgxMPU" autocomplete="off"> <input type="hidden" name="has_captcha" value="Disabled">

								<div class="auth-module-header">
									<p class="mb-0 text-start auth-title">Sign In</p>
									<p class="mb-0 text-start auth-text mt-12"> Don’t have an account?<a href="../register"> Sign up here</a></p>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label class="form-label">Email Address <span class="star">*</span></label>
											<input type="email" class="form-control input-form-control" placeholder="Email Address" name="email_only" id="email_only" required="" data-value-missing="This field is required.">
										</div>
										<div class="form-group mb-3">
											<label class="form-label">Password <span class="star">*</span></label>
											<div id="show_hide_password" class="position-relative">
												<input type="password" class="form-control input-form-control" id="password" placeholder="Password" name="password" required="" data-value-missing="This field is required.">
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
										<!-- reCaptcha -->
										<div class="d-grid mb-3 mb-3p">
											<button class="btn btn-lg" type="button" id="login-btn" style="background-color: #130e80;">
												<div class="spinner spinner-border text-white spinner-border-sm mx-2 d-none" role="status">
													<span class="visually-hidden"></span>
												</div>
												<span class="px-1" id="login-btn-text">Login</span>
												<span id="rightAngleSvgIcon"><svg class="position-relative ms-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M3.5286 10.4698C3.26825 10.2094 3.26825 9.78732 3.5286 9.52697L7.05719 5.99837L3.5286 2.46978C3.26825 2.20943 3.26825 1.78732 3.5286 1.52697C3.78895 1.26662 4.21106 1.26662 4.47141 1.52697L8.47141 5.52697C8.73176 5.78732 8.73176 6.20943 8.47141 6.46978L4.47141 10.4698C4.21106 10.7301 3.78895 10.7301 3.5286 10.4698Z" fill="currentColor"></path>
													</svg></span>

											</button>
										</div>
										<div class="forgot-link text-center mb-3 pt-1">
											<a href="../forget-password/">Forgot
												Password?</a>
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
	<!-- Login section end -->

	<!-- Start Footer-->
	<!-- Footer section -->
	<!-- <div class="footer-sec">
		<div class="px-240">
			<div class="row">
				<div class="col-md-5 pb-54 align-center">
					<a class="d-flex" href="https://demo.paymoney.techvill.net">
						<img class="mt-54 footer-logo" src="./public/uploads/logos/1532175849_logo.png" alt="Brand Logo">
					</a>

					<p class="pb-0 mt-26 w-358 txt-center text-white gilroy-light leading-29">Pay Money, a secured
						online payment gateway that allows payment in multiple currencies easily, safely and securely.
					</p>
					<p class="mb-0 mt-20 mt-r24 gilroy-Semibold f-20 text-white txt-center">
						Download Our App
					</p>
					<div class="mt-21 d-flex direction">
						<a href="http://store.google.com/pay-money" target="_blank">
							<img class="app-imgs" src="./public/uploads/app-store-logos/thumb/1531650482.png" alt="playstore">
						</a>
						<a href="https://itunes.apple.com/bd/app/pay-money" target="_blank">
							<img class="ms-3 ml-r12app-imgs" src="./public/uploads/app-store-logos/thumb/1531134592.png" alt="playstore">
						</a>


					</div>
				</div>
				<div class="col-md-3 align-center">
					<p class="pb-0 mt-58 gilroy-Semibold text-white f-20 txt-center quick-res">
						Quick Links
					</p>

					<div class="mt-18">
						<ul class="links gilroy-light">
							<li><a href="https://demo.paymoney.techvill.net" class="poppins5">Home</a></li>
							<li>
								<a href="https://demo.paymoney.techvill.net/about-us" class="poppins5">About us</a>
							</li>
							<li>
								<a href="https://demo.paymoney.techvill.net/portfoilo" class="poppins5">Portfoilo</a>
							</li>
							<li>
								<a href="https://demo.paymoney.techvill.net/contact-us" class="poppins5">Contact Us</a>
							</li>

							<li><a href="https://demo.paymoney.techvill.net/developer" class="poppins5">Developer</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 align-center">
					<div class="custom-postion">
						<p class="mb-0 mt-58 gilroy-Semibold f-20 text-white txt-center socials-res">
							Social Links
						</p>

						<div class="d-flex col-gap-12 mt-21">
							<a href="#">
								<div class="facebook" id="facebook">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect width="45.0402" height="45" rx="4" fill=""></rect>
										<g clip-path="url(#clip0_2297_2968)">
											<path d="M24.5094 32.4052V23.6116H27.5441L27.9985 20.1846H24.5094V17.9966C24.5094 17.0044 24.7927 16.3282 26.2557 16.3282L28.1215 16.3274V13.2623C27.7986 13.2207 26.6911 13.1274 25.4027 13.1274C22.7126 13.1274 20.8709 14.7244 20.8709 17.6574V20.1847H17.8284V23.6117H20.8708V32.4053L24.5094 32.4052Z" fill="white"></path>
										</g>
										<defs>
											<clipPath id="clip0_2297_2968">
												<rect width="10.2931" height="19.2823" fill="white" transform="translate(17.8284 13.125)"></rect>
											</clipPath>
										</defs>
									</svg>
								</div>
							</a>
							<a href="#">
								<div class="whtsapp ml-11" id="whtsapp">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.0400391" width="45.0402" height="45" rx="4" fill="" />
										<path d="M18.3128 21.091V23.9273H23.0047C22.8156 25.1446 21.5865 27.4964 18.3128 27.4964C15.4883 27.4964 13.1837 25.1564 13.1837 22.2728C13.1837 19.3891 15.4883 17.0491 18.3128 17.0491C19.9201 17.0491 20.9956 17.7346 21.6101 18.3255L23.8556 16.1627C22.4137 14.8155 20.5465 14 18.3128 14C13.7392 14 10.04 17.6991 10.04 22.2728C10.04 26.8464 13.7392 30.5456 18.3128 30.5456C23.0874 30.5456 26.2547 27.1892 26.2547 22.4619C26.2547 21.9182 26.1956 21.5046 26.1247 21.091H18.3128Z" fill="white" />
										<path d="M36.0397 21.0907H33.676V18.7271H31.3124V21.0907H28.9487V23.4544H31.3124V25.818H33.676V23.4544H36.0397" fill="white" />
									</svg>
								</div>
							</a>
							<a href="#">
								<div class="twitter ml-11" id="twitter">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.0402832" width="45.0402" height="45" rx="4" fill=""></rect>
										<path d="M32.4132 16.0164C31.6927 16.325 30.8693 16.5306 30.0458 16.6335C30.8693 16.1193 31.5898 15.2966 31.8986 14.371C31.0751 14.8852 30.2517 15.1937 29.2224 15.3994C28.5019 14.5767 27.3696 14.0625 26.2374 14.0625C23.9729 14.0625 22.1201 15.9136 22.1201 18.1761C22.1201 18.4846 22.1201 18.7931 22.2231 19.1016C18.8263 18.8959 15.7384 17.2505 13.6798 14.7824C13.371 15.3994 13.1651 16.1193 13.1651 16.8392C13.1651 18.2789 13.8857 19.513 15.0179 20.2328C14.2974 20.2328 13.6798 20.0272 13.1651 19.7186C13.1651 21.6726 14.6062 23.4208 16.4589 23.7294C16.1501 23.8322 15.7384 23.8322 15.3267 23.8322C15.0179 23.8322 14.812 23.8322 14.5032 23.7294C15.0179 25.3748 16.5619 26.6089 18.4146 26.6089C16.9736 27.7401 15.2238 28.3571 13.2681 28.3571C12.9593 28.3571 12.6505 28.3571 12.2388 28.2543C14.0915 29.3855 16.2531 30.1054 18.6205 30.1054C26.2374 30.1054 30.3546 23.8322 30.3546 18.3817V17.8675C31.178 17.559 31.8986 16.8391 32.4132 16.0164Z" fill="white"></path>
									</svg>
								</div>
							</a>
							<a href="#">
								<div class="linkdin ml-11" id="linkdin">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.201416" width="45.0402" height="45" rx="4" fill=""></rect>
										<path d="M17.5146 31.9712V19.8375H13.4417V31.9712H17.5146ZM15.4787 18.1799C16.8989 18.1799 17.783 17.2481 17.783 16.0838C17.7565 14.8932 16.899 13.9873 15.5056 13.9873C14.1125 13.9873 13.2014 14.8932 13.2014 16.0838C13.2014 17.2482 14.0853 18.1799 15.4521 18.1799H15.4785H15.4787ZM19.7689 31.9712H23.8417V25.1952C23.8417 24.8325 23.8682 24.4703 23.9757 24.211C24.2702 23.4865 24.9403 22.736 26.0654 22.736C27.5392 22.736 28.1288 23.8487 28.1288 25.4799V31.9711H32.2014V25.0138C32.2014 21.2868 30.1921 19.5526 27.5124 19.5526C25.3153 19.5526 24.3506 20.7688 23.8146 21.597H23.8418V19.8373H19.769C19.8224 20.9758 19.769 31.971 19.769 31.971L19.7689 31.9712Z" fill="white"></path>
									</svg>
								</div>
							</a>
							<a href="#">
								<div class="pinterest ml-11" id="pinterest">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.161133" width="45.0402" height="45" rx="4" fill=""></rect>
										<path d="M28.5611 15.0943C27.247 13.7814 25.3582 13.125 23.305 13.125C20.1842 13.125 18.2953 14.4378 17.2277 15.5045C15.9137 16.8174 15.1746 18.5405 15.1746 20.3456C15.1746 22.561 16.0779 24.2021 17.6383 24.8585C17.7205 24.9406 17.8847 24.9406 17.9668 24.9406C18.2953 24.9406 18.5417 24.6944 18.6239 24.3662C18.706 24.2021 18.7881 23.7098 18.8702 23.4636C18.9523 23.0534 18.8702 22.8892 18.6239 22.561C18.2132 22.0687 17.9668 21.4123 17.9668 20.5918C17.9668 18.2123 19.7736 15.6686 23.0586 15.6686C25.6867 15.6686 27.3292 17.1456 27.3292 19.5251C27.3292 21.002 27.0007 22.3969 26.4258 23.4636C26.0152 24.2021 25.276 25.0226 24.2084 25.0226C23.7156 25.0226 23.305 24.8585 23.0586 24.4482C22.8123 24.12 22.7301 23.7098 22.8122 23.2995C22.8944 22.8072 23.0586 22.3149 23.2229 21.8226C23.4693 20.92 23.7978 20.0174 23.7978 19.361C23.7978 18.2123 23.0586 17.3917 21.991 17.3917C20.5949 17.3917 19.5272 18.7866 19.5272 20.5097C19.5272 21.4123 19.7736 21.9867 19.8557 22.2328C19.6915 22.9713 18.6238 27.3201 18.4596 28.0585C18.3775 28.5509 17.6383 32.3253 18.7881 32.5714C20.02 32.8996 21.1697 29.2073 21.2519 28.797C21.334 28.4688 21.6625 27.156 21.8268 26.4175C22.4016 26.9919 23.3871 27.4021 24.3727 27.4021C26.1794 27.4021 27.7398 26.5816 28.8896 25.1047C29.9572 23.7098 30.6142 21.7405 30.6142 19.5251C30.5321 18.0482 29.8751 16.3251 28.5611 15.0943Z" fill="white"></path>
									</svg>
								</div>
							</a>
							<a href="#">
								<div class="whtsapp ml-11" id="whtsapp">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.0400391" width="45.0402" height="45" rx="4" fill="" />
										<path d="M28.9291 14.0528C30.2064 14.1845 31.8674 14.0528 32.7619 15.0988C33.7842 16.144 33.913 17.841 33.913 19.1476C34.04 20.7148 34.04 22.9367 34.04 24.3714C33.913 25.8096 34.04 27.5058 33.3996 28.8142C32.7628 30.2489 31.6116 30.7737 30.2064 30.9026C28.6715 31.0325 19.2171 31.0325 16.1518 30.9026C14.7458 30.7728 13.0848 30.7728 12.0624 29.5969C11.1679 28.5509 11.1679 26.9846 11.04 25.6789C11.04 24.1108 11.04 21.8898 11.04 20.3235C11.04 18.8861 11.04 17.1891 11.6787 15.8825C12.3182 14.5767 13.5955 14.3152 15.0007 14.1854C16.5338 14.0537 25.8603 13.9239 28.9282 14.0537L28.9291 14.0528ZM19.9846 18.4939V26.3299L27.0123 22.4119L19.9846 18.4939Z" fill="white" />
									</svg>
								</div>
							</a>
							<a href="#">
								<div class="instagram ml-11" id="instagram">
									<svg width="46" height="45" viewBox="0 0 46 45" fill="#402875" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.0805664" width="45.0402" height="45" rx="4" fill=""></rect>
										<path d="M28.8545 14.0625H16.5944C15.2101 14.0625 14.1555 15.1162 14.1555 16.4992V28.7483C14.1555 30.1313 15.2101 31.185 16.5944 31.185H28.8545C30.2387 31.185 31.2933 30.1313 31.2933 28.7483V16.4992C31.2933 15.1162 30.2387 14.0625 28.8545 14.0625ZM22.7244 27.7605C25.5587 27.7605 27.8657 25.5214 27.8657 22.8213C27.8657 22.3603 27.7998 21.8335 27.668 21.4383H29.1181V28.419C29.1181 28.7483 28.8545 29.0776 28.459 29.0776H16.9898C16.6603 29.0776 16.3307 28.8142 16.3307 28.419V21.3725H17.8467C17.7149 21.8335 17.649 22.2945 17.649 22.7554C17.5831 25.5214 19.8901 27.7605 22.7244 27.7605ZM22.7244 25.7848C20.8788 25.7848 19.4287 24.336 19.4287 22.5579C19.4287 20.7798 20.8788 19.331 22.7244 19.331C24.57 19.331 26.0201 20.7798 26.0201 22.5579C26.0201 24.4018 24.57 25.7848 22.7244 25.7848ZM29.0522 18.7383C29.0522 19.1334 28.7226 19.4627 28.3271 19.4627H26.4815C26.086 19.4627 25.7565 19.1334 25.7565 18.7383V16.9601C25.7565 16.565 26.086 16.2357 26.4815 16.2357H28.3271C28.7226 16.2357 29.0522 16.565 29.0522 16.9601V18.7383Z" fill="white"></path>
									</svg>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<div class="d-none bottom-footer">
		<div class="px-240 d-flex justify-content-between btn-footer align-center">
			<div class="mt-18">
				<p class="mb-0 OpenSans-600 text-white">
					Copyright&nbsp;© 2024 &nbsp;&nbsp; Pay Money | All Rights Reserved
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
		$(document).ready(() => {
			const loginBtn = $('#login-btn')

			loginBtn.on('click', () => {

				const email = $('#email_only').val()
				const pass = $('#password').val()

				loginBtn.html('Signing in........')

				if (email.length == 0) {
					toastr.error("Email is empty", "Field required", {
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
					loginBtn.html('Continue')
				} else if (pass.length == 0) {
					toastr.error("Password is empty", "Field required", {
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
					loginBtn.html('Continue')
				} else {
					$.ajax({
						url: '../app/backend/actions/login.php',
						type: 'post',
						dataType: 'json',
						data: {
							email: email,
							pass: pass
						},
						success: (res) => {
							if (res.header == 'error') {
								toastr.error("You dont have an account with us!!!", "Error", {
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
								loginBtn.html('Continue')
							} else if (res.header == 'signin') {
								toastr.success("Authentication successful!!!", "Signed in", {
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
									window.location = "../app/dashboard"
								}, 2000)
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