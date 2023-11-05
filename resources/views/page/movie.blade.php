@section('title')
Phim {{$movie->name_movie}}
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
                      <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{url('/')}}">Phim hay</a> »
                               <span><a href="{{Route('danh-muc.show',[$movie->cate->slug_cate])}}">{{$movie->cate->name_cate}}</a> » <span class="breadcrumb_last"
                                     aria-current="page">{{$movie->name_movie}}</span></span></span></span></div>
                   </div>
                </div>
             </div>
             <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
             </div>
          </div>
          <div>
             {!!$movie->video_movie!!}
          </div>
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
                  <a class="halim-thumb" href="{{Route('chi-tiet-phim.show',[$value->slug_movie])}}" title="{{$value->name_movie}}">
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
