<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/menu/cttCodigoBaixa.css">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Contratos Baixados com o Código: <?= $codBaixa ?></h1>

    <a href=<?= site_url("analitico/buscaDadosAnalitico?selecionaDDD=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>

<div class="table-wrapper-scroll-y my-custom-scrollbar" id="containerScroll">
        <table class="table table-sm table-bordered table-striped" id="tableCtt">
            <thead>
                <tr>
                    <th class="th-sm">Contrato</th>
                    <th class="th-sm">Cidade</th>
                    <th class="th-sm">BOM</th>
                    <th class="th-sm">Custo Real</th>
                    <th class="th-sm">DIF</th>
                    <th class="th-sm">Qtd.Plan</th>
                    <th class="th-sm">Qtd.Real</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contratos as $i) : ?>
                    <tr>
                        <td><a href=<?= site_url("analitico/itensContratoCodBaixa?contrato=$i[nr_contrato]&ddd=$ddd&codBaixa=$codBaixa") ?>><?= $i['nr_contrato'] ?></a></td>
                        <td><?= $i['nm_municipio'] ?></td>
                        <td><?= numeroEmReais($i['valor_plan']) ?></td>
                        <td><?= numeroEmReais($i['valor_real']) ?></td>
                        <?php if ($i['valor_plan'] > $i['valor_real']) : ?>
                            <td><?= numeroEmReais($i['valor_real'] - $i['valor_plan']) ?>
                                <i class='fa fa-arrow-up' id="difBom"></i></td>

                        <?php elseif ($i['valor_plan'] < $i['valor_real']) : ?>
                            <td><?= numeroEmReais($i['valor_real'] - $i['valor_plan']) ?>
                                <i class='fa fa-arrow-down' id="difRuim"'></i></td>

                        <?php else : ?>
                            <td><?= numeroEmReais($i['valor_plan'] - $i['valor_real']) ?>
                                <i class='fa fa-arrow-right' id="difIgual"></i></td>
                            </td>
                        <?php endif ?>
                        <td><?= $i['qtde_plan'] ?></td>
                        <td><?= $i['qtde_real'] ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>