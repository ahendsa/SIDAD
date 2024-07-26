  <div class="vertical-menu">


      <!-- LOGO -->
      <div class="navbar-brand-box">
          <a href="index.html" class="logo logo-dark">
              <span class="logo-sm">
                  <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26">
              </span>
              <span class="logo-lg">
                  <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26"> <span
                      class="logo-txt">SIDAD</span>
              </span>
          </a>

          <a href="index.html" class="logo logo-light">
              <span class="logo-sm">
                  <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26">
              </span>
              <span class="logo-lg">
                  <img src="{{ asset('admin/images/logo-sm.svg') }}" alt="" height="26"> <span
                      class="logo-txt">SIDAD</span>
              </span>
          </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
          <i class="fa fa-fw fa-bars"></i>
      </button>

      <div data-simplebar class="sidebar-menu-scroll">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title" data-key="t-menu">Menu</li>

                  <li>
                      <a href="/dashboardadmin">
                          <i class="bx bx-home-circle nav-icon"></i>
                          <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                      </a>
                  </li>



                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i class="bx bx-shield-quarter nav-icon"></i>
                          <span class="menu-item" data-key="t-ecommerce">Menu Utama</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">

                          <li><a href="/departemen" data-key="t-products">Data Kecamatan</a></li>
                          <li><a href="/cabang" data-key="t-products">Data Desa</a>
                          <li><a href="/karyawan" data-key="t-products">Data Aparatur</a>
                      </ul>

                  </li>
                  <li>
                      <a href="/presensi/monitoring">
                          <i class="bx bx-award nav-icon"></i>
                          <span class="menu-item" data-key="t-dashboard">Monitoring Absensi</span>
                      </a>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i class="bx bx-file nav-icon"></i>
                          <span class="menu-item" data-key="t-ecommerce">Laporan</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="/presensi/laporan" data-key="t-products">Laporan / Orang</a></li>
                          <li><a href="/presensi/rekap" data-key="t-products">Laporan Semua </a></li>
                  </li>
              </ul>

              <li>
                  <a href="javascript: void(0);" class="has-arrow">
                      <i class="bx bx-pencil nav-icon"></i>
                      <span class="menu-item" data-key="t-ecommerce">Seting</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="/konfigurasi/kantor" data-key="t-products">Lokasi Kantor</a></li>
              </li>
              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
