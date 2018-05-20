@extends('layouts.app')
@section('extra_style')
    <link href="{{ asset('admin/css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="login-content card">
            <div class="login-form">
                <h4>Register</h4>
                <div class="card-body">
                        <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="e.g.Name" /> 
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="e.g.Email" /> 
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input class="form-control" type="tel" id="telephone" name="phone" placeholder="e.g.+2349089786756" /> 
                            </div>
                            {{-- <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" id="gender">
                                    <option value="">-- Select Sex --</option>  
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>                                
                            </div> --}}
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> Agree the terms and policy
                                </label>
                            </div>
                        <button class="btn btn-success btn-flat m-b-30 m-t-30" id="add-user">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{ URL::route('login') }}"> Sign in</a></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var REGISTER_URL = "{{URL::route('register.store')}}";
    </script>
    <script src="{{ asset('js/pages/registration.js') }}" type="text/javascript"></script>
@endsection