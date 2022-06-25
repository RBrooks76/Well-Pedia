<header>
    <div class="section_container container_left_helper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Container wrapper -->
            <div class="container-fluid px-0">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-0 pt-0 mt-lg-0" href="#">
                        <img class="logo_img" src="/assets/img/logo.png" alt="img">
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar_list align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('toServiceIndex') }}">TOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('toServiceCompany') }}">Company</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('toServiceNews') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('toServiceContact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn_nav_item" href="{{ route('toUserLogin') }}">MEMBER</a>
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
