<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Modelos - <?= $cidade ?></h1>
    <a href=<?= site_url("estoque/detalheDDD?ddd=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>
</div>

<div class="mt-4">
    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 650px; ">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="th-sm">Modelo</th>
                    <th class="th-sm">Quantidade</th>
                    <th class="th-sm">Valor Un.</th>
                    <th class="th-sm">Valor Total</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($itens as $i) : ?>
                    <tr>
                        <td><?= $i['item'] ?></a></td>
                        <td><?= $i['quantidade'] ?></td>
                        <td><?= numeroEmReais($i['valor_un']) ?></td>
                        <td><?= numeroEmReais($i['valor_un'] * $i['quantidade']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>


    <div class="border bottom mt-4"></div>