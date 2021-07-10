@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order from {{ucwords($order->name)}}.</div>
                    
                    <ul class="list-group">   
                        <li class="list-group-item"> 
                            <div class="form-floating my-3">
                            <label for="status" class="text-secondary">Status</label><br/>
                            <p>{{ucwords($order->name)}}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                        <form action="/ccupdate/{{$order->id}}" method="get">
                            @csrf
                           
                            <div class="form-floating my-3">
                                <label for="Category_id" class="text-secondary">Status</label><br/>
                                <select class="form-select custom-select col-lg-7" name="status" aria-label="Floating label select example"> 
                                    <option value="canceled">canceled</option>
                                    <option value="confirmed">Confirmed</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            
                        </form>
                            
                        </li>
                        <li class="list-group-item"><strong>Address:</strong> {{$order->address}}</li>
                        <li class="list-group-item"> <strong>Contact Number:</strong> {{$order->contact_number}}</li>
                        <li class="list-group-item"> <strong>Problem:</strong> {{$order->problem}}</li>
                        <li class="list-group-item">
                        
                        </li>
                    </ul>
                       
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection