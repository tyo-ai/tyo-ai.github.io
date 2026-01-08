<div class="container container-max py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">

      <div class="card-lux">
        <div class="card-body p-4">

          <h2 class="section-title mb-1">Pembayaran</h2>
          <div class="small-muted mb-3">
            Reservasi ID: <b><?= (int)$reservasi->id_reservasi; ?></b>
          </div>

          <div class="alert alert-warning">
            Pilih metode bayar. Setelah dikirim, status menjadi <b>Menunggu Konfirmasi</b>.
          </div>

          <form method="post" action="<?= base_url('index.php/pembayaran/proses'); ?>">
            <input type="hidden" name="id_reservasi" value="<?= (int)$reservasi->id_reservasi; ?>">

           <div class="mb-3">
  <label class="form-label">Metode Pembayaran</label>
  <select name="metode_bayar" id="metode_bayar" class="form-select" required>
    <option value="">-- pilih --</option>
    <option value="Transfer Bank">Transfer Bank</option>
    <option value="QRIS">QRIS</option>
    <option value="Tunai di Tempat">Tunai di Tempat</option>
  </select>
</div>

<!-- QRIS BOX (muncul hanya kalau pilih QRIS) -->
<div id="qrisBox" class="qris-box d-none">
  <div class="d-flex align-items-start justify-content-between gap-3 flex-wrap">
    <div>
      <div class="fw-bold">Bayar via QRIS</div>
      <div class="small-muted mt-1">
        Scan barcode QRIS ini memakai aplikasi bank / e-wallet kamu.
        <br>Nominal bisa kamu isi bebas sesuai total.
      </div>
    </div>

    <span class="badge badge-lux rounded-pill px-3 py-2">QRIS</span>
  </div>

  <div class="qris-grid mt-3">
    <div class="qris-imgwrap">
      <img
        src="<?= base_url('assets/css/img/qris.png'); ?>"
        alt="QRIS Luxury Hotel"
        class="qris-img"
      >
    </div>

    <div class="qris-info">
      <div class="small-muted">Catatan:</div>
      <ul class="qris-list">
        <li>1) Buka aplikasi bank / e-wallet</li>
        <li>2) Scan QRIS</li>
        <li>3) Masukkan nominal sesuai total</li>
        <li>4) Lanjutkan pembayaran</li>
        <li>5) Upload bukti bayar (jika diminta)</li>
      </ul>
    </div>
  </div>
</div>
            <button class="btn btn-lux w-100" type="submit">Kirim Konfirmasi Bayar</button>

            <div class="text-center mt-3">
              <a class="small-muted" href="<?= base_url('index.php/hotel'); ?>">← Kembali ke Home</a>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<script>
  (function () {
    const select = document.getElementById('metode_bayar');
    const qrisBox = document.getElementById('qrisBox');

    if (!select || !qrisBox) return;

    function toggleQRIS() {
      const v = (select.value || '').toLowerCase();
      if (v === 'qris') qrisBox.classList.remove('d-none');
      else qrisBox.classList.add('d-none');
    }

    select.addEventListener('change', toggleQRIS);
    toggleQRIS(); // run on load
  })();
</script>
