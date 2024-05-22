<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM LOGIN ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getUserRules()
{
    return array(
        array(
            'field' => 'rango',
            'label' => 'Rango',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Seleccione el %s.',
            ),
        ),
        array(
            'field' => 'cedula',
            'label' => 'Cedula',
            'rules' => 'required|trim|numeric',
            'errors' => array(
                'required' => 'Ingrese la %s.',
                'numeric' => 'El campo %s es de solo n&uacute;meros'
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Contrase&ntilde;a',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingrese una %s.',
            ),
        ),
        array(
            'field' => 'password_confirm',
            'label' => 'Contrase&ntilde;a',
            'rules' => 'required|trim|matches[password]',
            'errors' => array(
                'required' => 'Debe repetir la %s.',
                'matches' => 'Contrase&ntilde;a no coincide!'
            ),
        )
    );
}
function getUpdatePasswordRules()
{
    return array(
      
        array(
            'field' => 'password',
            'label' => 'Contrase&ntilde;a',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Ingrese una %s.',
            ),
        ),
        array(
            'field' => 'password_confirm',
            'label' => 'Contrase&ntilde;a',
            'rules' => 'required|trim|matches[password]',
            'errors' => array(
                'required' => 'Debe repetir la %s.',
                'matches' => 'Contrase&ntilde;a no coincide!'
            ),
        )
    );
}
