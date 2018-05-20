@extends('user.partials.app')
@section('title',$page_name)
@section('extra_style')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Profile</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="form-group row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" value="{{ $hospital->HospitalProfile->name }}" type="text" id="name1" placeholder="e.g. St. Micheal" /> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Hospital Category</label>
                                        <select class="form-control" id="category_id1">
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}" <?php echo ($hospital->hospital_category_id == $category->id) ? "selected" : ""; ?>>{{ $category->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>                                
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label"> State</label>
                                        <select class="form-control" id="state_id1">
                                            <option value="">-- Select State --</option>
                                            @forelse($states as $state)
                                                <option value="{{ $state->id }}" <?php echo ($hospital->state_id == $state->id) ? "selected" : ""; ?>>{{ $state->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>                                
                                    </div>
                                    <div id="locals">
                                        <div class="form-group">
                                            <label class="control-label" id="local_label">Local Govt.</label>
                                            <select class="form-control" id="local_id">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Latitude</label>
                                        <input class="form-control" value="{{ $hospital->lat }}" type="text" id="lat1" placeholder="e.g. 98.0000" /> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Longtitude</label>
                                        <input class="form-control" value="{{ $hospital->lng }}" type="text" id="lng1" placeholder="e.g. 67.897888" /> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Location</label>
                                        <input class="form-control" value="{{ $hospital->HospitalProfile->location }}" type="text" id="location1" placeholder="e.g. Hospital Address" /> 
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Email</label>
                                        <input class="form-control" value="{{ $hospital->HospitalProfile->email }}" type="email" id="email1" placeholder="e.g. hospital@hos.com" /> 
                                    </div>  
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Telephone</label>
                                        <input class="form-control" type="tel" value="{{ $hospital->HospitalProfile->phone }}" id="telephone1" name="phone" placeholder="e.g.+2349089786756" /> 
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Website</label>
                                        <input class="form-control" type="text" value="{{ $hospital->HospitalProfile->website }}" id="website1" placeholder="e.g. hospital.com" /> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Marker Icon</label>
                                        <input class="form-control" type="file" id="icon1" /> 
                                    </div>                          
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" id="updateProfile">Update Profile</button>
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
    <script>
        var TOKEN = "{{csrf_token()}}";
        var UPDATE_URL = "{{URL::route('hospitals.update')}}";
        var GET_EDIT_INFO = "{{URL::route('hospitals.editInfo')}}";
        var ADD_HOSPITAL = "{{URL::route('hospitals.store')}}";
        var LOCAL_GOVT = "{{ URL::route('hospitals.locals') }}";
    </script>
    <script src="{{ asset('js/pages/hospitals.js') }}" type="text/javascript"></script>
@endsection
@section('after_script')
@endsection