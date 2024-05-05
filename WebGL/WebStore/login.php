<?php 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Retrieve form data
    $phone = $_POST['loginPhone'];
    $pass = $_POST['loginPassword'];

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
    $query = "SELECT * FROM users WHERE Username = '$phone' AND Password = '$pass'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $query = "SELECT * FROM info WHERE id = '$id'";
        $result = $conn->query($query);
        $height = "";
        $weight = "";
        $v1 = "";
        $v2 = "";
        $v3 = "";
        if ($result->num_rows >= 1){
            $row = $result->fetch_assoc();
            $height = isset($row['height']) ? $row['height'] : "";
            $weight = isset($row['weight']) ? $row['weight'] : "";
            $v1 = isset($row['v1']) ? $row["v1"] : "";
            $v2 = isset($row['v2']) ? $row["v2"] : "";
            $v3 = isset($row['v3']) ? $row["v3"] : "";
        }
        // Login success
        setcookie("height", $height);
        setcookie("weight", $weight);
        setcookie("v1", $v1);
        setcookie("v2", $v2);
        setcookie("v3", $v3);

        setcookie("login", true);
        setcookie("username", $phone);
        setcookie("id", $id);
        header("Location: store.php");
        exit();
    }else{

        // LoginFailed;
        header("Location: error.html");
        exit();
    }

    $conn->close();
 }

?>