<!-- read.php -->
<?php
require_once('function.php');

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $registrations = array();
    while ($row = $result->fetch_assoc()) {
        $registrations[] = $row;
    }
    echo json_encode($registrations);
} else {
    echo "No registrations found.";
}
?>
