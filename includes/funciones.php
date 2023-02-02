<?php

function generarClaveAleatoria() {
    $clave = array();
    while (count($clave) < 4) { 
        $rdo = rand(0, 9);
        if (!in_array($rdo, $clave)) {
            array_push($clave, $rdo);
        }
    }
    return $clave;
}

function mostrarClave() {
    for ($i=0; $i < count($_SESSION['clave']) ; $i++) {
        if ($i == 3) {
            echo $_SESSION['clave'][$i];
        } else {
            echo $_SESSION['clave'][$i];
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
    }
}

?>