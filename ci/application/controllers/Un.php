<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Un extends CI_Controller
{
    public function juntaUn()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $cidade = $this->input->get('cidade');
            $servico = $this->input->get('servico');
            $segmento = $this->input->get('segmento');           

            $this->load->model('Un_model');
            $dadosCidadesPlan = $this->Un_model->buscaUn(
                $cidade,
                'valor_plan',
                'valor_real',
                'qtde_plan',
                'qtde_real',
                'qtd_wo_lancada',
                'qtd_wo_executada',
                $servico,
                $segmento
            );

            $dadosCidadesPlanItem = $this->Un_model->buscaItem(
                $cidade,
                'valor_plan',
                'valor_real',
                'qtde_plan',
                'qtde_real',
                'qtd_wo_lancada',
                'qtd_wo_executada',
                $servico,
                $segmento
            );

            $dados = array('dadosPlan' => $dadosCidadesPlan, 'dadosItem' => $dadosCidadesPlanItem);
            $this->load->helper('formataReal');

            $this->load->template('telas/un', $dados);
        }
    }

    public function itensUn()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $un = $this->input->get('un');
            $servico = $this->input->get('servico');
            $cidade = $this->input->get('cidade');

            $this->load->model('Un_model');
            $itensUn = $this->Un_model->buscaItenUn(
                $un,
                'valor_plan',
                'valor_real',
                'qtde_plan',
                'qtde_real',
                'qtd_wo_lancada',
                'qtd_wo_executada',
                $servico,
                $cidade
            );

            $dados = array('dadosItem' => $itensUn);
            $this->load->helper('formataReal');
            $this->load->template('telas/itensUn', $dados);
        }
    }
}
