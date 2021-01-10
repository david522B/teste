@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/products/{{$product->id}}" id="updateProductForm" method="POST">
        @csrf
        @method('PUT')
        
        <select name="category">
            <option value="{{$product->category_id}}">{{$currentCategoryName}}</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" value="{{$product->name}}" placeholder="Titulo">
        <input type="text" name="description" value="{{$product->description}}" placeholder="Descrição">
        <input type="text" name="price" value="{{$product->price}}" id="price"  placeholder="Preço">
        <input type="file" name="images[]" multiple>
        <input type="submit" value="Salvar">
    </form>
    @foreach ($collection as $item)
        
    @endforeach
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#price').mask('000.000.000.000.000,00', {reverse: true})
        });

        $(document).on('submit','#updateProductForm',function(){
            $('#price').unmask()
            $('#price').mask('000000.00', {reverse: true})
        });
    </script>
@endsection