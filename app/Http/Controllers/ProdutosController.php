<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use App\Models\Produtos_Estoque;
use App\Models\Produtos_Imagen;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function create()
    {
        return view('produtos.create');
    }

    public function insert(Request $form)
    {
       $prod = new Produto();

       $prod->nome = $form->nome;
       $prod->preco = $form->preco;
       $prod->desc = $form->desc;
       $prod->categoria = $form->categoria;
       $prod->id_usuario = session('usuario.id');

       $prod->save();


       $count = 1;
       while($count<=5){
        if(isset($form->{'imagem'.$count})){
            //salvando imagem
            $img = new Produtos_Imagen();

            // Image Upload
            if($form->hasFile('imagem'.$count) && $form->file('imagem'.$count)->isValid()) {
                    $requestImage = $form->{'imagem'.$count};
                    $extension = $requestImage->extension();

                    //criptografa o arquivo e torna ele único com o 'strtotime'
                    $imgName = md5($requestImage->getClientoriginalName(). strtotime("now")) . "." . $extension;
                    
                    //vai salvar o arquivo na pasta public
                    $form->{'imagem'.$count}->move(public_path('img/'),$imgName);
                    $img->imagem = $imgName;
                    $img->id_produto = $prod->id;

                }

                $img->save();

            }

            $count= $count+1;
        }

        //salvando estoque

        
       $count = 1;
       while($count<=10){
        if(isset($form->{'tamanho'.$count})){
            //salvando estoque
            $estq = new Estoque();
            $estq->tamanho = $form->{'tamanho'.$count};
            $estq->estoque = $form->{'estoque'.$count};

            $estq->save();
            //linkando estoque com o produto

            $prodEstq = new Produtos_Estoque();
            $prodEstq->id_estoque = $estq->id;
            $prodEstq->id_produto = $prod->id;

            $prodEstq->save();

            }

            $count= $count+1;
        }


        

        return redirect()->route('home');
    }

    public function meusProdutos(){
        $produtos = Produto::orderBy('id', 'desc')->get();
        $estoques = Estoque::orderBy('id', 'desc')->get();
        $imagens = Produtos_Imagen::orderBy('id', 'desc')->get();
        $prodEstoques = Produtos_Estoque::get();
        return view('produtos.meusProdutos',['prods' => $produtos,'estqs' => $estoques, 'imgs' => $imagens, 'prodEstqs' => $prodEstoques]);
    }



    public function calcados(){
        $produtos = Produto::orderBy('id', 'desc')->get();
        $estoques = Estoque::orderBy('id', 'desc')->get();
        $imagens = Produtos_Imagen::orderBy('id', 'desc')->get();
        $prodEstoques = Produtos_Estoque::get();

        $usuarios = Usuario::orderBy('id', 'asc')->get();
        return view('produtos.calcados',['prods' => $produtos,'estqs' => $estoques, 'imgs' => $imagens, 'prodEstqs' => $prodEstoques,'users'=>$usuarios, $count=0]);
    }
    public function inverno(){
        $produtos = Produto::orderBy('id', 'desc')->get();
        $estoques = Estoque::orderBy('id', 'desc')->get();
        $imagens = Produtos_Imagen::orderBy('id', 'desc')->get();
        $prodEstoques = Produtos_Estoque::get();

        $usuarios = Usuario::orderBy('id', 'asc')->get();
        return view('produtos.inverno',['prods' => $produtos,'estqs' => $estoques, 'imgs' => $imagens, 'prodEstqs' => $prodEstoques,'users'=>$usuarios, $count=0]);
    }
    public function verao(){
        $produtos = Produto::orderBy('id', 'desc')->get();
        $estoques = Estoque::orderBy('id', 'desc')->get();
        $imagens = Produtos_Imagen::orderBy('id', 'desc')->get();
        $prodEstoques = Produtos_Estoque::get();

        $usuarios = Usuario::orderBy('id', 'asc')->get();
        return view('produtos.verao',['prods' => $produtos,'estqs' => $estoques, 'imgs' => $imagens, 'prodEstqs' => $prodEstoques,'users'=>$usuarios, $count=0,$countS=0]);
    }
    public function diversos(){
        $produtos = Produto::orderBy('id', 'desc')->get();
        $estoques = Estoque::orderBy('id', 'desc')->get();
        $imagens = Produtos_Imagen::orderBy('id', 'desc')->get();
        $prodEstoques = Produtos_Estoque::get();

        $usuarios = Usuario::orderBy('id', 'asc')->get();
        return view('produtos.diversos',['prods' => $produtos,'estqs' => $estoques, 'imgs' => $imagens, 'prodEstqs' => $prodEstoques,'users'=>$usuarios, $count=0]);
    }

}
