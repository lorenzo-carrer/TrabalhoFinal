@extends('template.template')
@section('title', 'Carrinho de Compras')
@section('h1', 'Carrinho')
@section('content')
<div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../../img/logo.png" alt="logo"  height="100px">
      <h2>Carrinho de compras ({{\Gloudemans\Shoppingcart\Facades\Cart::content ()->count()}})</h2>
      <p class="lead">Veja seus itens no carrinho e finalize sua compra</p>
    </div>


     @php {{$countCard=0;}} @endphp
    @foreach($cart as $cart)        
    
    @foreach($prods as $prod)
        @php {{$count=0; $countS=0;}} @endphp
        @if($prod->id == $cart->id)
             <!--Comeca-->
                <div class="card m-3" style="width: 18rem;">

                    <div id={{"carouselExampleIndicators".$countCard}} class="carousel carousel-dark slide card-img-top" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    @foreach($imgs as $img)
                        @if($img->id_produto == $prod->id)
                            @if($count==0)
                                <button type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}" data-bs-slide-to="{{$countS}}" class="active"
                                aria-current="true" aria-label={{"Slide ".$countS}}></button>
                                @php {{$count++;$countS++;}} @endphp
                            @else
                                <button type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}" data-bs-slide-to="{{$countS}}"
                                aria-current="true" aria-label={{"Slide ".$countS}}></button>
                                @php {{$count++;$countS++;}} @endphp
                            @endif
                        @endif
                    @endforeach
                    </div>
                    <div class="carousel-inner">
                        @php {{$count=0;}} @endphp
                        @foreach($imgs as $img)
                            @if($img->id_produto == $prod->id)
                                @if($count==0)
                                    <div class="carousel-item active">
                                    <img src="{{"../img/".$img->imagem}}" style="height:300px" class="d-block w-100 " alt="{{$prod->nome}}">
                                    </div>
                                    @php {{$count= $count+1;$countS++;}} @endphp
                                @else
                                    <div class="carousel-item">
                                    <img src="{{"../img/".$img->imagem}}" style="height:300px" class="d-block w-100" alt="{{$prod->nome}}">
                                    </div>
                                    @php {{$count= $count+1;$countS++;}} @endphp
                                @endif
                                
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$prod->nome}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$prod->preco}}</h6>
                        <p class="card-text">{{$prod->desc}}</p>
                          <p class="card-text">Quantidade: {{$cart->qty}}</p>
                        <a href="#" class="link-dark">
                        @foreach($users as $user)
                        @if($user->id == $prod->id_usuario)
                        {{$user->usuario}}
                        @endif    
                        @endforeach
                        </a><br>
                        <form action="{{route('carrinho.remove',$prod)}}" method="post">
                        @csrf
                        <input type="hidden" name="id_produto" value="{{$prod->id}}">
                        <button type="submit" class="btn btn-danger mt-3">Remover do carrinho</button>
                        </form>

                    </div>
                </div>
            <!--Termina-->
        @endif
        @php {{$countCard=$countCard+1;}} @endphp
    @endforeach
    @endforeach

        <form action="#" method="POST" class="needs-validation" novalidate="">
        @csrf
          <button  disabled class="w-100 btn btn-primary btn-lg" type="comprar">Estamos em Manutenção, finalize sua compra mais tarde</button>
        </form>
      </div>
    </div>
@endsection
@section('script')
@endsection