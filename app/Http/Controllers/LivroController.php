<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Editora;
use App\Models\Autor;
use App\Models\Espirito;
use App\Models\Categoria;
use App\Models\Assunto;
use App\Models\Tipo;
use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestLivro;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function __construct(Livro $livro)
    {
        $this->livro = $livro;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $findLivro = $this->livro->getLivrosPesquisarIndex(search: $pesquisar ?? '');
      
        return view('pages.livros.paginacao', compact('findLivro'));
    }

    public function store(Request $request)
    {
        $findEditora= Editora::all();
        $findAutor= Autor::all();
        $findEspirito= Espirito::all();
        $findCategoria= Categoria::all();
        $findAssunto= Assunto::all();
        $findTipo= Tipo::all();
        $findLocal= Local::all();

        if ($request->method() == "POST") {
            $request->validate($this->livro->rules(), $this->livro->feedback());
            // cria dados

            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/livros', 'public');
            $data = ([
                'nome' => $request->nome,
                'complemento' => $request->complemento,
                'editora_id' => $request->editora_id,
                'autor_id' => $request->autor_id,
                'espirito_id' => $request->espirito_id,
                'outros_autores' => $request->outros_autores,
                'tradutor' => $request->tradutor,
                'sinopse' => $request->sinopse,
                'imagem' => $imagem_urn,
                'edicao' => $request->edicao,
                'paginas' => $request->paginas,
                'categoria_id' => $request->categoria_id,
                'assunto_id' => $request->assunto_id,
                'tipo_id' => $request->tipo_id,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'isbn' => $request->isbn,
                'local_id' => $request->local_id,
                'status' => $request->status,
            ]);
            
            Livro::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('livro.index');
        };
        // Mostrar dados
        return view('pages.livros.create', [
            'findEditora' => $findEditora,
            'findAutor' => $findAutor,
            'findEspirito' => $findEspirito,
            'findCategoria' => $findCategoria,
            'findAssunto' => $findAssunto,
            'findTipo' => $findTipo,
            'findLocal' => $findLocal,
        ]);
    }

    public function edit($id)
    {
        $findEditora= Editora::all();
        $findAutor= Autor::all();
        $findEspirito= Espirito::all();
        $findCategoria= Categoria::all();
        $findAssunto= Assunto::all();
        $findTipo= Tipo::all();
        $findLocal= Local::all();
        
        $findLivro = Livro::find($id);

        return view('pages.livros.atualiza', ['findLivro' => $findLivro, 'findEditora' =>  $findEditora, 'findAutor' =>  $findAutor, 'findEspirito' =>  $findEspirito, 'findCategoria' =>  $findCategoria, 'findAssunto' =>  $findAssunto, 'findTipo' =>  $findTipo, 'findLocal' =>  $findLocal]);
    }

    public function update(Livro $livro, Request $request, $id)
    {
        // $findEditora= Editora::all();
        // $findAutor= Autor::all();
        // $findEspirito= Espirito::all();
        // $findCategoria= Categoria::all();
        // $findAssunto= Assunto::all();
        // $findTipo= Tipo::all();
        // $findLocal= Local::all();

        $livro = $this->livro->find($id);

        if ($request->method() === "PATCH") {
            $regrasDinamicas = array();
            //percorrendo todas as regras definidas no Model
            foreach($livro->rules() as $input => $regra) {
                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if(array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }
            $request->validate($regrasDinamicas, $this->livro->feedback());
        } else {
            $request->validate($this->livro->rules(), $this->livro->feedback());
        }
        // preenchemndo o objeto LIVRO com todos os recursos do request
        $livro = $this->livro->find($id);

        // se a imagem foi encaminhada na requisição
        if($request->file('imagem')) {
            //remove o arquivo antigo
            Storage::disk('public')->delete($livro->imagem);

            $imagem = $request->file('imagem');
            $imagem_urn = $imagem->store('imagens/livros', 'public');
            $livro->imagem = $imagem_urn;
        }
        $livro->save();
            
        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('livro.index');
    }

    public function show(Request $request, $id)
    {
        $findLivro = Livro::where('id', $id)->first();
  
        return view('pages.livros.visualizar', ['findLivro' => $findLivro]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     */
    public function destroy(Request $request, $id)
    {
        $livro = Livro::all();
        $livro = $this->livro->find($id);
 
        //remove o arquivo antigo
        Storage::disk('public')->delete($livro->imagem);

        $livro->delete();

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('livro.index');
    }
}