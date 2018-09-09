@extends('master')
@section('title', 'Show Parent Details')


@section('content')
@include('includes.sucessMsg')
@include('includes.errorMsg')
<button class="btn btn-primary" data-target="#addlaundry" data-toggle="modal" type="button">
    Add Laundry
</button>
<h2>
    {{ $laundries->count() }} Out Off {{ $laundries->total() }}
</h2>
<!-- Button trigger modal -->
<div class="span12">
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">
                        Customer Name
                    </th>
                    <th scope="col">
                        Priority
                    </th>
                    <th scope="col">
                        Weight
                    </th>
                    <th scope="col">
                        Item List
                    </th>
                    <th scope="col">
                        Total Cost
                    </th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($laundries as $laundry)
                <tr>
                    <th scope="row">
                        {{$laundry->customer_name}}
                    </th>
                    <td>
                        {{$laundry->priority}}
                    </td>
                    <td>
                        {{$laundry->weight}}
                    </td>
                     
                    <td>
                        <ol>
                        @php
                   $sum=0;
               @endphp
               @foreach ($laundry->types as $element)
@php
   $sum=$sum+($element->price*$element->pivot->number_of_item);
   echo '<li>'.$element->type.'('.$element->pivot->number_of_item.')'.'</li>';
@endphp
                   
               @endforeach
               </ol>
               </td>
             <td> Tk. {{ $sum }}
                    </td>

    <td>
        <div class="btn-group btn-group-sm" role="group">
            <button class="btn btn-info" data-target="#updateparent{{$laundry->id}}" data-toggle="modal" type="button">
                Edit
            </button>
            <button class="btn btn-secondary" data-target="#singleparent{{$laundry->id}}" data-toggle="modal" type="button">
                Show
            </button>
            <form action="{{ route('laundry.destroy' , $laundry->id)}}" method="post" onclick="return confirm('Are you sure to delete this');">
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
{{ $laundries->links() }}
<!-- Modal -->
@include('laundry.addLaundry')

@endsection
