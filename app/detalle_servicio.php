<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-detalle_servicio.css">
    <title>Servicio</title>
</head>

<body>
    <div class="caja-servicios">
        <div class="servicios">
            <h1 class="titulo">Servicio</h1>
            <hr>
            <!-- <h2 class="titulo-patente">Servicios de la petente <?php echo ($_POST['patente']) ?></h2> -->
            <table border="1">
                <tr>
                    <th>Categoría</th>
                    <th>Servicio</th>
                    <th>Detalle</th>
                </tr>
                <?php
                require 'conexion.php';
                if (isset($_GET['id'])) {
                    $id_vehicserv = $_GET['id'];
                    
                    $sqlCall_Busqueda = "CALL sp_BusquedaServiciosPorCategoria(?)";
                    $stmt = $conn->prepare($sqlCall_Busqueda);
                    $stmt->bind_param("i", $id_vehicserv);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                    <td>" . $row['Nombre_Categoria'] . "</td>
                                    <td>" . $row['Nombre_Servicio'] . "</td>
                                    <td>" . $row['Detalle'] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron registros.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Ingrese la patente</td></tr>";
                }
                ?>
                </table>
        </div>
    </div>
</body>

</html>

<?php


?>