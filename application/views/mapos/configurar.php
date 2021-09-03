<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
            <span class="icon">
            <i class="fas fa-wrench"></i>
            </span>
                <h5>Configuraciones del sistema</h5>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Generales</a></li>
                <li><a data-toggle="tab" href="#menu1">Financiero</a></li>
                <li><a data-toggle="tab" href="#menu2">Productos</a></li>
                <li><a data-toggle="tab" href="#menu3">Notificaciones</a></li>
                <li><a data-toggle="tab" href="#menu4">Atualizaciones</a></li>
                <li><a data-toggle="tab" href="#menu5">Ordenes de Servicio</a></li>
            </ul>
            <form action="<?php echo current_url(); ?>" id="formConfigurar" method="post" class="form-horizontal">
                <div class="widget-content nopadding tab-content">
                    <?php echo $custom_error; ?>
                    <!-- Menu Gerais -->
                    <div id="home" class="tab-pane fade in active">
                        <div class="control-group">
                            <label for="app_name" class="control-label">Nombre del sistema</label>
                            <div class="controls">
                                <input type="text" required name="app_name" value="<?= $configuration['app_name']?>">
                                <span class="help-inline">Nombre del sistema</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="app_theme" class="control-label">Tema del Sistema</label>
                            <div class="controls">
                                <select name="app_theme" id="app_theme">
                                    <option value="default">Oscuro</option>
                                    <option value="white" <?= $configuration['app_theme'] == 'white' ? 'selected' : ''; ?> >Claro</option>
                                </select>
                                <span class="help-inline">Seleccione el tema que desea usar en el sistema</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="per_page" class="control-label">Registros por Página</label>
                            <div class="controls">
                                <select name="per_page" id="theme">
                                    <option value="10">10</option>
                                    <option value="20" <?= $configuration['per_page'] == '20' ? 'selected' : ''; ?> >20</option>
                                    <option value="50" <?= $configuration['per_page'] == '50' ? 'selected' : ''; ?> >50</option>
                                    <option value="100" <?= $configuration['per_page'] == '100' ? 'selected' : ''; ?> >100</option>
                                </select>
                                <span class="help-inline">Selecione cuantos registros desesa mostrar en las listas</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="control_datatable" class="control-label">Visualización en tablas de datos</label>
                            <div class="controls">
                                <select name="control_datatable" id="control_datatable">
                                    <option value="1">Si</option>
                                    <option value="0" <?= $configuration['control_datatable'] == '0' ? 'selected' : ''; ?> >No</option>
                                </select>
                                <span class="help-inline">Habilitar o deshabilitar la visualización en tablas dinámicas</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Notificações -->
                    <div id="menu3" class="tab-pane fade">
                        <div class="control-group">
                            <label for="os_notification" class="control-label">Notificaciones de Ordenes de Servicio</label>
                            <div class="controls">
                                <select name="os_notification" id="os_notification">
                                    <option value="todos">Notificar a Todos</option>
                                    <option value="cliente" <?= $configuration['os_notification'] == 'cliente' ? 'selected' : ''; ?> >Solo al Cliente</option>
                                    <option value="tecnico" <?= $configuration['os_notification'] == 'tecnico' ? 'selected' : ''; ?> >Solo al Técnico</option>
                                    <option value="emitente" <?= $configuration['os_notification'] == 'emitente' ? 'selected' : ''; ?> >Solo al emisor</option>
                                    <option value="nenhum" <?= $configuration['os_notification'] == 'nenhum' ? 'selected' : ''; ?> >Sin notificaciones</option>
                                </select>
                                <span class="help-inline">Seleccione la opción de notificación por correo electrónico registrado en la orden de servicio.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="notifica_whats" class="control-label">Notificaciones por whatsapp</label>
                            <div class="controls">
                                <textarea rows="5" cols="20" name="notifica_whats" id="notifica_whats" placeholder = "Use as tags abaixo para criar seu texto!" style="margin: 0px; width: 606px; height: 86px;"><?php echo $configuration['notifica_whats']; ?></textarea>
                            </div>
                            <div class="span3">
                                <label for="notifica_whats_select">Etiquetas de valores de llenado<span class="required"></span></label>
                                <select class="span12" name="notifica_whats_select" id="notifica_whats_select" value="">
                                    <option value="0">Seleccione...</option>
                                    <option value="{CLIENTE_NOME}">Nombre del Cliente</option>
                                    <option value="{NUMERO_OS}">Número de OS</option>
                                    <option value="{STATUS_OS}">Status de OS</option>
                                    <option value="{VALOR_OS}">Valor de OS</option>
                                    <option value="{DESCRI_PRODUTOS}">Descripcion de productos</option>
                                    <option value="{EMITENTE}">Nombre del emitente</option>
                                    <option value="{TELEFONE_EMITENTE}">Telefono del emitente</option>
                                    <option value="{OBS_OS}">Observaciones</option>
                                    <option value="{DEFEITO_OS}">Falla</option>
                                    <option value="{LAUDO_OS}">Informes</option>
                                    <option value="{DATA_FINAL}">Fecha de Entrega</option>
                                    <option value="{DATA_INICIAL}">Fecha de ingreso</option>
                                    <option value="{DATA_GARANTIA}">Fecha de Garantia</option>
                                </select>
                            </div>
                            <span6 class="span10"> 

                                Para uso en negrita: * palabra * 
                                Para uso en cursiva: _palabra_
                                Para uso tachado: ~ palabra ~
                                </span>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Financeiro -->
                    <div id="menu1" class="tab-pane fade">
                        <div class="control-group">
                            <label for="control_baixa" class="control-label">Control retroactivo de cancelaciones</label>
                            <div class="controls">
                                <select name="control_baixa" id="control_baixa">
                                    <option value="1">Si</option>
                                    <option value="0" <?= $configuration['control_baixa'] == '0' ? 'selected' : ''; ?> >No</option>
                                </select>
                                <span class="help-inline">Activar o desactivar el control de cancelaciones financieros, con fecha retroactiva.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="control_editos" class="control-label">Controle de edicion de Ordenes de Servicio</label>
                            <div class="controls">
                                <select name="control_editos" id="control_editos">
                                    <option value="1">Si</option>
                                    <option value="0" <?= $configuration['control_editos'] == '0' ? 'selected' : ''; ?> >No</option>
                                </select>
                                <span class="help-inline">Activar o desactivar permiso para modificar O.S. facturada y/o cancelada.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="pix_key" class="control-label">Clave Pix para Recepcion de Pagos</label>
                            <div class="controls">
                                <input type="text" name="pix_key" value="<?= $configuration['pix_key']?>">
                                <span class="help-inline">Pix key para recibir pagos</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Produtos -->
                    <div id="menu2" class="tab-pane fade">
                        <div class="control-group">
                            <label for="control_estoque" class="control-label">Control de inventario</label>
                            <div class="controls">
                                <select name="control_estoque" id="control_estoque">
                                    <option value="1">Si</option>
                                    <option value="0" <?= $configuration['control_estoque'] == '0' ? 'selected' : ''; ?> >No</option>
                                </select>
                                <span class="help-inline">Habilite o deshabilite el control de inventario.</span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Atualização -->
                    <div id="menu4" class="tab-pane fade">
                        <div class="form-actions">
                            <div class="span8">
                                <div class="span9">
                                    <button href="#modal-confirmabanco" data-toggle="modal" type="button" class="btn btn-warning"><i class="fas fa-sync-alt"></i> Atualizar Base de Datos</button>
                                    <button href="#modal-confirmaratualiza" data-toggle="modal" type="button" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Atualizar Sistema</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu OS -->
                    <div id="menu5" class="tab-pane fade">
                        <div class="form-actions">
                            <div class="span8">
                                <span6 class="span12"> Establezca los status de la orden de servicio, los marcados mostrarán en la lista de la O.S. de forma predeterminada.  </span6>                              
                                <div class="span12">
                                    <label> <input <?= @in_array("Aberto", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aberto"> <span class="lbl"> Abierta</span> </label>
                                    <label> <input <?= @in_array("Faturado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Faturado"> <span class="lbl"> Facturada</span> </label>
                                    <label> <input <?= @in_array("Negociação", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Negociação"> <span class="lbl"> En espera de aprobacion</span> </label>                                  
                                    <label> <input <?= @in_array("Em Andamento", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Em Andamento"> <span class="lbl"> En proceso</span> </label>                                  
                                    <label> <input <?= @in_array("Orçamento", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Orçamento"> <span class="lbl"> Presupuestada</span> </label>
                                    <label> <input <?= @in_array("Finalizado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Finalizado"> <span class="lbl"> Finalizada</span> </label>
                                    <label> <input <?= @in_array("Cancelado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Cancelado"> <span class="lbl"> Cancelada</span> </label>
                                    <label> <input <?= @in_array("Aguardando Peças", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Peças"> <span class="lbl"> Esperando Piezas </span> </label>
                                    <label> <input <?= @in_array("Aprovado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aprovado"> <span class="lbl"> Aprobado </span> </label>
                                </div>                                
                            </div>
                            <div class="form-actions">
                                <div class="span8">
                                    <div class="span9">
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="modal-confirmaratualiza" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Atualizacion del sistema</h5>
        </div>
        <div class="modal-body">
            <h5 style="text-align: left">¿Realmente desea actualizar el sistema?</h5>
            <h7 style="text-align: left">Recomendamos hacer una copia de seguridad antes de continuar.</h7>
            <h7 style="text-align: left"><br>Realice una copia de seguridad de los siguientes archivos, ya que se eliminarán:</h7>
            <h7 style="text-align: left"><br>* ./assets/anexos</h7>
            <h7 style="text-align: left"><br>* ./assets/arquivos</h7>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button id="update-mapos" type="button" class="btn btn-danger"><i class="fas fa-sync-alt"></i>Actualizar</button>
        </div>
    </form>
</div>
<!-- Modal -->
<div id="modal-confirmabanco" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Atualizacion de la Base de datos</h5>
        </div>
        <div class="modal-body">
            <h5 style="text-align: left">¿Realmente desea actualizar la base de datos?</h5>
            <h7 style="text-align: left">Recomendamos hacer una copia de seguridad antes de continuar.
                <a target="_blank" title="Fazer Bakup" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/mapos/backup">Realizar copia de seguridad</a>
            </h7>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button id="update-database" type="button" class="btn btn-warning"><i class="fas fa-sync-alt"></i>Actualizar</button>
        </div>
    </form>
</div>
<script>
    $('#update-database').click(function () {
        window.location = "<?= site_url('mapos/atualizarBanco') ?>"
    });
    $('#update-mapos').click(function() {
        window.location = "<?= site_url('mapos/atualizarMapos') ?>"
    });
    $(document).ready(function() {
        $('#notifica_whats_select').change(function() {
            if ($(this).val() != "0")
                document.getElementById("notifica_whats").value += $(this).val();
            $(this).prop('selectedIndex', 0);
        });
    });
</script>
