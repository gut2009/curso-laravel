<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'leitor_id',
        'livro_id',
        'dt_inicio',
        'dt_devolucao',
        'dt_final',
        'status'
    ];

    public function rules()
    {
        return [
            'leitor_id' => 'exists:leitores,id',
            'livro_id' => 'exists:livros,id',
            
            'leitor_id' => 'required',
            'livro_id' => 'required',
            'dt_inicio' => 'required',
            'dt_devolucao' => 'required',
            'status' => 'required'
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
    }

    public function leitor()
    {
        //UM emprestimo PERTENCE a UM Leitor
        return $this->belongsTo('App\Models\Leitor');
    }

    public function livro()
    {
        //UM emprestimo PERTENCE a UM livro
        return $this->belongsTo('App\Models\Livro');
    }

    public function getEmprestimosPesquisarIndex (string $search = '') {
        
        $emprestimo = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $emprestimo;
    }

    
    protected $guarded = [];
}