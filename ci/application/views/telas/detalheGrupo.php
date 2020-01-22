<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
    <?php $cidade = str_replace(" ", "+", $this->input->get('cidade'));

    ?>
    <h1 class="h2">Estoque -<?= $segmento ?> - <?= $sp ?></h1>
    <a href=<?= site_url("estoque/consolidado") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>


</div>
<table class="table table-sm table-bordered table-striped text-center">
    <thead>
        <tr class="table-info">
            <th scope="col">Código Atlas</th>
            <th scope="col">Item</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor Un</th>
            <th scope="col">Valor Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($estoqueEquip as $e) : ?>
            <tr>
                <td><?= $e['codigoItem'] ?></td>
                <td><?= $e['item'] ?></td>
                <td><?= $e['quantidade'] ?></td>
                <td><?= numeroEmReais($e['valor_un']) ?></td>
                <td><?= numeroEmReais($e['valor_un'] * $e['quantidade']) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>