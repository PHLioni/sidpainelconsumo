<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graficos extends CI_Controller
{
    public function juntaGraficos()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {

            $serv = $this->input->get('servico');

            $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

            $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

            $servico = str_replace($comAcentos, $semAcentos, $serv);

            $this->load->model('graficos_model');
            $segmento = $this->graficos_model->segmento();

            foreach ($segmento as $seg) :
                if ($seg['segmento'] == 'GPON') {
                    $gponPlan = $seg['valor_plan'];
                    $gponReal = $seg['valor_real'];
                } else {
                    $hfcPlan = $seg['valor_plan'];
                    $hfcReal = $seg['valor_real'];
                }
            endforeach;

            if ($hfcPlan < $hfcReal) {
                $difHfc = $hfcReal - $hfcPlan;
            } else {
                $difHfc = $hfcPlan - $hfcReal;
            }

            if ($gponPlan < $gponReal) {
                $difGpon = $gponReal - $gponPlan;
            } else {
                $difGpon = $gponPlan - $gponReal;
            }

            $segmentoInstalacao = $this->graficos_model->segmentoServico("Instalacao");

            foreach ($segmentoInstalacao as $seg) :
                if ($seg['segmento'] == 'GPON') {
                    $gponPlanInst = $seg['valor_plan'];
                    $gponRealInst = $seg['valor_real'];
                } else {
                    $hfcPlanInst = $seg['valor_plan'];
                    $hfcRealInst = $seg['valor_real'];
                }
            endforeach;

            if ($hfcPlanInst < $hfcRealInst) {
                $difHfcInst = $hfcRealInst - $hfcPlanInst;
            } else {
                $difHfcInst = $hfcPlanInst - $hfcRealInst;
            }

            if ($gponPlanInst < $gponRealInst) {
                $difGponInst = $gponRealInst - $gponPlanInst;
            } else {
                $difGponInst = $gponPlanInst - $gponRealInst;
            }

            $segmentoManutencao = $this->graficos_model->segmentoServico("Manutencao");

            foreach ($segmentoManutencao as $seg) :
                if ($seg['segmento'] == 'GPON') {
                    $gponPlanManu = $seg['valor_plan'];
                    $gponRealManu = $seg['valor_real'];
                } else {
                    $hfcPlanManu = $seg['valor_plan'];
                    $hfcRealManu = $seg['valor_real'];
                }
            endforeach;

            if ($hfcPlanManu < $hfcRealManu) {
                $difHfcManu = $hfcRealManu - $hfcPlanManu;
            } else {
                $difHfcManu = $hfcPlanManu - $hfcRealManu;
            }

            if ($gponPlanManu < $gponRealManu) {
                $difGponManu = $gponRealManu - $gponPlanManu;
            } else {
                $difGponManu = $gponPlanManu - $gponRealManu;
            }

            if ($servico == "") {
                $cidades12 = $this->graficos_model->buscaCidadesSegmento('12', 'Consolidado');
                $cidades13 = $this->graficos_model->buscaCidadesSegmento('13', 'Consolidado');
                $cidades14 = $this->graficos_model->buscaCidadesSegmento('14', 'Consolidado');
                $cidades15 = $this->graficos_model->buscaCidadesSegmento('15', 'Consolidado');
                $cidades16 = $this->graficos_model->buscaCidadesSegmento('16', 'Consolidado');
                $cidades17 = $this->graficos_model->buscaCidadesSegmento('17', 'Consolidado');
                $cidades18 = $this->graficos_model->buscaCidadesSegmento('18', 'Consolidado');
                $cidades19 = $this->graficos_model->buscaCidadesSegmento('19', 'Consolidado');
            } else {
                $cidades12 = $this->graficos_model->buscaCidadesSegmento('12', $servico);
                $cidades13 = $this->graficos_model->buscaCidadesSegmento('13', $servico);
                $cidades14 = $this->graficos_model->buscaCidadesSegmento('14', $servico);
                $cidades15 = $this->graficos_model->buscaCidadesSegmento('15', $servico);
                $cidades16 = $this->graficos_model->buscaCidadesSegmento('16', $servico);
                $cidades17 = $this->graficos_model->buscaCidadesSegmento('17', $servico);
                $cidades18 = $this->graficos_model->buscaCidadesSegmento('18', $servico);
                $cidades19 = $this->graficos_model->buscaCidadesSegmento('19', $servico);
            }
            $dados = array(
                'hfcPlan' => $hfcPlan, 'hfcReal' => $hfcReal,
                'gponPlan' => $gponPlan, 'gponReal' => $gponReal, 'difHfc' => $difHfc,
                'difGpon' => $difGpon, 'hfcPlanInst' => $hfcPlanInst, 'hfcRealInst' => $hfcRealInst,
                'gponPlanInst' => $gponPlanInst, 'gponRealInst' => $gponRealInst, 'difHfcInst' => $difHfcInst,
                'difGponInst' => $difGponInst, 'hfcPlanManu' => $hfcPlanManu, 'hfcRealManu' => $hfcRealManu,
                'gponPlanManu' => $gponPlanManu, 'gponRealManu' => $gponRealManu, 'difHfcManu' => $difHfcManu,
                'difGponManu' => $difGponManu, 'cidades12' => $cidades12, 'cidades13' => $cidades13, 'cidades14' => $cidades14,
                'cidades15' => $cidades15, 'cidades16' => $cidades16, 'cidades17' => $cidades17, 'cidades18' => $cidades18,
                'cidades19' => $cidades19, 'servico' => $serv
            );

            $this->load->helper('formataReal');


            $this->load->template('telas/graficos', $dados);
        }
    }
}
