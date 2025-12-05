<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Jesús Temprano Gallego</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: #4e9645;
            color: white;
            padding: 15px;
            text-align: center;
        }
        h1, h3, p {
            margin: 0;
        }
        main {
            max-width: 1250px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            margin-top: 0px;
            & tr > td:nth-child(n+3) {
                a {display: block; margin-top: 10px; margin-bottom: 10px;}
                a:first-child {margin-top: 0px;}
                a:last-child {margin-bottom: 0px;}
            }
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-radius: 8px;
            transition: 0.3s;
        }
        th {
            background-color: #4e9645;
            color: white;
        }
        td {
            background: #ecf0f1;
        }
        tr:hover td {
            background: #d6f8d6;
        }
        ul {
            margin: 0;
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
        }
        li {
            background: #ecf0f1;
            margin: 10px 0;
            padding: 0px;
            border-left: 5px solid #34db34;
            transition: 0.3s;
            border-radius: 8px;
            & a {
                display: block;
                margin: 0;
                width: 100%;
                height: 100%;
                padding: 15px;
            }
        }
        li:hover {
            background: #d6f8d6;
            border-left: 5px solid #70bc1a;
            transform: scale(1.03);
        }
        a {
            text-decoration: none;
            color: #0077cc;
        }
        a:hover {
            color: #005fa3;
        }
        footer {
            padding-top: 25px;
            margin: auto;
            background-color: #459650;
            text-align: center;
            height: 150px;
            color: white;
            
            a {
                text-decoration: aquamarine wavy underline;
                color: aquamarine;
                transition: 0.3s;
            }
            a:hover {
                color: blue;
                mix-blend-mode: multiply;
                text-decoration: none;
            }
        }
        tr > td > a {line-height: 14px;}
        table > * > tr > *  {text-align: center;}
        table > * > tr > *:nth-child(2)  {text-align: left;}

        form {
            text-align: center;
            margin-bottom: 5px;
            & > table.sql {
                margin: 0 auto;
                max-width: 500px;

                & tr > * {text-align: center;}
                & a {display: block;}
                & input[type="submit"] {
                    background: none;
                    border: none;

                    display: block;
                    text-align: center;
                    width: 100%;

                    cursor: pointer;
                    
                    font-size: 16px;
                    line-height: 14px;
                    text-decoration: none;
                    font-family: Arial, sans-serif;
                    color: #0077cc;
                }
                & input[type="submit"]:hover {
                    color: #005fa3;
                }
            }
            & > table.sql:nth-of-type(1) {
                border-collapse: separate;
                border-spacing: 0 1px;
            }
        }
    </style>
</head>
<body>
    <!-- 😼 -->
    <header>
        <h1>CFGS - Desarrollo de Aplicaciones Web</h1>
        <h3>Jesús Temprano Gallego</h3>
        <p>Curso 2025/2026 - Grupo DAW2</p>
    </header>
    <!-- 😼 -->
    <main>
        <form action="." method="get">
            <table class="sql">
                <thead>
                    <tr>
                        <th colspan="2">Ver código</th>
                        <th rowspan="2" colspan="2">Ejecutar SQL<br>Desarrollo</th>
                    </tr>
                    <tr>
                        <th>Desarrollo</th>
                        <th>Explotacion</th>
                    </tr>
                </thead>
            </table>
            <table class="sql">
                <tbody>
                    <tr>
                        <td colspan="2"><a target="_self" href="./mostrarcodigo/muestraConfDBPDO.php">Configuracion</a></td>
                        <td colspan="2"><a target="_self" href="#"></a></td>
                    </tr>
                    <tr>
                        <td><a target="_self" href="./mostrarcodigo/borrarDB.php">Borrado</a></td>
                        <td><a target="_self" href="./mostrarcodigo/borrarDBExplotacion.php">Borrado</a></td>
                        <td><input type="submit" value="Ejecutar" name="borrar"></td>
                        <td rowspan="3"><input type="submit" value="Todos" name="todos"></td>
                    </tr>
                    <tr>
                        <td><a target="_self" href="./mostrarcodigo/crearDB.php">Creacion</a></td>
                        <td><a target="_self" href="./mostrarcodigo/crearDBExplotacion.php">Creacion</a></td>
                        <td><input type="submit" value="Ejecutar" name="crear"></td>
                    </tr>
                    <tr>
                        <td><a target="_self" href="./mostrarcodigo/cargaInicialDB.php">Carga Inicial</a></td>
                        <td><a target="_self" href="./mostrarcodigo/cargaInicialDBExplotacion.php">Carga Inicial</a></td>
                        <td><input type="submit" value="Ejecutar" name="cargar"></td>
                    </tr>
                </tbody>
            </table>
            <?php
            echo "&#8203";
            
            // Solo ejecutamos si se ha enviado algo por GET o POST
            if (!empty($_REQUEST)) {
                // Comprobar si estamos en la URL de explotación
                if ($_SERVER['HTTP_HOST'] === 'jesustemgal.ieslossauces.es') {
                    echo "No se puede ejecutar desde explotación.";
                } else {
                    if (isset($_REQUEST["borrar"])) {
                        include_once("./codigoPHP/BorraDBJTGDWESProyectoTema5.php");
                    }
                    if (isset($_REQUEST["crear"])) {
                        include_once("./codigoPHP/CreaDBJTGDWESProyectoTema5.php");
                    }
                    if (isset($_REQUEST["cargar"])) {
                        include_once("./codigoPHP/CargaInicialDBJTGDWESProyectoTema5.php");
                    }
                    if (isset($_REQUEST["todos"])) {
                        include_once("./codigoPHP/BorraDBJTGDWESProyectoTema5.php");
                        include_once("./codigoPHP/CreaDBJTGDWESProyectoTema5.php");
                        include_once("./codigoPHP/CargaInicialDBJTGDWESProyectoTema5.php");
                    }
                }
            }
            ?>
        </form>
        <table>
            <thead>
                <tr>
                    <th style="width: 50px; max-width: 50px;">Nº Ej</th>
                    <th style="width: calc(100% - 50px - 145px*1);">Ejercicio</th>
                    <th style="width: 145px; max-width: 145px;">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0</td>
                    <td>Mostrar el contenido de las variables superglobales y phpinfo().</i></td>
                    <td>
                        <a href="./codigoPHP/ejercicio00.php" target="_self">Ejecutar</a>
                        <a href="./mostrarcodigo/muestraEjercicio00.php" target="_self">Ver código</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Desarrollo de un control de acceso con identificación del usuario basado en la función header().</i></td>
                    <td>
                        <a href="./codigoPHP/ejercicio01.php" target="_self">Ejecutar</a>
                        <a href="./mostrarcodigo/muestraEjercicio01.php" target="_self">Ver código</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Desarrollo de un control de acceso con identificación del usuario basado en la función header() y en el uso de una tabla “Usuario” de la base de datos. ().</td>
                    <td>
                        <a href="./codigoPHP/ejercicio02.php" target="_self">Ejecutar</a>
                        <a href="./mostrarcodigo/muestraEjercicio02.php" target="_self">Ver código</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                    <td>
                        <a href="./codigoPHP/ejercicio03.php" target="_self"><!-- Ejecutar --></a>
                        <a href="./mostrarcodigo/muestraEjercicio03.php" target="_self"><!-- Ver código --></a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Implantación uso y disfrute de Xdebug en nuestro entorno de desarrollo. (Instalado en Ubuntu Server junto a Apache y lo usamos desde Windows integrándolo en VSCode).</td>
                    <td>✅</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Incorporar el control de acceso, identificación de usuario, cookies y sesiones a nuestro Mantenimiento de Departamentos.(Proyecto MtoDepartamentosTema5)</td>
                    <td>
                        <a href="./codigoPHP/ejercicio05.php" target="_self"><!-- Ejecutar --></a>
                        <a href="./mostrarcodigo/muestraEjercicio05.php" target="_self"><!-- Ver código --></a>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Ampliar la funcionalidad de la aplicación: MtoDepartamentos y MtoUsuarios</i></td>
                    <td>
                        <a href="./codigoPHP/ejercicio06.php" target="_self"><!-- Ejecutar --></a>
                        <a href="./mostrarcodigo/muestraEjercicio06.php" target="_self"><!-- Ver código --></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <!-- 😼 -->
    <footer><a href="../../" target="_self">Jesús Temprano Gallego</a> | 30/10/2025</footer>
    <!-- 😼 -->
    <!-- muxixima glasia alvelto pol el marivilliosiximo achetemeele que te paxo chatgepete -->
     <script>
        if (window.location.search) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>
