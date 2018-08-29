<!doctype html>
<html lang = "pt-br">
    <head>
        <title>Formulário | IFSC</title>
        <meta charset = "utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="custom.css">

    </head>
    <body class="parallax">
                <?php

                    include_once "config.php";

                    global $conexao;
                    
                    if($_POST['utilizaOnibus'] == "N"){

                        try {

                            $nome = $_POST['nome'];
                            $curso = $_POST['cursos'];
                            $utilizaOnibus = $_POST['utilizaOnibus'];


                            $comando_sql_insert_aluno = "INSERT INTO aluno (nome, codCurso, usaOnibus, ip_aluno, host_aluno) VALUES (:nome, :curso, :usaonibus, :ip_aluno, :host_aluno)";

                            $st = $conexao->prepare($comando_sql_insert_aluno);
                            $st->bindValue(":nome", $nome, PDO::PARAM_STR);
                            $st->bindValue(':curso', $curso, PDO::PARAM_INT);
                            $st->bindValue(':usaonibus', $utilizaOnibus, PDO::PARAM_STR);
                            $st->bindValue(':ip_aluno', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
                            $st->bindValue(':host_aluno', $_SERVER['HTTP_USER_AGENT'], PDO::PARAM_STR);

                            $st->execute();       
                        } 
                        catch (PDOException $e) {
                           echo $e -> getMessage() . '</br>';
                        }
                        header("location: receber.html");
                        
                    }
                    else{
                        try{
                            if($_POST['cidadeChegada'] == 9){
                                $outraCidadeChegada =  $_POST['outraCidadeChegada'];
                                $outroBairroChegada = $_POST['outroBairroChegada'];

                                $newCidade = $conexao->prepare("INSERT into cidade (cidade) VALUES (:newCidade)");
                                $newCidade->bindValue(':newCidade', $outraCidadeChegada, PDO::PARAM_STR);
                                $r = $newCidade->execute();

                                if($r == false && $newCidade->errorCode() == 23000){ // Cidade já existe
                                    echo "Cidade cadastrada";
                                    $_POST['bairroChegada'] = -1;
                                }
                                else{
                                    $codigoCidadeInserida = $conexao->lastInsertId();

                                    $comandoSQLAddBairro = "INSERT into bairro (bairro, codigo_cidade) VALUES (:bairro, :newCodCidade)";
                                    $newBairro = $conexao->prepare($comandoSQLAddBairro);
                                    $newBairro->bindValue(":bairro", $outroBairroChegada, PDO::PARAM_STR);
                                    $newBairro->bindValue(":newCodCidade", $codigoCidadeInserida, PDO::PARAM_INT);
                                    $newBairro->execute();
                                    $_POST['bairroChegada'] = $codigoCidadeInserida;

                                }
                            }

                            if($_POST['bairroChegada'] == 0){
                                
                                $outroBairroChegada = $_POST['outroBairroChegada'];
                                $cod_cidade = $_POST['cidadeChegada'];

                                $chegar = "SELECT * FROM bairro where bairro like 'outroBairroChegada'";
                                if(isset($chegar)){
                                    echo "Bairro já cadastrado";
                                }
                                else{
                                    $comandoSQLAddOutroBairro = "INSERT into bairro (bairro, codigo_cidade) VALUES (:newBairro2, :newCod2)";
                                    $newOutroBairro = $conexao->prepare($comandoSQLAddOutroBairro);
                                    $newOutroBairro->bindValue(':newBairro2', $outroBairroChegada, PDO::PARAM_STR);
                                    $newOutroBairro->bindValue(':newCod2', $cod_cidade, PDO::PARAM_INT);
                                    $newOutroBairro->execute();
                                }
                            }
                            if($_POST['bairroSaida'] == 0){
                                
                                $outroBairroSaida = $_POST['outroBairroSaida'];
                                $cod_cidade = $_POST['cidadeSaida'];

                                $chegar = "SELECT * FROM bairro where bairro like 'outroBairroSaida'";
                                if(isset($chegar)){
                                    echo "Bairro já cadastrado";
                                }
                                else{
                                    $comandoSQLAddOutroBairro = "INSERT into bairro (bairro, codigo_cidade) VALUES (:newBairro2, :newCod2)";
                                    $newOutroBairro = $conexao->prepare($comandoSQLAddOutroBairro);
                                    $newOutroBairro->bindValue(':newBairro2', $outroBairroSaida, PDO::PARAM_STR);
                                    $newOutroBairro->bindValue(':newCod2', $cod_cidade, PDO::PARAM_INT);
                                    $newOutroBairro->execute();
                                }
                            }

                            $nome = $_POST['nome'];
                            $curso = $_POST['cursos'];
                            $utilizaOnibus = $_POST['utilizaOnibus'];


                            $comando_sql_insert_aluno = "INSERT INTO aluno (nome, codCurso, usaOnibus, ip_aluno, host_aluno) VALUES (:nome, :curso, :usaonibus, :ip_aluno, :host_aluno)";

                            $st = $conexao->prepare($comando_sql_insert_aluno);
                            $st->bindValue(":nome", $nome, PDO::PARAM_STR);
                            $st->bindValue(':curso', $curso, PDO::PARAM_INT);
                            $st->bindValue(':usaonibus', $utilizaOnibus, PDO::PARAM_STR);
                            $st->bindValue(':ip_aluno', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
                            $st->bindValue(':host_aluno', $_SERVER['HTTP_USER_AGENT'], PDO::PARAM_STR);


                            $st->execute();
                            $idAluno = $conexao->lastInsertId();


                            $SQLInsertTranporte = "INSERT into itinerario(codigo_aluno, bairro, local, linha, hora, trajetoria) VALUES (:codigo_aluno, :bairro, :local, :linha, :hora, :trajetoria)";

                            $bairroChegada = $_POST['bairroChegada'];
                            $localChegada = $_POST['localChegada'];
                            $linhaChegada = $_POST['linhaChegada'];
                            $horaChegada = $_POST['horaChegada'];
                           
                            $st2 = $conexao->prepare($SQLInsertTranporte);
                            $st2->bindValue(":codigo_aluno", $idAluno, PDO::PARAM_INT);
                            $st2->bindValue(":bairro", $bairroChegada, PDO::PARAM_INT);
                            $st2->bindValue(":local", $localChegada, PDO::PARAM_STR);
                            $st2->bindValue(":linha", $linhaChegada, PDO::PARAM_INT);
                            $st2->bindValue(":hora", $horaChegada, PDO::PARAM_STR);
                            $st2->bindValue(":trajetoria", "C", PDO::PARAM_STR);
                            $st2->execute();

                            $bairroSaida = $_POST['bairroSaida'];
                            $localDestino = $_POST['localDestino'];
                            $linhaSaida = $_POST['linhaSaida'];
                            $horaSaida = $_POST['horaSaida'];
                            
                            $st3 = $conexao->prepare($SQLInsertTranporte);
                            $st3->bindValue(":codigo_aluno", $idAluno , PDO::PARAM_INT);
                            $st3->bindValue(":bairro", $bairroSaida, PDO::PARAM_INT);
                            $st3->bindValue(":local", $localDestino, PDO::PARAM_STR);
                            $st3->bindValue(":linha", $linhaSaida, PDO::PARAM_INT);
                            $st3->bindValue(":hora", $horaSaida, PDO::PARAM_STR);
                            $st3->bindValue(":trajetoria", "S", PDO::PARAM_STR);
                            $st3->execute();


                            $cont_chegada = 1;
                            $QTDExtra_chegada = $_POST['qtdextrachegada'];
                            while($QTDExtra_chegada > 0){
                                if(isset($_POST['cidadeExtraChegada' . $cont_chegada])){

                                    $bairroExtraChegada = $_POST['bairroExtraChegada' . $cont_chegada];
                                    $linhaExtraChegada = $_POST['linhaExtraChegada' . $cont_chegada];
                                    $localExtraChegada = $_POST['LocalExtraChegada' . $cont_chegada];
                                    $horaExtraChegada = $_POST['horaExtraChegada' . $cont_chegada];

                                    $SQLInsertExtra = "INSERT into itinerario (codigo_aluno, bairro, local, linha, hora, trajetoria) VALUES (:codigo_aluno, :bairro, :local, :linha, :hora, :trajetoria)";
                                    
                                    $Extra_chegada = $conexao->prepare($SQLInsertExtra);
                                    $Extra_chegada->bindValue(":codigo_aluno", $idAluno, PDO::PARAM_INT);
                                    $Extra_chegada->bindValue(":bairro", $bairroExtraChegada, PDO::PARAM_INT);
                                    $Extra_chegada->bindValue(":local", $localExtraChegada, PDO::PARAM_STR);
                                    $Extra_chegada->bindValue(":linha", $linhaExtraChegada, PDO::PARAM_INT);
                                    $Extra_chegada->bindValue(":hora", $horaExtraChegada, PDO::PARAM_STR);
                                    $Extra_chegada->bindValue(":trajetoria", "C", PDO::PARAM_STR);

                                    $Extra_chegada->execute();

                                    if(isset($_POST["outraCidadeExtraChegada" . $cont_chegada])){
                                        
                                        $outraCidadeExtraChegada = $_POST['outraCidadeExtraChegada' . $cont_chegada];
                                        $outraBairroExtraChegada = $_POST['outroBairroExtraChegada' . $cont_chegada];
                                        $mostrarCidade = $conexao->query("SELECT * FROM cidade where cidade like '$outroCidadeExtraChegada'");
                                        
                                        $InsertCidade = "INSERT INTO cidade(cidade) VALUES(:newoutraCidade)";
                                        $outro_extra = $conexao->prepare($InsertCidade);
                                        $outro_extra->bindValue(":newoutraCidade", $outraCidadeExtraChegada, PDO::PARAM_STR);

                                        if (isset($_POST['outraBairroExtraChegada' . $cont_chegada])) {

                                            $mostrarBairros = $conexao->query("SELECT * FROM bairro");
                                            foreach ($mostrarBairros as $bairro) {
                                                if($bairro["bairro"] == $outraBairroExtraChegada){
                                                    $outraBairroExtraChegada = $bairro['codigo_bairro'];
                                                }
                                                else{
                                                    foreach ($mostrarCidade as $cidade) {
                                                        if($cidade['cidade'] == $outraCidadeExtraChegada){
                                                            $cod = $cidade['codigo'];
                                                            $InsertBairro = "INSERT INTO bairro(bairro, codigo_cidade) VALUES(:newoutraBairro, :codigo_cidade)";
                                                            $outro_extra2 = $conexao->prepare($InsertBairro);
                                                            $outro_extra2->bindValue(":newoutraBairro", $outraBairroExtraChegada, PDO::PARAM_STR);
                                                            $outro_extra2->bindValue(":codigo_cidade", $cod, PDO::PARAM_INT);
                                                        }
                                                    }
                                                }
                                            }
                                            $outro_extra2->execute();
                                        }
                                        $outro_extra->execute();
                                    }
                                }
                                $cont_chegada++;
                                $QTDExtra_chegada--;
                            }

                            $cont_destino = 1;
                            $QTDExtra_destino = $_POST['qtdextradestino'];
                            while($QTDExtra_destino > 0){
                                if(isset($_POST['cidadeExtraSaida' . $cont_destino])){
                                    $bairroExtraSaida = $_POST['bairroExtraSaida' . $cont_destino];
                                    $linhaExtraSaida = $_POST['linhaExtraSaida' . $cont_destino];
                                    $LocalExtraSaida = $_POST['LocalExtraDestino' . $cont_destino];
                                    $horaExtraSaida = $_POST['horaExtraSaida' . $cont_destino];

                                    $SQLInsertExtra2 = "INSERT into itinerario (codigo_aluno, bairro, local, linha, hora, trajetoria) VALUES (:codigo_aluno, :bairro, :local, :linha, :hora, :trajetoria)";
                                    
                                    $Extra_destino = $conexao->prepare($SQLInsertExtra2);
                                    $Extra_destino->bindValue(":codigo_aluno", $idAluno, PDO::PARAM_INT);
                                    $Extra_destino->bindValue(":bairro", $bairroExtraSaida, PDO::PARAM_INT);
                                    $Extra_destino->bindValue(":local", $LocalExtraSaida, PDO::PARAM_STR);
                                    $Extra_destino->bindValue(":linha", $linhaExtraSaida, PDO::PARAM_INT);
                                    $Extra_destino->bindValue(":hora", $horaExtraSaida, PDO::PARAM_STR);
                                    $Extra_destino->bindValue(":trajetoria", "S", PDO::PARAM_STR);

                                    $Extra_destino->execute();
                                }
                                $cont_destino++;
                                $QTDExtra_destino--;
                            }

                        }
                        catch(PDOException $e){
                            echo $e ->getMessage() . '</br>';

                        }
                        header("location: receber.html");
                    }
                    
                ?>
    </body>
</html>