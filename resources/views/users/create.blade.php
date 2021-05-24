@extends('layouts.app')


@section('content')

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
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                  <span class="section">Personal Info</span>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">

                      <input id="name" class="form-control" data-validate-length-range="6" name="name" placeholder="" required="required" type="text">
                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <input type="number" id="phone" name="phone" required="required" class="form-control">
                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                      <input type="email" id="email" name="email" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="password" class="col-form-label col-md-3 label-align">Password</label>
                    <div class="col-md-6 col-sm-6">
                      <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Repeat Password</label>
                    <div class="col-md-6 col-sm-6">
                      <input id="password2" type="password" name="confirm-password" data-validate-linked="password" class="form-control" required="required">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align ">Roles</label>
                    <div class="col-md-6 col-sm-6">
                        {!! Form::select('roles[]', $roles,[], array('class' => ' select-builder form-control')) !!}

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




@endsection
