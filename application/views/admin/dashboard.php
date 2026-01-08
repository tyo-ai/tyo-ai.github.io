<div class="container container-max py-5">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h2 class="section-title mb-1">Dashboard Admin</h2>
      <div class="small-muted">
        Login sebagai: <b><?= htmlspecialchars($this->session->userdata('admin')['nama']); ?></b>
      </div>
    </div>
    <a class="btn btn-outline-lux" href="<?= base_url('index.php/auth/logout'); ?>">Logout</a>
  </div>

  <div class="statbar mb-4">
    <div class="statcard">
      <div class="statlabel">Total Kamar</div>
      <div class="statvalue"><?= (int)$total_kamar; ?></div>
    </div>

    <div class="statcard">
      <div class="statlabel">Total Reservasi</div>
      <div class="statvalue"><?= (int)$total_reservasi; ?></div>
    </div>

    <!-- ✅ KASIR -->
    <div class="statcard">
      <div class="statlabel">Kasir</div>
      <div class="statvalue">
        <?= isset($total_belum_bayar) ? (int)$total_belum_bayar : 0; ?>
        <span class="small-muted" style="font-weight:700;">Belum Bayar</span>
      </div>
      <div class="mt-2">
        <a class="btn btn-lux btn-sm" href="<?= base_url('index.php/kasir'); ?>">Buka Kasir</a>
      </div>
    </div>
  </div>

  <div class="card-lux">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h5 class="mb-0">Data Reservasi</h5>
        <a class="btn btn-outline-lux btn-sm" href="<?= base_url('index.php/kasir'); ?>">Kelola Pembayaran</a>
      </div>

      <?php if (empty($reservasi)): ?>
        <div class="alert alert-warning">Belum ada reservasi masuk.</div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
                <th>Status Bayar</th>
                <th class="text-end">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reservasi as $r): ?>
                <?php $status_bayar = !empty($r->status_bayar) ? $r->status_bayar : 'Belum Bayar'; ?>
                <tr>
                  <td><?= (int)$r->id_reservasi; ?></td>
                  <td><?= htmlspecialchars($r->nama_tamu); ?></td>
                  <td><?= htmlspecialchars($r->nama_kamar); ?></td>
                  <td><?= htmlspecialchars($r->tgl_checkin); ?></td>
                  <td><?= htmlspecialchars($r->tgl_checkout); ?></td>
                  <td>
                    <span class="badge badge-lux rounded-pill px-3 py-2">
                      <?= htmlspecialchars($r->status); ?>
                    </span>
                  </td>

                  <td>
                    <span class="badge badge-lux rounded-pill px-3 py-2">
                      <?= htmlspecialchars($status_bayar); ?>
                    </span>
                  </td>

                  <td class="text-end">
                    <?php if ($status_bayar === 'Lunas'): ?>
                      <a class="btn btn-outline-lux btn-sm"
                         href="<?= base_url('index.php/kasir/batal_lunas/'.$r->id_reservasi); ?>">
                        Batalkan
                      </a>
                    <?php else: ?>
                      <a class="btn btn-lux btn-sm"
                         href="<?= base_url('index.php/kasir/lunas/'.$r->id_reservasi); ?>">
                        Tandai Lunas
                      </a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
