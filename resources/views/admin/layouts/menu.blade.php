<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ asset('back/') }}/index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">defatech<sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Ana Sayfa</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            İçerik Yönetimi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('yazilar') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-columns"></i>
                <span>Blog Yazıları</span>
            </a>
            <div id="collapseTwo" class="collapse {{ request()->is('yazilar', 'yazilar/create') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Yazı İşlemleri:</h6>
                    <a class="collapse-item {{ request()->is('yazilar') ? 'active' : '' }}"
                        href="{{ route('yazilar.index') }}">Tüm Yazılar</a>
                    <a class="collapse-item {{ request()->is('yazilar/create') ? 'active' : '' }}"
                        href="{{ route('yazilar.create') }}">Yazı Oluştur</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ request()->is('kategoriler') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route("category.index") }}">
                <i class="fa fa-align-center" aria-hidden="true"></i>
                <span>Kategoriler</span>

            </a>

        </li>
        <li class="nav-item {{ request()->is('sayfalar') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree"
                aria-expanded="true" aria-controls="collapseTree">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Sayfalar</span>
            </a>
            <div id="collapseTree" class="collapse {{ request()->is('sayfalar', '') ? 'show' : '' }}"
                aria-labelledby="collapseTree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sayfa İşlemleri:</h6>
                    <a class="collapse-item {{ request()->is('sayfalar') ? 'active' : '' }}"
                        href="{{ route("page.index") }}">Tüm Sayfalar</a>
                    <a class="collapse-item {{ request()->is('yazilar/create') ? 'active' : '' }}"
                        href="{{ route('yazilar.create') }}">Sayfa Oluştur</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="{{ asset('back/') }}/login.html">Login</a>
                    <a class="collapse-item" href="{{ asset('back/') }}/register.html">Register</a>
                    <a class="collapse-item" href="{{ asset('back/') }}/forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="{{ asset('back/') }}/404.html">404 Page</a>
                    <a class="collapse-item" href="{{ asset('back/') }}/blank.html">Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('back/') }}/charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ asset('back/') }}/tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
        <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="{{ asset('back/') }}/img/undraw_rocket.svg"
                alt="...">
            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and
                more!</p>
            <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
        </div>

    </ul>
