<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-4 pb-4 mb-4 d-flex">
        <div class="image">
            <img src="{{ asset('asset/logo.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Admin BetaTudia?</a>
        </div>
    </div>



    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ Route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-home"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{Route('admin.contributors')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Kontributor') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{Route('admin.testimonies')}}" class="nav-link">
                    <i class="nav-icon fas fa-message"></i>
                    <p>
                        {{ __('Testimoni') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ Route('admin.kabupaten.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-map"></i>
                    <p>
                        {{ __('Kabupaten') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ Route('admin.restaurant.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-utensils nav-icon"></i>
                    <p>
                        {{ __('Tempat Makan') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ Route('admin.accommodation.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-hotel nav-icon"></i>
                    <p>
                        {{ __('Akomodasi') }}
                    </p>
                </a>
            </li>


            {{-- Wisata --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-map-pin"></i>
                    <p>
                        Destinasi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ Route('admin.destinationCategory.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Kategori') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ Route('admin.destination.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Destinasi') }}</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Post --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-newspaper nav-icon"></i>
                    <p>
                        Info Wisata
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.blogCategory.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ Route('admin.blog.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                </ul>
            </li>



        </ul>
    </nav>
</div>
