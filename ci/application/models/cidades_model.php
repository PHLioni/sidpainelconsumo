<?php

class Cidades_model extends CI_Model
{
    public function buscaCidadeDb($ddd, $servico, $segmento, $valor, $valorReal, $qtd_plan, $qtd_real, $qtd_lancado, $qtd_executado)
    {
        if ($ddd == '12') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();

            return $cidades;
        } elseif ($ddd == '13') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        } elseif ($ddd == '14') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        } elseif ($ddd == '15') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        } elseif ($ddd == '16') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        } elseif ($ddd == '17') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        } elseif ($ddd == '18') {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        } elseif ($ddd == "19") {
            $cidades = $this->db->query("SELECT nm_municipio, servico, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
            SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancada, SUM($qtd_executado) as qtd_wo_executada
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_municipio ORDER BY($valorReal) DESC")->result_array();
            return $cidades;
        }
    }

    public function buscaCidades()
    {
        $cidades = $this->db->query("SELECT nm_municipio FROM spitotal GROUP BY nm_municipio")->result_array();
        return $cidades;
    }

    public function buscaTecnicos(
        $cidade,
        $servico,
        $valor_plan,
        $valor_real,
        $qtde_plan,
        $qtde_real,
        $qtd_wo_lancada,
        $qtd_wo_executada
    ) {
        $tecnicos = $this->db->query("SELECT nm_tecnico,servico, nm_municipio, SUM($valor_plan) as valor_plan, SUM($valor_real) as valor_real, 
        SUM($qtde_real) as qtde_real, SUM($qtde_plan) as qtde_plan, SUM($qtd_wo_lancada) as qtd_wo_lancada, SUM($qtd_wo_executada) as qtd_wo_executada
        FROM spitotal WHERE nm_municipio = '$cidade' AND servico = '$servico' GROUP BY nm_tecnico ORDER BY($valor_real) DESC")->result_array();

        return $tecnicos;
    }

    public function buscaItensTecnico(
        $cidade,
        $servico,
        $tecnico,
        $valor_plan,
        $valor_real,
        $qtde_plan,
        $qtde_real,
        $qtd_wo_lancada,
        $qtd_wo_executada
    ) {
        $tecnicos = $this->db->query("SELECT material, SUM($valor_plan) as valor_plan, SUM($valor_real) as valor_real, 
        SUM($qtde_real) as qtde_real, SUM($qtde_plan) as qtde_plan, SUM($qtd_wo_lancada) as qtd_wo_lancada, SUM($qtd_wo_executada) as qtd_wo_executada
        FROM spitotal WHERE nm_municipio = '$cidade' AND servico = '$servico' AND nm_tecnico = '$tecnico' GROUP BY material ORDER BY($valor_real) DESC")->result_array();

        return $tecnicos;
    }
}
