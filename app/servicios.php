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
                    <th>Patente</th>
                    <th>Fecha_Servicio</th>
                    <th>Kilometraje</th>
                    <th>Observaciones</th>
                </tr>
                <?php
                require 'conexion.php';
                if (isset($_POST['patente'])) {
                    $patente = $_POST['patente'];

                    $sqlCall_Busqueda = "CALL sp_BusquedaServicios(?)";
                    $stmt = $conn->prepare($sqlCall_Busqueda);
                    $stmt->bind_param("s", $patente);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='tabla-datos' onclick=\"window.location.href='detalle_servicio.php?id=" . $row['ID_Vehicserv'] . "'\">
                                    <td>" . $row['ID_Vehicserv'] . "</td>
                                    <td>" . $row['Patente'] . "</td>
                                    <td>" . $row['Fecha_Servicio'] . "</td>
                                    <td>" . $row['Kilometraje'] . "</td>
                                    <td>" . $row['Observaciones'] . "</td>
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