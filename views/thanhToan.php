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
                                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
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
                    <!-- Optional: You can add a heading or breadcrumb here -->
                </div>
            </div>

            <form action="?act=xu-ly-thanh-toan" method="post">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="card p-4 mb-4">
                            <h5 class="checkout-title">Thông tin người nhận</h5>
                            <div class="billing-form-wrap">
                                <div class="form-group">
                                    <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                    <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên người nhận" required />
                                </div>

                                <div class="form-group">
                                    <label for="email_nguoi_nhan" class="required">Địa chỉ email</label>
                                    <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Email" required />
                                </div>

                                <div class="form-group">
                                    <label for="sdt_nguoi_nhan" class="required">Số điện thoại</label>
                                    <input type="text" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Sdt" required />
                                </div>

                                <div class="form-group">
                                    <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ người nhận</label>
                                    <input type="text" class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ" required />
                                </div>

                                <div class="form-group">
                                    <label for="ghi_chu">Ghi chú</label>
                                    <textarea class="form-control" name="ghi_chu" id="ghi_chu" rows="3" placeholder="Nhập ghi chú của bạn"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="card p-4 mb-4">
                            <h5 class="checkout-title">Thông tin sản phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive">
                                    <table class="table table-bordered">
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
                                                    <td><a href="product-details.html"><?= $sanPham['ten_san_pham'] ?><strong> × <?= $sanPham['so_luong'] ?></strong></a></td>
                                                    <td>
                                                        <?php
                                                        $tongTien = 0;
                                                        if ($sanPham['gia_khuyen_mai'] > 0) {
                                                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                        } else {
                                                            $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                        }
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
                                                <td>Vận chuyển</td>
                                                <td><strong>25.000 đ</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Tổng đơn hàng</td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 25000 ?>">
                                                <td><strong><?= formatPrice($tongGioHang + 25000) . ' đ' ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <br>
                                <!-- Order Payment Method -->
                                <div class="single-payment-method show" style="margin-bottom: 20px;">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio" style="font-size: 1.2rem;">
                                            <input type="radio" id="cashon" name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" style="width: 2rem; height: 2rem; border-radius: 50%; margin-right: 10px;" checked />
                                            <label class="custom-control-label" for="cashon" style="font-size: 1.2rem; font-weight: bold;">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-payment-method" style="margin-bottom: 20px;">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio" style="font-size: 1.2rem;">
                                            <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" style="width: 2rem; height: 2rem; border-radius: 50%; margin-right: 10px;" />
                                            <label class="custom-control-label" for="directbank" style="font-size: 1.2rem; font-weight: bold;">Thanh toán qua banking (ONLINE)</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                        <label class="custom-control-label" for="terms">Xác nhận đặt hàng</label>
                                    </div>
                                    <button type="submit" class="btn btn-sqr">Tiến hành đặt hàng</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>


    <!-- checkout main wrapper end -->
</main>

<?php require_once 'layout/miniCart.php' ?>

<?php require_once 'layout/footer.php' ?>