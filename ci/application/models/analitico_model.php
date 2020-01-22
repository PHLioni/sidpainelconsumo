<?php


class Analitico_model extends CI_Model
{

    public function tipoServico($ddd)
    {
        $dados = $this->db->query("SELECT ds_tipo_os, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real,
        SUM(qtde_plan) as qtde_plan, SUM(qtde_real) as qtde_real FROM spitotal WHERE ddd = '$ddd' GROUP BY ds_tipo_os ORDER BY(valor_real) DESC")->result_array();

        return $dados;
    }

    public function contrato($ddd)
    {
        $dados = $this->db->query("SELECT nr_contrato, nm_municipio, ds_tipo_os, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real,
        SUM(qtde_plan) as qtde_plan, SUM(qtde_real) as qtde_real FROM spitotal WHERE ddd = '$ddd' GROUP BY nr_contrato ORDER BY(valor_real) DESC")->result_array();

        return $dados;
    }

    public function buscaItensContrato($contrato)
    {
        $dados = $this->db->query("SELECT material, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real,
        SUM(qtde_plan) as qtde_plan, SUM(qtde_real) as qtde_real FROM spitotal
        WHERE nr_contrato = '$contrato' GROUP BY material ORDER BY(valor_real) DESC ")->result_array();

        return $dados;
    }

    public function codBaixa($ddd)
    {
        $dados = $this->db->query("SELECT cd_baixa, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real,
        SUM(qtde_plan) as qtde_plan, SUM(qtde_real) as qtde_real FROM spitotal WHERE ddd = '$ddd' GROUP BY cd_baixa ORDER BY(valor_real) DESC")->result_array();

        return $dados;
    }

    public function buscaCtt($codigo, $ddd){
        $dados = $this->db->query("SELECT nr_contrato, nm_municipio, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real,
        SUM(qtde_plan) as qtde_plan, SUM(qtde_real) as qtde_real FROM spitotal WHERE ddd = '$ddd' AND cd_baixa = '$codigo'
        GROUP BY nr_contrato ORDER BY(valor_real) DESC")->result_array();

        return $dados;
    }
}
