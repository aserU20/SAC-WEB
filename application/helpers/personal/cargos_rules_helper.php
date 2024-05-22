<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM CARGOS ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getCargosRules()
{
    return array(
        array(
            'field' => 'cargo',
            'label' => 'cargo',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
            ),
        ),
        array(
            'field' => 'codigo',
            'label' => 'codigo',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
            ),
        ),
        array(
            'field' => 'categoria',
            'label' => 'categoria',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione una %s.',
            ),
        )
    );
}