<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Análitico - DDD<?= $ddd ?></h1>

</div>
<div>
    <form class="form-group">
        <div class="row ml-1">
            <label for="ddd" class="label ml-1 mr-2" style="font-size:1.5em;">DDD: </label>
            <select class="form-control" name='selecionaDDD' style="width:15%;" id="ddd">
                <option><?= $ddd ?></option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
            </select>

            </select>
            <button type="submit" action="analitico/buscatiposAnalitico" class="btn btn-primary ml-2 mb-2"> Selecionar</button>

    </form>
</div>
<div>
    <h4 class="ml-2">Tipo de Serviço</h4>

    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 400px; ">
        <table id="tabela" class="table table-sm table-bordered table-striped" style="font-size:.85em;">
            <thead>
                <tr>
                    <th class="th-sm">Tipo</th>
                    <th class="th-sm">BOM</th>
                    <th class="th-sm">Custo Real</th>
                    <th class="th-sm">DIF</th>
                    <th class="th-sm">Qtd.Plan</th>
                    <th class="th-sm">Qtd.Real</th>
                </tr>
                <tr>
                    <th><input type="text" id='filtro' class="form-control form-control-sm" placeholder="Tipos de OS"></th>

                    <th colspan="7" style="background-color: #B0E0E6"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipoServico as $tipo) : ?>
                    <tr>
                        <td><?= $tipo['ds_tipo_os'] ?></td>
                        <td><?= numeroEmReais($tipo['valor_plan']) ?></td>
                        <td><?= numeroEmReais($tipo['valor_real']) ?></td>
                        <?php if ($tipo['valor_plan'] > $tipo['valor_real']) : ?>
                            <td><?= numeroEmReais($tipo['valor_real'] - $tipo['valor_plan']) ?>
                                <i class='fa fa-arrow-up' style='color:green;'></i></td>

                        <?php elseif ($tipo['valor_plan'] < $tipo['valor_real']) : ?>
                            <td><?= numeroEmReais($tipo['valor_real'] - $tipo['valor_plan']) ?>
                                <i class='fa fa-arrow-down' style='color:red;'></i></td>

                        <?php else : ?>
                            <td><?= numeroEmReais($tipo['valor_plan'] - $tipo['valor_real']) ?>
                                <i class='fa fa-arrow-right' style='color:blue;'></i></td>
                            </td>
                        <?php endif ?>
                        <td><?= $tipo['qtde_plan'] ?></td>
                        <td><?= $tipo['qtde_real'] ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
    <div class="border bottom mt-4"></div>
    <div class="mt-4">
        <h4 class="ml-2">Contratos</h4>
        <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 400px; ">
            <table id="tabela2" class="table table-sm table-bordered table-striped " style="font-size:.75em;">
                <thead>
                    <tr>
                        <th class="th-sm">Contrato</th>
                        <th class="th-sm">Cidade</th>
                        <th class="th-sm">Serviço</th>
                        <th class="th-sm">BOM</th>
                        <th class="th-sm">Custo Real</th>
                        <th class="th-sm">DIF</th>
                        <th class="th-sm">Qtd.Plan</th>
                        <th class="th-sm">Qtd.Real</th>
                    </tr>
                    <tr>
                        <th><input type="text" id='filtro2' class="form-control form-control-sm" placeholder="Contrato"></th>

                        <th colspan="7" style="background-color: #B0E0E6"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contrato as $tipo) : ?>
                        <tr>

                            <td><a href=<?= site_url("analitico/itensContrato?contrato=$tipo[nr_contrato]&ddd=$ddd") ?>><?= $tipo['nr_contrato'] ?></a></td>
                            <td><?= $tipo['nm_municipio'] ?></td>
                            <td><?= $tipo['ds_tipo_os'] ?></td>
                            <td><?= numeroEmReais($tipo['valor_plan']) ?></td>
                            <td><?= numeroEmReais($tipo['valor_real']) ?></td>
                            <?php if ($tipo['valor_plan'] > $tipo['valor_real']) : ?>
                                <td><?= numeroEmReais($tipo['valor_real'] - $tipo['valor_plan']) ?>
                                    <i class='fa fa-arrow-up' style='color:green;'></i></td>

                            <?php elseif ($tipo['valor_plan'] < $tipo['valor_real']) : ?>
                                <td><?= numeroEmReais($tipo['valor_real'] - $tipo['valor_plan']) ?>
                                    <i class='fa fa-arrow-down' style='color:red;'></i></td>

                            <?php else : ?>
                                <td><?= numeroEmReais($tipo['valor_plan'] - $tipo['valor_real']) ?>
                                    <i class='fa fa-arrow-right' style='color:blue;'></i></td>
                                </td>
                            <?php endif ?>
                            <td><?= $tipo['qtde_plan'] ?></td>
                            <td><?= $tipo['qtde_real'] ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

        <div class="border bottom mt-4"></div>
        <div class="mt-4 mb-5">
            <h4 class="ml-2">Código de Baixa</h4>
            <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 400px; ">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">BOM</th>
                            <th class="th-sm">Custo Real</th>
                            <th class="th-sm">DIF</th>
                            <th class="th-sm">Qtd.Plan</th>
                            <th class="th-sm">Qtd.Real</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($codBaixa as $tipo) : ?>
                            <tr>

                                <td><a href=<?= site_url("analitico/cttCodBaixa?codBaixa=$tipo[cd_baixa]&ddd=$ddd") ?>><?= $tipo['cd_baixa'] ?></a></td>
                                <td><?= numeroEmReais($tipo['valor_plan']) ?></td>
                                <td><?= numeroEmReais($tipo['valor_real']) ?></td>
                                <?php if ($tipo['valor_plan'] > $tipo['valor_real']) : ?>
                                    <td><?= numeroEmReais($tipo['valor_real'] - $tipo['valor_plan']) ?>
                                        <i class='fa fa-arrow-up' style='color:green;'></i></td>

                                <?php elseif ($tipo['valor_plan'] < $tipo['valor_real']) : ?>
                                    <td><?= numeroEmReais($tipo['valor_real'] - $tipo['valor_plan']) ?>
                                        <i class='fa fa-arrow-down' style='color:red;'></i></td>

                                <?php else : ?>
                                    <td><?= numeroEmReais($tipo['valor_plan'] - $tipo['valor_real']) ?>
                                        <i class='fa fa-arrow-right' style='color:blue;'></i></td>
                                    </td>
                                <?php endif ?>
                                <td><?= $tipo['qtde_plan'] ?></td>
                                <td><?= $tipo['qtde_real'] ?></td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>

        </div>