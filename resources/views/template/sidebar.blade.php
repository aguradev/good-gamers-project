<nav class="drawer drawer-mobile w-auto" id="sidebar-home">
    <div class="drawer-side">
        <ul class="menu text-base-content sidebar-content w-72">
            <img src="{{ url('storage/assets/logo.png') }}" class="logo-img">

            {{-- jika sudah login --}}
            @auth
                <div class="profile-section">
                    <div class="avatar">
                        <div class="w-8 rounded-full">
                            @if (auth()->user()->profile_image == 'profile.png')
                                <img src="{{ url('storage/assets/profile.png') }}" alt="profile-img">
                            @else
                                <img src="{{ url('storage/' . auth()->user()->profile_image) }}" alt="profile-img">
                            @endif
                        </div>
                    </div>
                    <div class="profile-data">
                        <h6 class="name-user">{{ auth()->user()->fullName }}</h6>
                    </div>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0">
                            <i class='bx bx-chevron-down'></i>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 bg-gray-900 rounded-box mt-4">
                            <li><a href="{{ url('profile', auth()->user()->username) }}"><i
                                        class='bx bxs-user'></i>Profile</a></li>
                            <li>
                                <form action="{{ url('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"><i class='bx bx-power-off mr-2'></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <a href="{{ url('/') }}" class="btn btn-secondary mb-8">Login</a>
            @endauth




            <h6 class="header-menu">menu</h6>
            <li class="sidebar-item">
                <a href="/" class="sidebar-link @if (Request::is('/')) active @endif">
                    <i class='icon-menu bx bxs-home mr-2'></i>Home</a>
            </li>
        </ul>
        @auth
            @if (auth()->user()->roles == 'admin')
                <ul class="menu text-base-content sidebar-content w-72 menu-admin">
                    <h6 class="header-menu">ADMIN MENU</h6>
                    <div class="dropdown-sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link dropdown-link-game" id="game-data">
                                <i class='bx bx-list-ul mr-2'></i>Game Data</a>
                        </li>
                        <ul class="dropdown-menu-sidebar hidden">
                            <li class="sidebar-item">
                                <a href="{{ route('gamelist-data.index') }}"
                                    class="sidebar-link @if (Request::is('admin/gamelist-data')) active @endif">
                                    <i class='bx bx-list-ul mr-2'></i>Game List Table</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('category-games.index') }}"
                                    class="sidebar-link @if (Request::is('admin/category-games')) active @endif">
                                    <i class='bx bx-list-ul mr-2'></i>Category Games</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('galleries.index') }}"
                                    class="sidebar-link  @if (Request::is('admin/galleries')) active @endif" id="game-data">
                                    <i class='bx bx-list-ul mr-2'></i>Gallery</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown-sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link dropdown-link-game" id="create-menu">
                                <i class='bx bx-list-ul mr-2'></i>Create Menu</a>
                        </li>
                        <ul class="dropdown-menu-sidebar hidden">
                            <li class="sidebar-item">
                                <a href="{{ route('form-category') }}"
                                    class="sidebar-link @if (Request::is('admin/create-category')) active @endif">
                                    <i class='bx bx-list-plus mr-2'></i>Create Category</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('gamelist-data.create') }}"
                                    class="sidebar-link @if (Request::is('admin/gamelist-data/create')) active @endif">
                                    <i class='bx bx-list-plus mr-2'></i>Create Games List</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('payment-gateway.index') }}"
                                    class="sidebar-link @if (Request::is('admin/payment-gateway')) active @endif"">
                                    <i class='bx bx-list-plus mr-2'></i>Create Payment Gateway</a>
                            </li>
                        </ul>
                    </div>
                    <li class="sidebar-item">
                        <a href="{{ route('users-account.index') }}"
                            class="sidebar-link @if (Request::is('admin/users-account')) active @endif">
                            <i class='icon-menu bx bxs-user-account mr-2'></i>Users Account</a>
                    </li>
                </ul>
            @endif
        @endauth
    </div>
</nav>
