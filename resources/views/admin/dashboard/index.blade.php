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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Investments</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#F9B9B9" value="{{ $properties }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> ₦{{ $properties }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Earnings</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#FF00CC" value=" {{ $units }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> ₦{{ $units }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Referrals</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#4300A3" value=" {{ $tenants_num }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $tenants_num }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                

            </div>
            <!-- end row -->            


            


            <div class="row">

                <div class="col-xl-12">
                    <center>
                    <a href="/subscription" class="btn btn-lg btn-primary">Subscribe Here</a>
                    </center><br>
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

                            <h4 class="header-title mt-0 mb-3">Transaction History</h4>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Investor</th>
                                            <th>Amount</th>                                            
                                            <th>Start Date</th>
                                            <th>Withdrawal Date</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <td>1</td>
                                                <td>Austin Solomon</td>
                                                <td>50000</td>                                                
                                                <td>12/12/2021</td>                                               
                                                <td>17/12/2021</td>                                               
                                                <td><span class="badge bg-success">Withdrawn</span></td>                                              

                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Austin Solomon</td>
                                                <td>50000</td>                                                
                                                <td>12/01/2021</td>                                               
                                                <td>17/01/2021</td>                                               
                                                <td><span class="badge bg-warning">In Progress</span></td>                                              

                                            </tr>
                                       

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
