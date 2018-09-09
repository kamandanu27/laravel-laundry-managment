<div class="modal fade" id="addrole" tabindex="-1" role="dialog" aria-labelledby="addrole">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addrole">Add Laundry Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">

                <form action=" {{ route('role.store') }} " method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="role">
                            Role
                        </label>
                        <input class="form-control" name="role" placeholder="Role" required type="text">
                        </input>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </form>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>





