<nav class="navbar navbar-expand-lg navbar-dark unique-color-dark fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand outline-none px-2" href="{{ url('/') }}">
            <img src="{{asset('mdb/img/logo7.png')}}" class="h-12 rounded-full z-depth-1" alt="Bamboo Blog Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-2">
                    <a href="/" class="nav-link outline-none">
                        Home
                    </a>
                </li>

                <li class="nav-item px-2">
                    <a href="/about" class="nav-link outline-none">
                        About
                    </a>
                </li>

                <li class="nav-item px-2">
                    <a href="/services" class="nav-link outline-none">
                        Services
                    </a>
                </li>

                <li class="nav-item px-2">
                    <a href="/posts" class="nav-link outline-none">
                        <i class="fas fa-blog"></i>
                        Posts
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item px-2">
                        <a class="nav-link waves-effect waves-ripple outline-none" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                @if (Route::has('register'))
                    <li class="nav-item px-2">
                        <a class="nav-link border-r-2 border-l-2 border-light-pink rounded-full py-2 px-4 waves-effect outline-none" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </li>
                @endif
                @else
                    <li class="nav-item px-2">
                        <a href="/home" class="nav-link waves-effect waves-ripple outline-none">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle outline-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarDropdown">
                            <a href="" class="dropdown-item text-dark rounded outline-none hover:shadow-md hover:bg-pink-500 hover-white hover:text-white">
                                <i class="fas fa-wrench mr-2"></i>
                                Account Settings
                            </a>
    
                            <a href="" class="dropdown-item text-dark rounded outline-none hover:shadow-md hover:bg-pink-500 hover-white hover:text-white">
                                <i class="fas fa-question-circle mr-2"></i>
                                Support
                            </a>
    
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-dark rounded outline-none hover:shadow-md hover:bg-pink-500 hover-white hover:text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt pr-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>