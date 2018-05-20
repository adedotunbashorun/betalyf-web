<div id="new-user" class="modal modal-fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><span class="icon-layers font-green"></span> New User</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div id="serverError"></div>
                    <div class="form-body">
                        <div class="form-group">
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
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" id="gender">
                                    <option value="">-- Select Sex --</option>  
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>                                
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2" id="role" multiple="multiple">
                                    <option value=""> --Select Roles--</option>
                                    @forelse($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @empty
                                    @endforelse
                                </select>                                
                            </div>                            
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn green" id="add-user"><i class="fa fa-plus"></i> Add User</button>
            </div>
            </form>
        </div>
    </div>
</div>