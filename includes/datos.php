<?php
session_start();
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$num4 = $_POST['num4'];
if ($num1 == "" || $num2 == "" || $num3 == "" || $num4 == "") {
    exit;
}
$_SESSION['jugada'] = array($num1, $num2, $num3, $num4);
$_SESSION['aciertoNumero'] = 0;
$_SESSION['aciertoPosicion'] = 0;
if(!is_null($num1) && !is_null($num2) && !is_null($num3) && !is_null($num4)) {
    for ($i=0; $i < 4; $i++) {
        if ($_SESSION['jugada'][$i] == $_SESSION['clave'][$i]) {
            $_SESSION['aciertoPosicion']++;
        }
        if(in_array($_SESSION['jugada'][$i], $_SESSION['clave']) && $_SESSION['jugada'][$i] != $_SESSION['clave'][$i]) {
            $_SESSION['aciertoNumero']++;
        }
    }
}
echo "<table>";
echo "<tr><td colspan='4'>Jugada " . $_SESSION['numJugada'] . "</td><td>Acierto</td><td>Coincidencia</td></tr>";
echo "<tr><td colspan='4'>$num1 - $num2 - $num3 - $num4</td><td class='pos'>" . $_SESSION['aciertoPosicion'] . "</td><td>" . $_SESSION['aciertoNumero'] . "</td></tr>";
$_SESSION['numJugada']++;
?>