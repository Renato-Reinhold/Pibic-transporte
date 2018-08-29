<!DOCTYPE html>
<html>
   <head>
      
      <title>SubTable</title>
      
      <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="bootstrap-table.css"></script>
      <script src="bootstrap-table.js"></script>

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   </head>
   <body>
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <table id="table" class="table-bordered"></table>
            </div>
         </div>
      </div>
      <style type="text/css">
         .detai{
         width: 20px;
         }
      </style>

      <?php 
         include_once "config.php";
         
         global $conexao;
         
         $a = array();
         $a['nome'] = array();
         $a['curso'] = array();
         $a['cidade'] = array();
         $a['bairro'] = array();
         $a['empresa'] = array();
         $a['linha'] = array();
         $a['hora'] = array();
         $a['trajetoria'] = array();
         $a['local'] = array();
         $a['quantidade_linha'] = array();
         
         try{
           $result = $conexao->query("select a.codigo,
                                      a.nome as nome, c.nome as curso, 
                                      count(i.codigo) as quantidade 
                                      from aluno as a
                                      left join pibic_transporte.itinerario as i on a.codigo = i.codigo_aluno
                                      join pibic_transporte.curso as c on c.codigo = a.codCurso
                                      group by a.codigo, a.nome, c.nome 
                                      order by a.nome;");
         }
         catch(PDOException $e){
           print($e);

         }

         
         foreach ($result as $key => $aluno) {
          
           $a['codigo_aluno'][$key] = $aluno['codigo'];
           $a['nome'][$key] = $aluno['nome'];
           $a['curso'][$key] = utf8_encode($aluno['curso']);
           $a['quantidade_linha'][$key] = $aluno['quantidade'];
         
         }
         try{
           $result = $conexao->query("select a.codigo, 
                                      a.nome as nome, 
                                      curso.nome as curso, 
                                      c.cidade, b.bairro, 
                                      e.empresa, 
                                      l.linha, hora, 
                                      trajetoria, 
                                      local  from aluno as a
                                      left join pibic_transporte.itinerario as i on a.codigo = i.codigo_aluno
                                      join pibic_transporte.curso as curso on curso.codigo = a.codCurso
                                      left join pibic_transporte.bairro as b on b.codigo_bairro = i.bairro
                                      left join pibic_transporte.cidade as c on c.codigo = b.codigo_cidade
                                      left join pibic_transporte.linhas as l on l.id = i.linha
                                      left join pibic_transporte.empresas as e on e.cod_empresa = l.cod_empresa 
                                      order by a.nome;");
         
         }
         catch(PDOException $e){
           print($e);
         }
         
         foreach ($result as $key => $aluno) {
         
             $local = null;
             $trajetoria = null;
         
               switch ($aluno['local']) {
                 case "C":
                   $local = "Casa";
                   break;
                 case "T":
                   $local = "Trabalho";
                   break;
                 case "O":
                   $local = "Outros";
                   break;
             }
         
              switch ($aluno['trajetoria']) {
                 case 'C':
                   $trajetoria = "Ida";
                   break;
                 case 'S':
                   $trajetoria = "Saída";
                   break;
               }
              
              $a['cidade'][$key] = utf8_encode($aluno['cidade']);
               $a['bairro'][$key] = utf8_encode($aluno['bairro']);
               $a['empresa'][$key] = utf8_encode($aluno['empresa']);
               $a['linha'][$key] = utf8_encode($aluno['linha']);
               $a['hora'][$key] = utf8_encode($aluno['hora']);
               $a['trajetoria'][$key] = $trajetoria;
               $a['local'][$key] = $local;
          
         
         }
         
         ?>
      <script type="text/javascript">
         var data = [{
                      <?php
            $linha = 0;
            for ($i=0; $i < sizeof($a['codigo_aluno']); $i++) { 
            echo "'nome': '" . $a['nome'][$i] . "',
                  'curso': '" . $a['curso'][$i] . "',
                  'var': [{";

                  if($a['quantidade_linha'][$i] > 0){
                    for ($e = 0; $e < $a['quantidade_linha'][$i]; $e++) {
                      echo "
                      'cidade': '" . $a['cidade'][$linha] . "',
                      'bairro': '" . $a['bairro'][$linha] . "',
                      'empresa': '" . $a['empresa'][$linha] . "',
                      'linha': '" . $a['linha'][$linha] . "',
                      'hora': '" . $a['hora'][$linha] . "',
                      'trajetoria': '" . $a['trajetoria'][$linha] . "',
                      'local': '" . $a['local'][$linha] . "'";
                      if(($a['quantidade_linha'][$i]-1) != $e){
                        echo "} , {";
                      }
                      
                      $linha ++;

                    }
                  
                  }
                  else{
                    
                    echo "
                      'cidade': 'nao possui',
                      'bairro': 'nao possui',
                      'empresa': 'nao possui',
                      'linha': 'nao possui',
                      'hora': 'nao possui',
                      'trajetoria': 'nao possui',
                      'local': 'nao possui' ";
                       $linha ++;
                  }
                  echo "}]";
                    if ($i != (sizeof($a['nome'])-1)) {
                      echo "} , {";
                    }

            }
            ?>
                    }]
         
          //  data-page-list
          //data-pagination
          var $table = $('#table');
          $(function() {
         
            $table.bootstrapTable({
              columns: [{
                field: 'nome',
                title: 'Nome'
              }, {
                field: 'curso',
                title: 'Curso'
              }],
              data: data,
              detailView: true,
              onExpandRow: function(index, row, $detail) {
                $detail.html('<table></table>').find('table').bootstrapTable({
                  columns: [{
                    field: 'cidade',
                    title: 'Cidade'
                  }, {
                    field: 'bairro',
                    title: 'Bairro'
                  }, {
                    field: 'empresa',
                    title: 'Empresa'
                  }, {
                    field: 'linha',
                    title: 'Linha'
                  }, {
                    field: 'hora',
                    title: 'Hora'
                  }, {
                    field: 'trajetoria',
                    title: 'Trajetoria'
                  }, {
                    field: 'local',
                    title: 'Local'
                  }],
                  data: row.var,
                });
              }
            });
          });
         
      </script>
   </body>
</html>

