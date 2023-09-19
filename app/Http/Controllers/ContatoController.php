<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Leitor;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestContato;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class ContatoController extends Controller
{
    public function __construct(Leitor $leitor, Contato $contato)
    {
        $this->contato = $contato;
        $this->leitor = $leitor;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findContato = $this->contato->getContatosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.contatos.paginacao', compact('findContato'));
    }

    public function store(Request $request)
    {
        $findLeitor = Leitor::all();

        if ($request->method() == "POST") {
            $request->validate($this->contato->rules(), $this->contato->feedback());
            // cria dados
            $data = $request->all();
            
            Contato::create($data);
            // dd($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('contato.index');
        };

        // Mostrar dados
        return view('pages.contatos.create', compact('findLeitor'));
    }

    public function edit($id)
    {
        $findLeitor = Leitor::all();
        
        $findContato = Contato::find($id);

        return view('pages.contatos.atualiza', ['findContato' => $findContato,'findLeitor' => $findLeitor]);
    }

    public function update(Request $request, $id)
    {
        $findLeitor = Leitor::all();
        
        if ($request->method() == "PUT") {
            $request->validate($this->contato->rules(), $this->contato->feedback());
            // atualiza os dados
            $data = $request->all();
            
            $buscaRegistro = Contato::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('contato.index');
        }
        $findContato = Contato::where('id', '=', $id)->first();
        return view('pages.contatos.atualiza', ['findContato' => $findContato]);
    }

    public function show(Request $request, $id)
    {
        $findContato = Contato::where('id', $id)->first();
  
        return view('pages.contatos.visualizar', ['findContato' => $findContato]);
    }

    public function destroy(Request $request, $id)
    {
        $contato = Contato::all();
        $contato = $this->contato->find($id);

        $contato->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('contato.index');
    }    
}