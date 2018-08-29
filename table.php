<!DOCTYPE html>
<html lang="en">
    <head>
        <title>tabela | IFSC</title>
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
        <meta charset="utf-8" />
        <?php include_once "config.php" ?>
    </head>
<body>
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Curso
                                </th>
                                <th>
                                    Bairro
                                </th>
                                <th>
                                    Cidade
                                </th>
                                <th>
                                    Empresa
                                </th>
                                <th>
                                    Linha
                                </th>
                                <th>
                                    Hora
                                </th>
                                <th>
                                    Trajetoria
                                </th>
                                <th>
                                    Local
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php
                            function x(){
                                try{
                                    global $conexao;
                                    $result = $conexao->query("select distinct a.codigo, a.nome, curso.nome as curso, b.bairro as bairro, c.cidade as cidade, 
                                                               e.empresa as empresa, l.linha as linha, hora, trajetoria, local
                                                               from sys.itinerario
                                                               join sys.aluno as a on a.codigo = itinerario.codigo_aluno
                                                               join sys.bairro as b on b.codigo_bairro = itinerario.bairro
                                                               left join sys.cidade as c on c.codigo = b.codigo_cidade
                                                               join sys.curso as curso on curso.codigo = a.codCurso
                                                               left join sys.empresas as e on e.cod_empresa and c.codigo = e.cod_cidade
                                                               join sys.linhas as l on l.cod_linha = itinerario.linha and e.cod_empresa = l.cod_empresa;");
                                
                                }catch(PDOException $e){
                                    echo $e ->getMessage() . '</br>';
                                    exit;
                                }
                                    foreach ($result as $aluno) {

                                        if($aluno["local"] == "C")
                                        {

                                            $aluno["local"] = "Casa";

                                        }
                                        elseif($aluno["local"] == "T")
                                        {

                                            $aluno["local"] = "Trabalho";

                                        }
                                        else
                                        {

                                            $aluno["local"] = "Outros"; 

                                        }
                                        if($aluno["trajetoria"] == "C")
                                        {

                                            $aluno["trajetoria"] = "Ida";

                                        }
                                        else
                                        {

                                            $aluno["trajetoria"] = "Destino";

                                        }
                                        echo '<tr>
                                                <td>
                                                    ' . utf8_encode($aluno["nome"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["curso"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["bairro"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["cidade"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["empresa"]) . ' 
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["linha"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["hora"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["trajetoria"]) . '
                                                </td>
                                                <td>
                                                    ' . utf8_encode($aluno["local"]) . '
                                                </td>
                                            </tr>';

                                    }

                            }
                            x();                                
                                
                            ?>
                                
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div id="main" style="width: 600px; height: 400px;">
                
            </div>
            <script type="text/javascript" href="teste.js"></script>
        </div>
    </div>


</body>
</html>
