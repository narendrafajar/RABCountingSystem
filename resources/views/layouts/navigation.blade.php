<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        </div>
        <div>
        <a class="navbar-brand brand-logo" href="#">
            <img src="{{asset('images/RCS_logo.png')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="#">
            <img src="{{asset('images/fav_icon_rcs.png')}}" alt="logo" />
        </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text"><span id="ucapan"></span>, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
            <h3 class="welcome-sub-text">@yield('pagetitle')</h3>
        </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
    </div>
    </nav>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">{{__('Dashboard')}}</span>
            </a>
          </li>
          <li class="nav-item nav-category">{{__('Main Menu')}}</li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('proyek_index')}}">
              <i class="mdi mdi-briefcase menu-icon"></i>
              <span class="menu-title">{{__('Daftar Proyek')}}</span>
            </a>
          </li>
          <li class="nav-item nav-category">{{__('Pengaturan')}}</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-settings"></i>
                <span class="menu-title">{{__('Pengaturan Analisa')}}</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('analisa_pekerjaan_index')}}">{{__('Analisa Pekerjaan')}}</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('bahan_index')}}">{{__('Bahan')}}</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('jenis_bahan_index')}}">{{__('Jenis Bahan')}}</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('hsa_index')}}">{{__('Harga Satuan Alat')}}</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('hsp_index')}}">{{__('Harga Satuan Pekerja')}}</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="nav">
          <li class="nav-item">
            <form method="POST" action="{{route('logout')}}">
              @csrf
              <button type="submit" class="nav-link">
                <i class="mdi mdi-camera-timer menu-icon"></i> 
                <span class="menu-title">{{__('Keluar')}}</span>
              </button>
            </form>
          </li>
        </ul>
      </nav>