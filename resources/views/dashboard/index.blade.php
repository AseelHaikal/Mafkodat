@extends('layouts.app')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Welcome Admin!</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<?php
$announcementsLost =App\Models\Announcement::where('type_id',1)->get();
$announcementsFound =App\Models\Announcement::where('type_id',2)->get();

$documentsLost =App\Models\Announcement::where("category_id",1)->where('type_id',1)->get();
$documentsFound =App\Models\Announcement::where("category_id",1)->where('type_id',2)->get();

$childrensLost =App\Models\Announcement::where("category_id",2)->where('type_id',1)->get();
$childrensFound =App\Models\Announcement::where("category_id",2)->where('type_id',2)->get();

$bagsLost =App\Models\Announcement::where("category_id",3)->where('type_id',1)->get();
$bagsFound =App\Models\Announcement::where("category_id",3)->where('type_id',2)->get();

$electronicsLost =App\Models\Announcement::where("category_id",4)->where('type_id',1)->get();
$electronicsFound =App\Models\Announcement::where("category_id",4)->where('type_id',2)->get();

$othersLost =App\Models\Announcement::where("category_id",2)->where('type_id',1)->get();
$othersFound =App\Models\Announcement::where("category_id",2)->where('type_id',2)->get();
?>
<div class="row">
    <div class="col-xl-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-primary border-primary">
                        <i class="fe fe-layout"></i>
                    </span>
                    <div class="dash-count">
                        <h3 style="display: inline-block">مفقودات</h3>
                        <p style="text-align: center">{{count($announcementsLost)}}</p>
                    </div>
                    <div class="dash-count">
                        <h3 style="display: inline-block">موجودات</h3>
                        <p style="text-align: center" >{{count($announcementsFound)}}</p>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h4 class="text-muted">جميع البلاغات</h4>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-success border-success">
                        <i class="fe fe-users"></i>
                    </span>
                    <div class="dash-count">
                        <h3 style="display: inline-block">فاقد</h3>
                        <p style="text-align: center">{{count($childrensLost)}}</p>
                    </div>
                    <div class="dash-count">
                        <h3 style="display: inline-block">واجد</h3>
                        <p style="text-align: center" >{{count($childrensFound)}}</p>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h4 class="text-muted">اطفال</h4>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-success">
                        <i class="fe fe-document"></i>
                    </span>
                    <div class="dash-count">
                        <h3 style="display: inline-block">فاقد</h3>
                        <p style="text-align: center">{{count($documentsLost)}}</p>
                    </div>
                    <div class="dash-count">
                        <h3 style="display: inline-block">واجد</h3>
                        <p style="text-align: center">{{count($documentsFound)}}</p>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h4 class="text-muted">وثائق</h4>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-success border-success">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <h3 style="display: inline-block">فاقد</h3>
                        <p style="text-align: center">{{count($bagsLost)}}</p>
                    </div>
                    <div class="dash-count">
                        <h3 style="display: inline-block">واجد</h3>
                        <p style="text-align: center">{{count($bagsFound)}}</p>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h4 class="text-muted">حقائب</h4>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-success border-success">
                        <i class="fe fe-money"></i>
                    </span>
                    <div class="dash-count">
                        <h3 style="display: inline-block">فاقد</h3>
                        <p style="text-align: center">{{count($electronicsLost)}}</p>
                    </div>
                    <div class="dash-count">
                        <h3 style="display: inline-block">واجد</h3>
                        <p style="text-align: center">{{count($electronicsFound)}}</p>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h4 class="text-muted">الكترونيات</h4>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon text-danger border-danger">
                        <i class="fe fe-layout"></i>
                    </span>
                    <div class="dash-count">
                        <h3 style="display: inline-block">فاقد</h3>
                        <p style="text-align: center">{{count($othersLost)}}</p>
                    </div>
                    <div class="dash-count">
                        <h3 style="display: inline-block">واجد</h3>
                        <p style="text-align: center">{{count($othersFound)}}</p>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h4 class="text-muted">أخرى</h4>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
