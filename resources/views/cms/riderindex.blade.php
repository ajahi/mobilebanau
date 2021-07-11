@extends('layouts.cms')

@section('content')
<div class="content-wrapper container">
    @include('flash')
    <div class="section">
    <div class="col-sm-12 col-md-10">
                <div>
                    <form>
                        <span class=" d-inline-block my-2">
                            <select class="form-select custom-select catfilter" name="status" aria-label="filter by category" placeholder="Filter by category">
 
                                    <option value="confirmed" >Confirmed</option>
                                    <option value="picked" >Picked</option>
                                    <option value="repaired" >Repaired</option>
                                    <option value="delivered" >Delivered</option>
                                
                            </select>
                        </span>

                        <div class="d-inline-block">
                            <button class="btn btn-secondary px-4">Filter</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        <table class='table'>
            <thead>
                <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Customer Name</th>
                <th scope='col'>Phone number</th>
                <th scope='col'>Address</th>
                <th scope='col'>Status</th>
                <th scope='col'>Confirmed at</th>
                <th scope='col'>Assigned To</th>
                <th scope='col'>Action</th>
                <th scope='col'>Price</th>
                </tr>
            </thead>
          
            @foreach($posts  as $posts )
            <tbody>
                <tr>
                    <td scope="col">{{ucwords($posts->id)}}</td>
                    <td scope="col"><a href="/order/{{$posts->id}}">{{$posts->name}}</a></td>
                    <td scope="col">{{$posts->contact_number}}</td>
                    <td scope="col">{{$posts->address}}</td>
                    <td scope="col">
                        <p>
                        {{ucwords($posts->status)}}
                        </p>
                    </td>
                    <td scope="col">{{$posts->updated_at}} </td>
                        
                   @if($posts->rider() == null )
                   <td><p>not picked yet</p></td>
                   @else
                    <td scope="col">{{ucwords($posts->rider()->name)}}</td>
                    @endif
                    <td scope="col">
                        @if($posts->status=='repaired')
                        <a href="/deliver/{{$posts->id}}"><button   class="btn btn-primary"> Deliver</button></a>
                        @else
                        <a href="/pick/{{$posts->id}}"><button  @if($posts->status!=='confirmed') hidden @endif class="btn btn-primary"> Pick</button></a>
                        @endif
                    </td>
                    <td>{{ucwords($posts->cost)}}</td>
                </tr>
            </tbody>
            @endforeach
           
        </table>
    </div>
</div>
@endsection
