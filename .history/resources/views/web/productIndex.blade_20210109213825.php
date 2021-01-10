@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <!-- Primeira imagem caso houver-->
        <a href="/web/products/{{$product->id}}">
          @if ($product->image != NULL)
            <img width="200px" height="200px" src="{{$product->image}}">
          @else
            <img width="200px" height="200px" src="/images/image-placeholder.png">
          @endif
        </a>

        <!-- nome e preço do produto-->
        <span>  |  <a href="/web/products/{{$product->id}}">{{$product->name}}</a>   |   {{$product->price}}</span> 
        
        <br>
        <hr>
    @endforeach
@endsection

@section('js')

<script type="text/javascript">
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
</s
@endsection