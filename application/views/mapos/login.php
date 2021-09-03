<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Electronica Saturno - Sistema de ordenes de servicio </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/matrix-login.css" />
    <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/jquery-1.12.4.min.js"></script>
</head>

<body>
<div id="loginbox">
        <form class="form-vertical" id="formLogin" method="post" action="<?= site_url('login/verificarLogin') ?>">
            <?php if ($this->session->flashdata('error') != null) { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <div class="control-group normal_text">
                <h3><img src="<?= base_url() ?>assets/img/logo1.png" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fas fa-user"></i></span><input id="email" name="email" type="text" placeholder="Email" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lb"><i class="fas fa-lock"></i></span><input name="senha" type="password" placeholder="Contraseña" />
                    </div>
                </div>
            </div>
            <div class="form-actions" style="text-align: center">
                <div id="progress-acessar" class='hide progress progress-info progress-striped active'>
                    <div class='bar' style='width: 100%'></div>
                </div>
                <button id="btn-acessar" class="btn btn-success btn-large" /> Acceder</button>
            </div>
        </form>
<center>
    Todos los derechos reservador Electronica Saturno de Colima S.A de C.V. 2021 <br> Sistema de Ordenes de Servicio Tecnico. by <a href="https://workmk.com">WorkMK</a>
</center>
    </div>

    <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>
    <div id="notification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="myModalLabel">Ordenes de Servicio Tecnico - Error</h4>
        </div>
        <div class="modal-body">
            <h5 style="text-align: center" id="message">Los datos de inicio de sesión son incorrectos, inténtelo de nuevo.</h5>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </div>
    
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#email').focus();
            $("#formLogin").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    senha: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: 'Campo Requerido.',
                        email: 'Ingrese un email valido'
                    },
                    senha: {
                        required: 'Campo Requerido.'
                    }
                },
                submitHandler: function(form) {
                    var dados = $(form).serialize();
                    $('#btn-acessar').addClass('disabled');
                    $('#progress-acessar').removeClass('hide');

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('login/verificarLogin?ajax=true'); ?>",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.href = "<?= site_url('mapos'); ?>";
                            } else {


                                $('#btn-acessar').removeClass('disabled');
                                $('#progress-acessar').addClass('hide');
                                
                                $('#message').text(data.message || 'Los datos de inicio de sesión son incorrectos, inténtelo de nuevo.');
                                $('#call-modal').trigger('click');
                            }
                        }
                    });

                    return false;
                },

                errorClass: "help-inline",
                errorElement: "span",
                highlight: function(element, errorClass, validClass) {
                    $(element).parents('.control-group').addClass('error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents('.control-group').removeClass('error');
                    $(element).parents('.control-group').addClass('success');
                }
            });

        });
    </script>

</body>

</html>
