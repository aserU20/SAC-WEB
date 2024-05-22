<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto text-dark alert-light shadow-lg">
                <div class="profile-head">
                    <h5>
                        <?php if(isset($data['nombre']) AND isset($data['apellido'])): ?>
                            <?= $data['nombre'] . " " . $data['apellido']; ?>
                        <?php endif; ?>
                    </h5>
                    <h6>
                        <!-- EJM. OBRERO GENERAL II -->
                        <?php if(isset($data['nombre_cargo'])): ?>
                            <?= $data['nombre_cargo']; ?>
                        <?php endif; ?>
                    </h6>
                    <p class="proile-rating">TURNO: 
                        <span>
                            <!-- Mañana -->
                            <?php if(isset($data['turno'])): ?>
                                <?= $data['turno']; ?>
                            <?php endif; ?>
                        </span>
                    </p>
                    <div class="row">
                        <div class="col-md-6 text-muted">Creado: 
                            <p>
                                <?php if(isset($data['created_at'])): ?>
                                    <?= $data['created_at']; ?>
                                <?php endif; ?>     
                            </p>
                        </div>
                        <div class="col-md-6 text-muted">Modificado: 
                            <p>
                                <?php if(isset($data['updated_at'])): ?>
                                    <?= $data['updated_at']; ?>
                                <?php endif; ?>     
                            </p>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acerca de:</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Info. laboral:</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">Observación</a>
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
                                    <?php if(isset($data['f_nacimiento'])): ?>
                                        <?= $data['f_nacimiento']; ?>
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
                                    <?php if(isset($data['cedula'])): ?>
                                        <?= $data['cedula']; ?>
                                    <?php endif; ?>  
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Correo</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data['correo'])): ?>
                                        <?= $data['correo']; ?>
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
                                    <?php if(isset($data['telefono'])): ?>
                                        <?= $data['telefono']; ?>
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
                                    <?php if(isset($data['edad'])): ?>
                                        <?= $data['edad']; ?>
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
                                    <?php if(isset($data['sexo_personal'])): ?>
                                        <?= $data['sexo_personal']; ?>
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
                                    <?php if(isset($data['ciudad'])): ?>
                                        <?= $data['ciudad']; ?>
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
                                    <?php if(isset($data['direccion'])): ?>
                                        <?= $data['direccion']; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- INFO. LABORAL -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tipo personal</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data['tipo'])): ?>
                                        <?= $data['tipo']; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Código</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data['codigo'])): ?>
                                        <?= $data['codigo']; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Cargo</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?php if(isset($data['nombre_cargo'])): ?>
                                        <?= $data['nombre_cargo']; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- OBSERVACION -->
                    <div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
                        <p class="text-justify">
                            <?php if(isset($data['observacion']) AND !empty($data['observacion'])): ?>
                                <?= $data['observacion']; ?>
                            <?php endif; ?> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
</div>