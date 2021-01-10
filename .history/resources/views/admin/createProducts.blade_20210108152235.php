@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
        @csrf
        
        <select>
            @foreach ($categories as $category)
                <option value="">Categoria</option>
                <option value="{{$category}}">{{$category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
        <input type="text" id="price" name="price" placeholder="Preço">
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('keyup', )
        var f = atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
    </script>
@endsection
