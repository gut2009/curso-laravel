<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Leitor;
use App\Models\Emprestimo;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLivroCadastrado = $this->buscaTotalLivroCadastrado();
        $totalLeitorCadastrado = $this->buscaTotalLeitorCadastrado();
        $totalEmprestimoCadastrado = $this->buscaTotalEmprestimoCadastrado();
        $totalUsuarioCadastrado = $this->buscaTotalUsuarioCadastrado();
        return view('pages.dashboard.dashboard', compact('totalLivroCadastrado','totalLeitorCadastrado','totalEmprestimoCadastrado', 'totalUsuarioCadastrado'));
        
    }
    
    public function buscaTotalLivroCadastrado()
    {
        $findLivro = Livro::all()->count();
        return $findLivro;
    }

    public function buscaTotalLeitorCadastrado()
    {
        $findLeitor = Leitor::all()->count();
        return $findLeitor;
    }

    public function buscaTotalEmprestimoCadastrado()
    {
        $findEmprestimo = Emprestimo::all()->count();
        return $findEmprestimo;
    }

    public function buscaTotalUsuarioCadastrado()
    {
        $findUsuario = User::all()->count();
        return $findUsuario;
    }

}