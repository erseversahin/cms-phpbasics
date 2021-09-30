<?php


$cms->router->before('GET|POST', '/', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/musteri.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/proje.*', 'Middlewares\AuthMiddleware@isLogin');

$cms->router->get('/', 'Controllers\Home@Index');

// Login Page
$cms->router->get('/giris', 'Controllers\Auth@Index');
// Login Post
$cms->router->post('/giris', 'Controllers\Auth@Login');
$cms->router->get('/cikis', 'Controllers\Auth@Logout');

// Musteriler

$cms->router->mount('/musteri', function() use ($cms) {

    $cms->router->get('/', 'Controllers\Customer@Index');
    $cms->router->get('/ekle', 'Controllers\Customer@Add');
    $cms->router->post('/ekle', 'Controllers\Customer@CreateCustomer');
    $cms->router->get('/guncelle/([0-9]+)', 'Controllers\Customer@Edit');
    $cms->router->get('/detay/([0-9]+)', 'Controllers\Customer@Detail');

    $cms->router->post('/guncelle', 'Controllers\Customer@EditCustomer');
    $cms->router->post('/sil', 'Controllers\Customer@RemoveCustomer');

});
$cms->router->mount('/proje', function() use ($cms) {

    $cms->router->get('/', 'Controllers\Project@Index');
    $cms->router->get('/ekle', 'Controllers\Project@Add');
    $cms->router->post('/ekle', 'Controllers\Project@CreateProject');
    $cms->router->get('/guncelle/([0-9]+)', 'Controllers\Project@Edit');

    $cms->router->post('/guncelle', 'Controllers\Project@EditProject');
    $cms->router->post('/sil', 'Controllers\Project@RemoveProject');

});


