<div aria-labelledby="addparentLabel" class="modal fade" id="singleuser{{$user->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addparentLabel">
                  Laundry Type Information
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <tbody style="width: 100%">
                        <tr>
                            <td>
                                Name:
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email:
                            </td>
                            <td>
                               {{$user->email}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mobile Number:
                            </td>
                            <td>
                               {{$user->mobile_number}}
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>