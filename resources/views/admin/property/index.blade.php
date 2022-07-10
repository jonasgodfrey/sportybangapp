@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title"> Add Your Bank Details</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Your Bank Details</h4>
                            <br>
                            {{-- Flash message --}}
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>
                            {{-- Flash message end --}}
                            <form role="form" action="{{ route('property.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Bank</label>
                                            <input type="text" name="bankname" id="simpleinput" class="form-control"
                                                placeholder="" required>
                                        </div>                                      

                                       

                                    </div> <!-- end col -->

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Account Number</label>
                                            <input type="number" name="accno" id="simpleinput" class="form-control"
                                                placeholder="account number" required>
                                        </div>                                      

                                        
                                    </div> <!-- end col -->
                                    <div class="col-lg-4">
                                        
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Account Name</label>
                                            <input type="text" id="example-email" name="accname" class="form-control"
                                                placeholder="account name" required>
                                        </div>

                                        
                                    </div> 

                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md">Add Account Number</button>
                                    </div>

                                </div>
                                <!-- end row-->
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">My Bank Details</h4>
                            <br>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Bank Name</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                   
                                        <tr>
                                            <td>1</td>
                                            <td>Janet Joe</td>
                                            <td>0121516023</td>
                                            <td>GTB</td>
                                            <td>
                                                <div class="row">
                                                    
                                                    <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div>
                                                </div>                                              
                                            </td>
                                        </tr>
                                   

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->




        </div> <!-- container-fluid -->

    </div>
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
