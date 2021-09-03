<form name="config-form" id="config-form" action="do_install.php" method="post">

  <div class="section clearfix">
    <p>1. Ingrese la información de su conexión a <strong>la base de datos</strong>.</p>
    <hr />
    <div>
      <div class="form-group clearfix">
        <label for="host" class=" col-md-3">Host</label>
        <div class="col-md-9">
          <input type="text" value="" id="host" name="host" class="form-control" placeholder="Host de base de datos (generalmente localhost)" />
        </div>
      </div>
      <div class="form-group clearfix">
        <label for="dbuser" class=" col-md-3">Usuario</label>
        <div class=" col-md-9">
          <input type="text" value="" id="dbuser" name="dbuser" class="form-control" autocomplete="off"
          placeholder="Nombre de usuario de la base de datos" />
        </div>
      </div>
      <div class="form-group clearfix">
        <label for="dbpassword" class=" col-md-3">Contraseña</label>
        <div class=" col-md-9">
          <input type="password" value="" id="dbpassword" name="dbpassword" class="form-control"
          autocomplete="off" placeholder="Contraseña de usuario de la base de datos" />
        </div>
      </div>
      <div class="form-group clearfix">
        <label for="dbname" class=" col-md-3">Base de datos</label>
        <div class=" col-md-9">
          <input type="text" value="" id="dbname" name="dbname" class="form-control" placeholder="Nombre de la base de datos" />
        </div>
      </div>
    </div>
  </div>

  <div class="section clearfix">
    <p>2. Por favor ingrese la información a su cuenta de <strong>administrador</strong>.</p>
    <hr />
    <div>
      <div class="form-group clearfix">
        <label for="full_name" class=" col-md-3">Nombre</label>
        <div class="col-md-9">
          <input type="text" value="" id="full_name" name="full_name" class="form-control" placeholder="Nombre completo" />
        </div>
      </div>
      <div class="form-group clearfix">
        <label for="email" class=" col-md-3">Email</label>
        <div class=" col-md-9">
          <input type="text" value="" id="email" name="email" class="form-control" placeholder="Su e-mail" />
        </div>
      </div>
      <div class="form-group clearfix">
        <label for="password" class=" col-md-3">Contraseña</label>
        <div class=" col-md-9">
          <input type="password" value="" id="password" name="password" class="form-control" placeholder="Contraseña de inicio de sesión" />
        </div>
      </div>
    </div>
  </div>

  <div class="section clearfix">
    <p>3. Por favor ingrese la URL.</p>
    <hr />
    <div>
      <div class="form-group clearfix">
        <div class="form-group clearfix">
          <label for="base_url" class=" col-md-3">URL</label>
          <div class="col-md-9">
            <input type="text" value="" id="base_url" name="base_url" class="form-control"
            placeholder="URL del sistema" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="panel-footer">
    <button type="submit" class="btn btn-info form-next">
      <span class="loader hide"> Por favor, espere...</span>
      <span class="button-text"><i class='fa fa-chevron-right'></i> Instalar</span>
    </button>
  </div>

</form>
