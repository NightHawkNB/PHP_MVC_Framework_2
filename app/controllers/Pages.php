<?php
class Pages extends Controller{

    protected $pagesModel;

    public function __construct(){
        $this->pagesModel = $this->model('M_Pages');
    }
    public function index(){

        $data = [];

        $this->view('pages/index');
    }

    public function about(){
        $users = $this->pagesModel->getUsers();

        $data = [
            'users' => $users,
            'username' => "Nipun"
        ];

        $this->view('about', $data);
    }
}