@extends('template.template')
@section('title', 'Cadastrar Produto')
@section('h1', 'Cadastre seu Produto')

@section('content')
<div class="row g-5">
    <div class="col-md-7 col-lg-12">
        <h4 class="mb-3">Informações Gerais</h4>
        <form action="{{route('produtos.update', $prod)}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name='nome' placeholder="" value="{{$prod->nome}}" required="">
                    <div class="invalid-feedback">
                        Campo nome é requirido.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="preco" name='preco' value="{{$prod->preco}}" placeholder="" required="">
                    <div class="invalid-feedback">
                        Campo preço é requirido.
                    </div>
                </div>

                

                <div class="col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea id="desc" required="" name='desc' value="{{$prod->desc}}" class="form-control">{{$prod->desc}}</textarea>
                    <div class="invalid-feedback">
                        Descrição é requirida.
                    </div>
                </div>

                <div class="col-md-5">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria" name='categoria'  required="">
                        <option value="Escolha" disabled>Escolha...</option>
                        <option @if($prod->categoria == 'inverno') selected @endif value="inverno">Roupas de Inverno</option>
                        <option @if($prod->categoria == 'verao') selected @endif value="verao">Roupas de Verão</option>
                        <option @if($prod->categoria == 'calcados') selected @endif value="calcados">Calçados</option>
                        <option @if($prod->categoria == 'diversos') selected @endif value="diversos">Diversos</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor escolha uma categoria.
                    </div>
                </div>
            </div>

            <hr class="my-4">



            <button class="w-100 btn btn-secondary btn-lg" type="submit">Editar Produto</button>
        </form>
    </div>
</div>
</main>

@endsection
@push('scripts')
@endpush
