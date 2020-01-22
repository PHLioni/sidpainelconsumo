<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cidades extends CI_Controller
{

    public function juntaCidades()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $ddd = $this->input->get('selecionaDDD');           
            $segmento = $this->input->get('segmento');

            $serv = $this->input->get('servico');

            $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

            $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

            $servico = str_replace($comAcentos, $semAcentos, $serv);


            $this->load->model('Home_model');
            //$query = $this->Home_model->buscaDb(); 

            $this->load->model('Cidades_model');
            $dadosCidadesPlan = $this->Cidades_model->buscaCidadeDb(
                $ddd,
                $servico,
                $segmento,
                'valor_plan',
                'valor_real',
                'qtde_plan',
                'qtde_real',
                'qtd_wo_lancada',
                'qtd_wo_executada'
            );

            $nome = $this->session->userdata('nome');

            $dados = array('dadosPlan' => $dadosCidadesPlan, 'ddd' => $ddd, 'nome' => $nome, 'segmento' => $segmento, 'servico' => $servico);

            $this->load->helper('formataReal');

            $this->load->template('telas/cidades.php', $dados);
        }
    }
}
