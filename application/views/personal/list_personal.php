<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <h4 class="mb-2 text-success text-center">
        <strong>
            LISTADO - PERSONAL
        </strong>
    </h4>
</div>

<div class="table-responsive alert-secondary p-2">
    <table class="table table-striped table-condensed table-hover my-5 dataTable">
        <thead class="thead-dark">
            <tr>
                <th class="small">CI</th>
                <th class="small">Tipo:</th>
                <th class="small">Turno:</th>
                <th class="small">Cargo</th>
                <th class="small">Nombre</th>
                <th class="small">Apellido</th>
                <th class="small">Sexo</th>
                <th class="text-center small">Ver</th>
                <th class="text-center small">Editar</th>
                <?php if($this->session->userdata('rango') == "Admin"):?>
                <th class="text-center small">Eliminar</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $item): ?>
            <tr>
                <td class="small"><?= $item->cedula; ?></td>
                <td class="small"><?= $item->tipo; ?></td>
                <td class="small"><?= $item->turno; ?></td>
                <td class="small"><?= $item->nombre_cargo; ?></td>
                <td class="small"><?= $item->nombre;?></td>
                <td class="small"><?= $item->apellido; ?></td>
                <td class="small"><?= $item->sexo_personal; ?></td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-dark" id="show_registro" data-id="<?= $item->cedula; ?>" data-toggle="modal" data-target="#PersonalDetalles" data-dismiss="modal">
                        <i class="fa fa-eye"></i>
                    </button>
                </td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-warning" id="edit_registro" data-id="<?= $item->cedula; ?>">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
                <?php if($this->session->userdata('rango') == "Admin"):?>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-danger" id="delete_registro" data-id="<?= $item->cedula; ?>">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
                <?php endif; ?>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- DETALLES PERSONAL MODAL-->
<div class="modal fade" id="PersonalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog container-fluid" role="document">
        <div class="modal-content alert-secondary">
            <div class="modal-header border-0">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Detalles de empleado</h5>
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