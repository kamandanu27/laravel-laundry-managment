@extends('master')
@section('title', 'Show Order/Laundry Details')


@section('content')
@include('includes.sucessMsg')
@include('includes.errorMsg')
<button class="btn btn-primary" data-target="#addlaundry" data-toggle="modal" type="button">
    Add Laundry
</button>

    
        <button class="btn btn-danger" id="confirmbtn" type="button">Order Confirm
    </button>

<h2>
    {{ $laundries->count() }} Out Off {{ $laundries->total() }}
</h2>
<!-- Button trigger modal -->
<div>
</div>
<div class="span12">
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">
                    </th>
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
                    <td>
                        <input class="ads_Checkbox" id="laundry{{$laundry->id}}" type="checkbox" value="{{$laundry->id}}">
                        </input>
                    </td>
                    <td>
                        {{$laundry->customer_name}}
                    </td>
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
   echo '
                            <li>
                                '.$element->type.'('.$element->pivot->number_of_item.')'.'
                            </li>
                            ';
@endphp
                   
               @endforeach
                        </ol>
                    </td>
                    <td>
                        Tk. {{ $sum }}
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
<script>
    $('#confirmbtn').click(function () {

     var arr = $('.ads_Checkbox:checked').map(function () {
        $('#confirm-form input:text').remove();
         return this.value;
 }).get();

     if (arr.length>0)
         {
$('#myModal').modal('show');

for (i = 0; i < arr.length; i++) { 
   
    $("#confirm-form").append(
    $('<input>', {
        type: 'text',
        val: arr[i],
        name:'submitorder[]'
    })
);
}
}
});
</script>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ready to Confirm Order?
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-footer ">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cancel
                </button>
                <a class="btn btn-primary" href="{{ route('orderconfirm') }}" onclick="event.preventDefault();
    document.getElementById('confirm-form').submit();">
                    {{ __('Confirm Order') }}
                </a>
                <form action="{{ route('orderconfirm') }}" id="confirm-form" method="POST" style="">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
