@extends('admin.admin_master')
@section('admin')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">

              <h4 class="card-title ">Manage Sponcers</h4>
            <p class="card-category"> Best Image Size XXX </p>

            </div>            
<div class="col-md-2">
  <a  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> Add User</a>
</div>
</div>

    </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>user name</th>
                     <th>user email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($user as $item)
                  <tr>
                    <td>{{$item->name}} </td>
                     <td>{{$item->email}} </td>
                     <td>  <a data-toggle="modal" href="#editcategory-{{$item->id}}"  class="btn btn-danger">Edit</a>
                      <a href="{{route('delete.user',$item->id)}}" class="btn btn-danger">DELETE</a>
                    </td>
                  </tr>
                  @endforeach()
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Add category -->
<div class="bd-example">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
              </div>
                <form action="{{route('store.user')}}" method="POST" enctype="multipart/form-data">
                   <div class="modal-body">
                  @csrf()
                  <div class="form-group">
                    <label for="message-text" class="control-label">User Name</label>
                    <textarea type="text" class="form-control" name="name" id="message-text"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">User Email</label>
                    <textarea type="text" class="form-control" name="email" id="message-text"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">User password</label>
                    <input type="password" class="form-control" name="password" id="message-text"></input>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="control-label">User Image:</label>
                    <input type="file" name="profile_photo_path"  class="form-control" id="recipient-name" style="opacity: 1; z-index: 1;">
                  </div>             
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Add">
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
  <!-- edit Add category -->
    <!-- start edit sponcer -->
  @foreach($user as $item1)
      <div class="bd-example">
          <div class="modal fade" id="editcategory-{{$item1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title">Edit Sponcer</h4>
                </div>
                <form action="{{route('update.user', $item1->id)}}" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                        @csrf
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">User Name:</label>
                        <input type="text" name="name"  class="form-control" value="{{$item1->name}}" id="recipient-name" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">User Email:</label>
                        <input type="text" name="email"  class="form-control" value="{{$item1->email}}" id="recipient-name" required="">
                      </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password:</label>
                        <input type="text" name="password"  class="form-control" value="{{$item1->password}}" id="recipient-name" required="">
                      </div>
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Image:</label>
                      <input type="file" name="profile_photo_path" class="form-control" id="" style="opacity: 1; z-index: 1;"><br/>
                      <img  src="{{(!empty($user->profile_photo_path))? url('upload/admin_images/'.$item1->profile_photo_path):url('upload/admin_images/user.png')}}" style="height: 300px; width:300px;"  >
                      
                    </div>               
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
               </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
     <!-- end edit sponcer -->
@stop
