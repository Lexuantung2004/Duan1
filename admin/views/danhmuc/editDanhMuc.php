<?php include './views/layout/header.php' ?>

<?php include './views/layout/navbar.php' ?>

<?php include './views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh mục sản phẩm</h1>
        </div>
      </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa danh mục</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="?act=sua-danh-muc" method="POST">
              <input type="text" name="id" id="" value="<?= $danhMuc['id'] ?>" hidden>
              <div class="card-body">
                <div class="form-group">
                  <label>Tên danh mục</label>
                  <input type="text" class="form-control" name="ten_danh_muc" value="<?= $danhMuc['ten_danh_muc'] ?>" placeholder="Nhập tên danh mục">
                  <?php if (isset($errors['ten_danh_muc'])) { ?>
                    <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                  <?php } ?>


                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả"><?= $danhMuc['mo_ta'] ?></textarea>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>
<!--footer-->
<?php include './views/layout/footer.php'; ?>
<script>
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