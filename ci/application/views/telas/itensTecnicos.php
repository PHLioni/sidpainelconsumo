<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <?php $tecnico = str_replace(" ", "+", $this->input->get('tecnico'));
    $servico = $this->input->get('servico');
    $ddd = $this->input->get('ddd');
    $cidade = $this->input->get('cidade');
    $c = str_replace(" ", "+", $cidade)
    ?>
    <h1 class="h2">Tecnico: <?= str_replace("+", " ", $tecnico) ?> - <?= $servico ?></h1>

    <a href=<?= site_url("tecnicos/juntaTecnicos?cidade=$c&servico=$servico") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>
<table class="table table-sm table-bordered table-striped">
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
        <?php if ($itensTecnico != null) : ?>
            <?php foreach ($itensTecnico as $dado) : ?>
                <tr style='font-size: .9em;'>

                    <td><?= $dado['material'] ?></a></td>
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
                    <td><?= $dado['qtd_wo_lancada'] ?></td>
                    <td><?= $dado['qtd_wo_executada'] ?></td>

                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td>Escolha um DDD</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>