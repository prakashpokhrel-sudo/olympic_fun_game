@extends('frontend.main_master')
@section('content')


<div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" alt="" src="">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="/frontend/img/s2.png">
               </div>
            </div>
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" href="#"><span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
               </nav>
            </div>
            
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Videos</h6>
                        </div>
                     </div>
                     @foreach($catpost as $item)
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="#"><iframe  src="https://www.youtube.com/embed/{{$item->embed_code}}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; " allowfullscreen></iframe></a>
                              <div class="time">
                                 @if($item->type==0)
                                 Live
                                 @else
                                 upcoming
                                 @endif
                                 
                              </div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">{{$item->title}}</a>
                              </div>
                              <div class="video-page text-success">
                              <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <nav aria-label="Page navigation example">
                     <ul class="pagination justify-content-center pagination-sm mb-0">
                        <li class="page-item disabled">
                           <a tabindex="-1" href="#" class="page-link">Previous</a>
                        </li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item">
                           <a href="#" class="page-link">Next</a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
</div>
</div>
@stop
