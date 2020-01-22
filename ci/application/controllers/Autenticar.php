<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autenticar extends CI_Controller
{
    public function logar()
    {
        $this->load->model('usuarios_model');
        $user = $this->input->post('usuario');
        $senha = md5($this->input->post('senha'));
        $usuario = $this->usuarios_model->buscaUser(strtoupper($user), $senha);
        
        if ($usuario['usuario'] == 'claro001' && $usuario['senha'] == md5('@claro!')) {      
            redirect('cadastro/criaCadastro');
        } elseif ($usuario) {
            
            date_default_timezone_set('America/Sao_Paulo');
            $id = $usuario['id'];
            $nome = $usuario['nome'];
            $sobrenome = $usuario['sobreNome'];
            $login = $usuario['usuario'];           
            $data = date('Y-m-d');            
            $tempo = date('H:i:s');

            $this->usuarios_model->registraLog($id, $nome, $sobrenome, $login, $data, $tempo);
            $this->session->set_userdata('usuario', $usuario);
            redirect('home/index');
        } else {
            $this->session->set_flashdata('danger', 'Usuario ou senha inválido!');
            redirect('/');
        }
        
    }

    public function logout(){
        $this->session->unset_userdata('usuario');
        redirect('/');

    }

    public function cadastrar()
    {
        $this->load->model('usuarios_model');
        $nome = $this->input->post('nome');
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');       
        $sobrenome = $this->input->post('sobrenome');       

        if ($nome == null || $usuario == null || $senha == null ) {
            $this->session->set_flashdata('danger', 'Todos os campos devem estar preenchidos!');
            redirect('cadastro/criaCadastro');
        } else{
            $this->session->set_flashdata('success', 'Usuario cadastrado com sucesso!');
            $usuario = $this->usuarios_model->cadastraUsuario($nome, strtoupper($usuario), $senha, $sobrenome);          
            redirect('/');       
        }
    }
}
