<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= isset($title) ? $title : 'Luxury Hotel'; ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

<?php
  $admin = $this->session->userdata('admin');
  if (!is_array($admin)) $admin = [];

  $q = $this->input->get('q', TRUE);
  $q = is_string($q) ? trim($q) : '';

  // Ambil lang dari query, default id
  $lang = $this->input->get('lang', TRUE);
  $lang = is_string($lang) ? strtolower(trim($lang)) : 'id';
  if (!in_array($lang, ['id','en'], true)) $lang = 'id';

  // load language file CI3
  $ci_lang = ($lang === 'en') ? 'english' : 'indonesian';
  $this->lang->load('hotel', $ci_lang);
?>

<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container container-max py-2">

    <!-- Logo -->
    <span class="d-inline-flex align-items-center justify-content-center navbar-logo">
      <img
        src="<?= base_url('assets/css/img/logo.png'); ?>"
        alt="Luxury Hotel"
        class="navbar-logo-img"
      >
    </span>

    <!-- Nama Hotel -->
    <a class="navbar-brand ms-2" href="<?= base_url('index.php/hotel?lang='.urlencode($lang)); ?>">
      <?= $this->lang->line('brand_name'); ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"
      aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-2">

        <!-- Search -->
        <li class="nav-item">
          <form class="nav-search" role="search" method="get" action="<?= base_url('index.php/hotel'); ?>">
            <input type="hidden" name="lang" value="<?= htmlspecialchars($lang); ?>">

            <div class="nav-search-wrap">
              <div class="nav-search-pill">
                <span class="nav-search-ico" aria-hidden="true">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path d="M10.5 18.5a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M16.5 16.5 21 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </span>

                <input
                  type="search"
                  name="q"
                  class="nav-search-input"
                  placeholder="<?= $this->lang->line('nav_search_placeholder'); ?>"
                  value="<?= htmlspecialchars($q); ?>"
                >
              </div>

              <button class="btn btn-outline-lux btn-sm nav-search-action" type="submit">
                <?= $this->lang->line('nav_search'); ?>
              </button>

              <?php if (!empty($q)): ?>
                <a class="btn btn-outline-lux btn-sm nav-search-action"
                  href="<?= base_url('index.php/hotel?lang='.urlencode($lang)); ?>">
                  <?= $this->lang->line('nav_reset'); ?>
                </a>
              <?php endif; ?>
            </div>
          </form>
        </li>

        <!-- Bahasa -->
        <li class="nav-item dropdown">
          <a class="btn btn-outline-lux btn-sm dropdown-toggle nav-ctl" href="#" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <?= strtoupper(htmlspecialchars($lang)); ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow-sm">
            <li>
              <a class="dropdown-item"
                 href="<?= base_url('index.php/hotel?lang=id'.(!empty($q)?'&q='.urlencode($q):'')); ?>">
                <?= $this->lang->line('nav_lang_id'); ?>
              </a>
            </li>
            <li>
              <a class="dropdown-item"
                 href="<?= base_url('index.php/hotel?lang=en'.(!empty($q)?'&q='.urlencode($q):'')); ?>">
                <?= $this->lang->line('nav_lang_en'); ?>
              </a>
            </li>
          </ul>
        </li>

        <!-- Admin / Profil -->
        <?php if (empty($admin)): ?>
          <li class="nav-item">
            <a class="btn btn-lux btn-sm nav-ctl" href="<?= base_url('index.php/auth/login'); ?>">
              <?= $this->lang->line('nav_login'); ?>
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item dropdown">
            <a class="btn btn-lux btn-sm dropdown-toggle nav-ctl" href="#" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
              <?= !empty($admin['nama']) ? htmlspecialchars($admin['nama']) : 'Admin'; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
              <li><a class="dropdown-item" href="<?= base_url('index.php/admin'); ?>">Dashboard</a></li>
              <li><a class="dropdown-item" href="<?= base_url('index.php/kasir'); ?>">Kasir</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= base_url('index.php/auth/logout'); ?>">Logout Admin</a></li>
            </ul>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
