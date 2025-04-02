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
                                <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <div class="row">
                                <!-- My Account Tab Menu Start -->
                                <div class="col-lg-3">
                                    <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                        <li class="nav-item mb-3">
                                            <a class="btn btn-sqr w-100 py-3 text-center border rounded-3 shadow-sm" id="account-info-tab" data-bs-toggle="pill" href="#account-info" role="tab" aria-controls="account-info" aria-selected="true" style="font-weight: bold; font-size: 16px; transition: all 0.3s ease; color: #333; background-color: #f8f9fa;">
                                                Thông tin tài khoản
                                            </a>
                                        </li>
                                        <li class="nav-item mb-3">
                                            <a class="btn btn-sqr w-100 py-3 text-center border rounded-3 shadow-sm" id="account-avatar-tab" data-bs-toggle="pill" href="#account-avatar" role="tab" aria-controls="account-avatar" aria-selected="false" style="font-weight: bold; font-size: 16px; transition: all 0.3s ease; color: #333; background-color: #f8f9fa;">
                                                Ảnh đại diện
                                            </a>
                                        </li>
                                        <li class="nav-item mb-3">
                                            <a class="btn btn-sqr w-100 py-3 text-center border rounded-3 shadow-sm" id="account-password-tab" data-bs-toggle="pill" href="#account-password" role="tab" aria-controls="account-password" aria-selected="false" style="font-weight: bold; font-size: 16px; transition: all 0.3s ease; color: #333; background-color: #f8f9fa;">
                                                Mật khẩu
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9">
                                    <div class="tab-content" id="myTabContent">
                                        <!-- Tab 1: Thông tin tài khoản -->
                                        <div class="tab-pane fade show active" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                                            <div class="myaccount-content">
                                                <h5>Sửa thông tin tài khoản</h5>
                                                <form action="?act=sua-thong-tin-ca-nhan" method="POST">
                                                    <input type="hidden" name="tai_khoan_id" value="<?= $thongTin['id'] ?>">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="ho_ten" class="form-label">Họ tên</label>
                                                                <input type="text" class="form-control" name="ho_ten" placeholder="Họ tên" value="<?= $thongTin['ho_ten'] ?>" />
                                                                <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="Email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $thongTin['email'] ?>" />
                                                                <?php if (isset($_SESSION['errors']['email'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['email'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                                        <input type="number" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại" value="<?= $thongTin['so_dien_thoai'] ?>" />
                                                        <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                                            <div class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                        <input type="text" class="form-control" name="dia_chi" placeholder="Địa chỉ" value="<?= $thongTin['dia_chi'] ?>" />
                                                        <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                                            <div class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></div>
                                                        <?php } ?>
                                                    </div>

                                                    <button type="submit" class="btn btn-sqr">Lưu thông tin</button>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Tab 2: Ảnh đại diện -->
                                        <div class="tab-pane fade" id="account-avatar" role="tabpanel" aria-labelledby="account-avatar-tab">
                                            <div class="myaccount-content">
                                                <h5>Sửa ảnh đại diện</h5>
                                                <form action="?act=sua-anh-tai-khoan" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="tai_khoan_id" value="<?= $thongTin['id'] ?>">
                                                    <div class="text-center">
                                                        <img src="<?= $thongTin['anh_dai_dien'] ?>" class="avatar img-circle mb-3" style="width: 100px;" alt="avatar">
                                                        <input type="file" name="anh_dai_dien" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-sqr">Lưu ảnh đại diện</button>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Tab 3: Mật khẩu -->
                                        <div class="tab-pane fade" id="account-password" role="tabpanel" aria-labelledby="account-password-tab">
                                            <div class="myaccount-content">
                                                <h5>Sửa mật khẩu</h5>
                                                <form action="?act=sua-mat-khau" method="POST">
                                                    <div class="mb-3">
                                                        <label for="current-pwd" class="form-label">Mật khẩu hiện tại</label>
                                                        <input type="password" class="form-control" name="old_pass" placeholder="Mật khẩu hiện tại">
                                                        <?php if (isset($_SESSION['errors']['old_pass'])) { ?>
                                                            <div class="text-danger"><?= $_SESSION['errors']['old_pass'] ?></div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="new-pwd" class="form-label">Mật khẩu mới</label>
                                                                <input type="password" class="form-control" name="new_pass" placeholder="Mật khẩu mới">
                                                                <?php if (isset($_SESSION['errors']['new_pass'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['new_pass'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="confirm-pwd" class="form-label">Nhập lại mật khẩu mới</label>
                                                                <input type="password" class="form-control" name="confirm_pass" placeholder="Nhập lại">
                                                                <?php if (isset($_SESSION['errors']['confirm_pass'])) { ?>
                                                                    <div class="text-danger"><?= $_SESSION['errors']['confirm_pass'] ?></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-sqr">Lưu mật khẩu</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- My Account Tab Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- my account wrapper end -->
</main>


<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php' ?>