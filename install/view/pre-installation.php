<div class="section">
  <p>1. Por favor verifique que sus configuraciones <strong>PHP</strong> Cumple los siguientes requisitos:</p>
  <hr />
  <div>
    <table>
      <thead>
        <tr>
          <th width="25%">ajustes</th>
          <th width="25%">Actual</th>
          <th>Requeridas</th>
          <th width="15%" class="text-center">Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Versión PHP</td>
          <td>
            <?php echo $current_php_version; ?>
          </td>
          <td>
            <?php echo $php_version_required; ?> >=</td>
            <td class="text-center">
              <?php if ($php_version_success) { ?>
                <i class="status fa fa-check-circle-o"></i>
              <?php } else { ?>
                <i class="status fa fa-times-circle-o"></i>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>allow_url_fopen</td>
            <td>
              <?php if ($allow_url_fopen_success) { ?>
                On
              <?php } else { ?>
                Off
              <?php } ?>
            </td>
            <td>On</td>
            <td class="text-center">
              <?php if ($allow_url_fopen_success) { ?>
                <i class="status fa fa-check-circle-o"></i>
              <?php } else { ?>
                <i class="status fa fa-times-circle-o"></i>
              <?php } ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="section">
    <p>2. Por favor, verifique que las extensiones enumeradas a continuación son <strong>instaladas/habilitadas</strong> En su servidor:</p>
    <hr />
    <div>
      <table>
        <thead>
          <tr>
            <th width="25%">Extensiones</th>
            <th width="25%">Actual</th>
            <th>Requeridas</th>
            <th width="15%" class="text-center">Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($settings["extensions"] as $value) { ?>
            <tr>
              <td>
                <?php echo($value); ?>
              </td>
              <td>
                <?php if (extension_loaded($value)) { ?>
                  On
                <?php } else { ?>
                  Off
                <?php } ?>
              </td>
              <td>On</td>
              <td class="text-center">
                <?php if (extension_loaded($value)) { ?>
                  <i class="status fa fa-check-circle-o"></i>
                <?php } else { ?>
                  <i class="status fa fa-times-circle-o"></i>
                <?php } ?>
              </td>
            </tr>
          <?php }; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="section">
    <p>3. Asegúrese de haber establecido el permiso de <strong>Lectura y escritura</strong> en los siguientes
    Directorios y Archivos:</p>
    <hr />
    <div>
      <table>
        <thead>
          <tr>
            <th>Archivos</th>
            <th width="15%" class="text-center">Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($settings["writeable_directories"] as $value) { ?>
            <tr>
              <td>
                <?php echo $value; ?>
              </td>
              <td class="text-center">
                <?php if (is_writeable(".." . $value)) { ?>
                  <i class="status fa fa-check-circle-o"></i>
                  <?php
                } else {
                    $all_requirement_success = false; ?>
                  <i class="status fa fa-times-circle-o"></i>
                <?php
                } ?>
              </td>
            </tr>
          <?php }; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel-footer">
    <button <?php if (!$all_requirement_success) {
                    echo "disabled=disabled" ;
                } ?> class="btn btn-info
      form-next"><i class='fa fa-chevron-right'></i> Continuar...</button>
    </div>
