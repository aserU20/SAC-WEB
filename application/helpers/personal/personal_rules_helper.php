<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM CREATE PERSONAL ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getPersonalRules()
{
    return array(

        // PARTE 1
        array(
            'field' => 'tipo',
            'label' => 'tipo',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione un %s.',
            ),
        ),
        array(
            'field' => 'turno',
            'label' => 'turno',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione un %s.',
            ),
        ),
        array(
            'field' => 'cargo',
            'label' => 'cargo',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione un %s.',
            ),
        ),
        // PARTE 2
        array(
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'required|trim|alpha',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'alpha' => 'El campo %s es de solo letras.',
            ),
        ),
        array(
            'field' => 'apellido',
            'label' => 'apellido',
            'rules' => 'required|trim|alpha',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'alpha' => 'El campo %s es de solo letras.',
            ),
        ),
        array(
            'field' => 'ci',
            'label' => 'cedula',
            'rules' => 'required|trim|numeric',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'numeric' => 'El campo %s es de solo n&uacute;meros.',
            ),
        ),
        array(
            'field' => 'fecha_n',
            'label' => 'fecha de nacimiento',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Ingrese la %s.',
            ),
        ),
        array(
            'field' => 'edad',
            'label' => 'edad',
            'rules' => 'required|trim|numeric',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'numeric' => 'El campo %s es de solo n&uacute;meros.'
            ),
        ),
        array(
            'field' => 'sexo',
            'label' => 'sexo',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione el %s.',
            ),
        ),
        array(
            'field' => 'correo',
            'label' => 'correo',
            'rules' => 'required|trim|valid_email',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'valid_email' => 'El %s no es valido.'
            ),
        ),
        array(
            'field' => 'telefono',
            'label' => 'telefono',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
            ),
        ),
        array(
            'field' => 'ciudad',
            'label' => 'ciudad',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
            ),
        ),
        array(
            'field' => 'direccion',
            'label' => 'direccion',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
            ),
        ),
    );
}