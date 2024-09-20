<?php

const MINIMO_ROLE_ORIGINAL = 13;
const EDIT_ROLE_ORIGINAL = 2;

define('SECCION', array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'));
define('NUMERO_DE_SECCION',array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24));
define('DIA', array('domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'));
define('MES', array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'));
define('RECURSOS', array('recurso académico', 'recurso físico', 'recurso tecnológico', 'insumo industrial', 'recurso deportivo', 'recurso bibliográfico', 'recurso de laboratorio'));
function price($value)
{
    return number_format($value, 2) . ' $';
}
