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
                    if($file->move(FCPATH.'public/uploads/',$imageName)){
                        $filepath = base_url().'/public/uploads/'.$imageName;
                        session()->setFlashdata('filepath', $filepath);
                        return redirect()->to('UserProfile/')->with('success', 'Photo uploaded successfully');
                    }else{
                        return redirect()->back()->with('fail', 'Photo not uploaded');
                    }
                }
            }else{
                echo view('templates/header');
                echo view('/profile', ['validation'=>$this->validator]);
            }
        }
    }

}
    

