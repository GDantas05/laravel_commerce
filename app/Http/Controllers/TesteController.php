<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class TesteController extends Controller
{
    
    public function getLogin()
    {
        $data = ['email' => 'contatogdantas@gamil.com', 'password' => '123456'];
        
        if (Auth::attempt($data)) { //LOGAR O USUÁRIO
            return "Logou";
        }
        
        if (Auth::check()) { //VERIFICA SE O USUÁRIO ESTÁ LOGADO
            return "Logado";
        }
        
        return "Falhou";
        $id    = Auth::user()->id; //ID DO USUÁRIO LOGADO
        $name  = Auth::user()->name; //NOME DO USUÁRIO LOGADO
        $email = Auth::user()->email; //EMAIL DO USUÁRIO LOGADO    
        
        //echo "id: ".$id." nome: ".$name." email: ".$email;
    }
    
    public function getLogout()
    {
        Auth::logout();
        
        if (Auth::check()) { //VERIFICA SE O USUÁRIO ESTÁ LOGADO
            return "Logado";
        }
        
        return "Não está logado";
    }
    
}
