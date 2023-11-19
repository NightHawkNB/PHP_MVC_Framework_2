<?php
class Pages extends Controller{

    protected $pagesModel;

    public function __construct(){
        $this->pagesModel = $this->model('M_Pages');
    }
    public function index(){

        $this->view('index');
    }

    public function about(){
        $users = $this->pagesModel->getUsers();
        print_r($users);
        die;
        $data = [
            'users' => $users
        ];

        $this->view('about', $data);

    }
}