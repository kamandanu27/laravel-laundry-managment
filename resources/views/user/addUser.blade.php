<div aria-labelledby="addrole" class="modal fade" id="addUser" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="adduserheading">
                    Add User
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" aria-label="{{ __('Register') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="name">
                            {{ __('Name') }}
                        </label>
                        <div class="col-md-6">
                            <input autofocus="" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" required="" type="text" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('name') }}
                                    </strong>
                                </span>
                                @endif
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="mobile_number">
                            {{ __('Mobile Number') }}
                        </label>
                        <div class="col-md-6">
                            <input autofocus="" class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" id="name" name="mobile_number" required="" type="text" value="{{ old('mobile_number') }}">
                                @if ($errors->has('mobile_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('mobile_number') }}
                                    </strong>
                                </span>
                                @endif
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="email">
                            {{ __('E-Mail Address') }}
                        </label>
                        <div class="col-md-6">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" required="" type="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('email') }}
                                    </strong>
                                </span>
                                @endif
                            </input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password">
                            {{ __('Password') }}
                        </label>
                        <div class="col-md-6">
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required="" type="password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('password') }}
                                    </strong>
                                </span>
                                @endif
                            </input>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="role">
                            {{ __('Role') }}
                        </label>
                        <div class="col-md-6">
                            
                                @foreach (App\Role::all() as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->id }}">
                                        <label class="form-check-label" >
                                            {{ $role->role }}
                                        </label>
                                    </input>
                                </div>
                                @endforeach
                           
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
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
