@extends('frontend.main_master')
@section('content')
@php 
$countries=DB::table('countries')->orderBy('id','ASC')->get();
@endphp

<style>
   .bg-gradient-primary {
    background-color: #4e73df;
    background-image: linear-gradient(
180deg,#4e73df 10%,#224abe 100%);
    background-size: cover;
}

</style>

<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-mobile-search">
                  <div class="row">
                     <div class="col-md-12">   
                        <form class="mobile-search">
                           <div class="input-group">
                             <input type="text" placeholder="Search for..." class="form-control">
                               <div class="input-group-append">
                                 <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                               </div>
                           </div>
                        </form>   
                     </div>
                  </div>
               </div>
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                              </a>
                           </div>
                           <h6>Participating Countries</h6>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category">
                        @foreach($countries as $item)
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="{{asset($item->country_image)}}" alt="">
                                    <h6>{{$item->country_name}}</h6>
                                 </a>
                              </div>
                           </div>
                        @endforeach()
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               <!-- top live -->
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="">
                              View all 
                              </a>
                           </div>
                           <h6>Live Sports</h6>
                        </div>
                     </div>
               <?php $livegames = App\Models\liveGame::OrderBy('id','desc')->where('type',0)->limit(8)->get(); ?>
                @foreach($livegames as $item)
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="#"> <iframe  src="https://www.youtube.com/embed/{{$item->embed_code}}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; " allowfullscreen></iframe></a>
                              <div class="time">Live</div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="{{URL::to('view/post/'.$item->id)}}">{{$item->title}}</a>
                              </div>
                              <div class="video-page text-success">
                                 {{$item->category->sports_category_title}} <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach()
                  </div>
               </div>
               <!-- Also Live -->
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Also Live</h6>
                        </div>
                     </div>
                <?php $livegames = App\Models\liveGame::OrderBy('id','desc')->where('type',1)->get(); ?>
                <div class="col-md-12">
                @foreach($livegames as $item)
                <div class="owl-carousel owl-carousel-category">
                          <div class="video-card">
                              <div class="video-card-image">
                                 <a href="#"> <iframe  src="https://www.youtube.com/embed/{{$item->embed_code}}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; " allowfullscreen></iframe></a>
                              </div>
                              <div class="video-card-body">
                              <div class="video-title">
                                 <a href="{{URL::to('view/post/'.$item->id)}}">{{$item->title}}</a>
                              </div>
                              <div class="video-page text-success">
                                 {{$item->category->sports_category_title}} <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                           </div>
                           </div>
                        </div>
                  @endforeach()
                     </div>
                  </div>
               </div>
               <hr>
      
               <!-- sports -->
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                              </a>
                           </div>
                           <h6>Sports</h6>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category">
                   <?php $sports = App\Models\Sport::OrderBy('id','desc')->get(); ?>
                   @foreach($sports  as $item)
                           <div class="item">
                              <div class="category-item">
                                 <a href="{{URL::to('view/post/'.$item->id)}}">
                                    <img class="img-fluid" src="{{asset($item->sports_category_image)}}" alt="">
                                    <h6>{{$item->sports_category_title}}</h6>
                                 </a>
                              </div>
                           </div>
                     @endforeach()
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
                <!-- Also Live -->
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Upcoming Games</h6>
                        </div>
                     </div>
                     <div class="owl-carousel owl-carousel-category">
                           
                <?php $upcominggame = App\Models\UpcomingGame::OrderBy('id','desc')->get(); ?>
                @foreach($upcominggame as $row)
                       <div class="item">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="#"><img class="img-fluid" src="{{asset($row->sports_image)}}" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">{{$row->title}}</a>
                              </div>
                              <div class="video-page text-success">
                                 {{$row->category->sports_category_title}}  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                           </div>
                        </div>
                       </div>
                @endforeach
                     </div>
                     
                  </div>
               </div>
               <hr class="mt-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>SPoncers</h6>
                        </div>
                     </div>
                     <div class="owl-carousel owl-carousel-category">
                   <?php $sponcer = App\Models\Sponcer::OrderBy('id','desc')->get(); ?>
                      @foreach($sponcer as $item)
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="{{asset($item->sponcer_image)}}" alt=""></a>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">{{$item->sponcer_name}}</a>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
</div>
         </div>
   @stop