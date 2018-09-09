
<div class="modal fade" id="addlaundry" tabindex="-1" role="dialog" aria-labelledby="addrole">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addlaundryheading">Add Laundry </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

           <div class="modal-body">
                <form action=" {{ route('laundry.store') }} " method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="customer_name">
                            Customer Name
                        </label>
                        <input class="form-control" name="customer_name" placeholder="Customer Name" required="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="email_address">
                           Email Address
                        </label>
                        <input class="form-control" name="email_address" placeholder="Email Address" required="" type="email">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">
                            Phone Number
                        </label>
                        <input class="form-control" name="phone_number" placeholder="Phone Number" required="" type="number">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Priority
                        </label>
                        <input class="form-control" name="priority" placeholder="Priority" required="" type="number">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Weight
                        </label>
                        <input class="form-control" name="weight" placeholder="Weight" required="" type="number">
                        </input>
                    </div>
                    <div class="form-group">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                Laundry Item List:
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                Laundry Type
                                            </th>
                                            <th>
                                                Number Of Item
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\LaundryType::all() as $type)
                                        <tr>
                                            <td>
                                              {{ $type->type }}
                                              <input name="type[]" value="{{ $type->id }}" hidden  required >
                                                </input> 
                                            </td>

                                            <td>
                                                <input class="form-control" name="number_of_item[]" placeholder="Number Of Item" required="" type="number">
                                                </input>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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






