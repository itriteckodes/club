@extends('admin.layout')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Profile</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <form action="{{route('admin.profile.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-12 mt-4">
                                                <label for="name">Admin Name</label>
                                                <input name="name" value="{{ $admin->name }}" class="form-control" type="text" required>
                                            </div>
                                            <div class="form-group col-md-12 mt-4">
                                                <label>Admin Email</label>
                                                <input name="email" value="{{ $admin->email }}" class="form-control" type="text" placeholder="Enter guardian email" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Password</label>
                                                <input name="password"  class="form-control" type="password" placeholder="Enter your password" >
                                            </div>
                                        </div>
                                        <div class="form-group ml-3">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Update Profile
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection