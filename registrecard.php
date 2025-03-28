<!-- 

tarjeta nombre de tabla
 
Numero de tarjeta
 
generar un random de 4 digitos

banco

5 bancos en un combo

fecha de registro

saldo asignarlos


traer index con img que hable sobre wallet digital y un navbar con 2opciones para nuevo usuario e iniciar sesion

post y ntarjeta
-->
<?php
session_start();
require 'db_conexion.php';
$random = rand(11111, 99999);
$random_numt = $random;
if (isset($_POST['registrar'])) 
{  
	$numtarjeta=$_POST['numtarjeta'];
	$banco=$_POST['banco'];
	$fregistro=$_POST['fregistro'];
    $saldo = 0;
    $email = $_SESSION['email'];
	
	if (!empty($numtarjeta) && !empty($banco) && !empty($fregistro) && !empty($email)  )	{
		  

            $sql = $cnnPDO->prepare("INSERT INTO tarjeta (numtarjeta, banco, fregistro, saldo, ctarjeta) VALUES (?, ?, ?, ?, ?)");
            $sql->execute([$numtarjeta, $banco, $fregistro, $saldo, $email]);
            unset($sql);
            unset($cnnPDO);
            
    
            

		
	}
    
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
        <form action="" method="post">
            <h1>Registra tu tarjeta</h1>
            <label for="">Numero de tarjeta</label>
            <input type="text" value="<?php echo $random_numt?>" readonly name="numtarjeta">
            <label for="">Elige tu banco:</label>
            <select name="banco" id="banco">
                <option value="opcion1">Selecciona tu banco</option>
                <option value="BBVA">BBVA</option>
                <option value="Santander">Santander</option>
                <option value="BanRegio">BanRegio</option>
                <option value="Banorte">Banorte</option>
                <option value="Banamex">Banamex</option>
            </select>
            <label for="">Seleccione la fecha de registro</label>
            <input type="date" name="fregistro">
            <button type="submit" name="registrar">Registrar</button>
        </form>
    </div>
    <div class="return">
        <a href="session.php">Regresa a inicio</a>
    </div>
</body>
</html>