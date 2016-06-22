<?php

    require("conexion.php");


?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Reporte</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style><br><br>
		<script type="text/javascript">
$(function () {

    $('#container').highcharts({
        chart: {
            type: 'area',
            marginRight: 1
        },
        title: {
            text: 'Clientes según sus Ingresos',
            x: 1
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                }
            }
        },
        legend: {
            
        },
        series: [{
            data: [
			
			<?php
			$sql=mysql_query("select * from cliente order by ingresos desc");
			while($res=mysql_fetch_array($sql)){
			?>			
			
['<?php echo $res['apn'] ?>', <?php echo $res['ingresos'] ?> ],

			<?php
			}
			?>

            ]
        }]
    });
});



		</script>
	</head>
	<body style="background:#F0FFFD">
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/funnel.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto"></div>
<br><br>

	</body>
</html>
