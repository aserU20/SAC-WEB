<!-- style="contain: size; overflow-x: scroll; height: 250px;" -->
<div class="container-fluid bg-dark">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 mx-auto bg-secondary">
            <div class="row">
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <h4 class="mb-2 mt-5 text-left">
                      <strong>
                        ASISTENCIA - PERSONAL
                      </strong>
                    </h4>
                
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mt-5 ">
                        <a href="<?= base_url('asistencia/reporte_pdf/' . $offset . "/" . $fecha_i);?>" class="nav-link btn-sm btn-danger rounded-0"><i class="fa fa-file-pdf"></i> DESCARGAR PDF</a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mt-3">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <div class="input-group">
                            <input type="date" name="fecha_i" id="fecha_i" class="form-control rounded-0 btn-sm" value="<?= $fecha_i; ?>">
                            <div class="input-group-append">
                                <button class="btn btn-light btn-sm" type="button" id="btn_filter">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback text-left"></div>
                        </div>
                    </div>  
    
                </div>
            

            </div>
    
        </div>


        <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-12 mx-auto alert-secondary" style="contain: size; overflow-y: scroll;"> -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 mx-auto alert-secondary">
            <!-- HEAD -->
            <div class="row text-center">
                <div class="h5 col-lg-12 col-md-12 col-sm-12 p-0 mt-3 col-12">
                    <strong>Personal</strong>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-12 p-2 bg-dark text-light" style="font-size: 12px; border: 1px solid #f4f4f4;">N°</div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2 bg-dark text-light" style="font-size: 12px; border: 1px solid #f4f4f4;">Cedula</div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2 bg-dark text-light" style="font-size: 12px; border: 1px solid #f4f4f4;">Nombre</div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2 bg-dark text-light" style="font-size: 12px; border: 1px solid #f4f4f4;">Apellido</div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-2 bg-dark text-light" style="font-size: 12px; border: 1px solid #f4f4f4;">Cargo</div>
            </div>

            <!-- BODY -->
            <?php if(!empty($page)):?>
            <?php foreach($page as $i =>  $item): ?>
        
            <div class="row text-center" id="personal-list">
                <div class="col-lg-1 col-md-1 col-sm-1 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;"><?= $i +1; ?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;"><?= $item->cedula; ?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;"><?= $item->nombre; ?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;"><?= $item->apellido; ?></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0 small" style="font-size: 11px; border-right: 1px solid #f4f4f4; border-bottom: 1px solid #f4f4f4;"><?= $item->codigo; ?></div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- AISTENCIA -->
        <div class="col-lg-8 col-md-8 col-sm-8 col-12 mx-auto alert-dark" style="contain: size; min-height: 150px;">

            <!-- HEAD -->
            <div class="row text-center">
                <div class="h5 col-lg-12 col-md-12 col-sm-12 p-0 mt-3 col-12">
                    <strong>Asistencia</strong> 
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 <?php if($fecha_i == $fechas['lunes']){echo "bg-warning";}else{  echo "bg-dark text-light";}?>" style="font-size: 12px; border: 1px solid #f4f4f4;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;">
                            Lunes: <?php if(isset($fechas)){ echo $fechas['lunes']; }?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 bg-dark text-light" style="font-size: 11px; border-right: 1px solid #f4f4f4;">Entrada</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-light" style="font-size: 11px; border: 0px solid #f4f4f4;">Salida</div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 <?php if($fecha_i == $fechas['martes']){echo "bg-warning";}else{ echo "bg-dark text-light";}?>" style="font-size: 12px; border: 1px solid #f4f4f4;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;">
                            Martes: <?php if(isset($fechas)){ echo $fechas['martes']; }?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 bg-dark text-light" style="font-size: 11px; border-right: 1px solid #f4f4f4;">Entrada</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-light" style="font-size: 11px; border: 0px solid #f4f4f4;">Salida</div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 <?php if($fecha_i == $fechas['miercoles']){echo "bg-warning";}else{ echo "bg-dark text-light";}?>" style="font-size: 12px; border: 1px solid #f4f4f4;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;">
                            Miercoles: <?php if(isset($fechas)){ echo $fechas['miercoles']; }?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-light p-0" style="font-size: 11px; border-right: 1px solid #f4f4f4;">Entrada</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-light" style="font-size: 11px; border: 0px solid #f4f4f4;">Salida</div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 <?php if($fecha_i == $fechas['jueves']){echo "bg-warning";}else{ echo "bg-dark text-light";}?>" style="font-size: 12px; border: 1px solid #f4f4f4;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;">
                            Jueves: <?php if(isset($fechas)){ echo $fechas['jueves']; }?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 bg-dark text-light" style="font-size: 11px; border-right: 1px solid #f4f4f4;">Entrada</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-light" style="font-size: 11px; border: 0px solid #f4f4f4;">Salida</div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 <?php if($fecha_i == $fechas['viernes']){echo "bg-warning";}else{ echo "bg-dark text-light";}?>" style="font-size: 12px; border: 1px solid #f4f4f4;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;">
                            Viernes: <?php if(isset($fechas)){ echo $fechas['viernes']; }?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 bg-dark text-light" style="font-size: 11px; border-right: 1px solid #f4f4f4;">Entrada</div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-light" style="font-size: 11px; border: 0px solid #f4f4f4;">Salida</div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12 bg-dark text-light" style="font-size: 12px; border: 1px solid #f4f4f4;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="font-size: 11px; border-bottom: 1px solid #f4f4f4;">
                            Observación
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-2 col-12 p-0 <?php if($fecha_i == $fechas['lunes']){echo "bg-warning";}else{  echo "bg-dark text-light";}?>" style="border-right: 1px solid #f4f4f4; font-size: 11px;">L</div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0 <?php if($fecha_i == $fechas['martes']){echo "bg-warning";}else{  echo "bg-dark text-light";}?>" style="border-right: 1px solid #f4f4f4; font-size: 11px;">M</div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0 <?php if($fecha_i == $fechas['miercoles']){echo "bg-warning";}else{  echo "bg-dark text-light";}?>" style="border-right: 1px solid #f4f4f4; font-size: 11px;">M</div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0 <?php if($fecha_i == $fechas['jueves']){echo "bg-warning";}else{  echo "bg-dark text-light";}?>" style="border-right: 1px solid #f4f4f4; font-size: 11px;">J</div>
                        <div class="col-lg-3 col-md-2 col-sm-2 col-12 p-0 <?php if($fecha_i == $fechas['viernes']){echo "bg-warning";}else{  echo "bg-dark text-light";}?>" style="font-size: 11px;">V</div>

                    </div>
                </div>
            </div>

            <!-- BODY -->
            <?php if(!empty($page)):?>
            <?php foreach($page as $i =>  $item): ?>
                <div class="row text-center" id="body-table-content">

                <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="border: 0px solid #f4f4f4;">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->lu_entrada)):?>
                            <?= $item->lu_entrada; ?>
                            <?php else: ?>
                            X
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->lu_salida)):?>
                            <?= $item->lu_salida; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="border: 0px solid #f4f4f4;">
                    <div class="row">
           
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->ma_entrada)):?>
                            <?= $item->ma_entrada; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->ma_salida)):?>
                            <?= $item->ma_salida; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="border: 0px solid #f4f4f4;">
                    <div class="row">
                  
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                             <?php if(!empty($item->mi_entrada)):?>
                            <?= $item->mi_entrada; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->mi_salida)):?>
                            <?= $item->mi_salida; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="border: 0px solid #f4f4f4;">
                    <div class="row">
                       
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                             <?php if(!empty($item->ju_entrada)):?>
                            <?= $item->ju_entrada; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->ju_salida)):?>
                            <?= $item->ju_salida; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="border: 0px solid #f4f4f4;">
                    <div class="row">
                      
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->vi_entrada)):?>
                            <?= $item->vi_entrada; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 small" style="font-size: 11px; border-bottom: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">
                            <?php if(!empty($item->vi_salida)):?>
                            <?= $item->vi_salida; ?>
                            <?php else:?>
                            X
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="border-right: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-bottom: 1px solid #f4f4f4;">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-2 col-sm-2 col-12 p-0" style="border-right: 1px solid #f4f4f4; font-size: 11px;">
                            <?php if(!empty($item->lu_condicion)):?>
                            <?= $item->lu_condicion; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0" style="border-right: 1px solid #f4f4f4; font-size: 11px;">
                            <?php if(!empty($item->ma_condicion)):?>
                            <?= $item->ma_condicion; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0" style="border-right: 1px solid #f4f4f4; font-size: 11px;">
                            <?php if(!empty($item->mi_condicion)):?>
                            <?= $item->mi_condicion; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0" style="border-right: 1px solid #f4f4f4; font-size: 11px;">
                            <?php if(!empty($item->ju_condicion)):?>
                            <?= $item->ju_condicion; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-2 col-12 p-0" style="font-size: 11px;">
                            <?php if(!empty($item->vi_condicion)):?>
                            <?= $item->vi_condicion; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            
            <!-- ALERT -->
            <?php if(isset($page) AND empty($page)):?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 text-center">
                        <div class="alert alert-danger small p-1 rounded-0">
                            No hay datos para mostrar
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        
        <!-- PAGINATE -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
        <?= $this->pagination->create_links();?>
        </div>

        


    </div>

</div>

