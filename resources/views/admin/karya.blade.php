@extends('layouts.admin')

@section('admin')
       @include('components.headerAdmin')   

    <div class="m-5">
      <div class="container bg-white p-4 rounded mb-4">
          <form action="{{ route('admin.setting.update') }}" method="POST" class="row g-3 align-items-end">
              @csrf
              <div class="col-md-auto">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="show_guru" id="show_guru" {{ $showGuru == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="show_guru">
                          Tampilkan Jelajahi Guru
                      </label>
                  </div>
              </div>

              <div class="col-md-auto">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="show_siswa" id="show_siswa" {{ $showSiswa == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="show_siswa">
                          Tampilkan Jelajahi Siswa
                      </label>
                  </div>
              </div>

              <div class="col-md-auto">
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>

      <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 px-2">
          <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
              + Tambah
          </button>

          <form method="GET" class="d-flex align-items-center gap-2">
              <label for="filterProfesi" class="form-label fw-bold mb-0">Filter Profesi:</label>
              <select name="profesi" id="filterProfesi" class="form-select w-auto" onchange="this.form.submit()">
                  <option value="">Semua</option>
                  <option value="guru" {{ request('profesi') == 'guru' ? 'selected' : '' }}>Guru</option>
                  <option value="siswa" {{ request('profesi') == 'siswa' ? 'selected' : '' }}>Siswa</option>
              </select>
          </form>
      </div>


      <div class=" mt-5 container d-flex flex-wrap gap-4">
    @foreach ($jenisKarya as $jenis)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $jenis->foto_path) }}" class="card-img-top" alt="{{ $jenis->nama }}">
            <div class="card-body">
                <h5 class="card-title">{{ $jenis->nama }}</h5>
                <a href="{{ route('admin.karya.preview', $jenis->id) }}" class="btn btn-primary">Pratinjau</a>

                <form action="{{ route('admin.karya.destroy', $jenis->id) }}" method="POST" class="mt-2"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis karya ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">Hapus</button>
                </form>
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
              <select name="profesi_id" class="form-control" required>
                  <option value="">-- Pilih Profesi --</option>
                  <option value="1">Guru</option>
                  <option value="2">Siswa</option>
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
