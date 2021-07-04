@extends('layouts.app')
@section('content')
<!-- Page Header -->

<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Profile</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="alert alert-success" id="success_msg" style="display:none"><span id="msg">cnzksjdfaskdjh</span></div>
<div class="row"  >
    <div class="col-md-12">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto profile-image">
                    <a href="#">
                        @if($user->profile_photo_path)
                        <img class="rounded-circle" alt="User Image" src="{{asset(Auth::user()->profile_photo_path)}}">
                        @else
                        <img class="rounded-circle" alt="User Image" src="{{asset('assets/img/user.png')}}">
                        @endif

                    </a>
                </div>
                <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-0">{{$user->name}}</h4>
                    <h6 class="text-muted">{{$user->email}}</h6>
                    <div class="user-Location"><i class="fa fa-map-marker"></i> {{$user->country}}, {{$user->city}}</div>
                </div>

            </div>
        </div>
        <div class="profile-menu">
            <ul class="nav nav-tabs nav-tabs-solid">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                </li>
            </ul>
        </div>
        <div class="tab-content profile-tab-cont">

            <!-- Personal Details Tab -->
            <div class="tab-pane fade show active" id="per_details_tab">

                <!-- Personal Details -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between">
                                    <span>Personal Details</span>
                                    <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                </h5>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                    <p class="col-sm-10" id="userInfo">{{$user->name}}</p>
                                </div>

                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                    <p class="col-sm-10">{{$user->email}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                    <p class="col-sm-10">{{$user->phone}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                    <p class="col-sm-10 mb-0">{{$user->country}},{{$user->city}}</p>
                                </div>
                            </div>

                        </div>

                        <!-- Edit Details Modal -->
                        <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Personal Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="user-profile-update-form" action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row form-row">

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file"  class="form-control" name="photo">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name" value={{$user->name}}>
                                                        <div class="alert-danger" id="nameError"></div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email ID</label>
                                                        <input type="email" class="form-control" name="email" value={{$user->email}}>
                                                        <div class="alert-danger" id="emailError"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="text" name="phone" value={{$user->phone}} class="form-control">
                                                        <div class="alert-danger" id="phoneError"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="form-title"><span>Address</span></h5>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control"name="country" value={{$user->country}}>
                                                        @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control"name="city" value="{{$user->city}}">
                                                        @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="save-profile-update" class="btn btn-primary btn-block" >Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Edit Details Modal -->

                    </div>


                </div>
                <!-- /Personal Details -->

            </div>
            <!-- /Personal Details Tab -->

            <!-- Change Password Tab -->
            <div id="password_tab" class="tab-pane fade">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <form id="change-password-form" action="{{route('user.change.password')}}" method="post" >
                                    @csrf

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="new_password" >
                                        @error('new_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                        @error('confirm_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <button  type="submit" class="btn btn-primary" id="save-password">Save Changes</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Change Password Tab -->

        </div>
    </div>
</div>
@endsection
@section('scripts')
@section('scripts')
<script>
//     $(document).on('click','#save-password',function(w){
//         w.preventDefault();
//        var formData= new FormData($('#change-password-form')[0]);

//      $.ajax({
//         type:'post',
//         url:"{{route('user.change.password')}}",
//         data:formData,
//         processData:false,
//         contentType:false,
//         cache:false,
//         success: function(data){
//             if(data.status==true){
//                 // document.getElementById("msg").innerHTML =data.msg;
//                 //  ajax.reload();
//                 alert(data.msg);
//             }else{
//                 // document.getElementById("msg").innerHTML =data.msg;
//                 //  ajax.reload();
//             }
//         },
//         error: function(reject){
//             if(reject.status==false){
//                 // document.getElementById("msg").innerHTML =data.msg;
//                 //  ajax.reload();
//                 alert(';;');
//             }else{
//                 // document.getElementById("msg").innerHTML =data.msg;
//                 //  ajax.reload();
//             }
//         },
//     });
//   });

  $(document).on('click','#save-profile-update',function(w){
        w.preventDefault();
       var formData= new FormData($('#user-profile-update-form')[0]);


     $.ajax({
        type:'post',
        enctype:"multipart/form-data",
        url:"{{route('user.profile.update')}}",
        data:formData,
        processData:false,
        contentType:false,
        cache:false,
        // beforeSend: function() {
        //                     //$('.submitBtn').attr("disabled","disabled");
        //                     $('#edit_personal_details').css("opacity", ".8");
        //                 },
        success: function(data){
            if(data.status==true){
                $("#edit_personal_details").modal('hide');
                // $('#edit_personal_details').css("opacity", "1");
                $('#success_msg').show();
			     document.getElementById("msg").innerHTML =data.msg;
                $("#userInfo").load(profile/1);

            }
        },
        error: function(response){
            $('#nameError').text(response.responseJSON.errors.name);
            $('#emailError').text(response.responseJSON.errors.email);
            $('#phoneError').text(response.responseJSON.errors.phone);

        },
    });
  });

</script>
@stop

@endsection
