<?php 
class Home extends Controller
{
    public function index($name='') {



        $data = [
            'title' => 'Home',
            'bigTitle'=>"Home",
        ];
        $this->view('Template/inc.NavTS', $data).
        $this->view('Home').
        $this->view('Template/inc.Footer');
    }
    public function indexs() {
        echo 'Hellsso';
    }
}