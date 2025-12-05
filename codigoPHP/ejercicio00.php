<?php

    /*  @author Jesús Temprano Gallego
     *  @since 17/11/2025
     */

    $variablesSuperglobales = [
        '_SESSION' => $_SESSION ?? [], // Lo crea si no esta creado
        '_COOKIE' => $_COOKIE,
        '_SERVER' => $_SERVER,
        '_GET' => $_GET,
        '_POST' => $_POST,
        '_FILES' => $_FILES,
        '_REQUEST' => $_REQUEST,
        '_ENV' => $_ENV
    ];

    foreach ($variablesSuperglobales as $nombresVariables=>$variables) {
        echo "<div class='center $nombresVariables'>";
        echo "<h2>" . $nombresVariables . "</h2>";
        echo "<table><tr>";
        foreach ($variables as $valor => $datos) {
            echo '<tr><td class="e">'.$valor.'</td><td class="v">'.$datos.'</td></tr>';
        }
        echo "</tr></table>";
        echo "</div>";
    }
    
    echo "<div>".phpinfo()."</div>";
    
?>