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
        <!-- icones de ação-->
        <a href="/admin/products/{{$product->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-trash" data-toggle="modal" data-target="#confirmExclude" aria-hidden="true"></i></a>

        <form action="/admin/products/{{$product->id}}" method="POST">
            @method('DELETE')
            @csrf
        </form>
        
        <br>
        <hr>
  
  <!-- Modal -->
  <div class="modal fade" id="confirmExclude" tabindex="-1" role="dialog" aria-labelledby="confirmExclude" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Esta A
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Apagar</button>
        </div>
      </div>
    </div>
  </div>
    @endforeach
@endsection

@section('js')    
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        
    </script>
@endsection
