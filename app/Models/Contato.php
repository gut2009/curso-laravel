<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Leitor;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'leitor_id',
        'mensagem',
        'status'
    ];

    public function rules()
    {
        return [
            'leitor_id' => 'exists:leitores,id',
            'leitor_id' => 'required',
            'mensagem' => 'required|min:10|max:400',
            'status' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'mensagem.min' => 'A mensagem deve ter, no mínimo, 10 caracteres',
            'mensagem.max' => 'A mensagem deve ter, no máximo, 400 caracteres'
        ];
    }

    public function leitor()
    {
        //UM contato PERTENCE a UM Leitor
        return $this->belongsTo('App\Models\Leitor');
    }

    public function getContatosPesquisarIndex (string $search = '') {
        
        $contato = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $contato;
    }

    protected $guarded = [];

   


}