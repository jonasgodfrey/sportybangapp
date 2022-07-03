<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard | SPORTYBANG') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/logo4app.png">

    <!-- App css -->
    <link href="/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="/app-default-stylesheet" />

    <link href="/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled" />
    <link href="/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="/app-dark-stylesheet"
        disabled="disabled" />
    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- third party css -->
     <link href="/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <link href="/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
     <!-- third party css end -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6-beta8/css/tempus-dominus.css" integrity="sha512-6yAyDTW6ClcAFzf3StRuE1JOBLSOW6nIkrOqeEwHQjxwYz2ZLx4yt+ibzEzXXONvU0ENq4xQDnlnc8B4oqZpJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<!-- body start -->

<body class="loading" data-layout-mode="horizontal"
    data-layout='{"mode": "dark", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">
        @include('layouts.nav')
        @include('layouts.menu')

        <div class="content-page">
            <!-- content -->
            @yield('content')

            @include('layouts.footer')
        </div>
        <!-- End Page content -->
    </div>
    <!-- END wrapper -->

    

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="/assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="/assets/libs/morris.js06/morris.min.js"></script>
    <script src="/assets/libs/raphael/raphael.min.js"></script>

    <!-- App js-->
    <script src="/assets/js/app.min.js"></script>
     <!-- third party js -->
     <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
     <script src="/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
     <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
     <script src="/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
     <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
     <script src="/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
     <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
     <script src="/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
     <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
     <script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
     <script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
     <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
     <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js" integrity="sha512-x/vqovXY/Q4b+rNjgiheBsA/vbWA3IVvsS8lkQSX1gQ4ggSJx38oI2vREZXpTzhAv6tNUaX81E7QBBzkpDQayA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6-beta8/js/tempus-dominus.js" integrity="sha512-MPMzIx+Gq1BNJqltvB19yXU9BAWr+YHL/NcgAcNhPM7gqQvWJQE00cZOC5n3KSpdH5q/imNmC2gvB3LeoMAajw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!-- third party js ends -->
     <!-- Datatables init -->
     <script src="/assets/js/pages/datatables.init.js"></script>

    @php
        $user = Auth::user();
		$date_time_string = '';
        if($user->subscription){
			$sub =  $user->subscription->where('status', 'active')->first();
            $carbon_init = Carbon\Carbon::parse( $sub->end_date ?? '' );
            $date_time_string = $carbon_init->toFormattedDateString() .' ' . $carbon_init->toTimeString();
        }
    @endphp

    <script>

        // Set the date we're counting down to
        if( '{{$date_time_string}}' !== ''){

            let countDownDate = new Date( '{{$date_time_string}}').getTime()

            // Update the count-down every 1 second
            const x = setInterval( function() {

                // Get today's date and time
                let now = new Date().getTime()

                // Find the distance between now and the count down date
                let distance = countDownDate - now

                // Time calculations for days, hours, minutes and seconds
                let days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) )
                let hours = Math.floor( ( distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) )
                let minutes = Math.floor( ( distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) )
                let seconds = Math.floor( ( distance % ( 1000 * 60 ) ) / 1000 )

                // Display the result in the element with id="demo"
                document.getElementById( 'countdown-timer' ).innerHTML = days + 'd  ' + hours + 'h  '
                    + minutes + 'm ' + seconds + 's '

                // If the count down is finished, write some text
                if( distance < 0 ) {
                    clearInterval( x )
                    document.getElementById( 'countdown-timer' ).innerHTML = 'EXPIRED'
                }
            }, 1000 )
        }else{
            document.getElementById( 'clockdiv' ).innerHTML = ''
        }

    </script>
     <!-- App js -->
    @yield('js');

</body>

</html>
