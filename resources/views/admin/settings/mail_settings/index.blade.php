@extends('admin.partials.app')
@section('extra_style')
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Mail Information</h4>

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class=" control-label">Mail Host</label>
                                    <input type="text" class="form-control" id="mail_host" value="{{ $mailing['host'] }}" />
                                
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Host Username</label>
                                    <input type="text" class="form-control" id="host_username" value="{{ $mailing['username'] }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Host Password</label>
                                    <input type="password" class="form-control" id="host_password" value="{{ $mailing['password'] }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Host Port</label>
                                    <input type="number" class="form-control" id="host_port" value="{{ $mailing['port'] }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Mail Encryption</label>
                                        <select class="form-control" id="mail_encryption">
                                            <option name="none" <?php ($mailing['encryption'] == 'none') ? "selected" : ""; ?> >None</option>
                                            <option name="tls" <?php ($mailing['encryption'] == 'tls') ? "selected" : ""; ?>>TLS</option>
                                            <option name="ssl" <?php ($mailing['encryption'] == 'ssl') ? "selected" : ""; ?>>SSL</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Sender Name</label>
                                    <input type="text" class="form-control" id="sender_name" value="{{ $mailing['from_name'] }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Sender Email</label>
                                    <input type="text" class="form-control" id="sender_email" value="{{ $mailing['from_address'] }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Reply To</label>
                                    <input type="text" class="form-control" id="reply_to" value="{{ $mailing['reply_to'] }}">
                                    
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label class=" control-label"></label>
                                    <div class="col-md-9">
                                        <img src="{{ asset('images/loader.gif') }}" id="loader" /> 
                                        <button type="button" class="btn green" id="update_mail_settings_btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra_script')
    <script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection
@section('after_script')
    <script src="{{ asset('assets/pages/scripts/ui-sweetalert.min.js') }}" type="text/javascript"></script>
    <script>
        var UPDATE = "{{ URL::route('mailUpdate') }}";
        var TOKEN = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/pages/mail_settings.js') }}"></script>
@endsection
