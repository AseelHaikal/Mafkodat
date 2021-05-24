@extends('layouts.app')


@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All comments
              </h2>

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
                        <th>Comment</th>
                        <th>Created at</th>
                        <th>Update at</th>
                        <th>Activation</th>
                        @if(auth()->user()->can('comment-delete'))
                        <th width="280px">Action</th>
                        @endif


                    </tr>
                </thead>
                <tbody>

                    @foreach ($comments as $key => $comment)
                    <tr id="delete_comments_{{ $comment->id }}">
                        <td>{{ $key+1   }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>{{ $comment->updated_at }}</td>

                        <td>

                          <a id="comments_eye{{$comment->id}}" onclick="eye_item('{{ $comment->id }}','comments')" class="btn btn-link">
                            @if($comment->is_active  == 1)
                            <i class="fa  fa-eye" data-toggle="tooltip" title=" اخفاء"></i>
                            @else
                            <i style="color: red;" class="fa fa-eye-slash"  data-toggle="tooltip" title="ضهور"></i>
                            @endif
                        </a>

                        </td>

                        @if(auth()->user()->can('comment-edit'))
                        <td>


                            @can('comment-delete', Model::class)

                            <a href="javascript:void(0)" onclick="delete_item({{ $comment->id }},'comments')"
                            class="text-danger" data-original-title="Delete" data-toggle="tooltip">
                               <i class="ti-trash"> </i>
                           </a>

                           <a href="javascript:void(0);" onclick="delete_item({{ $comment->id }},'comments')" class="btn btn-danger">Delete</a>
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
