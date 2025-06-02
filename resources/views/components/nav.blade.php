<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid px-4 d-flex justify-content-between align-items-center">
    
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img class="logo-custom mx-3 w-20" src="{{ asset('assets/img/logo.png') }}" alt="Foto">
      <div class="d-flex flex-column">
        <div class=" fs-3 fw-bold">e Skill-Lib </div>
        <h6>Repository SMKN 3 Malang</h6>
      </div>
    </a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
      <ul class="navbar-nav gap-2">
        <li class="nav-item">
          <a class="nav-link active" href="#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Panduan Unggah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Aktifitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="#">Logout</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
<!-- Garis Biru -->
<div class="" style="height: 10px; width: 100%; background-color: #1F304B;"></div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
