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
      <ul class="navbar-nav gap-2 fw-bold px-5">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('guide') ? 'active fw-bold' : '' }}" href="{{ route('guide') }}">Panduan Unggah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('faq') ? 'active fw-bold' : '' }}" href="{{ route('faq') }}">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('activity') ? 'active fw-bold' : '' }}" href="{{ route('activity') }}">Aktifitas</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
<!-- Garis Biru -->
<div class="" style="height: 10px; width: 100%; background-color: #1F304B;"></div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
