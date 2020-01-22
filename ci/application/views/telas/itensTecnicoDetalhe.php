<?php $n = str_replace(" ", "+", $nome) ?>
<?php $c = str_replace(" ", "+", $cidade) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Número do Pedido - <?= $num_pedido ?></h1>

    <a href=<?= site_url("estoque/tecnicosEquipamento?nome=$n&cidade=$c&grupo=$grupo&ddd=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>

<div class="mt-4">
    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 650px; ">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="th-sm">Pedido</th>
                    <th class="th-sm">Quantidade</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($itens as $i) : ?>
                    <tr>
                        <td><?= $i['item'] ?></a></td>
                        <td><?= $i['quantidade'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>


    <div class="border bottom mt-4"></div>