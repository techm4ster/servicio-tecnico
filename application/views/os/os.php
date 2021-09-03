<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/os/gerenciar">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
            <div class="span3">
                <a href="<?php echo base_url(); ?>index.php/os/adicionar" class="btn btn-success span12"><i class="fas fa-plus"></i> Agregar O.S.</a>
            </div>
        <?php
        } ?>

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nombre del cliente a buscar" class="span12" value="">
        </div>
        <div class="span2">
            <select name="status[]" id="status" class="span12" multiple>
                <option value="">Selecione status</option>
                <option value="Aberto">Abierto</option>
                <option value="Faturado">Facturado</option>
                <option value="Negociação">Negociación</option>
                <option value="Em Andamento">En proceso</option>
                <option value="Orçamento">Presupuesto</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Aguardando Peças">Esperando partes</option>
                <option value="Aprovado">Aprobado</option>
            </select>

        </div>

        <div class="span3">
            <input type="text" name="data" autocomplete="off" id="data" placeholder="Fecha de ingreso" class="span6 datepicker" value="">
            <input type="text" name="data2" autocomplete="off" id="data2" placeholder="Fecha de entrega" class="span6 datepicker" value="">
        </div>
        <div class="span1">
            <button class="span12 btn"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-diagnoses"></i>
        </span>
        <h5>Órdenes de servicio</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        <th>N° OS</th>
                        <th>Cliente</th>
                        <th>Responsable</th>
                        <th>Fecha de ingreso</th>
                        <th>Data Final</th>
                        <th>Venc. Garantia</th>
                        <th>Valor Total</th>
                        <th>Valor Total (Faturado)</th>
                        <th>Status</th>
                        <th>T. Garantia</th>
                        <th>Comportamiento/Falla</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!$results) {
                        echo '<tr>
                                    <td colspan="10">No hay registros</td>
                                  </tr>';
                    }
                    $this->load->model('os_model');
                    foreach ($results as $r) {
                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                        if ($r->dataFinal != null) {
                            $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                        } else {
                            $dataFinal = "";
                        }
                        if ($this->input->get('pesquisa') === null && is_array(json_decode($configuration['os_status_list']))) {
                            if (in_array($r->status, json_decode($configuration['os_status_list'])) != true) {
                                continue;
                            }
                        }

                        switch ($r->status) {
                            case 'Aberto':
                                $cor = '#00cd00';
                                break;
                            case 'Em Andamento':
                                $cor = '#436eee';
                                break;
                            case 'Orçamento':
                                $cor = '#CDB380';
                                break;
                            case 'Negociação':
                                $cor = '#AEB404';
                                break;
                            case 'Cancelado':
                                $cor = '#CD0000';
                                break;
                            case 'Finalizado':
                                $cor = '#256';
                                break;
                            case 'Faturado':
                                $cor = '#B266FF';
                                break;
                            case 'Aguardando Peças':
                                $cor = '#FF7F00';
                                break;
                            case 'Aprovado':
                                $cor = '#808080';
                                break;
                            default:
                                $cor = '#E0E4CC';
                                break;
                        }
                        $vencGarantia = '';

                        if ($r->garantia && is_numeric($r->garantia)) {
                            $vencGarantia = dateInterval($r->dataFinal, $r->garantia);
                        }

                        echo '<tr>';
                        echo '<td>' . $r->idOs . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" style="margin-right: 1%">' .$r->nomeCliente. '</a></td>';
                        echo '<td>' . $r->nome . '</td>';
                        echo '<td>' . $dataInicial . '</td>';
                        echo '<td>' . $dataFinal . '</td>';
                        echo '<td>' . $vencGarantia . '</td>';
                        echo '<td>R$ ' . number_format($r->totalProdutos + $r->totalServicos, 2, ',', '.') . '</td>';
                        echo '<td>R$ ' . number_format($r->valorTotal, 2, ',', '.') . '</td>';
                        echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                        echo '<td>' . $r->refGarantia . '</td>';
                        echo '<td>';

                        $editavel = $this->os_model->isEditable($r->idOs);

                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                        }
                        if ($editavel) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOs') && $editavel) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idOs . '" class="btn btn-danger tip-top" title="Excluir OS"><i class="fas fa-trash-alt"></i></a>  ';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/os/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Borrar OS</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idOs" name="id" value="" />
            <h5 style="text-align: center">Realmente quieres borrar esto OS?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Borrar</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var os = $(this).attr('os');
            $('#idOs').val(os);
        });
        $(document).on('click', '#excluir-notificacao', function(event) {
            event.preventDefault();
            $.ajax({
                    url: '<?php echo site_url() ?>/os/excluir_notificacao',
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(data) {
                    if (data.result == true) {
                        Swal.fire({
                            type: "success",
                            title: "Exito",
                            text: "Notificación borrada con exito."
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            type: "success",
                            title: "exito",
                            text: "Se ha producido un problema al tratar de eliminar la notificación."
                        });
                    }
                });
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
