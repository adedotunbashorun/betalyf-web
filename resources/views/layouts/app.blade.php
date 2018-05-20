<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="">
    <meta name="description" content="" />
    <link rel="shortcut icon" href="" type="image/png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BetaLyf | @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/css/lib/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ ('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ ('bootstrap/css/login.css') }}" rel="stylesheet" type="text/css" />
    @yield("extra_style")
</head>

<body>
    <div class="content">
        <div class="row">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('admin/js/lib/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/toastr/toastr.min.js') }}"></script>
        <!-- scripit init-->
    <script src="{{ asset('admin/js/lib/toastr/toastr.init.js') }}"></script>
        @if($errors->has('email') || $errors->has('password'))
            <script type="text/javascript">
                toastr.error("{{ $errors->first('email') }} {{ $errors->first('password') }}");
            </script>
        @endif
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
        @yield('javascript') 
    </body>
</html>