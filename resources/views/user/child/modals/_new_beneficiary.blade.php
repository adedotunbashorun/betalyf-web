<div id="new-beneficiary" class="modal modal-fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title"><span class="icon-layers font-green"></span> New Client Information </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-window-close-o"></i></button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div id="serverError"></div>
                    <div class="form-body">
                        <h4>Parent's Information</h4>
                        <div class="form-group">                            
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input class="form-control" type="text" id="parent_name" name="name" placeholder="e.g.Name" /> 
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="e.g.Email" /> 
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mobile Number</label>
                                <input class="form-control" pattern="^\d{4}-\d{3}-\d{4}-\d{3}$" type="tel" id="telephone" name="phone" placeholder="e.g.+234-908-9786-756" required/> 
                            </div>
                            <hr/>
                            <h4>Child's Information</h4>
                            <div class="form-group">
                                <label class="control-label"> Name</label>
                                <input class="form-control" type="text" id="child_name" name="name" placeholder="e.g.Name" /> 
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select class="form-control" id="gender">
                                    <option value="">-- Select Sex --</option>  
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>                                
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of Birth</label>
                                <input type="date" id="dob" class="form-control" placeholder="dd/mm/yyyy">
                            </div>                           
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="add-beneficiary"><i class="fa fa-plus"></i> Add Info</button>
            </div>
            </form>
        </div>
    </div>
</div>