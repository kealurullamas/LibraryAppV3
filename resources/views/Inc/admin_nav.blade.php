<!------ Include the above in your HEAD tag ---------->
<div id="flipkart-navbar">
        <div class="container">
            <div class="row row1">
                <ul class="largenav pull-right">
                   
              
                    @guest
                    @endguest
                    @auth('admin')

                        <li class="upper-links"><a class="links" href="{{route('admin_view')}}">Home</a></li>
                        <li class="upper-links dropdown">
                            <a href="#" class="links" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
    
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="profile-links" href="{{route('admin_view')}}">Dashboard</a>
                                </li>
                                    
                                <li>
                                    <a class="profile-links" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
    
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
            <div class="row row2">
                <div class="col-sm-2">
                    <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ SHL-ARC</span></h2>
                    <h1 style="margin:0px;"><span class="largenav">SHL-ARC</span></h1>
                </div>
            
               
            </div>
        </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <div class="container" style="background-color: #670000;  padding-top: 0.75px;">
            <span class="sidenav-heading">SHL-ARC</span>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        </div>
        <a href="{{route('index')}}">Home</a>
        <a href="{{route('books.index')}}">Books</a>
        <a href="{{route('about')}}">About Us</a>
        <a href="{{route('faq')}}">FAQ</a>
        <a href="">Login</a>
        <a href="">Register</a>
    </div>
    </div>