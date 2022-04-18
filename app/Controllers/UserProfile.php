<?php

namespace App\Controllers;

// session_start();

class UserProfile extends BaseController
{
    
    public function __construct(){
        helper(['form', 'url']);
    }

    public function index()
    {

        echo view('templates/header');
        echo view('profile');
        echo view('templates/footer');
    }

    public function photo_action(){
        if($file = $this->request->getfile('profilePic')){
            $validation = $this->validate([
                'profilePic' => [
                    'rules' => 'uploaded[profilePic]|max_size[profilePic,1024]|ext_in[profilePic,png,jpg,gif]',
                    'errors' => [
                        'uploaded' => 'Please select a file',
                        'max_size' => 'Image size should be less than 1 mb',
                        'ext_in' => 'Only jpg, png and gif file supported'
                    ]
                ]
            ]);
            if($validation){
                
                if($file->isValid() && !$file->hasMoved()){
                    $imageName = $file->getRandomName();
                    if($file->move(WRITEPATH.'uploads/',$imageName)){
                    // echo "<p>File uploaded successfully</p>";
                        // $name = session('name');
                        echo "<pre>";
                        print_r(session('name'));                        

                    }else{
                    echo "<p>File uploaded failed</p>";
                    }
                }
            }else{
            //     // echo "fail";
                echo view('templates/header');
                echo view('/profile', ['validation'=>$this->validator]);
            }
        }
        // echo "<pre>";
        // print_r($file);
        // return view('templates/header');
        // echo view('templates/header');
        // echo view('profile');
        // echo view('templates/footer');
    }

}
    

