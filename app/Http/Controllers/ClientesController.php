<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Componentes;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar;
        
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function visualizarCliente(Request $request, $id)
    {
        $findCliente = Cliente::where('id', $id)->first();
  
        return view('pages.clientes.visualizar', ['findCliente' => $findCliente]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        Toastr::success('Dados EXCLUÍDOS com sucesso.');
        
        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestCliente $request)
    {
        if ($request->method() == "POST") {
            // cria dados
            $data = $request->all();
            
            Cliente::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('cliente.index');
        };
        // Mostrar dados
        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestCliente $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('cliente.index');
        }
        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}