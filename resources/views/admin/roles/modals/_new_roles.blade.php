<div id="new-role" class="modal modal-fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span class="icon-layers font-green"></span> New Role</h4>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-window-close-o"></i></button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div id="serverError"></div>
                    <div class="form-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="e.g.Role Name" /> 
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <select class="form-control select2" id="permission" multiple="multiple">
                                    <option value=""> --Select Permissions--</option>
                                    @forelse($permissions as $perm)
                                        <option value="{{ $perm->id }}">{{ $perm->name }}</option>
                                    @empty
                                    @endforelse
                                </select>                                
                            </div>                            
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default dark" id="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="add-role"><i class="fa fa-plus"></i> Add Roles</button>
            </div>
            </form>
        </div>
    </div>
</div>