<?php
defined('BASEPATH') or exit('No direct script access allowed');


class MY_Loader extends CI_Loader{

    public function template($nome, $dados){
        $this->view('cabecalho.php');
        $this->view($nome, $dados);
        $this->view('rodape.php');

    }

}