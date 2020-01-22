<?php

class Graficos_model extends CI_Model
{

    public function segmento()
    {
        $seg = $this->db->query("SELECT segmento, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real       
        FROM spitotal GROUP BY segmento ORDER BY (valor_real) DESC")->result_array();

        return $seg;
    }

    public function segmentoServico($servico)
    {
        $seg = $this->db->query("SELECT segmento, servico, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real       
        FROM spitotal WHERE servico = '$servico' GROUP BY segmento ORDER BY (valor_real) DESC")->result_array();

        return $seg;
    }

    public function buscaCidadesSegmento($ddd, $servico)
    {
        if ($servico == 'Consolidado') {
            $seg = $this->db->query("SELECT nm_municipio, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real       
        FROM spitotal WHERE ddd = '$ddd' GROUP BY nm_municipio ORDER BY (nm_municipio) ASC")->result_array();
            return $seg;
        }else{
            $seg = $this->db->query("SELECT nm_municipio, SUM(valor_plan) as valor_plan, SUM(valor_real) as valor_real       
            FROM spitotal WHERE ddd = '$ddd' AND servico = '$servico' GROUP BY nm_municipio ORDER BY (nm_municipio) ASC")->result_array();
                return $seg;
        }
    }
}
