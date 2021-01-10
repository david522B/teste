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

    @if ($images != NULL && $images->count() > 0)
      <div id="productImages" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($images as $image)
            @if ($loop->first)
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ URL::to('/') }} " onerror="this.src='{{ $image->path }}'">
              </div>
            @else
              <div class="carousel-item">
                <img class="d-block w-100" src="{{$image->path}}">
              </div>
            @endif
          @endforeach
          <a class="carousel-control-prev" href="#productImages" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#productImages" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    @else
      <img width="200px" height="200px" src="{{ URL::to('/') }}/images/image-placeholder.png">
    @endif
    <span>{{$product->name}}   |   {{$product->price}}</span> 
    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
    <span>{{$product->description}}</span>
@endsection
    