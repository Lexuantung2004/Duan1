<?php require_once './views/layout/header.php'  ?>
<?php require_once './views/layout/menu.php'  ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đăng Nhập</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container" style="max-width: 500px;">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">Đăng nhập</h5>
                            <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
                                <?php if (is_array($_SESSION['errors'])) { ?>
                                    <!-- Hiển thị từng lỗi trong mảng -->
                                    <?php foreach ($_SESSION['errors'] as $error) { ?>
                                        <p class="text-danger text-center"><?= htmlspecialchars($error) ?></p>
                                    <?php } ?>
                                <?php } else { ?>
                                    <!-- Hiển thị lỗi nếu là chuỗi -->
                                    <p class="text-danger text-center"><?= htmlspecialchars($_SESSION['errors']) ?></p>
                                <?php } ?>
                                <?php unset($_SESSION['errors']); // Dọn lỗi sau khi hiển thị 
                                ?>
                            <?php } else { ?>
                                <p class="login-box-msg text-center">Vui lòng đăng nhập</p>
                            <?php } ?>
                            <form action="?act=check-login" method="post">
                                <div class="single-input-item">
                                    <input type="email" name="email" placeholder="Email or Username" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" name="password" placeholder="Enter your Password" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="<?= BASE_URL . '?act=quen-mat-khau' ?>" class="forget-pwd">Quên mật khẩu</a>
                                    </div>
                                </div>
                                <div class="single-input-item" style="text-align: center;">
                                    <button class="btn btn-sqr">Đăng nhập</button>
                                </div>
                            </form>
                            <hr>
                            <div style="text-align: center; color:brown;">
                                <p>Bạn Chưa Có Tài Khoản?</p> <a href="?act=form-dang-ky"><button>Đăng ký Tại Đây</button></a>
                            </div>

                        </div>

                    </div>
                    <!-- Login Content End -->


                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<?php require_once './views/layout/footer.php'  ?>