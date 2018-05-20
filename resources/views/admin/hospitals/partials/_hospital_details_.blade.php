<div class="form-body">
    <div class="form-group row">
        <div class="form-group col-md-12">
            <label class="control-label">Name</label>
            <input class="form-control" value="{{ $hospital_profile->name }}" type="text" id="name1" placeholder="e.g. St. Micheal" /> 
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
        <div class="form-group col-md-6" id="local">
            <label class="control-label">Local Govt.</label>
            <select class="form-control" id="local_id">
                <option value="{{ $hospital->local_id }}"></option>
            </select>
        </div>
        <div id="localss">
            
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Latitude</label>
            <input class="form-control" value="{{ $hospital->lat }}" type="text" id="lat1" placeholder="e.g. 98.0000" /> 
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Longtitude</label>
            <input class="form-control" value="{{ $hospital->lng }}" type="email" id="lng1" placeholder="e.g. 67.897888" /> 
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Location</label>
            <input class="form-control" value="{{ $hospital_profile->location }}" type="text" id="location1" placeholder="e.g. Hospital Address" /> 
        </div> 
        <div class="form-group col-md-6">
            <label class="control-label">Email</label>
            <input class="form-control" value="{{ $hospital_profile->email }}" type="email" id="email1" placeholder="e.g. hospital@hos.com" /> 
        </div>  
        <div class="form-group col-md-6">
            <label class="control-label">Telephone</label>
            <input class="form-control" type="tel" value="{{ $hospital->phone }}" id="telephone1" name="phone" placeholder="e.g.+2349089786756" /> 
        </div> 
        <div class="form-group col-md-6">
            <label class="control-label">Website</label>
            <input class="form-control" type="text" value="{{ $hospital_profile->website }}" id="website1" placeholder="e.g. hospital.com" /> 
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Marker Icon</label>
            <input class="form-control" type="file" id="icon1" /> 
        </div>                          
    </div>
</div>
<button type="button" class="btn btn-info" id="edit-hospital"><i class="fa fa-plus"></i> Edit Hospital</button>