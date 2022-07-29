@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sporty Bang</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                        <br>
                        {{-- Flash message --}}
                        <div id="alert">
                            @include('partials.flash')
                            @include('partials.modal')
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Registered Users</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                           data-bgColor="#F9B9B9" value="{{ $regusers }}" data-skin="tron"
                                           data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">{{ $regusers ?? '0' }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Number of Investors</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                           data-bgColor="#4300A3" value="{{ $investors}}" data-skin="tron"
                                           data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">{{ $investors ?? '0' }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Investment</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                           data-bgColor="#FF00CC" value="{{ $investors }}" data-skin="tron"
                                           data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">₦{{ $transaction ?? '0' }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Payouts</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                           data-bgColor="#4300A3" value="0" data-skin="tron"
                                           data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">₦0.00</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->


            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-12">
                   
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>

                            <h4 class="header-title mt-0 mb-3">Subscribers</h4>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Investor</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Subscription Date</th>
                                        <th>Status</th>

                                    </tr>
                                    </thead>
                                 
                                    <tbody>
                                  

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

            <!-- end row -->

            <div class="row">

                <div class="col-xl-12">
                   
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>

                            <h4 class="header-title mt-0 mb-3">Withdrawal Request</h4>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Investor</th>
                                        <th>Amount</th>
                                        <th>Earnings/Capital</th>
                                        <th>Due Date</th>
                                        <th>Request Date</th>
                                        <th>Status</th>

                                    </tr>
                                    </thead>
                                 
                                    <tbody>
                                  

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
