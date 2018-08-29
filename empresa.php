<?php

include_once "config.php";

    try{
        
        global $conexao;

        $result = $conexao ->query("select * from linhas where cod_empresa = " . $_GET['idEmpresa'] . " order by linha");
        $conexao->query("set character set utf8");
        $conexao->query("set names utf8");
    }
    catch(PDOException $e){

        echo $e ->getMessage() . '</br>';
        exit;

    }
    foreach ($result as $linha) {


        if ($linha['cod_linha'] == NULL) {
            echo '<option value=' . $linha['id'] . '>' . utf8_encode($linha['linha']) . '</option>';
        } else{
            echo '<option value=' . $linha['id'] . '>' . $linha['cod_linha'] . " - " . utf8_encode($linha['linha']) . '</option>';
        }

    }
?>