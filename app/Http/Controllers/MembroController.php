<?php

namespace App\Http\Controllers;

use App\Service\MembroService;
use Illuminate\Http\Request;

class MembroController extends Controller
{
    private $membroService;

    public function __construct(MembroService $membroService) {
        $this->membroService = $membroService;
    }
    public function index() {
        $membros = $this->membroService->MembroServiceGet();
        return view('membros.index', ['membros' => $membros]);
    }
    

    public function create() {
        return view('membros.create');
    }

    public function store(Request $request) {
        // Validar os dados do formulário aqui conforme necessário
        $data = $request->validate([
            'primeiro_nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'funcao' => 'required|string|max:255',
        ]);

        // Chamar o método MembroServiceCreate passando os dados
        $this->membroService->MembroServiceCreate($data);

        // Redirecionar ou fazer o que for apropriado após a criação
        return view('membros.index');
    }

    public function show($id) {
        $membro = $this->membroService->MembroServiceGetId($id);
        return view('membros.show', ['membro' => $membro]);
    }
}
