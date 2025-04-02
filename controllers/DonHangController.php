<?php

class DonHangController
{
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang()
{
    // Kiểm tra trạng thái đăng nhập
    if (!isset($_SESSION['user_id'])) {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header('Location:' . BASE_URL . '?act=form-login');
        exit();
    }

    // Lấy danh sách đơn hàng
    $listDonHang = $this->modelDonHang->getAllDonHang();

    // Khởi tạo tổng doanh thu
    $tongDoanhThu = 0;

    // Lặp qua các đơn hàng để tính tổng doanh thu từ các đơn hàng đã giao thành công
    foreach ($listDonHang as $donHang) {
        if ($donHang['ten_trang_thai'] == 'Giao Thành Công') {
            $tongDoanhThu += $donHang['tong_tien'];
        }
    }

    // Truyền tổng doanh thu vào biến $data
    $data = [];
    $data['tongDoanhThu'] = $tongDoanhThu;

    // Chuyển biến $data vào view
    extract($data); // Tạo các biến từ mảng $data
    require_once './views/lichSuMuaHang.php';
}




    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // Lấy thông tin đơn hàng ở bảng don_hangs
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        //Lấy danh sách sp đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once "./views/donhang/detailDonHang.php";
    }


   
}
