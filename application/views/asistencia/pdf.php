<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PDF Created</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/pdf/pdf-asistencia.css');?>">
    </head>
    <body>

        <img src="./assets/img/logo.png" alt="" width="90" height="90" style="position: absolute;  margin-top: -20px; float: left;">
        <img src="./assets/img/zez.png" alt="" width="90" height="90" style="position: absolute; margin-top: -20px; float: right;">

        <h1 class="text-center" style="margin-top: -50px;">
            <?php //echo $title ?>
            REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
            MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN <br>
            ESCUELA BÁSICA NACIONAL “VÍCTOR JULIO GONZÁLEZ"	<br>
            COD. ADM: 006590182	<br>
            SANTA BÁRBARA – MUNICIPIO COLÓN - ESTADO ZULIA.	<br>
            CONTROL DE ASISTENCIA DIARIA.
        </h1>
        <br>
        <br>
       			

        <div style="width: 30%; height: 40px; display: inline-block;">
            <h4> E.B.N. VICTOR JULIO GONZALEZ: </h4>
        </div>
        <div style="width: 40%; height: 40px; display: inline-block;">
            <h4 class="text-center"> RED INTERCIRCUITAL: COLÓN</h4>
        </div>				
        <div style="width: 29%; height: 40px; display: inline-block;">
            <h4 style="text-align: right; text-transform: uppercase;"> MES: <?= $mes . " " . $year;?></h4>
        </div>

        <div class="asistencia">

            <!-- personal -->
            <div class="personal">
                <br><br>
                <!-- HEAD -->
                <div class="bg-dark text-light text-center d-inline-block border-2 t-11" style="width: 30px; height: 30px;">
                    <div style="margin-top: 8px;">N°</div>
                </div>
                <div class="m-1 bg-dark text-light text-center d-inline-block border-2 t-11" style="width: 76px; height: 30px;">
                    <div style="margin-top: 8px;">Cedula</div>
                </div>
                <div class="m-1 bg-dark text-light text-center d-inline-block border-2 t-11" style="width: 73px; height: 30px;">
                    <div style="margin-top: 8px;">Nombre</div>
                </div>
                <div class="m-1 bg-dark text-light text-center d-inline-block border-2 t-11" style="width: 73px; height: 30px;">
                    <div style="margin-top: 8px;">Apellido</div>
                </div>
                <div class="m-1 bg-dark text-light text-center d-inline-block border-2 t-11" style="width: 63px; height: 30px;">
                    <div style="margin-top: 8px;">Cargo</div>
                </div>

                <br>

                <!-- BODY -->
                <?php foreach($data as $i => $item): ?>
                <div class="item-p text-center d-inline-block border t-11 p-1" style="width: 30px; height: 15px;"><?= $i +1; ?></div>
                <div class="m-1 item-p text-center d-inline-block border t-11 p-1" style="width: 76px; height: 15px;"><?= $item->cedula; ?></div>
                <div class="m-1 item-p text-center d-inline-block border t-11 p-1" style="width: 73px; height: 15px;"><?= $item->nombre; ?></div>
                <div class="m-1 item-p text-center d-inline-block border t-11 p-1" style="width: 73px; height: 15px;"><?= $item->apellido; ?></div>
                <div class="m-1 item-p text-center d-inline-block border t-11 p-1" style="width: 62px; height: 15px;"><?= $item->codigo; ?></div>
                <br>
                <?php endforeach; ?>
            </div>

            <!-- asistencia -->
            <div class="list-asistencia">
                <br><br>

                <!-- HEAD -->
                <div class="m-1 bg-dark text-light text-center d-inline-block border t-9" style="width: 100px; height: 30px;">
                    <div style="border-bottom: 1px solid #000; margin-bottom: 3px;"><div style="margin-top: 2px; margin-bottom: 2px;">Lunes: <?php if(isset($fechas)){ echo $fechas['lunes']; }?></div></div> 
                    <div style="width: 45%; height: 10px; padding: 2px; display: inline-block;">Entrada</div>
                    <div style="width: 40%; height: 10px; border-left: 1px solid #000; padding: 2px;  display: inline-block;">Salida</div>
                </div>

                <div class="m-1 bg-dark text-light text-center d-inline-block border t-9" style="width: 100px; height: 30px;">
                    <div style="border-bottom: 1px solid #000; margin-bottom: 3px;"><div style="margin-top: 2px; margin-bottom: 2px;">Martes: <?php if(isset($fechas)){ echo $fechas['martes']; }?></div></div> 
                    <div style="width: 45%; height: 10px; padding: 2px; display: inline-block;">Entrada</div>
                    <div style="width: 40%; height: 10px; border-left: 1px solid #000; padding: 2px;  display: inline-block;">Salida</div>
                </div>

                <div class="m-1 bg-dark text-light text-center d-inline-block border t-9" style="width: 100px; height: 30px;">
                    <div style="border-bottom: 1px solid #000; margin-bottom: 3px;"><div style="margin-top: 2px; margin-bottom: 2px;">Miércoles: <?php if(isset($fechas)){ echo $fechas['miercoles']; }?></div></div> 
                    <div style="width: 45%; height: 10px; padding: 2px; display: inline-block;">Entrada</div>
                    <div style="width: 40%; height: 10px; border-left: 1px solid #000; padding: 2px;  display: inline-block;">Salida</div>
                </div>

                <div class="m-1 bg-dark text-light text-center d-inline-block border t-9" style="width: 100px; height: 30px;">
                    <div style="border-bottom: 1px solid #000; margin-bottom: 3px;"><div style="margin-top: 2px; margin-bottom: 2px;">Jueves: <?php if(isset($fechas)){ echo $fechas['jueves']; }?></div></div> 
                    <div style="width: 45%; height: 10px; padding: 2px; display: inline-block;">Entrada</div>
                    <div style="width: 40%; height: 10px; border-left: 1px solid #000; padding: 2px;  display: inline-block;">Salida</div>
                </div>

                <div class="m-1 bg-dark text-light text-center d-inline-block border t-9" style="width: 100px; height: 30px;">
                    <div style="border-bottom: 1px solid #000; margin-bottom: 3px;"><div style="margin-top: 2px; margin-bottom: 2px;">Viernes: <?php if(isset($fechas)){ echo $fechas['viernes']; }?></div></div> 
                    <div style="width: 45%; height: 10px; padding: 2px; display: inline-block;">Entrada</div>
                    <div style="width: 40%; height: 10px; border-left: 1px solid #000; padding: 2px;  display: inline-block;">Salida</div>
                </div>

                <div class="m-1 bg-dark text-light text-center d-inline-block border t-9" style="width: 127px; height: 30px;">
                    <div style="border-bottom: 1px solid #000; margin-bottom: 3px;"><div style="margin-top: 2px; margin-bottom: 2px;">Observación</div></div> 
                    <div style="width: 21px; height: 10px; padding: 2px; display: inline-block;">L</div>
                    <div style="width: 21px; height: 10px; border-left: 1px solid #000; padding: 2px; margin-left: -2; display: inline-block;">M</div>
                    <div style="width: 21px; height: 10px; border-left: 1px solid #000; padding: 2px; margin-left: -2; display: inline-block;">M</div>
                    <div style="width: 21px; height: 10px; border-left: 1px solid #000; padding: 2px; margin-left: -2; display: inline-block;">J</div>
                    <div style="width: 21px; height: 10px; border-left: 1px solid #000; padding: 2px; margin-left: -2; display: inline-block;">V</div>
                </div>
                <br>

                <!-- BODY -->
                <?php foreach($data as $i =>  $item): ?>
                <div class="m-1 item-p text-center d-inline-block border-2 t-11 p-1" style="width: 100px; height: 15px;">
                    <div style="width: 49%; height: 20px; display: inline-block; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->lu_entrada)):?>
                                <?= $item->lu_entrada; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->lu_entrada):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div style="width: 50%; height: 20px; display: inline-block; border-left: 1px solid #000; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->lu_salida)):?>
                                <?= $item->lu_salida; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->lu_salida):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="m-1 item-p text-center d-inline-block border-2 t-11 p-1" style="width: 100px; height: 15px;">
                    <div style="width: 49%; height: 20px; display: inline-block; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->ma_entrada)):?>
                                <?= $item->ma_entrada; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->ma_entrada):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                    <div style="width: 50%; height: 20px; display: inline-block; border-left: 1px solid #000; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->ma_salida)):?>
                                <?= $item->ma_salida; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->ma_salida):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>

                <div class="m-1 item-p text-center d-inline-block border-2 t-11 p-1" style="width: 100px; height: 15px;">
                    <div style="width: 49%; height: 20px; display: inline-block; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->mi_entrada)):?>
                                <?= $item->mi_entrada; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->mi_entrada):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                    <div style="width: 50%; height: 20px; display: inline-block; border-left: 1px solid #000; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->mi_salida)):?>
                                <?= $item->mi_salida; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->mi_salida):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>

                <div class="m-1 item-p text-center d-inline-block border-2 t-11 p-1" style="width: 100px; height: 15px;">
                    <div style="width: 49%; height: 20px; display: inline-block; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->ju_entrada)):?>
                                <?= $item->ju_entrada; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->ju_entrada):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                    <div style="width: 50%; height: 20px; display: inline-block; border-left: 1px solid #000; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->ju_salida)):?>
                                <?= $item->ju_salida; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->ju_salida):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>

                <div class="m-1 item-p text-center d-inline-block border-2 t-11 p-1" style="width: 100px; height: 15px;">
                    <div style="width: 49%; height: 20px; display: inline-block; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->vi_entrada)):?>
                                <?= $item->vi_entrada; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->vi_entrada):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                    <div style="width: 50%; height: 20px; display: inline-block; border-left: 1px solid #000; font-size: 10px;">
                        <div style="margin-top: 5px;">
                            <?php if(!empty($item->vi_salida)):?>
                                <?= $item->vi_salida; ?>
                                <?php else: ?>
                                    <?php if($actual > $item->vi_salida):?>
                                        <!-- X -->
                                    <?php endif; ?>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>

                <div class="m-1 text-center d-inline-block border-2 t-9" style="width: 127px; height: 20px;">
                    <div style="width: 16px; height: 12px; margin-top: 4px; display: inline-block; padding: 4px; ">
                        <div style="">
                            <?php if(!empty($item->lu_condicion)):?>
                            <?= $item->lu_condicion; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="width: 16px; height: 12px; display: inline-block; padding: 4px; margin-left: -1px;  border-left: 1px solid #000;">
                        <div style="margin-top: 4px;">
                            <?php if(!empty($item->ma_condicion)):?>
                            <?= $item->ma_condicion; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="width: 16px; height: 12px; display: inline-block; padding: 4px; margin-left: -2px;  border-left: 1px solid #000;">
                        <div style="margin-top: 4px;">
                            <?php if(!empty($item->mi_condicion)):?>
                            <?= $item->mi_condicion; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="width: 16px; height: 12px; display: inline-block; padding: 4px; margin-left: -2px;  border-left: 1px solid #000;">
                        <div style="margin-top: 4px;">
                            <?php if(!empty($item->ju_condicion)):?>
                            <?= $item->ju_condicion; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="width: 16px; height: 12px; display: inline-block; padding: 4px; margin-left: -2px;  border-left: 1px solid #000;">
                        <div style="margin-top: 4px;">
                            <?php if(!empty($item->vi_condicion)):?>
                            <?= $item->vi_condicion; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <br>
                <?php endforeach; ?>
            </div>

        </div>

        <br><br>
        <br><br>

        <!-- footer -->
        <!-- <div style="height: 100px; margin-top: 522px; position: absolute;"> -->
        <!-- <?= $this->pagination->create_links();?> -->

            <div style="width: 49%; height: 40px; margin-top: 550px; position: absolute; display: inline-block; float: left;">
                <h4 class="text-center">DIRECTOR (A): <br><br><br><br><br> <hr></h4>
            </div>
            <div  style="width: 49%; height: 40px; margin-top: 550px; position: absolute; display: inline-block; float: right;">
                <h4 class="text-center">SELLO DEL PLANTEL: <br><br><br><br><br> <hr></h4>
            </div>
        <!-- </div> -->
    </body>
</html>