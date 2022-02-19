<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\Produtos_Imagen;
use App\Models\Usuario;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CarrinhosController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('id', 'desc')->get();
        $cart = Cart::content();
        $imagens = Produtos_Imagen::orderBy('id', 'desc')->get();
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.carrinho',['prods'=> $produtos, 'cart'=> $cart, 'imgs'=> $imagens,'users'=> $usuarios]);
    }



    public function store(Request $form)
    {
        $prod = Produto::findOrFail($form->id_produto);
        Cart::add($prod->id, $prod->nome, $form->quantidade, $prod->preco);

        return redirect()->route('home');
    }
    public function remove(Request $form)
    {
        $prod = Produto::findOrFail($form->id_produto);
        $cart = Cart::content();
        foreach($cart as $carrinho){
            if($carrinho->id == $prod->id){
                $rowId = $carrinho->rowId;
                Cart::remove($rowId);
            }
        }
            

        return redirect()->route('home');
    }


}
