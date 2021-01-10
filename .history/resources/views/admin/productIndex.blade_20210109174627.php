@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
  <!-- Modal confirmar se o usuario deseja excluir item -->
  @include('excludeModal')
  <a type="button" href="/admin/products/create">Criar Produto</a>
    <hr>
    @foreach ($products as $product)
        <!-- Imagem caso houver-->
        <a href="/admin/products/{{$product->id}}">
          @if ($product->image != NULL)
            <img src="{{$product->image}}">
          @else
            <img width="200px" height="200px" src="{{ URL::to('/') }}/images/image-placeholder.png">
          @endif
        </a>

        <!-- nome e preço do produto-->
        <span>  |  <a href="/admin/products/{{$product->id}}">{{$product->name}}</a>   |   {{$product->price}}</span> 
        
        <!-- icones de ação-->
        <a href="/admin/products/{{$product->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-trash" data-toggle="modal" data-target="#confirmExclude" aria-hidden="true"></i></a>

        <form action="/admin/products/{{$product->id}}" id="excludeForm" method="POST">
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
    $(document).on('click', '#excludeConfirmed', function() {
      $('#excludeForm').submit()
    })
  </script>
@endsection
