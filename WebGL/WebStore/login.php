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
        // Login success
        header("Location: success.html");
        exit();
    }else{

        // LoginFailed;
        header("Location: error.html");
        exit();
    }

    $conn->close();
 }

?>