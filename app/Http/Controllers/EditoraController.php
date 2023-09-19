<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestEditora;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class EditoraController extends Controller
{
    public function __construct(Editora $editora)
    {
        $this->editora = $editora;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findEditora = $this->editora->getEditorasPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.editoras.paginacao', compact('findEditora'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->editora->rules(), $this->editora->feedback());
            // cria dados
           
            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/editoras', 'public');
            $data = ([
                'nome' => $request->nome,
                'sigla' => $request->sigla,
                'imagem' => $imagem_urn,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'pais' => $request->pais,
            ]);
            Editora::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('editora.index');
        };
        // Mostrar dados
        return view('pages.editoras.create');
    }

    public function edit($id)
    {
        $editora = Editora::find($id);
          return view('pages.editoras.atualiza', ['editora' => $editora]);
    }

    public function update(Editora $editora, Request $request, $id)
    {
        $editora = $this->editora->find($id);

        if ($request->method() === "PATCH") {
            $regrasDinamicas = array();
            //percorrendo todas as regras definidas no Model
            foreach($editora->rules() as $input => $regra) {
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            $request->validate($regrasDinamicas, $this->editora->feedback());
        } else {
            $request->validate($this->editora->rules(), $this->editora->feedback());
        }
        // preenchemndo o objeto EDITORA com todos os recursos do request
        $editora = $this->editora->find($id);

        // se a imagem foi encaminhada na requisição
        if($request->file('imagem')) {
            //remove o arquivo antigo
            Storage::disk('public')->delete($editora->imagem);

            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/editoras', 'public');
            $editora->imagem = $imagem_urn;
        }
        $editora->save();

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('editora.index');
    }

    public function show(Request $request, $id)
    {
        $findEditora = Editora::where('id', $id)->first();
  
        return view('pages.editoras.visualizar', ['findEditora' => $findEditora]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     */
    
    public function destroy(Request $request, $id)
    {
        $editora = Editora::all();
        $editora = $this->editora->find($id);
 
        //remove o arquivo antigo
        Storage::disk('public')->delete($editora->imagem);

        $editora->delete();

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('editora.index');
    }
}