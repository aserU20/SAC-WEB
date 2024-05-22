<div class="row">

    <!-- TABLE -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert-secondary">
        <div class="table-resposive mt-3">
            <table class="table table-hover table-striped dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th class="small">nombre</th>
                        <th class="small text-center">Ver</th>
                        <th class="small text-center">Quitar</th>
                        <th class="small text-center">Asignar </th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(!empty($all_alumnos)): ?>
                    <?php foreach($all_alumnos as $item): ?>
                    <?php if($item->seccion_id == $id_seccion OR $item->seccion_id == 0): ?>
                    <tr>
                        <td class="small"><?= $item->nombres_student . " " . $item->apellidos_student; ?></td>
                        <td class="small text-center">
                            <button type="button" class="btn btn-sm btn-dark" id="ver" value="<?= $item->codigo_student; ?>" data-toggle="modal" data-target="#AlumnosDetalles" data-dismiss="modal">
                                <i class="fa fa-eye"></i>
                            </button>

                        </td>
                        <td class="small text-center">
                            <button type="button" class="btn btn-sm btn-danger" <?php if($item->seccion_id == 0){ echo "disabled= 'false'";}?> id="btn-asignados" value="<?= $item->id; ?>">
                                <i class="fa fa-arrow-left"></i>
                            </button> 
                        </td>

                        <td class="small text-center">
                            <button type="button" class="btn btn-sm btn-success" <?php if($item->seccion_id != 0){ echo "disabled= 'true'";}?> id="btn-sin-asignar" value="<?= $item->id; ?>">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


<!-- DETALLES ALUMNO MODAL-->
<div class="modal fade" id="AlumnosDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog container-fluid" role="document">
        <div class="modal-content alert-secondary">
            <div class="modal-header border-0">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Detalles de alumno</h5>
                <button class="close text-dark" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="content-details">
                    <!-- DATOS LLEGAN POR AJAX -->
            </div>
        </div>
    </div>
</div>