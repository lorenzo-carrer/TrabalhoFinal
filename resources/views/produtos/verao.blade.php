@extends('template.template')
@section('title', 'Roupas de Verão')
@section('h1', 'Roupas de Verão')

@section('content')
 <div class="row p-3">

    @php {{$countCard=0;}} @endphp
    @foreach($prods as $prod)
        @php {{$count=0; $countS=0;}} @endphp
        @if($prod->categoria == "verao")
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
                        <a href="#" class="link-dark">
                        @foreach($users as $user)
                        @if($user->id == $prod->id_usuario)
                        {{$user->usuario}}
                        @endif    
                        @endforeach
                        </a><br>
                        <form action="{{route('carrinho.compras')}}" method="post">
                        @csrf
                        <input type="hidden" name="id_produto" value="{{$prod->id}}">
                        <input type="number" value="1" name="quantidade" class= "text-sm sm:text-base">
                        <button type="submit" class="btn btn-dark mt-3">Adicionar ao carrinho</button>
                        </form>

                    </div>
                </div>
            <!--Termina-->
        @endif
        @php {{$countCard=$countCard+1;}} @endphp
    @endforeach

@endsection
@push('scripts')
@endpush
