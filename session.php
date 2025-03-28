<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once "db_conexion.php";
    session_start();
    ?>
    <header class="header">
        <a href="" class="logo">ChiWallet</a>
        <a href=""><?php echo'<img class="rounded-circle" src="data:image/png;base64,' . base64_encode($_SESSION['imagen']) . '" width="100px" height="100px"/>'
      . '</td>';?></a>
        <a href="#" class="logo"><?php echo $_SESSION['name']?> </a>
        <nav class="navbar">
            <a href="registrecard.php">Agregar Tarjetas</a>
            <a href="showtarjet.php">Ver mis tarjetas</a>
            <a href="mi_perfil.php">Mi perfil</a>
            <a href="logout.php">Cerrar Sesion</a>
        </nav>
    </header>
    <section class="inicio">
        <div class="contenido-inicio">
            <h1>Wallets Digitales</h1>
            <h3>Conoces las wallets?</h3>
            <p>Descubre todo lo que necesitas saber sobre wallets digitales. En nuestro sitio, encontrarás guías detalladas, comparativas y las últimas novedades sobre las mejores wallets del mercado. Aprende cómo proteger tus criptomonedas, gestionar tus activos digitales de forma segura y sacar el máximo provecho de tus inversiones. ¡Explora nuestras recomendaciones y mantente al día con el mundo de las finanzas digitales!</p>
        </div>
        <div class="img-inicio">
            <img src="img/wallet_inicio-removebg.png" alt="">
        </div>
    </section>
    <div class="container">
        <img src="https://bettermoneyhabits.bankofamerica.com/content/dam/bmh/assets/thumbnails/personalbanking/thumbnail-digitalwallet.jpg.thumb.1280.1280.jpg" alt="">
        <div class="texto">
        <div class="titulo">
            <h1>¿Que es una Wallet Digital?</h1>
        </div>
        Una wallet digital, o billetera digital, es una aplicación o dispositivo que permite almacenar, gestionar y utilizar criptomonedas y otros activos digitales de manera segura. Funciona de manera similar a una billetera física, pero en lugar de guardar dinero en efectivo y tarjetas, almacena claves criptográficas necesarias para acceder a tus activos digitales y realizar transacciones.
        <ol>
            <li>Wallets de software: Aplicaciones que puedes instalar en tu computadora o dispositivo móvil. Ejemplos incluyen wallets de escritorio, móviles y basadas en la web.</li>
            <li>Wallets de hardware: Dispositivos físicos que almacenan tus claves privadas de manera segura, desconectados de internet, lo que reduce el riesgo de hackeo.</li>
            <li>Wallets de papel: Documentos físicos que contienen tus claves públicas y privadas impresas, generalmente en forma de códigos QR.</li>
        </ol>
        </div>
    </div>
</body>
</html>