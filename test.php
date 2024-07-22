<?php 
include 'includes/_topbar.php';

$array = ["Element1", "Element2", "Element3"]; // Your array

// Prepare an SQL statement for insertion
$stmt = $conn->prepare("INSERT INTO test (name) VALUES (?)");
$stmt->bind_param("s", $element);

foreach ($array as $element) {
    $stmt->execute();
}

echo "New records created successfully";

$stmt->close();
// $conn->close();

?>


<?php include 'includes/_bottombar.php' ?>
