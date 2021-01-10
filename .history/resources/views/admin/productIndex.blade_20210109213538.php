@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('css')
    <style>
      .hide{
        display: none;
      }

    </style>
@endsection

@section('content')
  <!-- Modal confirmar se o usuario deseja excluir item -->
  @include('excludeModal')

  <a type="button" href="/admin/products/create">Criar Produto</a>
    <hr>
    <select id="categories">
      <option value="">Seleciona uma categoria</option>
      @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->category}}</option>
      @endforeach
    </select>
    <hr>
    @foreach ($products as $product)
      <div class="product-container {{$product->category_id}}"> 
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
      </div>
    @endforeach
@endsection

@section('js')    
  <!-- Font Awesome-->
  <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>

  <script type="text/javascript">
    let currentId = null;
    $(document).on('click', '.fa-trash', function() {
      currentId = this.id
      console.log(currentId)
    })
    $(document).on('click', '#excludeConfirmed', function() {
      $(`#excludeForm${currentId}`).submit()
    })

    $('#categories').change(function() {
      let id = $("#categories" ).val()
      $(".product-container").each(function (index, element) {
        if(!element.classList.contains(id)) {
          element.classList.add('hide')
        }else {
          element.classList.remove('hide')
        }
      })
    });
  </script>
@endsection
