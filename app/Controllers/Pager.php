<?php

namespace App\Controllers;

class Pager extends BaseController
{
    public function index(): string
    {
        return view('dashboard/index');
    }

    // public function login_cust()
    // {
    //     return view('auth/login_cust');
    // }

    // public function login_admin()
    // {
    //     return view('auth/login_admin');
    // }

    // public function regist_cust()
    // {
    //     return view('auth/register_cust');
    // }

    // public function regist_admin()
    // {
    //     return view('auth/register_admin');
    // }

    // public function item_handler()
    // {
    //     return view('dashboard/item_handler');
    // }

    public function order_handler()
    {
        return view('dashboard/order_handler');
    }

    // public function transaction_handler()
    // {
    //     return view('dashboard/transaction_handler');
    // }

    public function report_handler()
    {
        return view('dashboard/report_handler');
    }

    // Customer
    // public function products()
    // {
    //     return view('customer/index');
    // }

    public function detail()
    {
        return view('customer/product_detail');
    }

    // public function cart()
    // {
    //     return view('customer/cart');
    // }

    // public function invoice()
    // {
    //     return view('customer/invoice');
    // }

    // public function order_log()
    // {
    //     return view('customer/order_log');
    // }

    // public function profile()
    // {
    //     return view('customer/profile');
    // }
}
