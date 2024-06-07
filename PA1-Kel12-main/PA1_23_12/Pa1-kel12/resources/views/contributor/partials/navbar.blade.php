<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ Route('welcome') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                @php
                    $profileImage = auth('contributor')->user()->image;
                @endphp

                @if ($profileImage)
                    <img src="{{ asset('storage/' . $profileImage) }}" alt="Profile Picture" width="30"
                        height="30" class="rounded-circle mr-2">
                @else
                    <img src="{{ asset('Template/dist/img/profile.jpeg') }}" alt="Default Profile Picture"
                        width="30" height="30" class="rounded-circle mr-2">
                @endif
                {{ auth('contributor')->user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="{{ route('contributor.profile.show') }}" class="dropdown-item">
                    <i class="mr-2 fas fa-file"></i>
                    {{ __('My profile') }}
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('contributor.logout') }}">
                    @csrf
                    <a href="{{ route('contributor.logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="mr-2 fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
