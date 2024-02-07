<?php
include "connection.php";


if(isset($_POST['user_name'], $_POST['user_password'])){
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];



    $stmt = $conn->prepare("INSERT INTO `data` (`user_name`, `user_password`) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);


    $result = $stmt->execute();


if ($result) {
   $return['data'] = "Data Saved Successfuly";
} else {
    $return["message"] = "Data Not Saved Successfuly";
}


$stmt->close();
$conn->close();
}else{
    echo json_encode(['success' => false, 'error' => 'Invalid or missing POST data']);
}
echo json_encode($return);
?>