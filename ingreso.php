<?php
  require 'database.php';
  $message = '';

  //Se verifica si los campos no estan vacios
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
    //Se escribe la sentencia sql
      $mail=$_POST['email'];
      $pass=md5($_POST['password']);
      $q="INSERT INTO users (email, password) VALUES ('$mail','$pass')";

      //Finalmente ejecutamos la sentencia SQL
      if (mysqli_query($conn,$q)) {
        $message = 'Usuario creado correctamente';
      } else {
        $message = 'Error al crear usuario';
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
    <header>
      RelocaApp-Servicio Perruno
    </header>
    
    <div>
    <h1>Registrarse</h1>
    <span>o <a href="index.php">Ingresar</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingresar email">
      <input name="password" type="password" placeholder="Ingresar contraseña"  pattern="(?=.*[0-9]{2,})(?=.*[A-Z])(?=.*[!@#$%^&?*])([a-zA-Z0-9]*([!@#$%^&?*][a-zA-Z0-9]{2,}[!@#$%^&?*])*[a-zA-Z0-9]?){8,}$">
      <input name="confirm_password" type="password" placeholder="Confirmar contraseña">
      <input type="submit" value="Registrar">
    </form>
    </div>
    <?php if(!empty($message)): ?>
      <script>alert("<?= $message ?>");</script>
    <?php endif; ?>
  </body>
</html>
