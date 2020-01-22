<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
    <?php $cidade = str_replace(" ", "+", $this->input->get('cidade'));

    ?>
    <h1 class="h2">Pedidos</h1>

</div>

<form class="form-group">
    <div class="row ml-1">
        <label for="ddd" class="label ml-1 mr-2" style="font-size:1.5em;">Cidade: </label>
        <select class="form-control" name='cidade' style="width:20%;" id="cidade">
            <option><?= $ci ?></option>
            <option style="background:#999;"></option>
            <!-- Inserir de forma automatica do banco as cidades -->
            <?php foreach ($cidades as $dado) : ?>
                <option><?= $dado["cidade"] ?></option>
            <?php endforeach ?>
        </select>
      

        <button type="submit" action="estoque/estoqueCidade" class="btn btn-primary ml-2"> Selecionar</button>
</form>
</div>
<table class="table table-sm table-bordered table-striped text-center">
    <thead>
        <tr style='font-size: .8em;' class="table-info">
            <th scope="col">Técnico</th>        
            <th scope="col">Quantidade</th>
          
        </tr>
    </thead>
    <tbody>
        <?php foreach ($estoqueCidade as $e) : ?>
            <tr>
                <td><?= $e['nome'] ?></td>               
                <td><?= $e['quantidade'] ?></td>
           
            </tr>
        <?php endforeach ?>
    </tbody>
</table>