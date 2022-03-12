    <?php
    echo "<div class='col-12 text-center text-primary p-3 h3'>DANH SÁCH PHIẾU NHẬP</div>";
    $cnn = mysqli_connect("localhost", "root", "", "webcaycanh") or die (" khong ket noi duoc");
    $limit = 20;
    $GLOBALS['page'] = "";
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM chitietphieunhap  LIMIT $start, $limit";
    $result = mysqli_query($cnn, $sql);
    $output = "";
    $i = 0;
    if(mysqli_num_rows($result)>=0)
    {
        $output .=
        "<table class='table table-bordered border-primary'>
            <thead'>
                <form action='admin.php?chuyentrang=7&page=".$page."' method='POST'>
                    <tr>
                        <th class='col-1 text-primary'>STT</th>
                        <th class='col-2 text-primary'>Mã chi tiết phiếu nhập</th>
                        <th class='col-1 text-primary'>Mã phiếu nhập</th>
                        <th class='col-1 text-primary'>Mã sản phẩm</th>
                        <th class='col-2 text-primary'>Đơn giá</th>
                        <th class='col-1 text-primary'>Số lượng</th>
                        <th class='col-2 text-primary'>Tổng tiền sản phẩm</th>
                        <th class='col-1'><input class='btn btn-primary form-control' type='submit' name='import' value='Import'></th>
                        <th class='col-1'><input class='btn btn-primary form-control' type='submit' name='deleteall' value='Delete all'></th>
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
            <form action='admin.php?chuyentrang=7&page=".$page."&machitietphieunhap=".$row['machitietphieunhap']."' method='POST'>
                <tr>
                    <td>".$i."</td>
                    <td>".$row['machitietphieunhap']."</td>
                    <td>".$row['maphieunhap']."</td>
                    <td>".$row['masanpham']."</td>
                    <td>".$row['dongia']."</td>
                    <td>".$row['soluong']."</td>
                    <td>".$row['tongtiensanpham']."</td>
                    <td><input class='btn border border-primary form-control' type='submit' name='edit' value='Edit'></td>
                    <td><input class='btn border border-primary form-control' type='submit' name='delete' value='Delete'</td>
                </tr>
            </form>";
        }
        if(isset($_POST['delete']))
        {
            $machitietphieunhap = $_GET['machitietphieunhap'];
            mysqli_query($cnn, "DELETE FROM chitietphieunhap WHERE machitietphieunhap = '$machitietphieunhap'");
            header("Location: admin.php?chuyentrang=7&page=".$page."");
        }
        // if(isset($_POST['deleteall']))
        // {
        //     $deleteSQL = "";
        //     echo "<script>
        //         let cf = confirm('Bạn có muốn xóa bảng này không?');
        //         if(cf == true)
        //         {
        //             $deleteSQL = 'DELETE FROM chitietphieunhap';
        //         }
        //     </script>";
        //     if($deleteSQL != "")
        //     {
        //         echo "hello";
        //         // mysqli_query($cnn, 'DELETE FROM chitietphieunhap');
        //     }
        // }
        if(isset($_POST['edit']))
        {
            $machitietphieunhap = $_GET['machitietphieunhap'];
            $productSQL = "SELECT * FROM chitietphieunhap WHERE machitietphieunhap = '$machitietphieunhap'";
            $product = mysqli_query($cnn, $productSQL);
            while($row=mysqli_fetch_array($product))
            {
                $machitietphieunhap = $row['machitietphieunhap'];								
                $maphieunhap = $row['maphieunhap'];
                $masanpham = $row['masanpham'];					
                $dongia = $row['dongia'];
                $soluong = $row['soluong'];
                $tongtiensanpham = $row['tongtiensanpham'];
            }
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                    <div class='col-4 position-fixed'>
                        <form class='bg-light form-inline' action='admin.php?chuyentrang=7&page=".$page."&machitietphieunhap=".$machitietphieunhap."' method='POST'>
                            <fieldset>
                                <div class='mb-1'>
                                    <input class='btn btn-primary' type='submit' value='Cancel'>
                                </div>
                                <legend>Phiếu nhập</legend>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Mã chi tiết phiếu nhập</lable>
                                    <input class='form-control' type='text' name='mctpn' value='$machitietphieunhap'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Mã phiếu nhập</lable>
                                    <input class='form-control' type='text' name='mpn' value='$maphieunhap'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Mã sản phẩm</lable>
                                    <input class='form-control' type='text' name='msp' value='$masanpham'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Đơn giá</lable>
                                    <input class='form-control' type='text' name='dg' value='$dongia'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Số lượng</lable>
                                    <input class='form-control' type='text' name='sl' value='$soluong'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Tổng tiền sản phẩm</lable>
                                    <input class='form-control' type='text' name='ttsp' value='$tongtiensanpham'>
                                </div>
                                <div class='mb-1'>
                                    <input class='btn-primary form-control' type='submit' name='save' value='Save'>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class='col-4'></div>
                </div>";
            echo "<script>openBox();</script>";
        }
        if(isset($_POST['save']))
        {
            $machitietphieunhap = $_GET['machitietphieunhap'];
            $mctpn = isset($_POST['mctpn']) ? $_POST['mctpn'] : $machitietphieunhap;
            $mpn = isset($_POST['mpn']) ? $_POST['mpn'] : $maphieunhap;
            $msp = isset($_POST['msp']) ? $_POST['msp'] : $masanpham;
            $dg = isset($_POST['dg']) ? $_POST['dg'] : $dongia;
            $sl = isset($_POST['sl']) ? $_POST['sl'] : $soluong;
            $ttsp = isset($_POST['ttsp']) ? $_POST['ttsp'] : $tongtiensanpham;
            $updateSQL = "UPDATE chitietphieunhap SET machitietphieunhap = '$mctpn', maphieunhap = '$mpn', masanpham = '$msp'
                        , dongia = '$dg', soluong = '$sl', tongtiensanpham = '$ttsp' WHERE machitietphieunhap = '$machitietphieunhap'";
            mysqli_query($cnn, $updateSQL);
            header("Location: admin.php?chuyentrang=7&page=".$page."");
        }
        if(isset($_POST['import']))
        {
            echo "<div class='d-flex justify-content-center'>
                    <div class='col-4'></div>
                    <div class='col-4 position-fixed'>
                        <form class='bg-light form-inline' action='admin.php?chuyentrang=7&page=".$page."' method='POST'>
                            <fieldset class=''>
                                <legend>Phiếu nhập</legend>
                                <div class='mb-1'>
                                    <input class='btn btn-primary' type='submit' value='Cancel'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Mã chi tiết phiếu nhập</lable>
                                    <input class='form-control' type='text' name='mctpn'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Mã phiếu nhập</lable>
                                    <input class='form-control' type='text' name='mpn'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Mã sản phẩm</lable>
                                    <input class='form-control' type='text' name='msp'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Đơn giá</lable>
                                    <input class='form-control' type='text' name='dg'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Số lượng</lable>
                                    <input class='form-control' type='text' name='sl'>
                                </div>
                                <div class='mb-3'>
                                    <lable class='form-lable'>Tổng tiền sản phẩm</lable>
                                    <input class='form-control' type='text' name='ttsp'>
                                </div>
                                <div class='mb-1'>
                                    <input class='btn-primary form-control' type='submit' name='doneadd' value='Add'>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class='col-4'></div>
                </div>";
            echo "<script>openBox();</script>";
        }
        if(isset($_POST['doneadd']))
        {
            $mctpn = isset($_POST['mctpn']) ? $_POST['mctpn'] : '';
            $mpn = isset($_POST['mpn']) ? $_POST['mpn'] : '';
            $msp = isset($_POST['msp']) ? $_POST['msp'] : '';
            $dg = isset($_POST['dg']) ? $_POST['dg'] : '';
            $sl = isset($_POST['sl']) ? $_POST['sl'] : '';
            $ttsp = isset($_POST['ttsp']) ? $_POST['ttsp'] : '';
            $insertSQL = "INSERT INTO `chitietphieunhap`(`dongia`, `soluong`, `tongtiensanpham`, `maphieunhap`, `machitietphieunhap`, `masanpham`)
                        VALUES ('$dg', '$sl', '$ttsp', '$mpn','$mctpn', '$msp')";
            mysqli_query($cnn, $insertSQL);
            header("Location: admin.php?chuyentrang=7&page=".$page."");
        }
        $sql_total = "SELECT * FROM chitietphieunhap";
        $records = mysqli_query( $cnn, $sql_total) or die ("sai");
        $total_records = mysqli_num_rows($records);
        $total_page = ceil($total_records/$limit);
        $output .=  "</tbody>
                </table>";
        if($page > 1 && $total_page > 1)
        {
            $prev = "<a href='admin.php?chuyentrang=7&page=".($page-1)."' class='col-1 btn border border-primary'>Prev</a>";
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
                $trang .= "<a href='admin.php?chuyentrang=7&page=".$i."' class='col-1 btn border border-primary'>".$i."</a>";
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        
        if ($page < $total_page && $total_page > 1)
        {
            $next = "<a href='admin.php?chuyentrang=7&page=".($page+1)."' class='col-1 btn border border-primary'>Next</a>";
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