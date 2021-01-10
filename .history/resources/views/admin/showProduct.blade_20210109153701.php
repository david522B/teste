@extends('admin.dashboard')

@section('title')
    {{$product->name}}
@endsection

@section('content')
    <hr>
    
    @if ($product->image != NULL)
        <img src="{{$product->image}}">
    @else
        <span>Sem imagem  |  </span>
    @endif
    <span>{{$product->name}}   |   {{$product->price}}</span> 
    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
    <span>{{$product->description}}</span>
@endsection

