<div class="bg-dark mx-auto">
    <div class="container">
        <!-- TITLE -->
        <br>
        <div class="section-header">
            <h6 style="font-size: 1.3rem;">
                <strong>
                    CONFIGURACI&Oacute;N
                </strong>
            </h6>
        </div>

        <div class="row gutters">

            <div class="btn-toolbar alert alert-dark col-12 border-0 rounded-0 my-2" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="button" id="update-password" class="btn btn-primary default">Actualizar Contraseña</button>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                <div class="card border-0 rounded-0 bg-dark">
                    <div class="card-body">
                        <form action="<?= base_url('users/update_password');?>" method="post"  class="d-none" id="update_password">
                            <div class="row gutters">
                                <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12"></div> -->

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 group-password">
                                    <div class="form-group" id="group-password1">
                                        <label for="inputPassword3">Contraseña</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input type="password" name="password" id="inputPassword3" class="form-control" placeholder="Contraseña">
                                            <div class="invalid-feedback msg-3 text-left"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 group-password">
                                    <div class="form-group" id="group-password2">
                                        <label for="">Repetir Contraseña</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-lock"></i>
                                            </span>
                
                                            <input type="password" name="password_confirm" class="form-control" 
                                            id="inputPasswordRepeat" placeholder="Repetir Contraseña">
                
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-sm" type="button" id="btn-password">
                                                    <i class="fas fa-eye ico-pass"></i>
                                                </button>
                                            </div>
                                            <div class="invalid-feedback msg-4 text-left"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <a href="<?= base_url('dashboard');?>" class="btn btn-danger">CANCELAR</a>
                                <button type="submit" class="btn btn-warning">ACTUALIZAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

