<?php

include_once "config.php";


    function getCidades(){

        try{
        
        global $conexao;

        $result = $conexao ->query("select * from cidade");
        }
        catch(PDOException $e){
            echo $e ->getMessage() . '</br>';
            exit;
        }
        foreach ($result as $cidade){
            echo '<option value=' . $cidade['codigo'] . '>' . utf8_encode($cidade['cidade']) . '</option>';
        }
    }

    function getCursos(){
        try{

            global $conexao;

            $result = $conexao ->query("select * from curso order by nome");
            
            }
        catch(PDOException $e){
            echo $e ->getMessage() . '</br>';
            exit;
        }

        foreach ($result as $curso){
            echo '<option value=' . $curso['codigo'] . '>' . utf8_encode($curso['nome']) . '</option>';
        }
    }

    function começo(){
        try{
            
            global $conexao;

            $result = $conexao ->query("select * from bairro where codigo_cidade = 2 order by bairro");

            }
        catch(PDOException $e){
            echo $e ->getMessage() . '</br>';
            exit;
        }
        foreach ($result as $bairro){
            echo '<option value=' . $bairro['codigo_bairro'] . '>' . utf8_encode($bairro['bairro']) . '</option>';
        }
    }

    function linha(){
        try{
            
            global $conexao;

            $result = $conexao->query("select * from linhas where cod_empresa = 1 order by linha");

        }
        catch(PDOException $e){
            echo $e->getMessage() . '</br>';
            exit;
        }
        foreach ($result as $linha){
            echo '<option value=' . $linha['cod_linha'] . '>' . $linha['cod_linha'] . " - " . utf8_encode($linha['linha']) . '</option>';
        }
    }

    function comecoEmpresa(){
        try{
            
            global $conexao;

            $result = $conexao->query("select * from empresas");

        }
        catch(PDOException $e){
            echo $e->getMessage() . '</br>';
            exit;
        }
        foreach ($result as $empresas) {
            echo '<option value=' . $empresas['cod_empresa'] . '>' . utf8_encode($empresas['empresa']) . '</option>';
        }
            echo "<option value='8' >Outra</option>";
    }
    
