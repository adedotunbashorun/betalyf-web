<div id="new-category" class="modal modal-fade" tabindex="-1" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class=""><span class="icon-layers"></span> New {{ $page_name }}</h4>                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></></i></button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div id="serverError"></div>
                    <div class="form-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>{{ $page_name }} Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="e.g.Category Name" /> 
                            </div>                         
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default dark" id="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="add-category"><i class="fa fa-plus"></i> Add Category</button>
            </div>
            </form>
        </div>
    </div>
</div>

