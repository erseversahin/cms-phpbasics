<?php

namespace App\Controllers;

use App\Model\ModelAuth;
use Core\BaseController;
use Core\Session;

class Auth extends BaseController
{

    public function Index()
    {
        $data['form_link'] = _link('giris');

        echo $this->view->load('auth/index',$data);
    }
    public function Login()
    {
        $data = $this->request->post();



        if (!$data['email']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'E-Posta adresinizi giriniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        if (!$data['password']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Şifrenizi adresinizi giriniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $AuthModel = new ModelAuth();
        $access = $AuthModel->userLogin($data);
        if ($access){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link()]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Kullanıcı adınız veya şifreniz hatalı lütfen tekrar deneyiniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


    }
    public function Logout()
    {
        Session::removeSession();
        redirect('giris');
    }

}