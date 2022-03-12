-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2021 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webcaycanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `masanpham` char(50) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`masanpham`, `dongia`, `soluong`, `madonhang`) VALUES
('HH04', 320000, 1, 26),
('HH02', 150000, 1, 26),
('HH01', 280000, 1, 27),
('HH01', 280000, 1, 28),
('HH04', 320000, 1, 29),
('HH02', 150000, 1, 30),
('HH01', 280000, 1, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtiensanpham` int(11) NOT NULL,
  `maphieunhap` char(50) NOT NULL,
  `machitietphieunhap` char(50) NOT NULL,
  `masanpham` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`dongia`, `soluong`, `tongtiensanpham`, `maphieunhap`, `machitietphieunhap`, `masanpham`) VALUES
(15000, 10, 150000, 'PN1', 'CT01', 'SD01'),
(15000, 10, 150000, 'PN1', 'CT02', 'SD02'),
(20000, 10, 200000, 'PN1', 'CT03', 'SD03'),
(30000, 10, 300000, 'PN1', 'CT04', 'SD04'),
(15000, 10, 150000, 'PN1', 'CT05', 'SD05'),
(15000, 10, 150000, 'PN1', 'CT06', 'SD06'),
(20000, 10, 200000, 'PN1', 'CT07', 'SD07'),
(15000, 10, 150000, 'PN1', 'CT08', 'SD08'),
(20000, 10, 200000, 'PN1', 'CT09', 'SD09'),
(20000, 10, 200000, 'PN1', 'CT10', 'SD10'),
(50000, 10, 500000, 'PN1', 'CT11', 'SD11'),
(30000, 10, 300000, 'PN1', 'CT12', 'SD12'),
(15000, 10, 150000, 'PN1', 'CT13', 'SD13'),
(20000, 10, 200000, 'PN1', 'CT14', 'SD14'),
(15000, 10, 150000, 'PN1', 'CT15', 'SD15'),
(35000, 10, 350000, 'PN1', 'CT16', 'XR01'),
(50000, 10, 500000, 'PN1', 'CT17', 'XR02'),
(30000, 10, 300000, 'PN1', 'CT18', 'XR03'),
(20000, 10, 200000, 'PN1', 'CT19', 'XR04'),
(50000, 10, 500000, 'PN1', 'CT20', 'XR05'),
(60000, 10, 600000, 'PN1', 'CT21', 'XR06'),
(35000, 10, 350000, 'PN1', 'CT22', 'XR07'),
(30000, 10, 300000, 'PN1', 'CT23', 'XR08'),
(35000, 10, 350000, 'PN1', 'CT24', 'XR09'),
(25000, 10, 250000, 'PN1', 'CT25', 'XR10'),
(20000, 10, 200000, 'PN1', 'CT26', 'XR11'),
(30000, 10, 300000, 'PN1', 'CT27', 'XR12'),
(30000, 10, 300000, 'PN1', 'CT28', 'XR13'),
(35000, 10, 350000, 'PN1', 'CT29', 'XR14'),
(25000, 10, 250000, 'PN1', 'CT30', 'XR15'),
(200000, 10, 2000000, 'PN2', 'CT31', 'HL01'),
(250000, 10, 2500000, 'PN2', 'CT32', 'HL02'),
(300000, 10, 3000000, 'PN2', 'CT33', 'HL03'),
(250000, 10, 2500000, 'PN2', 'CT34', 'HL04'),
(150000, 10, 1500000, 'PN2', 'CT35', 'HL05'),
(200000, 10, 2000000, 'PN2', 'CT36', 'HL06'),
(300000, 10, 3000000, 'PN2', 'CT37', 'HL07'),
(250000, 10, 2500000, 'PN2', 'CT38', 'HL08'),
(250000, 10, 2500000, 'PN2', 'CT39', 'HL09'),
(200000, 10, 2000000, 'PN2', 'CT40', 'HL10'),
(300000, 10, 3000000, 'PN2', 'CT41', 'HL11'),
(300000, 10, 3000000, 'PN2', 'CT42', 'HL12'),
(250000, 10, 2500000, 'PN2', 'CT43', 'HL13'),
(250000, 10, 2500000, 'PN2', 'CT44', 'HL14'),
(200000, 10, 200000, 'PN2', 'CT45', 'HL15'),
(280000, 10, 2800000, 'PN3', 'CT46', 'HH01'),
(150000, 10, 1500000, 'PN3', 'CT47', 'HH02'),
(100000, 10, 1000000, 'PN3', 'CT48', 'HH03'),
(320000, 10, 3200000, 'PN3', 'CT49', 'HH04'),
(250000, 10, 2500000, 'PN3', 'CT50', 'HH05'),
(260000, 10, 2600000, 'PN3', 'CT51', 'HH06'),
(200000, 10, 200000, 'PN3', 'CT52', 'HH07'),
(260000, 10, 2600000, 'PN3', 'CT53', 'HH08'),
(150000, 10, 1500000, 'PN3', 'CT54', 'HH09'),
(100000, 10, 1000000, 'PN3', 'CT55', 'HH10'),
(240000, 10, 2400000, 'PN3', 'CT56', 'HH11'),
(150000, 10, 1500000, 'PN3', 'CT57', 'HH12'),
(250000, 10, 2500000, 'PN3', 'CT58', 'HH13'),
(280000, 10, 2800000, 'PN3', 'CT59', 'HH14'),
(300000, 10, 3000000, 'PN3', 'CT60', 'HH15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `madanhmuc` char(50) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`madanhmuc`, `tendanhmuc`) VALUES
('DH', 'Đơn hàng'),
('SP', 'Sản phẩm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madonhang` int(50) NOT NULL,
  `makhachhang` int(50) NOT NULL,
  `manhanvien` char(50) NOT NULL,
  `ngaymua` text NOT NULL,
  `tongtiendonhang` int(11) NOT NULL,
  `tinhtrang` varchar(50) NOT NULL,
  `phuongthucthanhtoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madonhang`, `makhachhang`, `manhanvien`, `ngaymua`, `tongtiendonhang`, `tinhtrang`, `phuongthucthanhtoan`) VALUES
(28, 5, 'NV1', '0000-00-00', 280000, 'Chưa giao hàng', 'Thanh toán khi nhận hàng'),
(29, 5, 'NV1', '0000-00-00', 320000, 'Chưa giao hàng', 'Thanh toán khi nhận hàng'),
(30, 5, 'NV1', '0000-00-00', 150000, 'Chưa giao hàng', 'Thanh toán khi nhận hàng'),
(31, 5, 'NV1', '10/05/2021', 280000, 'Chưa giao hàng', 'Thanh toán khi nhận hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` int(50) NOT NULL,
  `tenkhachhang` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `gioitinh` varchar(3) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `tenkhachhang`, `sdt`, `diachi`, `gioitinh`, `username`) VALUES
(3, '1', 1, '1', '1', 'tri'),
(4, 'trí', 113, '38 tây hòa', 'Nam', 'ndt'),
(5, '3', 3, '3', 'Nam', '3'),
(6, 'admin', 9123456, '273 An dương vương p3 q5', 'Nam', 'admin'),
(7, 'v', 0, 'v', 'Nam', 'v');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` varchar(50) NOT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('HH', 'HOA HỒNG'),
('HL', 'HOA LAN'),
('SD', 'SEN ĐÁ'),
('XR', 'XƯƠNG RỒNG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `tennhacungcap` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `manhacungcap` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`tennhacungcap`, `diachi`, `dienthoai`, `manhacungcap`) VALUES
('An Nhiên  Garden ', '375 Man Thiện, Phường Tăng Nhơn Phú A,  Tp Thủ Đức', 911955357, 'NCC1'),
('Đình Trí Flower', '173 Đình Phong Phú, Phường Tăng Nhơn Phú B, Tp Thủ', 964625213, 'NCC2'),
('Thiên đường hoa hồng', '273 An Dương Vương, Phường 3, Quận 5, Tp Hồ Chí Mi', 337948940, 'NCC3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `tennhanvien` varchar(50) NOT NULL,
  `gioitinh` varchar(3) NOT NULL,
  `chucvu` varchar(50) NOT NULL,
  `manhanvien` char(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`tennhanvien`, `gioitinh`, `chucvu`, `manhanvien`, `username`) VALUES
('admin', 'nam', 'admin', 'admin', 'admin'),
('Nguyễn Đình Trí', '0', 'Chuyên viên quản lí bán hàng', 'NV1', 'TKNV1'),
('Huỳnh Hoàng Phúc', '0', 'Chuyên viên quản lí xuất nhập hàng', 'NV2', 'TKNV2'),
('Thái Phương Nam', '0', 'Chuyên viên quản lí khách hàng', 'NV3', 'TKNV3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `manhacungcap` varchar(50) NOT NULL,
  `manhanvien` varchar(50) NOT NULL,
  `tongtienphieunhap` int(11) NOT NULL,
  `maphieunhap` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`manhacungcap`, `manhanvien`, `tongtienphieunhap`, `maphieunhap`) VALUES
('NCC1', 'NV2', 8250000, 'PN1'),
('NCC2', 'NV2', 36500000, 'PN2'),
('NCC3', 'NV2', 32900000, 'PN3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `tenquyen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `maquyen` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`tenquyen`, `maquyen`) VALUES
('khách hàng', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyendanhmuc`
--

CREATE TABLE `quyendanhmuc` (
  `maquyen` char(50) NOT NULL,
  `madanhmuc` char(50) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `tensanpham` varchar(50) NOT NULL,
  `dongia` int(50) NOT NULL,
  `maloai` varchar(50) NOT NULL,
  `masanpham` char(50) NOT NULL,
  `chitietsanpham` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`tensanpham`, `dongia`, `maloai`, `masanpham`, `chitietsanpham`, `anh`) VALUES
('Hoa hồng Claire-Austin', 280000, 'HH', 'HH01', 'Hoa thường mọc theo chùm từ 3-5 bông hoa, khi trồng ở nơi có khí hậu mát mẻ hoa sẽ có phom cuộn tròn nhìn rất đẹp mắt với chiếc nụ khum khum có sắc vàng lợt, khi nở to dần thành màu kem trắng điển hình như món Musk ở Anh.', 'HH01.jpg'),
('Hoa hồng cổ leo Hải Phòng ', 150000, 'HH', 'HH02', 'Một giống hoa hồng cổ của Việt Nam lại cho hoa đẹp, màu hoa đỏ nhung mịn màngMột giống hoa hồng cổ của Việt Nam lại cho hoa đẹp, màu hoa đỏ nhung mịn màng. ', 'HH02.jpg'),
('Hoa hồng leo Constance-Spry', 100000, 'HH', 'HH03', 'Hoa hồng leo Constance Spry rose được nhân giống bởi David C. H. Austin (Vương Quốc Anh, trước năm 1961). Cây hồng Constance Spry rose có hoa trung tâm màu hồng nhạt đến hồng nhạt. Hương thơm vừa phải', 'HH03.jpg'),
('Hoa hồng leo Pháp salmanasar-rose', 320000, 'HH', 'HH04', 'Hoa hồng leo Pháp salmanasar-rose là một loại hoa phổ biến và cực kì ưa chuông trên thế. Màu sắc mịn màng cùng hương thơm nhẹ dịu. Được nhập và phổ biến tại Việt Nam vào năm 2015.Được ưa chuộng bởi sức sống cao cùng khả năng ra hoa nhanh', 'HH04.jpg'),
('Hoa hồng Louise-Odier', 250000, 'HH', 'HH05', 'Hoa hồng ngoại Louise Odier rose được nhân giống bởi Jacques-Julien Margottin père. Cây hoa hồng Louise Odier rose có hoa màu hồng đậm. Hương thơm mạnh mẽ. loại hoa hồng này có khoảng 28 đến 56 cánh hoa.', 'HH05.jpg'),
('Hoa hồng ngoại Red-Eden', 260000, 'HH', 'HH06', 'Hoa hồng ngoại Red-Eden có màu đỏ thẩm dễ chịu cùng hương thơm nhẹ nhẹ. Hoa mọc thành từng chùm 2,3 bông. Được thì trường ưa chuộng', 'HH06.jpg'),
('Hoa hồng phấn nữ hoàng', 200000, 'HH', 'HH07', 'Hoa hồng phấn nữ hoàng xuất sứ từ nhân giống tại làng hoa Sa Đéc phù hợp với khi hậu Việt Nam. Cây mọc thành bụi, ra hoa sớm, hoa mịn màng thơm nhẹ', 'HH07.jpg'),
('Hoa hồng Pierre-de-Ronsard', 260000, 'HH', 'HH08', 'Pierre De Ronsard là một giống hồng đáng yêu và đang được nhiều người lựa chọn. Với khả năng phát triển mạnh mẽ, kháng bệnh tốt và cho hoa thường xuyên. Hoa hồng Pierre De Ronsard có màu hồng nhạt bên trong và màu kem bên ngoài với hương thơm mạnh mẽ', 'HH08.jpg'),
('Hoa hồng quế', 150000, 'HH', 'HH09', 'Hoa hồng quế thuộc giống hoa hồng cổ Việt Nam.  Cây sinh trưởng tốt, đề kháng tốt với  các loại bệnh, tuổi thọ cao', 'HH09.jpg'),
('Hoa hồng Rosa-banksiae', 100000, 'HH', 'HH10', 'Rosa Banksiae, tên thường gọi hoa Mộc Hương, Hường mân côi, Kim ngân Nữ, là một loài thực vật có hoa thuộc họ hoa hồng Rosaceae, có nguồn gốc từ miền Trung và miền Tây Trung Quốc', 'HH10.jpg'),
('Hoa hồng Rosa-Mister-Lincoln', 240000, 'HH', 'HH11', 'Là giống hồng thuộc dòng Hybris Tea Rose nổi tiếng thế giới với thân rất cứng cáp, mạng mẽ, cực kỳ thơm lan tỏa cả không gian lớn. Có khả năng sinh trưởng rất tốt, kháng bệnh tốt, ít tốn công chăm sóc, cho hoa nhiều, đều đặn quanh năm.', 'HH11.jpg'),
('Hoa hồng Rosa-rugosa', 150000, 'HH', 'HH12', 'Rosa rugosa là một loài hoa hồng bản địa miền đông châu Á, gồm đông bắc Trung Quốc, Nhật Bản, Hàn Quốc và đông nam Siberia. Nó mọc ở vùng ven biển, thường trên những đụn cát', 'HH12.jpg'),
('Hoa hồng Ingrid-Bergman', 250000, 'HH', 'HH13', 'Hoa hồng Ingrid-Bergman xuất xứ từ Đan Mạch có màu đỏ thẩm, có khả năng chịu nắng tốt cùng khả năng sinh trưởng cao', 'HH13.jpg'),
('Hoa hồng Nahema', 280000, 'HH', 'HH14', 'Hoa hồng Nahema có cuộn hoa tròn cùng mùi hương mạnh mẽ được mọi người ưa chuộng trên thế giới', 'HH14.jpg'),
('Hoa hồng ngoại Juliet', 300000, 'HH', 'HH15', 'Hoa hồng ngoại Juliet được xem là nữ hoàng của các loại hoa hồng, với mùi hương nhẹ dịu cùng vẽ đẹp mỉ miều. Được nhiều người săn đón trên toàn thế giới', 'HH15.jpg'),
('Lan bạch nhạn', 200000, 'HL', 'HL01', 'Bạch nhạn hay hoàng thảo bạch nhãn là một loài lan trong chi Lan hoàng thảo. Cây phân bố từ Nam Á đến Đông Nam Á. Tại Việt Nam, cây có mặt ở khu vực Đà Lạt. Vời màu trắng dịu dàng nên được rất nhiều người yêu lan lựa chọn', 'HL01.jpg'),
('Lan chuổi ngọc', 250000, 'HL', 'HL02', 'Lan chuổi ngọc xuất sứ từ Điện Biên. Mang một vẽ đẹp tao nhã, thục nữ cùng màu sắc khác biệt nên rất được ưa chuộng', 'HL02.jpg'),
('Lan dendro sonia', 300000, 'HL', 'HL03', 'Lan dendro sonia có màu tím nhẹ nhàng. Phổ biến rộng rãi với giá thành hợp lí cùng khả năng sinh trưởng cùng phát triển tốt', 'HL03.jpg'),
('Lan giáng hương hồng nhạn', 250000, 'HL', 'HL04', 'Lan giáng hương hồng nhạn là một loài lâu tàn với hương thơm nồng nàn. Thường được sử dụng trong các buổi trưng bày ', 'HL04.jpg'),
('Lan giáng hương môi quạt', 150000, 'HL', 'HL05', 'Lan giáng hương môi quạt là một loài hoa hiếm được người yêu lan săn đón. Với hình thù riêng biệt nó được xem như quốc bảo của loài lan', 'HL05.jpg'),
('Lan Hồ Điệp', 200000, 'HL', 'HL06', 'Lan Hồ Điệp là loài hoa phồ biến  ở Việt Nam với đặc tính sinh trưởng tốt cùng khả năng chống chịu cao. Nên được đông đảo mọi người lựa chọn', 'HL06.jpg'),
('Lan Kiều Tím', 300000, 'HL', 'HL07', 'Lan Kiều Tím được rất nhiếu người lựa chọn, với vẽ đẹp của rừng núi cùng mùi thơm nhẹ nhàng. Lan Kiều Tím có giá thành thấp phù hợp cho các bạn có đam mê lan', 'HL07.jpg'),
('Lan kiều vàng', 250000, 'HL', 'HL08', 'Lan kiều vàng là loại lan có thân tròn cứng mọc thành bụi với khả năng sinh trưởng tốt nên được khá nhiều người lựa chọn', 'HL08.jpg'),
('Lan phi điệp', 250000, 'HL', 'HL09', 'Phi điệp đơn hay thạch hộc kim, ngọc vạn pha lê, hoàng thảo ngọc thạch, hoàng thảo hoa sen là một loài lan trong chi Lan hoàng thảo.', 'HL09.jpg'),
('Lan quế hương', 200000, 'HL', 'HL10', 'Quế lan hương thuộc dòng phong lan dáng hương và là loại lan đơn thân, cho hoa thành dải và được đánh giá là một trong những loài hoa thơm nhất rất được ưa chuộng trong những năm vừa qua.', 'HL10.jpg'),
('Lan tam bảo sắc', 300000, 'HL', 'HL11', 'Lan Tam Bảo Sắc là một loại hoa lan thuộc chi giáng hương. Loài hoa lan này là một trong những loại lan rất phổ biến tại nước ta. Đặc điểm nổi bật cảu chi giáng hương chính là sinh sống tốt ở vùng nhiệt đới ẩm', 'HL11.jpg'),
('Lan thiên nga đen', 300000, 'HL', 'HL12', 'Lan thiên nga đen được biết đến là một loài hoa đẹp nổi bật với màu đen quý phái và huyền bí biểu tượng cho sự vĩnh cửu', 'HL12.jpg'),
('Lan trầm tím', 250000, 'HL', 'HL13', 'Lan Trầm là một trong những loại hoa phong lan quý. Trầm rừng hoa có màu tím hồng và thơm nhẹ nhàng dễ chịu như hương trầm. Hoa lan Trầm rất bền, sống khỏe, phù hợp với thời tiết của mọi miền.', 'HL13.jpg'),
('Lan Trúc Phật Bà', 250000, 'HL', 'HL14', 'Loài hoa Lan Trúc Phật Bà này hiện đang được rất nhiều dân chơi lan ưa chuộng, bởi nó đem lại những bông hoa rất đẹp, bắt mắt cùng mùi hương thơm quyến rũ, mang lại cảm giác cực kỳ dễ chịu', 'HL14.jpg'),
('Lan Vũ Nữ', 200000, 'HL', 'HL15', 'Lan vũ nữ thuộc họ phong lan được ưa chuộng trong giới chơi lan bởi vẻ đẹp sang trọng và phóng khoáng của chúng.', 'HL15.jpg'),
('Sen bánh bao', 15000, 'SD', 'SD01', 'Sen bánh bao với ngoại hình mũm mĩm đáng yêu. Các lá to tròn màu trắng nhạt như các viên sỏi nên được mọi người yêu sen lựa chọn', 'SD01.jpg'),
('Sen chuỗi ngọc bích', 15000, 'SD', 'SD02', 'Sen chuổi ngọc bích có màu xanh đậm thân dài, các lá mọc đều theo dân cây như các viên ngọc bích', 'SD02.jpg'),
('Sen đá guốc ngọc', 20000, 'SD', 'SD03', 'Sen đá guốc ngọc có thân dài màu xanh nhạt, đầu lá trong suốt dạng ống', 'SD03.jpg'),
('Sen đá hoa hồng đen', 30000, 'SD', 'SD04', 'Sen đá hoa hồng đen có màu đen đặc trưng, thích ánh nắng, càng nhiều ánh sáng màu cây càng đẹp. Cây ít ưa nước', 'SD04.jpg'),
('Sen đá nâu', 15000, 'SD', 'SD05', 'Sen đá nâu thuộc sen lá dày chứa nhiều nước bên trong, cây không ưa nước thích ánh sáng mặt trời', 'SD05.jpg'),
('Sen đá nhím đen', 15000, 'SD', 'SD06', 'Sen đá nhím đen mọc thành bụi với vô số lá nhỏ màu đen mọc lên tựa hình dáng con nhím. Cây ưa sáng, chịu hạn tốt', 'SD06.jpg'),
('Sen đá nhung viền đen', 20000, 'SD', 'SD07', 'Sen đá nhung viền đen thuộc dạng thân cây mềm. Lá cá màu xanh nhạt, viền lá màu đen, xung quanh lá có lớp lông bao phủ màu trắng', 'SD07.jpg'),
('Sen đá phật bà quan âm', 15000, 'SD', 'SD08', 'Sen đá phật bà quan âm có màu xanh nhạt, đầu lá nhọn màu nâu, tựa đài hoa sen. Sen chịu được nước và chịu hạn cao', 'SD08.jpg'),
('Sen đá rubi xanh, đỏ', 20000, 'SD', 'SD09', 'Sen đá Ruby xanh là loại sen đá được rất nhiều bạn trẻ hiện nay yêu thích:  Thích nghi tốt với nhiều điều kiện môi trường khác nhau.  Màu sắc tươi sáng, bắt mắt có sự kết hợp hài hòa giữa màu xanh ngọc và màu đỏ ruby  ', 'SD09.jpg'),
('Sen đá sỏi trắng', 20000, 'SD', 'SD10', 'Sen Đá Sỏi Trắng  mang lại vẻ đẹp giản đơn, không cầu kỳ nhưng vẫn tinh tế, nhẹ nhàng, thu hút ánh nhìn. Lá của cây có màu xanh ngọc bích, được phủ một lớp trắng…', 'SD10.jpg'),
('Sen đá thạch bích', 50000, 'SD', 'SD11', 'Sen đá ngọc bích là cây thân mềm. Lá cây có màu xanh, nhẵn nhụi, mọng nước, các lá xếp vòng xoắn như thạch bích rất đẹp mắt. ', 'SD11.jpg'),
('Sen đá thái xanh', 30000, 'SD', 'SD12', 'Sen đá thái là một loại sen đá có rất nhiều lá lá xếp chồng nên nhau, dưới góc lại thường hay mọc các cây con nhỏ nhìn rất thích mắt', 'SD12.jpg'),
('Sen đá vàng', 15000, 'SD', 'SD13', 'Sen đá vàng biểu tượng cho sự giàu sang và phú quý. Cây phù hợp để bàn làm việc, bàn làm việc, có thể trồng 3 , 5 cây vào một chậu thì sẽ đẹp hơn và mang đến cho gia chủ tài lộc...', 'SD13.jpg'),
('Sen đá viền lửa', 20000, 'SD', 'SD14', 'Sen Đá Viền Đỏ có cấu tạo dạng hoa thị với cánh màu xanh gần như xanh dương và lớp viền màu đỏ như lửa bên cánh sen rất đẹp.', 'SD14.jpg'),
('Sen đá tứ diện', 15000, 'SD', 'SD15', 'Sen Đá Tứ Phương là một loại cây mọng nước bắt nguồn từ Mexico với những chiếc lá xếp chồng lên nhau, dày đặc có màu vàng pha xanh nhẹ, ngoài viền là màu đỏ tươi…', 'SD15.jpg'),
('Xương rồng Astro', 35000, 'XR', 'XR01', 'Với ngoại hình đặc thù xương rồng Astro được  đông đảo các bạn trẻ đón nhận. Với sức sống mãnh liệt và khả năng chịu hạn cực cao nên xương rồng Astro được xem là vua của các loài xương rồng', 'XR01.jpg'),
('xương rồng bánh sinh nhật', 50000, 'XR', 'XR02', 'Xương rồng bánh sinh với hình dáng tròn mũm mĩm cùng với màu hoa sặc sỡ lên đến vài chục nên được người yêu xương rồng ưa chuộng', 'XR02.jpg'),
('Xương rồng bí xanh', 30000, 'XR', 'XR03', 'Xương rồng bí xanh có màu xanh đậm, các gai nhọn dài khắp thân. Với sức sống mãnh liệt cùng khả năng chịu hàng cao nên được đông đảo người yêu xương rồng chọn lựa', 'XR03.jpg'),
('Xương rồng bông gòn', 20000, 'XR', 'XR04', 'Xương rồng bông gòn với hình dáng nhỏ nhắn, được bao phủ bời lớp gai màu trắng mềm tựa các bông hoa xung quanh tạo nên sự đáng yêu của loại xương rồng này', 'XR04.jpg'),
('Xương rồng cầu vòng', 50000, 'XR', 'XR05', 'Xương rồng cầu vòng với ngoại hình tròn cùng các gai nhọn nhỏ li ti nên được ưa chuộng. Đặc biệt là màu hoa cam nhẹ khiến mọi người đấm say', 'XR05.jpg'),
('Xương rồng Gymno', 60000, 'XR', 'XR06', 'Xương rồng Gymno thuộc loại xương rồng ngoại. Hình dáng bắt mắt nên khá được ưa chuộng', 'XR06.jpg'),
('Xương rồng kim hổ', 35000, 'XR', 'XR07', 'Xương rồng kim hổ có màu xanh đậm, dạng hình không tròn đều mà tại các  góc cạnh thành từng múi bao quanh với vô số gai nhọn', 'XR07.jpg'),
('Xương rồng móc câu', 30000, 'XR', 'XR08', 'Xương rồng móc câu có khả năng chịu han tốt, chăm sóc dễ dàng nên được mọi người yêu thích. Đặc biệt là các gai hình móc câu đặc thù', 'XR08.jpg'),
('Xương rồng nải chuối', 35000, 'XR', 'XR09', 'Với ngoại hình tựa nải chuối  xương rồng nải chuối được các bạn trẻ thích thú với hình dáng độc lạ của mình. Xương rồng nải chuối có màu xanh đậm với các gai nhọn ở đỉnh lá', 'XR09.jpg'),
('Xương rồng san hô', 25000, 'XR', 'XR10', 'Xương rồng san hô với vẽ ngoài kì lạ tựa như san hô dưới đáy biển nên   được các bạn trẻ thích sưu tầm săn đón', 'XR10.jpg'),
('Xương rồng tai thỏ', 20000, 'XR', 'XR11', 'Xương rồng tai thỏ được rất nhiều bạn trẻ lựa chọn với hình dáng dễ thương cùng cách chăm sóc dễ dang. Xương rồng tai thò có mauu xanh nhạt, gai nhỏ, mềm', 'XR11.jpg'),
('Xương rồng thạch trụ', 30000, 'XR', 'XR12', 'Xương rồng thạch trụ các hình dáng thon dài mọc thẳng đúng xung quanh là các cây con. Gia canng2 lên cao thì có màu cam nhạt', 'XR12.jpg'),
('Xương rồng thanh sơn', 30000, 'XR', 'XR13', 'Xương rồng thanh sơn có màu xanh đậm hình dáng thẳng đứng mọc thành bụi tựa như các quả núi.  Xương rồng thanh sơn mang giá trị phongb thủ cao nên thường được trồng trong sân hoặc trưng bày', 'XR13.jpg'),
('Xương rồng tròn', 35000, 'XR', 'XR14', 'Xương rồng tròn có hình dáng tròn trĩnh đáng yêu với vô số gai nhọn cùng một màu xanh nhạt được rất nhiều người săn đón', 'XR14.jpg'),
('Xương rồng trứng chim', 25000, 'XR', 'XR15', 'Xương rồng trứng chim được khá nhiều bạn trẻ ưa chuộng với ngoại hình dễ thương cùng sức sống tốt', 'XR15.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `maquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `pass`, `trangthai`, `maquyen`) VALUES
('3', '3', 1, '1'),
('admin', 'admin', 1, '1'),
('ndt', '1', 1, '1'),
('tri', '1', 1, '1'),
('v', 'v', 1, '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`machitietphieunhap`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`madanhmuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`manhacungcap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manhanvien`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`maphieunhap`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madonhang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhachhang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
