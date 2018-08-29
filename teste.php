<!DOCTYPE html>
<html>
<head>
	<title>teste</title>

	<script src="jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="Chart.js/dist/Chart.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row col col-md-6">
            <canvas id="main" style="width: 100px; height: 100px;"></canvas>
        </div>
    </div>
    <?php include_once "config.php" ;
        global $conexao;
        $data = array();
        $b = array();

        $result = $conexao->query("select cidade, count(distinct codigo_aluno) as quantidade 
                                    from itinerario
                                    join bairro as b on b.codigo_bairro = itinerario.bairro
                                    join cidade as c on b.codigo_cidade = c.codigo
                                    group by cidade;");

       foreach($result as $bairro){

            array_push($data, $bairro['quantidade']);

            array_push($b, utf8_encode($bairro["cidade"]));
      }
    ?>
    <script type="text/javascript">
        
    var ctx = document.getElementById("main").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($b); ?>,
            datasets: [{
                label: 'Alunos',
                data: <?php echo json_encode($data);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 135, 32, 0.2)',
                    'rgba(255, 15, 244, 0.2)',
                    'rgba(132, 22, 66, 0.2)',
                    'rgba(111, 222, 0, 0.2)',
                    'rgba(255, 255, 0, 0.2)'

                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }],
            }
        }
    });

    </script>

</body>
</html>