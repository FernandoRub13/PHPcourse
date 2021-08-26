<?php

	function multiplicar($n1, $n2){
		return $n1 * $n2;
	}

	function esNumero($n1, $n2){
		if(is_numeric($n1) && is_numeric($n2)){
			return true;
		}else{
			return false;
		}
	}
	

	function mostrarError(){
		echo "<span class='error'>Ingresa solamente números</span>";
	}

	function validarCampos(){
		if(isset($_POST['numero01']) && isset($_POST['numero02'])){
			$n1 = $_POST['numero01'];
			$n2 = $_POST['numero02'];

			if($n1 == "" || $n2 == ""){
				echo "<span class='error'>Ingresa ambos números</span>";
			}else if(esNumero($n1, $n2)){
				echo multiplicar($n1, $n2);
			}else{
				mostrarError();
			}
		}else{
			echo "<span class='error'>No existe algún input</span>";
		}
	}






?>