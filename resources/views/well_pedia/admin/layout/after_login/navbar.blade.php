<header>
    <div class="section_container container_left_helper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light">
            <!-- Container wrapper -->
            <div class="container-fluid px-0">
                <!-- Toggle button -->
                <div class="d-flex d-xl-none py-4 pe-3 justify-content-between w-100">
                    <!-- Navbar brand -->
                    <a class="navbar-brand" href="#">
                        <img class="logo_img" src="/assets/img/logo.png" alt="img">
                    </a>

                    <button class="navbar-toggler" onclick="this.children[0].classList.toggle('fa-times')"
                        type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars fa-2x"></i>

                    </button>
                </div>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand d-none d-xl-block mt-0 pt-0 mt-xl-0" href="#">
                        <img class="logo_img" src="/assets/img/logo.png" alt="img">
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar_list navbar_admin_login">
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminVideo') }}">動画管理</a>
                        </li>
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminKokoro') }}">Kokoro管理</a>
                        </li>
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminContent') }}">コンテンツ管理</a>
                        </li>
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminStaff') }}">スタッフ管理</a>
                        </li>
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminClient') }}">クライアント管理</a>
                        </li>
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminNews') }}">ニュース管理</a>
                        </li>
                        @if($_SESSION['role'])
                        <li class="nav-item nav_item_md">
                            <a class="nav-link primary_link text-center" href="{{ route('toAdminList') }}">ユーザー管理</a>
                        </li>
                        @endif
                        <li class="nav-item nav_item_md">
                            <a class="nav-link   text-center btn_be_action lg_size font-weight-bold justify-content-center action_light h-100 d-flex align-items-center mx-auto"
                                href="{{ route('onAdminLogout') }}">
                                <svg style="margin-right: .7rem" xmlns="http://www.w3.org/2000/svg" width="20.571"
                                    height="18" viewBox="0 0 20.571 18">
                                    <path id="Icon_open-account-logout" data-name="Icon open-account-logout"
                                        d="M7.714,0V2.571H18V15.429H7.714V18H20.571V0ZM5.143,5.143,0,9l5.143,3.857V10.286H15.429V7.714H5.143Z" />
                                </svg>

                                ログアウト</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </div>
</header>
