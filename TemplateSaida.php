<?php include 'DB.php'; ?>

<div class="container" id="templateSaida<?=$_GET['num']?>" style="border-top: solid; border-color: #DCDCDC;">
    <div class="panel">
        <div class="row form-group">

            <div class="col-md-3 pull-right">
                <span class="col-md-offset-8 glyphicon glyphicon-remove btn btn-primary" style="background: white; color: red; border: none;" data-toggle="btnExcluir" title="Eliminar campo de trajetória adicionado" onclick="atualizarValidacao('templateSaida<?=$_GET['num']?>')"></span>
            </div>

            <div class="col-xs-4 col-md-11">
                <label>Cidade</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione uma cidade." data-width="75%" title="Escolha sua cidade..." id="cidadeExtraSaida<?=$_GET['num']?>" name="cidadeExtraSaida<?=$_GET['num']?>" onchange="carregarBairrosExtrasSaida('cidadeExtraSaida<?=$_GET['num']?>','bairroExtraSaida<?=$_GET['num']?>'), toggleCidadeSaida('<?=$_GET['num']?>')">
                    <?php getCidades(); ?>
                    <option value="9">Outros</option>
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div style="padding-top: 30px;" class="input-group DE" id="outraCidadeSaida<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outra</span>
                            <input type="text" name="outraCidadeExtraSaida<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-11">
                <label>Bairro</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="75%" title="Escolha seu bairro..." name="bairroExtraSaida<?=$_GET['num']?>" id="bairroExtraSaida<?=$_GET['num']?>" onchange="toggleBairroSaida('<?=$_GET['num']?>')">
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="input-group DE2" id="outroBairroSaida<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outro</span>
                            <input type="text" name="outroBairroExtraSaida<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-11">
                <label>Local de Saida</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." id="localExtraSaida<?=$_GET['num']?>" data-width="auto" title="Escolha para onde você vai..." name="LocalExtraDestino<?=$_GET['num']?>" >
                    <option name="saida" value="C">Casa</option>
                    <option name="saida" value="T">Trabalho</option>
                    <option name="saida" value="O">Outros</option>
                </select>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <label>Empresa</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="75%" title="Escolha a empresa utilizada" id="empresaExtraSaida<?=$_GET['num']?>" name="empresaExtraSaida<?=$_GET['num']?>" onchange="carregarLinhasExtrasSaida('empresaExtraSaida<?=$_GET['num']?>', 'linhaExtraSaida<?=$_GET['num']?>'), toggleEmpresaSaida('<?=$_GET['num']?>')" >
                    <?php comecoEmpresa(); ?>
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div style="padding-top: 30px;" class="input-group empE" id="outraEmpresaSaida<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outra</span>
                            <input type="text" name="outraEmpresaExtraSaida<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <label>Linha</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-width="auto" data-live-search="true" data-required-error="Por favor, selecione um item da lista." title="Escolha a linha utilizada..." id="linhaExtraSaida<?=$_GET['num']?>" name="linhaExtraSaida<?=$_GET['num']?>">
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="input-group linE" id="outraLinhaSaida<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outra</span>
                            <input type="text" name="outraLinhaExtraSaida<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden">
        <div class="row form-group">
            <div class='col-md-3 col-xs-4'>
                <div class='input-group time' id='horaExtraSaida<?=$_GET['num']?>'>
                    <span class="input-group-addon btn">Hora</span>
                    <input required type='text' class="form-control" id="btnHoraExtraSaida<?=$_GET['num']?>" name="horaExtraSaida<?=$_GET['num']?>" />
                    <span class="input-group-addon btn">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>