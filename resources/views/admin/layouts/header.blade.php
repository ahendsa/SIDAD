<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('admin / images / logo - sm . svg') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26"> <span
                            class="logo-txt">Vuesy</span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26"> <span
                            class="logo-txt">Vuesy</span>
                    </span>
                </a>

            </div>

            <button type="button" class="btn btn-sm px-3 header-item vertical-menu-btn noti-icon">
                <i class="fa fa-fw fa-bars font-size-16"></i>
            </button>

            <form class="app-search d-none d-lg-block">

                <mar<marquee direction='left'>
                    <H3>SISTEM INFORMASI DATA ABSENSI DESA </H3>
                    </marquee>

            </form>


        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-block d-lg-none">
                <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-search icon-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <form class="p-2">

                    </form>
                </div>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        <span class="user-name">{{ Auth::guard('user')->user()->name }} <i
                                class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Selamat Datang {{ Auth::guard('user')->user()->name }}</h6>
                    <a class="dropdown-item" href="pages-profile.html"><i
                            class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>


                    <a class="dropdown-item" href="/logout"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Logout</span></a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle"
            aria-expanded="true" aria-controls="dashtoggle">
            <i class="bx bx-up-arrow-alt"></i>
        </a>
    </div>
</header>
