<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <?php $cidade = str_replace(" ", "+", $this->input->get('cidade'));
    $servico = $this->input->get('servico');
    $ddd = $this->input->get('ddd');
    $segmento = $this->input->get('segmento'); ?>
    <h1 class="h2">Unidade de Negócio - <?= str_replace("+", " ", $cidade) ?> - <?= $servico ?></h1>

    <a href=<?= site_url("cidades/juntaCidades?selecionaDDD=$ddd&servico=$servico&segmento=$segmento") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>


<table class="table table-sm table-bordered table-striped">
    <thead>
        <tr style='font-size: .8em;' class="table-info">
            <th scope="col">UN</th>
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
                <tr style='font-size: .9em;'>
                    <?php $un = str_replace(" ", "+", $dado['nm_businessunitdesc']); ?>

                    <td><a href=<?= site_url("un/itensUn?un=$un&cidade=$cidade&servico=$servico&ddd=$ddd&segmento=$segmento") ?> class="nav-link active"><?= $dado['nm_businessunitdesc'] ?></a></td>
                    <td><?= numeroEmReais($dado['valor_plan']) ?></td>
                    <td><?= numeroEmReais($dado['valor_real']) ?></td>
                    <?php if ($dado['valor_plan'] > $dado['valor_real']) : ?>
                        <td><?= numeroEmReais($dado['valor_real'] - $dado['valor_plan']) ?>
                            <i class='fa fa-arrow-up' style='color:green;'></i></td>

                    <?php elseif ($dado['valor_plan'] < $dado['valor_real']) : ?>
                        <td><?= numeroEmReais($dado['valor_real'] - $dado['valor_plan']) ?>
                            <i class='fa fa-arrow-down' style='color:red;'></i></td>

                    <?php else : ?>
                        <td><?= numeroEmReais($dado['valor_plan'] - $dado['valor_real']) ?>
                            <i class='fa fa-arrow-right' style='color:blue;'></i></td>

                    <?php endif ?>
                    <td><?= $dado['qtde_plan'] ?></td>
                    <td><?= $dado['qtde_real'] ?></td>
                    <td><?= $dado['qtd_wo_lancado'] ?></td>
                    <td><?= $dado['qtd_wo_executado'] ?></td>
                    <td><?= numAderencia(($dado['qtd_wo_lancado'] / $dado['qtd_wo_executado']) * 100) ?>%</td>

                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td>Escolha um DDD</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<h1 class="h2">Itens Utilizados na Cidade</h1>
<table class="table table-sm table-bordered table-striped" id='itens'>
    <thead>
        <tr style='font-size: .8em;' class="table-info">
            <th scope="col">Item</th>
            <th scope="col">BOM</th>
            <th scope="col">Custo Real</th>
            <th scope="col">DIF</th>
            <th scope="col">Qtd. Plan</th>
            <th scope="col">Qtd. Real</th>
            <th scope="col">Lançado</th>
            <th scope="col">Executado</th>

        </tr>
    </thead>
    <tbody>
        <?php if ($dadosItem != null) : ?>
            <?php foreach ($dadosItem as $dado) : ?>
                <tr style='font-size: .9em;'>
                    <td><?= $dado['material'] ?></button></td>
                    <td><?= numeroEmReais($dado['valor_plan']) ?></td>
                    <td><?= numeroEmReais($dado['valor_real']) ?></td>
                    <?php if ($dado['valor_plan'] > $dado['valor_real']) : ?>
                        <td><?= numeroEmReais($dado['valor_real'] - $dado['valor_plan']) ?>
                            <i class='fa fa-arrow-up' style='color:green;'></i></td>

                    <?php elseif ($dado['valor_plan'] < $dado['valor_real']) : ?>
                        <td><?= numeroEmReais($dado['valor_real'] - $dado['valor_plan']) ?>
                            <i class='fa fa-arrow-down' style='color:red;'></i></td>

                    <?php else : ?>
                        <td><?= numeroEmReais($dado['valor_plan'] - $dado['valor_real']) ?>
                            <i class='fa fa-arrow-right' style='color:blue;'></i></td>

                    <?php endif ?>
                    <td><?= $dado['qtde_plan'] ?></td>
                    <td><?= $dado['qtde_real'] ?></td>
                    <td><?= $dado['qtd_wo_lancado'] ?></td>
                    <td><?= $dado['qtd_wo_executado'] ?></td>


                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td>Escolha um DDD</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>