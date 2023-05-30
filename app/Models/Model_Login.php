<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Login extends Model
{
    protected $db;
    protected $tabel = 'tb_user';
    protected $allowedFields = ['username', 'password','level'];
    public function validateLogin($username, $password){
        $user = $this->db->table('tb_user')->where(['username' => $username,'password' => $password])->get()->getRowArray();
        return $user;
    }

}
