<?php
    echo "<div class='col-12 text-center text-primary p-3 h3'>DANH SÁCH KHÁCH HÀNG</div>";
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
    $sql = "SELECT * FROM khachhang  LIMIT $start, $limit";
    $result = mysqli_query($cnn, $sql);
    $output = "";
    $i = 0;
    if(mysqli_num_rows($result)>=0)
    {
        $output .= "
        <table class='table table-bordered border-primary'>
        <thead>
            <form action='admin.php?chuyentrang=3&page=".$page."' method='POST'>
                <tr>
                    <th class='col-1 text-primary'>STT</th>
                    <th class='col-1 text-primary'>Mã khách hàng</th>
                    <th class='col-2 text-primary'>Tên khách hàng</th>
                    <th class='col-2 text-primary'>Tên tài khoản</th>
                    <th class='col-1 text-primary'>Giới tính</th>
                    <th class='col-1 text-primary'>Số điện thoại</th>
                    <th class='col-2 text-primary'>Địa chỉ</th>
                    <th class='col-1'><input class='btn btn-primary form-control' type='submit' name='add' value='Add Customer'></th>
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
            <form action='admin.php?chuyentrang=3&page=".$page."&makhachhang=".$row['makhachhang']."' method='POST'>
                <tr>
                    <td>".$i."</td>
                    <td>".$row['makhachhang']."</td>
                    <td>".$row['tenkhachhang']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['gioitinh']."</td>
                    <td>".$row['sdt']."</td>
                    <td>".$row['diachi']."</td>
                    <td><input class='btn border border-primary form-control' type='submit' name='edit' value='Edit'></td>
                    <td><input class='btn border border-primary form-control' type='submit' name='delete' value='Delete'</td>
                </tr>
            </form>
           ";
        }   
        if(isset($_POST['delete']))
        {
            $makhachhang = $_GET['makhachhang'];
            mysqli_query($cnn, "DELETE FROM khachhang WHERE makhachhang = '$makhachhang'");
            header("Location: admin.php?chuyentrang=3&page=".$page."");
        }
        if(isset($_POST['edit']))
        {
            $makhachhang = $_GET['makhachhang'];
            $productSQL = "SELECT * FROM khachhang WHERE makhachhang = '$makhachhang'";
            $product = mysqli_query($cnn, $productSQL);
            while($row=mysqli_fetch_array($product))
            {
                $makhachhang = $row['makhachhang'];								
                $tenkhachhang = $row['tenkhachhang'];
                $gioitinh = $row['gioitinh'];					
                $sodienthoai = $row['sdt'];
                $diachi = $row['diachi'];
            }
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                        <div class='col-4 position-fixed'>
                            <form class='bg-light form-inline' action='admin.php?chuyentrang=3&page=".$page."&makhachhang=$makhachhang' method='POST'>
                                <fieldset class=''>
                                    <div class='mb-1'>
                                        <input class='btn btn-primary' type='submit' value='Cancel'>
                                    </div>
                                    <legend>Phiếu nhập</legend>
                                    <div class='mb-3'>
                                        <lable>Mã khách hàng</lable>
                                        <input class='form-control' type='text' name='mkh' value=".$makhachhang.">
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Tên khách hàng</lable>
                                        <input class='form-control' type='text' name='tkh' value=".$tenkhachhang.">
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Giới tính</lable>
                                        <select class='form-select' name='gt'>
                                            <option value='0'>Nữ</option>
                                            <option value='1'>Nam</option>
                                        </select>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Số điện thoại</lable>
                                        <input class='form-control' type='text' name='sdt' value=".$sodienthoai.">
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Địa chỉ</lable>
                                        <input class='form-control' type='text' name='dc' value=".$diachi.">
                                    </div>
                                    <div class='mb-1'>
                                        <input class='btn-primary form-control' type='submit' name='save' value='Save'>
                                    </div>
                                </fieldset>        
                            </form>
                        </div>
                    <div class='col-4'></div>
                </div>";
        }
        if(isset($_POST['save']))
        {
            $makhachhang = $_GET['makhachhang'];
            $mkh = isset($_POST['mkh']) ? $_POST['mkh'] : $makhachhang;
            $tkh = isset($_POST['tkh']) ? $_POST['tkh'] : $tenkhachhang;
            $gt = isset($_POST['gt']) ? $_POST['gt'] : $gioitinh;
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : $sodienthoai;
            $dc = isset($_POST['dc']) ? $_POST['dc'] : $diachi;
            $updateSQL = "UPDATE khachhang SET makhachhang = '$mkh', tenkhachhang = '$tkh', gioitinh = '$gt'
                        , sodienthoai = '$sdt', diachi = '$dc' WHERE makhachhang = '$makhachhang'";
            mysqli_query($cnn, $updateSQL);
            header("Location: admin.php?chuyentrang=3&page=".$page."");
        }
        if(isset($_POST['add']))
        {
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                    <div class='col-4 position-fixed'>
                        <form class='bg-light form-inline' action='admin.php?chuyentrang=3&page=".$page."' method='POST'>
                            <fieldset>
                            <legend>Thông tin khách hàng</legend>
                            <div class='mb-1'>
                                <input class='btn btn-primary' type='submit' value='Cancel'>
                            </div>
                            <div class='mb-3'>
                                <lable>Mã khách hàng</lable>
                                <input class='form-control' type='text' name='mkh'>      
                            </div>
                            <div class='mb-3'>
                                <lable>Tên khách hàng</lable>
                                <input class='form-control' type='text' name='tkh'>
                            </div>
                            <div class='mb-3'>
                                <lable>Giới tính</lable>
                                <select class='form-select' name='gt'>
                                    <option value='0'>Nữ</option>
                                    <option value='1'>Nam</option>
                                </select>
                            </div>
                            <div class='mb-3'>
                                <lable>Số điện thoại</lable>
                                <input class='form-control' type='text' name='sdt'>
                            </div>
                            <div class='mb-3'>
                                <lable>Địa chỉ</lable>
                                <input class='form-control' type='text' name='dc'>
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
            $mkh = isset($_POST['mkh']) ? $_POST['mkh'] : '';
            $tkh = isset($_POST['tkh']) ? $_POST['tkh'] : '';
            $gt = isset($_POST['gt']) ? $_POST['gt'] : '';
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $dc = isset($_POST['dc']) ? $_POST['dc'] : '';
            $insertSQL = "INSERT INTO `khachhang`(`makhachhang`, `tenkhachhang`, `sdt`, `diachi`, `gioitinh`)
                        VALUES ('$mkh', '$tkh', '$sdt', '$dc', '$gt')";
            mysqli_query($cnn, $insertSQL);
            header("Location: admin.php?chuyentrang=3&page=".$page."");
        }
        $sql_total = "SELECT * FROM khachhang";
        $records = mysqli_query( $cnn, $sql_total) or die ("sai");
        $total_records = mysqli_num_rows($records);
        $total_page = ceil($total_records/$limit);
        $output .=  "</tbody>
                </table>";
        if($page > 1 && $total_page > 1)
        {
            $prev = "<a href='admin.php?chuyentrang=3&page=".($page-1)."' class='col-1 btn border border-primary'>Prev</a>";
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
                $trang .= "<a href='admin.php?chuyentrang=3&page=".$i."' class='col-1 btn border border-primary'>".$i."</a>";
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev

        if ($page < $total_page && $total_page > 1)
        {
            $next = "<a href='admin.php?chuyentrang=3&page=".($page+1)."' class='col-1 btn border border-primary'>Next</a>";
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