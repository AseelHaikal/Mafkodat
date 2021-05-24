@extends('layouts.app')


@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Admins</h2>

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

            @can('user-create')
            <div class="container">
                <div class="create-btn">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
              </div>
            </div>
            @endcan

              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>


                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>phone</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Activation</th>
                        @if(auth()->user()->can('user-edit') ||  auth()->user()->can('user-delete'))
                        <th width="280px">Action</th>
                        @endif


                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $key => $user)
                    <tr id="delete_users_{{ $user->id }}">
                        <td>{{ $key+1   }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $v)
                            <label class="badge badge-success">{{ $v->role_name }}</label>
                            @endforeach
                        </td>

                        <td>

                          <a id="users_eye{{$user->id}}" onclick="eye_item('{{ $user->id }}','users')" class="btn btn-link">
                            @if($user->is_active  == 1)
                            <i class="fa  fa-eye" data-toggle="tooltip" title=" اخفاء"></i>
                            @else
                            <i style="color: red;" class="fa fa-eye-slash"  data-toggle="tooltip" title="ضهور"></i>
                            @endif
                        </a>

                        </td>

                        @if(auth()->user()->can('user-edit') ||  auth()->user()->can('user-delete'))
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                            @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @endcan

                            @can('user-delete', Model::class)

                            <a href="javascript:void(0)" onclick="delete_item({{ $user->id }},'users')"
                            class="text-danger" data-original-title="Delete" data-toggle="tooltip">
                               <i class="ti-trash"> </i>
                           </a>

                           <a href="javascript:void(0);" onclick="delete_item({{ $user->id }},'users')" class="btn btn-danger">Delete</a>
                            @endcan
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
