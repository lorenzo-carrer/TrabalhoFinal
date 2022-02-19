@extends('template.template')
@section('title', 'Meu Perfil')
@section('h1', 'Editar Perfil')
@section('content')
<form method="POST" action="{{ route('perfil.gravar')}}" enctype="multipart/form-data">
@csrf
    @foreach($users as $user)
    @if($user->id == session('usuario')->id)

        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" height="150px" src="@if(null !== $user->imagem) ../img/{{$user->imagem}}@else https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg @endif">
                    <label for="imagem1" class="form-label">Imagem</label>
                    <input type="file" class="form-control mb-5" id="imagem" name='imagem' placeholder="" >
                    <span class="font-weight-bold">{{$user->usuario}}</span>
                    <span class="text-black-50">{{$user->email}}</span><span> </span>
                    </div>
                </div>

                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Meu Perfil</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nome</label><input type="text" name='nome' class="form-control" placeholder="Nome" value="@if(null !== $user->nome) {{$user->nome}}@endif"></div>
                            <div class="col-md-6"><label class="labels">Sobrenome</label><input type="text" name="sobrenome" class="form-control" value="@if(null !== $user->sobrenome) {{$user->sobrenome}}@endif" placeholder="Sobrenome"></div>
                            <div class="col-md-6"><label class="labels">Usuário</label><input type="text" name="usuario" class="form-control" value="{{$user->usuario}}" placeholder="Usuário"></div>
                            <div class="col-md-6"><label class="labels">Email</label><input type="text" name="email" class="form-control" disabled value="{{$user->email}}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Celular</label><input type="text" name="celular" class="form-control" placeholder="xx xxxxx-xxxx" value="@if(null !== $user->celular) {{$user->celular}}@endif"></div>
                            <div class="col-md-12"><label class="labels">Endereço</label><input type="text" name="endereco" class="form-control" placeholder="Endereço" value="@if(null !== $user->endereco) {{$user->endereco}}@endif"></div>
                            <div class="col-md-12"><label class="labels">Complemento</label><input type="text" name="complemento" class="form-control" placeholder="Complemento do Endereço" value="@if(null !== $user->complemento) {{$user->complemento}}@endif"></div>
                            <div class="col-md-12"><label class="labels">CEP</label><input type="text" class="form-control" name="cep" placeholder="00000-000" value="@if(null !== $user->cep) {{$user->cep}}@endif"></div>
                            <div class="col-md-12"><label class="labels">Estado</label><input type="text" class="form-control" name="estado" placeholder="Estado" value="@if(null !== $user->estado) {{$user->estado}}@endif"></div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button"   type="submit">Editar Perfil</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="col-md-12">
                            <label for="descEmpresa" class="labels">Descricao da Empresa</label>
                            <textarea id="descEmpresa" name="descEmp" value="@if(null !== $user->descEmp) {{$user->descEmp}}@endif" class="form-control">@if(null !== $user->descEmp) {{$user->descEmp}}@endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="detAdicionais" class="labels">Detalhes adicionais</label>
                            <textarea id="detAdicionais" name="detalhes" value="@if(null !== $user->detalhes) {{$user->detalhes}}@endif" class="form-control">@if(null !== $user->detalhes) {{$user->detalhes}}@endif</textarea>
                        </div>
                    </div>
                </div>
            </div>

        @endif           
    @endforeach
</form>
@endsection('content')
@section('script')
@endsection
