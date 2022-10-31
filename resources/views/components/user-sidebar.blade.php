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
            <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Your Videos</li>
            <li class='{{ Request::is('tambah-video') ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('/tambah-video') }}"><i class="fa-solid fa-arrow-up-from-bracket"></i></i><span>Upload</span></a>
            </li>
            <li class='{{ Request::is('your-video') ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('your-video') }}">
                    <i class="fas fa-play-circle"></i><span>Daftar Video</span></a>
            </li>
        </ul>
    </aside>
</div>
