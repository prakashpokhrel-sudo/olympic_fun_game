@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                  <img class="profile-user-img img-fluid img-circle" src="{{(!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/admin_images/admin.jpg')}}">
                </div>

                <h3 class="profile-username text-center">{{$adminData->name}}</h3>

                <p class="text-muted text-center">{{$adminData->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <h6 style="text-align: center; bold;">Followers</h6> <p style="text-align: center;">1,322</p>
                  </li>
                  <li class="list-group-item">
                    <b>Sports</b> <a class="float-right">200</a>
                  </li>
                  <li class="list-group-item">
                    <b>Users</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="{{route('admin.profile.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @stop