@extends('layouts.admin')

@section('admin')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class=" p-3 d-flex justify-content-between w-100">
        <div class="fw-bold mx-2" style="font-size: 32px">Beranda</div>

        <div class="d-flex gap-5 mx-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
               + Tambah
            </button>
            <button style="width:33px"><img src="{{ asset('assets/img/notif.png') }}" alt=""></button>
            <button style="width: 44px"><img src="{{ asset('assets/img/setting.png') }}" alt=""></button>
        </div>
    </div>
<div class="container d-flex flex-wrap gap-4">
    @foreach ($jenisKarya as $jenis)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' .  $jenis->foto_path) }}" class="card-img-top" alt="{{ $jenis->nama }}">
            <div class="card-body">
                <h5 class="card-title">{{ $jenis->nama }}</h5>
                <a href="{{ route('admin.karya.preview', $jenis->id) }}" class="btn btn-primary">Pratinjau</a>
            </div>
        </div>
    @endforeach
</div>
<!-- Modal Tambah Jenis Karya -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header Modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Jenis Karya</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body Modal -->
      <div class="modal-body">
        <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <!-- Nama Jenis Karya -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Jenis Karya</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>

          <!-- Upload Foto -->
          <div class="mb-3">
            <label for="foto" class="form-label">Foto (Opsional)</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
          </div>

          <!-- Tombol Submit -->
          <div class="modal-footer px-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

@endsection
