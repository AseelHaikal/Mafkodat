@extends('layouts.app')


@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>User Roles</h2>

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

              <div class="create-btn">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                    @endcan
                </div>
          
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>

                  <tr >
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>



                  </tr>
                </thead>
                <tbody>

                    @foreach ($roles as $key => $role)
                        <tr id="delete_roles_{{$role->id}}">
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                @endcan
                                @can('role-delete', Model::class)
                                <a href="javascript:void(0)" onclick="delete_item({{ $role->id }},'roles')"
                                    class="text-danger" data-original-title="Delete" data-toggle="tooltip">
                                       <i class="ti-trash"> </i>
                                   </a>

                                   <a href="javascript:void(0);" onclick="delete_item({{ $role->id }},'roles')" class="btn btn-danger">Delete</a>
                                @endcan
                            </td>
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



@endsection
