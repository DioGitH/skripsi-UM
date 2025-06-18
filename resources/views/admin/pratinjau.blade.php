@extends('layouts.admin')

@section('admin')
@include('components.headerAdmin')
<div class="d-flex flex-column " style="background-color: #efefef">
    <div class=" fw-bold p-5" style="font-size:30px">{{ $karya->title }}</div>
    <div class="bg-white m-auto p-4" style="width: 80%; ">        
        <table class="table table-bordered">
            <tr><th>Judul</th><td>{{ $karya->title }}</td></tr>
            <tr><th>Subjek</th><td>{{ $karya->subject }}</td></tr>
            <tr><th>Deskripsi</th><td>{{ $karya->description }}</td></tr>
            <tr><th>Kreator</th><td>{{ $karya->creator }}</td></tr>
            <tr><th>Source</th><td>{{ $karya->source }}</td></tr>
            <tr><th>Publisher</th><td>{{ $karya->publisher }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $karya->date }}</td></tr>
            <tr><th>Contributor</th><td>{{ $karya->contributor }}</td></tr>
            <tr><th>Right</th><td>{{ $karya->rights }}</td></tr>
            <tr><th>Relation</th><td>{{ $karya->relation }}</td></tr>
            <tr><th>Language</th><td>{{ $karya->language }}</td></tr>
            <tr><th>Type</th><td> Karya {{ $karya->user->profesi ?? '-' }}</td></tr>
            <tr><th>Identifier</th><td>{{ $karya->identifier }}</td></tr>
            <tr><th>Coverage</th><td>{{ $karya->coverage }}</td></tr>
        </table>
    </div>
    <div class="m-auto mb-5 mt-5 d-flex flex-row justify-content-between " style="width: 80%">
        <div class=" bg-white" style="width: 70%">       
            <div class=" p-2 text-white" style="background-color: #1F304B">File Item</div>
            <table class="m-2 mb-3 table table-bordered">
                <thead>
                    <tr>
                        <th>File</th>
                        <th>Size</th>
                        <th>Format</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($karya->files as $file)
                    <tr>
                        <td>{{ basename($file->file_path) }}</td>
                        <td>{{ number_format($file->size / 1024, 2) }} KB</td>
                        <td>{{ strtoupper($file->format) }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="btn btn-sm btn-primary">
                                Lihat/Buka
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Tidak ada file tersedia.</td></tr>
                @endforelse
                </tbody>

            </table>
        </div>
            <div class="d-flex flex-row gap-5" style="width: 20%">
                <!-- Tombol Publish -->
                <button class="btn text-white" style="background-color: #1F304B; width: 80px; height: 70px;" data-bs-toggle="modal" data-bs-target="#publishModal">
                    <img style="width: 50px" src="{{ asset('assets/img/publish.png') }}" alt="Publish">
                </button>
                <button class="btn text-white" style="background-color: #1F304B; width: 80px; height: 70px;" data-bs-toggle="modal" data-bs-target="#arsipModal">
                    <img style="width: 50px" src="{{ asset('assets/img/arsip.png') }}" alt="Publish">
                </button>            </div>
            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="publishModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publishModalLabel">Konfirmasi Publikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin mempublikasikan karya ini?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('karya.publish', $karya->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Iya</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal Konfirmasi -->
            <div class="modal fade" id="arsipModal" tabindex="-1" aria-labelledby="publishModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publishModalLabel">Konfirmasi Publikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin mengarsipkan karya in?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('karya.arsip', $karya->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Iya</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
