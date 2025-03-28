<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Tus Tarjetas</title>
</head>

<body>
    <div class="cards">
    <?php
    session_start();
    require_once "db_conexion.php";
    ?>
    <?php
    $email = $_SESSION['email'];
    $sql = $cnnPDO->prepare("SELECT * FROM tarjeta WHERE ctarjeta = ?");
    $sql->execute([$email]);
    while ($campo = $sql->fetch(PDO::FETCH_ASSOC)){
        echo'<div class="card">';
        echo'<img src="img/tarjeta-credito-platinum-1280x720-removebg-preview.png" alt="">';
        echo'<div class="card-content">';
        echo'<h2>Tu Tarjeta es:'.$campo['numtarjeta'].'</h2>';
        echo'<p>Banco: <span>'. $campo['banco'].'</span></p>';
        echo'<p>Fecha de registro: <span>'.$campo['fregistro'].'</span></p>';
        echo'<p>Saldo: <span>'. $campo['saldo'].'</span></p>';
        echo'</div>';
        echo'</div>';
    }

    
    ?>
    </div>
    
    

    <header class="header">
        <a href="" class="logo">ChiWallet</a>
        <a href="#" class="logo"><?php echo $_SESSION['user'] ?> </a>
        <nav class="navbar">
        <a href="registrecard.php">Agregar Tarjetas</a>
            <a href="session.php">Regresa a inicio</a>
            <a href="logout.php">Cerrar Sesion</a>
        </nav>
    </header>
    <h3 style="margin-top: 200px; text-align:center; font-size:30px;">

    <?php
        $email = $_SESSION['email'];
        $sql = $cnnPDO->prepare("SELECT * FROM tarjeta WHERE ctarjeta = ?");
        $sql->execute([$email]);
        $tarjetas = $sql->fetch(PDO::FETCH_ASSOC);
    
        if($tarjetas){ 
            foreach($tarjetas as $tarjeta){
                
            }
    
        }else{
            echo"No hay tarjetas registradas";
        }
    
    
    ?>
    </h3>
    <!-- <div class="cards">
        <div class="card">
            <img src="img/tarjeta-credito-platinum-1280x720-removebg-preview.png" alt="">
            <div class="card-content">
                <h2>Tu Tarjeta es:</h2>
                <p>Numero de tarjeta <span></span></p>
                <p>Banco: <span></span></p>
                <p>Fecha de registro: <span></span></p>
                <p>Saldo <span></span></p>
            </div>
        </div>
    </div> -->
</body>

</html>