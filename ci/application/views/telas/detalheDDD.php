<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/menu/detalheDDD.css">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Detalhes - <?= $ddd ?></h1>
    <a href=<?= site_url("estoque/consolidado") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>
</div>
<h2>Equipamentos - Estoque</h2>
<div class="mt-4">
    <div class="table-wrapper-scroll-y my-custom-scrollbar" id="tableDDD">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="th-sm">Cidade</th>
                    <th class="th-sm">Quantidade</th>
                    <th class="th-sm">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipamentosEstoque as $d) : ?>
                    <tr>
                        <?php $cidade = str_replace(" ", "+", $d['cidade']) ?>
                        <td><a href=<?= site_url("estoque/modelosEstoque?cidade=$cidade&ddd=$ddd") ?>><?= $d['cidade'] ?></a></td>
                        <td><?= $d['quantidade'] ?></td>
                        <td><?= numeroEmReais($d['valor_un']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>

<div class="border bottom mt-4"></div>
<h2>Miscelâneas - Estoque</h2>
<div class="mt-4">
    <div class="table-wrapper-scroll-y my-custom-scrollbar" id="tableDDD">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="th-sm">Cidade</th>
                    <th class="th-sm">Quantidade</th>
                    <th class="th-sm">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($miscelaneasEstoque as $d) : ?>
                    <tr>
                        <?php $cidade = str_replace(" ", "+", $d['cidade']) ?>
                        <td><a href=<?= site_url("estoque/misEstoque?cidade=$cidade&ddd=$ddd") ?>><?= $d['cidade'] ?></a></td>
                        <td><?= $d['quantidade'] ?></td>
                        <td><?= numeroEmReais($d['valor_total']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>