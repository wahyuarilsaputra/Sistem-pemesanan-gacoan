<?php

namespace App\Controllers;
use App\Models\Model_Login;

class Login extends BaseController
{
    public function login(){
        $data = [
            'validation' => \config\Services::validation(),
            'error' => 'Username atau Password salah'
        ];
        return view('index', $data);
    }
    public function validasi_login(){
        if (! $this->validate([
            'username' => 'required',
            'password'  => 'required',
        ])) {
            $data['validation'] = $this->validator;
            return view('index', $data);
        } else{
        $Login_Model = new Model_Login();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $Login_Model->validateLogin($username, $password);
        if ($user) {
            // username ditemukan, lakukan validasi password
            $session = session();
            // login admin
            if ($user['level'] == '1') {
                $sessionData = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'nama' => $user['nama'],
                    'level' => $user['level'],
                    'isLoggedIn' => true,
                    'isAdmin' => true
                    ];
                $session->set($sessionData);
                return redirect()->to('Beranda/index');
            //login selain admin
                } else {
                $sessionData = [
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'password' => $user['password'],
                'nama' => $user['nama'],
                'level' => $user['level'],
                'isLoggedIn' => true,
                'isAdmin' => false
                ];
                $session->set($sessionData);
                return redirect()->to('Beranda/index');
                }
            } else {
                return redirect()->to('/')->with('error', 'Username atau Password salah');
                // username tidak ditemukan
            }
        }
    }
}
