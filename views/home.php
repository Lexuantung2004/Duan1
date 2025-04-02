<?php require_once 'layout/header.php'  ?>
<?php require_once 'layout/menu.php'  ?>




<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/1.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/2.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/3.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($currentProducts as $sanPham) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?= htmlspecialchars(BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']) ?>">
                                    <img class="pri-img img-fluid" style="height: 320px;border-radius: 12px; border-style: solid;border-color: #a38a6b;border-width: medium" src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>">
                                    <img class="sec-img img-fluid" style="height: 320px;border-radius: 12px; border-style: solid;border-color: #a38a6b;border-width: medium" src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>">
                                </a>
                                <div class="product-badge">
                                    <?php
                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                    $ngayHienTai = new DateTime();
                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                    if ($tinhNgay->days <= 7) : ?>
                                        <div class="product-label new">
                                            <span>Mới</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($sanPham['gia_khuyen_mai'] > 0) : ?>
                                        <div class="product-label discount">
                                            <span>Giảm giá</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="cart-hover"> <a href="<?= htmlspecialchars(BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']) ?>">
                                        <button class="btn btn-cart">Xem chi tiết</button>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <h6 class="product-name">
                                    <a href="<?= htmlspecialchars(BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']) ?>"><?= htmlspecialchars($sanPham['ten_san_pham']) ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php if ($sanPham['gia_khuyen_mai'] > 0) : ?>
                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                                    <?php else : ?>
                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Phân Trang -->
            <div class="row">
                <div class="col-12">
                    <nav class="pagination-area">
                        <ul class="pagination justify-content-center">
                            <!-- Nút trang trước -->
                            <?php if ($page > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Trang trước">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <!-- Các trang -->
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Nút trang sau -->
                            <?php if ($page < $totalPages) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Trang sau">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </section>


    <!-- product area end -->




    <!-- group product start -->
    <div class="section-title">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Top Sản Phẩm Nổi Bật</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #e7e5e2;padding:40px">
        <div class="col-12">
            <div class="product-container">
                <!-- product tab content start -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php foreach ($listtop10 as $topSp) : ?>
                                <div class="group-list-item-wrapper">
                                    <div class="group-list-carousel">
                                        <!-- group list item start -->
                                        <div class="group-slide-item">
                                            <div class="group-item">
                                                <div class="group-item-thumb">
                                                    <a href="<?= htmlspecialchars(BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $topSp['id']) ?>">
                                                        <img src="<?= BASE_URL . $topSp['hinh_anh'] ?>" style=" height: 150px;border-radius: 12px; border-style: solid;border-color: #a38a6b;border-width: medium" alt="<?= htmlspecialchars($topSp['ten_san_pham']) ?>">
                                                    </a>
                                                </div>
                                                <div class="group-item-desc">
                                                    <h5 class="group-product-name">
                                                        <a href="<?= BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $topSp['id'] ?>">
                                                            <?= htmlspecialchars($topSp['ten_san_pham']) ?>
                                                        </a>
                                                    </h5>
                                                    <div class="price-box">
                                                        <?php if ($topSp['gia_khuyen_mai'] > 0) { ?>
                                                            <span class="price-regular"><?= formatPrice($topSp['gia_khuyen_mai']) . 'đ'; ?></span>
                                                            <span class="price-old"><del><?= formatPrice($topSp['gia_san_pham']) . 'đ'; ?></del></span>
                                                        <?php } else { ?>
                                                            <span class="price-regular"><?= formatPrice($topSp['gia_san_pham']) . 'đ' ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- group list item end -->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- product item end -->
                        </div>
                    </div>
                </div>
                <!-- product tab content end -->
            </div>
        </div>
    </div>
    <!-- group product end -->


    <!-- brand logo area start -->

    <!-- brand logo area end -->
</main>



<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php' ?>