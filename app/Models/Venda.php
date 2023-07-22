<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\VendasController;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'cliente_id',
        'produto_id',
    ];

    
    public function produto()
    {
        //return $this->belongsTo(Produto::class);
        return $this->belongsTo('App\Models\Produto');
    }

    public function cliente()
    {
        //return $this->belongsTo(Cliente::class);
        return $this->belongsTo('App\Models\Cliente');
    }
    
    public function getVendasPesquisarIndex (string $search = '') {
        
        $venda = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('id', $search);
                $query->orWhere('id', 'LIKE', "%{$search}%");
            }
        })->get();

        return $venda;
    }
}