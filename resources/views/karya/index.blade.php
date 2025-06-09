@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>{{ $karya->title }}</h3>
        <div class="bg-white d-flex flex-column p-3 gap-4" style="border-top: 20px solid #1F304B">
            <div class=" d-flex flex-row">
                <div class="w-50">
                    <strong>Title</strong>
                    <div>{{ $karya->title }}</div>
                </div>
                <div class="w-50">
                    <strong>Right</strong>
                    <div>{{ $karya->rights }}</div>
                </div>
            </div>
            <div class=" d-flex flex-row">
                <div class="w-50">
                    <strong>Subject</strong>
                    <div>{{ $karya->subject }}</div>
                </div>
                <div class="w-50">
                    <strong>Relation</strong>
                    <div>{{ $karya->relation }}</div>
                </div>
            </div>  
            <div class="d-flex flex-row">
                <div class="w-50">
                    <strong>Relation</strong>
                    <div>{{ $karya->relation }}</div>
                </div>
                <div class="w-50">
                    <strong>Format</strong>
                    <div>{{ $karya->format }}</div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="w-50">
                    <strong>Description</strong>
                    <div>{{ $karya->description }}</div>
                </div>
                <div class="w-50">
                    <strong>Format</strong>
                    <div>{{ $karya->format }}</div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="w-50">
                    <strong>creator</strong>
                    <div>{{ $karya->creator }}</div>
                </div>
                <div class="w-50">
                    <strong>Language</strong>
                    <div>{{ $karya->language }}</div>
                </div>
            </div>
            <div class="d-flex flex-row">
               <div class="w-50">
                    <strong>Publisher</strong>
                    <div>{{ $karya->publisher }}</div>
                </div>
                <div class="w-50">
                    <strong>Identifier</strong>
                    <div>{{ $karya->identifier }}</div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="w-50">
                    <strong>Date</strong>
                    <div>{{ $karya->date }}</div>
                </div>
                <div class="w-50">
                    <strong>Type</strong>
                    <div>{{ $karya->date }}</div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="w-50">
                    <strong>Source</strong>
                    <div>{{ $karya->source }}</div>
                </div>
                <div class="w-50">
                    <strong>Coverage</strong>
                    <div>{{ $karya->coverage }}</div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div>
                    <strong>Contributor</strong>
                    <div>{{ $karya->contributor }}<div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <div class="bg-white mt-5 py-4 ">
            <div class="text-white mt-4 p-3 fw-bold" style="background-color: #1F304B; font-size: 36px">Dokumen Viewer</div>
            @php
    $ext = pathinfo($karya->file_path, PATHINFO_EXTENSION);
@endphp

<div class="mt-3">
    @forelse($karya->files as $file)
        @php
            $ext = pathinfo($file->file_path, PATHINFO_EXTENSION);
            $url = asset('storage/' . $file->file_path);
        @endphp

        @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
            {{-- Tampilkan Gambar --}}
            <img src="{{ $url }}" alt="Gambar Karya" class="img-fluid rounded mb-3">

        @elseif (strtolower($ext) === 'pdf')
            {{-- Tampilkan PDF --}}
            <embed src="{{ $url }}" type="application/pdf" width="100%" height="600px" class="mb-3" />

        @elseif (in_array(strtolower($ext), ['mp4', 'webm']))
            {{-- Tampilkan Video --}}
            <video controls width="100%" height="auto" class="mb-3">
                <source src="{{ $url }}" type="video/{{ $ext }}">
                Browser Anda tidak mendukung video ini.
            </video>

        @else
            <p class="mb-3">File tidak dapat ditampilkan. <a href="{{ $url }}" target="_blank">Unduh file</a></p>
        @endif
    @empty
        <p>Tidak ada file terkait untuk karya ini.</p>
    @endforelse
</div>


        </div>
        {{-- Tambahkan field lainnya sesuai kebutuhan --}}
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
        
    </div>
@endsection
