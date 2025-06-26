@extends('layouts.admin')

@section('admin')
       @include('components.headerAdmin')   

    <div class="m-5">
      <div>
        <button type="button" class=" mb-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah
        </button>
        <form method="GET" class="mb-4 ms-5 d-flex align-items-center gap-3">
          <label for="filterProfesi" class="form-label mb-0 fw-bold">Filter Profesi:</label>
          <select name="profesi" id="filterProfesi" class="form-select w-auto" onchange="this.form.submit()">
              <option value="">Semua</option>
              <option value="guru" {{ request('profesi') == 'guru' ? 'selected' : '' }}>Guru</option>
              <option value="siswa" {{ request('profesi') == 'siswa' ? 'selected' : '' }}>Siswa</option>
          </select>
        </form>
      </div>

      <div class=" mt- 5 container d-flex flex-wrap gap-4">
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

            <div class="mb-3">
              <label class="form-label">Profesi</label>
              <select name="profesi" class="form-control" required>
                  <option value="">-- Pilih Profesi --</option>
                  <option value="guru">Guru</option>
                  <option value="siswa">Siswa</option>
              </select>
          </div>

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
