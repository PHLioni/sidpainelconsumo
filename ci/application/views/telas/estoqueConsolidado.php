   <meta http-equiv="refresh" content="5">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

       <h1 class="h2">Estoque Consolidado</h1>
      

   </div>

   <div class="row">
       <div class="col-sm-3 mb-2">
           <div class="card" style="border-top: 4px solid blue;">
               <div>
                   <div class="card-body">
                       <h5 class="card-title">SPI</h5>
                       <p class="card-text">
                           <b>Quantidade Total</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($spiQuantidade) ?></span>
                       </p>
                       <p class="card-text border-bottom pb-2"> <b>Valor Total </b></br><span class="badge badge-info" style="font-size: .90em"><?= numeroEmReais($spiValor) ?></span>

                           <p class="card-text">
                               <b>Equipamentos</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeEquipSpi) ?></span><a href=<?= site_url("estoque/detalheGrupoSpi?segmento=EQUIPAMENTOS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                           </p>
                           <p class="card-text border-bottom pb-2">
                               <b>Valor Equipamentos</b></br> <span class="badge badge-info" style="font-size: .90em"><?= numeroEmReais($valorEquipSpi) ?></span>
                           </p>
                           <p class="card-text">
                               <b>Miscelâneas</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeMisSpi) ?></span><a href=<?= site_url("estoque/detalheGrupoSpi?segmento=MISCELANEAS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                           </p>
                           <p class="card-text border-bottom pb-2">
                               <b>Valor Miscelaneas</b></br><span class="badge badge-info" style="font-size: .90em"> <?= numeroEmReais($valorMisSpi) ?></span>
                           </p>
                   </div>
               </div>
           </div>
       </div>

       <div class="col-sm-3 mb-2">
           <div class="card" style="border-top: 4px solid grey;">
               <div class="card-body">
                   <h5 class="card-title">SP Leste</h5>
                   <p class="card-text ">
                       <b>Quantidade Total</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($ziadQuantidade) ?></span>
                   </p>
                   <p class="card-text border-bottom pb-2"> <b>Valor Total </b></br><span class="badge badge-info" style="font-size: .90em"><?= numeroEmReais($ziadValor) ?></span>

                       <p class="card-text">
                           <b>Equipamentos</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeEquipZiad) ?></span></span><a href=<?= site_url("estoque/detalheGrupo?grupo=$spLeste&segmento=EQUIPAMENTOS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                       </p>
                       <p class="card-text border-bottom pb-2">
                           <b>Valor Equipamentos</b></br> <span class="badge badge-info" style="font-size: .90em"> <?= numeroEmReais($valorEquipZiad) ?></span>
                       </p>
                       <p class="card-text">
                           <b>Miscelâneas</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeMisZiad) ?></span></span><a href=<?= site_url("estoque/detalheGrupo?grupo=$spLeste&segmento=MISCELANEAS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                       </p>
                       <p class="card-text border-bottom pb-2">
                           <b>Valor Miscelaneas</b></br><span class="badge badge-info" style="font-size: .90em"> <?= numeroEmReais($valorMisZiad) ?></span>
                       </p>
               </div>
           </div>
       </div>
       <div class="col-sm-3 mb-2">
           <div class="card" style="border-top: 4px solid green;">
               <div class="card-body">
                   <h5 class="card-title">SP Oeste</h5>
                   <p class="card-text">
                       <b>Quantidade Total:</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($matheusQuantidade) ?>
                   </p>
                   <p class="card-text border-bottom pb-2"> <b>Valor Total </b></br><span class="badge badge-info" style="font-size: .90em"><?= numeroEmReais($matheusValor) ?></p>

                   <p class="card-text">
                       <b>Equipamentos</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeEquipMatheus) ?></span></span><a href=<?= site_url("estoque/detalheGrupo?grupo=$spOeste&segmento=EQUIPAMENTOS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                   </p>
                   <p class="card-text border-bottom pb-2">
                       <b>Valor Equipamentos</b></br> <span class="badge badge-info" style="font-size: .90em"> <?= numeroEmReais($valorEquipMatheus) ?></span>
                   </p>
                   <p class="card-text">
                       <b>Miscelâneas</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeMisMatheus) ?></span></span><a href=<?= site_url("estoque/detalheGrupo?grupo=$spOeste&segmento=MISCELANEAS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                   </p>
                   <p class="card-text border-bottom pb-2">
                       <b>Valor Miscelaneas</b></br><span class="badge badge-info" style="font-size: .90em"> <?= numeroEmReais($valorMisMatheus) ?></span>
                   </p>
               </div>
           </div>
       </div>
       <div class="col-sm-3 mb-2">
           <div class="card" style="border-top: 4px solid purple;">
               <div class="card-body">
                   <h5 class="card-title">SP Centro</h5>
                   <p class="card-text">
                       <b>Quantidade Total</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($evaldoQuantidade) ?>
                   </p>
                   <p class="card-text border-bottom pb-2"> <b>Valor Total: </b></br><span class="badge badge-info" style="font-size: .90em"><?= numeroEmReais($evaldoValor) ?></p>

                   <p class="card-text">
                       <b>Equipamentos</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeEquipEvaldo) ?></span><a href=<?= site_url("estoque/detalheGrupo?grupo=$spCentro&segmento=EQUIPAMENTOS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                   </p>
                   <p class="card-text border-bottom pb-2">
                       <b>Valor Equipamentos</b></br> <span class="badge badge-info" style="font-size: .90em"><?= numeroEmReais($valorEquipEvaldo) ?></span>
                   </p>
                   <p class="card-text">
                       <b>Miscelâneas</b></br><span class="badge badge-success" style="font-size: .90em"> <?= numNormal($quantidadeMisEvaldo) ?></span><a href=<?= site_url("estoque/detalheGrupo?grupo=$spCentro&segmento=MISCELANEAS") ?> class="badge badge-success ml-2"><i class="fa fa-eye"></i></a>
                   </p>
                   <p class="card-text border-bottom pb-2">
                       <b>Valor Miscelaneas</b></br><span class="badge badge-info" style="font-size: .90em"> <?= numeroEmReais($valorMisEvaldo) ?></span>
                   </p>
               </div>
           </div>
       </div>
   </div>

   <h2>Consolidado</h2>
   <table class="table table-sm table-bordered table-striped text-center">
       <thead>
           <tr style='font-size: .8em;' class="table-info">
               <th scope="col">DDD</th>
               <th scope="col">Quantidade</th>
               <th scope="col">Valor Total</th>
           </tr>
       </thead>
       <tbody>
           <?php foreach ($estoque as $e) : ?>
               <tr>
                   <td><a href=<?= site_url("estoque/detalheDDD?ddd=$e[ddd]") ?>><?= $e['ddd'] ?></a></td>
                   <td><?= $e['quantidade'] ?></td>
                   <td><?= numeroEmReais($e['valor_total']) ?></td>
               </tr>
           <?php endforeach ?>
       </tbody>
   </table>

   <h2>Equipamentos</h2>
   <table class="table table-sm table-bordered table-striped text-center">
       <thead>
           <tr style='font-size: .8em;' class="table-info">
               <th scope="col">DDD</th>
               <th scope="col">Quantidade</th>
               <th scope="col">Valor</th>
           </tr>
       </thead>
       <tbody>
           <?php foreach ($estoqueEquipamentos as $e) : ?>
               <tr>
                   <td><?= $e['ddd'] ?></a></td>
                   <td><?= $e['quantidade'] ?></td>
                   <td><?= numeroEmReais($e['valor_un']) ?></td>
               </tr>
           <?php endforeach ?>
       </tbody>
   </table>
   <h2>Miscelâneas</h2>
   <table class="table table-sm table-bordered table-striped text-center">
       <thead>
           <tr style='font-size: .8em;' class="table-info">
               <th scope="col">DDD</th>
               <th scope="col">Quantidade</th>
               <th scope="col">Valor</th>
           </tr>
       </thead>
       <tbody>
           <?php foreach ($estoqueMiscelaneas as $e) : ?>
               <tr>
                   <td><?= $e['ddd'] ?></a></td>
                   <td><?= $e['quantidade'] ?></td>
                   <td><?= numeroEmReais($e['valor_total']) ?></td>
               </tr>
           <?php endforeach ?>
       </tbody>
   </table>