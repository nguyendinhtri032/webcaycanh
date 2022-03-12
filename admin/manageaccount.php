<?php
    echo "<div class='col-12 text-center text-primary p-3 h3'>DANH SÁCH TÀI KHOẢN</div>";
    $cnn = mysqli_connect("localhost", "root", "", "webcaycanh") or die (" khong ket noi duoc");
    $limit = 10;
    $page = "";
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];       
    }
    else
    {
        $page = 1;
    }
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM taikhoan LIMIT $start, $limit";
    $result = mysqli_query($cnn, $sql);
    $output = "";
    $i = 0;
    if(mysqli_num_rows($result)>=0)
    {
        $output .=
        "<table class='table table-bordered border-primary'>
            <thead>
                <form action='admin.php?chuyentrang=1&page=".$page."' method='POST'>
                    <tr>
                        <th class='col-1 text-primary'>STT</th>
                        <th class='col-3 text-primary'>Tên tài khoản</th>
                        <th class='col-2 text-primary'>Mật khẩu</th>
                        <th class='col-2 text-primary'>Quyền</th>
                        <th class='col-2 text-primary'>Trạng thái</th>
                        <th class='col-1'><input class='btn btn-primary form-control' type='submit' name='add' value='Add Account'></th>
                        <th class='col-1'><input class='btn btn-primary form-control' type='submit' name='deleteall' value='Delete All'></th>
                    </tr>
                </form>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result))
        {
            $i++;
            if(!isset($_GET['page']))
            {
                $_GET['page'] = 1;
            }
           $output.="
                <form action='admin.php?chuyentrang=1&page=".$page."&username=".$row['username']."' method='POST'>
                    <tr>
                        <td>".$i."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['pass']."</td>
                        <td>".$row['maquyen']."</td>
                        <td>".$row['trangthai']."</td>
                        <td><input class='btn border border-primary form-control' type='submit' name='edit' value='Edit'></td>
                        <td><input class='btn border border-primary form-control' type='submit' name='delete' value='Delete'</td>
                    </tr>
                </form>";
        }
        if(isset($_POST['delete']))
        {
            $username = $_GET['username'];
            mysqli_query($cnn, "DELETE FROM taikhoan WHERE username = '$username'");
            header("Location: admin.php?chuyentrang=1&page=".$page."");
        }
        if(isset($_POST['deleteall']))
        {
            mysqli_query($cnn, "DELETE FROM taikhoan");
            header("Location: admin.php?chuyentrang=1&page=".$page."");
        }
        if(isset($_POST['edit']))
        {
            $username = $_GET['username'];
            $productSQL = "SELECT * FROM taikhoan WHERE username = '$username'";
            $product = mysqli_query($cnn, $productSQL);
            while($row=mysqli_fetch_array($product))
            {
                $username = $row['username'];								
                $pass = $row['pass'];
                $maquyen = $row['maquyen'];					
                $trangthai = $row['trangthai'];
            }
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                    <div class='col-4 position-fixed'>
                        <form class='bg-light form-inline' action='admin.php?chuyentrang=1&page=".$page."&username=".$username."' method='POST'>
                            <fieldset>
                                <div class='mb-1'>
                                    <input class='btn btn-primary' type='submit' value='Cancel'>
                                </div>
                                <legend>Thông tin tài khoản</legend>
                                <div class='mb-3'>
                                    <lable>Tên tài khoản</lable>
                                    <input class='form-control' type='text' name='ttk' value=".$username.">
                                </div>
                                <div class='mb-3'>
                                    <lable>Mật khẩu</lable>
                                    <input class='form-control' type='text' name='mk' value=".$pass.">
                                </div>
                                <div class='mb-3'>
                                    <lable>Quyền</lable>
                                    <input class='form-control' type='text' name='mq' value=".$maquyen.">
                                </div>
                                <div class='mb-3'>
                                    <lable>Trạng thái</lable>
                                    <input class='form-control' type='text' name='tt' value=".$trangthai.">
                                </div>
                                <div class='mb-1'>
                                    <input class='btn-primary form-control' type='submit' name='doneedit' value='Save'>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class='col-4'></div>
                </div>";
        }
        if(isset($_POST['doneedit']))
        {
            $username = $_GET['username'];
            $ttk = isset($_POST['ttk']) ? $_POST['ttk'] : $username;
            $mk = isset($_POST['mk']) ? $_POST['mk'] : $pass;
            $mq = isset($_POST['mq']) ? $_POST['mq'] : $maquyen;
            $tt = isset($_POST['tt']) ? $_POST['tt'] : $trangthai;
            $updateAccountSQL = "UPDATE taikhoan SET username = '$ttk', pass = '$mk', maquyen = '$mq'
                                , trangthai = '$tt' WHERE username = '$username'";
            mysqli_query($cnn, $updateAccountSQL);
            header("Location: admin.php?chuyentrang=1&page=".$page."");
        }
        if(isset($_POST['add']))
        {
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                    <div class='col-4 position-fixed'>
                        <form class='bg-light form-inline' action='admin.php?chuyentrang=1&page=".$page."' method='POST'>
                            <fieldset>
                                <legend>Thông tin tài khoản</legend>
                                <div class='mb-1'>
                                    <input class='btn btn-primary' type='submit' value='Cancel'>
                                </div>
                                <div class='mb-3'>
                                    <lable>Tên tài khoản</lable>
                                    <input class='form-control' type='text' name='ttk'>
                                </div>
                                <div class='mb-3'>
                                    <lable>Mật khẩu</lable>
                                    <input class='form-control' type='text' name='mk'>
                                </div>
                                <div class='mb-3'>
                                    <lable>Quyền</lable>
                                    <input class='form-control' type='text' name='mq'>
                                </div>
                                <div class='mb-3'>
                                    <lable>Trạng thái</lable>
                                    <input class='form-control' type='text' name='tt'>
                                </div>
                                <div class='mb-1'>
                                <input class='btn-primary form-control' type='submit' name='doneadd' value='Add'>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class='col-4'></div>
                </div>";
        }
        if(isset($_POST['doneadd']))
        {
            $ttk = isset($_POST['ttk']) ? $_POST['ttk'] : '';
            $mk = isset($_POST['mk']) ? $_POST['mk'] : '';
            $mq = isset($_POST['mq']) ? $_POST['mq'] : '';
            $tt = isset($_POST['tt']) ? $_POST['tt'] : '';
            $insertSQL = "INSERT INTO `taikhoan`(`username`, `pass`, `trangthai`, `maquyen`)
                        VALUES ('$ttk', '$mk', '$tt', '$mq')";
            mysqli_query($cnn, $insertSQL);
            header("Location: admin.php?chuyentrang=1&page=".$page."");
        }
        $sql_total = "SELECT * FROM taikhoan";
        $records = mysqli_query( $cnn, $sql_total) or die ("sai");
        $total_records = mysqli_num_rows($records);
        $total_page = ceil($total_records/$limit);
        $output .= "</tbody>
                </table>";
        if($page > 1 && $total_page > 1)
        {
            $prev = "<a href='admin.php?chuyentrang=1&page=".($page-1)."' class='col-1 btn border border-primary'>Prev</a>";
        }
        else
        {
            $prev = "<div class='col-1'></div>";
        }
        // Lặp khoảng giữa
        $trang = "";
        for($i = 1; $i <= $total_page; $i++)
        {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if($i == $page)
            {
                $trang .= "<a class='col-1 btn btn-primary'>".$i."</a>";
            }
            else
            {
                $trang .= "<a href='admin.php?chuyentrang=1&page=".$i."' class='col-1 btn border border-primary'>".$i."</a>";
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        
        if ($page < $total_page && $total_page > 1)
        {
            $next = "<a href='admin.php?chuyentrang=1&page=".($page+1)."' class='col-1 btn border border-primary'>Next</a>";
        }
        else
        {
            $next = "<div class='col-1'></div>";
        }
        echo "<div class='mt-3 d-flex justify-content-between'>".$prev."<div>".$trang."</div>".$next."</div>";
        echo "<div class='mt-3'>".$output."</div>";
        echo "<div class='d-flex justify-content-between' mb-5>".$prev."<div>".$trang."</div>".$next."</div>";
    }   
    mysqli_close($cnn);
?>