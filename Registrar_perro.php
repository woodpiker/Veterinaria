<!DOCTYPE html>
<html>
    <head>
        <title>Consulta</title>
        <link rel="stylesheet" href="rPerro1.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <header>
            <p>Registro Local Canino</p> 
        </header>
        <section>
            <a href="FormRegistrarPerro.php" target="_self"><img id="img" title="Volver" src="archivos/retornar.png" style="width:100px;"></a>
            <?php
                //conexion a la Base de datos (Servidor,usuario,password)
                $conn = mysqli_connect("localhost", "root","", "RelocaDB");
                if (!$conn) {
                die("Error de conexion: " . mysqli_connect_error());
                }
                //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
                //capturando datos
                $v1 = $_REQUEST['Codigo'];
                $v2 = $_REQUEST['Nombre'];
                $v3 = $_REQUEST['FechNac'];
                $v4 = $_REQUEST['Raza'];
                $v5 = $_REQUEST['Genero'];
                $v6 = $_REQUEST['Foto'];
                //consulta SQL
                $sql = "INSERT INTO Perro (DNI, Nombre, Raza, Genero, FechaNacimiento, Foto) ";
                $sql .= "VALUES ('$v1', '$v2', '$v4', '$v5', '$v3', '$v6' )";
                if (mysqli_query($conn, $sql)) {
                    
                echo 
                    "
                        <table style='margin:auto;margin-top:120px;'>
                            <tr>
                            <td><b>Datos Ingresados Correctamente</b></td>
                            </tr>
                            <tr>
                            <td><img src='archivos/oso.gif' alt='oso' style='width: 200px;'></td>
                            </tr>
                        </table>
                    ";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
                //Mensaje de conformidad
            ?>
        </section>
        <footer>
            <table id="t1">
                <tr>
                    <td style="padding:5px;"><img src="archivos/correo1.png" style="width:20px;height:20px;margin:0px;"></td>
                    <td style="padding-left:5px;padding-right:50px;"> Correo: perritoscontentos@gmail.com</td>
                    <td style="padding:5px;"><img src="archivos/tel.png" style="width:20px;height:20px;margin:0px;"></td>
                    <td style="padding:5px;">Telefeno: 987654321</td>
                </tr>
            </table>
        </footer>
    </body>
</html>