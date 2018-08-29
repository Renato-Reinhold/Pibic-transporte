<?php include_once "DB.php"; ?>

<div class="container" id="templateChegada<?=$_GET['num']?>" style="border-top: solid; border-color: #DCDCDC;">
    <div class="panel">
        <div class="row form-group">

            <div class="col-md-3 pull-right">
                <span class="col-md-offset-8 glyphicon glyphicon-remove btn btn-primary" style="background: white; color: red; border: none;" data-toggle = "btnExcluir" title="Eliminar campo de trajetória adicionado" onclick="atualizarValidacao('templateChegada<?=$_GET['num']?>')"></span>
            </div>

            <div class="col-xs-4 col-md-11">
                <label>Cidade</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-width="75%" data-required-error="Por favor, selecione uma cidade." id="cidadeExtraChegada<?=$_GET['num']?>" title="Escolha sua cidade..." name="cidadeExtraChegada<?=$_GET['num']?>"
                        onchange="carregarBairrosExtrasChegada('cidadeExtraChegada<?=$_GET['num']?>','bairroExtraChegada<?=$_GET['num']?>'), toggleCidadeChegada('<?=$_GET['num']?>')">
                    <?php getCidades(); ?>
                    <option value="9">Outros</option>
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div style="padding-top: 30px;" class="input-group DE" id="outraCidadeChegada<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outra</span>
                            <input type="text" name="outraCidadeExtraChegada<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-11">
                <label>Bairro</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-width="75%" data-required-error="Por favor, selecione um item da lista." name="bairroExtraChegada<?=$_GET['num']?>" data-live-search="true" title="Escolha seu bairro..." id="bairroExtraChegada<?=$_GET['num']?>" onchange="toggleBairroChegada('<?=$_GET['num']?>')">
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="input-group DE2" id="outroBairroChegada<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outro</span>
                            <input type="text" name="outroBairroExtraChegada<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-11">
                <label>Local de Saida</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="auto" id="localExtraChegada<?=$_GET['num']?>" title="Escolha da onde você vem..." name="LocalExtraChegada<?=$_GET['num']?>">
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
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="75%" id="empresaExtraChegada<?=$_GET['num']?>" title="Escolha a empresa utilizada..." name="empresaExtraChegada<?=$_GET['num']?>" 
                        onchange="carregarLinhasExtrasChegada('empresaExtraChegada<?=$_GET['num']?>', 'linhaExtraChegada<?=$_GET['num']?>'), toggleEmpresaChegada('<?=$_GET['num']?>')" >
                    <?php comecoEmpresa() ?>
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div style="padding-top: 30px;" class="input-group empE" id="outraEmpresaChegada<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outra</span>
                            <input type="text" name="outraEmpresaExtraChegada<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <label>Linha</label></br>
                <select required class="form-control selectpicker show-menu-arrow" data-required-error="Por favor, selecione um item da lista." data-width="auto" data-live-search="true" title="Escolha a linha utilizada..." id="linhaExtraChegada<?=$_GET['num']?>" name="linhaExtraChegada<?=$_GET['num']?>">
                </select>
                <div class="help-block with-errors"></div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="input-group linE" id="outraLinhaChegada<?=$_GET['num']?>">
                            <span class="input-group-addon btn">Outra</span>
                            <input type="text" name="outraLinhaExtraChegada<?=$_GET['num']?>" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden">
        <div class="row form-group">
            <div class='col-md-3 col-xs-4'>
                <div class='input-group time' id='horaExtraChegada<?=$_GET['num']?>'>
                    <span class="input-group-addon btn">Hora</span>
                    <input required type='text' class="form-control" id="btnHoraExtraChegada<?=$_GET['num']?>" name="horaExtraChegada<?=$_GET['num']?>"/>
                    <span class="input-group-addon btn">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
