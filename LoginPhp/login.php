<?php
include "connection.php";

if(isset($_POST['user_name'], $_POST['user_password'])){
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];

    $sql = "SELECT * FROM data WHERE user_name = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;
    $obj = mysqli_fetch_object($result);

    if($count == 1){
        $return["data"] = $obj;
    } else {
        $return["message"] = "Password is Wrong";
    }

    $stmt->close();
} else {
    echo json_encode("Error" . mysqli_connect_error($conn));
}
echo json_encode($return);

?>