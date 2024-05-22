<div class="bg-dark mx-auto" id="container-table">
  <!-- TITLE -->
  <br>
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
    <h4 class="mb-2 text-success text-center">
      <strong>
        LISTADO - ALUMNOS
      </strong>
    </h4>
  </div>
  
  <!-- TABLA -->
  <div class="col-lg-12 col-md-12 col-sm-12 mx-auto alert-dark">
    <br>
    <!-- TABLAS DE DATOS -->
    <div class="table-responsive" id="listadoregistros">
      <table id="tbllistado" class="table table-striped table-condensed table-hover my-5 dataTable">
        <thead class="thead-dark">
            <tr>
              <th class="small">C&oacute;digo</th>
              <th class="small">Grado</th>
              <th class="small">Secci&oacute;n</th>
              <th class="small">Turno</th>
              <th class="small">Nombre</th>                
              <th class="small">Apellido</th>
              <th class="small">Sexo</th>
              <th class="small">Edad</th>
              <th class="small">F. nacimiento</th>
              <th class="small">Representante</th>
              <th class="text-center small">Ver</th>
              <?php if($this->session->userdata('rango') == "Admin"):?>
              <th class="text-center small">Eliminar</th>
              <?php endif; ?>
            </tr>
        </thead>
          <tbody>
            <?php if(!empty($datos)): ?> 
            <?php foreach($datos as $item): ?>
              <tr>
                <td class="small"><?= $item->codigo_student; ?></td>
                <td class="small"><?= $item->grado_student; ?></td>
                <td class="small"><?= $item->seccion; ?></td>
                <td class="small"><?= $item->turno; ?></td>
                <td class="small"><?= $item->nombres_student; ?></td>
                <td class="small"><?= $item->apellidos_student; ?></td>
                <td class="small"><?= $item->sexo_student; ?></td>
                <td class="small"><?= $item->edad_student; ?></td>
                <td class="small"><?= $item->f_nacimiento_student; ?></td>
                <td class="small"><?= $item->parentesco; ?></td>
                <td class="text-center small">
                  <button type="button" class="btn btn-sm btn-dark" id="edit_registro" data-id="<?= $item->codigo_student; ?>">
                    <i class="fa fa-eye"></i>
                  </button>
                </td>
                <?php if($this->session->userdata('rango') == "Admin"):?>
                <td class="text-center small">
                  <button type="button" class="btn btn-sm btn-danger" id="delete_registro" data-id="<?= $item->codigo_student; ?>">
                    <i class="fa fa-trash-alt"></i>
                  </button>
                </td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
      </table><br>
    </div>
  </div><br>
</div>

<div class="bg-dark mx-auto" id="container-data"></div>
