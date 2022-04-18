<?php

namespace App\Controllers;

// session_start();

class Dashboard extends BaseController
{
    public function index()
    {
        if(!session()->has('logged_in')){
            return redirect()->to('account/login');
        }

        echo view('templates/header');
        echo view('dashboard');
        echo view('templates/footer');
    }

    // public function create(){
        
    // }
}
