@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center m-auto mt-5" style="width:90%; height:150px; background-color: #1F304B; font-family: 'Inknut Antiqua', serif;">
        <div class="d-flex justify-content-center align-items-center text-white mx-auto" style="font-size: 40px; width: 50%; height: 50%;">
            FAQ
        </div>
    </div>
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-item-title">1. Apa itu e Skill-Lib Repository?</div>
            <div class="faq-item-text">e Skill-Lib Repository merupakan sebuah website yang berperan sebagai wadah penyimpanan, pengelolaan, dan publikasi karya dari siswa dan guru secara digital.</div>
        </div>
        <div class="faq-item">
            <div class="faq-item-title">2. Bagaimana cara mencari karya tertentu di repository?</div>
            <div class="faq-item-text">Anda dapat menggunakan menu jelajah di halaman utama repository. Pilih bidang karya yang anda inginkan lalu masukkan kata kunci terkait kebutuhan, seperti judul karya, nama penulis, atau subjek karya.</div>
        </div>
        <div class="faq-item">
            <div class="faq-item-title">3. Bagaimana cara mengunggah karya ke repository?</div>
            <div class="faq-item-text">Pengguna dapat mengunggah karya melalui akun pribadi mereka setelah login. Kemudian, untuk panduan lengkap, silakan melihat pada menu Panduan Unggah</div>
        </div>
        <div class="faq-item">
            <div class="faq-item-title">4. Apakah pengguna dapat mengedit karya setelah diunggah?</div>
            <div class="faq-item-text">Setelah karya diunggah, pengguna dapat melihat status karya apakah dapat terpublis atau tidak. Jika tidak terpublish, pengguna dapat melakukan unggah ulang atau edit data pada menu Aktifitas. Pastikan cek menu Aktifitas secara berkala untuk melihat status karya anda.</div>
        </div>
        <div class="faq-item">
            <div class="faq-item-title">5. Apakah Website Repository dapat diakses di luar sekolah?</div>
            <div class="faq-item-text">Saat ini website menggunakan sistem lokalhost dimana website hanya bisa dilakukan di lingkungan sekolah yang terhubung dengan Wi-Fi.</div>
        </div>
    </div>

    <div class="back">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
    <style>
    .faq-container {
        width: 90%;
        margin: 3rem auto 5rem;
        padding: 2rem;
        background-color: white;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .faq-item {
        font-size: 18px;
    }

    .faq-item-title {
        font-size: 24px;
        font-weight: bold;
        margin-left: 1rem;
        margin-bottom: 0.5rem;
    }

    .faq-item-text {
        margin-left: 2rem;
        font-size: 18px;
    }
    .back{
        margin-left: 100px;
        margin-bottom: 50px;
    }
    @media (max-width: 576px) {
        .faq-container {
            padding: 1.5rem 1rem;
            width: 95%;
        }

        .faq-item-title {
            font-size: 18px;
            margin-left: 0.5rem;
            text-align: left;
        }

        .faq-item-text {
            font-size: 14px;
            margin-left: 1rem;
            text-align: left;
        }
        .back{
            margin:auto;
            margin-bottom: 20px
        }
    }
</style>

@endsection
