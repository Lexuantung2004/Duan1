<?php


class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }


    public function home()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listtop10 = $this->modelSanPham->top10();

        $listSanPham = $this->modelSanPham->getAllSanPham();

        // Số sản phẩm mỗi trang
        $perPage = 8;

        // Trang hiện tại từ query string, mặc định là 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max(1, $page); // Không cho phép giá trị nhỏ hơn 1

        // Tổng số sản phẩm
        $totalProducts = count($listSanPham);

        // Tính tổng số trang
        $totalPages = ceil($totalProducts / $perPage);

        // Tính vị trí bắt đầu lấy sản phẩm
        $start = ($page - 1) * $perPage;

        // Lấy danh sách sản phẩm cho trang hiện tại
        $currentProducts = array_slice($listSanPham, $start, $perPage);

        // Gửi dữ liệu đến View
        require_once('./views/home.php');
    }

    public function  chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        // var_dump($listSanPhamCungDanhMuc);die();

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamdDanhMuc($sanPham['id'], $sanPham['danh_muc_id']);
        // var_dump($listSanPhamCungDanhMuc);die();
        
        if (isset($sanPham)) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }


    public function daDatHang()
    {
        $thongTinDonHang = $this->modelDonHang->getAllDonHang($_SESSION['thong_tin_don_hang']['id']);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            //    var_dump($mail['id']);die();

            // lẤy dl giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
        require_once './views/daDatHang.php';
        deleteSessionErrors();
    }


    // danh muc san pham
    public function sanPhamDanhMuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listtop10 = $this->modelSanPham->top10();

        if (isset($_GET['danh_muc_id']) && $_GET['danh_muc_id'] > 0) {
            $iddm = $_GET['danh_muc_id'];
            $spdm = $this->modelSanPham->sanPhamTheoDanhMuc($iddm);
            //var_dump($spdm);die();


            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            //    var_dump($listDanhMuc);die();
            require_once './views/sanPhamTheoDanhMuc.php';
        } else {
            header("Location: " . BASE_URL);
        }
    }


    public function timKiem()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listtop10 = $this->modelSanPham->top10();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $keyword = $_POST['keyword'] ?? '';

            $listSanPhamTimKiem = $this->modelSanPham->search($keyword);
            require_once './views/timKiemSp.php';


            // var_dump($timsp);die();
        }
    }

    public function guiBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binh_luan']) && isset($_SESSION['user_client'])) {
            // Lấy ra dl
            // var_dump($_SESSION['user_client']);die();
            // var_dump($_POST);die();

            $tai_khoan_id = $_POST['tai_khoan_id'] ?? '';
            $binh_luan = $_POST['binh_luan'] ?? '';
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // var_dump($san_pham_id);die();
            $ngay_dang = date('Y-m-d H:i:s');
            $status = $this->modelTaiKhoan->binhLuan($tai_khoan_id, $san_pham_id, $binh_luan, $ngay_dang);
            // var_dump($status);die();
            // var_dump($status);die();
            header('Location:' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }


    public function lienHe()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();


        require_once './views/lienHe.php';
    }
    public function gioiThieu()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();


        require_once './views/gioiThieu.php';
    }
}
