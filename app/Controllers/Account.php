<?php
namespace App\Controllers;
use App\Models\UserModel;

class Account extends BaseController
{

    public function __construct(){
        helper(['form', 'url']);
    }

    public function index(){
        echo view('templates/header');
        echo view('home_page.php');
        echo view('templates/footer');
    }
    
    public function signup($err = ''){
        // $isLoggedIn = isset($_SESSION['userData']);
        // if($isLoggedIn) {
        //     return redirect()->to('users'); 
        // }
        echo view('templates/header');
        echo view('signup', ['err' => $err]);
        echo view('templates/footer');
    }

    public function signup_action(){

        // fetch record from DB
        $validation = $this->validate([
            'email' =>[
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' =>[
            'required' => 'Email id required', 
            'valid_email' => 'Enter valid Email id', 
            'is_unique' => 'Email already exists', 
            ]
            ]
        ]);
            if(!$validation){

                echo view('templates/header');
                echo view('signup', ['validation'=>$this->validator]);
            }else{

                $name = $this->request->getVar('name');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $data =[
                'name' => $name,
                'email' => $email,
                'password' => md5($password)
                ];
                $model = new UserModel();
                $model->insert($data);

                return redirect()->to('account/login');
        }
    }

    public function login($err = ''){
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
        }else{
        $session = session();
        $session_data =[
            'id' => $userData['id'],
            'name' => $userData['name'],
            'email' => $userData['email'],
            'logged_in' => TRUE,
        ];

            $session->set($session_data);
            // echo "<pre>";
            // print_r($session_data);
            // die();
            return redirect()->to('/dashboard');
        }
    }

    public function logout(){
        // $session = session();
        session()->destroy();
        return redirect()->to('account/login');
    }
}

