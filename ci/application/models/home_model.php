<?php

class Home_model extends CI_Model
{
    public function gerente($valor, $valor_plan)
    {
        $gerentes = $this->db->query("SELECT nm_gerente, SUM($valor) as valor_real, SUM($valor_plan) as valor_plan FROM spitotal GROUP BY nm_gerente;")->result_array();
     
        return $gerentes;
    }


    public function ddd($valor_real, $valor_plan)
    {

        $ddd = $this->db->query("SELECT ddd, SUM($valor_real) as valor_real, SUM($valor_plan) as valor_plan  FROM spitotal GROUP BY ddd")->result_array();

        return $ddd;
    }

    public function buscaServico($ddd, $servico)
    {
        // //USADO PARA CONTAR DADOS, DEIXAR AQUI...
        // $total = 0;
        // $totalLan = 0;
        // $this->db->count_all_results($grupo);
        // $this->db->like('servico', 'Instalacao');
        // $this->db->like('ddd', $ddd);
        // $this->db->from($grupo);
        // $totalLan = $this->db->count_all_results();      
        $total = 0;
        $aderencia = $this->db->query("SELECT id, VALOR_REAL FROM spitotal WHERE DDD = '$ddd' AND servico = '$servico'")->result_array();

        foreach ($aderencia as $ad) :
            $total = $ad['VALOR_REAL'];
        endforeach;

        return $total;
    }

    public function buscaServicoP($ddd, $servico)
    {
        $total = 0;
        $aderencia = $this->db->query("SELECT id, VALOR_PLAN FROM spitotal WHERE DDD = '$ddd' AND servico = '$servico'")->result_array();
        foreach ($aderencia as $ad) :
            $totalLan = $ad['VALOR_PLAN'];
        endforeach;

        return $total;
    }
}
