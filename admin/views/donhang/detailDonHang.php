<?php include './views/layout/header.php' ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Quản lý danh sách đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                </div>
                <div class="col-sm-3">

                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    if (isset($donHang['trang_thai_id'])) {
                        if ($donHang['trang_thai_id'] == 1) {
                            $colorAlerts = 'primary';
                        } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                            $colorAlerts = 'warning';
                        } elseif ($donHang['trang_thai_id'] == 10) {
                            $colorAlerts = 'success';
                        } else {
                            $colorAlerts = 'danger';
                        }
                    } else {
                        $colorAlerts = 'danger';
                    }
                    ?>
                    <div class="alert alert-<?= $colorAlerts ?>" role="alert">
                        Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
                    </div>

                    <div class="invoice p-3 mb-3 border rounded shadow-sm">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between">
                                <h4>
                                    <i class="fas fa-shoe-prints"></i> Shop DasNike
                                </h4>
                                <small class="text-muted">Ngày đặt: <?= formatDate($donHang['ngay_dat']); ?></small>
                            </div>
                        </div>

                        <!-- info row -->
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <h5>Thông tin người đặt</h5>
                                <address>
                                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                                    Email: <?= $donHang['email'] ?><br>
                                    Số điện thoại: <?= $donHang['so_dien_thoai'] ?><br>
                                </address>
                            </div>
                            <div class="col-md-4">
                                <h5>Người nhận</h5>
                                <address>
                                    <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                    Email: <?= $donHang['email_nguoi_nhan'] ?><br>
                                    Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                </address>
                            </div>
                            <div class="col-md-4">
                                <h5>Thông tin đơn hàng</h5>
                                <address>
                                    <strong>Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></strong><br>
                                    Tổng tiền: <?= $donHang['tong_tien'] ?><br>
                                    Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                    Thanh toán: <?= $donHang['ten_phuong_thuc'] ?> <br>
                                </address>
                            </div>
                        </div>

                        <!-- Table row -->
                        <div class="row mt-4">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanPham) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                <td>
                                                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt=""
                                                        class="img-fluid" style="width: 70px; height: auto; object-fit: cover;">
                                                </td>
                                                <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> VNĐ</td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> VNĐ</td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Summary row -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p class="lead"><strong>Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></strong></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width: 50%">Thành tiền:</th>
                                            <td><?= number_format($tong_tien, 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển:</th>
                                            <td>25,000 VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td><?= number_format($tong_tien + 25000, 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>



    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer-->
<?php include './views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    var faqs_row = 0;

    function addfaqs() {

        html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><input type="text" class="form-control" placeholder="User name"></td>';
        html += '<td><input type="text" placeholder="Product name" class="form-control"></td>';
        html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
        html += '<td class="mt-10"><button class="badge badge-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }
</script>
</body>

</html>