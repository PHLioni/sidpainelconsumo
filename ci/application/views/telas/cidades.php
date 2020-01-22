<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/menu/cidades.css">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Cidades</h1>

</div>

<form class="form-group">
    <div class="row ml-1">
        <label for="ddd" id="labelInput" class="label ml-1 mr-2">DDD: </label>
        <select class="form-control" name='selecionaDDD' id="ddd">
            <option><?= $ddd ?></option>
            <option id="lineOption"></option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
        </select>

        <label for="servico" id="labelInput" class="label ml-3">Serviço: </label>
        <select class="form-control ml-3" name='servico' id="servico">
            <option><?= $servico ?></option>
            <option id="lineOption"></option>
            <option>Manutencão</option>
            <option>Instalacão</option>
            <option>Servicos</option>
            <option>Mudança de Endereço</option>
        </select>

        <label for="segmento" class="label ml-3" style="font-size:1.5em;">Segmento: </label>
        <select class="form-control ml-3" name='segmento' id="segmento">
            <option><?= $segmento ?></option>
            <option id="lineOption"></option>
            <option>GPON</option>
            <option>HFC</option>

        </select>
        <button type="submit" action="cidades/buscaDDD" class="btn btn-primary ml-2 mb-2"> Selecionar</button>

</form>
</div>

<table class="table table-sm table-bordered table-striped">
    <thead>
        <tr class="table-info">
            <th scope="col">Cidade</th>
            <th scope="col">BOM</th>
            <th scope="col">Custo Real</th>
            <th scope="col">DIF</th>
            <th scope="col">Qtd. Plan</th>
            <th scope="col">Qtd. Real</th>
            <th scope="col">Lançado</th>
            <th scope="col">Executado</th>
            <th scope="col">Aderência</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($dadosPlan != null) : ?>
            <?php foreach ($dadosPlan as $dado) : ?>

                <tr>
                    <td><?php $municipio = str_replace(" ", "+", $dado['nm_municipio']);
                        $servicos = str_replace(" ", "+", $dado['servico']);
                        $segmento = str_replace(" ", "+", $dado['segmento']);
                        ?><a href=<?= site_url("un/juntaUn?cidade=$municipio&servico=$servicos&ddd=$ddd&segmento=$segmento") ?> 
                        class="nav-link active"><?= $dado['nm_municipio'] ?></a></td>

                    <td><?= numeroEmReais($dado['valor_plan']) ?></td>
                    <td><?= numeroEmReais($dado['valor_real']) ?></td>

                    <?php if ($dado['valor_plan'] > $dado['valor_real']) : ?>
                        <td><?= numeroEmReais($dado['valor_real'] - $dado['valor_plan']) ?>
                            <i class='fa fa-arrow-up' id="difBom"'></i></td>

                    <?php elseif ($dado['valor_plan'] < $dado['valor_real']) : ?>
                        <td><?= numeroEmReais($dado['valor_real'] - $dado['valor_plan']) ?>
                            <i class='fa fa-arrow-down' id="difRuim"'></i></td>

                    <?php else : ?>
                        <td><?= numeroEmReais($dado['valor_plan'] - $dado['valor_real']) ?>
                            <i class='fa fa-arrow-right' id="difIgual"></i></td>
                        </td>

                    <?php endif ?>
                    <td><?= $dado['qtde_plan'] ?></td>
                    <td><?= $dado['qtde_real'] ?></td>
                    <td><?= $dado['qtd_wo_lancada'] ?></td>
                    <td><?= $dado['qtd_wo_executada'] ?></td>
                    <?php if ($dado['qtd_wo_executada'] != 0) : ?>
                        <td><?= numAderencia(($dado['qtd_wo_lancada'] / $dado['qtd_wo_executada']) * 100) ?>%</td>
                    <?php else : ?>
                        <td>0%</td>
                    <?php endif ?>

                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td>Escolha um DDD</td>

            </tr>
        <?php endif ?>
    </tbody>
</table>