<?php

class Un_model extends CI_Model
{
    public function buscaUn($cidade, $valor, $valorReal, $qtd_plan, $qtd_real, $qtd_lancado, $qtd_executado,$servico, $segmento)
    { 
        $cidades = $this->db->query("SELECT nm_businessunitdesc, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
        SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancado, SUM($qtd_executado) as qtd_wo_executado
        FROM spitotal WHERE  nm_municipio = '$cidade' AND servico = '$servico' AND segmento = '$segmento' GROUP BY nm_businessunitdesc ORDER BY ($valorReal) DESC")->result_array();

        return $cidades;
    }

    public function buscaItem($cidade, $valor, $valorReal, $qtd_plan, $qtd_real, $qtd_lancado, $qtd_executado,$servico, $segmento)
    { 
        $cidades = $this->db->query("SELECT material, segmento, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
        SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancado, SUM($qtd_executado) as qtd_wo_executado
        FROM spitotal WHERE  nm_municipio = '$cidade' AND servico = '$servico' AND segmento = '$segmento' GROUP BY material ORDER BY ($valorReal) DESC")->result_array();

        return $cidades;
    }

    public function buscaItenUn($un, $valor, $valorReal, $qtd_plan, $qtd_real, $qtd_lancado, $qtd_executado, $servico, $cidade){
        $itens = $this->db->query("SELECT material, SUM($valor) as valor_plan, SUM($valorReal) as valor_real, 
        SUM($qtd_real) as qtde_real, SUM($qtd_plan) as qtde_plan, SUM($qtd_lancado) as qtd_wo_lancado, SUM($qtd_executado) as qtd_wo_executado
        FROM spitotal WHERE nm_businessunitdesc  = '$un' AND servico = '$servico' AND nm_municipio = '$cidade' GROUP BY material ORDER BY ($valorReal) DESC")->result_array();

        return $itens;

    }
}
