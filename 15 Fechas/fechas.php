<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Fechas</title>
	<style>
		body {
			background-color: #5276af;
			height: 100%;
		}

		#container {
			background: white;
			margin: 100px auto;
			padding: 100px;
			text-align: center;
		}
	</style>
</head>

<body>
	<div id="container">
		<?php
		/*
		*	d - dia del mes (1-31)
		*	m - mes del año (1-12)
		*	Y - año (4 dígitos)
		*	l - día de la semana 
		*	
		*	h - hora en formato 1-12
		*	i - minutos 0-59
		*	s - segundos 0-59
		*	a - am-pm
		*/

		$mes = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

		echo "Fecha: " . date("l") . " " . date("d") . " de " . $mes[date("m") - 1] . " de " . date("Y") . "<br>";
		date_default_timezone_set("America/Mexico_City");
		echo "Son las " . date("h:i:sa");
		echo "<br/><br/>";





		echo strftime(" Hoy es %A %d de %B y son las %H:%M hrs");

		$script_tz = date_default_timezone_get();

		// if (strcmp($script_tz, ini_get('date.timezone'))){
		//     echo 'La zona horaria del script difiere de la zona horaria de la configuracion ini.';
		// } else {
		//     echo 'La zona horaria del script y la zona horaria de la configuración ini coinciden.';
		// }
		?>

		?>
	</div>
</body>

</html>