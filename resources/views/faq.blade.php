@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center m-auto mt-5" style="width:90%; height:150px; background-color: #1F304B; font-family: 'Inknut Antiqua', serif;">
        <div class="d-flex justify-content-center align-items-center text-white mx-auto" style="font-size: 40px; width: 50%; height: 50%;">
            FAQ
        </div>
    </div>
    <div class="m-auto d-flex p-5 mb-5 flex-column gap-4 bg-white mt-5" style="width: 90%; margin-bottom: 200px">
        <div>
            <div class="mx-4 fw-bold" style="font-size:24px">1. Apa itu e Skill-Lib Repository?</div>
            <div class="mx-5" style="font-size: 18px">e Skill-Lib Repository merupakan sebuah website yang berperan sebagai wadah penyimpanan, pengelolaan, dan publikasi karya dari siswa dan guru secara digital.</div>
        </div>
        <div>
            <div class="mx-4 fw-bold" style="font-size:24px">2. Bagaimana cara mencari karya tertentu di repository?</div>
            <div class="mx-5" style="font-size: 18px">Anda dapat menggunakan menu jelajah di halaman utama repository. Pilih bidang karya yang anda inginkan lalu masukkan kata kunci terkait kebutuhan, seperti judul karya, nama penulis, atau subjek karya.</div>
        </div>
        <div>
            <div class="mx-4 fw-bold" style="font-size:24px">3. Bagaimana cara mengunggah karya ke repository?</div>
            <div class="mx-5" style="font-size: 18px">Pengguna dapat mengunggah karya melalui akun pribadi mereka setelah login. Kemudian, untuk panduan lengkap, silakan melihat pada menu Panduan Unggah</div>
        </div>
        <div>
            <div class="mx-4 fw-bold" style="font-size:24px">4. Apakah pengguna dapat mengedit karya setelah diunggah?</div>
            <div class="mx-5" style="font-size: 18px">Setelah karya diunggah, pengguna dapat melihat status karya apakah dapat terpublis atau tidak. Jika tidak terpublish, pengguna dapat melakukan unggah ulang atau edit data pada menu Aktifitas. Pastikan cek menu Aktifitas secara berkala untuk melihat status karya anda.</div>
        </div>
        <div>
            <div class="mx-4 fw-bold" style="font-size:24px">5. Apakah Website Repository dapat diakses di luar sekolah?</div>
            <div class="mx-5" style="font-size: 18px">Saat ini website menggunakan sistem lokalhost dimana website hanya bisa dilakukan di lingkungan seolah yang terhubung dengan Wi-Fi.</div>
        </div>
    </div>
    <div class="px-5">
        <a class="px-2" href="">Kembali</a>
    </div>
    
@endsection
