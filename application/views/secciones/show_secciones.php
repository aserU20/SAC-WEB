<!-- TABLA DE DATOS -->
<div class="table-responsive alert-dark col-12">
    <br>
    <table class="table table-striped table-sm table-condensed table-hover my-5 dataTable">
        <thead class="thead-dark">
            <tr>
                <th class="small">N°</th>
                <th class="small">Grado</th>
                <th class="small">Secci&oacute;n</th>
                <th class="small">Turno</th>
                <th class="text-center small">PDF</th>
                <th class="text-center small">Ver</th>
                <?php if ($this->session->userdata('rango') == 'Admin'):?>
                <th class="text-center small">Eliminar</th>
                <?php endif; ?>

            </tr>
        </thead>
        <tbody id="data">
            <?php if(isset($secciones) AND !empty($secciones)): ?>
            <?php foreach($secciones as $i => $item): ?>
            <tr>
                <td class="small"><?= $item->id; ?></td>
                <td class="small"><?= $item->grado; ?></td>
                <td class="small"><?= $item->seccion; ?></td>
                <td class="small"><?= $item->turno; ?></td>
                <td class="text-center small">
                    <a href="<?= base_url('secciones/reporte_pdf/'.$item->id); ?>" class="btn btn-sm btn-danger">
                        <i class="fa fa-file-pdf "></i>
                    </a>
                </td>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-dark btn-edit" id="edit_seccion" value="<?= $item->id; ?>">
                        <i class="fa fa-eye"></i>
                    </button>
                </td>
                <?php if ($this->session->userdata('rango') == 'Admin'):?>
                <td class="text-center small">
                    <button type="button" class="btn btn-sm btn-danger" id="delete_seccion" value="<?= $item->id; ?>">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table><br>
</div>