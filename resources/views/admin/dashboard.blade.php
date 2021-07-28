@extends('admin.layout')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Admin</li>
                </ul>
                
            </div>
            {{-- <div class="col-lg-5 col-md-6 col-sm-12 text-right">
                <a href="{{ url('/') }}" class="btn btn-primary " >Shop Now</a>
            </div> --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="">
                    <div class="card widget_2 big_icon">
                        <div class="body bg-primary">
                            <h6 class="text-white"> Total Users</h6>
                            <h2 class="text-white"></h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="">
                <div class="card widget_2 big_icon">
                    <div class="body bg-danger">
                        <h6 class="text-white"> Total Fixers</h6>
                        <h2 class="text-white"></h2>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="">
                <div class="card widget_2 big_icon ">
                    <div class="body bg-info">
                        <h6 class="text-white"> Total Orders</h6>
                        <h2 class="text-white"></h2>
                    </div>
                </div>
            </a>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="">
                <div class="card widget_2 big_icon ">
                    <div class="body bg-info">
                        <h6 class="text-white"> Total Bookings</h6>
                        <h2 class="text-white"></h2>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
</section>

@endsection