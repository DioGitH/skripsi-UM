@extends('layouts.app')

@section('content')
<div class=" ">
    <div class="eskilllib-banner">
        <div class="eskilllib-text">
            e Skill-Lib adalah platform repository digital berbasis web yang dikembangkan untuk mendukung penyimpanan, pengelolaan, dan publikasi karya keahlian/ Skill dari guru dan siswa di SMKN 3 Malang secara praktis, informatif, dan mudah diakses. 
        </div>
    </div>
    <div class="about-container">
        <div class="about-left about-section">
            <div style="font-size: 16px">Website ini dikembangkan oleh Aghnia Tsania Syahputri, mahasiswa Universitas Negeri Malang, Program Studi D4 Perpustakaan Digital. Pengembangan ini sebagai bagian dari Tugas Akhir dengan arahan dan bimbingan dari Bapak Dr. Setiawan, S.sos., M.IP.
                Saya berharap e Skill-Lib dapat menjadi kontribusi nyata dalam pengembangan teknologi informasi di lingkungan sekolah, khususnya dalam mendukung budaya literasi dan dokumentasi karya secara digital.
            </div>
            <div>
                {{-- << IMG PEMBIMBING  >> --}}
                <div class="mt-4 d-flex flex-row">
                    <img src="{{ asset('assets/img/pembimbing.png') }}" alt="" style="width: 135px; height: 170px">
                    <div class="mx-1">
                        <div>PEMBIMBING</div>
                        <br>
                        <h7>Setiawan, S.Sos., M.IP.</h7>
                        <br>
                        <h7>Asisten Ahli</h7>
                        <br>
                        <h7>Program Studi D4 Perpustakaan Digital</h7>
                        <br>
                        <h7>Universitas Negeri Malang</h7>
                        <br>
                        <h7>setiawan@um.ac.id</h7>
                    </div>
                </div>
                {{-- << IMG PENULIS  >> --}}
                <div class="d-flex justify-content-end flex-row">
                     <div class="mx-1 d-flex h-100 flex-column align-items-end justify-content-between">
                        <div>PENULIS</div>
                        <br>
                        <div class="d-flex flex-column align-items-end">
                            <h7>Aghnia Tsania Syahputri</h7>
                            <h7>Program Studi D4 Perpustakaan Digital</h7>
                            <h7>Universitas Negeri Malang</h7>
                            <h7>aghnia.tsania.210235@students.um.ac.id</h7>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/writer.png') }}" alt="" style="width: 135px; height: 170px">
                </div>
            </div>
        </div>
        <div class="about-right about-section">
            <div class="p-5 bg-white">
                <div class="fw-bold text-center" style="font-family: 'Instrument Sans', sans-serif; font-size: 26px">Informasi Kontak</div>
                <div class="d-flex flex-column gap-2 mt-4">
                    <div style="font-family: 'Instrument Sans', sans-serif; font-size: 22px">Admin Repository</div>
                    <div style="font-family: 'Instrument Sans', sans-serif; font-size: 22px">Media Sosisal</div>
                </div>
            </div>
            <div class="mb-4 mt-5">
                <h3 class="text-center">Lokasi</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe 
                        class="embed-responsive-item" 
                        src="https://www.google.com/maps?q=Jl.+Surabaya+No.1,+Gading+Kasri,+Klojen,+Kota+Malang,+Jawa+Timur+65115&output=embed" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .eskilllib-banner {
        width: 90%;
        height: 150px;
        background-color: #1F304B;
        font-family: 'Instrument Sans', serif;
        margin: 2rem auto 0;
        padding: 3rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .eskilllib-text {
        font-size: 26px;
        color: white;
        font-weight: bold;
        text-align: center;
        max-width: 100%;
    }
       .about-container {
        width: 90%;
        margin: 3rem auto 0;
        display: flex;
        gap: 20px;
        flex-direction: row;
        justify-content: space-between;
    }

    .about-left{
        background-color: white;
        padding: 2rem;   
    }
    .about-right {
        padding: 2rem;
    }

    .about-left {
        width: 55%;
    }

    .about-right {
        width: 40%;
    }

    .about-section img {
        width: 135px;
        height: 170px;
        object-fit: cover;
    }
    @media (max-width: 576px) {
        .eskilllib-banner {
            height: auto;
            padding: 20px 15px;
        }

        .eskilllib-text {
            font-size: 16px;
            text-align: center;
        }
        .about-container {
            flex-direction: column;
            width: 95%;
        }

        .about-left,
        .about-right {
            width: 100%;
            padding: 1.5rem 1rem;
        }

        .about-left .d-flex,
        .about-right .d-flex {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center;
        }

        .about-left .d-flex img,
        .about-right .d-flex img {
            margin-bottom: 1rem;
        }

        .about-right iframe {
            height: 300px;
        }

        .about-left h7,
        .about-right h7 {
            font-size: 14px;
        }
    
    }
</style>

@endsection
