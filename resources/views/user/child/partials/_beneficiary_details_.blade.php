<div class="form-body">
    <div class="form-group">
        <h4>Parent's Information</h4>
        <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control" type="text" value="{{ $beneficiary->parent_name }}" id="parent_name1" name="name" placeholder="e.g.Name" /> 
        </div>
        <div class="form-group">
            <label class="control-label">Email Address</label>
            <input class="form-control" type="email" value="{{ $beneficiary->email }}" id="email1" name="email" placeholder="e.g.Email" /> 
        </div>
        <div class="form-group">
            <label class="control-label">Mobile Number</label>
            <input class="form-control" type="tel" value="{{ $beneficiary->telephone }}" id="telephone1" name="phone" placeholder="e.g.+2349089786756" /> 
        </div>
        <hr>
        <h4>Child's Information</h4>
        <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control" type="text" value="{{ $beneficiary->child_name }}" id="child_name1" name="name" placeholder="e.g.Name" /> 
            <input class="form-control" type="hidden" value="{{ $beneficiary->slug }}" id="slug" name="name" placeholder="e.g.Name" /> 
        </div>
        
        <div class="form-group">
            <label class="control-label">Gender</label>
            <select class="form-control" id="gender1">
                <option value="">-- Select Sex --</option>  
                <option value="1" <?php echo ($beneficiary['gender'] == 1) ? "selected" : ""; ?>>Male</option>
                <option value="2" <?php echo ($beneficiary['gender'] == 2) ? "selected" : ""; ?>>Female</option>
            </select>                                
        </div>
        <div class="form-group">
            <label class="control-label">Date of Birth</label>
            <input type="date" id="dob1" value="{{ $beneficiary->dob }}" class="form-control" placeholder="dd/mm/yyyy">
        </div>                           
    </div>
</div>
<button type="button" class="btn btn-info" id="edit-beneficiary"><i class="fa fa-plus"></i> Edit Info</button>