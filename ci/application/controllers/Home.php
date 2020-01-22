<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        //Verifica se o usuario está logado, utilizado em todas as funções
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $consumoLeste = 'consumoLeste';
            $consumoCentro = 'consumoCentro';
            $consumoOeste = 'consumoOeste';
            $spitotal = 'spitotal';
        

            $this->load->model('Home_model');
            //$query = $this->Home_model->buscaDb();     
            //Chama o model que soma o valor gasto real 
            $dadosGerentes = $this->Home_model->gerente('valor_real', 'valor_plan');

            //Separa os valores dos gerentes da array dadosGerentes
            foreach ($dadosGerentes as $d) :
                if ($d['nm_gerente'] == 'Evaldo Luiz da Silva Pereira') {
                    $evaldo = $d['valor_real'];
                    $evaldoPlanejado = $d['valor_plan'];
                } elseif ($d['nm_gerente'] == 'Ziad Mohamad Rahal') {
                    $ziad = $d['valor_real'];
                    $ziadPlanejado = $d['valor_plan'];
                } elseif ($d['nm_gerente'] == 'Mateus de Souza Fiorin') {
                    $matheus = $d['valor_real'];
                    $matheusPlanejado = $d['valor_plan'];
                }

            endforeach;

            //Soma os gerentes para obter SPI
            $total = 0;
            $total = $ziad + $evaldo + $matheus;

            $totalPlan = 0;
            $totalPlan = $ziadPlanejado + $evaldoPlanejado + $matheusPlanejado;

            //Tira a diferença entre o real e o planejado
            $difSpi = $total - $totalPlan;
            $difZiad = $ziad - $ziadPlanejado;
            $difEvaldo = $evaldo - $evaldoPlanejado;
            $difMatheus = $matheus - $matheusPlanejado;

            $dadosDDD = $this->Home_model->ddd('valor_real', 'valor_plan');

            //Separa os DDDs da array dadosDDD
            foreach ($dadosDDD as $ddd) :
                if ($ddd['ddd'] == '12') {
                    $ddd12 = $ddd['valor_real'];
                    $ddd12Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '13') {
                    $ddd13 = $ddd['valor_real'];
                    $ddd13Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '14') {
                    $ddd14 = $ddd['valor_real'];
                    $ddd14Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '15') {
                    $ddd15 = $ddd['valor_real'];
                    $ddd15Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '16') {
                    $ddd16 = $ddd['valor_real'];
                    $ddd16Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '17') {
                    $ddd17 = $ddd['valor_real'];
                    $ddd17Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '18') {
                    $ddd18 = $ddd['valor_real'];
                    $ddd18Plan = $ddd['valor_plan'];
                } elseif ($ddd['ddd'] == '19') {
                    $ddd19 = $ddd['valor_real'];
                    $ddd19Plan = $ddd['valor_plan'];
                }
            endforeach;
           
            $dados = array(
                'dadosZiad' => $ziad, 'dadosEvaldo' => $evaldo, 'dadosMatheus' => $matheus,
                'ddd12' => $ddd12, 'ddd13' => $ddd13, 'ddd14' => $ddd14, 'ddd15' => $ddd15, 'ddd16' => $ddd16,
                'ddd17' => $ddd17, 'ddd18' => $ddd18, 'ddd19' => $ddd19, "total" => $total, 'ziadPlanejado' => $ziadPlanejado,
                'evaldoPlanejado' => $evaldoPlanejado, 'matheusPlanejado' => $matheusPlanejado, 'totalPlanSpi' => $totalPlan,
                'difSpi' => $difSpi, 'difZiad' => $difZiad, 'difEvaldo' => $difEvaldo, 'difMatheus' => $difMatheus,
                'dddPlan12' => $ddd12Plan, 'dddPlan13' => $ddd13Plan, 'dddPlan14' => $ddd14Plan, 'dddPlan15' => $ddd15Plan,
                'dddPlan16' => $ddd16Plan, 'dddPlan17' => $ddd17Plan, 'dddPlan18' => $ddd18Plan, 'dddPlan19' => $ddd19Plan,


            );

            $this->load->template("telas/home", $dados);
        }
    }

    public function cidades()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $this->load->template("telas/cidades");
        }
    }
}
