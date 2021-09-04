@extends('admin.layout')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Send Notifications</h2>
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
                                    <form action="{{route('admin.notification.send')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 mt-4">
                                                <label for="name">Title</label>
                                                <input name="title" class="form-control" placeholder="Enter Title" type="text" required>
                                            </div>
                                            <div class="form-group col-md-12 mt-4">
                                                <label>Body</label>
                                                <input name="body" class="form-control" type="text" placeholder="Enter Message" required>
                                            </div>
                                            <div class="form-group ml-3">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    Send Notification
                                                </button>
                                            </div>
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