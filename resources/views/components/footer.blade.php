<!-- resources/views/components/footer.blade.php -->
<footer class="text-white py-4 mt-auto" style="background-color: #1F304B">
    <div class="m-auto" style="width: 90%">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div style="font-size: 36px">
                e Skill-Lib Repository SMKN 3 Malang
            </div>
            <div>
                <a href="https://wa.me/6281234567890" target="_blank" class="text-white text-decoration-none">
                    <i class="bi bi-whatsapp" style="color: #47DE52; font-size: 48px;"></i>
                </a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-auto text-center text-md-start py-4 gx-4 gy-3 d-flex justify-content-between w-100">
            <div class="col-md px-3">
                <img src="{{ asset('assets/img/logo-title.png') }}" alt="Logo" class="img-fluid" style="width: 169px;">
            </div>

            <div class="d-none d-md-flex align-items-stretch justify-content-center px-2">
                <div class="vr bg-light" style="height: 100%; width: 2px;"></div>
            </div>

            <div class="col-md px-3">
                <h6 class="text-uppercase">Kontak</h6>
                <p class="mb-1">Jl. Surabaya No.1, Gading Kasri, Klojen, Malang</p>
                <p class="mb-1">(0341) 551734</p>
                <p>smkn3_mlg@yahoo.co.id</p>
            </div>

            <div class="d-none d-md-flex align-items-stretch justify-content-center px-2">
                <div class="vr bg-light" style="height: 100%; width: 2px;"></div>
            </div>

            <div class="col-md px-3">
                <h6 class="text-uppercase">Navigasi</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('guide') }}" class="text-light text-decoration-none">Panduan Unggah</a></li>
                    <li><a href="{{ route('about') }}" class="text-light text-decoration-none">Tentang Kami</a></li>
                    <li><a href="{{ route('faq') }}" class="text-light text-decoration-none">FAQ</a></li>
                    <li><a href="{{ route('activity') }}" class="text-light text-decoration-none">Aktifitas</a></li>
                </ul>
            </div>

            <div class="d-none d-md-flex align-items-stretch justify-content-center px-2">
                <div class="vr bg-light" style="height: 100%; width: 2px;"></div>
            </div>

            <div class="col-md px-3 d-flex justify-between flex-col">
                <h6 class="text-uppercase">Temukan Kami</h6>
                <p class="mb-1 d-flex align-items-center" style="font-size: 18px">
                    <i class="bi bi-instagram" style="width: 42px"></i>
                    <a href="https://www.instagram.com/kesiswaansmekanegama/" class="text-light text-decoration-none">Smekanegama</a>
                </p>
                <p class="d-flex align-items-center" style="font-size: 18px">
                    <i class="bi bi-youtube" style="width: 42px"></i>
                    <a href="https://www.youtube.com/@SMEKANEGAMAOFFICIAL" class="text-light text-decoration-none">SMEKANEGAMA OFFICIAL</a>
                </p>
            </div>
        </div>

    </div>
</footer>
<div class="text-center p-2" style="background-color: #D9D9D9">
    <small>&copy; {{ date('Y') }} SMKN 3 Malang. All rights reserved.</small>
</div>
