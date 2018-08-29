
<!DOCTYPE html>
<html>
    <head>
        <title>tabela | IFSC</title>

        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
        <link rel="alternate" type="text/php" href="sobre.php" />
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="custom.css">

        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
       
        <script src="jquery/dist/jquery.min.js"></script>
        <script src="bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="Chart.js/dist/Chart.min.js"></script>
        
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php

                        include_once "config.php";

                        $turno = array();
                        $turno["Matutino"] = array();
                        $turno["Vespertino"] = array();
                        $turno["Noturno"] = array();

                        global $conexao;

                        $result = $conexao->query("select hora from aluno as a
                                                   join itinerario as i on i.codigo_aluno = a.codigo
                                                   where trajetoria = 'C'
                                                   group by hora;");

                        $result2 = $conexao->query("select count(i.codigo) as quantidade from itinerario as i
                                                    join aluno as a on a.codigo = i.codigo_aluno
                                                    where trajetoria = 'C'
                                                    group by nome
                                                    order by nome;");

                        foreach ($result2 as $key => $value) {
                            $turno["quantidade_linha"][$key] = $value["quantidade"];
                        }

                        foreach ($result as $key => $hora) {
                            
                            for ($i=0; $i < $turno["quantidade_linha"][$key]; $i++) {

                                if($hora["hora"] >= date('00:00:00') and $hora["hora"] <= date('12:59:00')){
                                
                                    $turno["Matutino"][$key] = $hora["hora"];

                                }
                                else if($hora["hora"] >= date('13:00:00') and $hora["hora"] <= date('17:59:00')){

                                    $turno["Vespertino"][$key] = $hora["hora"];

                                }
                                else if($hora["hora"] >= date('18:00:00') and $hora["hora"] <= date('23:59:00')){

                                    $turno["Noturno"][$key] = $hora["hora"];

                                }
                            }

                        }
                        var_dump($turno);


                    ?>
                    <canvas id="main" ></canvas>
                    <script type="text/javascript">
        
                        var ctx = document.getElementById("main").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'horizontalBar',
                            data: {
                                labels: ["Matutino", "Vespertino", "Noturno"],
                                datasets: [{
                                    label: 'Quantidade',
                                    data: [<?php echo sizeof($turno["Matutino"]); ?>, <?php echo sizeof($turno["Vespertino"]); ?>,<?php echo sizeof($turno["Noturno"]); ?>],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)'
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                        });

                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
