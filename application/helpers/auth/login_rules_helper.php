<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM LOGIN ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getLoginRules()
{
    return array(
        array(
            'field' => 'username',
            'label' => 'Cedula',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingrese su %s.',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingrese una %s.',
            ),
        )
    );
}