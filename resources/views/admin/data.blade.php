<div class="container">
    <h1>Tambah Jenis Karya</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jenis Karya</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto (optional)</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>