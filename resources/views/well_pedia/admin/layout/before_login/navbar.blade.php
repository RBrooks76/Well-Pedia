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
                        <img class="logo_img" src="/assets/img/logo.png" alt="img1">
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
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar_list align-items-center">
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ route('toServiceIndex') }}">TOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ route('toServiceCompany') }}">Company</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ route('toServiceNews') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="{{ route('toServiceContact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center btn_nav_item mx-auto" href="{{ route('toUserLogin') }}">MEMBER</a>
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
