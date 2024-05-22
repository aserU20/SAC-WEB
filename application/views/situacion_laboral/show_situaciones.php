<!-- TABLA DE DATOS -->
<div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
    <h6 class="mb-2 text-primary">Todas las situaciones</h6>
</div>
<div class="table-responsive alert-dark col-12">
    <br>
    <table class="table table-striped table-sm table-condensed table-hover my-5 dataTable">
        <thead class="thead-dark">
            <tr>
                <th class="small">n- </th>
                <th class="small">Descripci&oacute;n</th>
                <th class="text-center small">Editar</th>
                <th class="text-center small">Eliminar</th>

            </tr>
        </thead>
        <tbody id="data">
            <?php if(isset($all)): ?>
            <?php foreach($all as $item): ?>
            <tr>
                <td class="small"><b><?= $item->id; ?></b></td>
                <td class="small"><?= $item->situacion; ?></td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-warning btn-edit" id="edit_situacion" data-id="<?= $item->id; ?>">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-danger" id="delete_situacion" data-id="<?= $item->id; ?>">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table><br>
</div>