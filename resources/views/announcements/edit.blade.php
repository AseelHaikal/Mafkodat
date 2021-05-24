@extends('layouts.app')


@section('content')
<!-- Page Header -->

<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">البلاغات</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">تعديل بلاغ</li>
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
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">

              <div class="x_content">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                </div>
                @endif
                @php
                $category_name= App\Models\Announcement_Category::get()->where('name',$category)->first();
            @endphp
                {!! Form::open(array('route' => ['announcements.update', $announcement->id],'method'=>'PATCH','enctype'=>'multipart/form-data')) !!}
                  <span class="section">Announcement Info</span>
                   <input type="hidden" name="category_id" value="{{$category_name->id}}">

                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select" name="type_id">
                            @foreach($types as $key => $type)
                            <option value="{{$type->id}}" <?php if($announcement->type_id==$type->id){echo 'selected';}?>>{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="place">Place <span class="required">*</span>
                  </label>
                  <div class="col-md-6  col-sm-6">
                      <input type="text" name="place" id="place" required="required" class="form-control"  value="{{$announcement->place}}">

                  </div>
                </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="photo">Photo
                    </label>
                    <div class="col-md-6 col-sm-6">
                            <input type="file"  class="form-control" name="photo" @if($category=="childrens") {{"required"}}  @endif >
                    </div>
                  </div>
                  @if($category=="documents")
                  <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                          <label>Category</label>
                          <input type="text" class="form-control" name="category" required="required"value="{{$announcement->details->category}}">
                      </div>
                  </div>
                  @endif
                  @if($category=="bags")
                  <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                          <label>Category</label>
                          <input type="text" class="form-control" name="category" required="required" value="{{$announcement->details->category}}">
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" class="form-control" name="color" required="required" value="{{$announcement->details->color}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                      <label>Shape</label>
                      <input type="text" class="form-control" name="shape" required="required" value="{{$announcement->details->shape}}">
                  </div>
              </div>
                  @endif
                  @if($category=="electronics")
                  <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                          <label>Category</label>
                          <input type="text" class="form-control" name="category" required="required" value="{{$announcement->details->category}}">
                      </div>
                      <div class="form-group">
                        <label>Color</label>
                        <input type="text" class="form-control" name="color" required="required" value="{{$announcement->details->color}}">
                    </div>
                    <div class="form-group">
                      <label>Model</label>
                      <input type="text" class="form-control" name="model" required="required" value="{{$announcement->details->model}}">
                  </div>
                  </div>
                  @endif
                  @if($category=="childrens")
                  <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" required="required" value="{{$announcement->details->name}}">
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" required="required" value="{{$announcement->details->age}}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                      <label>Gender</label>
                      <input type="text" class="form-control" name="gender" required="required" value="{{$announcement->details->gender}}">
                  </div>
              </div>
                  @endif
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <textarea name="description" id="description" cols="67" rows=""  required="required" class="form-control" >{{$announcement->description}}</textarea>

                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select" name="status_id">
                            @foreach($statuses as $key => $status)
                            <option value="{{$status->id}}" <?php if($announcement->status_id==$status->id){echo 'selected';}?>>{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                      <button id="send" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                  {!! Form::close() !!}


              </div>
            </div>
          </div>


      </div>
    </div>
  </div>

@stop
