<div id="new-hospital" class="modal modal-fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title"><span class="icon-layers font-green"></span> New {{ $page_name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-window-close-o"></i></button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div id="serverError"></div>
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Name</label>
                                <input class="form-control" type="text" id="name"/> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Hospital Category</label>
                                <select class="form-control" id="category_id">
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>                                
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label"> State</label>
                                <select class="form-control" id="state_id">
                                    <option value="">-- Select State --</option>
                                    @forelse($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
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
                                <input class="form-control" type="text" id="lat" placeholder="e.g. 98.0000" /> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Longtitude</label>
                                <input class="form-control" type="email" id="lng" placeholder="e.g. 67.897888" /> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Location</label>
                                <input class="form-control" type="tel" id="location" placeholder="e.g. Hospital Address" /> 
                            </div> 
                            <div class="form-group col-md-6">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="tel" id="email" placeholder="e.g. hospital@hos.com" /> 
                            </div>  
                            <div class="form-group col-md-6">
                                <label class="control-label">Telephone</label>
                                <input class="form-control" type="tel" id="telephone" name="phone" placeholder="e.g.+2349089786756" /> 
                            </div> 
                            <div class="form-group col-md-6">
                                <label class="control-label">Website</label>
                                <input class="form-control" type="tel" id="website" placeholder="e.g. hospital.com" /> 
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Marker Icon</label>
                                <input class="form-control" type="file" id="icon" /> 
                            </div>                          
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="add-hospital"><i class="fa fa-plus"></i> Add Hospital</button>
            </div>
            </form>
        </div>
    </div>
</div>