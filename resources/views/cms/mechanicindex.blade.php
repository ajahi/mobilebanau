@extends('layouts.cms')

@section('content')
<div class="content-wrapper container">
  @include('flash')
    <div class="section">
        <table class='table'>
            <thead>
                <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Customer Name</th>
                <th scope='col'>Phone number</th>
                <th scope='col'>Address</th>
                <th scope='col'>Status</th>
                <th scope='col'>Action</th>
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
                    <td scope="col">
                    <a href="/mechanic/{{$posts->id}}"><button  @if($posts->status=='repaired') disabled @endif class="btn btn-primary"> Repaired</button></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
           
        </table>
    </div>
</div>
@endsection
