<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PDF Created</title>
        <style type="text/css">
            body {
                background-color: #fff;
                margin: <?php echo $margin; ?>;
                font-family: Lucida Grande, Verdana, Sans-serif;
                font-size: 14px;
                color: #4F5155;
            }
            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }
            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 16px;
                font-weight: bold;
                margin: 24px 0 2px 0;
                padding: 5px 0 6px 0;
            }
            code {
                font-family: Monaco, Verdana, Sans-serif;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

        </style>
    </head>
    <body style="background-image: url(./assets/img/logo2.png); background-repeat: no-repeat; background-position: center;">
    <!-- <body> -->
        <h1><?php echo $title ?></h1>
        <br>        
        <div style="width: 100%; height: 200px; background: #f4f4f46e;">
            <div style="width: 45%; height: 100px;  float: left;">
                <p style="border-bottom: 6px solid #79a630; font-size: 1.2rem; color: #000;">DOCENTE ASIGNADO </p>

                <?php if(!empty($docente)): ?>
                <span style="text-transform: uppercase;"><?= $docente->nombre . " " . $docente->apellido; ?></span> <br><br>
                <div style="width: 50%; height: 40px; display: inline-block; color: #000; background: #fff;">C.I: <br> <?= $docente->cedula; ?></div>
                <div style="width: 50%; height: 40px; display: inline-block; color: #000; background: #fff;">Tip. Personal: <br> <?= $docente->tipo; ?></div> <br><br>
                <div style="width: 50%; height: 40px; display: inline-block; color: #000; background: #fff;">Cod. Cargo: <br> <?= $docente->codigo; ?></div>
                <div style="width: 50%; height: 40px; display: inline-block; color: #000; background: #fff;">Nombre del cargo: <br> <?= $docente->nombre_cargo; ?></div> 
                <?php else: ?>
                    SIN ASIGNAR
                <?php endif; ?>
            </div>

            <div style="width: 49%; height: 100px; float: right;">
                <p style="border-bottom: 6px solid #79a630; font-size: 1.2rem; color: #000;">RESUMEN DE SECCIÓN </p>

                <div style="width: 50%; height: 40px; display: inline-block; color: #000; background: #fff;">Id. Sección: <br> "<?= $seccion->seccion; ?>"</div>
                <div style="width: 50%; height: 40px; display: inline-block; color: #000; background: #fff;">Turno: <br> <?= $seccion->turno; ?></div> 
                <div style="width: 100%; height: 40px; color: #000; background: #fff;">Grado: <br> 
                    <?php if($seccion->grado == "primero"): ?>
                        Primer (1er)  grado
                    <?php else: ?>
                    <?php if($seccion->grado == "segundo"): ?>
                        Segundo (2do)  grado
                    <?php else: ?>
                    <?php if($seccion->grado == "tercero"): ?>
                        Tercer (3er)  grado
                    <?php else: ?>
                    <?php if($seccion->grado == "cuarto"): ?>
                        Cuarto (4to)  grado
                    <?php else: ?>
                    <?php if($seccion->grado == "quinto"): ?>
                        Quinto (5to)  grado
                    <?php else: ?>
                    <?php if($seccion->grado == "sexto"): ?>
                        Sexto (6to)  grado
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
               
                <div style="margin-top: 5px; margin-bottom: 3px;">Matricula</div> 
                <div style="width: 30%; height: 30px; float: left; color: #000; background: #fff;">Varones: <?php if($varones != false){ echo count($varones);}?></div>
                <div style="width: 30%; height: 30px; margin: auto; display: inline-block; color: #000; background: #fff;">Hembras: <?php if($hembras != false){ echo count($hembras);}?></div> 
                <div style="width: 30%; height: 30px; float: right; color: #000; background: #fff;">Total: <?php if($total != false){ echo count($total);}?></div>
            
            </div>
            
        </div>
        <br>
        <div style="width: 100%; height: 450px;">
            <p style="border-bottom: 6px solid #79a630; font-size: 1.2rem; color: #000;">LISTADO DE ESTUDIANTES </p>
 
            <?php if(!empty($total)): ?>
            <table border="" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="padding: 5px; border: none; background: rgba(0, 0, 0, 0.507); color: #fff; font-weight: lighter;">N°</th>
                        <th style="padding: 5px; border: none; background: rgba(0, 0, 0, 0.507); color: #fff; font-weight: lighter;">Codigo</th>
                        <th style="padding: 5px; border: none; background: rgba(0, 0, 0, 0.507); color: #fff; font-weight: lighter;">Nombre</th>
                        <th style="padding: 5px; border: none; background: rgba(0, 0, 0, 0.507); color: #fff; font-weight: lighter;">Apellido</th>
                        <th style="padding: 5px; border: none; background: rgba(0, 0, 0, 0.507); color: #fff; font-weight: lighter;">Edad</th>
                        <th style="padding: 5px; border: none; background: rgba(0, 0, 0, 0.507); color: #fff; font-weight: lighter;">Sexo</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($total as $i => $item): ?>
                    <tr>
                        <td style="border-bottom: 1px solid grey; background: #f4f4f4ab;"><?= $i +1; ?></td>
                        <td style="border-bottom: 1px solid grey; background: #f4f4f4ab;"><?= $item->codigo_student;?></td>
                        <td style="border-bottom: 1px solid grey; background: #f4f4f4ab;"><?= $item->nombres_student;?></td>
                        <td style="border-bottom: 1px solid grey; background: #f4f4f4ab;"><?= $item->apellidos_student;?></td>
                        <td style="border-bottom: 1px solid grey; background: #f4f4f4ab;"><?= $item->edad_student;?></td>
                        <td style="border-bottom: 1px solid grey; background: #f4f4f4ab;"><?= $item->sexo_student;?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
            
        </div>

    </body>
</html>