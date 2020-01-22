<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estoque extends CI_Controller
{

    public function consolidado()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $ziadValor = 0;
            $ziadQuantidade = 0;
            $evaldoValor = 0;
            $evaldoQuantidade = 0;
            $matheusValor = 0;
            $matheusQuantidade = 0;
            $quantidadeEquipZiad = 0;
            $quantidadeEquipEvaldo = 0;
            $quantidadeEquipMatheus = 0;
            $quantidadeMisZiad = 0;
            $quantidadeMisEvaldo = 0;
            $quantidadeMisMatheus = 0;
            $valorEquipZiad = 0;
            $valorEquipEvaldo = 0;
            $valorEquipMatheus = 0;
            $valorMisZiad = 0;
            $valorMisZiadZ = 0;
            $valorMisEvaldo = 0;
            $valorMisMatheus = 0;
            $spLeste = "";
            $spCentro = "";
            $spOeste = "";

            $this->load->model('estoque_model');
            $estoque = $this->estoque_model->consolidado();
            $estoque2 = $this->estoque_model->consolidado2();
            $estoqueGrupo = $this->estoque_model->consolidadoGrupo();    


            $estoqueEquipamentos = $this->estoque_model->equipamentosEstoque();
            $estoqueMiscelaneas = $this->estoque_model->miscelaneasEstoque();

            $estoqueTotalMiscelaneas = $this->estoque_model->consolidadoMiscelaneas();
            $estoqueTotalEquipamentos = $this->estoque_model->consolidadoEquipamentos();       

            foreach ($estoqueTotalEquipamentos as $e) :
                if ($e["ddd"] == 'DDD12' || $e["ddd"] == 'DDD13') {
                    $quantidadeEquipZiad += $e['quantidade'];
                    $valorEquipZiad += $e['valor_total'];

                } elseif ($e['ddd'] == 'DDD15' || $e['ddd'] == 'DDD19') {
                    $quantidadeEquipEvaldo += $e['quantidade'];
                    $valorEquipEvaldo += $e['valor_total'];

                } elseif ($e['ddd'] == 'DDD14' || $e['ddd'] == 'DDD16' || $e['ddd'] == 'DDD17' || $e['ddd'] == 'DDD18') {
                    $quantidadeEquipMatheus += $e['quantidade'];
                    $valorEquipMatheus += $e['valor_total'];
                }

            endforeach;


            foreach ($estoqueTotalMiscelaneas as $e) :
                if ($e["ddd"] == 'DDD12' || $e["ddd"] == 'DDD13') {
                    $quantidadeMisZiad += $e['quantidade']; 
                    $valorMisZiad += $e['valor_total'];    
                    
                } elseif ($e['ddd'] == 'DDD15' || $e['ddd'] == 'DDD19') {
                    $quantidadeMisEvaldo += $e['quantidade'];
                    $valorMisEvaldo += $e['valor_un'] * $e['quantidade'];

                } elseif ($e['ddd'] == 'DDD14' || $e['ddd'] == 'DDD16' || $e['ddd'] == 'DDD17' || $e['ddd'] == 'DDD18') {
                    $quantidadeMisMatheus += $e['quantidade'];
                    $valorMisMatheus += $e['valor_un'] * $e['quantidade'];
                }

            endforeach;

           

            foreach ($estoqueGrupo as $e) :
                if ($e['sp'] == 'SPOeste') {
                    $spOeste = 'SPOeste';
                } else if ($e['sp'] == 'SPLeste') {
                    $spLeste = 'SPLeste';
                } else if ($e['sp'] == 'SPCentro') {
                    $spCentro = 'SPCentro';
                }

            endforeach;

            $matheusValor = $valorEquipMatheus + $valorMisMatheus;
            $ziadValor = $valorEquipZiad + $valorMisZiad;
            $evaldoValor = $valorEquipEvaldo + $valorMisEvaldo;

            $ziadQuantidade = $quantidadeEquipZiad + $quantidadeMisZiad;
            $evaldoQuantidade = $quantidadeEquipEvaldo + $quantidadeMisEvaldo;
            $matheusQuantidade = $quantidadeEquipMatheus + $quantidadeMisMatheus;

            $spivalor = $ziadValor + $evaldoValor + $matheusValor;
            $spiQuantidade = $ziadQuantidade + $evaldoQuantidade + $matheusQuantidade;

            $quantidadeEquipSpi = $quantidadeEquipZiad + $quantidadeEquipEvaldo + $quantidadeEquipMatheus;
            $quantidadeMisSpi = $quantidadeMisZiad + $quantidadeMisEvaldo + $quantidadeMisMatheus;

            $valorEquipSpi = $valorEquipZiad + $valorEquipEvaldo + $valorEquipMatheus;
            $valorMisSpi = $valorMisZiad + $valorMisEvaldo + $valorMisMatheus;

            $dados = array(
                'ziadValor' => $ziadValor, 'ziadQuantidade' => $ziadQuantidade,
                'evaldoValor' => $evaldoValor, 'evaldoQuantidade' => $evaldoQuantidade,
                'matheusValor' => $matheusValor, 'matheusQuantidade' => $matheusQuantidade,
                'spiValor' => $spivalor, 'spiQuantidade' => $spiQuantidade, 'estoque' => $estoque,
                'estoqueEquipamentos' => $estoqueEquipamentos, 'estoqueMiscelaneas' => $estoqueMiscelaneas,
                'quantidadeEquipZiad' => $quantidadeEquipZiad, 'valorEquipZiad' => $valorEquipZiad,
                'quantidadeMisZiad' => $quantidadeMisZiad, 'valorMisZiad' => $valorMisZiad,
                'quantidadeEquipEvaldo' => $quantidadeEquipEvaldo, 'valorEquipEvaldo' => $valorEquipEvaldo,
                'quantidadeMisEvaldo' => $quantidadeMisEvaldo, 'valorMisEvaldo' => $valorMisEvaldo,
                'quantidadeEquipMatheus' => $quantidadeEquipMatheus, 'valorEquipMatheus' => $valorEquipMatheus,
                'quantidadeMisMatheus' => $quantidadeMisMatheus, 'valorMisMatheus' => $valorMisMatheus,
                'quantidadeEquipSpi' => $quantidadeEquipSpi, 'quantidadeMisSpi' => $quantidadeMisSpi,
                'valorEquipSpi' => $valorEquipSpi, 'valorMisSpi' => $valorMisSpi, 'spLeste' => $spLeste,
                'spCentro' => $spCentro, 'spOeste' => $spOeste, 'estoqueGrupo' => $estoqueGrupo, 'spiTotal' => $estoque2
            );

            $this->load->helper('formataReal');

            $this->load->template('telas/estoqueConsolidado', $dados);
        }
    }
    public function estoqueCidades()
    {
        $usuarioLogado = $this->session->userdata("usuario");
        if (!$usuarioLogado) {
            redirect("/");
        } else {
            $this->load->model('estoque_model');
            $cidades = $this->estoque_model->buscaCidades();

            $ci = $this->input->get('cidade');
            $grupo = $this->input->get('grupo');

            $cidade = str_replace("+", " ", $ci);

            $this->load->model('estoque_model');
            $estoqueCidade = $this->estoque_model->buscaItens($cidade, $grupo);

            $this->load->helper('formataReal');

            $dados = array('cidades' => $cidades, 'estoqueCidade' => $estoqueCidade, 'ci' => $cidade, 'grupo' => $grupo);
            $this->load->template('telas/estoqueCidades', $dados);
        }
    }

    public function mostraPedidos()
    {

        $this->load->model('estoque_model');
        $cidades = $this->estoque_model->buscaCidades();

        $ci = $this->input->get('cidade');
        $grupo = $this->input->get('grupo');

        $cidade = str_replace("+", " ", $ci);

        $this->load->model('estoque_model');
        $estoqueCidade = $this->estoque_model->buscaPedidos($cidade);

        $this->load->helper('formataReal');

        $dados = array('cidades' => $cidades, 'estoqueCidade' => $estoqueCidade, 'ci' => $cidade, 'grupo' => $grupo);

        $this->load->template('telas/pedidos.php', $dados);
    }

    public function detalheDDD()
    {

        $ddd = $this->input->get('ddd');

        $this->load->model('estoque_model');
        $detalhesEquipamentos = $this->estoque_model->buscaDetalhesEquipamentos($ddd);
        $detalhesMiscelaneas = $this->estoque_model->buscaDetalhesMiscelaneas($ddd);
        $status = $this->estoque_model->buscaStatus($ddd);

        $equipamentosEstoque = $this->estoque_model->buscaEstoqueEquipamentos($ddd);
        $miscelaneasEstoque = $this->estoque_model->buscaEstoqueMiscelaneas($ddd);

        $pedidosPagos = 0;
        $pedidosAguardando = 0;

        foreach ($status as $d) :
            if ($d['status'] == 'PAGO') {
                $pedidosPagos += 1;
            } else {
                $pedidosAguardando += 1;
            }

        endforeach;    

        $dados = array(
            'detalhesEquipamentos' => $detalhesEquipamentos, 'detalhesMiscelaneas' => $detalhesMiscelaneas,
            'pedidosPagos' => $pedidosPagos, 'pedidosAguardando' => $pedidosAguardando, 'ddd' => $ddd,
            'equipamentosEstoque' => $equipamentosEstoque, 'miscelaneasEstoque' => $miscelaneasEstoque
        );
        $this->load->template('telas/detalheDDD', $dados);
    }

    public function tecnicosEquipamento()
    {

        $cidade = $this->input->get('cidade');
        $grupo = $this->input->get('grupo');
        $ddd = $this->input->get('ddd');

        $this->load->model('estoque_model');
        $tecnicos = $this->estoque_model->buscaTecnicos($cidade, $grupo);


        $dados = array('tecnicos' => $tecnicos, 'cidade' => $cidade, 'ddd' => $ddd);

        $this->load->template('telas/tecnicosEquipamento', $dados);
    }


    public function pedidosTecnico()
    {

        $tecnico = $this->input->get('nome');
        $nome = str_replace("+", " ", $tecnico);

        $cidade = $this->input->get('cidade');
        $ddd = $this->input->get('ddd');
        $grupo = $this->input->get('grupo');

        $this->load->model('estoque_model');
        $pedidos = $this->estoque_model->buscaPedidosTecnico($nome, $grupo);

        $dados = array(
            'pedidos' => $pedidos, 'nome' => $tecnico, 'cidade' => $cidade,
            'ddd' => $ddd, 'grupo' => $grupo
        );

        $this->load->template('telas/pedidosTecnico', $dados);
    }

    public function itensTecnicoDetalhe()
    {
        $num_pedido = $this->input->get('num_pedido');
        $n = $this->input->get('nome');
        $cidade = $this->input->get('cidade');
        $grupo = $this->input->get('grupo');
        $ddd = $this->input->get('ddd');

        $nome = str_replace(' ', '+', $n);

        $this->load->model('estoque_model');
        $itens = $this->estoque_model->buscaItensTecnico($num_pedido, $grupo);


        $dados = array(
            'num_pedido' => $num_pedido, 'itens' => $itens, 'cidade' => $cidade,
            'nome' => $nome, 'grupo' => $grupo, 'ddd' => $ddd
        );

        $this->load->template('telas/itensTecnicoDetalhe', $dados);
    }

    public function modelosEstoque()
    {
        $cidade = $this->input->get('cidade');
        $ddd = $this->input->get('ddd');

        $this->load->model('estoque_model');
        $modelos = $this->estoque_model->buscaModelosEstoque($cidade);

        $dados = array('cidade' => $cidade, 'itens' => $modelos, 'ddd' => $ddd);

        $this->load->template('telas/modelosEstoque', $dados);
    }

    public function misEstoque()
    {
        $cidade = $this->input->get('cidade');
        $ddd = $this->input->get('ddd');

        $this->load->model('estoque_model');
        $modelos = $this->estoque_model->buscaMisEstoque($cidade);

        $dados = array('cidade' => $cidade, 'itens' => $modelos, 'ddd' => $ddd);

        $this->load->template('telas/modelosEstoque', $dados);
    }

    public function detalheGrupo()
    {
        $sp = $this->input->get('grupo');
        $segmento = $this->input->get('segmento');

        $this->load->model('estoque_model');

        $estoqueEquip = $this->estoque_model->equipamentosEstoqueDetalhe($sp, $segmento);

        $dados = array('estoqueEquip' => $estoqueEquip, 'sp' => $sp, 'segmento' => $segmento);
        $this->load->template("telas/detalheGrupo", $dados);
    }

    public function detalheGrupoSpi()
    {
        $segmento = $this->input->get('segmento');
        $sp = "SPI";

        $this->load->model('estoque_model');

        $estoqueEquip = $this->estoque_model->equipamentosEstoqueDetalheSpi($segmento);

        $dados = array('estoqueEquip' => $estoqueEquip, 'sp' => $sp, 'segmento' => $segmento);
        $this->load->template("telas/detalheGrupo", $dados);
    }
}
