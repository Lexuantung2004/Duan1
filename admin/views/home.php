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
      <!-- Hiển thị tổng doanh thu -->



      <div class="row mb-2">
        <h1>Thống Kê</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
        <div class="col-sm-6">

          <h1>Báo cáo thống kê</h1>
          <script>
            // Dữ liệu từ PHP
            const labels = <?php echo json_encode(array_column($listThongKe, 'ten_danh_muc')); ?>;
            const countSp = <?php echo json_encode(array_column($listThongKe, 'countSp')); ?>;
            const maxPrice = <?php echo json_encode(array_column($listThongKe, 'maxPrice')); ?>;
            const minPrice = <?php echo json_encode(array_column($listThongKe, 'minPrice')); ?>;
            const avgPrice = <?php echo json_encode(array_column($listThongKe, 'avgPrice')); ?>;

            // Tạo biểu đồ cột
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: labels, // Nhãn cho các cột
                datasets: [{
                    label: 'Số lượng sản phẩm',
                    data: countSp,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                  },
                  {
                    label: 'Giá cao nhất',
                    data: maxPrice,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                  },
                  {
                    label: 'Giá thấp nhất',
                    data: minPrice,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                  },
                  {
                    label: 'Giá trung bình',
                    data: avgPrice,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                  }
                ]
              },
              options: {
                responsive: true,
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>

        </div>
      </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- /.card-header -->
    <!--  <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>-->
    <div class="card-body ">

      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>Mã danh mục</th>
              <th>Tên danh mục</th>
              <th>Số lượng</th>
              <th>Giá cao nhất</th>
              <th>Giá thấp nhất</th>
              <th>Giá trung bình</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($listThongKe as $thongKe) { ?>
              <tr>
                <td><?= $thongKe['id'] ?></td>
                <td><?= $thongKe['ten_danh_muc'] ?></td>
                <td><?= $thongKe['countSp'] ?></td>
                <td><?= $thongKe['maxPrice'] ?></td>
                <td><?= $thongKe['minPrice'] ?></td>
                <td><?= $thongKe['avgPrice'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Mã danh mục</th>
              <th>Tên danh mục</th>
              <th>Số lượng</th>
              <th>Giá cao nhất</th>
              <th>Giá thấp nhất</th>
              <th>Giá trung bình</th>

            </tr>
          </tfoot>
        </table>
        <a href="<?= BASE_URL_ADMIN . '?act=bieu-do' ?>"> <button type="" class="btn btn-primary">Xem biểu đồ</button></a>
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.container-fluid -->
  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer-->
<?php include './views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>

</body>

</html>