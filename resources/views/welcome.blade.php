@extends('layouts.app')

@section('content')
<div class=" ">
    <div class="w-100 p-5" style="background-image: url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center; height: 500px;">
        <div class="ml-10 p-10 w-75 mt-7" style="font-family: 'Instrument Sans', sans-serif;">
            <div class="fw-bold" style="font-size: 55px; color: #1F304B; text-shadow: 0 4px 0 white;">
                Selamat Datang
            </div>

            <br/>
            <div class="fw-semibold" style="font-size: 26px;  color: #0B2B26; text-shadow: 0 4px 0 white;"> Di  e Skill-Lib Repository  SMKN 3 Malang.<br/>Temukan berbagai karya terbaik siswa dan guru sebagai wujud kreativitas,<br/>inovasi, dan sumber belajar inspiratif untuk semua.</div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-between">
        <div class="mt-4" style="height: 10px; width: 35%; background-color: #1F304B;"></div>
      <button class="d-flex flex-row p-4 gap-1 text-white shadow align-items-center" data-bs-target="#modal-unggah" data-bs-toggle="modal" style="background-color: #1F304B; margin-top: -40px; border-radius: 1rem; border: 3px solid white;">
            <img src="{{asset('assets/img/unggah.svg')}}" style="width: 50px" alt="">
            <h3>Unggah</h3>
        </button>
        <div class="d-flex flex-row p-4 gap-1  shadow" style="background-color: #fff; margin-top: -40px; border-radius: 1rem; border: 3px solid #1F304B; color: #1F304B">
            <img src="{{asset('assets/img/jelajahi.svg')}}"  alt="">
            <h3>Jelajahi</h3>
        </div>
        <div class="mt-4" style="height: 10px; width: 35%; background-color: #1F304B;"></div>
    </div>
    <div class="p-5 mx-5">
        <div class="fw-bold" style="font-size: 30px">Karya Terbaru</div>
    </div>

    <div class="modal fade" id="modal-unggah" tabindex="-1" aria-labelledby="modalLabel-unggah" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ">
            <div class="modal-content p-3">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center">Pilih Jenis Karya</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row flex-column-reverse">
                            @foreach($jenisKaryas->chunk(4)->reverse() as $row)
                                <div class="d-flex flex-wrap justify-content-center mb-4 w-100">
                                    @foreach($row as $jenis)
                                        <div class="col-md-3 mb-4 text-center">
                                            <div class="fw-bold" >{{ ucfirst($jenis->nama) }}</div>
                                            @if($jenis->foto_path)
                                                <img src="{{ asset('storage/' . $jenis->foto_path) }}" alt="{{ $jenis->nama }}" class="img-fluid m-auto rounded mb-2" style="max-height: 150px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/150x100?text=No+Image" alt="No image" class="img-fluid rounded mb-2">
                                            @endif

                                            <a href="{{ route('karya.create', $jenis->nama) }}" class="btn btn-outline-dark w-75 text-black m-auto fw-bold d-flex align-items-center justify-content-center gap-2">
                                                <img src="{{ asset('assets/img/upload.png') }}" alt="Unggah" style="width: 32px; height: 32px;">
                                                <span>Unggah</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<style>
    .modal-content {
        background-color: white; /* transparan putih */
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.4); /* latar belakang transparan */
    }
</style>
@endsection
