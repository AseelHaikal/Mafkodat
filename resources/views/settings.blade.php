@extends('layouts.app')


@section('content')
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">General Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                        <li class="breadcrumb-item active">General Settings</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
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

        <div class="row">

            <div class="col-12">

                <!-- General -->

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">General</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Website Name</label>
                                    <input type="text" class="form-control" name="website_name" value="{{$settings->website_name}}" >
                                </div>
                                <div class="form-group">
                                    <label>Website Logo</label>
                                    <input type="file" class="form-control" name="website_logo">
                                    <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                                </div>

                                <div class="form-group mb-0">
                                    <label>Favicon</label>
                                    <input type="file" class="form-control" name="website_favicon" >
                                    <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                                    <small class="text-secondary">Accepted formats : only png and ico</small>
                                </div>


                                <div class="form-group">
                                    <label>Announcement Expire Period</label>
                                    <input type="text" class="form-control" name="website_name" value="{{$settings->announcement_expire_period}}" >
                                    <small class="text-secondary">Period in days</small>
                                </div>
                                <button  class="btn btn-primary btn-block" >Save Changes</button>
                            </form>
                        </div>
                    </div>

                <!-- /General -->

            </div>
        </div>
@stop
