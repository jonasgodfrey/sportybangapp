@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title"> Edit Your Bank Details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Bank Details</h4>
                            <br>
                            {{-- Flash message --}}
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>
                            {{-- Flash message end --}}
                            <form role="form" action="{{ '/account-details/update/'.$account_details->id  }}" enctype="multipart/form-data"
                                  method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Bank</label>
                                            <input type="text" name="bank_name" id="simpleinput" class="form-control"
                                                   value="{{$account_details->bank_name}}" required>
                                        </div>



                                    </div> <!-- end col -->

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Account Number</label>
                                            <input type="number" name="account_number" id="simpleinput" class="form-control"
                                                   value="{{$account_details->account_number}}" required>
                                        </div>


                                    </div> <!-- end col -->
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Account Name</label>
                                            <input type="text" id="example-email" name="account_name" class="form-control"
                                                   value="{{$account_details->account_name}}" required>
                                        </div>


                                    </div>

                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md">Update Details</button>
                                    </div>

                                </div>
                                <!-- end row-->
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->

    </div>
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
