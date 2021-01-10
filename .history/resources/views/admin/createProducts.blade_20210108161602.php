@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
        @csrf
        
        <select>
            <option value="">Categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->category}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
        <input type="text" id="price" name="price" placeholder="Preço">
    </form>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#money').mask('000.000.000.000.000,00', {reverse: true})
            
        });
    </script>
@endsection
