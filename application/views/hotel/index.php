<?php
$total_kamar = !empty($kamar) ? count($kamar) : 0;

function kamar_image_url($foto)
{
  // kalau foto kosong → fallback
  if (empty($foto)) {
    return 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=60';
  }

  // kalau foto sudah URL (http/https) → pakai langsung
  if (filter_var($foto, FILTER_VALIDATE_URL)) {
    return $foto;
  }

  // kalau filename lokal → arahkan ke uploads/kamar/
  return base_url('uploads/kamar/' . $foto);
}
?>

<section class="hero">
  <div class="container container-max py-5">
    <div class="row align-items-center g-4">

      <div class="col-lg-7">
        <span class="badge badge-lux rounded-pill px-3 py-2">
          Luxury • Clean • Professional
        </span>

        <h1 class="mt-3 section-title display-5">
          Reservasi Hotel Mewah<br>yang Elegan & Modern
        </h1>

        <p class="mt-3 small-muted fs-5">
          Pilih kamar terbaik dengan layanan premium. Proses booking cepat, rapi, dan aman.
        </p>

        <div class="mt-4 d-flex gap-2 flex-wrap">
          <a class="btn btn-lux" href="#list">Lihat Kamar</a>
        </div>

        <!-- STAT / TOTAL KAMAR -->
        <div class="statbar mt-4">
          <div class="statcard">
            <div class="statlabel">Total Kamar</div>
            <div class="statvalue"><?= $total_kamar; ?></div>
          </div>
          <div class="statcard">
            <div class="statlabel">Status</div>
            <div class="statvalue">Premium</div>
          </div>
          <div class="statcard">
            <div class="statlabel">Support</div>
            <div class="statvalue">24/7</div>
          </div>
        </div>

      </div>

      <div class="col-lg-5">

        <!-- FOTO HOTEL (BARU) -->
        <div class="hero-photo mb-3">
          <img
            src="https://awsimages.detik.net.id/community/media/visual/2025/01/06/hotel-mewah-di-dubai-atlantis-the-royal_169.webp?w=1200"
            alt="Hotel"
            loading="lazy"
            onerror="this.onerror=null;this.src='https://awsimages.detik.net.id/community/media/visual/2025/01/06/hotel-mewah-di-dubai-atlantis-the-royal_169.webp?w=1200"
          >
          <div class="hero-photo-badge">
            <span class="badge badge-lux rounded-pill px-3 py-2">Our Hotel</span>
          </div>
        </div>

        <div class="hero-card">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="small-muted">Highlight</div>
              <div class="fw-bold">Best Rate Guarantee</div>
            </div>
            <span class="badge badge-lux rounded-pill px-3 py-2">Premium</span>
          </div>

          <hr class="hr-soft my-3">

          <div class="row g-3">
            <div class="col-6">
              <div class="small-muted">Check-in</div>
              <div class="fw-semibold">Fleksibel</div>
            </div>
            <div class="col-6">
              <div class="small-muted">Service</div>
              <div class="fw-semibold">24/7</div>
            </div>
            <div class="col-6">
              <div class="small-muted">Payment</div>
              <div class="fw-semibold">On Arrival</div>
            </div>
            <div class="col-6">
              <div class="small-muted">Support</div>
              <div class="fw-semibold">Fast Response</div>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div id="list" class="mt-5"></div>
  </div>
</section>

<main class="container container-max py-5">
  <div class="d-flex align-items-end justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h2 class="section-title mb-1">Daftar Kamar</h2>
      <div class="small-muted">Pilih kamar sesuai kebutuhanmu.</div>
    </div>

    <!-- TOTAL KAMAR (header list) -->
    <div class="totalpill">
      <span class="dot"></span>
      Total: <b><?= $total_kamar; ?></b> kamar
    </div>
  </div>

  <?php if (empty($kamar)): ?>
    <div class="alert alert-warning">
      Data kamar masih kosong. Isi tabel <b>kamar</b> di phpMyAdmin dulu.
    </div>
  <?php endif; ?>

  <div class="row g-4">
    <?php foreach ($kamar as $k): ?>
      <?php $img = kamar_image_url($k->foto); ?>

      <div class="col-md-6 col-lg-4">
        <div class="card-lux h-100">

          <!-- GAMBAR PROFESIONAL (dengan overlay) -->
          <div class="card-media">
            <img
              src="<?= $img; ?>"
              alt="<?= htmlspecialchars($k->nama_kamar); ?>"
              loading="lazy"
              onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=60';"
            >
            <div class="media-badge">
              <span class="badge badge-lux rounded-pill px-3 py-2">Luxury</span>
            </div>
          </div>

          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <div class="fw-bold fs-5"><?= htmlspecialchars($k->nama_kamar); ?></div>
                <div class="small-muted"><?= htmlspecialchars($k->tipe_kamar); ?></div>
              </div>
            </div>

            <hr class="hr-soft my-3">

            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="small-muted">Mulai dari</div>
                <div class="price">
                  Rp <?= number_format($k->harga, 0, ',', '.'); ?><span class="small-muted">/malam</span>
                </div>
              </div>

              <div class="d-flex gap-2">
                <a class="btn btn-outline-lux btn-sm" href="<?= base_url('index.php/hotel/detail/'.$k->id_kamar); ?>">Detail</a>
                <a class="btn btn-lux btn-sm" href="<?= base_url('index.php/hotel/booking/'.$k->id_kamar); ?>">Booking</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>
