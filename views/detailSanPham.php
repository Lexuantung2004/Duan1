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
                                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <!-- Phần ảnh sản phẩm -->
                            <div class="col-lg-5">
                                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($listAnhSanPham as $key => $anhSanPham) { ?>
                                            <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                                                <div class="carousel-image-wrapper" style="border: 5px solid #e0e0e0; border-radius: 10px; overflow: hidden;">
                                                    <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" class="d-block w-100" alt="product-details" style="transition: transform 0.3s;">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="mt-3 d-flex justify-content-center gap-2">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham) { ?>
                                        <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" class="img-thumbnail" style="width: 80px;border-radius: 12px; border-style: solid;border-color: #e0e0e0;border-width: medium" alt="product-thumbnail">
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Kết thúc ảnh sản phẩm -->

                            <!-- Phần chi tiết sản phẩm -->
                            <div class="col-lg-7">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h5 class="text-muted"><?= $sanPham['ten_danh_muc'] ?></h5>
                                        <h3 class="card-title"><?= $sanPham['ten_san_pham'] ?></h3>
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="text-success me-3">
                                                <?php $countComment = count($listBinhLuan); ?>
                                                <span><?= $countComment . ' Bình luận' ?></span>
                                            </span>
                                        </div>
                                        <div class="price-box mb-3">
                                            <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                <span class="text-success fw-bold fs-4"><?= formatPrice($sanPham['gia_khuyen_mai']) ?>đ</span>
                                                <del class="text-muted fs-5"><?= formatPrice($sanPham['gia_san_pham']) ?>đ</del>
                                            <?php } else { ?>
                                                <span class="text-success fw-bold fs-4"><?= formatPrice($sanPham['gia_san_pham']) ?>đ</span>
                                            <?php } ?>
                                        </div>
                                        <p class="text-muted">Còn: <span class="text-success"><?= $sanPham['so_luong'] ?> sản phẩm</span></p>
                                        <p class="font-serif text-lg"><?= $sanPham['mo_ta'] ?></p>



                                        <form action="?act=them-gio-hang" method="POST" class="mt-4">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Số lượng:</label>
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                <input type="number" id="quantity" name="so_luong" class="form-control w-50" value="1" min="1">
                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2" type="submit" href="#">Thêm vào giỏ hàng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Kết thúc chi tiết sản phẩm -->
                        </div>
                    </div>

                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">

                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a>
                                        </li>
                                    </ul>


                                    <div class="tab-content reviews-tab">

                                        <div class="tab-pane fade show active" id="tab_three">
                                            <?php foreach ($listBinhLuan as $binhLuan) { ?>


                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="<?= BASE_URL . $binhLuan['anh_dai_dien'] ?>" alt="">
                                                    </div>
                                                    <div class="review-box">

                                                        <div class="post-author">
                                                            <p><span><?= $binhLuan['ho_ten'] ?> - </span><?= $binhLuan['ngay_dang'] ?></p>
                                                        </div>
                                                        <p><?= $binhLuan['noi_dung'] ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <form action="?act=gui-binh-luan" method="POST" class="review-form">
                                                <input type="hidden" name="san_pham_id" id="" value="<?= $sanPham['id'] ?>">


                                                <div class="form-group row">
                                                    <div class="col">

                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Bình luận</label>
                                                        <?php if (!isset($_SESSION['user_client'])) { ?>
                                                            <p class="text-danger">Vui lòng đăng nhập để gửi bình luận</p>
                                                        <?php } else { ?>
                                                            <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user_client']['id'] ?>">

                                                            <textarea class="form-control" name="binh_luan" required></textarea>


                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Gửi bình luận</button>
                                                </div>
                                            <?php } ?>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>
                        <p class="sub-title"></p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanPhamCungDanhMuc as $sanPham) { ?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='  . $sanPham['id'] ?>">
                                        <img class="pri-img img-fluid" style="height: 320px;border-radius: 12px; border-style: solid;border-color: #a38a6b;border-width: medium" src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>">
                                        <img class="sec-img img-fluid" style="height: 320px;border-radius: 12px; border-style: solid;border-color: #a38a6b;border-width: medium" src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                        if ($tinhNgay->days <= 7) {    ?>

                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php } ?>
                                        <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                            <div class="product-label discount">
                                                <span>Giảm giá</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="cart-hover">

                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                            <button class="btn btn-cart">Xem chi tiết</button>
                                        </a>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">

                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>


                                        <?php }    ?>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>
<?php require_once 'layout/miniCart.php' ?>
<?php require_once 'layout/footer.php'  ?>