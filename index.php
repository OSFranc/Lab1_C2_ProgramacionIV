<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion Base de datos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include "header.php"; ?>
    <h1>Lista de Productos</h1>
    <a href='registrar.php'><button>Registrar</button></a>
    

    <?php 
        $resultado = $conexion -> query("SELECT * FROM tblproductos");

    echo ('
        <table> 
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>');
            while ($row = $resultado -> fetch_assoc()) {
                echo ("
                    <tr>
                        <td>{$row['ID_Producto']}</td>
                        <td>{$row['Producto']}</td>
                        <td>{$row['Marca']}</td>
                        <td>{$row['Categoria']}</td>
                        <td><a href='eliminar.php?ID_Producto={$row['ID_Producto']}' onclick='return confirm(\"¿Eliminar registro?\")'><button>Eliminar</button></a></td>
                        <td><a href='editar.php?ID_Producto={$row['ID_Producto']}'><button>Editar</button></a></td>
                    </tr>  
                ");
            }
        echo (
            "</tbody>
        </table>"
        );
    ?>
   <?php include "footer.php"; ?>
</body>
</html>