<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Componentes;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request)
    {
        $findVendas = Venda::join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
        ->join('produtos', 'vendas.produto_id', '=', 'produtos.id')
        ->select(
            'vendas.id',
            'vendas.cliente_id',
            'vendas.numero_da_venda',
            'vendas.produto_id',
            'vendas.created_at',
            'vendas.updated_at',
            'clientes.nome as cliente_nome',
            'produtos.nome as produto_nome',
        )
        ->get();
        
        $pesquisar = $request->pesquisar;
        $findPesquisa = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.vendas.paginacao', compact('findVendas', 'findPesquisa'));
        
    }

    public function visualizarVenda(Request $request, $id)
    {
        $verVendas = Venda::join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
        ->join('produtos', 'vendas.produto_id', '=', 'produtos.id')
        ->select(
            'vendas.id',
            'vendas.cliente_id',
            'vendas.produto_id',
            'vendas.created_at',
            'vendas.updated_at',
            'clientes.nome as cliente_nome',
            'produtos.nome as produto_nome',
        )
        ->get();
        
        $verVendas = $verVendas->where('id', $id)->first();

        return view('pages.vendas.visualizar', ['verVendas' => $verVendas]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Venda::find($id);
        $buscaRegistro->delete();

        Toastr::success('Dados EXCLUÍDOS com sucesso.');
        
        return response()->json(['success' => true]);
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrarVenda(FormRequestVenda $request)
    {
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto =  Produto::all();
        $findCliente =  Cliente::all();

        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            $data['cliente_nome'] = $findCliente;
            $data['produto_nome'] = $findProduto;

            Venda::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('venda.index');
        }
        // mostrar os dados

        return view('pages.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
    }

    public function atualizarVenda(FormRequestVenda $request, $id)
    {
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto =  Produto::all();
        $findCliente =  Cliente::all();

        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();

            $buscaRegistro = Venda::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('venda.index');
        }
        $findVenda = Venda::where('id', '=', $id)->first();

        return view('pages.vendas.atualiza', compact('findVenda', 'findCliente', 'findProduto'));
    }

    public function enviaComprovantePorEmail($id)
    {
        $buscarVenda = Venda::where('id', '=', $id)->first();
        $clienteEmail = $buscarVenda->cliente->email;
        $clienteNome = $buscarVenda->cliente->nome;
        $produtoNome = $buscarVenda->produto->nome;

        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome
        ];
        
        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));

        Toastr::success('Email enviado com sucesso.');
        return redirect()->route('venda.index');
    }
}