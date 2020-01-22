<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Contratos Baixados com o Código: <?= $contrato ?></h1>

    <a href=<?= site_url("analitico/cttCodBaixa?codBaixa=$codBaixa&ddd=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>


<div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 700px; ">
        <table class="table table-sm table-bordered table-striped" style="font-size:.85em;">
            <thead>
                <tr>
                    <th class="th-sm">Contrato</th>                   
                    <th class="th-sm">BOM</th>
                    <th class="th-sm">Custo Real</th>
                    <th class="th-sm">DIF</th>
                    <th class="th-sm">Qtd.Plan</th>
                    <th class="th-sm">Qtd.Real</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $i) : ?>
                    <tr>
                        <td><?= $i['material'] ?></a></td>           
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