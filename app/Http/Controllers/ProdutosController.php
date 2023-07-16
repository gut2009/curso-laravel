<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar;
        
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request)
    {

        $pesquisar = $request->pesquisar;
        
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.produtos.paginacao', compact('findProduto'));
    }
}