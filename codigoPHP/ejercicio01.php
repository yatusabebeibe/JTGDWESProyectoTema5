<?php

    /** @author Jesús Temprano Gallego
     *  @since 18/11/2025
     */
    
    $aUsuarios = [
        "jesus" => [hash('sha256', 'paso'), "Jesús Temprano Gallego"],
        "heraclio" => [hash('sha256', 'paso'), "Héraclio Borbujo"]
    ];

    // comprobamos que el usuario y la contraseña tienen algo
    if(!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])){
        header('WWW-Authenticate: Basic realm="No autorizado"');
        header('HTTP/1.0 401 Unauthorized');
        exit; // si no termina aqui el programa
    }
    
    // si lo tiene, le asignamos el valor  las variables $usuario y $contraseña
    $usuario=$_SERVER['PHP_AUTH_USER'];
    $contraseña=$_SERVER['PHP_AUTH_PW'];
    
    //comprobamos si el usuario introducido existe en el array de usuarios y comparamos la contraseña cifrada con la contraseña introducida cifrada. 
    if(!array_key_exists($usuario, $aUsuarios) || $aUsuarios[$usuario][0] !== hash('sha256',$contraseña)){
        header('WWW-Authenticate: Basic realm="No autorizado"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario o contraseña incorrecto";
        exit;// si el usuario no existe o la contraseña es incorrecta termina aqui
    }
    echo "¡Bienvenido, $usuario! Has iniciado sesión correctamente.";
    
?>
