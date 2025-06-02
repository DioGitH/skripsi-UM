@extends('layouts.app')

@section('content')
<div class="">
    <div class="w-100 p-5" style="background-image: url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center; height: 500px;">
        <div class="ml-10 p-10 w-75 mt-7" style="font-family: 'Instrument Sans', sans-serif;">
            <div class="fw-bold" style="font-size: 55px; color: #1F304B; text-shadow: 0 4px 0 white;">
                Selamat Datang
            </div>

            <br/>
            <div class="fw-semibold" style="font-size: 26px;  color: #0B2B26; text-shadow: 0 4px 0 white;"> Di  e Skill-Lib Repository  SMKN 3 Malang.<br/>Temukan berbagai karya terbaik siswa dan guru sebagai wujud kreativitas,<br/>inovasi, dan sumber belajar inspiratif untuk semua.</div>
        </div>
    </div>
</div>
@endsection
