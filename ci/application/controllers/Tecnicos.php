<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tecnicos extends CI_Controller
{

    public function juntaTecnicos()
    {

        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $cidade = $this->input->get('cidade');
            $servico = $this->input->get('servico');

            $this->load->model('cidades_model');
            $cidades = $this->cidades_model->buscaCidades();

            $tecnicos = $this->cidades_model->buscaTecnicos(
                $cidade,
                $servico,
                'valor_plan',
                'valor_real',
                'qtde_plan',
                'qtde_real',
                'qtd_wo_lancada',
                'qtd_wo_executada'
            );

            $this->load->helper('formataReal');

            $dados = array('cidades' => $cidades, 'tecnicos' => $tecnicos, 'servico' => $servico);

            $this->load->template('telas/tecnicos', $dados);
        }
    }

    public function itensTecnicos()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $tecnico = $this->input->get('tecnico');
            $cidade = $this->input->get('cidade');

            $serv = $this->input->get('servico');

            $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

            $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

            $servico = str_replace($comAcentos, $semAcentos, $serv);


            $this->load->model('cidades_model');
            $itensTecnico = $this->cidades_model->buscaItensTecnico(
                $cidade,
                $servico,
                $tecnico,
                'valor_plan',
                'valor_real',
                'qtde_plan',
                'qtde_real',
                'qtd_wo_lancada',
                'qtd_wo_executada'
            );

            $this->load->helper('formataReal');

            $dados = array('itensTecnico' => $itensTecnico);


            $this->load->template('telas/itensTecnicos', $dados);
        }
    }
}
