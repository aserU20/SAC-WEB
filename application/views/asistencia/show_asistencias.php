<div id="view_list">

    <div class="container-fluid bg-dark mx-auto" id="container-table">
    <div class="row gutters" id="row-list">

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
        <h4 class="mb-2 text-success text-center">
          <strong>
            ASISTENCIA - PERSONAL
          </strong>
        </h4>
      </div>

      <!-- TABLA DATOS -->
      <div class="col-lg-12 col-md-12 col-sm-12 mx-auto mt-2 p-0" id="tabla-datos">
          <!-- FILTER -->
          <div class="col-lg-12 col-md-12 col-sm-12 mx-auto bg-secondary">
            <div class="row">
    
              <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="fecha_i">Fecha inicio</label>
                  <input type="date" name="" id="fecha_i" class="form-control" value="<?php if(isset($fecha_i)){echo $fecha_i; }?>">
                </div>
              </div>
                
              <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="fecha_f">Fecha fin</label>
                  <input type="date" name="" id="fecha_f" class="form-control" value="<?php if(isset($fecha_f)){echo $fecha_f; }?>">
                </div>
              </div>
    
              <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                  <label for="ci">C&eacute;dula identidad (op.)</label>
                  <div class="input-group">
                    <select name="nacionalidad" id="nacionalidad" class="form-control selectpicker border-0 col-3" required>
                      <option value="V-" selected class="small">V-</option>
                      <option value="E-" class="small">E-</option>
                    </select>
                    <input type="search" name="ci" id="ci" class="form-control col-9 border-0" placeholder="Ci" value="<?php if(isset($cedula)){echo $cedula; }?>">
                    <div class="input-group-append">
                      <button class="btn btn-light btn-sm" type="button" id="submit_filter">
                        <i class="fas fa-arrow-right"></i>
                      </button>
                    </div>
                    <div class="invalid-feedback text-left"></div>
                  </div>
                </div>  
    
              </div>
            </div>
    
          </div>

          <div class="table-responsive alert-secondary p-2" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-responsive table-condensed table-hover">
              <thead class="thead-dark">
                <th class="small">C&eacute;dula</th>
                <th class="small">Nombre</th>                
                <th class="small">Apellido</th>
                <th class="small">Cargo</th>
                  
                <th class="small bg-secondary">Lunes</th>
                <th class="small">Entrada</th>
                <th class="small">Salida</th>
                <th class="small">Ob.</th>
                  
                <th class="small bg-secondary">Martes</th>
                <th class="small">Entrada</th>
                <th class="small">Salida</th>
                <th class="small">Ob.</th>
                  
                <th class="small bg-secondary">Miercoles</th>
                <th class="small">Entrada</th>
                <th class="small">Salida</th>
                <th class="small">Ob.</th>
                  
                <th class="small bg-secondary">Jueves</th>
                <th class="small">Entrada</th>
                <th class="small">Salida</th>
                <th class="small">Ob.</th>
                  
                <th class="small bg-secondary">Viernes</th>
                <th class="small">Entrada</th>
                <th class="small">Salida</th>
                <th class="small">Ob.</th>
              </thead>
              <tbody>
                <?php if(!empty($datos)): ?>
                <?php foreach($datos as $item): ?>
                  <tr>
                    <td class="small" style="font-size: 10px;"><?= $item->cedula; ?></td>
                    <td class="small"><?= $item->nombre; ?></td>
                    <td class="small"><?= $item->apellido; ?></td>
                    <td class="small"><?= $item->codigo; ?></td>

                    <td class="small"><?= $item->lu_fecha; ?></td>
                    <td class="small"><?= $item->lu_entrada; ?></td>
                    <td class="small"><?= $item->lu_salida; ?></td>
                    <td class="small"><?= $item->lu_condicion; ?></td>
                      
                    <td class="small"><?= $item->ma_fecha; ?></td>
                    <td class="small"><?= $item->ma_entrada; ?></td>
                    <td class="small"><?= $item->ma_salida; ?></td>
                    <td class="small"><?= $item->ma_condicion;?></td>
                      
                    <td class="small"><?= $item->mi_fecha; ?></td>
                    <td class="small"><?= $item->mi_entrada; ?></td>
                    <td class="small"><?= $item->mi_salida; ?></td>
                    <td class="small"><?= $item->mi_condicion; ?></td>
                    
                    <td class="small"><?= $item->ju_fecha; ?></td>
                    <td class="small"><?= $item->ju_entrada; ?></td>
                    <td class="small"><?= $item->ju_salida; ?></td>
                    <td class="small"><?= $item->ju_condicion; ?></td>
                      
                    <td class="small"><?= $item->vi_fecha; ?></td>
                    <td class="small"><?= $item->vi_entrada; ?></td>
                    <td class="small"><?= $item->vi_salida; ?></td>
                    <td class="small"><?= $item->vi_condicion; ?></td>
                      
                  </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
                    
        </div> 
        
        <div class="col-lg-11 col-md-11 col-sm-11 mx-auto">
            <div id="loading"></div>
        </div>
    </div><br>
</div>

</div>