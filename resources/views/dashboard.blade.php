@php
      $admin=App\User::validateRole("admin");
    @endphp
@extends('master')
@if($admin)
@section('title', 'Laundry Admin Panel')

@section('content')

 @include('includes.sucessMsg')
 @include('includes.errorMsg')

<section class="color-pattern-1 ">
     <div class="container">
 <div class="row">
       
            <button class="button button-1 button-1a" data-target="#addUser" data-toggle="modal" type="button">Add User</button>
            <button class="button button-1 button-1a" data-target="#addrole" data-toggle="modal" type="button">Add Role</button>
            <button class="button button-1 button-1a" data-target="#addlaundrytype" data-toggle="modal" type="button">Add Laundry type</button>
            <button class="button button-1 button-1a" data-target="#addlaundry" data-toggle="modal" type="button"> Add Laundry/Order</button>
       
        </div>
 </div>
    </section>
    


 

<div class="jumbotron jumbotron-fluid">
  <div class="container">

   <div class="row">
   <div class="col-sm-4">
     <div class="panel panel-primary">
      <div class="card-body">
         <div class="card">
      
        <h4 class="list-group-item active">Total Order/Laundry<span class="btn btn-danger">{{ $totalorder }}</span></h4>        
        <a href=" {{ route('laundry.index') }}" class="btn btn-warning">Go Here</a>
      </div>
    </div>
  
</div>
   
  </div>{{-- end of sm-4 --}}
  
  <div class="col-sm-4">
     <div class="panel panel-primary">
      <div class="card-body">
         <div class="card">
      
       <h4 class="list-group-item active">Confirm Order/Laundry<span class="btn btn-danger">{{ $confirmorder }}</span></h4>        
        
        
        <a href=" {{ route('orderconfirmlist') }}" class="btn btn-warning">Go Here</a>
      </div>
    </div>
  
</div>
   
  </div> {{-- end of sm-4 --}}
  <div class="col-sm-4">
     <div class="panel panel-primary">
      <div class="card-body">
         <div class="card">
      
        <h4 class="list-group-item active">Total Order/Laundry<span class="badge">{{ $totalorder }}</span></h4>
        
        <a href=" {{ route('laundry.index') }}" class="btn btn-danger">Go Here</a>
      </div>
    </div>
  
</div>
   
  </div> {{-- end of sm-4 --}}
    

  </div>{{-- end of row --}}
</div>{{-- end of container --}}
</div>



@include('laundry.addLaundry')
@include('role.addrole')
@include('user.adduser')
@include('laundryType.addLaundryType')


@endsection
{{-- user menu --}}
@else
@section('title', 'User Panel')

@section('content')

 @include('includes.sucessMsg')
 @include('includes.errorMsg')
<button class="btn btn-info" data-target="#addlaundry" data-toggle="modal" type="button">
    Profile
</button>
			@php
                $role       =App\Role::where('role', 'admin')->first();
                
                
            @endphp
            @if(empty($role))
<div class="jumbotron">
    <form action="{{ route('activation') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="father_name">
                Activation Code
            </label>
            <input class="form-control" name="activation_code" placeholder="Activation Code" required type="text">
            </input>
        </div>
        
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </form>
</div>
@endif
@endsection
@endif
