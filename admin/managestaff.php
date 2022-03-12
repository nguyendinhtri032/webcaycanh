<?php
    echo "<div class='col-12 text-center text-primary p-3 h3'>DANH SÁCH NHÂN VIÊN</div>";
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
    $sql = "SELECT * FROM nhanvien  LIMIT $start, $limit";
    $result = mysqli_query($cnn, $sql);
    $output = "";
    $i = 0;
    if(mysqli_num_rows($result)>=0)
    {
        $output .=
        "<table class='table table-bordered border-primary'>
            <thead>
                <form action='admin.php?chuyentrang=4&page=".$page."' method='POST'>
                    <tr>
                        <th class='col-1 text-primary'>STT</th>
                        <th class='col-1 text-primary'>Mã nhân viên</th>
                        <th class='col-2 text-primary'>Tên nhân viên</th>
                        <th class='col-2 text-primary'>Giới tính</th>
                        <th class='col-2 text-primary'>Chức vụ</th>
                        <th class='col-2 text-primary'>Tên tài khoản</th>
                        <th class='col-1'><input class='btn btn-primary form-control' type='submit' name='add' value='Add Staff'></th>
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
            <form action='admin.php?chuyentrang=4&page=".$page."&manhanvien=".$row['manhanvien']."' method='POST'>
                <tr>
                    <td>".$i."</td>
                    <td>".$row['manhanvien']."</td>
                    <td>".$row['tennhanvien']."</td>
                    <td>".$row['gioitinh']."</td>
                    <td>".$row['chucvu']."</td>
                    <td>".$row['username']."</td>
                    <td><input class='btn border border-primary form-control' type='submit' name='edit' value='Edit'></td>
                    <td><input class='btn border border-primary form-control' type='submit' name='delete' value='Delete'</td>
                </tr>
            </form>";
        }
        if(isset($_POST['delete']))
        {
            $manhanvien = $_GET['manhanvien'];
            mysqli_query($cnn, "DELETE FROM nhanvien WHERE manhanvien = '$manhanvien'");
            header("Location: admin.php?chuyentrang=4&page=".$page."");
        }
        if(isset($_POST['edit']))
        {
            $manhanvien = $_GET['manhanvien'];
            $productSQL = "SELECT * FROM nhanvien WHERE manhanvien = '$manhanvien'";
            $product = mysqli_query($cnn, $productSQL);
            while($row=mysqli_fetch_array($product))
            {
                $manhanvien = $row['manhanvien'];								
                $tennhanvien = $row['tennhanvien'];
                $username = $row['username'];					
                $chucvu = $row['chucvu'];
                $gioitinh = $row['gioitinh'];
                $username = $row['username'];
            }
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                        <div class='col-4 position-fixed'>
                            <form class='bg-light form-inline' action='admin.php?chuyentrang=4&page=".$page."&manhanvien=".$manhanvien."' method='POST'>
                                <fieldset>
                                    <div class='mb-1'>
                                        <input class='btn btn-primary' type='submit' value='Cancel'>
                                    </div>
                                    <legend>Thông tin nhân viên</legend>
                                    <div class='mb-3'>
                                        <lable>Mã nhân viên</lable>
                                        <textarea class='form-control' type='text' name='mnv' rows='1'>".$manhanvien."</textarea>
                                    </div>    
                                    <div class='mb-3'>
                                        <lable>Tên nhân viên</lable>
                                        <textarea class='form-control' type='text' name='tnv' rows='1'>".$tennhanvien."</textarea>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Giới tính</lable>
                                        <select class='form-select' name='gt' value=".$gioitinh.">
                                            <option value='0'>Nữ</option>
                                            <option value='1'>Nam</option>
                                        </select>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Chức vụ</lable>
                                        <textarea class='form-control' type='text' name='cv' rows='1'>".$chucvu."</textarea>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Tên tài khoản</lable>
                                        <textarea class='form-control' type='text' name='ttk' rows='1'>".$username."</textarea>
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
            $manhanvien = $_GET['manhanvien'];
            $mnv = isset($_POST['mnv']) ? $_POST['mnv'] : $manhanvien;
            $tnv = isset($_POST['tnv']) ? $_POST['tnv'] : $tennhanvien;
            $cv = isset($_POST['cv']) ? $_POST['cv'] : $chucvu;
            $gt = isset($_POST['gt']) ? $_POST['gt'] : $gioitinh;
            $ttk = isset($_POST['ttk']) ? $_POST['ttk'] : $username;
            $updateSQL = "UPDATE nhanvien SET manhanvien = '$mnv', tennhanvien = '$tnv', gioitinh = '$gt'
                            , chucvu = '$cv', username = '$ttk' WHERE manhanvien = '$manhanvien'";
            mysqli_query($cnn, $updateSQL);
            header("Location: admin.php?chuyentrang=4&page=".$page."");
        }
        if(isset($_POST['add']))
        {
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                        <div class='col-4 position-fixed'>
                            <form class='bg-light form-inline' action='admin.php?chuyentrang=4&page=".$page."' method='POST'>
                                <fieldset>
                                    <div class='mb-1'>
                                        <input class='btn btn-primary' type='submit' value='Cancel'>
                                    </div>
                                    <legend>Thông tin nhân viên</legend>
                                    <div class='mb-3'>
                                        <lable>Mã nhân viên</lable>
                                        <input class='form-control' type='text' name='mnv'>
                                    </div>    
                                    <div class='mb-3'>
                                        <lable>Tên nhân viên</lable>
                                        <input class='form-control input-char-count' maxlength='150' type='text' name='tnv'>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Giới tính</lable>
                                        <select class='form-select' name='gt'>
                                            <option value='0'>Nữ</option>
                                            <option value='1'>Nam</option>
                                        </select>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Chức vụ</lable>
                                        <input class='form-control' type='text' name='cv'>
                                    </div>
                                    <div class='mb-3'>
                                        <lable>Tên tài khoản</lable>
                                        <input class='form-control' type='text' name='ttk'>
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
            $mnv = isset($_POST['mnv']) ? $_POST['mnv'] : '';
            $tnv = isset($_POST['tnv']) ? $_POST['tnv'] : '';
            $cv = isset($_POST['cv']) ? $_POST['cv'] : '';
            $gt = isset($_POST['gt']) ? $_POST['gt'] : '';
            $insertSQL = "INSERT INTO `nhanvien`(`tennhanvien`, `gioitinh`, `chucvu`, `manhanvien`)
                        VALUES ('$tnv', '$gt', '$cv', '$mnv')";
            mysqli_query($cnn, $insertSQL);
            header("Location: admin.php?chuyentrang=4&page=".$page."");
        }
        $sql_total = "SELECT * FROM nhanvien";
        $records = mysqli_query( $cnn, $sql_total) or die ("sai");
        $total_records = mysqli_num_rows($records);
        $total_page = ceil($total_records/$limit);
        $output .= "</tbody>
                </table>";
        if($page > 1 && $total_page > 1)
        {
            $prev = "<a href='admin.php?chuyentrang=4&page=".($page-1)."' class='col-1 btn border border-primary'>Prev</a>";
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
                $trang .= "<a href='admin.php?chuyentrang=4&page=".$i."' class='col-1 btn border border-primary'>".$i."</a>";
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        
        if ($page < $total_page && $total_page > 1)
        {
            $next = "<a href='admin.php?chuyentrang=4&page=".($page+1)."' class='col-1 btn border border-primary'>Next</a>";
        }
        else
        {
            $next = "<div class='col-1'></div>";
        }
        echo "<div class='mt-3 d-flex justify-content-between'>".$prev."<div>".$trang."</div>".$next."</div>";
        echo "<div class='mt-3'>".$output."</div>";
        echo "<div class='d-flex justify-content-between mb-5'>".$prev."<div>".$trang."</div>".$next."</div>";
    }
    mysqli_close($cnn);
?>