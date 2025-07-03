@extends('layouts.app')

@section('content')
<div class=" ">
    <div class="w-100 p-5 text-center text-md-start"
        style="background-image: url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center; height: auto; min-height: 300px;">
        <div class="p-3 p-md-5 w-100 w-md-75 mx-auto" style="font-family: 'Instrument Sans', sans-serif;">
            <div class="fw-bold mb-3" style="font-size: clamp(28px, 5vw, 45px); color: #1F304B; text-shadow: 0 4px 0 white;">
                Selamat Datang
            </div>
            <div class="fw-semibold" style="font-size: clamp(16px, 2vw, 22px); color: #0B2B26; text-shadow: 0 4px 0 white;">
                Di e Skill-Lib Repository SMKN 3 Malang.<br/>
                Temukan berbagai karya terbaik siswa dan guru sebagai wujud kreativitas, inovasi,<br class="d-none d-md-block"/>
                dan sumber belajar inspiratif untuk semua.
            </div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-between flex-wrap tombol-wrapper px-2">
        <div class="mt-4 garis-samping"></div>

        <button class="btn-unggah align-items-center" data-bs-target="#modal-unggah" data-bs-toggle="modal">
            <img src="{{ asset('assets/img/unggah.svg') }}" class="btn-icon" alt="">
            <h3 class="btn-label">Unggah</h3>
        </button>

        <button class="btn-jelajahi align-items-center"
            onclick="bukaModalJelajahi()">
            <img src="{{ asset('assets/img/jelajahi.svg') }}" class="btn-icon" alt="">
            <h3 class="btn-label">Jelajahi</h3>
        </button>

        <div class="mt-4 garis-samping"></div>
    </div>

    <div id="carouselKaryaTerbaru" class="carousel slide mx-auto mt-5 px-3" style="max-width: 90%;" data-bs-ride="carousel">
        <div class="fw-bold karya-terbaru" style="font-size: 30px">Karya Terbaru</div>
        <div class="carousel-inner">
            @foreach($karyaTerbaru->where('status', 'Terpublish')->chunk(5) as $index => $chunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center ">
                        @foreach($chunk as $karya)
                            @php
                                $filePreview = $karya->files->first();
                                $format = $filePreview->format ?? 'unknown';
                                $isImage = in_array($format, ['jpg', 'jpeg', 'png']);
                                $thumbnail = $isImage
                                    ? asset('storage/' . $filePreview->file_path)
                                    : asset('assets/img/file-icon.png');
                            @endphp
                            <div class="card shadow-sm col-10 col-sm-6 col-md-4 col-lg-3 mb-4 mx-auto" style="height: 400px; width: 300px; border-radius: 10px; overflow: hidden;">
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

        <!-- Carousel buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselKaryaTerbaru" data-bs-slide="prev" style="width: 5%; top: 50%; transform: translateY(-50%);">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselKaryaTerbaru" data-bs-slide="next" style="width: 5%; top: 50%; transform: translateY(-50%);">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
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
                        <div class="row justify-content-center">
                            @forelse($jenisKaryas->chunk(4)->reverse() as $row)
                                @foreach($row as $jenis)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 text-center">
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
  <div class="modal fade" id="modal-jenis-karya" tabindex="-1" aria-labelledby="modalJenisKaryaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header justify-content-center border-bottom-0 position-relative">
                <h5 class="modal-title text-center" id="modalJenisKaryaLabel">
                    Pilih Jenis Karya untuk <span id="profesi-terpilih" class="text-primary fw-bold"></span>
                </h5>
                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row align-items-center g-4" id="list-jenis-karya">
                        {{-- Akan diisi dinamis oleh JavaScript --}}
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
     .btn-unggah, .btn-jelajahi {
        display: flex;
        flex-direction: row;
        padding: 1.5rem;
        gap: 0.5rem;
        border-radius: 1rem;
        border: 3px solid;
        margin-top: -40px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .btn-unggah {
        background-color: #1F304B;
        color: white;
        border-color: white;
    }

    .btn-jelajahi {
        background-color: #fff;
        color: #1F304B;
        border-color: #1F304B;
    }

    .btn-icon {
        width: 50px;
    }

    .btn-label {
        font-size: 1.75rem;
        margin: 0;
    }

    .garis-samping {
        height: 10px;
        width: 30%;
        background-color: #1F304B;
    }
    @media (max-width: 576px) {
        .modal-dialog {
            max-width: 100%;
            margin: 0;
        }
        #modal-unggah .modal-content {
            padding: 1rem;
        }
        #modal-unggah .btn {
            font-size: 14px;
            padding: 0.5rem 1rem;
        }
        .karya-terbaru{
            margin: auto;
            margin-bottom: 30px; 
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .modal-content {
            border-radius: 0;
        }
        .tombol-wrapper {
            display: flex;
            flex-direction: column;
            gap: 40px;
            width: 100%;
            align-items: center;       /* Center isi secara horizontal */
            justify-content: center;   /* Center isi secara vertikal jika dibutuhkan */
            text-align: center;
        }
        .carousel-control-prev{
            margin-left: 30px;
        }
        .carousel-control-next{
            margin-right: 30px
        }
        .btn-unggah, .btn-jelajahi {
            width: 60%;
            justify-content: center;
            padding: 0.75rem;
            gap: 0.5rem;
            margin-top: -20px;
            margin: auto;
            border-width: 2px;
        }
        #carouselKaryaTerbaru{
            align-items: center;
            margin-top: 40px;
            padding: 0 50px 0 50px;
        }
        .btn-icon {
            width: 28px;
        }

        .btn-label {
            font-size: 1.1rem;
        }

        .garis-samping {
            width: 80%;
            margin: auto;
        }
    }
</style>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const semuaJenisKarya = @json($jenisKaryas);

    function tampilkanModalJenis(profesi) {
        closeAllModals();

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
                                <a href="/jelajahi/${profesi}/${jenis.nama}"
                                class="btn btn-outline-dark w-75 text-black m-auto fw-bold d-flex align-items-center justify-content-center gap-2">
                                    <img src="/assets/img/jelajahi.svg" alt="Lihat" style="width: 24px; height: 24px;">
                                    <span>Lihat</span>
                                </a>
                            </div>
                        `;
                    });
                }

                document.getElementById('profesi-terpilih').innerText = profesi.charAt(0).toUpperCase() + profesi.slice(1);
                document.getElementById('list-jenis-karya').innerHTML = isi;

                const modalJenis = new bootstrap.Modal(document.getElementById('modal-jenis-karya'));
                modalJenis.show();
            })
            .catch(err => {
                console.error("Gagal ambil data jenis karya:", err);
            });
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
