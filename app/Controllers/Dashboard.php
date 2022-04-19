<?php

namespace App\Controllers;

// session_start();

class Dashboard extends BaseController
{
    public function index()
    {

        echo view('templates/header');
        echo view('dashboard');
        echo view('templates/footer');
    }

    // public function create(){
        
    // }
}
