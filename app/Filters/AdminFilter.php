<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // lakukan pengecekan apakah user adalah customer
        $admin = session()->get('adminData');
        if ($admin === null || $admin['role'] != 'admin') {
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to(base_url('/login-admin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
