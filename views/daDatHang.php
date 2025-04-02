<?php require_once 'layout/header.php' ?>

<?php require_once 'layout/menu.php' ?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Trạng Thái & Thông Tin Đơn Hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['dat_hang_thanh_cong'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle"></i> <?= $_SESSION['dat_hang_thanh_cong'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Trạng Thái Đơn Hàng</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-success font-weight-bold bg-light p-3 rounded shadow-sm mb-3">Ngày đặt hàng: <?= $thongTinDonHang[0]['ngay_dat'] ?></p>
                            <p class="text-success font-weight-bold bg-light p-3 rounded shadow-sm mb-3">Mã đơn hàng: <?= $thongTinDonHang[0]['ma_don_hang'] ?></p>
                            <p class="text-success font-weight-bold bg-light p-3 rounded shadow-sm mb-3">Trạng thái đơn hàng: <?= $thongTinDonHang[0]['ten_trang_thai'] ?></p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Thông Tin Người Nhận Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ten_nguoi_nhan" class="form-label">Tên người nhận</label>
                                <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" class="form-control" value="<?= $thongTinDonHang[0]['ten_nguoi_nhan'] ?>" disabled />
                            </div>
                            <div class="mb-3">
                                <label for="email_nguoi_nhan" class="form-label">Địa chỉ email</label>
                                <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" class="form-control" value="<?= $thongTinDonHang[0]['email_nguoi_nhan'] ?>" disabled />
                            </div>
                            <div class="mb-3">
                                <label for="sdt_nguoi_nhan" class="form-label">Số điện thoại</label>
                                <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" class="form-control" value="<?= $thongTinDonHang[0]['sdt_nguoi_nhan'] ?>" disabled />
                            </div>
                            <div class="mb-3">
                                <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ người nhận</label>
                                <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" class="form-control" value="<?= $thongTinDonHang[0]['dia_chi_nguoi_nhan'] ?>" disabled />
                            </div>
                            <div class="mb-3">
                                <label for="ghi_chu" class="form-label">Ghi chú</label>
                                <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="3" disabled><?= $thongTinDonHang[0]['ghi_chu'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Thông Tin Sản Phẩm</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tongGioHang = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham) {
                                    ?>
                                        <tr>
                                            <td><?= $sanPham['ten_san_pham'] ?><strong> × <?= $sanPham['so_luong'] ?></strong></a></td>
                                            <td>
                                                <?php
                                                $tongTien = $sanPham['gia_khuyen_mai'] > 0 ? $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'] : $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                $tongGioHang += $tongTien;
                                                echo formatPrice($tongTien) . ' đ';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Tổng tiền sản phẩm</td>
                                        <td><strong><?= formatPrice($tongGioHang) . ' đ' ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td class="d-flex justify-content">
                                            <strong>20.000 đ</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tổng đơn hàng</td>
                                        <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                                        <td><strong><?= formatPrice($tongGioHang + 30000) . ' đ' ?></strong></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <?php
                                            $phuongThucThanhToan = $thongTinDonHang[0]['phuong_thuc_thanh_toan_id'];
                                            if ($phuongThucThanhToan === 1) {
                                                $PTTT = 'Thanh toán khi nhận hàng';
                                            } else {
                                                $PTTT = 'Thanh toán qua banking (ONLINE)';
                                            }

                                            ?>
                                            <p class="text-success">Phương thức thanh toán: <?= $PTTT ?></label></p>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- checkout main wrapper end -->
</main>

<?php require_once 'layout/miniCart.php' ?>

<?php require_once 'layout/footer.php' ?>