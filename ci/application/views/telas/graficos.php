                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

                    <h3>Visão por Segmento</h3>

                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <canvas class="my-2 w-100 chartjs-render-monitor" id="Consolidado" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid cadetblue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                        </canvas>
                    </div>

                    <div class="col-sm-12">
                        <canvas class="my-2 w-100 chartjs-render-monitor" id="Manutencao" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid cadetblue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                        </canvas>
                    </div>

                    <div class="col-sm-12">
                        <canvas class="my-2 w-100 chartjs-render-monitor" id="Instalacao" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid cadetblue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                        </canvas>
                    </div>

                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

                    <h3>Visão por Cidade</h3>

                </div>

                <h6 style="color:#666">*Passe o mouse nas colunas para visualizar os valores.<h6>

                        <form class="form-group">
                            <div class="row ml-1">
                                <label for="servico" class="label ml-3" style="font-size:1.5em;">Serviço: </label>
                                <select class="form-control ml-3" name='servico' style="width:15%;" id="servico">
                                    <option><?= $servico ?></option>
                                    <option>Consolidado</option>
                                    <option>Manutenção</option>
                                    <option>Instalação</option>
                                </select>

                                <button type="submit" action="graficos/juntaGraficos" class="btn btn-primary ml-2 mb-2"> Selecionar</button>

                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades12" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">

                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades13" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades14" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades15" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades16" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades17" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades18" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>
                            <div class="col-sm-12">
                                <canvas class="my-2 w-100 chartjs-render-monitor" id="Cidades19" width="650" height=250" style="display: inline-block; width: 700px; height: 246px; border-top: 4px solid CornflowerBlue ; box-shadow:0px 2px 2px 2px rgba(0, 0, 0, 0.2); border-radius: 5px;">
                                </canvas>
                            </div>

                        </div>
                        <script>
                            var ctx = document.getElementById('Consolidado').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [
                                            <?= $hfcReal ?>,
                                            <?= $gponReal ?>,
                                        ],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [
                                            <?= ($hfcPlan) ?>,
                                            <?= $gponPlan ?>,
                                        ],

                                    }, {
                                        label: 'Diferença',
                                        data: [<?= $difHfc ?>,
                                            <?= $difGpon ?>,
                                        ],

                                        // Changes this dataset to become a line
                                        type: 'line'
                                    }],

                                    labels: ['HFC', 'GPON']
                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },

                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],

                                    },
                                    title: {
                                        display: true,
                                        text: 'Consolidado',
                                        fontSize: '18',
                                        fontColor: '#000000',
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
                                                    ctx.fillText("R$ " + data.toLocaleString('pt-br'), bar._model.x, bar._model.y - 5);


                                                });

                                            });
                                        }
                                    },
                                }
                            });

                            var ctx = document.getElementById('Manutencao').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [
                                            <?= $hfcRealManu ?>,
                                            <?= $gponRealManu ?>,
                                        ],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [
                                            <?= $hfcPlanManu ?>,
                                            <?= $gponPlanManu ?>,

                                        ],

                                    }, {
                                        label: 'Diferença',
                                        data: [<?= $difHfcManu ?>,
                                            <?= $difGponManu ?>,
                                        ],

                                        // Changes this dataset to become a line
                                        type: 'line'
                                    }],

                                    labels: ['HFC', 'GPON']
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
                                        text: 'Manutenção',
                                        fontSize: '18',
                                        fontColor: '#000000',

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
                                                    ctx.fillText("R$ " + data.toLocaleString('pt-br'), bar._model.x, bar._model.y - 5);
                                                });

                                            });
                                        }
                                    },
                                }
                            });

                            var ctx = document.getElementById('Instalacao').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [
                                            <?= $hfcRealInst ?>,
                                            <?= $gponRealInst ?>,
                                        ],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [
                                            <?= $hfcPlanInst ?>,
                                            <?= $gponPlanInst ?>,

                                        ],

                                    }, {
                                        label: 'Diferença',
                                        data: [<?= $difHfcInst ?>,
                                            <?= $difGponInst ?>,
                                        ],

                                        // Changes this dataset to become a line
                                        type: 'line'
                                    }],

                                    labels: ['HFC', 'GPON']
                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
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
                                        text: 'Instalação',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                    "animation": {
                                        "onComplete": function() {
                                            var chartInstance = this.chart,
                                                ctx = chartInstance.ctx;
                                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                            ctx.textAlign = 'center';
                                            ctx.textBaseline = 'middle';
                                            ctx.fillStyle = "#000000";


                                            this.data.datasets.forEach(function(dataset, i) {
                                                var meta = chartInstance.controller.getDatasetMeta(i);
                                                meta.data.forEach(function(bar, index) {
                                                    var data = dataset.data[index];
                                                    ctx.fillText("R$ " + data.toLocaleString('pt-br'), bar._model.x, bar._model.y - 5);
                                                });

                                            });
                                        }
                                    },
                                }
                            });



                            var ctx = document.getElementById('Cidades12').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades12 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades12 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades12 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD12 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades13').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades13 as $a) : ?> '<?= $a['nm_municipio']?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades13 as $b) : ?>,<?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades13 as $c) : ?>,<?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD13 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades14').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades14 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades14 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades14 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD14 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades15').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades15 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades15 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades15 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD15 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades16').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades16 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades16 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades16 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD16 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades17').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades17 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades17 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades17 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD17 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades18').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades18 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades18 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades18 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD18 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });

                            var ctx = document.getElementById('Cidades19').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {

                                    labels: [<?php foreach ($cidades19 as $a) : ?> '<?= $a['nm_municipio'] ?>', <?php endforeach ?>],
                                    datasets: [{
                                        backgroundColor: 'rgba(255, 0, 0, .7)',
                                        borderColor: 'rgba(255, 0, 0, .7)',
                                        label: 'Cosumo',
                                        data: [<?php foreach ($cidades19 as $b) : ?><?= $b['valor_real'] ?>, <?php endforeach ?>],

                                    }, {
                                        backgroundColor: 'rgba(100, 149, 237, .9)',
                                        borderColor: 'rgba(100, 149, 237, .9)',
                                        label: 'BOM',
                                        data: [<?php foreach ($cidades19 as $c) : ?><?= $c['valor_plan'] ?>, <?php endforeach ?>],
                                    }],

                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)',
                                        },
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }],
                                        xAxes: [{
                                            ticks: {
                                                autoSkip: false,
                                                rotation: 90,

                                            }
                                        }]

                                    },
                                    title: {
                                        display: true,
                                        text: 'Cidades - DDD19 - <?= $servico ?>',
                                        fontSize: '18',
                                        fontColor: '#000000',
                                    },
                                }
                            });
                        </script>