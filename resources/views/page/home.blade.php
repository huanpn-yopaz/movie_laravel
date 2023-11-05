@section('keyword')Trang chủ phim hay phim moi phim hot @endsection
@section('title')Trang chủ@endsection
@extends('app')
@section('content')
@if (Cookie::has('user'))
    {{Cookie::get('user')}}
@endif
<div class="container">
    <div class="row container" id="wrapper">
       <div class="halim-panel-filter">
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       <div class="col-xs-12 carausel-sliderWidget">
          <section id="halim-advanced-widget-4">
             <div class="section-heading">
                <a title="Phim Chiếu Rạp">
                   <span class="h-text">Phim mới nhất</span>
                </a>
                <ul class="heading-nav pull-right hidden-xs">
                   <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                      data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Laravel"></span>
                   </li>
                </ul>
             </div>
             <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
               @foreach ($free as $value)
             
               <article class="col-md-3 col-sm-4 col-xs-6 thumb grid-item post-38424">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{Route('chi-tiet-phim.show',[$value->slug_movie])}}" title="{{$value->name_movie}}">
                        <figure><img class="lazy img-responsive"
                              src="{{asset('img/'.$value->img_movie)}}"
                              alt="{{$value->slug_movie}}"></figure>
                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                              aria-hidden="true"></i>{{$value->cate->name_cate}}</span>
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
          </section>
          
       </div>

       <div class="col-xs-12 carausel-sliderWidget">
         <section id="halim-advanced-widget-4">
            <div class="section-heading">
               <a title="Phim Chiếu Rạp">
                  <span class="h-text">Phim chiếu rạp</span>
               </a>
               <ul class="heading-nav pull-right hidden-xs">
                  <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                     data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Laravel"></span>
                  </li>
               </ul>
            </div>
            <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
              @foreach ($vip as $value)
            
              <article class="col-md-3 col-sm-4 col-xs-6 thumb grid-item post-38424">
                 <div class="halim-item">
                    <a class="halim-thumb" href="{{Route('chi-tiet-phim.show',[$value->slug_movie])}}" title="{{$value->name_movie}}">
                       <figure><img class="lazy img-responsive"
                             src="{{asset('img/'.$value->img_movie)}}"
                             alt="{{$value->slug_movie}}"></figure>
                       <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                             aria-hidden="true"></i>{{$value->cate->name_cate}}</span>
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
         </section>
         
      </div>
    </div>
 </div>

@endsection
