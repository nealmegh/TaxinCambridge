<div class="container">
    <div class="navigation-tb">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div>
                <a href="#"> <img src="{{asset('images/2Frontend/logo.jpg')}}" alt="logo" />
                </a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right no-margin" id="menu-list">
                <li class="menu-fs menu-underline"><a href="#home" class="pagescroll">home</a>
                </li>
                <li class="menu-fs menu-underline"><a href="#services" class="pagescroll">services</a>
                </li>
                <li class="menu-fs menu-underline"><a href="#price" class="pagescroll"> price </a>
                </li>
                <!--    <li class="menu-fs menu-underline"><a href="#gallery" class="pagescroll"> gallery</a>
                    </li>  -->
                <li class="menu-fs menu-underline"><a href="#contact" class="pagescroll"> contact</a>
                </li>
                @if(Auth::user())
                <li class="menu-fs menu-underline">
                    <div class="dropdown">
                        <button class="dropbtn">{{Auth::user()->name.' '}}<i class="fas fa-angle-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/profile">Dashboard</a>
                            <a href="">
                                <form id="logout-form" method="post" action="{{route('logout')}}">
                                    @csrf

                                    <input class="logout" type="submit" value="logout">
                                    {{--<a id="logout" type="submit" data-toggle="tooltip" data-placement="top" title="Logout" >--}}
                                    {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
                                    {{--</a>--}}
                                </form>
                            </a>
                        </div>
                    </div>
                </li>
                @else
                    <li class="menu-fs menu-underline"><a href="/login"> Login/Register</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>