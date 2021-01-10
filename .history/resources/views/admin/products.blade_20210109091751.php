@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <a href="/admin/products/{{$product}}">
        @if ($product->image != NULL)
            <img src="{{$product->image}}"></a>
        @else
            <span>Sem imagem  |  </span>
        @endif
        <span>{{$product->name}}   |   {{$product->price}}</span> 
        <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <br>
        <hr>
    @endforeach
@endsection

@section('js')
    
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>
@endsection
