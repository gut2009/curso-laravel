<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestCategoria;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class CategoriaController extends Controller
{
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findCategoria = $this->categoria->getCategoriasPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.categorias.paginacao', compact('findCategoria'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $request->validate($this->categoria->rules(), $this->categoria->feedback());
            // cria dados
            $data = $request->all();
            
            Categoria::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('categoria.index');
        };
        // Mostrar dados
        return view('pages.categorias.create');
    }

    public function update(Categoria $categoria, Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $request->validate($this->categoria->rules(), $this->categoria->feedback());
            // atualiza os dados
            $data = $request->all();
           
            $buscaRegistro = Categoria::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('categoria.index');
        }
        $findCategoria = Categoria::where('id', '=', $id)->first();

        return view('pages.categorias.atualiza', compact('findCategoria'));
    }

    public function show(Request $request, $id)
    {
        $findCategoria = Categoria::where('id', $id)->first();
  
        return view('pages.categorias.visualizar', ['findCategoria' => $findCategoria]);
    }

    public function destroy(Request $request, $id)
    {
        $categoria = Categoria::all();
        $categoria = $this->categoria->find($id);

        $categoria->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('categoria.index');
    }    
}