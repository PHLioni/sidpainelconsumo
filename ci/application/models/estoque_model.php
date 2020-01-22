<?php


class Estoque_model extends CI_Model
{

    public function consolidado()
    {
        return $this->db->query("SELECT  ddd, grupo, sp,  SUM(quantidade) as quantidade,
       SUM(valor_total) as valor_total FROM sistemaestoque.estoque GROUP BY ddd")->result_array();
    }

    public function consolidado2()
    {
        return $this->db->query("SELECT  ddd, grupo, sp,  SUM(quantidade) as quantidade,
       SUM(valor_un) as valor_un FROM sistemaestoque.estoque GROUP BY ddd")->result_array();
    }

    public function consolidadoEquipamentos()
    {
        return $this->db->query("SELECT  ddd, grupo, sp, quantidade,
       valor_total FROM sistemaestoque.estoque WHERE grupo = 'EQUIPAMENTOS'")->result_array();
    }

    public function consolidadoMiscelaneas()
    {
        return $this->db->query("SELECT  ddd, item, grupo, sp, quantidade, 
       valor_un, valor_total FROM sistemaestoque.estoque WHERE grupo = 'MISCELANEAS'")->result_array();
    }

    public function consolidadoGrupo()
    {
        return $this->db->query("SELECT sp FROM sistemaestoque.estoque GROUP BY ddd")->result_array();
    }


    public function equipamentosEstoque()
    {
        return $this->db->query("SELECT valor_un, ddd,  SUM(quantidade) as quantidade,
       SUM(valor_un) as valor_un FROM sistemaestoque.estoque WHERE grupo = 'EQUIPAMENTOS' GROUP BY ddd")->result_array();
    }

    public function miscelaneasEstoque()
    {
        return $this->db->query("SELECT valor_un, ddd,  SUM(quantidade) as quantidade,
       SUM(valor_total) as valor_total FROM sistemaestoque.estoque WHERE grupo = 'MISCELANEAS' GROUP BY ddd")->result_array();
    }

    public function buscaCidades()
    {
        return $this->db->query("SELECT cidade FROM sistemaestoque.estoque GROUP BY cidade ")->result_array();
    }

    public function buscaItens($cidade, $grupo)
    {
        return $this->db->query("SELECT codigoItem, item, tecnologia, valor_un, SUM(quantidade) as quantidade FROM sistemaestoque.estoque 
        WHERE cidade = '$cidade' AND grupo = '$grupo' GROUP BY item ")->result_array();
    }

    public function buscaPedidos($cidade)
    {
        return $this->db->query("SELECT *,SUM(quantidade) as quantidade FROM sistemaestoque.pedidos 
        WHERE cidade = '$cidade' GROUP BY nome ")->result_array();
    }

    public function buscaDetalhesEquipamentos($ddd)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade FROM sistemaestoque.pedidos  WHERE ddd = '$ddd' AND grupo = 'EQUIPAMENTOS' GROUP BY cidade")->result_array();
    }

    public function buscaDetalhesMiscelaneas($ddd)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade FROM sistemaestoque.pedidos  WHERE ddd = '$ddd' AND grupo = 'MISCELANEAS' GROUP BY cidade")->result_array();
    }

    public function buscaStatus($ddd)
    {
        $this->db->where('ddd', $ddd);
        $this->db->group_by('num_pedido');
        return $this->db->get('sistemaestoque.pedidos')->result_array();
    }

    public function buscaTecnicos($cidade, $grupo)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade FROM sistemaestoque.pedidos WHERE cidade = '$cidade' AND grupo = '$grupo' GROUP BY nome")->result_array();
    }


    public function buscaPedidosTecnico($nome, $grupo)
    {
        return $this->db->query("SELECT num_pedido, status, data_pagamento, SUM(quantidade) as quantidade FROM sistemaestoque.pedidos WHERE nome = '$nome' AND grupo = '$grupo' GROUP BY num_pedido")->result_array();
    }

    public function buscaItensTecnico($num_pedido, $grupo)
    {
        return $this->db->query("SELECT item, status,  SUM(quantidade) as quantidade FROM sistemaestoque.pedidos WHERE num_pedido = '$num_pedido' AND grupo = '$grupo' GROUP BY item")->result_array();
    }

    public function buscaEstoqueEquipamentos($ddd)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade, SUM(valor_un) as valor_un FROM sistemaestoque.estoque WHERE ddd = '$ddd' AND grupo = 'EQUIPAMENTOS' GROUP BY cidade")->result_array();
    }

    public function buscaEstoqueMiscelaneas($ddd)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade, SUM(valor_total) as valor_total FROM sistemaestoque.estoque WHERE ddd = '$ddd' AND grupo = 'MISCELANEAS' GROUP BY cidade")->result_array();
    }

    public function buscaModelosEstoque($cidade)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade FROM sistemaestoque.estoque WHERE cidade = '$cidade' AND grupo = 'EQUIPAMENTOS' GROUP BY item")->result_array();
    }

    public function buscaMisEstoque($cidade)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade FROM sistemaestoque.estoque WHERE cidade = '$cidade' AND grupo = 'MISCELANEAS' GROUP BY item")->result_array();
    }

    public function equipamentosEstoqueDetalhe($sp, $segmento)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade FROM sistemaestoque.estoque WHERE grupo = '$segmento' AND sp = '$sp' GROUP BY item ORDER BY (quantidade) ASC")->result_array();
    }

    public function equipamentosEstoqueDetalheSpi($segmento)
    {
        return $this->db->query("SELECT *, SUM(quantidade) as quantidade, SUM(valor_un) as valor_un FROM sistemaestoque.estoque WHERE grupo = '$segmento' GROUP BY item ORDER BY (quantidade) ASC")->result_array();
    }
}
