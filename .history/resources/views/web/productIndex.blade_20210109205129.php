@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
  <!-- Modal confirmar se o usuario deseja excluir item -->
  @include('excludeModal')

  <a type="button" href="/admin/products/create">Criar Produto</a>
    <hr>
    @foreach ($products as $product)
        <!-- Primeira imagem caso houver-->
        <a href="/admin/products/{{$product->id}}">
          @if ($product->image != NULL)
            <img width="200px" height="200px" src="{{$product->image}}">
          @else
            <img width="200px" height="200px" src="/images/image-placeholder.png">
          @endif
        </a>

        <!-- nome e preço do produto-->
        <span>  |  <a href="/admin/products/{{$product->id}}">{{$product->name}}</a>   |   {{$product->price}}</span> 
        
        <!-- icones de ação-->
        <a href="/admin/products/{{$product->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-trash" id="{{$product->id}}" data-toggle="modal" data-target="#confirmExclude" aria-hidden="true"></i></a>

        <form action="/admin/products/{{$product->id}}" id="excludeForm{{$product->id}}" method="POST">
          @method('DELETE')
          @csrf
        </form>
        
        <br>
        <hr>
    @endforeach
@endsection