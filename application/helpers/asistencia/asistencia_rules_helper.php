<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM CONFIRM ASISTENCIA ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getAsistenciaRules()
{
    return array(
        array(
            'field' => 'ci',
            'label' => 'Cedula',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingresar %s.',
            ),
        ),
    );
}

function getJustifyAsistenciaRules()
{
    return array(
        array(
            'field' => 'dia',
            'label' => 'dia',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Selecione el %s.',
            ),
        ),
        array(
            'field' => 'fecha',
            'label' => 'fecha',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingresar %s ha justificar.',
            ),
        ),
        array(
            'field' => 'condicion',
            'label' => 'situaci&oacute;n laboral',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Seleccione la %s.',
            ),
        ),
        array(
            'field' => 'ci',
            'label' => 'Cedula',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingresar %s.',
            ),
        ),
    );
}