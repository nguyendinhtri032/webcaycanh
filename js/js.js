function ktdk() {
    var formdangki = document.forms["formdangki"];
    var tkdk = formdangki["tkdk"].value;
    var mkdk = formdangki["mkdk"].value;
    var nlmkdk = formdangki["nlmkdk"].value;
    var hovaten = formdangki["hovaten"].value;
    var sodienthoai = formdangki["sodienthoai"].value;
    var gioitinh = formdangki["gioitinh"].value;
    if (tkdk == "") {
        alert('Bạn chưa nhập tên tài khoản!');
        formdangki["tkdk"].focus();
        return false;
    }
    if (mkdk == "") {
        alert('Bạn chưa nhập mật khẩu!');
        formdangki["tkdk"].focus();
        return false;
    }
    if (nlmkdk != mkdk) {
        alert('Nhập lạ mật khẩu không khớp!');
        formdangki["tkdk"].focus();
        return false;
    }
    if (hovaten == "") {
        alert('Bạn chưa nhập họ và tên!');
        formdangki["tkdk"].focus();
        return false;
    }
    if (sodienthoai == "") {
        alert('Bạn chưa nhập số điện thoại!');
        formdangki["sodienthoai"].focus();
        return false;
    }
    if (gioitinh == "") {
        alert('Bạn chưa nhập chọn giới tính!');
        formdangki["gioitinh"].focus();
        return false;
    }
    return true;
}


function ktdn() {
    var formdangnhap = document.forms["formdangnhap"];
    var tkdn = formdangnhap["tkdn"].value;
    var mkdn = formdangnhap["mkdn"].value;
    if (tkdn == "") {
        alert("Bạn chưa nhập tài khoản!");
        formdangnhap["tkdn"].focus();
        return false;
    }

    if (mkdn == "") {
        alert("Bạn chưa nhập mật khẩu!");
        formdangnhap["mkdn"].focus();
        return false;
    }
    return true;
}

function ktdh() {
    var formdathang = document.forms['formdathang'];
    var tenkh = formdathang['tenkh'].value;
    var diachi = formdathang['diachi'].value;
    var sdt = formdathang['sdt'].value;
    var ptthanhtoan = formdathang['ptthanhtoan'].value;
    if (tenkh == "") {
        alert("Bạn chưa nhập họ và tên khách hàng!");
        formdathang["tenkh"].focus();
        return false;
    }
    if (diachi == "") {
        alert("Bạn chưa nhập địa chỉ!");
        formdathang["diachi"].focus();
        return false;
    }
    if (sdt == "") {
        alert("Bạn chưa nhập số điện thoại!");
        formdathang["sdt"].focus();
        return false;
    }
    if (ptthanhtoan == "") {
        alert("Bạn chưa chọn phương thức thanh toán!");
        formdathang["ptthanhtoan"].focus();
        return false;
    }
    return true;
}