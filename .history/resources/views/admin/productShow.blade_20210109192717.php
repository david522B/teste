@extends('admin.dashboard')

@section('title')
    {{$product->name}}
@endsection

@section('css')
  <style>
    .tales {
      width: 100%;
      max-width: 500px;
    }
    .carousel-inner{
      width:100%;
      max-width: 500px;
      max-height: 500px !important;
    }
  </style>
    
@endsection

@section('content')
    <hr>
    <span>{{$category}}</span><br>

    
      <img width="200px" height="200px" src="{{ URL::to('/') }}/images/image-placeholder.png">
    @endif
    <span>{{$product->name}}   |   {{$product->price}}</span> 
    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
    <span>{{$product->description}}</span>
@endsection
    