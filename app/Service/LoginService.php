<?php

namespace App\Service;

use App\Models\LoginModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginService

{
    
    public function login(Request $request)
    {
        $data = $request->validate([
            'Email' => 'required|string|max:255',
            'Senha' => 'required|string|max:255',
        ]);
    
        $regras = [
            'Email' => 'email',
            'Senha' => 'required'
        ];
    
        $feedback = [
            'Email' => 'O campo usuário  não é valido',
            'Senha.required' => 'O campo senha é obrigatório'
        ];
    
        $request->validate($regras,$feedback);
    
        $login = LoginModel::where('Email', $data['Email'])->first();
        if ($login) {
            
            return ['success' => true];
        }
        return ['success' => false, 'message' => 'Invalido email ou senha'];
    }
    
    



    public function showLogins(){
        $logins = LoginModel::all();
        return $logins;
    }

    public function createLogin($data) {
        $dataLogin = new LoginModel();
        
        $dataLogin->create([
            'Email' => $data['Email'],
            'Senha' => $data['Senha'],
        ]);
        if (ValidacaoService::validarEmail($data['Email'])) {
            return "Login criado com sucesso!";
        } else {
            return "Falha na validação do e-mail.";
        }
    
}
}