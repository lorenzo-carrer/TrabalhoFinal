<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->email = $form->email;
        $usuario->usuario = $form->usuario;
        $usuario->senha = Hash::make($form->senha);

        $usuario->save();

        return redirect()->route('home');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST'))
        {
            $email = $form->email;
            $senha = $form->senha;

            $consulta = Usuario::select('id', 'email', 'usuario', 'senha')->where('email', $email)->get();

            // Confere se encontrou algum usuário
            if ($consulta->count())
            {
                // Confere se a senha está correta
                if (Hash::check($senha, $consulta[0]->senha))
                {
                    unset($consulta[0]->senha);

                    session()->put('usuario', $consulta[0]);

                    return redirect()->route('home');
                }
            }

            // Login deu errado (usuário ou senha inválidos)
            return redirect()->route('login')->with('erro', 'Email ou senha inválidos.');
        }

        return view('usuarios.login');
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('home');
    }

    public function perfil()
    {
        return view('usuarios.perfil');
    }

    public function editarPerfil(Request $form)
    {
        $usuario = session('usuario');

        if(isset($form->imagem)){ $usuario->nome = $form->nome;}
        if(isset($form->imagem)){$usuario->sobrenome = $form->sobrenome;}
        if(isset($form->imagem)){ $usuario->usuario = $form->usuario;}
        if(isset($form->imagem)){ $usuario->celular = $form->celular;}
        if(isset($form->imagem)){$usuario->endereco = $form->endereco;}
        if(isset($form->imagem)){ $usuario->complemento = $form->complemento ;}
        if(isset($form->imagem)){$usuario->cep = $form->cep;}
        if(isset($form->imagem)){$usuario->estado = $form->estado;}
        if(isset($form->imagem)){$usuario->descEmp = $form->descEmp ;}
        if(isset($form->imagem)){ $usuario->detalhes = $form->detalhes;}

        $usuario->save();

        if(isset($form->imagem)){
            //salvando imagem
            $img = session('usuario');
            if($form->hasFile('imagem') && $form->file('imagem')->isValid()) {
                $requestImage = $form->imagem;
                $extension = $requestImage->extension();

                //criptografa o arquivo e torna ele único com o 'strtotime'
                $imgName = md5($requestImage->getClientoriginalName(). strtotime("now")) . "." . $extension;
                
                //vai salvar o arquivo na pasta public
                $form->imagem->move(public_path('img/'),$imgName);
                $usuario->imagem = $imgName;

            }
            $img->save();
        }



        $usuario->save();

        return redirect()->route('home');
    }



}
