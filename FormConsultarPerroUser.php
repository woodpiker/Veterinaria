<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $us=$_SESSION['user_id'];
    $q="SELECT id, email, password FROM users WHERE id = '$us'";
    $records = mysqli_query($conn,$q);
    //Ejecutamos la sentencia
    $number=mysqli_num_rows($records);
    $result=mysqli_fetch_array($records);
    /*
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
*/
    $user = null;

    if ($number > 0) {
      $user = $result;
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Consulta</title>
        <link rel="stylesheet" href="rPerro1.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <header>
            <p>Registro Local Caninoxxxxxx</p> 
        </header>
        
        <section>
            <a href="logout.php" target="_self"><img title="Cerrar Sesión" src="archivos/logout.png" style="width:100px;height:80px;float:right;"></a>
            <form action="Consultar_perro_user.php" method="GET">
            <p id="head">Sistema de Identificación Perruno</p>
            Ingresar Nombre a buscar
            <p><Input Type = Text name = "Nombre" ></p>
            <Input Type = Submit value = "Buscar">
            </form>
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