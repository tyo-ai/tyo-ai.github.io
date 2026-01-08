<div class="container container-max py-5 text-center">
  <div class="card-lux mx-auto" style="max-width:620px">
    <div class="card-body p-5">

      <span class="badge badge-lux rounded-pill px-3 py-2">Success</span>

      <h2 class="section-title mt-3">Reservasi Berhasil</h2>

      <p class="small-muted mt-2">
        Terima kasih. Reservasi kamu sudah masuk dan menunggu konfirmasi admin.
      </p>

      <?php if (!empty($reservasi)): ?>
        <div class="mt-4 text-start">
          <div class="small-muted">Detail Reservasi</div>
          <hr class="hr-soft my-3">

          <div class="d-flex justify-content-between">
            <div class="small-muted">ID Reservasi</div>
            <div class="fw-bold"><?= (int)$reservasi->id_reservasi; ?></div>
          </div>

          <div class="d-flex justify-content-between mt-2">
            <div class="small-muted">Metode Bayar</div>
            <div class="fw-bold"><?= htmlspecialchars($reservasi->metode_bayar ?? '-'); ?></div>
          </div>

          <div class="d-flex justify-content-between mt-2">
            <div class="small-muted">Status Bayar</div>
            <div>
              <span class="badge badge-lux rounded-pill px-3 py-2">
                <?= htmlspecialchars($reservasi->status_bayar ?? 'Belum Bayar'); ?>
              </span>
            </div>
          </div>

          <?php if (!empty($reservasi->bukti_transfer)): ?>
            <div class="mt-3">
              <a class="btn btn-outline-lux w-100" target="_blank"
                 href="<?= base_url('uploads/bukti/'.$reservasi->bukti_transfer); ?>">
                Lihat Bukti Transfer
              </a>
            </div>
          <?php else: ?>
            <div class="alert alert-warning mt-3 mb-0">
              Bukti transfer belum diupload.
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <a class="btn btn-lux mt-4" href="<?= base_url('index.php/hotel'); ?>">
        Kembali ke Daftar Kamar
      </a>

    </div>
  </div>
</div>
