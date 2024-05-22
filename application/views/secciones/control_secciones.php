
<!-- FORM UPDATE -->
<form action="<?= base_url('secciones/update');?>" method="post" id="update_seccion">
    <input type="hidden" name="id_seccion" id="id_seccion" value="<?php if(isset($seccion->id)){echo $seccion->id; }?>">
    <div class="row alert-secondary">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mt-1 text-primary">Info. de secci&oacute;n</h6>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="form-group">
                <!-- <label for="">Grado</label> -->
                <select name="grado" id="grado" title="Grado" class="form-control" disabled>
                    <option value="" class="oculto">Grado</option>
                    <option value="primero" <?php if(isset($seccion->grado) AND $seccion->grado == "primero"){echo "selected";}?> >1<sup>er</sup> - Grado</option>
                    <option value="segundo" <?php if(isset($seccion->grado) AND $seccion->grado == "segundo"){echo "selected";}?> >2<sup>do</sup> - Grado</option>
                    <option value="tercero" <?php if(isset($seccion->grado) AND $seccion->grado == "tercero"){echo "selected";}?> >3<sup>er</sup> - Grado</option>
                    <option value="cuarto" <?php if(isset($seccion->grado) AND $seccion->grado == "cuarto"){echo "selected";}?> >4<sup>to</sup> - Grado</option>
                    <option value="quinto" <?php if(isset($seccion->grado) AND $seccion->grado == "quinto"){echo "selected";}?> >5<sup>to</sup> - Grado</option>
                    <option value="sexto" <?php if(isset($seccion->grado) AND $seccion->grado == "sexto"){echo "selected";}?> >6<sup>to</sup> - Grado</option>
                </select>
                <div class="invalid-feedback msg-1 text-left"></div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="form-group">
                <select name="seccion" id="seccion" disabled class="form-control">
                    <option value="" class="oculto">Secci&oacute;n</option>
                    <?php if(isset($secciones) AND !empty($secciones) AND !empty($letras)): ?>
                    <?php foreach($letras as $i => $item): ?>
                        <option value="<?= $item; ?>"  <?php if(isset($seccion->seccion) AND $seccion->seccion == $item){echo "selected";}?>><?= $item; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <div class="invalid-feedback msg-3 text-left"></div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="form-group">
                <!-- <label for="">Turno</label> -->
                <select name="turno" id="turno" title="Turno" class="form-control" disabled>
                    <option value="" class="oculto">Turno</option>
                    <option value="Mañana" <?php if(isset($seccion->turno) AND $seccion->turno == "Mañana"){echo "selected";}?> >Mañana</option>
                    <option value="Tarde" <?php if(isset($seccion->turno) AND $seccion->turno == "Tarde"){echo "selected";}?>>Tarde</option>
                </select>
                <div class="invalid-feedback msg-2 text-left"></div>
            </div>
        </div>

        <!-- PARTE 2 -->
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
            <h6 class="mt-1 text-primary">Docente Asignado</h6>

            <div class="form-group mx-auto" id="">
                <div class="input-group">

                    <select name="docente_asig" id="docente_asig" style="font-size: 14px;" title="Docente Asignado" data-live-search="true" class="form-control small" <?php if(!empty($seccion->id_docente) OR empty($docentes)){echo 'disabled';}?>>
                        <option value="<?php if(!empty($seccion->id_docente)){ echo $seccion->id_docente;} ?>" selected class="oculto">Sin asignar</option>
                        <?php if(isset($docentes) AND !empty($docentes)): ?>
                            <?php foreach($docentes as $item): ?>
                                <option value="<?= $item->cedula; ?>" <?php if(isset($docente) AND $item->cedula == !empty($docente->cedula)){echo "selected";}?> ><?= $item->nombre . " " . $item->apellido; ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" class="small oculto" selected style="font-size: 10px;">No hay docentes para este turno!</option>
                        <?php endif; ?>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="button" id="asignar_docente" <?php if(!empty($seccion->id_docente) OR empty($docentes)){echo 'disabled';}?>>
                            Asignar
                        </button>
                    </div>

                    <div class="invalid-feedback msg-4 text-left"></div>
                </div>
            </div>
        </div>

        <!-- INFO -->
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <h6 class="mt-1 text-primary">Total Asignados</h6>
                    <div class="form-group">
                        <input type="text" name="cupos" id="cupos" class="form-control custom-input" value="<?php if(isset($asignados) AND !empty($asignados)){echo count($asignados); }else{echo '0';}?>" readonly>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <h6 class="mt-1 text-primary">Total Disponible</h6>
                    <div class="form-group">
                        <input type="text" name="cupos" id="cupos" class="form-control custom-input" value="<?php if(isset($asignados) AND !empty($asignados) AND isset($seccion->capacidad) AND !empty($seccion->capacidad)){echo $seccion->capacidad - count($asignados); }else{echo $seccion->capacidad;}?>" readonly>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <h6 class="mt-1 text-primary">Capacidad</h6>
                    <div class="form-group">
                        <input type="number" name="capacidad" id="capacidad" class="form-control custom-input" value="<?php if(isset($seccion->capacidad)){echo $seccion->capacidad; }?>" readonly>
                        <div class="invalid-feedback msg-1 text-left"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="group-btn">
            <div class="form-group">
                <button type="button" id="btn-cancel" class="btn btn-sm btn-danger">CANCELAR</button>
                <button type="button" id="btn-change" class="btn btn-sm btn-success">CAMBIAR</button>
                <button type="submit" id="btn-update" class="btn btn-sm btn-warning d-none">ACTUALIZAR</button>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="form-group">
                <div id="loading" class="text-info"></div>
            </div>
        </div>

    </div>


</form>


