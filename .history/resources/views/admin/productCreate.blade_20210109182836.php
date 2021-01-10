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
    <form action="/admin/products" id="createProductForm" enctype="multipart/form-data" method="POST">
        @csrf
        <select name="category">
            <option value="">Categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
        <input type="text" name="price" id="price"  placeholder="Preço">
        <input type="file" name="image">
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
