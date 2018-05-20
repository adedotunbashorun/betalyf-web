@extends('layouts.app')
@section('extra_style')
@endsection
@section('content')
<div class="col-md-4 col-md-offset-4" id="login_div">
    <h2 align="center" style="color: #EC7063;">Sign in</h2><hr/>
    <form class="login-form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Email Address</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email Address" name="email" value="" required autofocus/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary form-control green uppercase" id="login">Login</button>
        </div><br/>
        <div class="form-actions">
            <center><a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a><br/><a href="{{ URL::route('index') }}" id="forget-password" class="forget-password">Home Page</a></center>
        </div>
    </form>
</div>
@endsection
@section('javascript')
<script>
    $(".login-form").on("submit",function(){
        $("#login").attr("disabled", true);
        $("#login").html("<i class='fa fa-spinner fa-spin'></i> Logging In...");
    });
</script>
@endsection
