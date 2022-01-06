@extends('frontend.main_master')
@section('content')

<div id="content-wrapper" class="d-flex flex-column">
<div class="container-fluid">

<section class="pt-5 pb-5 bg-gradient-primary text-white pl-4 pr-4 inner-profile mb-4">
<div class="row gutter-2 gutter-md-4 align-items-end">
<div class="col-md-6 text-center text-md-left">
<h1 class="mb-1">{{Auth::user()->name}}</h1>
<span class="text-muted " style="color: white;"><i class="fas fa-map-marker-alt fa-fw fa-sm mr-1"></i>{{Auth::user()->street}} </span>
</div>
</div>
</section>
<div class="row">
<div class="col-xl-3 col-lg-3">
<img  src="{{(!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/admin_images/user.png')}}" style="height: 300px; width:300px;"  >
<div class="bg-white p-3 widget shadow rounded mb-4">
<div class="nav nav-pills flex-column lavalamp" id="sidebar-1" role="tablist">
<a class="nav-link active" data-toggle="tab" href="#sidebar-1-1" role="tab" aria-controls="sidebar-1" aria-selected="true"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a>
<a class="nav-link" data-toggle="tab" href="#sidebar-1-4" role="tab" aria-controls="sidebar-1-4" aria-selected="false"><i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i> Account Settings</a>
<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
</div>
</div>
</div>

<div class="col-xl-9 col-lg-9">
<div class="bg-white p-3 widget shadow rounded mb-4">
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="sidebar-1-1" role="tabpanel" aria-labelledby="sidebar-1-1">

<div class="d-sm-flex align-items-center justify-content-between mb-3">
<h1 class="h5 mb-0 text-gray-900">Profile</h1>
</div>
<div class="row gutter-1">
<div class="col-md-4">
<div class="form-group">
<h6 for="exampleInput1">Usrename: {{Auth::user()->name}}</h6>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
<h6 for="exampleInput1">First Name : {{Auth::user()->first_name}}</h6>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
<h6 for="exampleInput2">Last Name:  {{Auth::user()->last_name}}</h6>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
<h6 for="exampleInput4">Street: {{Auth::user()->street}}</h6>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
<h6 for="exampleInput5">Zip: {{Auth::user()->zip}}</h6>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
 <h6 for="exampleInput6">Phone Number: {{Auth::user()->phone_no}}</h6>

</div>
</div>
<div class="col-md-6">
<div class="form-group">
<h6 for="exampleInput7">Email: {{Auth::user()->email}}</h6>

</div>
</div>
</div>
<div class="row">
<div class="col">
<a href="{{route('user.profile.edit')}}" class="btn btn-primary">Edit Profile</a>
</div>
</div>
</div>

<div class="tab-pane fade" id="sidebar-1-2" role="tabpanel" aria-labelledby="sidebar-1-2">

<div class="d-sm-flex align-items-center justify-content-between mb-3">
<h1 class="h5 mb-0 text-gray-900">Watchlist</h1>
<a href="movies.html" class="d-none d-sm-inline-block text-xs">Showing 97 of 97 items</a>
</div>

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
<small class="text-muted">23,421</small>
</div>
<img src="img/m1.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
<small class="text-muted">8,784</small>
</div>
<img src="img/m2.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
<small class="text-muted">69,123</small>
</div>
<img src="img/m3.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">The Current War</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
<small class="text-muted">88,865</small>
</div>
<img src="img/m4.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
<small class="text-muted">8,784</small>
</div>
<img src="img/m2.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
<small class="text-muted">69,123</small>
</div>
<img src="img/m3.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">The Current War</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
 <div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
<small class="text-muted">88,865</small>
</div>
<img src="img/m4.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
<small class="text-muted">23,421</small>
</div>
<img src="img/m1.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i> Remove</button>
</div>
</a>
</div>
</div>
</div>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center mb-0 pb-0">
<li class="page-item disabled">
<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
</li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item">
<a class="page-link" href="#">Next</a>
</li>
</ul>
</nav>
</div>

<div class="tab-pane fade" id="sidebar-1-3" role="tabpanel" aria-labelledby="sidebar-1-3">

<div class="d-sm-flex align-items-center justify-content-between mb-3">
<h1 class="h5 mb-0 text-gray-900">Your Lists</h1>
<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary text-xs">New List</a>
</div>

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
<small class="text-muted">23,421</small>
</div>
<img src="img/m1.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
<small class="text-muted">8,784</small>
 </div>
<img src="img/m2.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
<small class="text-muted">69,123</small>
</div>
<img src="img/m3.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">The Current War</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
 <div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
<small class="text-muted">88,865</small>
</div>
<img src="img/m4.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 50%</h6>
<small class="text-muted">8,784</small>
</div>
<img src="img/m2.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Gemini Man</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
 </div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 20%</h6>
<small class="text-muted">69,123</small>
</div>
<img src="img/m3.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">The Current War</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 74%</h6>
<small class="text-muted">88,865</small>
</div>
<img src="img/m4.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Charlie's Angels</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
 <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card m-card shadow border-0">
<a href="movies-detail.html">
<div class="m-card-cover">
<div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
<h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-danger"></i> 88%</h6>
<small class="text-muted">23,421</small>
</div>
<img src="img/m1.jpg" class="card-img-top" alt="...">
</div>
<div class="card-body p-3">
<h5 class="card-title text-gray-900 mb-1">Jumanji: The Next Level</h5>
<p class="card-text"><small class="text-muted">English</small> <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> 22 AUG</small> </p>
</div>
<div class="card-body pl-2 pr-2 pb-2 pt-0">
<div class="row">
<div class="col pr-1">
<button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i></button>
</div>
<div class="col pl-1">
<button class="btn btn-info btn-block btn-sm"><i class="fas fa-edit"></i></button>
</div>
</div>
</div>
</a>
</div>
</div>
</div>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center mb-0 pb-0">
<li class="page-item disabled">
<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
</li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item">
<a class="page-link" href="#">Next</a>
</li>
</ul>
</nav>
</div>

<div class="tab-pane fade" id="sidebar-1-4" role="tabpanel" aria-labelledby="sidebar-1-4">

<div class="d-sm-flex align-items-center justify-content-between mb-3">
<h1 class="h5 mb-0 text-gray-900">Account Settings</h1>
</div>
<form action="{{route('update.change.password')}}" method="post">
 @csrf()
<div class="row gutter-1">
<div class="col-12">
<div class="form-group">
<label for="exampleInput8">Old Password</label>
<input type="password" id="current_password" name="oldpassword" class="form-control" placeholder="Password">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInput9">New Password</label>
<input  type="password" id="password" name="password" class="form-control" placeholder="Password">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInput10">Retype New Password</label>
<input type="password" id="password_confirmation"  name="password_confirmation" class="form-control" placeholder="Password">
</div>
</div>
</div>
<div class="row">
<div class="col">
 <button type="submit" class="btn btn-danger">Update </button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
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
<a class="btn btn-primary" href="{{route('user.logout')}}">Logout</a>
</div>
</div>
</div>
</div>


@stop
