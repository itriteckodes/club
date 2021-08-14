@extends('admin.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h3>All Users</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Registration Date</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\User::all() as $key => $user)
                                        <tr role="row">
                                            <td>{{ $key+1 }}</td>
                                            <td><img src="{{$user->picture }}" alt="" height="50px" width="50px"></td>
                                            <td>{{$user->name }}</td>
                                            <td>{{$user->email }}</td>
                                            <td>{{$user->created_at->format('d-M-y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info editUser" data-toggle="modal"
                                                    data-target="#editModel" userName="{{$user->name}}" userEmail="{{$user->email}}" userId="{{$user->id}}" >Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger deleteUser" data-toggle="modal"
                                                    data-target="#deleteModel"
                                                    userId="{{$user->id}}">Delete</button>
                                            </td>
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
    
</section>

<div id="editModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="model-body p-3">
                <form id="updateUserForm"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group ">
                            <label>Name </label>
                            <input name="title" class="form-control" id="name" type="text" placeholder="Enter name " required>
                        </div>
                        <div class="form-group">
                            <label for="link">Email</label>
                            <input type="email" name="link" id="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="image">Picture</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Update User
                            </button>
                        </div>
                </form>
            </div>
           
        </div>
    </div>
</div>

<div id="deleteModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="deleteUserForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="form-group">
                        <h3 style="color: red">Are you sure you want to delete User ?</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> 
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script>
    $(document).ready(function(){
        $('body').on('click','.editUser',function(){
            let userId = $(this).attr('userId');
            let userName = $(this).attr('userName');
            let userEmail = $(this).attr('userEmail');
            $('#name').val(userName);
            $('#email').val(userEmail);
            $('#updateUserForm').attr('action','{{route('admin.user.update','')}}'+'/'+userId);
        }); 
        $('body').on('click','.deleteUser',function(){
            let userId = $(this).attr('userId');
            $('#deleteUserForm').attr('action','{{route('admin.user.destroy','')}}'+'/'+userId);
        });
    });
</script>

@endsection