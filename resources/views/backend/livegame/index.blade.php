@extends('admin.admin_master')
@section('admin')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

              <h4 class="card-title ">Manage Live Games</h4>

            </div>            
<div class="col-md-2">
  <a  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add Live Games</a>
</div>
</div>
    </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sports Category</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($livegames  as $item)
                  <tr>
                     <td>{{$item->category->sports_category_title}} </td>
                    <td>{{$item->title}} </td>
                    <td>
                  @if($item->type == 0)
                   <a class="btn btn-primary" href="{{route('inactive.livetv',$item->id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Top Live </a></button>
                      @else
                    <a class="btn btn-danger" href="{{route('active.livetv',$item->id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Live </a>
                  @endif
                    </td>
                     <td>  <a data-toggle="modal" href="#editcategory-{{$item->id}}"  class="btn btn-danger">Edit</a>
                      <a href="{{route('delete.livegame',$item->id)}}" class="btn btn-danger">DELETE</a>
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
                <form action="{{route('add.livegame')}}" method="POST" enctype="multipart/form-data">
                   <div class="modal-body">
                  @csrf()
                  <div class="form-group">
                        <label for="recipient-name" class="control-label">Sports Category:</label>
                       <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="category_id">
                        
    					<option disabled="" selected="">Select Category</option>
                         @foreach(App\Models\Sport::all() as $row)
    					<option value="{{$row->id}}">{{$row->sports_category_title}} </option>
    					 @endforeach
 						</select>
                      </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Title</label>
                        <input type="text" name="title"  class="form-control" value="" id="recipient-name" required="">
                      </div>
                     <div class="form-group">
                        <label for="recipient-name" class="control-label">Embed Code</label>
                        <input type="text" name="embed_code"  class="form-control" value="" id="recipient-name" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Live Games</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="type">
                         <option value="0">Top Live</option>
                         <option value="1">Live</option>
                        </select>
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
  <!-- end Add live game -->
  
  <!-- start edit live game -->
  @foreach($livegames as $item1)
      <div class="bd-example">
          <div class="modal fade" id="editcategory-{{$item1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title">Edit LiveGame</h4>
                </div>
                <form action="{{route('update.livegame', $item1->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf()
                  <div class="modal-body">
                       <div class="form-group">
                        <label for="recipient-name" class="control-label">Sports Category:</label>
                       <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="category_id">
                        
    					<option disabled="" selected="">Select Category</option>
                         @foreach(App\Models\Sport::all() as $row)
    					<option value="{{$row->id}}"<?php if($row->id == $item1->category_id) echo "selected"; ?>>{{$row->sports_category_title}} </option>
    					 @endforeach
 						</select>
                      </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Title</label>
                        <input type="text" name="title"  class="form-control" value="{{$item1->title}}" id="recipient-name" required="">
                      </div>
                     <div class="form-group">
                        <label for="recipient-name" class="control-label">Embed Code</label>
                        <input type="text" name="embed_code"  class="form-control" value="{{$item1->embed_code}}" id="recipient-name" required="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Live Games</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="type">
                         <option value="0"{{$item1->type == "0"? 'selected':''}}> Top Live</option>
                         <option value="1"{{$item1->type == "1"? 'selected':''}}>Live</option>
                        </select>
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
    <!-- end live game -->
@stop
