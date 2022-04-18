<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    $str1=$_SESSION['type'];
    if(strcmp($str1,'admin')==0){
      header('Location: /relocaApp/FormConsultarPerro.php');
    }else{
      header('Location: /relocaApp/FormConsultarPerroUser.php');
    }
  }

  require 'database.php';

  //Comprobar que los campos de email y password no esten vacios
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $comp1="";
    $comp2="";
    /* BUSQUEDA EN LOS ADMINS */
    $email=$_POST['email'];
    //Preparamos la sentencia a ejecutar
    $q="SELECT id, email, password FROM admins WHERE email = '$email'";
    $records = mysqli_query($conn,$q);
    //Ejecutamos la sentencia
    $number=mysqli_num_rows($records);
    $result=mysqli_fetch_array($records);
    

    /* BUSQUEDA EN LOS USERS */
    //Preparamos la sentencia a ejecutar
    $q2="SELECT id, email, password FROM users WHERE email = '$email'";
    $records2 = mysqli_query($conn,$q2);
    //Ejecutamos la sentencia
    $number2=mysqli_num_rows($records2);
    $result2=mysqli_fetch_array($records2);
    
    $message = '';
    $compare = md5($_POST['password']);

    if($result!=null){
      $comp1=$result[2];
    }else if($result2!=null){
      $comp1=$result2[2];
    }

    //Comprueba que los datos no esten vacios y comparamos el hash con la contraseña
    if ($number > 0 && strcmp($compare, $comp1)==0) {
      //Si coincide almacenamos el id del admin
      $_SESSION['user_id'] = $result['id'];
      $_SESSION['type'] = 'admin';
      header("Location: /relocaApp/FormConsultarPerro.php");
    }else if($number2 > 0 && strcmp($compare, $result2[2])==0){
      //Si coincide almacenamos el id del usuario
      $_SESSION['user_id'] = $result2['id'];
      $_SESSION['type'] = 'user';
      header("Location: /relocaApp/FormConsultarPerroUser.php");
    }else{
      $message = 'No se encontraron coincidencias';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ingresar</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      RelocaApp-Servicio Perruno
    </header>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <div>
    <h1>Ingresar</h1>
    <span>o <a href="signup.php">Registrarse</a></span>

    <form action="index.php" method="POST">
      <input name="email" type="text" placeholder="Ingresar email">
      <input name="password" type="password" placeholder="Ingresar contraseña">
      <input type="submit" value="Ingresar">
    </form>
    </div>
  </body>
</html>