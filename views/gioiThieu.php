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
                                <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- about us area start -->
    <section class="about-us section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="about-thumb">
                        <img src="assets/img/logo/logo1.jpg" alt="about thumb">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-content">
                        <h2 class="about-title">Giới thiệu</h2>
                        <h5 class="about-sub-title">
                            Được thành lập ngày 10/11/2024
                        </h5>
                        <p>DasNike là cửa hàng giày thể thao nổi bật, chuyên cung cấp những mẫu giày thiết kế hiện đại, phong cách và chất lượng cao. Với sự kết hợp giữa công nghệ tiên tiến và thời trang, DasNike mang đến cho khách hàng những đôi giày không chỉ giúp nâng cao hiệu suất thể thao mà còn tạo nên sự cá tính trong từng bước đi. Dù bạn là người đam mê thể thao hay yêu thích phong cách đường phố, DasNike luôn có những lựa chọn phù hợp, giúp bạn tự tin và thoải mái trong mọi hoạt động.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us area end -->

    <!-- choosing area start -->

    <!-- choosing area end -->


    <!-- team area start -->
    <div class="team-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">Thành viên</h2>
                    </div>
                </div>
            </div>
            <div class="row mbn-30">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-30">
                        <div class="team-thumb">
                            <img src="assets/img/team/tun.jpg" alt="">
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h6 class="team-member-name">Lê Xuân Tùng</h6>

                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-30">
                        <div class="team-thumb">
                            <img src="" alt="">
                            <div class="team-social">
                                <a href="https://www.facebook.com/dagdun137?locale=vi_VN"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h6 class="team-member-name">Nguyễn Đăng Dương</h6>

                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-30">
                        <div class="team-thumb">
                            <img src="assets/img/team/team_member_3.jpg" alt="">
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h6 class="team-member-name">Tô Vũ Hải</h6>

                        </div>
                    </div>
                </div> <!-- end single team member -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-member mb-30">
                        <div class="team-thumb img-full">
                            <img src="assets/img/team/team_member_4.jpg" alt="">
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h6 class="team-member-name">Nguyễn Quốc Trung</h6>

                        </div>
                    </div>
                </div> <!-- end single team member -->
            </div>
        </div>
    </div>
    <!-- team area end -->
</main>



<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php' ?>