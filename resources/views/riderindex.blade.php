@extends('layouts.app')

@section('content')
<div class="container">
  @include('flash')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Placed orders.</div>

                <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($order as $order)
    <tr>
    
      <th scope="row">{{$order->id}}</th>
      <td><a href="/order/{{$order->id}}">{{$order->name}}</a></td>
      <td>{{$order->address}}</td>
      <td>{{$order->contact_number}}</td>
      <td>{{$order->status}}</td>
    
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection