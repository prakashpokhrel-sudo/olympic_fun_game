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
  <a  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add Sponcer</a>
</div>
</div>

    </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sponcer Image</th>
                    <th>Sponcer Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($sponcers as $item)
                  <tr>
                    <td><img src="{{asset($item->sponcer_image)}}" alt="" style="width:70px; height:40px;"></td>
                    <td>{{$item->sponcer_name}} </td>
                     <td>  <a data-toggle="modal" href="#editcategory-{{$item->id}}"  class="btn btn-danger">Edit</a>
                      <a href="{{route('delete.sponcer',$item->id)}}" class="btn btn-danger">DELETE</a>
                    </td>
                  </tr>
                  @endforeach()
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                  </tr>
                  </tfoot>
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
                <form action="{{route('add.sponcer')}}" method="POST" enctype="multipart/form-data">
                   <div class="modal-body">
                  @csrf()
                  <div class="form-group">
                    <label for="message-text" class="control-label">Sponcer Name</label>
                    <textarea type="text" class="form-control" name="sponcer_name" id="message-text"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Image:</label>
                    <input type="file" name="sponcer_image"  class="form-control" id="recipient-name" style="opacity: 1; z-index: 1;">
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
  @foreach($sponcers as $item1)
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
                <form action="{{route('update.sponcer', $item1->id)}}" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                        @csrf
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Sponcer Name:</label>
                        <input type="text" name="sports_category_title"  class="form-control" value="{{$item1->sponcer_name}}" id="recipient-name" required="">
                      </div>
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Image:</label>
                      <input type="file" name="sponcer_image" class="form-control" id="" style="opacity: 1; z-index: 1;"><br/>
                      <img src="{{asset('backend/sponcer/img/'.$item1->sponcer_image)}}" alt="" width="100">
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
