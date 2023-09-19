<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestLocal;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class LocalController extends Controller
{
    public function __construct(Local $local)
    {
        $this->local = $local;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findLocal = $this->local->getLocaisPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.locais.paginacao', compact('findLocal'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->local->rules(), $this->local->feedback());
            // cria dados
            $data = $request->all();
            
            Local::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('local.index');
        };
        // Mostrar dados
        return view('pages.locais.create');
    }

    public function update(Local $local, Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $request->validate($this->local->rules(), $this->local->feedback());
            // atualiza os dados
            $data = $request->all();
           
            $buscaRegistro = Local::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('local.index');
        }
        $findLocal = Local::where('id', '=', $id)->first();

        return view('pages.locais.atualiza', compact('findLocal'));
    }

    public function show(Request $request, $id)
    {
        $findLocal = Local::where('id', $id)->first();
  
        return view('pages.locais.visualizar', ['findLocal' => $findLocal]);
    }

    public function destroy(Request $request, $id)
    {
        $local = Local::all();
        $local = $this->local->find($id);

        $local->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('local.index');
    }    
}