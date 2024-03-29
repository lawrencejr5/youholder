        <header class="main-header">
            <!-- Logo -->
            <div class="full-width">

                <a href="" class="logo pt-6 text-decoration-none">
                    <span class="logo-mini"><b>Yield</b></span>
                    <img src="/youholder/public/logos/yield-logo.png" width="150px" height="auto" class="company-logo">
                </a>
            </div>

            <div class="navbar navbar-static-top p-0">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle text-decoration-none" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="mobile-width">
                    <a href="" class="mobile-logo">
                        <span class="logo-lg f-13"><b>Yield</b></span>
                    </a>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="javascript:void(0)" class="f-14 text-decoration-none me-3" data-bs-toggle="dropdown">
                                <img src=../public/uploads/user-profile/273.jpg class="user-image" alt="User Image">
                                <span class="hidden-xs">Admin <?= $fname ?></span>
                            </a>

                            <ul class="dropdown-menu mt-3">
                                <li class="user-header">
                                    <img src=../public/uploads/user-profile/273.jpg class="img-circle mt-3" alt="User Image">
                                    <p>
                                        <small>Email: <?= $email ?></small>
                                    </p>
                                </li>

                                <li class="user-footer py-3">
                                    <div class="pull-left">
                                        <a href="../../dashboard/" class="profile-btn">User dashboard</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../logout/" class="profile-btn">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>