<!------ Include the above in your HEAD tag ---------->
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="{{route('index')}}">Home</a></li>
                <li class="upper-links"><a class="links" href="{{route('books.index')}}">Books</a></li>
                <li class="upper-links"><a class="links" href="{{route('about')}}">About Us</a></li>
                <li class="upper-links"><a class="links" href="{{route('faq')}}">FAQ</a></li>
                @guest
                <li class="upper-links"><a class="links" href="{{route('login')}}">Login</a></li>
                <li class="upper-links"><a class="links" href="{{route('register')}}">Register</a></li>
             
                @else
                    <notification v-bind:notifications="notifications"></notification>
                    <li class="upper-links dropdown">
                        <a href="#" class="links" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu">
                            <li>
                                <a class="profile-links" href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                                
                            <li>
                                <a class="profile-links" href="{{ route('logout') }}"
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
                <!--
                <li class="upper-links dropdown"><a class="links" href="http://clashhacks.in/">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="http://yazilife.com/">Link</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://hacksociety.tech/">Link</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">Link</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">Link</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">Link</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">Link</a></li>
                        <li class="profile-li"><a class="profile-links" href="http://clashhacks.in/">Link</a></li>
                    </ul>
                </li>
-->
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ SHL-ARC</span></h2>
                <h1 style="margin:0px;"><span class="largenav">SHL-ARC</span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-10 col-xs-11">
                <div class="row">
                    {!!Form::open(['action'=>'BooksController@search','method'=>'POST'])!!}
                        {{Form::text('book','',['placeholder'=>'Search for a book or author...','class'=>'flipkart-navbar-input col-xs-11'])}}
                        <button class="flipkart-navbar-button col-xs-1">
                            <svg width="15px" height="15px">
                                <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                            </svg>
                        </button>
                    {!!Form::close()!!}
                </div>
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