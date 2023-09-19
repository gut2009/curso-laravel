<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestAssunto;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class AssuntoController extends Controller
{
    public function __construct(Assunto $assunto)
    {
        $this->assunto = $assunto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findAssunto = $this->assunto->getAssuntosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.assuntos.paginacao', compact('findAssunto'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->assunto->rules(), $this->assunto->feedback());
            // cria dados
            $data = $request->all();
            
            Assunto::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('assunto.index');
        };
        // Mostrar dados
        return view('pages.assuntos.create');
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $request->validate($this->assunto->rules(), $this->assunto->feedback());
            // atualiza os dados
            $data = $request->all();
            
            $buscaRegistro = Assunto::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('assunto.index');
        }
        $findAssunto = Assunto::where('id', '=', $id)->first();

        return view('pages.assuntos.atualiza', compact('findAssunto'));
    }

    public function show(Request $request, $id)
    {
        $findAssunto = Assunto::where('id', $id)->first();
  
        return view('pages.assuntos.visualizar', ['findAssunto' => $findAssunto]);
    }


    public function destroy(Request $request, $id)
    {
        $assunto = Assunto::all();
        $assunto = $this->assunto->find($id);

        $assunto->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('assunto.index');
    }    
}