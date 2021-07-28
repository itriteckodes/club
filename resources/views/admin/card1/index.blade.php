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
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Card One Create</h2>
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
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('admin.cardOne.store')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Title </label>
                                                <input name="title" class="form-control" type="text"
                                                    placeholder="Enter card title  " required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="link">Link</label>
                                                <input type="text" name="link" id="link" class="form-control" placeholder="Enter link">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="logo">Image</label>
                                                <input type="file" name="image" id="image" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4 mt-3 text-left">
                                                <button type="submit" class="btn btn-success btn btn-lg ">
                                                    Create Card
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
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h3>All Categories</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SR#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Linke</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\CardOne::all() as $key => $card)
                                        <tr role="row">
                                            <td>{{ $key+1 }}</td>
                                            <td><img src="{{$card->image }}" alt="" height="50px" width="50px"></td>
                                            <td>{{$card->title }}</td>
                                            <td>{{$card->link }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info editCategory" data-toggle="modal"
                                                    data-target="#editModel" cardTitle="{{$card->title}}" cardLink="{{$card->link}}" cardId="{{$card->id}}">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger deleteCategory" data-toggle="modal"
                                                    data-target="#deleteModel"
                                                    cardId="{{$card->id}}">Delete</button>
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
                <h5 class="modal-title mt-0">Update Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="model-body p-3">
                <form id="updateCardForm"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group ">
                            <label>title </label>
                            <input name="title" class="form-control" id="cardTitle" type="text" placeholder="Enter card title " required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" id="cardLink" class="form-control" placeholder="Enter card link" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Update Card
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
                <h5 class="modal-title mt-0">Delete Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="deleteCardForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="form-group">
                        <h3 style="color: red">Are you sure you want to delete Card ?</h3>
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
        $('body').on('click','.editCategory',function(){
            let cardId = $(this).attr('cardId');
            let cardTitle = $(this).attr('cardTitle');
            let cardLink = $(this).attr('cardLink');
            $('#cardTitle').val(cardTitle);
            $('#cardLink').val(cardLink);
            $('#updateCardForm').attr('action','{{route('admin.cardOne.update','')}}'+'/'+cardId);
        }); 
        $('body').on('click','.deleteCategory',function(){
            let cardId = $(this).attr('cardId');
            $('#deleteCardForm').attr('action','{{route('admin.cardOne.destroy','')}}'+'/'+cardId);
        });
    });
</script>

@endsection