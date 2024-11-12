<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-servicios.css">
    <title>Servicios</title>
</head>

<body>

<div class="caja-servicios">
    <div class="servicios">
        <h1 class="titulo">Servicios</h1>
        <hr>
        <table border="1">
            <tr>
                <th>N° Servicio</th>
                <th>Fecha_Servicio</th>
                <th>Kilomethaje</th>
                <th>Observaciones</th>
            </tr>
    </div>
</div>

    <?php
        require 'conexion.php';

        $sql = "CALL sp_BusquedaServicios()";
        $result = $conn->query(query: $sql);
        
        if ($result->num_rows > 0) {
            // Mostrar los datos en una tabla HTML
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                    </tr>";
        
            // Fetch de los datos
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['ID'] . "</td>
                        <td>" . $row['Nombre'] . "</td>
                        <td>" . $row['Apellido'] . "</td>
                        <td>" . $row['Email'] . "</td>
                    </tr>";
            }
        
            echo "</table>";
        } else {
            echo "No se encontraron registros.";
        }
    ?>
</body>

</html>