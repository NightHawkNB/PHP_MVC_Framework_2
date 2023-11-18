<?php

class Pages extends Controller {
    
    public function index() {
        $this->view('index');
    }

    public function about() {
        $data = ['username' => 'Nipun'];
        $this->view('about', $data);
    }
}