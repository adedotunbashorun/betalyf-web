<div class="form-body">
        <div class="form-group">
            <div class="form-group">
                <label>Subject</label>
                <input class="form-control" value="{{ $information->subject }}" type="text" id="subject1" name="name" placeholder="e.g. Subject" />
                <input class="form-control" value="{{ $information->id }}" type="hidden" id="slug" name="name" placeholder="e.g.information Name" />
            </div> 
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" id="message1" rows="4">{{ $information->message }}</textarea>
            </div>                       
        </div>
    </div>
<button type="button" class="btn btn-info" id="edit-information"><i class="fa fa-plus"></i> Edit Information</button>
<button type="button" class="btn btn-default dark" id="close" data-dismiss="modal">Close</button>