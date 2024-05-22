<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM CREATE PERSONAL ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getRepresentanteRules()
{
    return array(

        // PARTE 3
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
            'field' => 'nombre_r',
            'label' => 'nombre',
            'rules' => 'required|trim|alpha',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'alpha' => 'El campo %s es de solo letras.',
            ),
        ),
        array(
            'field' => 'apellido_r',
            'label' => 'apellido',
            'rules' => 'required|trim|alpha',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'alpha' => 'El campo %s es de solo letras.',
            ),
        ),
        array(
            'field' => 'sexo_r',
            'label' => 'sexo',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione el %s.',
            ),
        ),
        array(
            'field' => 'fecha_n_r',
            'label' => 'fecha de nacimiento',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Ingrese la %s.',
            ),
        ),
        array(
            'field' => 'edad_r',
            'label' => 'edad',
            'rules' => 'required|trim|numeric',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
                'numeric' => 'El campo %s es de solo n&uacute;meros.'
            ),
        ),
        array(
            'field' => 'parentesco',
            'label' => 'parentesco',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione el %s.',
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