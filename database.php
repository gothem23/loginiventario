<?php
$servername = "localhost";
$username = "Root";
$password = "";
$dbname = "inventario";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Obtener la imagen y guardarla como blob en la base de datos
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $imagenTipo = $_FILES['imagen']['type'];

    $sql = "INSERT INTO productos (imagen_producto, marca, nombre_producto, precio, cantidad_unidades)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("bssdi", $imagen, $marca, $nombre, $precio, $cantidad);
    $stmt->send_long_data(0, $imagen);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    
    echo "Producto guardado exitosamente.";
}
?>
