<?php

namespace App\Http\Controllers;

use App\Service\LoginService;
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
        return $response;
    }
}
