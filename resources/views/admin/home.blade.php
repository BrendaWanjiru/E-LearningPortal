@extends('layouts.admin.dashboard')
@include('layouts.admin.sidebar')
@include('layouts.admin.header')
@section('content')

<div class="all-content-wrapper">
    <div class="header-advance-area">
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <form role="search" class="sr-input-func">
                                            <input type="text" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Welcome Admin</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-content">
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Professor</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <span><a href="/professor"><i class="fa fa-user fa-3x"></i></a></span>
                                    </div>
                                </div>
                                <h2><span class="counter">10</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Student</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <span><a href="/student"><i class="fa fa-users fa-3x"></i></a></span>
                                    </div>
                                </div>
                                <h2><span class="counter">15</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Courses</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <span><a href="/course"><i class="fa fa-user fa-3x"></i></a></span>
                                    </div>
                                </div>
                                <h2><span class="counter">10</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Departments</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <span><a href="/department"><i class="fa fa-home fa-3x"></i></a></span>
                                    </div>
                                </div>
                                <h2><span class="counter">10</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
