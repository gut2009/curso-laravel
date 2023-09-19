<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestLeitor;
use App\Models\Componentes;
use App\Models\Leitor;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class LeitorController extends Controller
{
    public function __construct(Leitor $leitor)
    {
        $this->leitor = $leitor;
    }
    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar;
        
        $findLeitor = $this->leitor->getLeitoresPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.leitores.paginacao', compact('findLeitor'));
    }

    public function store(Leitor $leitor, Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->leitor->rules(), $this->leitor->feedback());
           
            $imagem = $request->file('imagem');
            
            $imagem_urn = $imagem->store('imagens/leitores', 'public');
           
            $data = ([
                'nome' => $request->nome,
                'imagem' => $imagem_urn,
                'email' => $request->email,
                'nascimento' => $request->nascimento,
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
            ]);
            Leitor::create($data);
            
            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('leitor.index');
        };
        // Mostrar dados
        return view('pages.leitores.create');
    }

    public function edit($id)
    {
        $leitor = Leitor::find($id);
          return view('pages.leitores.atualiza', ['leitor' => $leitor]);
    }

    public function update(Leitor $leitor, Request $request, $id)
    {
        $leitor = $this->leitor->find($id);

        if ($request->method() === "PATCH") {
            $regrasDinamicas = array();
            //percorrendo todas as regras definidas no Model
            foreach($leitor->rules() as $input => $regra) {
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            $request->validate($regrasDinamicas, $this->leitor->feedback());
        } else {
            $request->validate($this->leitor->rules(), $this->leitor->feedback());
        }
        // preenchemndo o objeto LEITOR com todos os recursos do request
        $leitor = $this->leitor->find($id);

        // se a imagem foi encaminhada na requisição
        if($request->file('imagem')) {
            //remove o arquivo antigo
            Storage::disk('public')->delete($leitor->imagem);
            
            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/leitores', 'public');
            $leitor->imagem = $imagem_urn;
        }
        $leitor->save();

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('leitor.index');
    }

    public function show(Request $request, $id)
    {
        $findLeitor = Leitor::where('id', $id)->first();
  
        return view('pages.leitores.visualizar', ['findLeitor' => $findLeitor]);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     */
    public function destroy(Request $request, $id)
    {
        $leitor = Leitor::all();
        $leitor = $this->leitor->find($id);

        //remove o arquivo antigo
        Storage::disk('public')->delete($leitor->imagem);
        // 
        $leitor->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('leitor.index');
    }
}