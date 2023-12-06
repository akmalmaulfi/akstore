<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class OwnerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // lakukan pengecekan apakah user adalah customer
        $owner = session()->get('ownerData');
        if ($owner === null) {
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to(base_url('/login-owner'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
