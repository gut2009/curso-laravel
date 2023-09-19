<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    use HasFactory;

    protected $table = 'leitores';

    protected $fillable = [
        'nome',
        'imagem',
        'email',
        'nascimento',
        'cep',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'uf',
    ];

    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'email' => 'required|unique:leitores,email,' . $this->id . '',
            'imagem' => 'required|file|mimes:png,jpeg,jpg,webp',
            'nascimento' => 'required|date',
            'cidade' => 'required|min:3',
            'uf' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O nome do Leitor deve ter, no mínimo, 3 caracteres',
            'cidade.min' => 'O nome da Cidade deve ter, no mínimo, 3 caracteres',
            'email.unique' => 'O email informado já existe',
            'imagem.file' => 'A imagem, do tipo png, jpeg, jpg, webp, é obrigatória',
            'imagem.mimes' => 'A imagem deve ser do tipo png, jpeg, jpg, webp',
        ];
    }

    public function emprestimos()
    {
        //UM leitor POSSUI MUITOS Emprestimos
        return $this->hasMany('App\Models\Emprestimo');
    }

    public function contatos()
    {
        //UM leitor POSSUI MUITOS Contatos
        return $this->hasMany('App\Models\Contato');
    }

    public function getLeitoresPesquisarIndex (string $search = '') {
        
        $leitor = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $leitor;
    }

}