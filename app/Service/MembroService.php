<?php

namespace App\Service;

use App\Models\MembroModel;

class MembroService {
    protected $membro;

    public function __construct(MembroModel $membro) {
        $this->membro = $membro;
    }

    public function MembroServiceCreate(array $data) {
        // Certifique-se de que o campo 'PrimeiroNome' esteja presente nos dados
        $this->membro->create([
            'PrimeiroNome' => $data['primeiro_nome'],
            'Matricula' => $data['matricula'],
            'Funcao' => $data['funcao'],
        ]);
    }

    public function MembroServiceGet() {
        return $this->membro->all();
    }
    

    public function MembroServiceGetId($id) {
        return $this->membro->find($id);
    }
}
