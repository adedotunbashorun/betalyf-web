<div class="form-body">
        <div class="form-group">
            <div class="form-group">
                <label>Hospital Category Name</label>
                <input class="form-control" value="{{ $category->name }}" type="text" id="name1" name="name" placeholder="e.g.Category Name" />
                <input class="form-control" value="{{ $category->slug }}" type="hidden" id="slug" />
            </div>                        
        </div>
    </div>
<button type="button" class="btn btn-info" id="edit-category"><i class="fa fa-plus"></i> Edit Category</button>
<button type="button" class="btn btn-default dark" id="close" data-dismiss="modal">Close</button>