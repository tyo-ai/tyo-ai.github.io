<footer class="footer">
  <div class="container container-max py-5">
    <div class="row g-4 align-items-start">

      <!-- Brand / Copyright -->
      <div class="col-12 col-md-5">
        <div class="fw-black footer-title">Luxury Hotel</div>
        <div class="small-muted mt-2">
          Reservasi online cepat, elegan, dan aman untuk pengalaman menginap terbaik.
        </div>

        <div class="small-muted mt-3">
          © <?= date('Y'); ?> Luxury Hotel • All Rights Reserved
        </div>
      </div>

      <!-- Kontak -->
      <div class="col-6 col-md-3">
        <div class="footer-head">Kontak</div>
        <ul class="footer-list">
          <li><span class="small-muted">Email:</span> <a class="footer-link" href="mailto: lawubintang69@gmail.com ">cs@luxuryhotel.com</a></li>
          <li><span class="small-muted">WhatsApp:</span> <a class="footer-link" href="https://wa.me/6282146837575" target="_blank" rel="noopener">+62 821-4683-7575</a></li>
          <li><span class="small-muted">Alamat:</span> Jl. Luxury No. 10, Jakarta</li>
        </ul>
      </div>

      <!-- Link penting -->
      <div class="col-6 col-md-2">
        <div class="footer-head">Link Penting</div>
        <ul class="footer-list">
          <li><a class="footer-link" href="<?= base_url('index.php/hotel'); ?>">Daftar Kamar</a></li>
          <li><a class="footer-link" href="<?= base_url('index.php/hotel'); ?>#promo">Promo</a></li>
          <li><a class="footer-link" href="<?= base_url('index.php/hotel'); ?>#faq">FAQ</a></li>
          <li><a class="footer-link" href="<?= base_url('index.php/auth/login'); ?>">Login Admin</a></li>
        </ul>
      </div>

      <!-- Sosial Media -->
      <div class="col-12 col-md-2">
        <div class="footer-head">Sosial Media</div>
        <div class="footer-social">
          <a class="footer-social-btn" href="https://www.instagram.com/setyo_gw?igsh=M2NmbjNwYTQxYmhs" target="_blank" rel="noopener" aria-label="Instagram">
            IG
          </a>
          <a class="footer-social-btn" href="https://www.facebook.com/share/1G26iyfRwU/" target="_blank" rel="noopener" aria-label="Facebook">
            FB
          </a>
          <a class="footer-social-btn" href="https://www.tiktok.com/@rizsdby_?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener" aria-label="TikTok">
            TT
          </a>
        </div>
      </div>
    </div>

    <hr class="hr-soft my-4">

    <!-- Kebijakan & Syarat -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
      <div class="small-muted">
        Dengan menggunakan layanan ini, Anda menyetujui kebijakan dan syarat yang berlaku.
      </div>

      <div class="d-flex gap-3 flex-wrap">
        <a class="footer-link" href="<?= base_url('index.php/pages/privacy'); ?>">Kebijakan Privasi</a>
        <a class="footer-link" href="<?= base_url('index.php/pages/terms'); ?>">Syarat Layanan</a>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
