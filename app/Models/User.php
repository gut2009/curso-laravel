<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'imagem'
    ];

    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name,' . $this->id . '|min:3',
            'email' => 'required|unique:users,email,' . $this->id . '',
            'password' => 'required',
            'imagem' => 'required|file|mimes:png,jpeg,jpg,webp',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'name.min' => 'O nome do usuário deve ter, no mínimo, 3 caracteres',
            'name.unique' => 'O nome de usuário já existe',
            'email.unique' => 'O email informado já existe',
            'imagem.file' => 'A imagem, do tipo png, jpeg, jpg, webp, é obrigatória',
            'imagem.mimes' => 'A imagem deve ser do tipo png, jpeg, jpg, webp',
        ];
    }



    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function getUsuariosPesquisarIndex (string $search = '') {
        
        $usuario = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();

        return $usuario;
    }

}