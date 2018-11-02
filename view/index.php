
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Criptomante</title>
    
    <link rel="stylesheet" type="text/css" href="../css/main.css">    
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">

	</head>
</head>
<body>
    <?php include("../db/nprevisao.php");?>
	<?php $previsoes = nprevisao::listar(60) ?>



        <div class="id-10 widget" style="box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(44, 44, 44); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 239, 239); text-decoration-style: initial; text-decoration-color: initial;">
            <div class="page cm-pad-20-t" style="box-sizing: inherit; margin: 0px; padding: 20px 0px 0px; color: rgb(51, 51, 51); font-size: 1.0625rem; font-family: Lora, serif; font-weight: 400 !important; background-color: rgb(0, 0, 0);">
                <h1 class="page__title" style="box-sizing: inherit; font-size: 2.8125rem; margin: 0px;font-family: Merriweather, serif; font-weight: 700 !important; font-style: normal; color: rgb(255, 255, 255); text-rendering: optimizeLegibility; line-height: 2.875rem; list-style: none; letter-spacing: -0.2px; text-align: center;">
                    <img src="../images/logo2.png"/>
                </h1>
                <p class="page__subtitle" style="box-sizing: inherit; margin: 0px; padding-bottom: 5px; font-size: 1.5rem; line-height: 1.5rem; text-rendering: optimizeLegibility; list-style: none; color: rgb(255, 255, 255); border-bottom: 1px solid rgb(204, 204, 204); text-align: center; font-family: &quot;Open Sans&quot;, sans-serif; font-weight: 400 !important;">
                     Indicador de comportamento de criptomoedas<br />  
 
                </p>
            </div>
        </div>
        <div class="show-for-large id-11 widget" style="box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(44, 44, 44); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(238, 239, 239); text-decoration-style: initial; text-decoration-color: initial;">
            <br class="Apple-interchange-newline" />
        </div>

        <nav>
          <a href="#">Principal</a>
          <a href="#">Sobre</a>
          <a href="#">Previsão A</a>
          <a href="#">Previsão B</a>
          <a href="#">Algoritmo A</a>
          <a href="#">Algoritmo B</a>
        </nav>
    
  
        <div id="container" style="height: 700%; width: 80%;  margin-left: 10%;" >
            <script type="text/javascript" src="../lib/echarts/echarts.min.js"></script>
            <script type="text/javascript" src="../lib/echarts/echarts-gl.min.js"></script>
            <script type="text/javascript" src="../lib/echarts/ecStat.min.js"></script>
            <script type="text/javascript" src="../lib/echarts/dataTool.min.js"></script>
            <script type="text/javascript" src="../lib/echarts/china.js"></script>
            <script type="text/javascript" src="../lib/echarts/world.js"></script>
            <script type="text/javascript" src="../lib/echarts/api.js"></script>
            <script type="text/javascript" src="../lib/echarts/bmap.min.js"></script>
            <script type="text/javascript" src="../lib/echarts/simplex.js"></script>
            <script type="text/javascript">
            var dom = document.getElementById("container");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                title: {
                    text: 'Indicador de valor do Bitcoin',
                    subtext: 'Consolidação de todos os algoritmos'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data:['Legenda 1','Legenda 2']
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataZoom: {
                            yAxisIndex: 'none'
                        },
                        dataView: {readOnly: true},
                        magicType: {type: ['line', 'bar']},
                        restore: {},
                        saveAsImage: {}
                    }
                },
                xAxis:  {
                    type: 'category',
                    boundaryGap: false,
                    data: [<?php echo nprevisao::labels($previsoes)  ?>]
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}'
                    },
                    min: <?php echo nprevisao::limite_inferior($previsoes)  ?>
                },
                series: [
                    {
                        name:'serie1',
                        type:'line',
                        data:[<?php echo nprevisao::valores($previsoes)  ?>],
                        /*markPoint: {
                            data: [
                                {type: 'max', name: 'nome1.1'},
                                {type: 'min', name: 'nome1.2'}
                            ]
                        }*/  /*,
                        markLine: {
                            data: [
                                {type: 'average', name: 'media'}
                            ]
                        }*/
                    }/*,
                    {
                        name:'serie2',
                        type:'line',
                        data:[1, -2, 2, 5, 3, 2, 0],
                        markPoint: {
                            data: [
                                {name: 'nome2.1', value: -2, xAxis: 1, yAxis: -1.5}
                            ]
                        },
                        markLine: {
                            data: [
                                {type: 'average', name: 'media2'},
                                [{
                                    symbol: 'none',
                                    x: '90%',
                                    yAxis: 'max'
                                }, {
                                    symbol: 'circle',
                                    label: {
                                        normal: {
                                            position: 'start',
                                            formatter: 'label1'
                                        }
                                    },
                                    type: 'max',
                                    //name: 'nome3'
                                }]
                            ]
                        }
                    }*/
                ]
            };
            ;
            if (option && typeof option === "object") {
                myChart.setOption(option, true);
            }
           </script>
        </div>


        <!-- Footer -->

    <!-- Footer Links -->
    <div id="footer" style="background-color: #333333; color: #FFFFFF;" >
	    <div class="container text-center text-md-left mt-5">
	
	      <!-- Grid row -->
	      <div class="row mt-3">
	
	        <!-- Grid column -->
	        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
	          <!-- Content -->
	          <br/><p>Criptomante é um gerador de modelos de previsão para a cotação do Bitcoin baseados no seu histórico de cotação e no conteúdo compartilhado em sites especializados.</p>
	        </div>
	
	        <!-- Grid column -->
	        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
	
	        </div>
	        <!-- Grid column -->
	
	        <!-- Grid column -->
	        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
	        </div>
	        <!-- Grid column -->
	
	        <!-- Grid column -->
	        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
	
	          <!-- Links -->
	          <h6 class="text-uppercase font-weight-bold">Contato</h6>
	          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
	          <p>
	            <i class="fa fa-envelope mr-3">joao.machado.s.jr@gmail.com</i></p>
	        <!-- Grid column -->
	
	      </div>
	      <!-- Grid row -->
	
	    </div>
	    <!-- Footer Links -->
    </div>
    </div>
  <!-- Footer -->



    
</body>
</html>
