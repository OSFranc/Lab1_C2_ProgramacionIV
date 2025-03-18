<?php include 'conexion.php'; 
$ID_Producto = $_GET['ID_Producto'];
$conexion -> query("DELETE FROM tblproductos WHERE ID_Producto=$ID_Producto");
header('Location: index.php');

?>

