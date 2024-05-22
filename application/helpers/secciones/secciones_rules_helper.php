<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM CARGOS ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getSeccionesRules()
{
    return array(
        array(
            'field' => 'grado',
            'label' => 'grado',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione un %s',
            ),
        ),
        array(
            'field' => 'turno',
            'label' => 'turno',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione un %s',
            ),
        ),
        array(
            'field' => 'seccion',
            'label' => 'letra',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione una %s.',
            ),
        ),
        array(
            'field' => 'capacidad',
            'label' => 'capacidad',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s requerida.',
            ),
        )
    );
}