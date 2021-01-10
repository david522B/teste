@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Modal confirmar se o usuario deseja excluir item -->
    @include('excludeModal')

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
    <br>
    @foreach ($images as $image)
      <div class="outlined-box">
        <img width="200px" height="200px" src="{{$image->path}}">
        <i class="fa fa-trash" id="{{$product->id}}" data-toggle="modal" data-target="#confirmExclude" aria-hidden="true"></i>
      </div>
      <br>
    @endforeach

@endsection

@section('js')
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#price').mask('000.000.000.000.000,00', {reverse: true})
        });

        $(document).on('submit','#updateProductForm',function(){
            $('#price').unmask()
            $('#price').mask('000000.00', {reverse: true})
        });

        let currentId = null;
        $(document).on('click', '.fa-trash', function() {
          currentId = this.id
          console.log(currentId)
        })
        $(document).on('click', '#excludeConfirmed', function() {
          $.ajax({
            type: "DELETE",
            url: '/admin/products/image?' + $.param({"id": c,
            success: function (data) {
              alert(data);
            },
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            error: function (data) {
              alert('Não foi possivel apagar a Imagem!');
              console.log(data);
            },
          });
        })
    </script>
@endsection