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
                <div class="col-sm-6">
                    <h1>Biểu Đồ Thống Kê Theo Danh Mục</h1>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="myChart" style="width:100%; max-width:700px; height:600px;">
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer-->
<?php include './views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', {
        'packages': ['corechart', 'charteditor']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            $tongDanhMuc = count($listThongKe);
            for ($i = 0; $i < $tongDanhMuc; $i++) {
                $dauPhay = ($i < $tongDanhMuc - 1) ? ',' : '';
            ?>['<?= $listThongKe[$i]['ten_danh_muc'] ?>', <?= $listThongKe[$i]['countSp'] ?>] <?= $dauPhay ?>
            <?php } ?>
        ]);

        // Set Options
        const options = {
            title: 'Thống kê sản phẩm theo danh mục',
            titleTextStyle: {
                fontSize: 20,
                bold: true,
                color: '#333'
            },
            pieSliceText: 'percentage', // Hiển thị tỷ lệ phần trăm
            slices: {
                0: {
                    offset: 0.1,
                    textStyle: {
                        color: '#fff'
                    }
                },
                1: {
                    offset: 0.1,
                    textStyle: {
                        color: '#fff'
                    }
                },
                2: {
                    offset: 0.1,
                    textStyle: {
                        color: '#fff'
                    }
                },
                3: {
                    offset: 0.1,
                    textStyle: {
                        color: '#fff'
                    }
                },
                // Thêm tùy chỉnh cho các phần khác nếu có
            },
            is3D: true, // Kích hoạt hiệu ứng 3D
            slices: {
                0: {
                    offset: 0.1,
                    textStyle: {
                        color: '#ffffff'
                    },
                    tooltip: {
                        trigger: 'selection'
                    } // Hiển thị tooltip khi chọn
                }
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 12,
                    color: '#444'
                }
            },
            pieSliceText: 'value-and-percentage',
            pieStartAngle: 135, // Vị trí bắt đầu của các lát cắt
            backgroundColor: '#f4f4f4', // Màu nền cho biểu đồ
            chartArea: {
                left: 10,
                top: 10,
                width: '100%',
                height: '80%'
            },
        };

        // Draw the chart
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>


</body>

</html>