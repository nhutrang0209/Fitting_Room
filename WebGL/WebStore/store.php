<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời trang</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
    $phone = isset($_COOKIE['username']) ? $_COOKIE['username'] : ""; // Check if 'username' cookie is set
    $login = isset($_COOKIE['login']) ? $_COOKIE['login'] : ""; // Check if 'login' cookie is set
    $id = isset($_COOKIE['id']) ? $_COOKIE['id'] : "";
    $height = isset($_COOKIE['height']) ? $_COOKIE['height'] : ""; 
    $weight = isset($_COOKIE['weight']) ? $_COOKIE['weight'] : ""; 
    $v1 = isset($_COOKIE['v1']) ? $_COOKIE['v1'] : ""; 
    $v2 = isset($_COOKIE['v2']) ? $_COOKIE['v2'] : ""; 
    $v3 = isset($_COOKIE['v3']) ? $_COOKIE['v3'] : ""; 
?>

<body>
    <header>
        <h1>LOGO</h1>
        <?php
        if ($login == true) {
            echo "
                <div class='user-actions'>
                    <button id='ttBtn'>Nhập thông tin</button>
                    <h3>User: $phone</h3>  
                </div>
            ";
        } else {
            echo "
                <div class='user-actions'>
                    <button id='loginBtn'>Đăng nhập</button>
                    <button id='registerBtn'>Đăng ký</button>
                </div>
            ";
        }
        ?>

    </header>

    <div id="overlay"></div>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Đăng nhập</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="loginPhone">Số điện thoại:</label>
                    <input type="tel" id="loginPhone" name="loginPhone" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Mật khẩu:</label>
                    <input type="password" id="loginPassword" name="loginPassword" required>
                </div>
                <input type="submit" value="Đăng nhập">
            </form>
        </div>
    </div>

    <div id="ttModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTtModal()">&times;</span>
            <h2>Nhập thông tin</h2>
            <form action="tt.php" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="loginPhone">Chiều cao</label>
                    <input type="number" id="height" name="height" value="<?php echo $height ?>">
                </div>
                <div class="form-group">
                    <label for="loginPhone">Cân nặng</label>
                    <input type="number" id="weight" name="weight" value="<?php echo $weight ?>">
                </div>
                <div class="form-group">
                    <label for="loginPhone">Vòng 1</label>
                    <input type="number" id="v1" name="v1" value="<?php echo $v1 ?>">
                </div>
                <div class="form-group">
                    <label for="loginPhone">Vòng 2</label>
                    <input type="number" id="v2" name="v2" value="<?php echo $v2 ?>">
                </div>
                <div class="form-group">
                    <label for="loginPhone">Vòng 3</label>
                    <input type="number" id="v3" name="v3" value="<?php echo $v3 ?>">
                </div>
                <input type="submit" value="Thêm/Cập nhật thông tin">
            </form>
        </div>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRegisterModal()">&times;</span>
            <h2>Đăng ký</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="registerPhone">Số điện thoại:</label>
                    <input type="tel" id="registerPhone" name="registerPhone" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Mật khẩu:</label>
                    <input type="password" id="registerPassword" name="registerPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Nhập lại mật khẩu:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <input type="submit" value="Đăng ký">
            </form>
        </div>
    </div>

    <div class="container">
        <nav>
            <h2>Danh mục sản phẩm</h2>
            <ul>
                <li>Sản phẩm 1</li>
                <li>Sản phẩm 2</li>
                <li>Sản phẩm 3</li>
                <li>Sản phẩm 4</li>
                <li>Sản phẩm 5</li>
                <li>Sản phẩm 6</li>
                <li>Sản phẩm 7</li>
                <li>Sản phẩm 8</li>
                <li>Sản phẩm 9</li>
                <li>Sản phẩm 10</li>
            </ul>
        </nav>
        <div class="products">
            <div class="product">
                <img src="product1.jpg" alt="Sản phẩm 1">
                <h3>Sản phẩm 1</h3>
                <p>Giá: $100</p>
            </div>
            <div class="product">
                <img src="product2.jpg" alt="Sản phẩm 2">
                <h3>Sản phẩm 2</h3>
                <p>Giá: $150</p>
            </div>
            <div class="product">
                <img src="product3.jpg" alt="Sản phẩm 3">
                <h3>Sản phẩm 3</h3>
                <p>Giá: $120</p>
            </div>
        </div>
    </div>
    <div class="button-container">
        <a href="../UnityBuild/index.html" class="try-on-button">Đi đến phòng thử đồ</a>
    </div>

    <script src="script.js"></script>
</body>
</html>
