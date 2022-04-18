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
            <a href="FormConsultarPerro.php" target="_self"><img id="img" title="Volver" src="archivos/retornar.png" style="width:100px;"></a>
            <?php
                //conexion a la Base de datos (Servidor,usuario,password)
                $conn = mysqli_connect("localhost", "root","", "RelocaDB");
                if (!$conn) {
                die("Error de conexion: " . mysqli_connect_error());
                }
                //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
                //capturando datos
                $v2 = $_REQUEST['Nombre'];
                //conuslta SQL
                $sql = "select * from Perro where Nombre like '".$v2."'";
                $result = mysqli_query($conn, $sql);
                //cuantos reultados hay en la busqueda
                $num_resultados = mysqli_num_rows($result);
                echo "<p><b>Número de perros encontrados: ".$num_resultados."</b></p>";
                //mostrando informacion de los perros y detalle
                for ($i=0; $i <$num_resultados; $i++) {
                $row = mysqli_fetch_array($result);
                
                //echo ($i+1);
                echo " <table id='table'><tr id='tr'><td id='td'>DNI : </td><td>".$row["DNI"]."</td></tr>";
                echo " <tr id='tr'><td id='td'>Nombre : </td><td>".$row["Nombre"]."</td></tr>";
                echo " <tr id='tr'><td id='td'>Raza : </td><td>".$row["Raza"]."</td></tr>";
                echo " <tr id='tr'><td id='td'>Genero : </td><td>".$row["Genero"]."</td></tr>";
                echo " <tr id='tr'><td id='td'>Nacio en : </td><td>".$row["FechaNacimiento"]."</td></tr>";
                echo "</table>";
                }
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