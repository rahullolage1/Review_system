<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'email', 'password', 'dob', 'profilePic'];

    // public function checkUserExists($email) {
    //     $sql="Select * from users where email='$email'";
    //     $query = $this->db->query($sql);
    //     return $query->getResultArray();
    // }

    public function saveUser($name, $email, $password)
    {
        return $this->insert(array('name' => $name, 'email' => $email, 'password' => $password));
    }

    public function checkLogin($email, $password)
    {
        $sql = "Select id, name, email from users where email='$email' AND password='$password'";
        $query = $this->db->query($sql);
        return $query->getRowArray();
    }

}
