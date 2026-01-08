<div class="container container-max py-5">
  <div class="mb-4">
    <h2 class="section-title mb-1">Form Reservasi</h2>
    <div class="small-muted">
      Kamar: <b><?= htmlspecialchars($kamar->nama_kamar); ?></b> • <?= htmlspecialchars($kamar->tipe_kamar); ?>
    </div>
  </div>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
  <?php endif; ?>

  <div class="row g-4">
    <div class="col-lg-7">
      <div class="card-lux">
        <div class="card-body">

          <!-- PENTING: enctype agar upload file bisa -->
          <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_kamar" value="<?= (int)$kamar->id_kamar; ?>">

            <div class="mb-3">
              <label class="form-label">Nama Tamu</label>
              <input class="form-control" name="nama_tamu" required>
            </div>

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Telepon</label>
                <input class="form-control" name="telepon" required>
              </div>
            </div>

            <div class="row g-3 mt-1">
              <div class="col-md-6">
                <label class="form-label">Check-in</label>
                <input type="date" class="form-control" name="tgl_checkin" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Check-out</label>
                <input type="date" class="form-control" name="tgl_checkout" required>
              </div>
            </div>

            <!-- METODE BAYAR -->
            <div class="mt-3">
              <label class="form-label">Metode Pembayaran</label>
              <select name="metode_bayar" id="metode_bayar" class="form-select" required>
                <option value="">-- Pilih Metode --</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="QRIS">QRIS</option>
                <option value="Tunai di Tempat">Tunai di Tempat</option>
              </select>

              <div class="small-muted mt-1">
                Jika pilih Transfer/QRIS, upload bukti transfer. Jika Tunai, boleh dikosongkan.
              </div>
            </div>

            <!-- QRIS BOX (muncul saat pilih QRIS) -->
            <div id="qrisBox" class="qris-box d-none mt-3">
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
                    src="<?= base_url('assets/css/img/qris.jpg'); ?>"
                    alt="QRIS Luxury Hotel"
                    class="qris-img"
                  >
                </div>

                <div class="qris-info">
                  <div class="small-muted">Cara bayar:</div>
                  <ul class="qris-list">
                    <li>Buka aplikasi bank / e-wallet</li>
                    <li>Scan QRIS</li>
                    <li>Masukkan nominal sesuai total</li>
                    <li>Selesaikan pembayaran</li>
                    <li>Upload bukti bayar (jika diminta)</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- UPLOAD BUKTI TRANSFER -->
            <div class="mt-3">
              <label class="form-label">Bukti Transfer (JPG/PNG/PDF)</label>
              <input
                type="file"
                name="bukti_transfer"
                class="form-control"
                accept=".jpg,.jpeg,.png,.pdf"
              >
              <div class="small-muted mt-1">
                Maksimal 10MB. Format: JPG / PNG / PDF.
              </div>
            </div>

            <button class="btn btn-lux w-100 mt-4" name="submit" value="1">Kirim Reservasi</button>
            <a class="btn btn-outline-lux w-100 mt-2"
               href="<?= base_url('index.php/hotel/detail/'.$kamar->id_kamar); ?>">
              Batal
            </a>
          </form>

          <!-- JS TARUH DI SINI (SETELAH FORM) -->
          <script>
            (function () {
              const select = document.getElementById('metode_bayar');
              const qrisBox = document.getElementById('qrisBox');
              if (!select || !qrisBox) return;

              function toggleQRIS() {
                const v = (select.value || '').toLowerCase();
                qrisBox.classList.toggle('d-none', v !== 'qris');
              }

              select.addEventListener('change', toggleQRIS);
              toggleQRIS();
            })();
          </script>

        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card-lux">
        <div class="card-body">
          <div class="small-muted">Ringkasan</div>
          <div class="fw-bold fs-5 mt-1"><?= htmlspecialchars($kamar->nama_kamar); ?></div>
          <div class="small-muted"><?= htmlspecialchars($kamar->tipe_kamar); ?></div>
          <hr class="hr-soft my-3">

          <div class="d-flex justify-content-between">
            <div class="small-muted">Harga/malam</div>
            <div class="price">Rp <?= number_format($kamar->harga,0,',','.'); ?></div>
          </div>

          <div class="small-muted mt-3 d-flex align-items-center justify-content-between gap-3">
            <span>Status awal:</span>
            <span class="badge badge-lux rounded-pill px-3 py-2">Belum Bayar / Menunggu Konfirmasi</span>
          </div>

          <div class="small-muted mt-3">
            <b>Catatan:</b><br>
            - Transfer/QRIS: upload bukti → status jadi <b>Menunggu Konfirmasi</b><br>
            - Tunai: tidak perlu upload → status <b>Belum Bayar</b>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
