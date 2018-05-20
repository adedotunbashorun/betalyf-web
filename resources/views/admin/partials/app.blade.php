<?php $config = \App\GeneralSetting::find(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">
    <title>BetaLyf | @yield('title')</title>
    @yield('extra_main')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    @yield('extra_styles')
    
    <link href="{{ asset('admin/css/lib/toastr/toastr.min.css') }}" rel="stylesheet">
</head>
    <body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
        <audio id="notifyAudio" style="display:none;"><source src="{{asset('js/plucky.mp3')}}" type="audio/mpeg"></audio>
    <div id="main-wrapper">
        @include('admin.partials.header')
        @include('admin.partials.menu')
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">{{ $page_name }}</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $page_name }}</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
                @yield('modals')
            </div>
            @include('admin.partials.footer')
        </div>
    </div>
        

         <script src="{{ asset('admin/js/lib/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('admin/js/lib/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="admin/js/lib/jquery-ui/jquery-ui.min.js"></script>
         <script src="admin/js/lib/jquery/jquery.ui.touchpunch.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
        <!--Menu sidebar -->
        <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
        <!--stickey kit -->
        <script src="{{ asset('admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>        
        <!--Custom JavaScript -->
        <script src="{{ asset('admin/js/custom.min.js') }}"></script>
        
        <script src="{{ asset('admin/js/lib/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('js/utilities.js') }}" type="text/javascript"></script>
        <script>
            var NOTIFY = "{{URL::route('dashboardNotify')}}";
            var NOTIFY_COUNT = parseInt(<?php echo count(auth()->user()->unreadNotifications); ?>);
        </script>
        @yield('extra_script')

        @yield('after_script')
        <!---notification messages---->
        @if(\Session::has('error'))
            <script type="text/javascript">
                toastr.error("{!! \Session::get('error') !!}");
            </script>
        @endif
        @if(\Session::has('success'))
            <script type="text/javascript">
                toastr.success("{!! \Session::get('success') !!}");
            </script>
        @endif
        @if(\Session::has('info'))
            <script type="text/javascript">
                toastr.info("{!! \Session::get('info') !!}");
            </script>
        @endif
        @if(\Session::has('warning'))
            <script type="text/javascript">
                toastr.warning("{!! \Session::get('warning') !!}");
            </script>
        @endif

        <script>
            $(document).ready(function(){
                $("#close-notify").on("click", function(){
                    $("#close").hide();
                });
                
            });
        </script>
    </body>
</html>
    