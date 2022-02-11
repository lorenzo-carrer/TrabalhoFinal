@extends('template.template')
@section('title', 'Meus Produtos')
@section('h1', 'Meus Produtos')
@section('content')
@php {{$countCard=0; $count=0;$countS=0;}} @endphp
<div class="container">

    @foreach($prods as $prod)
    @php {{$count=0; $countS=0;}} @endphp
    @if($prod->id_usuario == session('usuario.id'))
    <!--Começa-->
    <div class="row">
        <div class="col">
            Nome:<span>{{$prod->nome}}</span>
        </div>
        <div class="col-1 mb-2 d-flex justify-content-end">
            <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                    <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                    </path>
                </svg></button>
        </div>

        <div class="col-1 mb-2 d-flex justify-content-end">
            <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg></button>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card m-3" style="width: 18rem;">








                <!-- Comeca Card -->
                <div class="card m-3" style="width: 18rem;">

                    <div id={{"carouselExampleIndicators".$countCard}} class="carousel carousel-dark slide card-img-top" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($imgs as $img)
                            @if($img->id_produto == $prod->id)
                            @if($count==0)
                            <button type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}" data-bs-slide-to="{{$countS}}" class="active" aria-current="true" aria-label={{"Slide ".$countS}}></button>
                            @php {{$count++;$countS++;}} @endphp
                            @else
                            <button type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}" data-bs-slide-to="{{$countS}}" aria-current="true" aria-label={{"Slide ".$countS}}></button>
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
                        <button class="carousel-control-prev" type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="{{'#carouselExampleIndicators'.$countCard}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!--Termina Card-->












            </div>

        </div>
        <div class="col-md-8">
            <div class="row mt-3">
                <div class="col-10">
                    Preço: <span>{{$prod->preco}}</span>
                </div>
                <div class="col-2 mb-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                            </path>
                        </svg></button>
                </div>
                <hr />
            </div>
            <div class="row mt-3">
                <div class="col-10">
                    Descrição: <span>{{$prod->desc}}</span>
                </div>
                <div class="col-2 mb-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                            </path>
                        </svg></button>
                </div>
                <hr />
            </div>

            @foreach($prodEstqs as $prodEstq)
            @if($prodEstq->id_produto == $prod->id)
            @foreach($estqs as $estq)
            @if($estq->id == $prodEstq->id_estoque)
            <div class="row mt-3">
                <div class="col mt-3">Tamanho: {{$estq->tamanho}}</div>
                <div class="col">
                    <div class="row mt-3">
                        <div class="col-10">
                            Estoque: <span>{{$estq->estoque}}</span>
                        </div>
                        <div class="col-2 mb-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                    <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                                    </path>
                                </svg></button>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            @endif
            @endforeach
            @endif
            @endforeach


            <div class="row mt-3">
                <div class="col-6 fw-light">
                    Vendidos:<span></span>
                    <hr />
                </div>
                <div class="col-6 mb-2 fw-light">
                    Faturamento: <span></span>
                    <hr />
                </div>
            </div>
        </div>
    </div>
    <!-- Termina-->

    @endif
    @php {{$countCard=$countCard+1;}} @endphp
    @endforeach


    @endsection
    @section('script')
    @endsection
