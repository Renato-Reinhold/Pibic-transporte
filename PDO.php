<?php

include_once "config.php";

	try{
		global $conexao;
		$result = $conexao ->query("select * from bairro where codigo_cidade = " . $_GET['idCidade'] . " order by bairro");
		}
		catch(PDOException $e){
			echo $e ->getMessage() . '</br>';
			exit;
		}
	foreach ($result as $bairro){
		echo '<option value=' . $bairro['codigo_bairro'] . '>' . utf8_encode($bairro['bairro']) . '</option>';
		
	}
