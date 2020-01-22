<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
    <?php $cidade = str_replace(" ", "+", $this->input->get('cidade'));

    ?>
    <h1 class="h2">Técnicos</h1>

</div>

<form class="form-group">
    <div class="row ml-1">
        <label for="ddd" class="label ml-1 mr-2" style="font-size:1.5em;">Cidade: </label>
        <select class="form-control" name='cidade' style="width:15%;" id="cidade">
            <option><?= $cidade ?></option>
            <option style="background:#999;"></option>
            <!-- Inserir de forma automatica do banco as cidades -->
            <?php foreach ($cidades as $dado) : ?>
                <option><?= $dado["nm_municipio"] ?></option>
            <?php endforeach ?>
        </select>

        <label for="servico" class="label ml-3" style="font-size:1.5em;">Serviço: </label>
        <select class="form-control ml-3" name='servico' style="width:15%;" id="servico">       
            <option><?= $servico?></option>
            <option style="background:#999;"></option>
            <option>Manutenção</option>
            <option>Instalação</option>
            <option>Servicos</option>
            <option>Mudança de Endereço</option>

        </select>
        <button type="submit" action="cidades/buscaDDD" class="btn btn-primary ml-2"> Selecionar</button>

</form>
</div>

<table class="table table-sm table-bordered table-striped">
    <thead>
        <tr style='font-size: .8em;' class="table-info">
            <th scope="col">Cidade</th>
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
        <?php if ($tecnicos != null) : ?>
            <?php foreach ($tecnicos as $dado) : ?>
                <tr style='font-size: .8em;'>
                    <td><?php $tecnico = str_replace(" ", "+", $dado['nm_tecnico']);
                        $servicos = str_replace(" ", "+", $dado['servico']);
                        ?><a href=<?= site_url("tecnicos/itensTecnicos?tecnico=$tecnico&servico=$servicos&cidade=$cidade") ?> class="nav-link active"><?= str_replace("_", " ", $dado['nm_tecnico']) ?></a></td>
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
                        </td>

                    <?php endif ?>
                    <td><?= $dado['qtde_plan'] ?></td>
                    <td><?= $dado['qtde_real'] ?></td>
                    <td><?= $dado['qtd_wo_lancada'] ?></td>
                    <td><?= $dado['qtd_wo_executada'] ?></td>
                    <?php if ($dado['qtd_wo_executada'] != 0) : ?>
                        <td><?= numAderencia(($dado['qtd_wo_lancada'] / $dado['qtd_wo_executada']) * 100) ?>%</td>
                    <?php else : ?>
                        <td>0%</td>
                    <?php endif ?>

                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td>Escolha uma Cidade</td>

            </tr>
        <?php endif ?>
    </tbody>
</table>