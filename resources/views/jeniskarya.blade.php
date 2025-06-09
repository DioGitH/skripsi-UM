@extends('layouts.app') {{-- Sesuaikan jika kamu pakai layout berbeda --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Jenis Karya untuk: {{ ucfirst($type) }}</h2>

    @if ($jenisKaryas->isEmpty())
        <p>Tidak ada jenis karya tersedia untuk tipe ini.</p>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($jenisKaryas as $jenis)
                <div class="col">
                    <div class="card h-100">
                        @if ($jenis->foto_path)
                            <img src="{{ asset('storage/' . $jenis->foto_path) }}" class="card-img-top" alt="{{ $jenis->nama }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $jenis->nama }}</h5>
                            <a href="{{ route('karya.create', $jenis->nama) }}" class="btn btn-primary">Unggah Karya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Beranda</a>
    </div>
</div>
@endsection
