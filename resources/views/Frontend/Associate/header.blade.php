<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="{{asset("images/logo.png")}}" alt=""></a>
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    {{--<ul class="nav navbar-nav menu_nav justify-content-end">--}}
                        {{--@if(Auth::user())--}}
                        {{--<li class="nav-item active"><a class="nav-link" href="#"> My Account</a></li>--}}
                        {{--@else--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="/register">Register</a>--}}
                        {{--@endif--}}
                    {{--</ul>--}}

                    <ul class="navbar-right">
                        @if(Auth::user())
                            <li class="nav-item active"><a class="nav-link" href="{{route('userProfile')}}"> My Account</a></li>
                            <li><form id="logout-form" method="post" action="{{route('logout')}}">
                                    @csrf

                                    <input type="submit" value="logout">
                                    {{--<a id="logout" type="submit" data-toggle="tooltip" data-placement="top" title="Logout" >--}}
                                    {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
                                    {{--</a>--}}
                                </form>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="/register">Register</a>
                        @endif
                        <li class="nav-item">
                            <a href="#" style="color:white;"> <span class="fa-stack"><i class="fa fa-circle fa-stack-2x" style="color:blue;"></i><i class='fa fa-phone fa-stack-1x' style=''></i></span>(01223) 247 247</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>