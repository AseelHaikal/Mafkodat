@extends('layouts.app')


@section('content')
<!-- Page Header -->

<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">البلاغات</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">بلاغات</li>
                <li class="breadcrumb-item active">{{$category}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Announcements</h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <p class="text-muted font-13 m-b-30"></p>

              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif

            @can('announcement-create')
                <div class="create-btn">
                <a class="btn btn-success" href="{{ route('announcement.create',$category) }}"> Create New Announcement</a>
              </div>
            @endcan

              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Place</th>
                        <th>User</th>
                        <th>Status</th>
                        @if($category=="documents")
                        <th>Document Type</th>
                        @endif
                        @if($category=="childrens")
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        @endif
                        @if($category=="bags")
                        <th>Category</th>
                        <th>Color</th>
                        <th>Shape</th>
                        @endif
                        @if($category=="electronics")
                        <th>Category</th>
                        <th>Color</th>
                        <th>model</th>
                        @endif
                        <th>description</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>Activation</th>
                        @if(auth()->user()->can('announcement-edit') ||  auth()->user()->can('announcement-delete'))
                        <th width="280px">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $key => $announcement)
                    <tr id="delete_announcements_{{ $announcement->id }}">
                        <td>{{ $key+1   }}</td>
                        <td>
                            @if($announcement->photo)
                            <img  style="width:100px;hieght:100px" alt="Announcement Image" src="{{asset($announcement->photo)}}">
                            @else
                           <p>لا توجد صورة</p>
                            @endif
                        </td>
                        <td>{{ $announcement->type->name }}</td>
                        <td>{{$announcement->place }}</td>
                        <td>{{$announcement->user->name }}</td>
                        <td>{{$announcement->status->name}}</td>
                        @if($category=="documents")
                            <td>{{$announcement->details->category}}</td>
                        @endcan
                        @if($category=="childrens")
                            <td>{{$announcement->details->name}}</td>
                            <td>{{$announcement->details->age}}</td>
                            <td>{{$announcement->details->gender}}</td>
                        @endcan
                        @if($category=="bags")
                            <td>{{$announcement->details->category}}</td>
                            <td>{{$announcement->details->color}}</td>
                            <td>{{$announcement->details->shape}}</td>
                        @endcan
                        @if($category=="electronics")
                            <td>{{$announcement->details->category}}</td>
                            <td>{{$announcement->details->color}}</td>
                            <td>{{$announcement->details->model}}</td>
                       @endcan
                       <td>{{$announcement->description }}</td>
                       <td>{{$announcement->created_at }}</td>
                       <td>{{$announcement->updated_at }}</td>
                       <td>

                        <a id="announcements_eye{{$announcement->id}}" onclick="eye_item('{{ $announcement->id }}','announcements')" class="btn btn-link">
                          @if($announcement->is_active == 1)
                          <i class="fa  fa-eye" data-toggle="tooltip" title=" اخفاء"></i>
                          @else
                          <i style="color: red;" class="fa fa-eye-slash"  data-toggle="tooltip" title="ضهور"></i>
                          @endif
                      </a>

                      </td>
                        @if(auth()->user()->can('announcement-edit') ||  auth()->user()->can('announcement-delete'))
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                            @can('announcement-edit')
                            <a class="btn btn-primary" href="{{ route('announcements.edit',$announcement->id) }}">Edit</a>
                            @endcan

                            @can('announcement-delete', Model::class)

                            <a href="javascript:void(0)" onclick="delete_item({{ $announcement->id }},'announcements')"
                            class="text-danger" data-original-title="Delete" data-toggle="tooltip">
                               <i class="ti-trash"> </i>
                           </a>

                           <a href="javascript:void(0);" onclick="delete_item({{ $announcement->id }},'announcements')" class="btn btn-danger">Delete</a>
                            @endcan
                            @if($announcement->category_id=="childrens")
                            <a href="{{route('announcement.comments',$announcement->id)}}" class="btn btn-success">Show Comments</a>
                            @endif
                            </td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@stop
