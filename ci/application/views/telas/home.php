<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/menu/home.css">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Visão Geral</h1>
    <p id="desenvolvedor">Desenvolvido por Pedro Lioni - N5948063</p>

</div>

<div class="row">
    <div class="col-sm-3 mb-2">
        <div class="card" id="cardSpi">
            <div>
                <div class="card-body">
                    <h5 class="card-title">SPI</h5>
                    <p class="card-text"> <b>Real:</b><?= numeroEmReais($total) ?></p>
                    <p class="card-text">
                        <b>BOM:</b> <?= numeroEmReais($totalPlanSpi) ?>
                    </p>
                    <p class="card-text">
                        <?php if ($total > $totalPlanSpi) : ?>
                            <b id="difRuim">Dif:</b> <?= numeroEmReais($difSpi) ?>
                            <i class='fa fa-arrow-down' id="difRuim"'></i>
                        <?php else : ?>
                            <b id="difBom">Dif:</b> <?= numeroEmReais($difSpi) ?>
                            <i class=' fa fa-arrow-up' id="difBom"></i>
                        <?php endif ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 mb-2">
        <div class="card" id="cardLeste">
            <div class="card-body">
                <h5 class="card-title">SP Leste</h5>
                <p class="card-text"> <b>Real:</b><?= numeroEmReais($dadosZiad) ?></p>
                <p class="card-text">
                    <b>BOM:</b> <?= numeroEmReais($ziadPlanejado) ?>
                </p>
                <p class="card-text">
                    <?php if ($dadosZiad > $ziadPlanejado) : ?>
                        <b id="difRuim">Dif:</b> <?= numeroEmReais($difZiad) ?>
                        <i class='fa fa-arrow-down' id="difRuim"></i>
                    <?php else : ?>
                        <b id="difBom">Dif:</b> <?= numeroEmReais($difZiad) ?>
                        <i class='fa fa-arrow-up' id="difBom"></i>
                    <?php endif ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mb-2">
        <div class="card" id="cardOeste">
            <div class="card-body">
                <h5 class="card-title">SP Oeste</h5>
                <p class="card-text"> <b>Real:</b><?= numeroEmReais($dadosEvaldo) ?></p>
                <p class="card-text">
                    <b>BOM:</b> <?= numeroEmReais($evaldoPlanejado) ?>
                </p>
                <p class="card-text">
                    <?php if ($dadosEvaldo > $evaldoPlanejado) : ?>
                        <b id="difRuim">Dif:</b> <?= numeroEmReais($difEvaldo) ?>
                        <i class='fa fa-arrow-down' id="difRuim"></i>
                    <?php else : ?>
                        <b id="difBom">Dif:</b> <?= numeroEmReais($difEvaldo) ?>
                        <i class='fa fa-arrow-up' id="difBom"></i>
                    <?php endif ?>
                </p>
            </div>

        </div>
    </div>
    <div class="col-sm-3 mb-2">
        <div class="card" id="cardCentro">
            <div class="card-body">
                <h5 class="card-title">SP Centro</h5>
                <p class="card-text"> <b>Real:</b><?= numeroEmReais($dadosMatheus) ?></p>
                <p class="card-text">
                    <b>BOM:</b> <?= numeroEmReais($matheusPlanejado) ?>
                </p>
                <p class="card-text">
                    <?php if ($dadosMatheus > $matheusPlanejado) : ?>
                        <b id="difRuim">Dif:</b> <?= numeroEmReais($difMatheus) ?>
                        <i class='fa fa-arrow-down' id="difRuim"></i>
                    <?php else : ?>
                        <b id="difBom">Dif:</b> <?= numeroEmReais($difMatheus) ?>
                        <i class='fa fa-arrow-up' id="difBom"></i>
                    <?php endif ?>
                </p>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-12">
        <canvas class="my-2 w-100 chartjs-render-monitor" id="DDD01" width="500" height="250">
        </canvas>
    </div>
</div>
</div>


<script>
    var ctx = document.getElementById('DDD01').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                backgroundColor: 'rgba(255, 0, 0, .7)',
                borderColor: 'rgba(255, 0, 0, .7)',
                label: 'Cosumo',
                data: [
                    <?= $ddd12 ?>,
                    <?= $ddd13 ?>,
                    <?= $ddd14 ?>,
                    <?= $ddd15 ?>,
                    <?= $ddd16 ?>,
                    <?= $ddd17 ?>,
                    <?= $ddd18 ?>,
                    <?= $ddd19 ?>,
                ],

            }, {
                backgroundColor: 'rgba(51, 181, 229, .9)',
                borderColor: 'rgba(100, 149, 237, .9)',
                label: 'BOM',
                data: [
                    <?= $dddPlan12 ?>,
                    <?= $dddPlan13 ?>,
                    <?= $dddPlan14 ?>,
                    <?= $dddPlan15 ?>,
                    <?= $dddPlan16 ?>,
                    <?= $dddPlan17 ?>,
                    <?= $dddPlan18 ?>,
                    <?= $dddPlan19 ?>,
                ],
            }],
            labels: ['DDD12', 'DDD13', 'DDD14', 'DDD15', 'DDD16', 'DDD17', 'DDD18', 'DDD19']
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(255, 99, 132)',
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: 'Consumo em R$ x DDD',
                fontSize: '18'
            },
            "animation": {
                "onComplete": function() {
                    var chartInstance = this.chart,
                        ctx = chartInstance.ctx;
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.fillStyle = "#000000";


                    this.data.datasets.forEach(function(dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            var data = dataset.data[index];
                            ctx.font = "11.3px Arial";
                            ctx.fillText("R$ " + data.toLocaleString('pt-br'), bar._model.x, bar._model.y - 5);
                        });

                    });
                }
            },
        }
    });
</script>