@extends('template.template')
@section('title', 'Apagar Produto')
@section('h1', 'Apagar Produto')
@section('content')
 <div class="row">
    <div class="col">

        <div class="alert alert-danger" role="alert">
            <i class="fa fa-exclamation-triangle-fill"></i>
            <strong>Cuidado!</strong> Você está prestes a remover o produto!
        </div>

        <p>Produto: {{$prod->nome}}</p>
        <p>Você tem certeza que deseja apagar este produto para sempre? Não há volta</p>

        <form method="post" action="{{ route('produtos.delete', $prod) }}">
            @csrf
            @method('delete')

            <input type="submit" class="btn btn-danger" value="Apagar Produto">
            <a href="{{ route('home') }}" class="btn btn-secondary">Cliquei errado</a>
        </form>



    </div>
</div>
@endsection
@section('script')
@endsection