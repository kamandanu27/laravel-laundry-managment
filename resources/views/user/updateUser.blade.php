<div aria-labelledby="addparentLabel" class="modal fade" id="updateuser{{$user->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addparentLabel">
                    Edit User
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', [$user->id])}}" method="POST">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="father_name">
                            Name
                        </label>
                        <input class="form-control" name="name" placeholder="Name" required="" type="text" value="{{$user->name}}">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input class="form-control" name="email" placeholder="Email" required="" type="email" value="{{$user->email}}">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Mobile Numebr
                        </label>
                        <input class="form-control" name="mobile_number" placeholder="Mobile Number" required="" type="number" value="{{$user->mobile_number}}">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Password
                        </label>
                        <input class="form-control" name="password" placeholder="Password" required="" type="password">
                        </input>
                    </div>
                    <div class="form-group ">
                        <label>
                            {{ __('Role') }}
                        </label>
                        <div class="col-md-6">
                            @php
                              $user = App\User::find($user->id);
                              $roles=array();
                             foreach ($user->roles as $role){
$roles[]=$role->role;
                             }
                             
                                
                            @endphp
                            @foreach (App\Role::all() as $role)
                            <div class="form-check">
                                <input class="form-check-input" name="role[]" type="checkbox" value="{{ $role->id }}" {{ (in_array($role->role, $roles)? 'checked' : '') }}>
                                    <label class="form-check-label">{{ $role->role }}
                                    </label>
                                </input>
                            </div>
                            @endforeach
                        </div>
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