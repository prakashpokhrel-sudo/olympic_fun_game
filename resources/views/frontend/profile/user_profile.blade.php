@extends('frontend.main_master')
@section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="content-wrapper">
            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Settings</h6>
                     </div>
                  </div>
               </div>
               <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                   @csrf
                  <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                           <label class="control-label">User Name <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="{{$editData->name}}" name="name"  type="text">
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label class="control-label">First Name <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="{{$editData->first_name}}" name="first_name" placeholder="Gurdeep" type="text">
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label class="control-label">Last Name <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="{{$editData->last_name}}" name="last_name" placeholder="Osahan" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Phone <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="{{$editData->phone_no}}" name="phone_no" placeholder="123 456 7890" type="number">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Email Address <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="{{$editData->email}}" name="email" placeholder="iamosahan@gmail.com"  type="email">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Zip Code <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="value="{{$editData->zip}}" name="zip" placeholder="123456" type="number">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Address <span class="required">*</span></label>
                           <input class="form-control border-form-control" value="{{$editData->street}}" name="street" placeholder="Gurdeep" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Profile Picture <span class="required">*</span></label>
                           <input name="profile_photo_path" class="form-control border-form-control"  type="file" id="image">
                        </div>
                         <img id="showimage"class="profile-user-img img-fluid img-circle" src="{{ (!empty($editData->profile_photo_path))? url('upload/admin_images/'.$editData->profile_photo_path):url('upload/admin_images/user.png') }}" style="height:200px;"  width="250px;">
                     </div>
                  </div>
                   
                  <div class="row">
                     <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-danger border-none"> Cencel </button>
                        <button type="submit" class="btn btn-success border-none"> Save Changes </button>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            
         </div>
         <!-- /.content-wrapper -->
     </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showimage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@stop

