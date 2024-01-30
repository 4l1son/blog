<?php

namespace App\Http\Controllers;

use App\Service\MembroService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembroController extends Controller
{
    private $membroService;

    public function __construct(MembroService $membroService) {
        $this->membroService = $membroService;
    }
    public function index() {
        $membros = $this->membroService->MembroServiceGet();
        return view('membros.index').compact($membros);
    }
    

    public function create() {
        return view('membros.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'primeiro_nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'funcao' => 'required|string|max:255',
        ]);

        $this->membroService->MembroServiceCreate($data);

        return view('membros.index');
    }

    public function show($id) {
        $membro = $this->membroService->MembroServiceGetId($id);
        return view('membros.show', ['membro' => $membro]);
    }

    public function showMembers(){
        $membros = $this->membroService->MembroServiceGet();
        return view('membros.show', ['membros' => $membros]);

    }

    public function filtro(){
        $membros = DB::table('membro_models')
            ->select('PrimeiroNome', 'Matricula', 'Funcao')
            ->when(request('Matricula'), function ($query, $matricula) {
                return $query->where('Matricula', $matricula);
            });
    
        return view('membros.show', ['membros' => $membros->get()]);
    }
    
    public function getFiltro(){
        return view('membros.show');
    }
    
    
}
