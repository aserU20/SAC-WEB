<?php 
/*
*---------------------------------------------------------------
* VALIDATION FORM CREATE PERSONAL ¡USANDO LIBERIA "FORM_VALIDATION"!
*---------------------------------------------------------------
*/
function getAlumnoRules()
{
    return array(

        // PARTE 1
        array(
            'field' => 'grado',
            'label' => 'grado',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione un %s.',
            ),
        ),
        array(
            'field' => 'seccion',
            'label' => 'seccion',
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
                'required' => 'El campo %s esta vacio.',
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
            'field' => 'sexo_student',
            'label' => 'sexo',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Seleccione el %s.',
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
            'field' => 'codigo',
            'label' => 'código',
            'rules' => 'required',
            'errors' => array(
                'required' => 'El campo %s esta vacio.',
            ),
        ),
    );
}