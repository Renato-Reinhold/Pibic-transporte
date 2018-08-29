<!doctype html>
<html lang="pt-br">
    <head>
        <title>Formulário | IFSC</title>
        <!--Meta-->
        <meta charset="UTF-8">
        <!-- favicons -->
        <link rel="icon" href="fontawesome/wpforms.png" type="image/ico" />
        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
        <link rel="alternate" type="text/php" href="sobre.php" />
        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="custom.css">
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
        <script src="bootstrap-validator-master/dist/validator.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

        <?php include_once 'DB.php'; ?>

    </head>
    <body class="parallax">
        <!-- Hearder -->
        <header>
            <div class="navbar navbar-defaut">
                <div class="container-fluid panel" style="margin-top: -3rem; margin-right: -1.79rem; margin-left: -3rem; padding-bottom: 12rem;" >
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <a href="http://gaspar.ifsc.edu.br/#" class="navbar-brand">
                                    <img src="img\gaspar_horizontal_marca2015_PNG.png" alt="IFSC" class="img-responsive" width="350" style="margin-left: 90px; margin-top: 2rem;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-1 col-md-offset-6">
                            <ul class="list-unstyled">
                                <li style="margin-top: 2rem;"><a class="btn btn-default" style="text-decoration: none; color: black; font-size: 1.5rem;" href="sobre.html">Sobre</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Fim do Header -->


        <!-- Começo da seção -->
        <section>


            <!-- Início do Formulário -->
            <form action="receber.php" method="post" data-toggle="validator" id="form" role="form">
                <div class="container" style="margin-top: -3rem;">
                    <div class="row form-group" style="text-align: center;">
                        <h3><span style="font-size: 1.5rem; white-space: pre-wrap;" class="label label-default col-md-12"> Uso de Sistema de Informação Geográfica na análise das demandas e necessidades de transporte coletivo dos alunos do IFSC Câmpus Gaspar<span></h3>
                    </div>
                </div>
                <div class="container" style="margin-top: 1.5rem;">
                    <div class="row form-group">
                        <p class="panel" style="font-size: 1.5rem; text-align: left; padding-bottom: 2rem;">
                            Este formulário tem como finalidade o levantamento de dados relacionados às necessidades de transporte coletivo dos alunos do Instituto Federal de Santa Catarina Campus Gaspar com o objetivo de aprimorar o acesso a qualidade do deslocamento dos estudantes. Os campos presentes no questionário referem-se às informações pessoais e de transporte coletivo do usuário. Os espaços relacionados aos trajetos de destino ao Instituto pedem a inserção de dados de maneira condizente com a realidade.   
                        </p>
                    </div>
                </div>


                <!-- Inicio do primeiro painel | Informações do aluno -->
                <div class="container" style="background: white; border-radius: 1rem;">
                    <div class="row form-group">
                        <div class="panel-heading">
                            <h3>Informações do aluno</h3>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="row">
                            <div class="col-xs-11 col-md-11">
                                <div class="row form-group">
                                    <label>Nome Completo</label></br>
                                    <input type="text" id="nome" name="nome" class="form-control" data-required-error="Por Favor, preencha este campo." required placeholder="Insira o seu nome completo..."/>
                                    <div class="help-block with-errors" style="font-size: 1.4rem;
                                    "></div>
                                </div>
                                <div class="row form-group">
                                    <label>Curso</label></br>
                                    <select class="form-control selectpicker show-menu-arrow" data-live-search="true" title="Escolha o seu curso..." name="cursos" id="cursos" data-required-error="Por favor, selecione um item da lista." required >
                                        <?php getCursos(); ?>
                                    </select>
                                    <div class="help-block with-errors" style="font-size: 1.4rem;"></div>
                                </div>
                                <div class="row form-group">
                                    <label>Utiliza ônibus</label></br>
                                    <div class="btn-group" data-toggle="buttons">
                                        <div class="btn-toolbar">
                                            <label style="border-radius: 1rem;" class="btn btn-primary active" onclick="usaOnibus()">
                                            <input class="hidden" type="radio" name="utilizaOnibus" id="usaOnibus_sim" value="S" checked /> Sim
                                            </label>
                                            <label style="border-radius: 1rem; margin-left: 1rem;" class="btn btn-primary" onclick="naoUsaOnibus()">
                                            <input class="hidden" type="radio" name="utilizaOnibus" id="usaOnibus_nao" value="N" /> Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim do primeiro painel | Informações do aluno -->


                <!-- Inicio do segundo painel | Trajeto de ida ao IFSC -->
                <div style="background: white; border-radius: 1rem; margin-top: 3px;" class="container" id="naoUsaOnibusChegada">
                    <div class="row form-group">
                        <div class="panel-heading">
                            <h3>Trajeto para ir ao IFSC</h3>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="row form-group">
                            <div class="col-xs-4 col-sm-11 col-md-11">
                                <label>Cidade</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione uma cidade." data-width="75%" title="Escolha sua cidade..." id="cidadeChegada" name="cidadeChegada" onchange="carregarBairrosChegada()">
                                    <?php getCidades(); ?>
                                    <option value="9">Outros</option>
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div style="padding-top: 30px;" class="input-group demo" id="demo">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outraCidadeChegada" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <label>Bairro</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="75%" data-live-search="true" title="Escolha seu bairro..." name="bairroChegada" id="bairroChegada">
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group demo" id="demo2">
                                            <span class="input-group-addon btn">Outro</span>
                                            <input type="text" name="outroBairroChegada" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <label>Local de Saida</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="auto" title="Escolha da onde você vem..." id="localChegada" name="localChegada" >
                                    <option name="saida" value="C">Casa</option>
                                    <option name="saida" value="T">Trabalho</option>
                                    <option name="saida" value="O">Outros</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3 col-sm-11">
                                <label>Empresa</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="75%" title="Escolha sua empresa..." id="empresaChegada" name="empresaChegada" onchange="carregarLinhasChegada()">
                                    <?php comecoEmpresa() ?>
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group" id="emp">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outraEmpresaChegada" class="form-control" />
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-11">
                                <label>Linha</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="auto" data-live-search="true" title="Escolha sua linha..." id="linhaChegada" name="linhaChegada">
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group" id="lin">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outraLinhaChegada" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class='col-md-3 col-sm-4 col-xs-4'>
                                <div class='input-group time' id='horaChegada'>
                                    <span class="input-group-addon btn" data-toggle = "horaSaida" title="Horário que você pega o ônibus">Hora</span>
                                    <input required type='text' name="horaChegada" id="btnHoraChegada" class="form-control" />
                                    <span class="input-group-addon btn">
                                    <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                            <div>
                            </div>
                            <div class='col-md-1 col-xs-1 col-xs-offset-4 col-md-offset-5'>
                                <span class="glyphicon glyphicon-plus btn btn-primary" data-toggle = "addTemplate" data-placement="right" title="Adicionar trajetória" onclick="templateChegada();"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="qtdextrachegada" name="qtdextrachegada" value="0">
                    <div class="row form-group"  id="template">
                    </div>
                </div>
                <!-- Fim do segundo painel | Trajeto do aluno ao IFSC -->

                <!-- Início do terceiro painel | Trajeto do aluno na saída do IFSC -->
                <div style="background: white;border-radius: 1rem; margin-top: 3px;"  class="container" id="naoUsaOnibusSaida">
                    <div class="row form-group">
                        <div class="panel-heading">
                            <h3>Trajeto para sair do IFSC</h3>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="row form-group">
                            <div class="col-xs-4 col-sm-11 col-md-11">
                                <label>Cidade</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione uma cidade." data-width="75%" title="Escolha sua cidade..." id="cidadeSaida" name="cidadeSaida" onchange="carregarBairrosSaida()">
                                    <?php getCidades(); ?>
                                    <option value="9">Outros</option>
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div style="padding-top: 30px;" class="input-group demo3" id="demo3">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outracidadeSaida" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <label>Bairro</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um bairro." data-width="75%" data-live-search="true" title="Escolha sua bairro..." name="bairroSaida" id="bairroSaida">
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group" id="demo4">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outroBairroSaida" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <label>Local de Destino</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="auto" title="Escolha para onde você vai..."  id="localDestino" name="localDestino">
                                    <option name="saida" value="C">Casa</option>
                                    <option name="saida" value="T">Trabalho</option>
                                    <option name="saida" value="O">Outros</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3 col-sm-11">
                                <label>Empresa</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-width="auto" data-required-error="Por favor, selecione um item da lista." title="Escolha a empresa utiliza..." id="empresaSaida" name="empresaSaida" onchange="carregarLinhasSaida()" >
                                    <?php comecoEmpresa() ?>
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div style="padding-top: 30px;" class="input-group" id="emp2">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outraEmpresaSaida" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-11">
                                <label>Linha</label></br>
                                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-live-search="true" data-width="auto" title="Escolha a linha utiliza..." id="linhaSaida" name="linhaSaida" >
                                </select>
                                <div class="help-block with-errors"></div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="input-group" id="lin2">
                                            <span class="input-group-addon btn">Outra</span>
                                            <input type="text" name="outraLinhaSaida" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class='col-md-3 col-xs-4'>
                                <div class='input-group time' id='horaSaida'>
                                    <span class="input-group-addon btn" data-toggle = "horaSaida" data-required-error="Por favor, selecione um item da lista." title="Horário que você pega o ônibus">Hora</span>
                                    <input required type='text' name="horaSaida" id="btnHoraSaida" class="form-control"  />
                                    <span class="input-group-addon btn">
                                    <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                            <div class='col-md-1 col-xs-1 col-xs-offset-4 col-md-offset-5'>
                                <span class="glyphicon glyphicon-plus btn btn-primary" data-toggle = "addTemplate" data-placement="right" title="Adicionar trajetória" onclick="templateSaida();"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="qtdextradestino" name="qtdextradestino" value="0">
                    <div class="row" id="template2">
                    </div>
                </div>
                </div>
                <!-- Fim do terceiro painel | Trajeto do aluno na saída do IFSC -->


                <!-- Inicio do rodapé-->
                <footer style="text-align: center;">
                    <span class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12" style="text-align: center; margin-top: 6px;">
                                <button data-loading-text="Carregando..." id="botao" class="pull-right btn btn-primary btn-lg" style="margin-right: 10rem;">Enviar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 10px;">
                                <label style="margin-top: 2rem; color: white;">&copy; 2017-2018 | IFSC Campus Gaspar</label>
                            </div>
                        </div>
                    </span>
                </footer>
                <!-- Fim do rodapé -->


            </form>
            <!-- Fim do formulário -->


        </section>
    </body>
    <script src="i.js"></script>
</html>

