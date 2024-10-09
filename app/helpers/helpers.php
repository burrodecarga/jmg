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

function getStringBetween($str)
{
    $from = 'src="';
$to = '"';
    $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
    return substr($sub,0,strpos($sub,$to));
}


function isValidYoutubeURL($url) {

    // Let's check the host first
    $parse = parse_url($url);
    $host = $parse['host'];
    if (!in_array($host, array('youtube.com', 'www.youtube.com'))) {
        return false;
    }

    $ch = curl_init();
    $oembedURL = 'www.youtube.com/oembed?url=' . urlencode($url).'&format=json';
    curl_setopt($ch, CURLOPT_URL, $oembedURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Silent CURL execution
    $output = curl_exec($ch);
    unset($output);

    $info = curl_getinfo($ch);
    curl_close($ch);

    if ($info['http_code'] !== 404)
        return true;
    else
        return false;
}

function isEmbeddableYoutubeURL($url) {

    // Let's check the host first
    $parse = parse_url($url);
    $host = $parse['host'];
    if (!in_array($host, array('youtube.com', 'www.youtube.com'))) {
        return false;
    }

    $ch = curl_init();
    $oembedURL = 'www.youtube.com/oembed?url=' . urlencode($url).'&format=json';
    curl_setopt($ch, CURLOPT_URL, $oembedURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($output);

    if (!$data) return false; // Either 404 or 401 (Unauthorized)
    if (!$data->{'html'}) return false; // Embeddable video MUST have 'html' provided

    return true;
}

// $url = 'http://www.youtube.com/watch?v=QH2-TGUlwu4';
// echo isValidYoutubeURL($url) ? 'Valid, ': 'Not Valid, ';
// echo isEmbeddableYoutubeURL($url) ? 'Embeddable ': 'Not Embeddable ';


