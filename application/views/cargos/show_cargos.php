<!-- TABLA DE DATOS -->
<div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
    <h6 class="mb-2 text-primary">Todos los cargos</h6>
</div>
<div class="table-responsive alert-dark col-12">
    <br>
    <table class="table table-striped table-sm table-condensed table-hover my-5 dataTable">
        <thead class="thead-dark">
            <tr>
                <th class="small">Codigo</th>
                <th class="small">Cargo</th>
                <th class="small">Categoria</th>
                <th class="text-center small">Editar</th>
                <th class="text-center small">Eliminar</th>

            </tr>
        </thead>
        <tbody id="data">
            <?php if(isset($data) AND !empty($data)): ?>
            <?php foreach($data as $cargo): ?>
            <tr>
                <td class="small"><?= $cargo->codigo; ?></td>
                <td class="small"><?= $cargo->nombre_cargo; ?></td>
                <td class="small"><?= $cargo->categoria; ?></td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-warning btn-edit" id="edit_cargo" data-id="<?= $cargo->id; ?>">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-danger" id="delete_cargo" data-id="<?= $cargo->id; ?>">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table><br>
</div>