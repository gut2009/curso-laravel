<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestTipo;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class TipoController extends Controller
{
    public function __construct(Tipo $tipo)
    {
        $this->tipo = $tipo;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findTipo = $this->tipo->getTiposPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.tipos.paginacao', compact('findTipo'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->tipo->rules(), $this->tipo->feedback());
            // cria dados
            $data = $request->all();
            
            Tipo::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('tipo.index');
        };
        // Mostrar dados
        return view('pages.tipos.create');
    }

    public function update(Tipo $tipo, Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $request->validate($this->tipo->rules(), $this->tipo->feedback());
            // atualiza os dados
            $data = $request->all();
           
            $buscaRegistro = Tipo::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('tipo.index');
        }
        $findTipo = Tipo::where('id', '=', $id)->first();

        return view('pages.tipos.atualiza', compact('findTipo'));
    }

    public function show(Request $request, $id)
    {
        $findTipo = Tipo::where('id', $id)->first();
  
        return view('pages.tipos.visualizar', ['findTipo' => $findTipo]);
    }

    public function destroy(Request $request, $id)
    {
        $tipo = Tipo::all();
        $tipo = $this->tipo->find($id);

        $tipo->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('tipo.index');
    }       
}