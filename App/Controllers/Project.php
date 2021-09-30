<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelProject;
use Core\BaseController;

class Project extends BaseController
{
    public function Index()
    {
        $ModelProject = new ModelProject();

        $data['projects'] = $ModelProject->getProjects();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('project/index', compact('data'));
    }

    public function Add()
    {

        $ModelCustomer = new ModelCustomer();

        $data['customers'] = $ModelCustomer->getCustomers();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('project/add', compact('data'));
    }

    public function Edit($id)
    {
        $ModelCustomer = new ModelCustomer();
        $data['customers'] = $ModelCustomer->getCustomers();

        $ModelProject = new ModelProject();
        $data['project'] = $ModelProject->getProject($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('project/edit', compact('data'));
    }

    public function CreateProject(){

        $data = $this->request->post();

        if (!$data['title']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen proje adını giriniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $ModelCustomer = new ModelProject();
        $insert = $ModelCustomer->createProject($data);

        if ($insert){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('proje')]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


    }

    public function EditProject(){

        $data = $this->request->post();

        if (!$data['id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Proje bilgisine ulaşamadık lütfen sayfanızı yenileyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if (!$data['title']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Lütfen proje adını boş bırakmayınız.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $ModelProject = new ModelProject();
        $insert = $ModelProject->editProject($data);

        if ($insert){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('proje')]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


    }

    public function RemoveProject(){

        $data = $this->request->post();

        if (!$data['project_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Proje bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


        $remove = $this->db->remove("DELETE FROM projects WHERE projects.id = '{$data['project_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Proje kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['project_id']]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


    }
}