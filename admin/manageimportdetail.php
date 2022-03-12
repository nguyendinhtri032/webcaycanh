<h4 class='col-12 text-center'>DANH SÁCH ĐƠN HÀNG</h4>
        <?php
            $cnn = mysqli_connect("localhost", "root", "", "webcaycanh") or die (" khong ket noi duoc");
            $limit = 10;
            $page = "";
            if(isset($_GET['page']))
                {
                    $page = $_GET['page'];       
                }
            else{
                $page = 1;
            }
                $start = ($page - 1) * $limit;
            $sql = "SELECT * FROM taikhoan  LIMIT $start, $limit";
            $result = mysqli_query($cnn, $sql);
            $output = "";
            if(mysqli_num_rows($result)>0){
                $output .= "
                <table class='table'>
                <thead>
                    <tr>
                        <th class='col-3'>Tên tài khoản</th>
                        <th class='col-3'>Mật khẩu</th>
                        <th class='col-3'>Quyền</th>
                        <th class='col-3'>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>";
                while($row = mysqli_fetch_assoc($result))
                {
                    if(!isset($_GET['page']))
                    {
                        $_GET['page'] = 1;
                    }
                   $output.="
                    <form action='admin.php?chuyentrang=1&page=".$_GET['page']."&username=".$row['username']."' method='POST'>
                    <tr>
                    <td>".$row['username']."</td>
                    <td>".$row['pass']."</td>
                    <td>".$row['maquyen']."</td>
                    <td>".$row['trangthai']."</td>
                    <td><input type='submit' name='post' value='Edit'></td>
                    <td><input type='submit' name='post' value='Delete'</td>
                    </tr>
                    </form>
                   ";
                }
                if(isset($_POST['post']))
                {
                    $username = $_GET['username'];
                    switch($_POST['post'])
                    {
                        case 'Delete':
                            mysqli_query($cnn, "DELETE * FROM taikhoan WHERE username = '$username'");
                            echo "<script>window.reload();</script>";
                            break;
                        case 'Edit':
                            echo '<script>openBox();</script>';
                            $productSQL = "SELECT * FROM taikhoan WHERE username = '$username'";
                            $product = mysqli_query($cnn, $productSQL);
                            while($row=mysqli_fetch_array($product))
                            {
                                $username = $row['username'];								
                                $pass = $row['pass'];
                                $maquyen = $row['maquyen'];					
                                $trangthai = $row['trangthai'];
                            }
                            echo "<div class='boxaddProduct row' id='box'>
                                    <div class='col-4'></div>
                                        <form class='row col-4' action='admin.php?chuyentrang=1&page=".$_GET['page']."&username=$username' method='POST'>
                                            <lable>Tên tài khoản</lable>
                                            <input type='text' name='ttk' value=".$username.">
                                            <lable>Mật khẩu</lable>
                                            <input type='text' name='mk' value=".$pass.">
                                            <lable>Quyền</lable>
                                            <input type='text' name='mq' value=".$maquyen.">
                                            <lable>Trạng thái</lable>
                                            <input type='text' name='tt' value=".$trangthai.">
                                            <input type='submit' name='xong' value='Xong'>
                                        </form>
                                    <div class='col-4'></div>
                                </div>";
                                
                            if(isset($_POST['xong']))
                            {
                                if($_POST['xong'] == 'Xong')
                                {
                                    echo "<script>alert('Nam');</script>";
                                    $ttk = isset($_POST['ttk']) ? $_POST['ttk'] : $username;
                                    $mk = isset($_POST['mk']) ? $_POST['mk'] : $pass;
                                    $mq = isset($_POST['mq']) ? $_POST['mq'] : $maquyen;
                                    $tt = isset($_POST['tt']) ? $_POST['tt'] : $trangthai;
                                    // $msp = $_POST['msp'];
                                    // $tsp = $_POST['tsp'];
                                    // $ml = $_POST['ml'];
                                    // $a = $_POST['a'];
                                    // $dg = $_POST['dg'];
                                    // $ctsp = $_POST['ctsp'];
                                    $updateAccountSQL = "UPDATE taikhoan SET username = '$ttk', pass = '$mk', maquyen = '$mq'
                                                        , trangthai = '$tt' WHERE username = '$username'";
                                    mysqli_query($cnn, $updateAccountSQL);
                                    echo "<script>xong();</script>";
                                    echo "<script>window.reload();</script>";
                                }
                                
                            } 
                            break;
                    }
                }
            $sql_total = "SELECT * FROM taikhoan";
            $records = mysqli_query( $cnn, $sql_total) or die ("sai");
             $total_records = mysqli_num_rows($records);
             $total_page = ceil($total_records/$limit);
            $output .= '     </tbody>
                        </table>';
            if($page > 1 && $total_page > 1)
            {
                $output .= '<a href="admin.php?chuyentrang=5&page='.($page-1).'">Prev</a> | ';
            }
        
            // Lặp khoảng giữa
            for($i = 1; $i <= $total_page; $i++)
            {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if($i == $page)
                {
                    $output .= '<span>'.$i.'</span> | ';
                }
                else
                {
                    $output .= '<a href="admin.php?chuyentrang=5&page='.$i.'">'.$i.'</a> | ';
                }
            }
        
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($page < $total_page && $total_page > 1)
            {
                $output .= '<a href="admin.php?chuyentrang=5&page='.($page+1).'">Next</a>';
            }
            echo $output;
        }
        mysqli_close($cnn);
        ?>