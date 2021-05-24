@extends('layouts.app')


@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>جميع الشكاوي</h2>

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

              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>


                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Solved</th>
                        {{-- @if(auth()->user()->can('compliant-delete') ) --}}
                        <th width="280px">Action</th>
                        {{-- @endif --}}


                    </tr>
                </thead>
                <tbody>

                    @foreach ($compliants as $key => $compliant)
                    <tr id="delete_compliants_{{ $compliant->id }}">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $compliant->user->name }}</td>
                        <td>{{ $compliant->subject }}</td>
                        <td>{{ $compliant->content }}</td>
                        <td>{{ $compliant->created_at }}</td>
                        <td>{{ $compliant->updated_at }}</td>
                        <td>
                          <a id="compliants_eye{{$compliant->id}}" onclick="eye_item('{{ $compliant->id }}','compliants')" class="btn btn-link">
                            @if($compliant->status  == 1)
                            <i class="fa  fa-eye" data-toggle="tooltip"></i>
                            @else
                            <i style="color: red;" class="fa fa-eye-slash"  data-toggle="tooltip" ></i>
                            @endif
                         </a>

                        </td>

                        @if(auth()->user()->can('compliant-delete'))
                        <td>
                            @can('compliant-delete', Model::class)

                            <a href="javascript:void(0)" onclick="delete_item({{ $compliant->id }},'compliants')"
                            class="text-danger" data-original-title="Delete" data-toggle="tooltip">
                               <i class="ti-trash"> </i>
                           </a>

                           <a href="javascript:void(0);" onclick="delete_item({{ $compliant->id }},'compliants')" class="btn btn-danger">Delete</a>
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
