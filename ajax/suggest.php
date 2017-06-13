<?php
require_once ('../Connections/config.php');
require_once ('../funciones.php');

// Create connection
$conn = new mysqli($hostname_config, $username_config, $password_config, $database_config);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nombre FROM dlg_taller WHERE activo = 1 UNION SELECT locality FROM dlg_taller WHERE activo = 1 UNION SELECT administrative_area_level_1 FROM dlg_taller WHERE activo = 1 UNION SELECT servicio FROM dlg_servicio ORDER BY nombre";
$result = $conn->query($sql);
$array = array();

if ($result->num_rows > 0) {

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $array[] = $row['nombre'];
    }
}
else {
    echo "0 results";
}
$response = array(
	"query" => "Unit",
	'suggestions' => $array,
	);

echo json_encode(array_unique($array));

$conn->close();

?>