<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class FormRequestUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // public function rules(): array
    // {
    //     $request = [];
    //     if ($this->method() == "POST" || $this->method() == "PUT") {
    //         $request = [
    //             'name' => 'required|unique:users,name,' . $this->id . '|min:3',
    //             'email' => 'required|unique:users,email,' . $this->id . '',
    //             'password' => 'required',
    //             'imagem' => 'required|file|mimes:png,jpeg,jpg,webp',
    //         ];
    //     }
    //     return $request;
    // }

    // public function feedback()
    // {
    //     return [
    //         'required' => 'O campo :attribute é obrigatório',
    //         'name.min' => 'O nome do usuário deve ter, no mínimo, 3 caracteres',
    //         'name.unique' => 'O nome de usuário já existe',
    //         'email.unique' => 'O email informado já existe',
    //         'imagem.file' => 'A imagem, do tipo png, jpeg, jpg, webp, é obrigatória',
    //         'imagem.mimes' => 'A imagem deve ser do tipo png, jpeg, jpg, webp',
    //     ];
    // }
}