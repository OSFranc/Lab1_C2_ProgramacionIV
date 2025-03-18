<?php include 'conexion.php'; 
$ID_Producto = $_GET['ID_Producto'];
$resultado = $conexion -> query("SELECT * FROM tblproductos WHERE ID_Producto=$ID_Producto");
$producto = $resultado -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un nuevo usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "header.php"; ?>
    <form action="" method="POST">
        <label>Producto:</label>
        <input type="text" name="Producto" value="<?php echo $producto['Producto'] ?>">
        <br>
        <label>Marca:</label>
        <input type="text" name="Marca" value="<?php echo $producto['Marca'] ?>">
        <br>
        <label>Categoria</label>
        <input type="text" name="Categoria" value="<?php echo $producto['Categoria'] ?>">
        <br>
        <button type="submit">Actualizar producto</button>
        <a href="index.php"><button>Cancelar</button></a>
    </form>

    <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $Producto = $_POST['Producto'];
                $Marca = $_POST['Marca'];
                $Categoria = $_POST['Categoria'];
                $insercion = $conexion ->prepare("UPDATE tblproductos SET Producto=?, Marca=?, Categoria=? WHERE ID_Producto=$ID_Producto");
                $insercion->bind_param("sss", $Producto, $Marca, $Categoria);
                $insercion->execute();
                header('Location: index.php');
            }
        ?>

<?php include "footer.php"; ?>
</body>
</html>