<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestAutor;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class AutorController extends Controller
{
    public function __construct(Autor $autor)
    {
        $this->autor = $autor;
    }

    public function index(Autor $autor, Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findAutor = $this->autor->getAutoresPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.autores.paginacao', compact('findAutor'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->autor->rules(), $this->autor->feedback());
            // cria dados
            $data = $request->all();
            
            Autor::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('autor.index');
        };
        // Mostrar dados
        return view('pages.autores.create');
    }

    public function update(Autor $autor, Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $request->validate($this->autor->rules(), $this->autor->feedback());
            // atualiza os dados
            $data = $request->all();
           
            $buscaRegistro = Autor::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('autor.index');
        }
        $findAutor = Autor::where('id', '=', $id)->first();

        return view('pages.autores.atualiza', compact('findAutor'));
    }

    public function show(Request $request, $id)
    {
        $findAutor = Autor::where('id', $id)->first();
  
        return view('pages.autores.visualizar', ['findAutor' => $findAutor]);
    }

    public function destroy(Request $request, $id)
    {
        $autor = Autor::all();
        $autor = $this->autor->find($id);

        $autor->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('autor.index');
    }    
}