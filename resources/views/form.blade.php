@extends('layouts.app')

@section('content')
<div class="container bg-white rounded mt-5 p-5">
    <h3>Unggah Karya: {{ $jenisKarya->nama }}</h3>

    <form action="{{ route('karya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="jenis_karya_id" value="{{ $jenisKarya->id }}">

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Title</label>
            <div class="w-100">
                <span>Masukkan judul lengkap  karya anda</span> 
                <input type="text" name="title" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Subject</label>
            <div class="w-100">
                <span>Masukkan subjek atau kata kunci karya anda </span><span style="font-size: 12px"> *contoh: busana, makanan sunda, dll </span>
                <input type="text" name="subject" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Description</label>
            <div class="w-100">    
                <span>Tulis deskripsi dari karya anda </span><span style="font-size: 12px"> *minimal 10 kata contoh: makanan ini berasal dari Jawa Timur...  </span>
                <textarea name="description" class="form-control" required></textarea>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Creator</label>
            <div class="w-100">
                <span>Masukkan nama lengkap anda </span>
                <input type="text" name="creator" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Source</label>
            <div class="w-100">
                <span>Masukkan sumber terkait karya anda  </span>
                <input type="text" name="source" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Publisher</label>
            <div class="w-100">
                <span>Masukkan sumber Penerbit karya  </span>
                <input type="text" name="source" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Date</label>
            <div class="w-100">
                <span>Isi tanggal unggah karya anda (saat ini)  </span>
                <input type="date" name="date" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Contribution</label>
            <div class="w-100">
                <span>Masukan nama penanggung jawab karya</span>
                <input type="text" name="contribution" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Rights</label>
            <div class="w-100">
                <span>pilih hak akses untuk karya anda</span>
                <input type="text" name="rights" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Relation</label>
            <div class="w-100">
                <span>hubungan</span>
                <input type="text" name="relation" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Format</label>
            <div class="w-100">
                <span>Pilih salah satu format karya anda</span>
                <select name="format" class="form-select" required>
                    <option value="pdf">PDF</option>
                    <option value="jpg">JPG</option>
                    <option value="mp4">MP4</option>
                </select>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Language</label>
            <div class="w-100">
                <span>Pilih bahasa yang digunakan</span>
                <input type="text" name="language" class="form-control">
            </div>
        </div>
        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Tyoe</label>
            <div class="w-100">
                <span>Pilih jenis Karya anda</span>
                <select name="type" class="form-select" required>
                    <option value="Karya Guru">Karya Guru</option>
                    <option value="Karya Siswa">Karya Siswa</option>
                </select>
            </div>
        </div>
        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Identifier</label>
            <div class="w-100">
                <span>Masukkan NIPD/NIP/Nomor Identitas Anda</span>
                <input type="text" name="identifier" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Coverage</label>
            <div class="w-100">
                <span>Masukan Cakupan</span>
                <input type="text" name="coverage" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">File</label>
            <div class="w-100">
                <span>Unggha Karya Anda</span><span style="font-size: 12px"> *MAX FILE 50MX </span>
                <input type="file" name="file" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary">Unggah</button>
    </form>
</div>
@endsection
