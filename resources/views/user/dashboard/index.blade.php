@extends('user.partials.app')
@section('title','Dashboard')
@section('extra_main')
    <link href="{{ asset('admin/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
@endsection
@section('extra_styles')
@endsection
@section('content')
    <div class="row">
        @include('user.dashboard.partials._cards')
    </div>
    <div class="row">
        <div class="col-lg-8 col-xs-12 col-sm-12">
            @include('user.dashboard.partials._revenue_chart')
        </div>
        <div class="col-lg-4 col-xs-12 col-sm-12">
           @include('user.dashboard.partials._new_members')
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
@section('extra_script')

@endsection
@section('after_script')
    <script src="{{ asset('admin/js/lib/morris-chart/raphael-min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/morris-chart/morris.js') }}"></script>
    <script src="{{ asset('admin/js/lib/morris-chart/morris-init.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
@endsection
