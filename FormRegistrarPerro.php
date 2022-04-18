<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $us=$_SESSION['user_id'];
    $q="SELECT id, email, password FROM admins WHERE id = '$us'";
    $records = mysqli_query($conn,$q);
    //Ejecutamos la sentencia
    $number=mysqli_num_rows($records);
    $result=mysqli_fetch_array($records);
    $user = null;

    if ($number > 0) {
      $user = $result;
    }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <link rel="stylesheet" href="rPerro1.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <header>
            <p>Registro Local Canino</p> 
        </header>
        
        <section>
            <a href="FormConsultarPerro.php" target="_self"><img id="img" title="Consultar Mascota" src="archivos/consultar.gif" style="width:100px;float:left;"></a>
            <a href="logout.php" target="_self"><img title="Cerrar Sesión" src="archivos/logout.png" style="width:100px;height:80px;float:right;"></a>
            <form action="Registrar_perro.php" method="GET">
            <p id="head">Sistema de Identificacion Perruno</p>
            Ingresar Codigo
            <p><Input name = "Codigo" Type="text"></p>
            Ingresar Nombre
            <p><Input name = "Nombre" Type="text"></p>
            Fecha de Nacimiento
            <p><Input name= "FechNac" Type ="Date"></p>
            <p>Genero</p> 
            <Input name="Genero" Type = "Radio" Value=1> Macho
            <p><Input name= "Genero" Type = "Radio" Value=0> Hembra</p>
            <p>Seleccione Raza</p> 
            <Select name = "Raza">
            <Option value = "Pitbull"> Pitbull
            <Option value = "Bulldog"> Bulldog
            <Option value = "Shichu"> Shichu
            <Option value = "Pequines"> Pequines
            <Option value = "San Bernardo"> San Bernardo
            <Option value = "Chiguahua"> Chiguahua
            <p></Select></p>
            <p>Subir Foto</p> 
            <Input Type = "file" name = "Foto">
            <Input name= "Registrar" Type = Submit value = "Registrar">
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