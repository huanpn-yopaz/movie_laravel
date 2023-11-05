@section('title')
    {{$movie->name_movie}}
@endsection
@extends('app')
@section('content')
<div class="detail-movie-note">
    <div class="container">
     <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
           <div class="panel-heading">
              <div class="row">
                 <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{url('/')}}">Laravel</a> » <span><a href="{{Route('danh-muc.show',[$movie->cate->slug_cate])}}">{{$movie->cate->name_cate}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->name_movie}}</span></span></span></span></div>
                 </div>
              </div>
           </div>
           <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
              <div class="ajax"></div>
           </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
           <section id="content" class="test">
              <div class="clearfix wrap-content">
                
                 <div class="halim-movie-wrapper container">
                    
                    <div class="movie_info col-xs-12">
                       <div class="movie-poster col-md-3">
                          <img class="movie-thumb" src="{{asset('img/'.$movie->img_movie)}}" alt="{{$movie->slug_movie}}">
                          <div class="bwa-content" style="display: flex;">
                             <div class="loader"></div>
                             <div>
                                <a href="{{($movie->status_movie == 0) ? Route('xem-phim.show',[$movie->slug_movie]) : Route('xem-phim-vip.show',[$movie->slug_movie])}}" class="bwac-btn">
                                   <div style="transform: translateX(-7px);"><i class="fa-regular fa-circle-play"></i></div>
                                </a>
                             </div>
                          </div>
                       </div>
                       <div class="film-poster col-md-9">
                          <h1 class="movie-title" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->name_movie}}</h1>
                          <h2 class="movie-title title-2" style="font-size: 11px;">{{$movie->cate->name_cate}}</h2>
                          <ul class="list-info-group">
                             <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">HD</span><span class="episode">Vietsub</span></li>
                             <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">{{$movie->point}}</span></li>
                             <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->time}} Phút</li>
                             <li class="list-info-group-item"><span>Thể loại</span> : <a>{{$movie->cate->name_cate}}</a></li>
                             <li class="list-info-group-item"><span>Ngày cập nhật</span> : <a>{{ $movie->updated_at->diffForHumans()}}</a></li>
                             <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : {{$movie->people_movie}}</li>
                           <li class="list-info-group-item"><span>Từ khóa phim</span> : 
                              @php
                                  $tags=explode(',',$movie->tags_movie)
                              @endphp
                              @foreach ($tags as $value_tag)
                                  
                              <a href="{{url('tu-khoa',[$value_tag])}}">{{$value_tag}}</a>
                              @endforeach
                           </li>
                          </ul>
                          <div class="movie-trailer hidden"></div>
                       </div>
                    </div>
                 </div>
                 
                 <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                 </div>
                 <div class="entry-content container">
                    <div class="video-item halim-entry-box">
                       <article id="post-38424" class="item-content">
                        <a>{{$movie->name_movie}}</a> - {{$movie->cate->name_cate}}:
                          <p>{{$movie->desc_movie}}</p>
                          <div class="fb-comments" data-href="https://huanadmin.000webhostapp.com" data-width=""
                            data-numposts="5"></div>
                            <div id="fb-root" style="color: #fff"></div>
                        <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"
                            nonce="vz2yCzPx"></script>
                       </article>
                    </div>
                 </div>
              </div>
           </section>
           
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
     </div>
    </div>
 </div>
 <div class="container">
    <section class="related-movies">
     <div id="halim_related_movies-2xx" class="wrap-slider">
        <div class="section-bar clearfix">
           <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
        </div>
        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
           @foreach ($same as $value)
           <article class="thumb grid-item post-38498">
              <div class="halim-item">
                 <a class="halim-thumb" href="{{ Route('chi-tiet-phim.show',[$value->slug_movie])}}" title="{{$value->name_movie}}">
                    <figure><img class="lazy img-responsive" src="{{asset('img/'.$value->img_movie)}}" alt="{{$value->slug_movie}}" title="{{$value->name_movie}}"></figure>
                    <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->cate->name_cate}}</span> 
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                       <div class="halim-post-title ">
                          <p class="entry-title">{{$value->name_movie}}</p>
                          
                       </div>
                    </div>
                 </a>
              </div>
           </article>
           @endforeach
        </div>
        
     </div>
  </section>
 </div>
@endsection
