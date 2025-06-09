@extends('layouts.app')

@section('content')
<div class="p-5 m-5">
    <div class="m-auto d-flex flex-column w-50">
        <h2>Daftar Karya {{ ucfirst($profesi) }}</h2>
            {{-- Form Search --}}
        <form action="{{ route('jelajahi.karya', ['profesi' => $profesi, 'jenisKarya' => $jenisKarya]) }}" method="GET" class=" d-flex">
            <input type="text" name="query" class="px-2 me-2" placeholder="Cari karya berdasarkan judul, pembuat, atau subjek"
                value="{{ request('query') }}" style="width: 1100px; height:40px">
            <input type="hidden" name="starts_with" value="{{ request('starts_with') }}">
            <button type="submit" class="btn text-white" style="background-color: #1F304B; width:150px; height: 40px">Cari</button>
        </form>
        {{-- Jump to A-Z --}}
        <div class="mb-4 d-flex flex-row">
            <div class="m-1">Jump to : </div>
            @foreach (range('A', 'Z') as $letter)
                <a href="{{ route('jelajahi.karya', ['profesi' => $profesi, 'jenisKarya' => $jenisKarya, 'starts_with' => $letter]) }}"
                class="text-black text-decoration-none {{ request('starts_with') == $letter ? 'btn-dark' : 'btn-outline-secondary' }} m-1">
                    {{ $letter }} |
                </a>

            @endforeach
        </div>
    </div>
        <ul>
    @if(request('query'))
        <p>Hasil pencarian untuk: <strong>{{ request('query') }}</strong></p>
    @endif

    <div>
        <h4>Karya masuk terbaru</h4>
        @forelse ($karyas as $karya)
            <a href="{{ route('karya.show', $karya->id) }}" class="text-decoration-none text-dark">
                <div class="bg-white p-2 mb-2 border rounded shadow-sm">
                    <h3>{{ $karya->title }}</h3> 
                    <p class="mb-0"><small>Pembuat: {{ $karya->creator }}</small></p>
                </div>
            </a>
        @empty
            <li>Tidak ada karya ditemukan.</li>
        @endforelse
    </div>
        </ul>
    <div class="px-5">
        <a class="px-2" href="">Kembali</a>
    </div>
</div>
@endsection
