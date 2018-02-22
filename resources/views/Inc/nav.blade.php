
      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{route('index')}}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  <li class="{{Request::segment(1) === 'index' ? 'active' :null}}"><a href="{{route('index')}}">Home</a></li>
                  <li class="{{Request::segment(1) === 'about' ? 'active' :null}}"><a href="{{route('about')}}">About Us</a></li>
                  <li class="{{Request::segment(1) === 'contact' ? 'active' :null}}"><a href="{{route('contact')}}">Contact</a></li>
                  <li class="{{Request::segment(1) === 'books' ? 'active' :null}}"><a href="{{route('books.index')}}">Books</a></li>
                  <li class="{{Request::segment(1) === 'faq' ? 'active' :null}}"><a href="{{route('faq')}}">Faq</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <notification v-bind:notifications="notifications"></notification>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                    
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>