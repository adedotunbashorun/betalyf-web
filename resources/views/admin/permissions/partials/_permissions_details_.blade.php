<div class="form-body">
        <div class="form-group">
            <div class="form-group">
                <label>Permission Name</label>
                <input class="form-control" value="{{ $permission->name }}" type="text" id="name1" name="name" placeholder="e.g.Permission Name" />
                <input class="form-control" value="{{ $permission->id }}" type="hidden" id="slug" name="name" placeholder="e.g.Permission Name" />
            </div>                        
        </div>
    </div>
<button type="button" class="btn btn-info" id="edit-permission"><i class="fa fa-plus"></i> Edit Permission</button>
<button type="button" class="btn btn-default dark" id="close" data-dismiss="modal">Close</button>