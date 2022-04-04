<?php

namespace App\Controllers;

session_start();

class Users extends BaseController
{
    public function index()
    {
        $isLoggedIn = isset($_SESSION['userData']);
        if(!$isLoggedIn) {
            return redirect()->to('account/login');
        }

        // print_r($session->get('userData'));

        echo view('templates/header', ['isLoggedIn' => $isLoggedIn]);
        echo view('home_page', ['isLoggedIn' => $isLoggedIn, 'userData' => $isLoggedIn ? $_SESSION['userData']: []]);
        echo view('templates/footer');
    }
    
    // public function homepage()
    // {
    //     echo view('templates/header');
    //     echo view('home_page');
    //     echo view('templates/footer');
    // }
}
