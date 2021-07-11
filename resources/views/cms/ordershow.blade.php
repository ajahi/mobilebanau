
@extends('layouts.cms')

@section('content')
<div class="content-wrapper container">
    <form action="/orderupdate/{{$order->id}}" method="POST">
    @csrf
   
    <ul class="list-group">
        <li class="list-group-item"><strong><h3>Name:</h3></strong>{{$order->name}}</li>
        <li class="list-group-item"><strong><h3>Address:</h3></strong>{{$order->address}}</li>
        <li class="list-group-item"><strong><h3>Status:</h3></strong>{{$order->status}}</li>
        <li class="list-group-item"><strong><h3>Contact number:</h3></strong>{{$order->contact_number}}</li>
        <li class="list-group-item"><strong><h3>Problem:</h3></strong>
        <textarea name="problem" id="" cols="80" rows="5" name='problem'>{{$order->problem}}</textarea>

        </li>
        <li class="list-group-item"><strong><h3>Price:</h3></strong>
            <input type="integer" name='price' value='{{$order->cost}}'></input>
        </li>
        <li class="list-group-item"><strong><h3>Assigned To:</h3></strong>
            <div class="form-floating my-3">
            
                <select class="form-select custom-select" name="rider" aria-label="Floating label select example" style="width:200px;"> 
                    @foreach($rider as $rider) 
                    <option value="{{$rider->id}}">{{$rider->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($order->status=='picked')
            <a href="/mechanic/{{$order->id}}"> <button class="btn btn-danger"> Repair Order </button></a>
            @else
            <button type='Submit' class="btn btn-primary">Update Order</button>
            @endif
           <a href="/ordercancel/{{$order->id}}"> <button class="btn btn-danger"> Cancel Order </button></a>
        </li>
        </ul>
    </form>


    <section class='mx-2'>
    
</div>
@endsection