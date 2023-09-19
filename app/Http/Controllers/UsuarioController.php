<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\FormRequestUsuario;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Componentes;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $user = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.usuarios.paginacao', compact('user'));
    }

    public function store(User $user, FormRequestUsuario $request)
    {
        if ($request->method() == "POST") {
            // $request->validate($this->user->rules(), $this->user->feedback());
            
            $user = $request->all();
            // cria dados
            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/usuarios', 'public');
            $user = ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'imagem' => $imagem_urn,
            ]);
            // criptografar a senha
            $user['password'] = Hash::make($user['password']);
            User::create($user);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('usuario.index');
        };
        // Mostrar dados
        return view('pages.usuarios.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
          return view('pages.usuarios.atualiza', ['user' => $user]);
    }  
    
    public function update(User $user, Request $request, $id)
    {
        $user = $this->user->find($id);
       
        if ($request->method() == "PATCH") {
            $regrasDinamicas = array();
            //percorrendo todas as regras definidas no Model
            foreach($user->rules() as $input => $regra) {
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            $request->validate($regrasDinamicas, $this->user->feedback());
        } else {
            $request->validate($this->user->rules(), $this->user->feedback());
        }
        // preenchemndo o objeto USUÀRIO com todos os recursos do request
        $user->fill($request->all());
        
        // se a imagem foi encaminhada na requisição
        if($request->file('imagem')) {
            //remove o arquivo antigo
            Storage::disk('public')->delete($user->imagem);
    
            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/usuarios', 'public');
            $user->imagem = $imagem_urn;
        }

        $user['password'] = Hash::make($user['password']);
        $user->save();
    
        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('usuario.index');
    }

    public function show(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
  
        return view('pages.usuarios.visualizar', ['user' => $user]);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::all();
        $user = $this->user->find($id);
        
        //remover o arquivo imagem
        Storage::disk('public')->delete($user->imagem);

        $user->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('leitor.index');
    }

}