<?php
namespace App\Controllers;
use App\Models\UserModel;

// Start the session
session_start();

class Account extends BaseController
{

    public function index(){
        echo view('templates/header');
        echo view('home_page.php');
        echo view('templates/footer');
    }
    
    public function signup($err = ''){
        $isLoggedIn = isset($_SESSION['userData']);
        if($isLoggedIn) {
            return redirect()->to('users'); 
        }
        echo view('templates/header');
        echo view('signup', ['err' => $err]);
        echo view('templates/footer');
    }

    public function signup_action(){
        $model = new UserModel();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // fetch record from DB
        $isExists = $model->checkUserExists($email);
        if($isExists) {
            return redirect()->to('account/signup/exists');
        }

        $data =[
            'name' => $name,
            'email' => $email,
            'password' => md5($password)
        ];
        $model->insert($data);

        return redirect()->to('account/login');
    }

    public function login($err = ''){
        $isLoggedIn = isset($_SESSION['userData']);
        if($isLoggedIn) {
            return redirect()->to('users'); 
        }
        echo view('templates/header');
        echo view('login', ['err' => $err]);
        echo view('templates/footer');
    }
    
    public function login_action(){
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        
        $userData = $model->checkLogin($email,md5($password));
        if(!$userData) {
            return redirect()->to('account/login/err');
        }
        // echo "<pre>";
        // print_r($userData);
        $_SESSION['userData'] = $userData;
        return redirect()->to('users'); 
    }

    public function logout(){
       // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        return redirect()->to('account/login');
    }
}

