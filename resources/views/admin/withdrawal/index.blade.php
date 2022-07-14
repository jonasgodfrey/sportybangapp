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

                            <h4 class="header-title mt-0 mb-4">Current Investment</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-2 float-start" dir="ltr">
                                    <h1><i class="fa fa-money-bill-alt"></i></h1>
                                </div>
                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ '₦ '.$current_investment ?? 'none' }} </h2>
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

                            <h4 class="header-title mt-0 mb-4">Current Withdrawal Amount </h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-2 float-start" dir="ltr">
                                    <h1><i class="fa fa-money-bill-alt"></i></h1>
                                </div>
                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">{{ '₦ '.$total_earnings ?? 'none' }} </h2>
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

                            <h4 class="header-title mt-0 mb-4">Withdraw Funds</h4>

                            <div class="widget-chart-1">
                                @if($withdraw_time === 'expired')
                                    <div class="widget-detail-1 text-end">
                                        <a href="/withdrawal/request/">
                                            <button type="submit" class="btn btn-success btn-lg"> 🤑 Withdraw</button>
                                        </a>
                                        <br>
                                    </div>

                                @elseif($withdraw_time === 'active')
                                    <div class="widget-detail-1 text-end">
                                        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-clock"></i> {{$days_left_string}}</button>
                                    </div>
                                @endif
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
