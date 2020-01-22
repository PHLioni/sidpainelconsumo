<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Itens Utilizados no CTT: <?= $contrato ?></h1>

    <a href=<?= site_url("analitico/buscaDadosAnalitico?selecionaDDD=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>

<div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 850px; ">
        <table class="table table-sm table-bordered table-striped" style="font-size:.85em;">
            <thead>
                <tr>
                    <td>Item</td>
                    <td>BOM</td>
                    <td>Custo Real</td>
                    <td>DIF</td>
                    <td>Qtd.Plan</td>
                    <td>Qtd.Real</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $i) : ?>
                    <tr>
                        <td><?= $i['material'] ?></td>
                        <td><?= numeroEmReais($i['valor_plan']) ?></td>
                        <td><?= numeroEmReais($i['valor_real']) ?></td>
                        <?php if ($i['valor_plan'] > $i['valor_real']) : ?>
                            <td><?= numeroEmReais($i['valor_real'] - $i['valor_plan']) ?>
                                <i class='fa fa-arrow-up' style='color:green;'></i></td>

                        <?php elseif ($i['valor_plan'] < $i['valor_real']) : ?>
                            <td><?= numeroEmReais($i['valor_real'] - $i['valor_plan']) ?>
                                <i class='fa fa-arrow-down' style='color:red;'></i></td>

                        <?php else : ?>
                            <td><?= numeroEmReais($i['valor_plan'] - $i['valor_real']) ?>
                                <i class='fa fa-arrow-right' style='color:blue;'></i></td>
                            </td>
                        <?php endif ?>
                        <td><?= $i['qtde_plan'] ?></td>
                        <td><?= $i['qtde_real'] ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>