<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    
    public function __construct(){
        helper(['form', 'url']);
    }

    public function index()
    {   
        if(!session('logged_in')){
            return redirect()->to('account/login');
        }
        echo view('templates/header');
        echo view('dashboard');
        echo view('templates/footer');
    }
}
