<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>
<?php
if (isset($_POST["btn-submit-login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    
    if ($username == "" || $password == "")
    {
        echo
            '<script>
                alert("Vui lòng điền thông tin đầy đủ!");
            </script>';
    }
    else
    {
        $cnn = mysqli_connect("localhost", "root", "", "webcaycanh");
        $sql = "SELECT taikhoan.username, taikhoan.pass
                FROM taikhoan
                INNER JOIN nhanvien ON taikhoan.username = nhanvien.username
                WHERE taikhoan.username = '$username' and taikhoan.pass = '$password'";
        $query = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($query) == 0)
        {
            echo
            '<script>
                alert("Tên Đăng Nhập Không Đúng");
            </script>';
        }
        else
        {
            $_SESSION['username-admin'] = $username;
            sleep(1);
            echo
            '<script>
                alert("Đăng nhập thành công");
            </script>';
            header("location: admin.php");
        }
        mysqli_close($cnn);
    }
}
?>
<div class="container">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <form action="loginadmin.php" method="post" class='bg-light p-2 border rounded'>
                            <fieldset class='p-5'>
                                <legend class='text-center text-primary mb-4'>LOG IN</legend>
                                <div class="mb-3">
                                    <input class='form-control' type="text" name="username" placeholder="User name">
                                </div>
                                <div class='mb-3'>
                                    <input class='form-control' type="password" name="password" placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <input class='btn btn-primary form-control' type="submit" name="btn-submit-login" value="LOGIN">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
