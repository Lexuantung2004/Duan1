<?php

class TaiKhoanController
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

    public function formLogin()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            header('Location:' . BASE_URL);
            exit();
        }
        require_once('./views/auth/formLogin.php');
        deleteSessionErrors();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay dl
            $email = $_POST['email'];
            // var_dump($email);die();
            $password = $_POST['password'];

            // xử lý kiểm tra thông tin đăng nhập
            $result = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($result);
            // die;
            //    var_dump($user);die();

            if (is_array($result)) {
                // Đăng nhập thành công
                $email = $result['email'];
                $id = $result['id'];
                $chuc_vu = $result['chuc_vu_id'];
                if ($chuc_vu == 1) {
                    $_SESSION['user_admin'] = [
                        'email' => $email,
                        'id' => $id

                    ];
                    header("Location:" . BASE_URL_ADMIN);
                    exit();
                }
                if ($chuc_vu == 2) {
                    $_SESSION['user_client'] = [
                        'email' => $email,
                        'id' => $id

                    ];
                    header("Location:" . BASE_URL);
                    exit();
                }
                // Lưu thông tin vào session
            } else {
                // Lỗi thì lưu lỗi vào session
                $_SESSION['errors'] = $result;
                //    var_dump($_SESSION['errors']);die();

                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL . '?act=form-login');
                exit();
            }
        }
    }

    public function formDangKy()
    {

        if (isset($_SESSION['user_client'])) {
            header('Location:' . BASE_URL);
            exit();
        }
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        require_once('./views/auth/formDangKy.php');
        deleteSessionErrors();
    }

    public function dangKy()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            $ho_ten = $_POST['ho_ten'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $file_thumb = uploadFile($anh_dai_dien, './uploads/');

            $chuc_vu = 2;

            $_SESSION['old_data'] = array(
                'ho_ten' => $_POST['ho_ten'],
                'ngay_sinh' => $_POST['ngay_sinh'],
                'email' => $_POST['email'],
                'so_dien_thoai' => $_POST['so_dien_thoai'],
                'gioi_tinh' => $_POST['gioi_tinh'],
                'dia_chi' => $_POST['dia_chi'],
                'mat_khau' => $_POST['mat_khau'],


            );

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }

            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ  không được để trống';
            }
            $_SESSION['errors'] = $errors;

            //   var_dump($_SESSION['errors']);die();
            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $tai_khoan = $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $chuc_vu, $file_thumb);
                // var_dump($tai_khoan);
                // die();
                $_SESSION['thongBao'] = 'Đăng kí thành công. Vui lòng đăng nhập để mua hàng và bình luận';
                die();

                header("Location: " . BASE_URL . '?act=form-dang-ky');


                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form

                $_SESSION['flash'] = true;
                $_SESSION['thongBao'] = 'Đăng ký thất bại';

                header("Location: " . BASE_URL . '?act=form-dang-ky');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header('Location:' . BASE_URL);
        }
    }



    public function suaTaiKhoan()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';

        $thongTin = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
        // var_dump($thongTin);die();

        require_once './views/suaThongTinTaiKhoan.php';
        deleteSessionErrors();
    }

    public function suaThongTinCaNhan()
    {
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ho_ten = $_POST['ho_ten'] ?? '';


            // Truy vấn 

            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';


            $_SESSION['ho_ten'] = $ho_ten ?? '';
            $_SESSION['email'] = $email ?? '';




            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['errors'] = $errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateTaiKhoan($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $dia_chi);

                if ($status) {
                    $_SESSION['successTt'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location: " . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }



    public function suaMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];


            $user  = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);

            //  var_dump($user['mat_khau']);
            //  var_dump($old_pass);
            $errors = [];
            if ($old_pass !== $user['mat_khau']) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Mật khẩu cũ không được để trống';
            }

            if (empty($new_pass)) {
                $errors['new_pass'] = 'Mật khẩu mới không được để trống';
            }

            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không được để trống';
            }
            $_SESSION['errors'] = $errors;
            if (!$errors) {
                // $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->updateMatKhau($user['id'], $new_pass);
                // var_dump($status);die();
                if ($status) {
                    $_SESSION['successMk'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;

                    header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
                }
            } else {
                // Lỗi thì lưu lỗi vào session
                //    $_SESSION['errors'] = $user;
                //    var_dump($_SESSION['errors']);die();

                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }


    public function suaAnhTaiKhoan()
    {
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $tai_khoan_id = $_POST['tai_khoan_id'];


            $thongTinCu = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
            // var_dump($thongTinCu);die();
            $anh_cu = $thongTinCu['anh_dai_dien'];
            // var_dump($anh_cu);die();

            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;



            // Logic sửa ảnh
            if (isset($anh_dai_dien)) {
                // upload file ảnh mới lên
                $new_file = uploadFile($anh_dai_dien, './uploads');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $anh_cu;
            }

            // Nếu k có lỗi thì thêm anh
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateAnhDaiDien($tai_khoan_id, $new_file);
                // var_dump($status);die();

                if ($status) {
                    $_SESSION['successAnh'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');

                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');

                exit();
            }
        }
    }

    public function quenMatKhau()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';

        $thongTin = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
        // var_dump($thongTin);die();

        require_once './views/quenMatKhau.php';
        deleteSessionErrors();
    }

    public function layMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl

            $email = $_POST['email'] ?? '';

            $checkEmail = $this->modelTaiKhoan->checkEmail($email);
            // var_dump($checkEmail);die();

            // var_dump($checkEmail['mat_khau']);die();

            if (is_array($checkEmail)) {
                //     $_SESSION['user_id'] = $checkUser[0]['id'];
                $_SESSION['layMk'] = 'Mật khẩu của bạn là: ' . $checkEmail[0]['mat_khau'];

                header('Location:' . BASE_URL . '?act=quen-mat-khau');
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['layMk'] = 'Email không tồn tại';

                header('Location:' . BASE_URL . '?act=quen-mat-khau');
            }
        }
    }
}
