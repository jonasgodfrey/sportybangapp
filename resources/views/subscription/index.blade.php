@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                </div>
            </div>

            <!-- start page title -->

            <!-- end page title -->
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0 text-center">
                        <h3><b style="text-transform: capitalize">Welcome Onboard {{ Auth::user()->name }}</b> !</h3>

                        <footer class="blockquote-footer">
                            <h4 class="text-center justify-center text-red-600">
                                please select a subscription plan you are
                                comfortable with to proceed to our application
                            </h4>
                        </footer>
                    </blockquote>
                    <br>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-lg-10">
                            <div class="row">


                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Basic</h3>
                                                <h2 class="plan-title">₦5,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>

                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="500000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '1'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </article>


                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="ribbon"><span>POPULAR</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Standard</h3>
                                                <h2 class="plan-title">₦10,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>

                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="1000000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '2'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </article>

                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="ribbon"><span></span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Classic</h3>
                                                <h2 class="plan-title">₦20,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>

                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="2000000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '3'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </article>

                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="ribbon"><span>Premium</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">PREMIUM</h3>
                                                <h2 class="plan-title">₦50,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>
                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="5000000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '4'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </article>

                                <article class="pricing-column col-xl-4 col-md-6">
                                    <div class="ribbon"><span>Premium</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">SILVER</h3>
                                                <h2 class="plan-title">₦70,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>
                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="5000000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '4'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </article>

                                <article class="pricing-column col-xl-4 col-md-6">
                                    <div class="ribbon"><span>Diamond</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">DIAMOND</h3>
                                                <h2 class="plan-title">₦100,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>
                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="5000000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '4'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </article>

                                <article class="pricing-column col-xl-4 col-md-6">
                                    <div class="ribbon"><span>Gold</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">GOLD</h3>
                                                <h2 class="plan-title">₦200,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>
                                            </ul>
                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                                                  role="form">

                                                <div class="col-md-8 col-md-offset-2">
                                                    <input type="hidden" name="email"
                                                           value="{{Auth::user()->email}}"> {{-- required --}}
                                                    <input type="hidden" name="amount" class="form-control" id="amount" value="5000000">
                                                    <input type="hidden" name="orderID" value="345">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata"
                                                           value="{{ json_encode($array = ['plan_type' => '4'], JSON_THROW_ON_ERROR) }}">{{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                    <input type="hidden" name="reference"
                                                           value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                    <input type="hidden" name="callback_url" class="form-control"
                                                           value="{{route('handleGatewayCallback')}}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                </div>
                                                <div class="text-center">
                                                    <button class="btn  btn-bordered-success btn-success rounded-pill waves-effect waves-light" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </article>

                           


                            </div><!-- end row -->
                        </div>
                    </div>                    <!-- end row -->
                </div>
            </div>

        </div> <!-- container-fluid -->


    </div> <!-- content -->
@endsection
@section('js')

@endsection
