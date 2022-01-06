@extends('frontend.main_master')
@section('content')
@php 
$live = DB::table('live_games')->where('category_id',$post->category_id)->orderBy('id','desc')->limit(7)->get();
@endphp

         <!-- Sidebar -->
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block-right-list section-padding">
                  <div class="row mb-4">
                  <div class="col-md-8">
                       <div class="single-video">
                              <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/{{$post->embed_code}}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                  </div>
                  <div class="col-md-4">
                     <h6>Also live</h6>
                        <div class="video-slider-right-list">
                           @foreach($live as $more)
                           <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                       <a href="#"><iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/{{$more->embed_code}}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></a>
                                       <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                       <div class="video-title">
                                          <a href="#">{{$more->title}}</a>
                                       </div>
                                       <div class="video-page text-success">
                                          Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                        </div>
                  </div>
                  </div>
               </div>
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="single-video-left">
                           <div class="single-video-title box mb-3">
                              <h2><a href="#">{{$post->title}}</a></h2>
                              <p class="mb-0">{{$post->sports_category_title}}</p>
                           </div>
                           <div class="box mb-3 single-video-comment-tabs">
                              <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link" id="facebook-comments-tab" data-toggle="tab" href="#facebook-comments" role="tab" aria-controls="facebook" aria-selected="false">Facebook Comments</a>
                                 </li>
                                 <div class="fb-comments" data-href="https://developers.facebook.com/profile.php?id=100013486149843" data-width="" data-numposts="5"></div>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
         </div>
         </div>
         </div>
         <!-- /.content-wrapper -->
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
               </div>
            </div>
         </div>
      </div>

@stop