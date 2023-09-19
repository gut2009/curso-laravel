<?php

namespace App\Http\Controllers;

use App\Models\Espirito;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestEspirito;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;


class EspiritoController extends Controller
{
    public function __construct(Espirito $espirito)
    {
        $this->espirito = $espirito;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findEspirito = $this->espirito->getEspiritosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.espiritos.paginacao', compact('findEspirito'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->espirito->rules(), $this->espirito->feedback());
            // cria dados
            $data = $request->all();
            
            Espirito::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('espirito.index');
        };
        // Mostrar dados
        return view('pages.espiritos.create');
    }

    public function update(Espirito $espirito, Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $request->validate($this->espirito->rules(), $this->espirito->feedback());
            // atualiza os dados
            $data = $request->all();
           
            $buscaRegistro = Espirito::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('espirito.index');
        }
        $findEspirito = Espirito::where('id', '=', $id)->first();

        return view('pages.espiritos.atualiza', compact('findEspirito'));
    }

    public function show(Request $request, $id)
    {
        $findEspirito = Espirito::where('id', $id)->first();
  
        return view('pages.espiritos.visualizar', ['findEspirito' => $findEspirito]);
    }

    public function destroy(Request $request, $id)
    {
        $espirito = Espirito::all();
        $espirito = $this->espirito->find($id);

        $espirito->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('espirito.index');
    }    
}