<div class="bg-dark mx-auto">
    <!-- TITLE -->
    <br>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
        <h4 class="mb-2 text-success text-center">
          <strong>
            LISTADO - USUARIOS
          </strong>
        </h4>
      </div>
    <div class="col-lg-12 col-md-12 col-sm-12 mx-auto alert-dark">
        <br>
        <!-- TABLAS DE DATOS -->
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover my-5 dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th class="small">Id</th>
                        <th class="small">CI</th>
                        <th class="small">Nombre</th>
                        <th class="small">Apellido</th>
                        <th class="small">Rango</th>
                        <th class="text-center small">Status</th>
                        <th class="text-center small">Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_users as $user): ?>
                    <tr>
                        <td class="small"><?= $user->id; ?></td>
                        <td class="small"><?= $user->cedula;?></td>
                        <td class="small"><?= $user->nombre;?></td>
                        <td class="small"><?= $user->apellido;?></td>
                        <td class="small"><?= $user->range; ?></td>
                        <td class="text-center small">
                            <?php if($user->status == "1"): ?>
                            <button type="button" class="btn btn-sm btn-success" id="change_status_user" data-id="<?= $user->id; ?>" value="<?= $user->status; ?>">
                                <i class="fa fa-user-check"></i>
                            </button>
                            <?php else: ?>
                            <button type="button" class="btn btn-sm btn-secondary" id="change_status_user" data-id="<?= $user->id; ?>" value="<?= $user->status; ?>">
                                <i class="fa fa-user-times"></i>
                            </button>
                            <?php endif; ?>
                        </td>
                        <td class="text-center small">
                            <button type="button" class="btn btn-sm btn-danger" id="delete_user" data-id="<?= $user->id; ?>">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><br>
        </div>
    </div><br>
</div>

