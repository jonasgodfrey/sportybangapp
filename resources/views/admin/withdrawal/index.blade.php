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
                        <br> {{-- Flash message --}}
                        <div id="alert">
                            @include('partials.flash')
                            @include('partials.modal')
                        </div>
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

                            <h4 class="header-title mt-0 mb-4">Investment Capital</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-2 float-start" dir="ltr">
                                    <h1><i class="fa fa-money-check"></i></h1>
                                </div>
                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ '₦ '.$subscription->amount ?? 'none' }} </h2>
                                </div>
                                <br>
                                <div class="widget-detail-1 text-end">

                                    @if($subscription->amount !== null)
                                        <form action="{{route('withdrawal.request.capital')}}" method="post" id="request-capital">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-lg text-white modal-btn capital-w" data-toggle="modal"
                                                    data-target="=#exampleModal">
                                                Request for Capital
                                            </button>
                                        </form>

                                    @else($withdrawal_status === 'inactive')
                                        <button type="button" class="btn btn-danger btn-lg text-white modal-btn" data-toggle="modal"
                                                data-target="=#exampleModal">
                                            <i class="fa fa-lock"></i> No Capital
                                        </button>
                                    @endif
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

                            <h4 class="header-title mt-0 mb-4">Cumulative Withdrawal Amount </h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-2 float-start" dir="ltr">
                                    <h1><i class="fa fa-money-bill-alt"></i></h1>
                                </div>
                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">{{ '₦ '.$subscription->cumulative_profit ?? 'none' }} </h2>
                                    <br>
                                    @if($withdrawal_status === 'active')
                                        <div class="widget-detail-1 text-end">
                                            <form action="/withdrawal/request/" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-lock-open"></i> Withdraw</button>
                                            </form>
                                        </div>
                                    @elseif($withdrawal_status === 'inactive')
                                        <div class="widget-detail-1 text-end">
                                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-lock"></i> {{$days_left_string ?? 'none'}}
                                            </button>
                                        </div>
                                    @else
                                        <div class="widget-detail-1 text-end">
                                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-lock"></i> empty balance</button>
                                        </div>
                                    @endif
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

                            <h4 class="header-title mt-0 mb-4">Current Withdrawal amount</h4>
                            <div class="widget-chart-box-2 float-start" dir="ltr">
                                <h1><i class="fa fa-money-check-alt"></i></h1>
                            </div>
                            <div class="widget-chart-1">
                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1">{{ '₦ '.$subscription->current_profit ?? 'none' }} </h2>

                                </div>
                                <br> <br> <br>
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
    <script>
        $.ajaxSetup( {
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            }
        } )

        $( '.capital-w' ).click( function(e) {
            e.preventDefault()

            Swal.fire( {
                title: 'All capital withdrawal request takes at least 1 week for processing, \n are you sure ??',
                icon: 'warning',
                showDenyButton: true,
                showConfirmButton: false,
                showCancelButton: true,
                denyButtonText: `Proceed`
            } ).then( ( result ) => {
                /* Read more about isConfirmed, isDenied below */
                if( result.isDenied ) {
                    $( '#request-capital' ).submit()
                }
        } )
        } )
    </script>
    <script src="dist/js/selectField.js"></script>
@endsection
