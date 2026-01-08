<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= isset($title) ? $title : 'Luxury Hotel'; ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>
<body>

<section class="hero" style="min-height:100vh;display:flex;align-items:center;">
  <div class="container container-max py-5">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge badge-lux rounded-pill px-3 py-2">Luxury • Clean • Professional</span>
        <h1 class="mt-3 section-title display-5">
          Reservasi Hotel Mewah<br>yang Elegan & Modern
        </h1>
        <p class="mt-3 small-muted fs-5">
          Pilih jenis login untuk melanjutkan. Pelanggan untuk melakukan reservasi,
          admin untuk mengelola kamar & reservasi.
        </p>
        <div class="statbar mt-4">
          <div class="statcard">
            <div class="statlabel">Benefit</div>
            <div class="statvalue">Booking Cepat</div>
          </div>
          <div class="statcard">
            <div class="statlabel">Support</div>
            <div class="statvalue">24/7</div>
          </div>
          <div class="statcard">
            <div class="statlabel">Experience</div>
            <div class="statvalue">Premium</div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="hero-card">
          <h2 class="section-title mb-2">Masuk ke Sistem</h2>
          <p class="small-muted mb-4">Pilih salah satu akses di bawah ini.</p>

          <a class="btn btn-lux w-100" href="<?= base_url('index.php/pelanggan_auth/login'); ?>">Login Pelanggan</a>
          <a class="btn btn-outline-lux w-100 mt-2" href="<?= base_url('index.php/pelanggan_auth/register'); ?>">Daftar Pelanggan</a>
          <hr class="hr-soft my-4">
          <a class="btn btn-outline-lux w-100" href="<?= base_url('index.php/auth/login'); ?>">Login Admin</a>

          <div class="d-flex justify-content-between align-items-center mt-4">
            <span class="small-muted">© <?= date('Y'); ?> Luxury Hotel</span>
            <span class="small-muted">CI3 + Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
