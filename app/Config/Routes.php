<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Admin Routes - Get
$routes->get('/', 'LoginCustomer::index');
$routes->get('/beranda', 'Beranda::index', ['filter' => 'admin']);
$routes->get('/login-admin', 'LoginAdmin::index');
$routes->get('/regist-admin', 'RegistAdmin::index', ['filter' => 'admin']);
$routes->get('/item-handler', 'MasterProduk::index', ['filter' => 'admin']);
$routes->get('/order-handler', 'Pesanan::index', ['filter' => 'admin']);
$routes->get('/transaction-handler', 'Transaksi::index', ['filter' => 'admin']);
$routes->get('/report-handler', 'Pager::report_handler', ['filter' => 'admin']);
$routes->get('/admin-logout', 'LoginAdmin::logout', ['filter' => 'admin']);
$routes->get('/kategori/(:num)', 'MasterProduk::deleteKategori/$1', ['filter' => 'admin']);
$routes->delete('/produk/(:num)', 'MasterProduk::deleteProduk/$1', ['filter' => 'admin']);
$routes->get('/members', 'Member::index', ['filter' => 'admin']);
$routes->get('/regist-custAdmin', 'Member::signupCustPage', ['filter' => 'admin']);
$routes->get('/editCustPage/(:num)', 'Member::editCustPage/$1', ['filter' => 'admin']);
$routes->get('/editAdmin/(:num)', 'Member::editAdminPage/$1', ['filter' => 'admin']);
$routes->get('/regist-owner', 'Member::registOwnerPage', ['filter' => 'admin']);
$routes->get('/editOwner/(:num)', 'Member::editOwnerPage/$1', ['filter' => 'admin']);

$routes->get('/addCart/(:num)', 'ProdukController::addToCart/$1', ['filter' => 'customer']);

// Admin Route - Post
$routes->post('/regist-admin/create', 'RegistAdmin::signup');
$routes->post('/login-admin/signin', 'LoginAdmin::signin');
$routes->post('/item-handler/create-kategori', 'MasterProduk::createKategori', ['filter' => 'admin']);
$routes->post('/kategori/update', 'MasterProduk::updateKategori', ['filter' => 'admin']);
$routes->post('/kategori/getKategoriJSON', 'MasterProduk::getKategoriJSON', ['filter' => 'admin']);
$routes->post('/produk/getProdukJSON', 'MasterProduk::getProdukJSON', ['filter' => 'admin']);
$routes->post('/produk/create', 'MasterProduk::createProduk', ['filter' => 'admin']);
$routes->post('/produk/update', 'MasterProduk::updateProduk', ['filter' => 'admin']);
$routes->patch('/cancel-order', 'Pesanan::cancelOrder', ['filter' => 'admin']);
$routes->patch('/confirm-order', 'Pesanan::confirmOrder', ['filter' => 'admin']);
$routes->patch('/order-shipped', 'Transaksi::orderShipped', ['filter' => 'admin']);
$routes->patch('/order-arrived', 'Transaksi::orderArrived', ['filter' => 'admin']);
$routes->delete('/deleteCustAdmin', 'Member::deleteCustAdmin', ['filter' => 'admin']);
$routes->post('/updateCustAdmin', 'Member::updateCustAdmin', ['filter' => 'admin']);
$routes->delete('/deleteAdmin', 'Member::deleteAdmin', ['filter' => 'admin']);
$routes->put('/updateAdmin', 'Member::updateAdmin', ['filter' => 'admin']);
$routes->post('/regist-owner/create', 'Member::signupOwner', ['filter' => 'admin']);
$routes->delete('/delete-owner', 'Member::deleteOwner', ['filter' => 'admin']);
$routes->post('/updateOwner', 'Member::updateOwner', ['filter' => 'admin']);
$routes->post('/registCustAdmin', 'Member::signupCust', ['filter' => 'admin']);
$routes->post('/report', 'Laporan::index', ['filter' => 'admin']);
$routes->post('/rate', 'Rate::save');

// Customer Routes - Get
$routes->get('/regist-cust', 'RegistCustomer::index');
$routes->get('/login-cust', 'LoginCustomer::index');
$routes->get('/products', 'ProdukController::index', ['filter' => 'customer']);
$routes->get('/detail', 'ProdukController::detail', ['filter' => 'customer']);
$routes->get('/detail/(:num)', 'ProdukController::detail/$1', ['filter' => 'customer']);
$routes->get('/cart', 'Cart::index', ['filter' => 'customer']);
$routes->get('/invoice/(:num)', 'Invoice::index/$1', ['filter' => 'customer']);
$routes->get('/order-log', 'OrderLog::index', ['filter' => 'customer']);
$routes->get('/profile/(:num)', 'Profile::index/$1', ['filter' => 'customer']);
$routes->get('/cust-logout', 'LoginCustomer::logout', ['filter' => 'customer']);
$routes->get('/removeProduct/(:num)', 'Cart::removeProductFromCart/$1', ['filter' => 'customer']);
$routes->get('/clear-cart', 'Cart::clearCart', ['filter' => 'customer']);
$routes->get('/search', 'ProdukController::searchByKategori', ['filter' => 'customer']);

// Customer Route - Post
$routes->post('/regist-cust/create', 'RegistCustomer::signup');
$routes->post('/login-cust/signin', 'LoginCustomer::signin');
$routes->post('/checkout', 'Cart::checkout', ['filter' => 'customer']);
$routes->post('/paymentProof', 'Invoice::paymentProof', ['filter' => 'customer']);
$routes->post('/cancelOrder', 'Invoice::cancelOrder', ['filter' => 'customer']);
$routes->post('/profile/update', 'Profile::updateCustomer', ['filter' => 'customer']);
$routes->post('/order-arrived-cust', 'Invoice::orderArrivedCust', ['filter' => 'customer']);

$routes->get('/login-owner', 'Owner::loginPageOwner');
$routes->post('/login-owner/signin', 'Owner::signin');
$routes->get('/owner-home', 'Owner::home', ['filter' => 'owner']);
$routes->get('/owner-produk', 'Owner::produk', ['filter' => 'owner']);
$routes->get('/owner-logout', 'Owner::logout', ['filter' => 'owner']);
$routes->post('/laporan-owner', 'Owner::index', ['filter' => 'owner']);

$routes->get('/recommend', 'Recommend::index');
