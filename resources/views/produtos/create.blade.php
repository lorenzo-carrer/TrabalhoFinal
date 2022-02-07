@extends('template.template')
@section('title', 'Cadastrar Produto')
@section('h1', 'Cadastre seu Produto')

@section('content')
<div class="row g-5">
    <div class="col-md-7 col-lg-12">
        <h4 class="mb-3">Informações Gerais</h4>
        <form action="{{route('produtos.gravar')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name='nome' placeholder="" required="">
                    <div class="invalid-feedback">
                        Campo nome é requirido.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="preco" name='preco' placeholder="" required="">
                    <div class="invalid-feedback">
                        Campo preço é requirido.
                    </div>
                </div>

                <div class="col-sm-6" >
                    <div id='divImg'>
                        <label for="imagem1" class="form-label">Imagem</label>
                        <input type="file" class="form-control mb-5" id="imagem1" name='imagem1' placeholder="" required="">
                        <div class="invalid-feedback">
                            Campo imagem é requirido.
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-dark form-control mt-3" id='addImg'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20">
                                <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.75 4.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"></path>
                            </svg></button>
                    </div>
                </div>

                <div class="col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea id="desc" required="" name='desc' class="form-control"></textarea>
                    <div class="invalid-feedback">
                        Descrição é requirida.
                    </div>
                </div>

                <div class="col-md-5">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" id="categoria" name='categoria' required="">
                        <option value="Escolha" disabled>Escolha...</option>
                        <option value="inverno">Roupas de Inverno</option>
                        <option value="verao">Roupas de Verão</option>
                        <option value="calcados">Calçados</option>
                        <option value="diversos">Diversos</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor escolha uma categoria.
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Informações específicas</h4>

            <div class="row gy-3">
                <div id="divEstq">
                    
                        <label for="tamanho1" class="form-label">Tamanho</label>
                        <input type="text" name='tamanho1' class="form-control" id="tamanho1" placeholder="" required="">
                        <div class="invalid-feedback">
                            Tamanho da roupa é requirido.
                        </div>
                   

                        <label for="estoque1" class="form-label">Estoque</label>
                        <input type="number" name='estoque1' class="form-control" id="estoque1" placeholder="" required="">
                        <div class="invalid-feedback">
                            Tamanho do estoque é requirido
                        </div>
                    
                </div>

                <div class="col-md-2 ">
                    <button type="button" class="btn btn-danger form-control" style="height: 100%;">Excluir <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
                        </svg></button>
                </div>
            </div>

            <div class="col-12">
                <button type="button" class="btn btn-dark form-control  mt-3" id="addEstq"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20">
                        <path fill="rgb(255,255,255)" fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.75 4.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"></path>
                    </svg></button>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-secondary btn-lg" type="submit">Cadastrar Produto</button>
        </form>
    </div>
</div>
</main>

@endsection
@push('scripts')
<script>
    var btn_addImg = document.getElementById('addImg');
    var btn_addEstq = document.getElementById('addEstq');
    var divImg = document.getElementById('divImg');
    var divEstq = document.getElementById('divEstq');
    var countImg = 1;
    var countEstq = 1;

    btn_addImg.addEventListener('click', function() {
        if(countImg <5){
        countImg= countImg+1;
        createLabel();
        createInput();
        createDiv();
        }else{
            alert('número de imagens excedida');
        }

    })


    //<label for="imagem" class="form-label">Imagem</label>
    function createLabel() {
        var elemento = document.createElement('label');
        elemento.setAttribute('for', 'imagem' + countImg);
        elemento.setAttribute('class', 'form-label');
        elemento.textContent = 'Imagem';

        divImg.appendChild(elemento);
    }
    //        <input type="file" class="form-control" id="imagem" name='imagem' placeholder="" required="">
    function createInput() {
        var elemento = document.createElement('input');
        elemento.setAttribute('type', 'file');
        elemento.setAttribute('class', 'form-control mb-5');
        elemento.setAttribute('name', 'imagem' + countImg);
        elemento.setAttribute('id', 'imagem' + countImg);
        elemento.setAttribute('required', '');

        divImg.appendChild(elemento);
    }
    //      <div class="invalid-feedback"> Campo imagem é requirido.</div>
    function createDiv() {
        var elemento = document.createElement('div');
        elemento.setAttribute('class', 'invalid-feedback');
        elemento.textContent = 'Campo imagem é requirido.';

        divImg.prepend(elemento);
    }



    btn_addEstq.addEventListener('click', function() {
        if(countEstq <10){
        countEstq = countEstq+1;
        createLabelTamanho();
        createInputTamanho();
        createLabelEstq();
        createInputEstq();
        createDiv2();
        }else{
            alert('número de Tamanhos excedido');
        }

    })


    //<div class="col-md-5">
     //                   <label for="tamanho" class="form-label">Tamanho</label>
     //                   <input type="text" name='tamanho' class="form-control" id="tamanho" placeholder="" required="">
      //                  <div class="invalid-feedback">
      //                      Tamanho da roupa é requirido.
      //                  </div>
      //              </div>
    function createDivCol() {
        var elemento = document.createElement('div');
        elemento.setAttribute('class', 'col-md-5');
        elemento.setAttribute('id', countEstq);
        

        divEstq.prepend(elemento);
    }
    function createLabelTamanho(){
        var elemento = document.createElement('label');
        elemento.setAttribute('for', 'tamanho' + countEstq);
        elemento.setAttribute('class', 'form-label mt-5 ');
        elemento.textContent = 'Tamanho';

        divEstq.appendChild(elemento);
    }
    
    function createInputTamanho() {
        var elemento = document.createElement('input');
        elemento.setAttribute('type', 'text');
        elemento.setAttribute('class', 'form-control ');
        elemento.setAttribute('name', 'tamanho' + countEstq);
        elemento.setAttribute('id', 'tamanho' + countEstq);
        elemento.setAttribute('required', '');

        divEstq.appendChild(elemento);
    }

    function createLabelEstq(){
        var elemento = document.createElement('label');
        elemento.setAttribute('for', 'estoque' + countEstq);
        elemento.setAttribute('class', 'form-label');
        elemento.textContent = 'Estoque';

        divEstq.appendChild(elemento);
    }
    function createInputEstq() {
        var elemento = document.createElement('input');
        elemento.setAttribute('type', 'number');
        elemento.setAttribute('class', 'form-control mb-5');
        elemento.setAttribute('name', 'estoque' + countEstq);
        elemento.setAttribute('id', 'estoque' + countEstq);
        elemento.setAttribute('required', '');

        divEstq.appendChild(elemento);
    }
    function createDiv2() {
        var elemento = document.createElement('div');
        elemento.setAttribute('class', 'invalid-feedback');
        elemento.textContent = 'Tamanho da roupa é requirido.';

        divEstq.prepend(elemento);
    }
    


</script>
@endpush
