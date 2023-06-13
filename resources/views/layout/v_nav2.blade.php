    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a href="{{ route('admin') }}">Dashboard</a></li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Peserta</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{ route('admin/peserta') }}">Data Peserta</a></li>
                                        <li><a href="{{ route('admin/pesertabelumlulus') }}">Data Peserta Tidak
                                                Lulus Pelatihan</a></li>
                                        <li><a href="{{ route('admin/pesertalulus') }}">Data Peserta Lulus Pelatihan</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Pelatihan</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{ route('admin/pelatihan') }}">Data Pelatihan</a></li>
                                        <li><a href="{{ route('admin/galeri') }}">Galeri</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('admin/profil') }}">Profil</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="{{ route('admin') }}">Dashboard</a>
                        </li>
                        <li><a data-toggle="tab" href="#peserta">Peserta</a>
                        </li>
                        <li><a data-toggle="tab" href="#pelatihan">Pelatihan</a>
                        </li>
                        <li><a href="{{ route('admin/pendaftaran') }}">Pendaftaran</a>
                        </li>
                        <li><a href="{{ route('admin/profil') }}">Profil</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="peserta" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('admin/peserta') }}">Data Peserta</a>
                                </li>
                                <li><a href="{{ route('admin/pesertabelumlulus') }}">Data Peserta Tidak Lulus Pelatihan</a>
                                </li>
                                <li><a href="{{ route('admin/pesertalulus') }}">Data Peserta Lulus Pelatihan</a>
                                </li>
                            </ul>
                        </div>
                        <div id="pelatihan" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('admin/pelatihan') }}">Data Pelatihan</a>
                                </li>
                                <li><a href="{{ route('admin/galeri') }}">Galeri</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
