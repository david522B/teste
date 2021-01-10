@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <!-- Imagem caso houver-->
        <a href="/admin/products/{{$product->id}}">
        @if ($product->image != NULL)
            <img src="{{$product->image}}">
        @else
            <span>Sem imagem  |  </span>
        @endif
        </a>
        <!-- nome e preço do produto-->
        <span><a href="/admin/products/{{$product->id}}">{{$product->name}}</a>   |   {{$product->price}}</span> 
        <!-- icones de aç-->
        <a href="/admin/products/{{$product->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>

        <form action="/admin/products/{{$product->id}}" method="POST">
            @method('DELETE')
            @csrf
        </form>
        
        <br>
        <hr>
    @endforeach
@endsection

@section('js')    
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>
    <script type="text/javascript">

    </script>
@endsection
