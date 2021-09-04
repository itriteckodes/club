<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>B & C | Admin</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('admin/assets/plugins/charts-c3/plugin.css')}}"/>
<link href="{{ asset('admin/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admin/assets/plugins/morrisjs/morris.min.css')}}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/style.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/summernote/dist/summernote.css') }}"/>
<link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
@yield('style')
</head>

<body class="theme-blush right_icon_toggle">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('admin/assets/images/loader.svg')}}" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ url('/') }}" title="Click to go on website"><img src="{{asset('logo.jpeg')}}" width="25" alt="Aero"><span class="m-l-10">B&C</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            {{-- <li>
                <div class="user-info">
                    <a class="image" href="#"><img src="{{asset('admin/assets/images/profile_av.jpg')}}" alt="User"></a>
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>                    
                    </div>
                </div>
            </li> --}}
            <li class="{{Request::is('admin/dashboard')? 'active':''}}"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            {{-- <li class="{{Request::is('admin/brand')? 'active':''}}"><a href="{{ route('admin.brand.index') }}"><i class="zmdi zmdi-chart"></i><span>Brand</span></a></li> --}}
            {{-- <li class="{{Request::is('admin/category')? 'active':''}}"><a href="{{ route('admin.category.index') }}"><i class="zmdi zmdi-hc-fw"></i><span>Category</span></a></li> --}}
            
            {{-- <li class="{{Request::is('admin/product*') ? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-collection-folder-image"></i><span>Products</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.product.create') }}">Add New Product</a></li>
                    <li><a href="{{ route('admin.product.index') }}">All  Products</a></li>
                </ul>
            </li>  
            <li class="{{Request::is('admin/user*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.user.index')}}"> Users List</a></li>  
                </ul>
            </li>  --}}
            {{-- <li class="{{Request::is('admin/fixer*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Fixers</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.fixer.index')}}"> Fixers List</a></li>  
                    <li><a href="{{route('admin.approved.fixer')}}"> Approved Fixers</a></li>  
                    <li><a href="{{route('admin.blocked.fixer')}}"> Blocked Fixers</a></li>  
                </ul>
            </li>  --}}
            
            {{-- <li class="{{Request::is('admin/booking*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Fixer Booking</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.booking.index')}}"> Bookings List</a></li>  
                    <li><a href="{{route('admin.pending.booking')}}"> Pending Bookings </a></li>  
                    <li><a href="{{route('admin.approved.booking')}}"> Approved Bookings</a></li>  
                    <li><a href="{{route('admin.rejected.booking')}}"> Rejected Bookings</a></li>  
                </ul>
            </li>  --}}
            
            {{--  <li class="{{Request::is('admin/rule*') ? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Rules</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.rule.create') }}">Add New Rule</a></li>
                    <li><a href="{{ route('admin.rule.index') }}">All  Rules</a></li>
                </ul>
            </li> 
            <li class="{{Request::is('admin/squad')? 'active':''}}"><a href="{{ route('admin.squad.index') }}"><i class="zmdi zmdi-home"></i><span>Squads</span></a></li>
            <li class="{{Request::is('admin/depositMethod*') ? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Deposit Method</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.depositMethod.create') }}">Add New Method</a></li>
                    <li><a href="{{ route('admin.depositMethod.index') }}">All  Methods</a></li>
                </ul>
            </li>  
            
            <li class="{{Request::is('admin/withdrawMethod*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Withdraw Method</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.withdrawMethod.create') }}">Add New Method</a></li>
                    <li><a href="{{ route('admin.withdrawMethod.index') }}">All  Methods</a></li>
                </ul>
            </li> 
            
            <li class="{{Request::is('admin/deposits*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>TopUp</span></a>
                <ul class="ml-menu">
                    <li ><a href="{{ route('admin.today.deposits') }}">Today Requests</a></li>
                    <li><a href="{{ route('admin.pending.deposits') }}">Pending Requests</a></li>
                    <li><a href="{{ route('admin.approved.deposits') }}">Approved Requests</a></li>
                    <li><a href="{{ route('admin.rejected.deposits') }}">Rejected Requests</a></li>
                    <li><a href="{{ route('admin.deposits.index') }}">TopUp History</a></li>
                </ul>
            </li> 

            <li class="{{Request::is('admin/withdraw*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Withdraw</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.today.withdraw') }}">Today Requests</a></li>
                    <li><a href="{{ route('admin.pending.withdraw') }}">Pending Requests</a></li>
                    <li><a href="{{ route('admin.approved.withdraw') }}">Approved Requests</a></li>
                    <li><a href="{{ route('admin.rejected.withdraw') }}">Rejected Requests</a></li>
                    <li><a href="{{ route('admin.withdraw.index') }}">Withdraw History</a></li>
                </ul>
            </li> --}}
            <li class="{{Request::is('admin/user*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.user.index')}}"> Users List</a></li>  
                </ul>
            </li> 

            <li class="{{Request::is('admin/card*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Cards</span></a>
                <ul class="ml-menu">
                    <li class="{{Request::is('admin/cardOne/index')? 'active':''}}"><a href="{{route('admin.cardOne.index')}}"> Card One</a></li>
                    <li class="{{Request::is('admin/cardTwo/index')? 'active':''}}"><a href="{{route('admin.cardTwo.index')}}"> Card Two</a></li>
                </ul>
            </li> 
            

            {{-- <li class="{{Request::is('admin/contact')? 'active':''}}"><a href="{{route('admin.contact.index')}}"><i class="zmdi zmdi-comments zmdi-hc-fw"></i><span>Query</span></a></li> --}}
            <li class="{{Request::is('admin/notification')? 'active':''}}"><a href="{{route('admin.notification.index')}}"><i class="zmdi zmdi-notifications"></i><span>Notifications</span></a></li>
            
            <li class="{{Request::is('admin/profile')? 'active':''}}"><a href="{{route('admin.profile.index')}}"><i class="zmdi zmdi-account "></i><span>Profile</span></a></li>

            <li ><a href="{{route('admin.logout')}}"><i class="zmdi zmdi-power"></i><span>Logout</span></a></li>


            {{-- <li class="{{Request::is('admin/type/create')? 'active':''}}"><a href="#"><i class="zmdi zmdi-account "></i><span>Type</span></a></li> --}}

            {{-- <li class="{{Request::is('admin/company*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Companies</span></a>
                <ul class="ml-menu">
                    <li class="{{Request::is('admin/company/create')? 'active':''}}"><a href="{{route('admin.company.create')}}">Add Company</a></li>
                    <li class="{{Request::is('admin/company')? 'active':''}}"><a href="{{route('admin.company.index')}}">Company List</a></li>
                </ul>
            </li> --}}
            {{--             
            <li class="{{Request::is('admin/driver*')? 'active':''}}"><a href="{{route('admin.driver.index')}}" ><i class="zmdi zmdi-apps"></i><span>Driver List</span></a>
            </li>
            
            <li class="{{Request::is('admin/truck')? 'active':''}}"><a href="{{route('admin.truck.index')}}" ><i class="zmdi zmdi-apps"></i><span>Truck List</span></a>
            </li>
            <li class="{{Request::is('admin/vehicle*')? 'active':''}}"><a href="{{route('admin.vehicle.index')}}" ><i class="zmdi zmdi-apps "></i><span>Vehicle</span></a>
               
            </li>

            <li class="{{Request::is('admin/shift')? 'active':''}}"> <a href="{{route('admin.shift.index')}}" ><i class="zmdi zmdi-folder"></i><span>Shifts</span></a>
               
            </li> 
            <li class="{{Request::is('admin/part*')? 'active':''}}"> <a href="{{route('admin.part.index')}}" ><i class="zmdi zmdi-folder"></i><span>Part List</span></a>
               
            </li>
               
            </li>
            <li class="{{Request::is('admin/history*')? 'active':''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps "></i><span>History</span></a>
                <ul class="ml-menu">
                    <li class="{{Request::is('admin/history/truck')? 'active':''}}"><a href="{{route('admin.history.truck')}}">Truck Shifts</a></li>
                    <li class="{{Request::is('admin/history/driver')? 'active':''}}"><a href="{{route('admin.history.driver')}}">Driver Shifts</a></li>
                </ul>
            </li> --}}

        
         
            
            {{-- <li ><a href="{{route('logout')}}"><i class="zmdi zmdi-account "></i><span>Logout</span></a></li> --}}
            {{-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>Trailor</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.addTrailor')}}">Add Trailor</a></li>
                    <li><a href="{{route('admin.trailors')}}">Trailor List</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Drive</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.addDriver')}}">Add Driver</a></li>
                    <li><a href="{{route('admin.drivers')}}">Driver LIst</a></li>
                    <!-- <li><a href="ticket-list.html">Ticket List</a></li>
                    <li><a href="ticket-detail.html">Ticket Detail</a></li> -->
                </ul>
            </li> --}}
            {{-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                <ul class="ml-menu">
                    <li><a href="blog-dashboard.html">Dashboard</a></li>
                    <li><a href="blog-post.html">Blog Post</a></li>
                    <li><a href="blog-list.html">List View</a></li>
                    <li><a href="blog-grid.html">Grid View</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Ecommerce</span></a>
                <ul class="ml-menu">
                    <li><a href="ec-dashboard.html">Dashboard</a></li>
                    <li><a href="ec-product.html">Product</a></li>
                    <li><a href="ec-product-List.html">Product List</a></li>
                    <li><a href="ec-product-detail.html">Product detail</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>Components</span></a>
                <ul class="ml-menu">
                    <li><a href="ui_kit.html">Aero UI KIT</a></li>                    
                    <li><a href="alerts.html">Alerts</a></li>                    
                    <li><a href="collapse.html">Collapse</a></li>
                    <li><a href="colors.html">Colors</a></li>
                    <li><a href="dialogs.html">Dialogs</a></li>                    
                    <li><a href="list-group.html">List Group</a></li>
                    <li><a href="media-object.html">Media Object</a></li>
                    <li><a href="modals.html">Modals</a></li>
                    <li><a href="notifications.html">Notifications</a></li>                    
                    <li><a href="progressbars.html">Progress Bars</a></li>
                    <li><a href="range-sliders.html">Range Sliders</a></li>
                    <li><a href="sortable-nestable.html">Sortable & Nestable</a></li>
                    <li><a href="tabs.html">Tabs</a></li>
                    <li><a href="waves.html">Waves</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-flower"></i><span>Font Icons</span></a>
                <ul class="ml-menu">
                    <li><a href="icons.html">Material Icons</a></li>
                    <li><a href="icons-themify.html">Themify Icons</a></li>
                    <li><a href="icons-weather.html">Weather Icons</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Forms</span></a>
                <ul class="ml-menu">
                    <li><a href="basic-form-elements.html">Basic Form</a></li>
                    <li><a href="advanced-form-elements.html">Advanced Form</a></li>
                    <li><a href="form-examples.html">Form Examples</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-editors.html">Editors</a></li>
                    <li><a href="form-upload.html">File Upload</a></li>
                    <li><a href="form-summernote.html">Summernote</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-grid"></i><span>Tables</span></a>
                <ul class="ml-menu">
                    <li><a href="normal-tables.html">Normal Tables</a></li>
                    <li><a href="jquery-datatable.html">Jquery Datatables</a></li>
                    <li><a href="editable-table.html">Editable Tables</a></li>
                    <li><a href="footable.html">Foo Tables</a></li>
                    <li><a href="table-color.html">Tables Color</a></li>
                </ul>
            </li>            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-chart"></i><span>Charts</span></a>
                <ul class="ml-menu">
                    <li><a href="echarts.html">E Chart</a></li>
                    <li><a href="c3.html">C3 Chart</a></li>
                    <li><a href="morris.html">Morris</a></li>
                    <li><a href="flot.html">Flot</a></li>
                    <li><a href="chartjs.html">ChartJS</a></li>
                    <li><a href="sparkline.html">Sparkline</a></li>
                    <li><a href="jquery-knob.html">Jquery Knob</a></li>
                </ul>
            </li>            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span></a>
                <ul class="ml-menu">
                    <li><a href="widgets-app.html">Apps Widgets</a></li>
                    <li><a href="widgets-data.html">Data Widgets</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span></a>
                <ul class="ml-menu">
                    <li><a href="sign-in.html">Sign In</a></li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    <li><a href="forgot-password.html">Forgot Password</a></li>
                    <li><a href="404.html">Page 404</a></li>
                    <li><a href="500.html">Page 500</a></li>
                    <li><a href="page-offline.html">Page Offline</a></li>
                    <li><a href="locked.html">Locked Screen</a></li>
                </ul>
            </li>
            <li class="open_top"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample Pages</span></a>
                <ul class="ml-menu">
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="image-gallery.html">Image Gallery</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="invoices.html">Invoices</a></li>
                    <li><a href="invoices-list.html">Invoices List</a></li>
                    <li><a href="search-results.html">Search Results</a></li>
                </ul>
            </li>
            <li class="open_top"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-map"></i><span>Maps</span></a>
                <ul class="ml-menu">
                    <li><a href="google.html">Google Map</a></li>
                    <li><a href="yandex.html">YandexMap</a></li>
                    <li><a href="jvectormap.html">jVectorMap</a></li>
                </ul>
            </li>
            <li>
                <div class="progress-container progress-primary m-t-10">
                    <span class="progress-badge">Traffic this Month</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                            <span class="progress-value">67%</span>
                        </div>
                    </div>
                </div>
                <div class="progress-container progress-info">
                    <span class="progress-badge">Server Load</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                            <span class="progress-value">86%</span>
                        </div>
                    </div>
                </div>
            </li> --}}
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                                        
                </div>
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox rtl_support">
                                <input id="checkbox1" type="checkbox" value="rtl_view">
                                <label for="checkbox1">RTL Version</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox ms_bar">
                                <input id="checkbox2" type="checkbox" value="mini_active">
                                <label for="checkbox2">Mini Sidebar</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>                        
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
                            </div>
                        </li>
                    </ul>
                </div>                
            </div>                
        </div>       
        <div class="tab-pane right_chat" id="chat">
            <div class="slim_scroll">
                <div class="card">
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('admin/assets/images/xs/avatar4.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('admin/assets/images/xs/avatar5.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('admin/assets/images/xs/avatar2.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella <small class="float-right">11:31AM</small></span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('admin/assets/images/xs/avatar1.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">John <small class="float-right">05:00PM</small></span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('admin/assets/images/xs/avatar3.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander <small class="float-right">06:08PM</small></span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Main Content -->

@yield('content')


<!-- Jquery Core Js --> 
<script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('admin/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('admin/assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('admin/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/index.js')}}"></script>
<script src="{{ asset('admin/assets/plugins/summernote/dist/summernote.js') }}"></script>
<script src="{{asset('toastr/toastr.min.js')}}"></script>
{{-- @toastr_render --}}
@yield('scripts')


</body>
</html>