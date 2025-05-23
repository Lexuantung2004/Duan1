<?php require_once 'layout/header.php'  ?>
<?php require_once 'layout/menu.php'  ?>


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
                                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Tên sản phẩm</th>
                                        <th class="pro-price">Giá</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tongGioHang = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham) {
                                    ?>
                                        <form action="?act=xoa-san-pham-gio-hang" method="POST">
                                            <input type="hidden" name="chi_tiet_gio_hang_id" value="<?= $sanPham['id'] ?>">
                                            <tr>
                                                <td class="pro-thumbnail text-center"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" style="height: 80px;" /></td>
                                                <td class="pro-title"><?= $sanPham['ten_san_pham'] ?></td>
                                                <td class="pro-price text-center">
                                                    <span>
                                                        <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                            <?= formatPrice($sanPham['gia_khuyen_mai']) . ' đ' ?>
                                                        <?php } else { ?>
                                                            <?= formatPrice($sanPham['gia_san_pham']) . ' đ' ?>
                                                        <?php } ?>
                                                    </span>
                                                </td>
                                                <td class="pro-quantity text-center"><?= $sanPham['so_luong'] ?></td>
                                                <td class="pro-subtotal text-center">
                                                    <span>
                                                        <?php
                                                        $tongTien = 0;
                                                        if ($sanPham['gia_khuyen_mai'] > 0) {
                                                            $tongTien =  $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                        } else {
                                                            $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                        }
                                                        $tongGioHang += $tongTien;
                                                        echo formatPrice($tongTien) . 'đ';
                                                        ?>
                                                    </span>
                                                </td>
                                                <td class="pro-remove text-center">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Xóa</button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items p-4 bg-white rounded shadow-sm">
                                <h6>Tổng đơn hàng</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng tiền sản phẩm</td>
                                            <td><?= formatPrice($tongGioHang) . 'đ' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Vận chuyển</td>
                                            <td>25.000 đ</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng thanh toán</td>
                                            <td class="total-amount"><?= formatPrice($tongGioHang + 25000) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cart main wrapper end -->
</main>


<?php require_once 'layout/miniCart.php' ?>

<?php require_once 'layout/footer.php' ?>