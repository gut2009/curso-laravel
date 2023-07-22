<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cep',
    ];

    public function getClientesPesquisarIndex (string $search = '') {
        
        $cliente = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $cliente;
    }
    public function vendas()
    {
        //UM Cliente POSSUI MUITAS vendas
        return $this->hasMany('App\Models\Venda');
    }
}