<body class="home blog halimthemes halimmovies" data-masonry="">
    <div style="padding: 1rem 0;">
        <header id="header">
            <div class="container">
                <div class="container" style="display: flex;justify-content: space-between; align-items: center;">
                    <div class="logo-img"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}"
                                alt=""></a></div>
                    <div
                        style="width: 580px;border: 1.4px solid rgba(255,255,255,.2);display: flex;border-radius: 100px;position: relative;">

                        <input autocomplete="off" id="keyword" class="search-input" type="text"
                            placeholder="Tìm kiếm phim hay"
                            style="border: none;outline: none;background-color: transparent;flex: 1;">

                        <div class="" id="resuft_search"
                            style="position: absolute;z-index: 100;width: 100%;background-color: #1b1515;top: 100%;padding: 0 1rem; margin-top: .5rem;border-radius: 5px;">


                        </div>
                    </div>
                    <div class="logo-img vnpay">
                        <form action="{{ url('vnpay') }}" method="post">
                            @csrf
                           <button style="background-color: transparent;border: none;outline: none;" type="submit"><img
                                 src="{{ asset('img/vnpay.png') }}" alt="vn-pay"></button>
                        </form>
   
                     </div>
                    
                </div>
            </div>
        </header>
    </div>
    <div class="navbar-container">
        <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
                <div class="navbar-header">

                    <div style="display: flex;justify-content: space-between;align-items: center;">
                        <div>
                            <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                               data-target="#halim" aria-expanded="false">
                               <span class="sr-only">Menu</span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                            </button>
                        </div>
                         <div class="vnpay_mb">
                            <form action="{{ url('vnpay') }}" method="post">
                                @csrf
                               <button style="background-color: transparent;border: none;outline: none;" type="submit"><img
                                     src="{{ asset('img/vnpay.png') }}" alt=""></button>
                            </form>
       
                         </div>
                     </div>

                </div>
                <div class="collapse navbar-collapse" id="halim">
                    <div class="menu-menu_1-container">
                        <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                            <li class="current-menu-item {{Request::segment(1)== '' ? 'active' : ''}}"><a title="Trang Chủ" href="{{ url('/') }}">Trang
                                    Chủ</a></li>
                            @foreach ($cate as $value)
                                <li class="{{Request::segment(2)== $value->slug_cate ? 'active' : ''}}"><a title="{{ $value->name_cate }}"
                                        href="{{ Route('danh-muc.show', [$value->slug_cate]) }}">{{ $value->name_cate }}</a>
                                </li>
                                <li>{{$value->movie_count}}</li>
                                @foreach ($value->movie as $item)
                                    <li>{{$item->id_movie}}</li>
                                @endforeach
                            @endforeach
                            <li class="mega dropdown {{Request::segment(1)== 'the-loai' ? 'active' : ''}}">
                                <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true">Thể loại phim<span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @foreach ($genre as $value)
                                        <li>
                                            <a title="{{ $value->name_genre }}"
                                                href="{{ Route('the-loai.show', [$value->slug_genre]) }}">{{ $value->name_genre }}
                                            </a>
                                                {{$value->movie_genre_count}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @if (Auth::check())
                                <li><a title="Đăng kí">Xin chào <span>{{ Auth::user()->name }}</span></a></li>
                                <li style="margin-top: 1rem;">
                                    <form action="{{ url('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Đăng xuất</button>
                                    </form>
                                </li>
                            @else
                                <li><a title="Đăng nhập" href="{{ url('dang-nhap') }}">Đăng nhập</a></li>
                                <li><a title="Đăng kí" href="{{ url('dang-ki') }}">Đăng kí</a></li>
                            @endif


                        </ul>
                    </div>

                </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
                <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
                <div id="mobile-user-login"></div>
            </div>
        </div>
    </div>
</body>
