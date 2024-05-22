<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto text-dark alert-light shadow-lg">
                <div class="profile-head">
                    <h5>
                        <?php if(isset($data->nombres_student) AND isset($data->apellidos_student)): ?>
                            <?= $data->nombres_student . " " . $data->apellidos_student; ?>
                        <?php endif; ?>
                    </h5>
                    <h6> Code: 
                        <!-- EJM. 4FG65H -->
                        <?php if(isset($data->codigo_student)): ?>
                            <?= $data->codigo_student; ?>
                        <?php endif; ?>
                    </h6>
                    <p class="proile-rating">
                        <span>
                            <!-- grado -->
                            <?= $data->grado_student; ?>
                        </span>
                    </p>
                    <div class="row">
                        <div class="col-md-6 text-muted">Creado: 
                            <p>
                                <?php if(isset($data->created_at)): ?>
                                    <?= $data->created_at; ?>
                                <?php endif; ?>     
                            </p>
                        </div>
                        <div class="col-md-6 text-muted">Modificado: 
                            <p>
                                <?php if(isset($data->updated_at)): ?>
                                    <?= $data->updated_at; ?>
                                <?php endif; ?>     
                            </p>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acerca de:</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Representante:</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">Secci&oacute;n</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 mx-auto text-dark alert-secondary">
                <div class="tab-content profile-tab" id="myTabContent">

                    <!-- ACERCA DE -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>F. Nacimiento</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data->f_nacimiento_student)): ?>
                                        <?= $data->f_nacimiento_student; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Codigo</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data->codigo_student)): ?>
                                        <?= $data->codigo_student; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Edad</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data->edad_student)): ?>
                                        <?= $data->edad_student; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Sexo</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data->sexo_student)): ?>
                                        <?= $data->sexo_student; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- REPRESENTANTE -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->nombres_r) AND isset($representante->apellidos_r)): ?>
                                        <?= $representante->nombres_r . " " . $representante->apellidos_r; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>F. Nacimiento</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->f_nacimiento_r)): ?>
                                        <?= $representante->f_nacimiento_r; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Cédula</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->cedula_r)): ?>
                                        <?= $representante->cedula_r; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Parentesco</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->parentesco)): ?>
                                        <?= $representante->parentesco; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tel&eacute;fono</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->telefono_r)): ?>
                                        <?= $representante->telefono_r; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Edad</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->edad_r)): ?>
                                        <?= $representante->edad_r; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Sexo</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->sexo_r)): ?>
                                        <?= $representante->sexo_r; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ciudad:</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->ciudad_r)): ?>
                                        <?= $representante->ciudad_r; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Dirección:</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($representante->direccion_r)): ?>
                                        <?= $representante->direccion_r; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- SECCION -->
                    <div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Grado</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data->grado_student)): ?>
                                        <?= $data->grado_student; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Secci&oacute;n</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if($data->seccion_id != 0): ?>
                                    <?php if(isset($seccion->seccion)): ?>
                                        <?= $seccion->seccion; ?>
                                    <?php endif; ?>  
                                    <?php else: ?>
                                        <span class="text-danger">Sin asignar</span>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Turno</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if($data->seccion_id != 0): ?>
                                    <?php if(isset($seccion->turno)): ?>
                                        <?= $seccion->turno; ?>
                                    <?php endif; ?>  
                                    <?php else: ?>
                                        
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>