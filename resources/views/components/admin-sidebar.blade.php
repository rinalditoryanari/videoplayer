<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class='{{ Request::is("admin/dashboard") ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('dashboard-general-dashboard') }}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            
            <li class="menu-header">Data Akun</li>
            <li class='{{ Request::is("admin/tambah-akun") ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('admin/tambah-akun') }}">
                    <i class="fas fa-fire"></i><span>Tambah Akun</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'dataakun' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Akun</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/dataadnin') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('admin/dataadmin') }}">Akun Admin</a>
                    </li>
                    <li class="{{ Request::is('admin/datauser') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('admin/datauser') }}">Akun User</a>
                    </li>
                </ul>
            </li>
            

            <li class="menu-header">Video</li>
            <li class='{{ Request::is("admin/tambah-video") ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('admin/tambah-video') }}">
                    <i class="fas fa-fire"></i><span>Tambah Video</span>
                </a>
            </li>
            <li class='{{ Request::is("admin/datavideo") ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('admin/datavideo') }}">
                    <i class="fas fa-fire"></i><span>Daftar Video</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
