<?php
include 'includes/_dbconnect.php';

$sql = "SELECT _id, name, old_rate, final_rate FROM raw_material";
$result = mysqli_query($conn, $sql);

$rawMaterials = [];
$sno = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $row['sno'] = $sno++;
    $rawMaterials[] = $row;
}

echo json_encode($rawMaterials);
?>