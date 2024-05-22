<!-- FORM UPDATE CARGOS -->
<form action="<?=base_url("cargos/update_cargo");?>" method="post" id="form_update">
    <input type="hidden" name="id_cargo" value="<?= set_value('id_cargo', isset($data['id']) ? $data['id'] : '') ?>">
    <!-- PARTE 1 -->
    <div class="row gutters">
        <div class="mt-1 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="text-primary">Actualizar cargo</h6>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="">Categor&iacute;a</label>
                <select name="categoria" id="categoria_id" title="Categoria" class="form-control">
                    <option value="" class="oculto">Categoria</option>
                    <option <?php if($data['categoria'] == 'Docente'){echo 'selected ';}?> value="Docente">Docente</option>
                    <option <?php if($data['categoria'] == 'Administrativo'){echo 'selected ';}?> value="Administrativo">Administrativo</option>
                    <option <?php if($data['categoria'] == 'Obrero'){echo 'selected ';}?> value="Obrero">Obrero</option>
                </select>
                <div class="invalid-feedback msg-3 text-left"></div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="">Cargo</label>
                <input type="text" name="cargo" id="cargo_id" class="custom-input form-control text-light rounded-0" placeholder="Ej. DOCENTE" value="<?= set_value('cargo', isset($data['nombre_cargo']) ? $data['nombre_cargo'] : '') ?>">
                <div class="invalid-feedback msg-1 text-left"></div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="form-group">
                <label for="">C&oacute;digo</label>
                <input type="text" name="codigo" id="codigo_id" class="custom-input form-control text-light rounded-0" placeholder="Ej. 1A34B6" value="<?= set_value('codigo', isset($data['codigo']) ? $data['codigo'] : '') ?>">
                <div class="invalid-feedback msg-2 text-left"></div>
            </div>
        </div>
    </div>

    <div id="loading2" class="d-inline-block position-absolute"></div>

    <div class="text-right" id="group-btn">
        <a href="<?= base_url('dashboard')?>" class="btn btn-danger">CANCELAR</a>
        <button type="submit" id="submit" class="btn btn-warning">ACTUALIZAR</button>
    </div>
</form>

      