{{-- Sidebar --}}
<div id="sidebar" class="active" style="background-color: #293D35;">
    <div class="sidebar-wrapper active">

        <div class="sidebar-logo position-relative mt-4">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="logo" width="80px" height="auto">
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-logo position-relative mt-4">
            <div class="d-flex justify-content-center align-items-center">

                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                
                @if(Auth::check() && Auth::user()->role == 'masyarakat')
                    <li class="sidebar-item {{ request()->routeIs('masyarakat.welcome') && auth()->user()->role == 'masyarakat' ? 'active' : '' }}">
                        <a href="{{ route('masyarakat.welcome') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Welcome</span>
                        </a>
                    </li>
                @endif

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') && auth()->user()->role == 'admin' ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                @endif
                
                @if(Auth::check() && Auth::user()->role == 'walinagari')
                    <li class="sidebar-item {{ request()->routeIs('walinagari.dashboard') && auth()->user()->role == 'walinagari' ? 'active' : '' }}">
                        <a href="{{ route('walinagari.dashboard') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                @endif

                @if(Auth::check() && Auth::user()->role == 'masyarakat')
                    <li class="sidebar-item {{ request()->routeIs('syarat') ? 'active' : '' }}">
                        <a href="{{ route('syarat') }}" class='sidebar-link'>
                            <i class="bi bi-files"></i>
                            <span>Syarat Pengajuan</span>
                        </a>
                    </li>
                @endif

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="sidebar-title">Forms &amp; Tables</li>
                    <li class="sidebar-item has-sub {{ request()->routeIs(['listsktm', 'listsurpeng', 'listsku']) ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>List Pengajuan</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item {{ request()->routeIs('admin.listsktm') ? 'active' : '' }}">
                                <a href="{{ route('admin.listsktm') }}">SKTM</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('admin.listpot') ? 'active' : '' }}">
                                <a href="{{ route('admin.listpot') }}">Surat Penghasilan</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('admin.listsku') ? 'active' : '' }}">
                                <a href="{{ route('admin.listsku') }}">SKU</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(Auth::check() && Auth::user()->role == 'masyarakat')
                    <li class="sidebar-title">Forms &amp; Tables</li>
                    <li class="sidebar-item has-sub {{ request()->routeIs(['sktm', 'surpeng', 'sku']) ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Pengajuan Surat</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item {{ request()->routeIs('sktm') ? 'active' : '' }}">
                                <a href="{{ route('masyarakat.sktm') }}">SKTM</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('surpeng') ? 'active' : '' }}">
                                <a href="{{ route('surpeng') }}">Surat Penghasilan</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('sku') ? 'active' : '' }}">
                                <a href="{{ route('sku') }}">SKU</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="sidebar-title">Tables</li>

                @if(Auth::check() && Auth::user()->role == 'masyarakat')
                    <li class="sidebar-item {{ request()->routeIs('listpeng') ? 'active' : '' }}">
                        <a href="{{ route('listpeng') }}" class='sidebar-link'>
                            <i class="bi bi-files"></i>
                            <span>List Pengajuan</span>
                        </a>
                    </li>
                @endif

                @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'walinagari'))
                    <li class="sidebar-item {{ request()->routeIs('listsuker') ? 'active' : '' }}">
                        <a href="{{ route('listsuker') }}" class='sidebar-link'>
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                            <span>List Surat Keluar</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Akun</li>

                    <li class="sidebar-item has-sub {{ request()->routeIs(['admin', 'wali', 'masyarakat']) ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Kelola Akun</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item {{ request()->routeIs('admin') ? 'active' : '' }}">
                                <a href="{{ route('admin.listAdmin') }}">Admin</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('wali') ? 'active' : '' }}">
                                <a href="{{ route('admin.listWali') }}">Wali Nagari</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('masyarakat') ? 'active' : '' }}">
                                <a href="{{ route('admin.listMas') }}">Masyarakat</a>
                            </li>
                        </ul>
                    </li>
                @endif
                
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-blue">Logout</button>
                    </form>
                </li>

                {{-- <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="sidebar-link" style="background: none; border: none; padding: 0;">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>                         --}}
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebarLinks = document.querySelectorAll('.sidebar-link');
        var currentUrl = window.location.href;

        // Function to set active class
        function setActiveLink() {
            sidebarLinks.forEach(function (link) {
                if (link.href === currentUrl) {
                    link.parentElement.classList.add('active');
                    var parentSubMenu = link.closest('.has-sub');
                    if (parentSubMenu) {
                        parentSubMenu.classList.add('active');
                    }
                } else {
                    link.parentElement.classList.remove('active');
                    var parentSubMenu = link.closest('.has-sub');
                    if (parentSubMenu) {
                        parentSubMenu.classList.remove('active');
                    }
                }
            });
        }

        // Initial setting of active link
        setActiveLink();

        // Event listener for click
        sidebarLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                // Prevent default link behavior to allow the active class to be set
                event.preventDefault();

                // Update the URL without reloading the page
                window.history.pushState({}, '', link.href);

                // Set the active class
                setActiveLink();

                // Navigate to the link
                window.location.href = link.href;
            });
        });
    });
</script>
