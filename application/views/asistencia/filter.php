<div id="filter-content">
    
    <?php if(isset($view)): ?>
    <?= $view ; ?>
    <?php endif; ?>

</div>

<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-12" style="border-bottom: 1px solid #f4f4f4;">
            <p class="mt-4">SITUACIONES LABORALES (OBSERVACION)</p>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 mt-3" style="border-bottom: 1px solid #f4f4f4;"></div>
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 mt-3" style="border-bottom: 1px solid #f4f4f4;">
            <div class="form-group">
                <input type="search" class="form-control rounded-0 btn-sm" id="search_situaciones" placeholder="Buscar">
            </div>
        </div>
    </div>
    
    <div class="row aqui" style="contain: size; overflow-y: scroll; height: 85px;">
        <?php if(!empty($all)): ?>
        <?php foreach($all as $i => $item): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 item" style="border-bottom: 1px solid #f4f4f4; border-left: 1px solid #f4f4f4; border-right: 1px solid #f4f4f4;">

                <ul class="small p-0" style="list-style: none; font-size: 11px;">
                    <li>
                        <?= "<span>". $item->id . "</span> - " . $item->situacion; ?>
                    </li>
                </ul>

            </div>
        <?php endforeach; ?>
        <?php endif; ?>
        
        <!-- PAGINATE -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
            <?php // $this->pagination->create_links();?>
        </div>

    </div>
    
</div>
                    
