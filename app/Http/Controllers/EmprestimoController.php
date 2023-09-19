<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Leitor;
use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestEmprestimo;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

use App\Http\Controllers\LeitorController;
use App\Http\Controllers\LivroController;

class EmprestimoController extends Controller
{
    public function __construct(Leitor $leitor, Livro $livro, Emprestimo $emprestimo)
    {
        $this->emprestimo = $emprestimo;
        $this->leitor = $leitor;
        $this->livro = $livro;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findEmprestimo = $this->emprestimo->getEmprestimosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.emprestimos.paginacao', compact('findEmprestimo'));

    }

    public function store(Emprestimo $emprestimo, Request $request)
    {
        $findLeitor = Leitor::all();
        $findLivro = Livro::all();
        
        if ($request->method() == "POST") {
            $request->validate($this->emprestimo->rules(), $this->emprestimo->feedback());
            // cria dados
            $data = $request->all();
            
            Emprestimo::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('emprestimo.index');
        };
       
        // Mostrar dados
        return view('pages.emprestimos.create', compact('findLeitor', 'findLivro'));
    }

    public function edit($id)
    {
        $findLeitor = Leitor::all();
        $findLivro = Livro::all();
        
        $findEmprestimo = Emprestimo::find($id);
        
        return view('pages.emprestimos.atualiza', ['findEmprestimo' => $findEmprestimo,'findLeitor' => $findLeitor, 'findLivro' => $findLivro]);
    }

    public function update(Request $request, $id)
    {
        $findLeitor = Leitor::all();
        $findLivro = Livro::all();
        $findEmprestimo = Emprestimo::find($id);
        
        if ($request->method() == "PUT") {
           
            // ATENÇÃO: a validação não funcionou - Possíveis problemas com datas
            // $request->validate($this->emprestimo->rules(), $this->emprestimo->feedback());
            
            // atualiza os dados
            
            $data = $request->all();
            
            $buscaRegistro = Emprestimo::find($id);
            
            $buscaRegistro->update($data);
            
            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('emprestimo.index');
        }
        
        // $findEmprestimo = Emprestimo::where('id', '=', $id)->first();
        // return view('pages.emprestimos.atualiza', ['findEmprestimo' => $findEmprestimo]);
    }

    public function show(Request $request, $id)
    {
        $findEmprestimo = Emprestimo::where('id', $id)->first();
  
        return view('pages.emprestimos.visualizar', ['findEmprestimo' => $findEmprestimo]);
    }

    public function destroy(Request $request, $id)
    {
        $emprestimo = Emprestimo::all();
        $emprestimo = $this->emprestimo->find($id);

        $emprestimo->delete();

        Toastr::success('Dados excluidos com sucesso.');
        return redirect()->route('emprestimo.index');
    }       

}
    // EXEMPLO DE JOIN
   // $findEmprestimo = Emprestimo::join('leitores', "emprestimos.leitor_id", '=', 'leitores.id')
        // ->join('livros', "emprestimos.livro_id", '=', 'livros.id')
        // ->select(
        //     'emprestimos.id',
        //     'leitor_id',
        //     'livro_id',
        //     'leitores.nome as leitor',
        //     'livros.nome as livro',
        // )
        // ->get();