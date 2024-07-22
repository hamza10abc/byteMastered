<?php include 'includes/_topbar.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$rawMat =  $_POST['rawMat'];
$prodId = $_POST['productId'];

$stmt = $conn->prepare("INSERT INTO test (name, value) VALUES (?,?)");
$stmt->bind_param("si", $element, $prodId);

foreach ($rawMat as $element) {
    $stmt->execute();
}
$stmt->close();
}else{
    echo "Not post method";
}

?>


Dawasaji


<?php include 'includes/_bottombar.php' ?>