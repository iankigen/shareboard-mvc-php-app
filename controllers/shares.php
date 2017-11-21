<?php


class Shares extends Controller{
    protected function index(){
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function add(){
        if(isset($_SESSION['is_logged_in'])){
            $viewmodel = new ShareModel();
            $this->returnView($viewmodel->add(), true);
        }else{
            header('Location: '.ROOT_URL.'users/login');
        }

    }

    protected function delete(){

    }

    protected function update(){

    }
}