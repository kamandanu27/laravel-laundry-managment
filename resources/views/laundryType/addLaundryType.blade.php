<div class="modal fade" id="addlaundrytype" tabindex="-1" role="dialog" aria-labelledby="addparentLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addparentLabel">Add Laundry Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">

                <form action="{{ route('laundrytype.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="father_name">Type</label>
                        <input type="text" class="form-control"  name="type" placeholder="Laundry Type" required>
                    </div>
                    <div class="form-group">
                        <label >Price</label>
                        <input type="number" class="form-control"  name="price"placeholder="Price Per Type" required>
                    </div>
                    
                   


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>