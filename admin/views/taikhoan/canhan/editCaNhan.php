<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản cá nhân</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <!-- Left Column -->
        <div class="col-md-4">
          <div class="text-center">
            <form action="<?= BASE_URL_ADMIN . '?act=sua-anh-tai-khoan'; ?>" method="POST" enctype="multipart/form-data">
              <?php if (isset($_SESSION['successAnh'])): ?>
                <div class="alert alert-info alert-dismissable">
                  <a href="#" class="panel-close close" data-dismiss="alert"></a>
                  <i class="fa fa-coffee"></i>
                  <?= htmlspecialchars($_SESSION['successAnh']); ?>
                </div>
              <?php endif; ?>
              <input type="hidden" name="tai_khoan_id" value="<?= htmlspecialchars($thongTin['id'] ?? ''); ?>">

              <img src=".<?= htmlspecialchars($thongTin['anh_dai_dien'] ?? '/path/to/default-avatar.jpg'); ?>"
                style="width:100px"
                class="avatar img-circle"
                alt="avatar">
              <input type="file" name="anh_dai_dien">

              <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Cập nhật Avatar</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-8 personal-info">
          <form action="?act=sua-thong-tin-ca-nhan-quan-tri" method="POST">
            <?php if (isset($_SESSION['successTt'])): ?>
              <div class="alert alert-info alert-dismissable">
                <a href="#" class="panel-close close" data-dismiss="alert"></a>
                <i class="fa fa-coffee"></i>
                <?= htmlspecialchars($_SESSION['successTt']); ?>
              </div>
            <?php endif; ?>
            <input type="hidden" name="tai_khoan_id" value="<?= htmlspecialchars($thongTin['id'] ?? ''); ?>">

            <h3>Thông tin cá nhân</h3>
            <div class="form-group">
              <label for="ho_ten">Họ tên:</label>
              <input id="ho_ten"
                class="form-control"
                type="text"
                value="<?= htmlspecialchars($thongTin['ho_ten'] ?? ''); ?>"
                name="ho_ten">
              <?php if (!empty($_SESSION['errors']['ho_ten'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['ho_ten']); ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input id="email"
                class="form-control"
                type="text"
                value="<?= htmlspecialchars($thongTin['email'] ?? ''); ?>"
                name="email">
              <?php if (!empty($_SESSION['errors']['email'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['email']); ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="so_dien_thoai">Số điện thoại:</label>
              <input id="so_dien_thoai"
                class="form-control"
                type="number"
                value="<?= htmlspecialchars($thongTin['so_dien_thoai'] ?? ''); ?>"
                name="so_dien_thoai">
            </div>

            <div class="form-group">
              <label for="dia_chi">Địa chỉ:</label>
              <input id="dia_chi"
                class="form-control"
                type="text"
                value="<?= htmlspecialchars($thongTin['dia_chi'] ?? ''); ?>"
                name="dia_chi">
              <?php if (!empty($_SESSION['errors']['dia_chi'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['dia_chi']); ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>

          <hr>

          <h3>Đổi mật khẩu</h3>
          <?php if (isset($_SESSION['successMk'])): ?>
            <div class="alert alert-info alert-dismissable">
              <a href="#" class="panel-close close" data-dismiss="alert"></a>
              <i class="fa fa-coffee"></i>
              <?= htmlspecialchars($_SESSION['successMk']); ?>
            </div>
          <?php endif; ?>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri'; ?>" method="POST">
            <div class="form-group">
              <label for="old_pass">Mật khẩu cũ:</label>
              <input id="old_pass"
                class="form-control"
                name="old_pass"
                type="password">
              <?php if (!empty($_SESSION['errors']['old_pass'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['old_pass']); ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="new_pass">Mật khẩu mới:</label>
              <input id="new_pass"
                class="form-control"
                name="new_pass"
                type="password">
              <?php if (!empty($_SESSION['errors']['new_pass'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['new_pass']); ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="confirm_pass">Nhập lại mật khẩu mới:</label>
              <input id="confirm_pass"
                class="form-control"
                name="confirm_pass"
                type="password">
              <?php if (!empty($_SESSION['errors']['confirm_pass'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['errors']['confirm_pass']); ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
</div>

<script>
  var faqs_row = 0;

  function addfaqs() {
    var html = `
      <tr id="faqs-row${faqs_row}">
        <td><input type="text" class="form-control" placeholder="User name"></td>
        <td><input type="text" placeholder="Product name" class="form-control"></td>
        <td class="text-danger mt-10">18.76% <i class="fa fa-arrow-down"></i></td>
        <td class="mt-10">
          <button class="badge badge-danger" onclick="document.getElementById('faqs-row${faqs_row}').remove();">
            <i class="fa fa-trash"></i> Delete
          </button>
        </td>
      </tr>`;
    document.querySelector('#faqs tbody').insertAdjacentHTML('beforeend', html);
    faqs_row++;
  }
</script>
</body>

</html>