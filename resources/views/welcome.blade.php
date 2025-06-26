@extends('layouts.app')

@section('content')
<div class=" ">
    <div class="w-100 p-5" style="background-image: url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center; height: 500px;">
        <div class="ml-10 p-10 w-75 mt-7" style="font-family: 'Instrument Sans', sans-serif;">
            <div class="fw-bold mb-5 mt-2 " style="font-size: 45px; color: #1F304B; text-shadow: 0 4px 0 white;">
                Selamat Datang
            </div>

            <br/>
            <div class="fw-semibold" style="font-size: 22px;  color: #0B2B26; text-shadow: 0 4px 0 white;"> Di  e Skill-Lib Repository  SMKN 3 Malang.<br/>Temukan berbagai karya terbaik siswa dan guru sebagai wujud kreativitas,<br/>inovasi, dan sumber belajar inspiratif untuk semua.</div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-between">
        <div class="mt-4" style="height: 10px; width: 30%; background-color: #1F304B;"></div>
      <button class="d-flex flex-row p-4 gap-1 text-white shadow align-items-center" data-bs-target="#modal-unggah" data-bs-toggle="modal" style="background-color: #1F304B; margin-top: -40px; border-radius: 1rem; border: 3px solid white;">
            <img src="{{asset('assets/img/unggah.svg')}}" style="width: 50px" alt="">
            <h3>Unggah</h3>
        </button>
        <button class="d-flex flex-row p-4 gap-1 shadow"
                onclick="bukaModalJelajahi()"
                style="background-color: #fff; margin-top: -40px; border-radius: 1rem; border: 3px solid #1F304B; color: #1F304B">

            <img src="{{asset('assets/img/jelajahi.svg')}}"  alt="">
            <h3>Jelajahi</h3>
        </button>
        <div class="mt-4" style="height: 10px; width: 30%; background-color: #1F304B;"></div>
    </div>
    <div class="p-5 mx-5 mt-5">
        <div class="fw-bold" style="font-size: 30px">Karya Terbaru</div>
        <div id="carouselKaryaTerbaru" class="carousel slide position-relative mx-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($karyaTerbaru->where('status', 'Terpublish')->chunk(5) as $index => $chunk)                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="d-flex gap-3 justify-content-center">
                            @foreach($chunk as $karya)
                                @php
                                    $filePreview = $karya->files->first();
                                    $format = $filePreview->format ?? 'unknown';
                                    $isImage = in_array($format, ['jpg', 'jpeg', 'png']);
                                    $thumbnail = $isImage
                                        ? asset('storage/' . $filePreview->file_path)
                                        : asset('assets/img/file-icon.png'); // fallback (optional, not used here)
                                @endphp
                                <div class="card flex-fill shadow-sm" style="min-width: 18%; max-width: 18%; height: 400px; border-radius: 10px; overflow: hidden;">
                                    <div class="d-flex justify-content-center align-items-center bg-light" style="height: 250px;">
                                        @if ($isImage)
                                            <img src="{{ $thumbnail }}" alt="Preview" style="height: 100%; width: 100%; object-fit: cover;">
                                        @elseif($format === 'pdf')
                                            <div class="text-center">
                                                <i class="bi bi-file-earmark-pdf" style="font-size: 48px; color: red;"></i>
                                                <p class="mt-2 mb-0 fw-bold">PDF File</p>
                                            </div>
                                        @elseif($format === 'mp4')
                                            <div class="text-center">
                                                <i class="bi bi-file-play" style="font-size: 48px; color: #007bff;"></i>
                                                <p class="mt-2 mb-0 fw-bold">MP4 Video</p>
                                            </div>
                                        @else
                                            <p class="text-muted">Format tidak dikenal</p>
                                        @endif
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <h6 class="card-title mb-1" style="font-size: 14px;">{{ Str::limit($karya->title, 40) }}</h6>
                                        <small class="text-muted" style="font-size: 12px;">{{ Str::limit($karya->subject, 30) }}</small>
                                        <a href="{{ route('karya.show', $karya->id) }}" class="btn btn-sm btn-outline-primary mt-auto">Lihat</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Tombol slide di kiri dan kanan -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselKaryaTerbaru" data-bs-slide="prev" style="width: 5%; top: 50%; transform: translateY(-50%);">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselKaryaTerbaru" data-bs-slide="next" style="width: 5%; top: 50%; transform: translateY(-50%);">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>



    </div>
    {{-- modal unggah --}}
    <div class="modal fade" id="modal-unggah" tabindex="-1" aria-labelledby="modalLabel-unggah" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center">Pilih Jenis Karya</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @forelse($jenisKaryas->chunk(4)->reverse() as $row)
                                <div class="d-flex flex-wrap justify-content-center mb-4 w-100">
                                    @foreach($row as $jenis)
                                        <div class="col-md-3 mb-4 text-center">
                                            <div class="fw-bold mb-2">{{ ucfirst($jenis->nama) }}</div>

                                            @if($jenis->foto_path && file_exists(public_path('storage/' . $jenis->foto_path)))
                                                <img src="{{ asset('storage/' . $jenis->foto_path) }}" 
                                                    alt="{{ $jenis->nama }}" 
                                                    class="img-fluid m-auto rounded mb-2" 
                                                    style="max-height: 150px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/150x100?text=No+Image" 
                                                    alt="No image" 
                                                    class="img-fluid rounded mb-2">
                                            @endif

                                            <a href="{{ route('karya.create', $jenis->nama) }}"
                                            class="btn btn-outline-dark w-75 text-black m-auto fw-bold d-flex align-items-center justify-content-center gap-2">
                                                <img src="{{ asset('assets/img/upload.png') }}" alt="Unggah" style="width: 32px; height: 32px;">
                                                <span>Unggah</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                                <div class="text-center text-muted">
                                    <p>Tidak ada jenis karya tersedia untuk profesi Anda.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- Modal Jelajahi -->
    <div class="modal fade" id="modal-jelajahi" tabindex="-1" aria-labelledby="modalLabel-unggah" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center">Pilih Profesi</h5>
                </div>
                <div class="modal-body">
                    <div class="container d-flex justify-content-center gap-4">
                       <button class="btn btn-outline-primary" onclick="tampilkanModalJenis('siswa')">Siswa</button>
<button class="btn btn-outline-success" onclick="tampilkanModalJenis('guru')">Guru</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal Jenis Karya -->
<div class="modal fade" id="modal-jenis-karya" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title">Pilih Jenis Karya untuk <span id="profesi-terpilih"></span></h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" id="list-jenis-karya">
                        {{-- Isi dinamis via JavaScript --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>


</div>

<style>
    .btn-outline-dark:hover {
        background-color: #6c757d !important; /* Bootstrap's secondary */
        color: white !important;
        border-color: #6c757d !important;
    }
</style>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const semuaJenisKarya = @json($jenisKaryas);

    function tampilkanModalJenis(profesi) {
        closeAllModals();

        setTimeout(() => {
            document.getElementById('profesi-terpilih').textContent =
                profesi.charAt(0).toUpperCase() + profesi.slice(1);

            const container = document.getElementById('list-jenis-karya');
            container.innerHTML = '';

            semuaJenisKarya.forEach(jk => {
                const col = document.createElement('div');
                col.className = 'col-md-3 mb-3 text-center';

                const imgPath = jk.foto_path
                    ? `/storage/${jk.foto_path}`
                    : 'https://via.placeholder.com/150x100?text=No+Image';

                col.innerHTML = `
                    <div class="fw-bold mb-1">${jk.nama}</div>
                    <img src="${imgPath}" alt="${jk.nama}" class="img-fluid m-auto rounded mb-2" 
                        style="max-height: 150px; object-fit: cover;">
                    <a href="/jelajahi/${profesi}/${jk.nama}" class="btn btn-outline-dark w-100">Lihat</a>
                `;

                container.appendChild(col);
            });

            const modalJenis = new bootstrap.Modal(document.getElementById('modal-jenis-karya'));
            modalJenis.show();
        }, 300);
    }

    function closeAllModals() {
        const modalJenis = bootstrap.Modal.getInstance(document.getElementById('modal-jenis-karya'));
        if (modalJenis) modalJenis.hide();

        const modalUnggah = bootstrap.Modal.getInstance(document.getElementById('modal-unggah'));
        if (modalUnggah) modalUnggah.hide();

        const modalJelajahi = bootstrap.Modal.getInstance(document.getElementById('modal-jelajahi'));
        if (modalJelajahi) modalJelajahi.hide();

        // Hapus semua backdrop agar tidak menumpuk
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    }
    document.addEventListener('click', function () {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop && !document.body.classList.contains('modal-open')) {
            backdrop.remove();
        }
    });
    function bukaModalJelajahi() {
    closeAllModals(); // pastikan semua modal lain ditutup

    const modal = new bootstrap.Modal(document.getElementById('modal-jelajahi'));
    modal.show();
}
function closeAllModals() {
    ['modal-jenis-karya', 'modal-unggah', 'modal-jelajahi'].forEach(id => {
        const modalEl = document.getElementById(id);
        const instance = bootstrap.Modal.getInstance(modalEl);
        if (instance) instance.hide();
    });

    // Paksa hapus backdrop sisa
    setTimeout(() => {
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        document.body.classList.remove('modal-open'); // pastikan scroll aktif
    }, 300);
}
    function tampilkanModalJenis(profesi) {
        const profesiId = profesi === 'guru' ? 1 : 2;

        fetch(`/jenis-karya/profesi/${profesiId}`)
            .then(res => res.json())
            .then(data => {
                let isi = '';
                if (data.length === 0) {
                    isi = `<div class="text-center text-muted">Tidak ada jenis karya untuk ${profesi}.</div>`;
                } else {
                    data.forEach(jenis => {
                        isi += `
                            <div class="col-md-3 mb-4 text-center">
                                <div class="fw-bold mb-2">${jenis.nama}</div>
                                <img src="${jenis.foto_path ? '/storage/' + jenis.foto_path : 'https://via.placeholder.com/150x100?text=No+Image'}" 
                                     class="img-fluid m-auto rounded mb-2" style="max-height: 150px; object-fit: cover;" alt="${jenis.nama}">
                                <a href="/unggah/${jenis.nama}"
                                   class="btn btn-outline-dark w-75 text-black m-auto fw-bold d-flex align-items-center justify-content-center gap-2">
                                    <img src="/assets/img/upload.png" alt="Unggah" style="width: 32px; height: 32px;">
                                    <span>Unggah</span>
                                </>
                            </div>
                        `;
                    });
                }

                document.getElementById('profesi-terpilih').innerText = profesi.charAt(0).toUpperCase() + profesi.slice(1);
                document.getElementById('list-jenis-karya').innerHTML = isi;

                // Tampilkan modal jenis karya
                const modalJenis = new bootstrap.Modal(document.getElementById('modal-jenis-karya'));
                modalJenis.show();
            })
            .catch(err => {
                console.error("Gagal ambil data jenis karya:", err);
            });
    }


</script>


<style>
    .modal-content {
        background-color: white; /* transparan putih */
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
    .modal-content1 {
        background-color: transparent; /* transparan putih */
        border: 2px solid white;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.4); /* latar belakang transparan */
    }
</style>
@endsection
