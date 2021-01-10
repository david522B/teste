@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/admin/products" id="createProductForm" method="PUT">
        @csrf
        
        <select name="category">
            <option value="{{$product->id}}">{{$product->name}}</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" value="{{}}" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
        <input type="text" name="price" id="price"  placeholder="Preço">
        <input type="submit" value="Salvar">
    </form>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#price').mask('000.000.000.000.000,00', {reverse: true})
        });

        $(document).on('submit','#createProductForm',function(){
            $('#price').unmask()
            $('#price').mask('000000.00', {reverse: true})
        });
    </script>
@endsection