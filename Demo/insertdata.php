

<?php
header('Content-Type: application/json');
include "connection.php";


if(isset($_POST['name'], $_POST['age'], $_POST['designation'])){
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);


    $stmt = $conn->prepare("INSERT INTO `data` (`name`, `age`, `designation`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $age, $designation);


    $result = $stmt->execute();


if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}


$stmt->close();
$conn->close();
}else{
    echo json_encode(['success' => false, 'error' => 'Invalid or missing POST data']);
}


?>
