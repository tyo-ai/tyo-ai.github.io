<div class="container container-max py-5">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h2 class="section-title mb-1">Kasir</h2>
      <div class="small-muted">Kelola pembayaran reservasi.</div>
    </div>
    <a class="btn btn-outline-lux" href="<?= base_url('index.php/admin'); ?>">← Kembali</a>
  </div>

  <div class="card-lux">
    <div class="card-body">
      <h5 class="mb-3">Data Pembayaran</h5>

      <?php if (empty($reservasi)): ?>
        <div class="alert alert-warning">Belum ada reservasi.</div>
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
                <th>Metode</th>
                <th>Bukti</th>
                <th>Status Bayar</th>
                <th class="text-end">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($reservasi as $r): ?>
                <?php
                  $status = !empty($r->status_bayar) ? $r->status_bayar : 'Belum Bayar';
                  $metode = !empty($r->metode_bayar) ? $r->metode_bayar : '-';
                ?>
                <tr>
                  <td><?= (int)$r->id_reservasi; ?></td>
                  <td><?= htmlspecialchars($r->nama_tamu); ?></td>
                  <td><?= htmlspecialchars($r->nama_kamar ?? '-'); ?></td>
                  <td><?= htmlspecialchars($r->tgl_checkin); ?></td>
                  <td><?= htmlspecialchars($r->tgl_checkout); ?></td>

                  <td><?= htmlspecialchars($metode); ?></td>

                  <td>
                    <?php if (!empty($r->bukti_transfer)): ?>
                      <a class="btn btn-outline-lux btn-sm"
                         target="_blank"
                         href="<?= base_url('uploads/bukti/'.$r->bukti_transfer); ?>">
                        Lihat Bukti
                      </a>
                    <?php else: ?>
                      <span class="small-muted">-</span>
                    <?php endif; ?>
                  </td>

                  <td>
                    <?php if ($status === 'Lunas'): ?>
                      <span class="badge badge-lux rounded-pill px-3 py-2">Lunas</span>
                    <?php elseif ($status === 'Menunggu Konfirmasi'): ?>
                      <span class="badge badge-lux rounded-pill px-3 py-2">Menunggu</span>
                    <?php else: ?>
                      <span class="badge badge-lux rounded-pill px-3 py-2">Belum Bayar</span>
                    <?php endif; ?>
                  </td>

                  <td class="text-end">
                    <?php if ($status === 'Lunas'): ?>
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
