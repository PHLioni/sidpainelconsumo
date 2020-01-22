<?php

class Usuarios_model extends CI_Model{
    public function buscaUser($user, $senha){
        $this->db->where('usuario', $user);
        $this->db->where('senha', $senha);
        $usuario = $this->db->get('usuarios')->row_array();
        return $usuario; 
    }

    public function cadastraUsuario($nome, $usuario, $senha, $sobrenome){
        $dados = array('nome' => $nome,
        'sobrenome' => $sobrenome,
        'usuario' => $usuario,
        'senha' => md5($senha));

        return $this->db->insert('usuarios', $dados);
      
    }

    public function registraLog($id, $nome, $sobrenome, $login, $data, $tempo)
    {

        return $this->db->query("INSERT INTO _log (id_user, nome, login, sobrenome, data_acesso, horaAcesso) 
        value ('$id','$nome', '$login', '$sobrenome', '$data', CURRENT_TIME())");
    }
}
