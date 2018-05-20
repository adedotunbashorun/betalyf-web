<div class="form-body">
    <div class="form-group">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" value="{{ $role->name }}" type="text" id="name1" name="name" placeholder="e.g.Role Name" />
            <input class="form-control" value="{{ $role->id }}" type="hidden" id="slug" name="name" placeholder="e.g.Role Name" /> 
        </div>
        <div class="form-group">
            <label>Permission</label>
            <select class="form-control select2" id="permission1" multiple="multiple">
                <option value=""> --Select Permissions--</option>
                @forelse($permissions as  $key => $perm)
                    @foreach ($role->permissions()->pluck('id') as $permission)
                        @if($perm->id == $permission)
                            <option value="{{ $perm->id }}" <?php echo ($perm['id'] == $permission) ? "selected" : ""; ?>>{{ $perm->name }}</option>
                        @elseif($perm->id != $permission)
                            <option value="{{ $perm->id }}">{{ $perm->name }}</option>
                        @endif
                    @endforeach
                @empty
                @endforelse
            </select>                                
        </div>                            
    </div>
</div>
<button type="button" class="btn btn-default dark" id="close" data-dismiss="modal">Close</button>
<button type="button" class="btn green" id="edit-role"><i class="fa fa-plus"></i> Edit Role</button>