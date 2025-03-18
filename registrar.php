<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un nuevo Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include "header.php"; ?>
    <form action="registrar.php" method="POST">
        <label>Producto:</label>
        <input type="text" name="Producto">
        <br>
        <label>Marca:</label>
        <input type="text" name="Marca">
        <br>
        <label>Categoria:</label>
        <input type="text" name="Categoria">
        <br>
        <button type="submit">Registrar Producto</button>
        <a href="index.php"><button type="button">Cancelar</button></a>
    </form>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Producto = $_POST['Producto'];
            $Marca = $_POST['Marca'];
            $Categoria = $_POST['Categoria'];

            $insercion = $conexion ->prepare("INSERT INTO tblproductos(Producto, Marca, Categoria) VALUES (?, ?, ?)");
            $insercion->bind_param("sss", $Producto, $Marca, $Categoria);
            $insercion->execute();
            header('Location: index.php');
        }
    ?>
    <?php include "footer.php"; ?>
</body>
</html>