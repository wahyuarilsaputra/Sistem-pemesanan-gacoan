<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class UserFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Mengecek apakah pengguna telah login
        if (!Services::session()->get('isLoggedIn')) {
            // Pengguna belum login, maka arahkan kembali ke halaman login
            return redirect()->to('/');
        }
        else{

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Mengecek apakah pengguna telah login
        if (Services::session()->get('isLoggedIn') && $request->uri->getSegment(1) === 'login') {
            // Pengguna sudah login dan mencoba mengakses halaman login, maka arahkan kembali ke halaman beranda
            return redirect()->to('/beranda/index');
        }
    }
}
