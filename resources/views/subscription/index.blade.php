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
                        <h3> <b style="text-transform: capitalize">Welcome Onboard {{ Auth::user()->name }}</b> !</h3>

                        <footer class="blockquote-footer">
                            <h4 class="text-center justify-center text-red-600">
                                Please select an Investment plan you are
                                comfortable with
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
                                                <h3 class="plan-title">Step-up stage</h3>
                                                <h2 class="plan-title">₦5,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>                                                
                                            </ul>

                                            <div class="text-center">
                                            <a href="https://paystack.com"
                                                   class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>


                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="ribbon"><span>POPULAR</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Up-Grade Stage</h3>
                                                <h2 class="plan-title">₦10,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>                                                
                                            </ul>

                                            <div class="text-center">
                                            <a href="https://paystack.com"
                                                   class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="ribbon"><span></span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Income-Stage</h3>
                                                <h2 class="plan-title">₦20,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>                                                
                                            </ul>

                                            <div class="text-center">
                                                <a href="https://paystack.com"
                                                   class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <!--Pricing Column-->
                                <article class="pricing-column col-xl-3 col-md-6">
                                    <div class="ribbon"><span>EXECUTIVE</span></div>
                                    <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Capital-Stage</h3>
                                                <h2 class="plan-title">₦50,000.00</h2>
                                                <div class="plan-duration">Per Week</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>30% Returns</li>
                                                <li>Weekly Basis</li>                                                
                                            </ul>

                                            <div class="text-center">
                                                <a href="https://paystack.com"
                                                   class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>


                            </div><!-- end row -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
           

        </div> <!-- container-fluid -->


    </div> <!-- content -->
@endsection
@section('js')
   
@endsection
