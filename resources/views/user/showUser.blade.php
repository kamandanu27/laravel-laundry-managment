@extends('master')
@section('title', 'Show User Details')


@section('content')
@include('includes.sucessMsg')
@include('includes.errorMsg')
<button class="btn btn-primary" data-target="#addUser" data-toggle="modal" type="button">
    Add User
</button>
<h2>
    {{ $users->count() }} Out Off {{ $users->total() }}
</h2>
<!-- Button trigger modal -->
<div class="span12">
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">
                        User Name
                    </th>
                    <th scope="col">
                        Email
                    </th>
                    <th scope="col">
                        Phone Number
                    </th>
                    <th scope="col">
                        Role
                    </th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">
                        {{$user->name}}
                    </th>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->mobile_number}}
                    </td>
                    <td>
                        @php
                              $user = App\User::find($user->id);
                              $roles=array();
                             foreach ($user->roles as $role){
                                echo $role->role.'<br>'; 
                            }
                             
                                
                            @endphp
                        </br>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button class="btn btn-info" data-target="#updateuser{{$user->id}}" data-toggle="modal" type="button">
                                Edit
                            </button>
                            <button class="btn btn-secondary" data-target="#singleuser{{$user->id}}" data-toggle="modal" type="button">
                                Show
                            </button>
                            <form action="{{ route('user.destroy' , $user->id)}}" method="post" onclick="return confirm('Are you sure to delete this');">
                                @method('DELETE')
                @csrf
                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $users->links() }}

@foreach($users as $user)
@include('user.updateUser')
@endforeach
@foreach($users as $user)
@include('user.singleUser')
@endforeach
<!-- Modal -->
@include('user.addUser')
<!-- Modal -->
@endsection
