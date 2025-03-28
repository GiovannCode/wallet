<?php
require_once 'db_conexion.php';
session_start();
if (isset($_POST['update'])) 
{  
    $user = $_SESSION['name'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
  
	
	if (!empty($name) && !empty($pass))
	{  
		$sql = $cnnPDO->prepare(
			'UPDATE usuarios SET name = :name, pass = :pass WHERE user = :user');
		
		$sql->bindParam(':name',$name);
		$sql->bindParam(':pass',$pass);
        $sql->bindParam(':user',$user);
		$sql->execute();

	    

		unset($sql);
		unset($cnnPDO);
        $_SESSION['name'] = $name;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require_once "db_conexion.php";
    ?>
    <header class="header">
        <a href="" class="logo">ChiWallet</a>
        <a href=""><?php echo '<img class="rounded-circle" src="data:image/png;base64,' . base64_encode($_SESSION['imagen']) . '" width="100px" height="100px"/>'
                        . '</td>'; ?></a>
        <a href="#" class="logo"><?php echo $_SESSION['name'] ?> </a>
        <nav class="navbar">
            <a href="registrecard.php">Agregar Tarjetas</a>
            <a href="showtarjet.php">Ver mis tarjetas</a>
            <a href="mi_perfil.php">Mi perfil</a>
            <a href="logout.php">Cerrar Sesion</a>
        </nav>
    </header>

    <div class="perfil form">
        <h1>Mi perfil</h1>
        <h2>Editar perfil</h2>
        <a href=""><?php echo '<img class="rounded-circle" src="data:image/png;base64,' . base64_encode($_SESSION['imagen']) . '" width="100px" height="100px"/>' . '</td>'; ?></a>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nombre: <?php echo $_SESSION['name'] ?></label>
            <label for="">Usuario: <?php echo $_SESSION['user'] ?></label>
            <label for="">Correo: <?php echo $_SESSION['user'] ?> </label>
        </form>
        <button type="button" class="btn_edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Editar datos
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualiza Tus datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input type="hidden" value="<?php echo$_SESSION['user']?>" name="user">
                            <label for="">Nombre</label>
                            <input type="text" name="name" placeholder="Nombre">
                            <label for="">Ingresa tu contraseña</label>
                            <input type="password" placeholder="Contraseña" name="pass">
                            <button type="submit" name="update"> Actualizar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>