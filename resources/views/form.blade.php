@extends('layouts.app')

@section('content')

<div class="mb-5 container bg-white p-5 mt-5" style="border-radius: 20px; border-top: 20px solid #1F304B">
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
            <label class="w-25 fw-bold" style="font-size: 18px">Source</label>
            <div class="w-100">
                <span>Masukkan sumber terkait karya anda  </span>
                <select name="publisher" class="form-select" required>
                    <option disabled>-</option>
                </select>
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Publisher</label>
            <div class="w-100">
                <span>Masukkan sumber Penerbit karya  </span>
                <select name="publisher" class="form-select" required>
                    <option disabled>-</option>
                    <option value="SMKN 3 Malang ">SMKN 3 Malang</option>
                </select>
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
            <label class="w-25 fw-bold" style="font-size: 18px">contributor</label>
            <div class="w-100">
                <span>Masukan nama penanggung jawab karya</span>
                <input type="text" name="contributor" class="form-control">
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
            <label class="w-25 fw-bold" style="font-size: 18px">Language</label>
            <div class="w-100">
                <span>Pilih bahasa yang digunakan</span>
                <input type="text" name="language" class="form-control">
            </div>
        </div>
        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Type</label>
            <div class="w-100">
                <span>Pilih jenis Karya anda</span>
                <div class="form-control" style="background-color: #efefef"> Karya {{$user->profesi}}</div>
            </div>
        </div>
        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Identifier</label>
            <div class="w-100">
                <span>Masukkan NIPD/NIP/Nomor Identitas Anda</span>
                <input type="number" name="identifier" class="form-control">
            </div>
        </div>

        <div class="mb-3 d-flex flex-row">
            <label class="w-25 fw-bold" style="font-size: 18px">Coverage</label>
            <div class="w-100">
                <span>Masukan Cakupan</span>
                <input type="text" name="coverage" class="form-control">
            </div>
        </div>
       <div id="file-upload-wrapper">
            <div class="file-upload-group mb-3">
                <div class="d-flex flex-row align-items-start">
                    <label class="w-25 fw-bold" style="font-size: 18px">Format</label>
                    <div class="w-100">
                        <span>Pilih salah satu format karya anda</span>
                        <select name="format[]" class="form-select" required>
                            <option value="pdf">PDF</option>
                            <option value="jpg">JPG</option>
                            <option value="mp4">MP4</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-start mt-2">
                    <label class="w-25 fw-bold" style="font-size: 18px">File</label>
                    <div class="w-100 d-flex gap-2">
                        <div class="flex-grow-1">
                            <span>Unggah Karya Anda</span>
                            <span style="font-size: 12px"> *MAX FILE 50MB </span>
                            <input type="file" name="file[]" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm mt-4" onclick="removeFileUpload(this)">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between mt-5">
            <button type="button" class="btn btn-secondary" onclick="addFileUpload()">+ File</button>
            <button class="btn text-white" style="background-color: #1F304B">Unggah</button>
        </div>
    </form>
</div>



<script>
function addFileUpload() {
    const wrapper = document.getElementById('file-upload-wrapper');
    const group = document.createElement('div');
    group.classList.add('file-upload-group', 'mb-3');
    group.innerHTML = `
        <div class="d-flex flex-row align-items-start">
            <label class="w-25 fw-bold" style="font-size: 18px">Format</label>
            <div class="w-100">
                <span>Pilih salah satu format karya anda</span>
                <select name="format[]" class="form-select" required>
                    <option value="pdf">PDF</option>
                    <option value="jpg">JPG</option>
                    <option value="mp4">MP4</option>
                </select>
            </div>
        </div>
        <div class="d-flex flex-row align-items-start mt-2">
            <label class="w-25 fw-bold" style="font-size: 18px">File</label>
            <div class="w-100 d-flex gap-2">
                <div class="flex-grow-1">
                    <span>Unggah Karya Anda</span>
                    <span style="font-size: 12px"> *MAX FILE 50MB </span>
                    <input type="file" name="file[]" class="form-control" required>
                </div>
                <button type="button" class="btn btn-danger btn-sm mt-4" onclick="removeFileUpload(this)">Hapus</button>
            </div>
        </div>
    `;
    wrapper.appendChild(group);
}

function removeFileUpload(button) {
    const group = button.closest('.file-upload-group');
    group.remove();
}
</script>

@endsection
