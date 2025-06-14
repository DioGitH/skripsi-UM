<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('assets/img/logo-title.png') }}" type="image/png">
        <title>SMKN 3 Malang</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        
    </head>
    <body class="d-flex flex-column justify-content-center align-items-center vh-100" style="background-color: #efefef;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    <div class="m-auto bg-white d-flex flex-column justify-content-center py-4 px-5" style="border-radius: 2rem; width: 100%; max-width: 1000px;">
        <h1 class="text-center my-4 fw-bold">Formulir pendaftaran Pengguna</h1>
        
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <!-- Username -->
            <div class="form-floating mt-4 mb-3">
                <input name="name" type="text" class="form-control" id="nameInput" value="{{ old('name') }}" placeholder="Nama Pengguna">
                <label for="nameInput">Nama Pengguna</label>
            </div>

            <!-- Password -->
            <div class="form-floating mt-4 mb-3 position-relative">
                <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Kata Sandi">
                <label for="passwordInput">Kata Sandi</label>
                <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePassword()" tabindex="-1">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </button>
            </div>

            <!-- Konfirmasi Password -->
            <div class="form-floating mt-4 mb-3">
                <input name="password_confirmation" type="password" class="form-control" id="passwordConfirm" placeholder="Ulangi Kata Sandi">
                <label for="passwordConfirm">Kata Sandi Ulang</label><button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePasswordTry()" tabindex="-1">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </button>
            </div>

            <!-- Email -->
            <div class="form-floating mt-4 mb-3">
                <input name="email" type="email" class="form-control" id="emailInput" placeholder="Email" value="{{ old('email') }}">
                <label for="emailInput">Email</label>
            </div>

            <!-- Profesi -->
            <div class="mb-3">
                <label class="mb-2 fw-bold">Daftar Sebagai</label>
                <div class="d-flex gap-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="profesi" id="guruRadio" value="guru" onchange="showInputs('guru')" {{ old('profesi') == 'guru' ? 'checked' : '' }}>
                        <label class="form-check-label" for="guruRadio">Guru</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="profesi" id="siswaRadio" value="siswa" onchange="showInputs('siswa')" {{ old('profesi') == 'siswa' ? 'checked' : '' }}>
                        <label class="form-check-label" for="siswaRadio">Siswa</label>
                    </div>
                </div>
            </div>

            <!-- Input Guru -->
            <div id="guruInput" class="mb-3" style="display: none;">
                <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                <input name="mata_pelajaran" type="text" class="form-control" id="mata_pelajaran" placeholder="Masukkan Mata Pelajaran" value="{{ old('mata_pelajaran') }}">
            </div>

            <!-- Input Siswa -->
            <div id="siswaInputs" class="mb-3" style="display: none;">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select mb-2" name="kelas" id="kelas">
                    <option selected disabled>Pilih Kelas</option>
                    <option value="10">Kelas X</option>
                    <option value="11">Kelas XI</option>
                    <option value="12">Kelas XII</option>
                </select>

                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select mb-2" name="jurusan" id="jurusan">
                    <option selected disabled>Pilih Jurusan</option>
                    <option value="Design dan Produksi Busana">Design dan Produksi Busana</option>
                    <option value="Kuliner">Kuliner</option>
                    <option value="Kecantikan">Kecantikan</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                </select>
            </div>

            <!-- reCAPTCHA (opsional, server side handle juga diperlukan) -->
            {{-- <div class="mb-3">
                <label for="captcha">Captcha</label>
                <div class="w-100 align-items-center d-flex flex-row">
                    <div>{!! captcha_img() !!}</div>
                    <button type="button" class="btn btn-secondary btn-refresh">⟳</button>
                </div>
                <input type="text" name="captcha" class="form-control mt-2" placeholder="Masukkan captcha">
            </div> --}}

            <!-- Google reCAPTCHA v2 -->
            <div class="mb-3">
                <label for="captcha">Captcha</label>
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            </div>
            <!-- Login link -->
            <div class="d-flex justify-content-center mb-2 gap-1">
                <span>Sudah punya akun?</span>
                <a href="{{route('login')}}" class="text-decoration-none fw-bold" style="color: #1F304B;" onmouseover="this.style.color='gray'" onmouseout="this.style.color='black'">Loging</a>
            </div>
            <button class="w-100 mt-3 mb-3 btn btn-lg text-white" type="submit" style="background-color: #1F304B;">Daftar</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
        const selectedProfesi = "{{ old('profesi') }}";
        if (selectedProfesi) {
            showInputs(selectedProfesi);
        }
    });
            document.addEventListener("DOMContentLoaded", function () {
        const img = document.querySelector('img[src*="/captcha"]');
        if (img) {
            img.style.width = '400px'; // ubah sesuai kebutuhan
            img.style.height = 'auto';
        }
    });
            document.querySelector('.btn-refresh').addEventListener('click', function () {
        fetch('/captcha-refresh')
            .then(res => res.text())
            .then(data => {
                document.querySelector('span').innerHTML = data;
            });
    });
          function togglePassword() {
            const passwordInput = document.getElementById("passwordInput");
            const eyeIcon = document.getElementById("eyeIcon");

            const isVisible = passwordInput.type === "text";
            passwordInput.type = isVisible ? "password" : "text";
            eyeIcon.className = isVisible ? "bi bi-eye" : "bi bi-eye-slash";
        }
          function togglePasswordTry() {
            const passwordConfirm = document.getElementById("passwordConfirm");
            const eyeIcon = document.getElementById("eyeIcon");

            const isVisible = passwordConfirm.type === "text";
            passwordConfirm.type = isVisible ? "password" : "text";
            eyeIcon.className = isVisible ? "bi bi-eye" : "bi bi-eye-slash";
        }
            function showInputs(role) {
            const guruInput = document.getElementById("guruInput");
            const siswaInputs = document.getElementById("siswaInputs");

            if (role === "guru") {
                guruInput.style.display = "block";
                siswaInputs.style.display = "none";
            } else if (role === "siswa") {
                guruInput.style.display = "none";
                siswaInputs.style.display = "block";
            }
        }
        
    </script>
    </body>

</html>
