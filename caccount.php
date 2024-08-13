<!-- nombre user correo y password

login con user y password
modal boos


vista de usuario agregar tarjetas


mis tarjetas tiene todos los datos

-->
<?php
session_start();
require 'db_conexion.php';
if (isset($_POST['registrar'])) 
{  
	$name=$_POST['name'];
	$user=$_POST['user'];
	$email=$_POST['email'];
    $pass=$_POST['pass'];
    
    $codigo = $_POST['registrar'];
    $size = getimagesize($_FILES['imagen']['tmp_name']);
    if ($size !== false) {
        //Se utiliza para acceder al nombre temporal del archivo que se ha subido a través de un formulario HTML.
        $cargarImagen = $_FILES['imagen']['tmp_name'];

        $img = fopen($cargarImagen, 'rb');


        // $sql=$cnnPDO->prepare("INSERT INTO login
        //     (img) VALUES (:img)");

        //Asignar el contenido de las variables a los parametros     
        // $sql->bindParam(':img',$imagen, PDO::PARAM_LOB);
        //Ejecutar la variable $sql

    }
	if (!empty($name) && !empty($user) && !empty($email) && !empty($pass)){
        
        $sql = $cnnPDO->prepare("INSERT INTO usuarios 
        (name, user, email, pass, imagen) VALUES (:name, :user, :email, :pass, :imagen)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':user', $user);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':pass', $pass);
        $sql->bindParam(':imagen', $img, PDO::PARAM_LOB);
        $sql->execute();

		unset($sql);
		unset($cnnPDO);     
    
            

		
	}
    $_SESSION['imagen'] = $img;
    $_SESSION['email'] = $email;     
}

    
 			

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
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Registrate</h1>
            <label for="">Nombre</label>
            <input type="text" name="name" placeholder="Nombre">
            <label for="">Ingresa tu usuario</label>
            <input type="text" name="user" placeholder="Usuario">
            <label for="">Ingresa tu correo</label>
            <input type="email" name="email" placeholder="Correo">
            <label for="">Ingresa tu contraseña</label>
            <input type="password" placeholder="Contraseña" name="pass">
            <label for="">Carga tu imagen</label>
            <input type="file" accept="image/jpg" name="imagen" enctype="multipart/form-data">
            <button type="submit" name="registrar">Registrar</button>
            <a href="login.php">Inicia sesion</a>
        </form>
    </div>
</body>
</html>