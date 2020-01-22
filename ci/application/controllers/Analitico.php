<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analitico extends CI_Controller
{

    //Função responsável por buscar todos dados e separar por Tipo de OS, Contrato e CodBaixa
    public function buscaDadosAnalitico()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $ddd = $this->input->get('selecionaDDD');

            $this->load->model('analitico_model');
            $tipoServico = $this->analitico_model->tipoServico($ddd);

            $contrato = $this->analitico_model->contrato($ddd);

            $cod_baixa = $this->analitico_model->codBaixa($ddd);

            $dados = array('tipoServico' => $tipoServico, 'ddd' => $ddd, 'contrato' => $contrato, 'codBaixa' => $cod_baixa);

            $this->load->template('telas/analitico', $dados);
        }
    }

    //Essa função mostra em detalhes os itens baixados do contrato clicado
    public function itensContrato()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $contrato = $this->input->get('contrato');
            $ddd = $this->input->get('ddd');

            $this->load->model('analitico_model');
            $itens = $this->analitico_model->buscaItensContrato($contrato);

            $dados = array('contrato' => $contrato, 'itens' => $itens, 'ddd' => $ddd);
            $this->load->template('telas/itensContrato', $dados);
        }
    }

    //Mostra em detalhes os contrados de acordo com o codBaixa clicado
    public function cttCodBaixa()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $ddd = $this->input->get('ddd');
            $codigo = $this->input->get('codBaixa');

            $this->load->model('analitico_model');
            $ctts = $this->analitico_model->buscaCtt($codigo, $ddd);

            $dados = array('codBaixa' => $codigo, 'ddd' => $ddd, 'contratos' => $ctts);
            $this->load->template('telas/cttCodigoBaixa', $dados);
        }
    }

    //Acessa outra pagina de detalhes após clicado em codBaixa e contrato
    public function itensContratoCodBaixa()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $contrato = $this->input->get('contrato');
            $codBaixa = $this->input->get('codBaixa');
            $ddd = $this->input->get('ddd');

            $this->load->model('analitico_model');
            $itens = $this->analitico_model->buscaItensContrato($contrato);

            $dados = array('codBaixa' => $codBaixa, 'contrato' => $contrato, 'itens' => $itens, 'ddd' => $ddd);
            $this->load->template('telas/itensCttCodBaixa', $dados);
        }
    }
}
