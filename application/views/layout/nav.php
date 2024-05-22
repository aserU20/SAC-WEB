<!-- MENU DE NAVEGACION -->
<nav class="barra-navegacion">
    <ul class="menu w-100">
        <!-- <li><a href="#">Personal</a></li> -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Personal
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url("/");?>personal/create">Nuevo</a>
                <a class="dropdown-item" href="<?php echo base_url("/");?>personal/show">Consultar</a>
                <?php if ($this->session->userdata('rango') == 'Admin'):?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url("cargos");?>">Cargos</a>
                <?php endif; ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Estudiantes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url("alumnos/create");?>">Nuevo</a>
                <a class="dropdown-item" href="<?= base_url("alumnos");?>">Consultar</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url("representantes");?>">Representantes</a>
            </div>
        </li>
        <li><a href="<?= base_url('secciones');?>">Secciones</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Asistencia
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url("dashboard");?>">Asistencia personal</a>
                <a class="dropdown-item" href="<?= base_url("asistencia");?>">Listado de asistencia</a>
                <a class="dropdown-item" href="<?= base_url("asistencia/consult");?>">Consultar asistencia</a>
                <?php if ($this->session->userdata('rango') == 'Admin'):?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url("asistencia/justificar");?>">Justificar</a>
                    <a class="dropdown-item" href="<?= base_url("asistencia/situacion_laboral");?>">Situaciones laborales</a>
                <?php endif; ?>
            </div>
        </li>
        <?php if ($this->session->userdata('rango') == 'Admin'):?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url("users/create");?>">Nuevo</a>
                    <a class="dropdown-item" href="<?php echo base_url("/");?>users">Consultar</a>
                </div>
            </li>
        <?php endif;?>
        <li class="nav-item dropdown float-right">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $this->session->userdata('nombre') . " " . $this->session->userdata('apellido') ;?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url('users/configuration');?>"><i class="fa fa-cog f-sm"></i> Configuraci&oacute;n</a>
                <a class="dropdown-item close_session" href="#"><i class="fa fa-sign-out-alt f-sm"></i> Cerrar sesi&oacute;n</a>
            </div>
        </li>
    </ul>
</nav> <!--end menu-->
</header>
