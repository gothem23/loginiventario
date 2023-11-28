<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar datos en la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td><img src='mostrar_imagen.php?id=" . $row['id'] . "' width='100' height='100'></td>";
        echo "<td>" . $row["MARCA"] . "</td>";
        echo "<td>" . $row["NOMBRE DEL PRODUCTO"] . "</td>";
        echo "<td>" . $row["PRECIO"] . "</td>";
        echo "<td>" . $row["CANT. DE UNIDADES"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>