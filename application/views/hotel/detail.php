<div class="container container-max py-5">
  <div class="mb-4">
    <h2 class="section-title mb-1"><?= htmlspecialchars($kamar->nama_kamar); ?></h2>
    <div class="small-muted"><?= htmlspecialchars($kamar->tipe_kamar); ?></div>
  </div>

  <?php
  function kamar_image_url($foto)
  {
    // fallback kalau kosong
    if (empty($foto)) {
      return 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=60';
    }

    // kalau sudah URL (unsplash dll) pakai langsung
    if (filter_var($foto, FILTER_VALIDATE_URL)) {
      return $foto;
    }

    // kalau file lokal
    return base_url('uploads/kamar/' . $foto);
  }

  $img = kamar_image_url($kamar->foto);
  ?>

  <div class="row g-4">
    <div class="col-lg-7">
      <div class="card-lux">
        <img
          src="<?= $img; ?>"
          class="card-img-top"
          style="height:380px; object-fit:cover;"
          alt="<?= htmlspecialchars($kamar->nama_kamar); ?>"
          loading="lazy"
          onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=60';"
        >
        <div class="card-body">
          <div class="small-muted mb-1">Deskripsi</div>
          <div><?= nl2br(htmlspecialchars($kamar->deskripsi)); ?></div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card-lux">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <div class="small-muted">Harga</div>
              <div class="price fs-3">Rp <?= number_format($kamar->harga,0,',','.'); ?></div>
              <div class="small-muted">per malam</div>
            </div>
      <span class="badge badge-lux rounded-pill px-3 py-2 badge-tag">
  <span class="badge-tag-label">TOP</span>
  <span class="badge-tag-text">⭐ Best Choice</span>
</span>

</span>

</span>

          </div>

          <hr class="hr-soft my-3">

          <ul class="small-muted mb-4">
            <li>Free Wi-Fi</li>
            <li>Luxury amenities</li>
            <li>24/7 support</li>
          </ul>

          <a class="btn btn-lux w-100" href="<?= base_url('index.php/hotel/booking/'.$kamar->id_kamar); ?>">Booking Sekarang</a>
          <a class="btn btn-outline-lux w-100 mt-2" href="<?= base_url('index.php/hotel'); ?>">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
