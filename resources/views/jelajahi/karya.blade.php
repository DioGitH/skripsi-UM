@extends('layouts.app')

@section('content')
<div class="container my-5 px-4">
    <div class="mx-auto w-100 w-md-75">
        <h2 class="fw-bold mb-3">Daftar Karya {{ ucfirst($profesi) }}</h2>

        {{-- Form Search --}}
        <form action="{{ route('jelajahi.karya', ['profesi' => $profesi, 'jenisKarya' => $jenisKarya]) }}" method="GET" class="d-flex flex-column flex-md-row gap-2 mb-3">
            <input type="text" name="query" class="form-control" placeholder="Cari karya berdasarkan judul, pembuat, atau subjek"
                value="{{ request('query') }}">
            <input type="hidden" name="starts_with" value="{{ request('starts_with') }}">
            <button type="submit" class="btn text-white" style="background-color: #1F304B; min-width: 120px">Cari</button>
        </form>

        {{-- Jump to A-Z --}}
        <div class="mb-4">
            <div class="d-flex flex-nowrap align-items-center overflow-auto" style="white-space: nowrap;">
                <div class="me-2 flex-shrink-0">Jump to:</div>
                @foreach (range('A', 'Z') as $letter)
                    <a href="{{ route('jelajahi.karya', ['profesi' => $profesi, 'jenisKarya' => $jenisKarya, 'starts_with' => $letter]) }}"
                       class="btn btn-sm {{ request('starts_with') == $letter ? 'btn-dark' : 'btn-outline-secondary' }} me-1 flex-shrink-0"
                       style="font-size: 12px">
                        {{ $letter }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Hasil Pencarian --}}
        @if(request('query'))
            <p>Hasil pencarian untuk: <strong>{{ request('query') }}</strong></p>
        @endif

        {{-- Daftar Karya --}}
        <div>
            <h4 class="fw-semibold mb-3">Karya Masuk Terbaru</h4>
            @forelse ($karyas as $karya)
                <a href="{{ route('karya.show', $karya->id) }}" class="text-decoration-none text-dark">
                    <div class="bg-white p-3 mb-3 border rounded shadow-sm">
                        <h5 class="fw-bold mb-1">
                            {{ $karya->creator }}({{ \Carbon\Carbon::parse($karya->date)->format('Y') }}), {{ $karya->title }} 
                        </h5>
                    </div>
                </a>
            @empty
                <p class="text-muted">Tidak ada karya ditemukan.</p>
            @endforelse
                       {{-- @forelse ($karyas as $karya)
                <a href="{{ route('karya.show', $karya->id) }}" class="text-decoration-none text-dark">
                    <div class="bg-white p-3 mb-3 border rounded shadow-sm">
                        <h5 class="fw-bold mb-1">{{ $karya->title }}</h5>
                        <p class="mb-0"><small>Pembuat: {{ $karya->creator }}</small></p>
                    </div>
                </a>
            @empty
                <p class="text-muted">Tidak ada karya ditemukan.</p>
            @endforelse --}}
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $karyas->links() }}
        </div>

        <div class="mt-4">
            <a class="btn btn-outline-secondary" href="javascript:history.back()">Kembali</a>
        </div>
    </div>
</div>
@endsection
