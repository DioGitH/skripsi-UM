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
        <div class="modal-dialog">
            <div class="modal-content border border-secondary border-2 p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
