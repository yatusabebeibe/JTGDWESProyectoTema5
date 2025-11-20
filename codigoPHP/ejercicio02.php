<?php

    /** @author Jesús Temprano Gallego
     *  @since 18/11/2025
     */

    require_once("../config/confDBPDO.php");

    $encontrado = false;

    // comprobamos que el usuario y la contraseña tienen algo
    if(!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])){
        header('WWW-Authenticate: Basic realm="No autorizado"');
        header('HTTP/1.0 401 Unauthorized');
        exit; // si no termina aqui el programa
    }
    
    // si lo tiene, le asignamos el valor  las variables $usuario y $contraseña
    $usuario=$_SERVER['PHP_AUTH_USER'];
    $contraseña=$_SERVER['PHP_AUTH_PW'];
    $sNombreUsuario = "";

    try {
        $miDB = new PDO(DSN, DBUser, DBPass);

        $query = <<<EOF
        SELECT T01_DescUsuario FROM T01_Usuario
        WHERE
            T01_CodUsuario = :usuario
            AND
            T01_Password = SHA2(:contrasenia, 256);
        EOF;

        $consulta = $miDB->prepare($query);

        $parametros = [
            ":usuario" => $usuario ?? "",
            ":contrasenia" => $usuario.$contraseña ?? ""
        ];

        $consulta->execute($parametros);

        if ($consulta->rowCount() >= 1) {
            $encontrado = true;
            $fila = $consulta->fetch(PDO::FETCH_NUM);
            $sNombreUsuario = $fila[0];
        }

    } catch (PDOException $error) {
        unset($miDB);
        echo '<h3 class="error">ERROR SQL:</h3>';
        echo '<p class="error"><strong>Mensaje:</strong> '.$error->getMessage()."</p>";
        echo '<p class="error"><strong>Codigo:</strong> '.$error->getCode()."</p>";
    }
    
    //comprobamos si el usuario introducido existe en el array de usuarios y comparamos la contraseña cifrada con la contraseña introducida cifrada. 
    if(!$encontrado){
        echo "Usuario o contraseña incorrecto";
        header('WWW-Authenticate: Basic realm="Usuario incorrecto o no autorizado"');
        header('HTTP/1.0 401 Unauthorized');
        exit;// si el usuario no existe o la contraseña es incorrecta termina aqui
    }

    echo "¡Bienvenido $sNombreUsuario! Has iniciado sesión correctamente.";
    
?>
