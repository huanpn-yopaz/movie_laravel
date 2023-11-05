<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keyword" content="@yield('keyword')">
   <title>@yield('title')</title>
   <link rel="icon" href="{{url('img/logo.jpg')}}">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/baby.css')}}">
   <link rel="stylesheet" href="{{asset('css/lable.css')}}">
   
</head>
<style>
   img {
      width: 100%;
      height: auto;
   }

   .logo-img {
      max-width: 110px;
   }

   .search-input {
      padding: .8rem 1.8rem;
   }
   @media (min-width: 564px) {
      
      .vnpay_mb{
         display: none;
      }
     
      .search-input {
         padding: .5rem 1rem;
      }
   }
   @media (max-width: 564px) {
      .logo-img {
         max-width: 60px;
      }
      .vnpay{
         display: none;
      }
      .vnpay_mb{
         max-width: 70px;
      }
      .search-input {
         padding: .5rem 1rem;
      }
   }
</style>

<body>
   @include('page.header')
   @yield('content')
    @include('page.footer')
      <script src="https://code.jquery.com/jquery-3.7.1.js"
         integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
         <script>
            $('#keyword').keyup(function(){
                var query =$(this).val()
                if(query != ''){ 
                    $.ajax({
                        url:"{{url('search')}}",
                        method:"GET",
                        data:{query:query},
                        success:function(data){
                            $('#resuft_search').fadeIn();
                            $('#resuft_search').html(data);
                        }
                    })
                }
            else{
                $('#resuft_search').html('');
            }
            })
   //  $(document).on('click','li',function(){
   //      $('#keyword').val($(this).text());
   //      $('#resuft_search').fadeOut();
   //  })
            
        </script>
         <script>
            $(document).ready(function() {
                $('[title="Hosted on free web hosting 000webhost.com. Host your own website for FREE."]').hide();
            });
        </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
         integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
         crossorigin="anonymous"></script>
      <script src="{{asset('js/newowl.carousel.min.js')}}"></script>
      <script>
         jQuery(document).ready(function ($) {
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({ loop: true, margin: 4, autoplay: true, autoplayTimeout: 2000, autoplayHoverPause: true, nav: true, navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'], responsiveClass: true, responsive: { 0: { items: 2 }, 480: { items: 3 }, 600: { items: 4 }, 1000: { items: 4 } } })
         });
      </script>

   </div>
</body>

</html>