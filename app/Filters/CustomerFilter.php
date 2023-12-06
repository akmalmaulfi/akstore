<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CustomerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // lakukan pengecekan apakah user adalah customer
        $customerData = session()->get('customerData');
        if ($customerData === null || $customerData['role'] != 'customer') {
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to(base_url('/login-cust'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
