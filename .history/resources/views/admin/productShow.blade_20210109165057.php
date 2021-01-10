@extends('admin.dashboard')

@section('title')
    {{$product->name}}
@endsection

@section('content')
    <hr>
    <span>{{$category}}</span><br>

    @if ($image != NULL)
      <div id="productImages" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
      @foreach ($images as $image)
        <div class="carousel-item">
          <img src="{{$product->image}}">
        </div>
      @endforeach
    @else
      <img width="200px" height="200px" src="{{ URL::to('/') }}/images/image-placeholder.png">
    @endif
    <span>{{$product->name}}   |   {{$product->price}}</span> 
    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
    <span>{{$product->description}}</span>
@endsection


      
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
      </div>
    