@extends('master')
@section('title', 'Show Parent Details')


@section('content')
@include('includes.sucessMsg')
@include('includes.errorMsg')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addlaundrytype" >Add Laundry type</button>
<h2>
    {{ $types->count() }} Out Off {{ $types->total() }}
</h2>
<!-- Button trigger modal -->
<div class="span12">
    <div class="table-responsive">
        <table class="table table-bordered  table-sm">
            <thead>
                <tr>
                    <th scope="col">
                        Type ID
                    </th>
                    <th scope="col">
                        Type
                    </th>
                    <th scope="col">
                        Price
                    </th>
                    
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <th scope="row">
                        {{$type->id}}
                    </th>
                    <td>
                        {{$type->type}}
                    </td>
                    <td>
                        Tk.{{$type->price}}
                    </td>
                    
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button class="btn btn-info" data-target="#updateparent{{$type->id}}" data-toggle="modal" type="button">
                                Edit
                            </button>
                            <button class="btn btn-secondary" data-target="#singleparent{{$type->id}}" data-toggle="modal" type="button">
                                Show
                            </button>
                            <form action="{{ route('laundrytype.destroy' , $type->id)}}" method="post" onclick="return confirm('Are you sure to delete this');">
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

{{ $types->links() }}
@foreach($types as $type)
@include('laundryType.updateLaundryType')
@endforeach
@foreach($types as $type)
@include('laundryType.singleLaundryType')
@endforeach

<!-- Modal -->
@include('laundryType.addLaundryType')

@endsection
