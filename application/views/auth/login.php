<div class="container container-max py-5">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="card-lux">
        <div class="card-body p-4 p-md-5">
          <span class="badge badge-lux rounded-pill px-3 py-2">Admin Area</span>
          <h2 class="section-title mt-3 mb-2">Login Admin</h2>
          <p class="small-muted mb-4">Masuk untuk mengelola kamar dan reservasi.</p>

          <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
          <?php endif; ?>

          <form method="post">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input class="form-control" name="username" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <button class="btn btn-lux w-100 mt-2" name="submit" value="1">Masuk</button>
            <a class="btn btn-outline-lux w-100 mt-2" href="<?= base_url('index.php/hotel'); ?>">Kembali</a>
          </form>

          <div class="small-muted mt-3">
            Default: <b>admin</b> / <b>admin123</b>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
