<?php $n = str_replace(" ", "+", $nome) ?>
<?php $c = str_replace(" ", "+", $cidade) ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Pedidos - <?= $nome ?></h1>
    <a href=<?= site_url("estoque/tecnicosEquipamento?cidade=$c&grupo=$grupo&ddd=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>
</div>

<div class="mt-4">
    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 650px; ">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="th-sm">Pedido</th>
                    <th class="th-sm">Quantidade</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Data Pagamento</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($pedidos as $d) : ?>
                    <tr>

                        <td><a href=<?= site_url("estoque/itensTecnicoDetalhe?num_pedido=$d[num_pedido]&nome=$n&cidade=$c&ddd=$ddd&grupo=$grupo") ?>><?= $d['num_pedido'] ?></a></td>
                        <td><?= $d['quantidade'] ?></td>
                        <td><?= $d['status'] ?></td>
                        <?php if ($d['data_pagamento'] != "0000-00-00"):?>
                        <td><?= date("d/m/Y", strtotime($d['data_pagamento'])) ?></td>
                        <?php else:?>
                            <td>-</td>
                        <?php endif?>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>


    <div class="border bottom mt-4"></div>