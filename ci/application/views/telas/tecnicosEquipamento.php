<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Pedidos - <?= $cidade ?></h1>

    <a href=<?= site_url("estoque/detalheDDD?ddd=$ddd") ?> class="btn btn-primary ml-2 mb-1"> Voltar</a>

</div>

<div class="mt-4">
    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 650px; ">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th class="th-sm">Técnico</th>
                    <th class="th-sm">Quantidade</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($tecnicos as $d) : ?>
                    <tr><?php $nome = str_replace(" ","+", $d['nome'])?>                    
                    <tr><?php $c= str_replace(" ","+", $cidade)?>                    
                        <td><a href=<?= site_url("estoque/pedidosTecnico?nome=$nome&cidade=$c&ddd=$ddd&grupo=$d[grupo]") ?>><?= $d['nome'] ?></a></td>
                        <td><?= $d['quantidade'] ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
   

    <div class="border bottom mt-4"></div>