                <footer class="footer">
                    <!-- FOOTER -->
                    <div class="col-lg-10 col-sm-10 col-md-10 my-3">
                        <div class="row">
                            <div class="mx-auto small">
                                <p class="text-muted text-center">
                                    <i class="fa fa-copyright"></i> 
                                    Copyright (2022) Software Desarrollado por el Programa Nacional
                                    de Formación en Informática 
                                    <a href="https://google.com/PNFI">PNFI</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END FOOTER -->

                    <!-- LIBS JS -->
                    <script src="<?php echo base_url("/")?>assets/vendor/jquery/jquery.min.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/font-awesome/fontawesome.min.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/sweetalert/sweetalert.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/sweetalert2/sweetalert2.min.js"></script>



                    <!-- DATATABLES -->
                    <script src="<?php echo base_url('/'); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/vendor/select/js/bootstrap-select.js"></script>
                    <script src="<?=base_url('/assets/vendor/');?>datatables_plugin/dataTables.buttons.min.js"></script>
                    <script src="<?=base_url('/assets/vendor/');?>datatables_plugin/buttons.html5.min.js"></script>
                    <script src="<?=base_url('/assets/vendor/');?>datatables_plugin/buttons.colVis.min.js"></script>
                    <script src="<?=base_url('/assets/vendor/');?>datatables_plugin/jszip.min.js"></script>
                    <script src="<?=base_url('/assets/vendor/');?>datatables_plugin/pdfmake.min.js"></script>
                    <script src="<?=base_url('/assets/vendor/');?>datatables_plugin/vfs_fonts.js"></script>
                    
                    <!-- CUSTOM -->
                    <script src="<?php echo base_url('/'); ?>assets/js/menu.js"></script>
                    <script src="<?php echo base_url('/'); ?>assets/js/custom.js"></script>

                    <!-- LOGIN -->
                    <script src="<?php echo base_url("/")?>assets/js/auth/login.js"></script>
                    
                    <!-- RESOURCES -->
                    <?php if(isset($js_one)):?>
                    <script src="<?= $js_one;?>" id="js_one"></script>  
                    <?php endif;?>

                    <?php if(isset($js_two)):?>
                    <script src="<?= $js_two;?>" id="js_two"></script>  
                    <?php endif;?>
                </footer>
            </div>  
        </div>  
    </div>  
</body>
</html>