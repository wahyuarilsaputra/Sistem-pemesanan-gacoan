<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
