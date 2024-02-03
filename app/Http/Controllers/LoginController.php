<?php

namespace App\Http\Controllers;

use App\Service\LoginService;
use App\Service\ValidacaoService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('login.login');
    }
    public function listaLogin(){
     
        $response = $this->showlogins();
        return view('login.listaLogin',[$response]);
    }

    public function login(Request $request)
    {
        $response = $this->loginService->login($request);
        
        if ($response['success']) {
            return redirect()->route('membros.create');
        } else {
            return back()->withErrors(['message' => $response['message']]);
        }
    }

    public function showlogins(){
        $response = $this->loginService->showLogins();
        return view('login.listaLogin', ['response' => $response]);   
    }

    public function cadastrologins(){
        return view('login.cadastroLogin');
    }

    public function createLogin(Request $request){
        $cond = $this->loginService->createLogin($request);
        return ValidacaoService::validarEmail($cond);
        
    }
}
