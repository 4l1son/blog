<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
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

    public function index(Request $request)
    {
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha invalido';
        }
        return view('login.login',['titulo'=>'Login','erro' => $erro]);
    }
    public function listaLogin(){
     
        $response = $this->showlogins();
        return view('login.listaLogin',[$response]);
    }

    public function login(Request $request)
    {
        $response = $this->loginService->login($request);
        $erro = $request->get('erro');  
        if ($response['success']) {
            return view('membros.create');
        } else {
            return redirect()->route('login');
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

    public function loginDuplicado(){
        $loginsDuplicados = \App\Models\LoginModel::select('Email')->groupBy('Email')->havingRaw('COUNT(*) > 1')->get();
        return view('login.loginduplicados',['loginsDuplicados' => $loginsDuplicados]);
    }
}
