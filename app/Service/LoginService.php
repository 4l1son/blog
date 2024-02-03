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
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('membros.create');
        } else {
            return back()->withErrors(['message' => 'Invalido email ou senha']);
        }
    }

    public function showLogins(){
        $logins = LoginModel::all();
        return $logins;
    }

    public function createLogin($data) {
        $dataLogin = new LoginModel();
        
        // Assuming that 'Email' and 'Senha' are properties of LoginModel
        $dataLogin->create([
            'Email' => $data['Email'],
            'Senha' => $data['Senha'],
        ]);
        if (ValidacaoService::validarEmail($data['Email'])) {
            return "Login criado com sucesso!";
        } else {
            // Handle the case where email validation fails
            return "Falha na validação do e-mail.";
        }
    
}
}