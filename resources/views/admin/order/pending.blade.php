@extends('admin.layout')

@section('style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Pending Orders</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach (App\Models\Order::pending() as $key => $order)
                                        <tr role="row">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $order->fname }} {{ $order->lname }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->qty }}</td>
                                            <td>{{ $order->amount }}</td>
                                            @if ($order->status=='pending')
                                            <td>
                                                <p><span class="badge badge-warning">Pending</span></p>
                                            </td>
                                            @endif
                                            @if ($order->status=='approved')
                                            <td>
                                                <p><span class="badge badge-success">Approved</span> </p>
                                            </td>
                                            @endif
                                            @if ($order->status=='rejected')
                                            <td>
                                                <p><span class="badge badge-danger">Rejected</span></p>
                                            </td>
                                            @endif
                                            <td><button   data-toggle="modal" data-target="#approveModel" orderId="{{ $order->id }}" class="btn btn-primary approveOrders">Approve</button></td>
                                            <td><button   data-toggle="modal" data-target="#rejectModel" orderId="{{ $order->id }}" class="btn btn-danger rejectOrders">Reject</button></td>
                                            <td><a href="{{ route('admin.order.show',$order->id) }}" class="btn btn-info">Show</a></td>
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
    <div id="deleteModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="deleteTeacherForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="form-group">
                            <h3 style="color: red">Are you sure you want to delete student</h3>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="approveModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Approve Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h3 style="color: red">Are you sure you want to approve orders</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <a  class="btn btn-primary approveStatus">Approve</a>
                </div>
            </div>
        </div>
    </div>

    
    <div id="rejectModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Reject Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h3 style="color: red">Are you sure you want to reject orders</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <a  class="btn btn-danger rejectStatus">Reject</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<!-- Jquery DataTable Plugin Js -->
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
        $('body').on('click','.deleteTeacher',function(){
            let userId = $(this).attr('userId');
            $('#deleteTeacherForm').attr('action','{{route('admin.order.destroy','')}}'+'/'+userId);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('body').on('click','.approveOrders',function(){
            let orderId = $(this).attr('orderId');
            $('.approveStatus').attr('href','{{route('admin.order.approve','')}}'+'/'+orderId);
        }); 
        
        $('body').on('click','.rejectOrders',function(){
            let orderId = $(this).attr('orderId');
            $('.rejectStatus').attr('href','{{route('admin.order.reject','')}}'+'/'+orderId);
        });
    });
</script>
@endsection