<?php
session_start();
require 'db_conexion.php';
# BUSCAR Username y Password

if (isset($_POST['login'])) {
  $user=$_POST['user'];
  $pass = $_POST['pass'];

  

  $select = $cnnPDO->prepare('SELECT * from usuarios WHERE user =? and pass=?');

  $select->execute([$user, $pass]);
  $count = $select->rowCount();
  $campo = $select->fetch();

  if ($count) {         
    $_SESSION['user'] = $campo['user'];
    $_SESSION['email'] = $campo['email'];
    $_SESSION['imagen'] =$campo['imagen'];
    // $_SESSION['img'] = $campo['img'];
    header('location:session.php');
  }
}
# Termina Código de BUSCAR
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Registra Tu Tarjeta</title>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <h1>Inicia Sesion</h1>
            <label for="">Usuario</label>
            <input type="text" name="user" placeholder="Usuario">
            <label for="">Ingresa tu contraseña</label>
            <input type="password" placeholder="Contraseña" name="pass">
            <button type="submit" name="login">Iniciar Sesion</button>
            <!-- <a href="login.php">Inicia sesion</a> -->
        </form>
    </div>
</body>
</html>