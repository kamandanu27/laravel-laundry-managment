<div aria-labelledby="addparentLabel" class="modal fade" id="updateparent{{$type->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addparentLabel">
                    Edit Laundry Type
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laundrytype.update', [$type->id])}}" method="POST">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="father_name">Type</label>
                        <input type="text" class="form-control"  name="type" placeholder="Laundry Type" value="{{$type->type}}" required>
                    </div>
                    <div class="form-group">
                        <label >Price</label>
                        <input type="number" class="form-control"  name="price"placeholder="Price Per Type" value="{{$type->price}}"required>
                    </div>
                    
                    <button class="btn btn-primary" type="submit">
                        Update
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>