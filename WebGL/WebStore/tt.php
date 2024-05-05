<?php
     
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Retrieve form data
    $id = $_POST['id'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $v1 = $_POST['v1'];
    $v2 = $_POST['v2'];
    $v3 = $_POST['v3'];
    // Database connection
    $servername = "localhost"; // Tên máy chủ MySQL
    $username = "root"; // Tên người dùng MySQL
    $password = ""; // Mật khẩu MySQL
    $dbname = "fitting_room";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed". $conn->connect_error);
    }

    // validate Login authentication
    $query = "SELECT * FROM info WHERE id_info = '$id'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $query_update = "UPDATE info SET height = '$height', weight = '$weight', v1 = '$v1', v2 = '$v2', v3 = '$v3' WHERE id_info = '$id'";
        $result_update = $conn->query($query_update);
        setcookie("height", $height);
        setcookie("weight", $weight);
        setcookie("v1", $v1);
        setcookie("v2", $v2);
        setcookie("v3", $v3);
        header("Location: store.php");
        exit();
    }else{
        $query_update = "INSERT INTO info (id_info, height, weight, v1, v2, v3) VALUES ($id, $height, $weight, $v1, $v2, $v3)";
        $result_insert = $conn->query($query_update);
        setcookie("height", $height);
        setcookie("weight", $weight);
        setcookie("v1", $v1);
        setcookie("v2", $v2);
        setcookie("v3", $v3);
        header("Location: store.php");
        exit();
    }

    $conn->close();
 }


?>