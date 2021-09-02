<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

 <!-- custom head -->
         <!-- Morris Chart CSS for all blade -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- Morris Chart CSS for all blade end-->


        <!-- jquery-confirm -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

        <!-- jquery-growl -->
        <link href="{{URL::to('assets/jquery-growl/stylesheets/jquery.growl.css')}}" rel="stylesheet" type="text/css" />


        @yield('css')  
 <!-- custom head end         -->

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
         
            <!-- Begin page -->
            <div id="wrapper">

            <!-- Top Bar Start -->
            @include('layouts.partials.dashboard-navbar')
            <!-- Top Bar End -->
            
            <!-- side bar -->
            @include('layouts.partials.dashboard-sidebar')
            <!-- side bar end -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            @yield('container')

            <!-- footer start -->
            @include('layouts.partials.dashboard-footer')
            <!-- footer end -->

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            </div>
            <!-- END wrapper -->

            <!-- add jquery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- for all balde jquery -->
            <!-- jQuery  -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/metismenu.min.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/waves.min.js"></script>

            <!--Morris Chart-->
            <script src="../plugins/morris/morris.min.js"></script>
            <script src="../plugins/raphael/raphael.min.js"></script>

            <script src="assets/pages/dashboard.init.js"></script>

            <!-- add page wise jquery link -->
            @yield('jquery')
            <!-- add page wise js link end -->

            <!-- multiselete -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
            <!-- multiselete end-->

            <!-- App js -->
            <script src="assets/js/app.js"></script>
            <!-- for all balde jquery end -->

            <!-- jquery-confirm -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

            <!-- jquery-growl -->
            <script src="{{URL::to('assets/jquery-growl/javascripts/jquery.growl.js')}}" type="text/javascript"></script>




            @yield('script')

            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
