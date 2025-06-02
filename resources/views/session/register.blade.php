<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        
    </head>
    <body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #efefef;">
    <div class="m-auto bg-white d-flex flex-column justify-content-center py-4 px-5" style="border-radius: 2rem; width: 100%; max-width: 1000px;">
        <h1 class="text-center my-4 fw-bold">Formulir pendaftaran Pengguna</h1>
        
        <form action="">
            <!-- Username input -->
            <div class="form-floating mt-4 mb-3">
                <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Nama Pengguna">
                <label for="floatingInput">Nama Pengguna</label>
            </div>
            <!-- Password input -->
            <div class="form-floating mt-4 mb-3 position-relative">
                <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Kata Sandi">
                <label for="passwordInput">Kata Sandi</label>

                <!-- Toggle button (mata) -->
                <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePassword()" tabindex="-1">
                    <i id="eyeIcon" class="bi bi-eye"></i>
                </button>
            </div>
            <!-- Password Try input -->
            <div class="form-floating mt-4 mb-2 position-relative">
                <input name="password" type="password" class="form-control" id="passwordInputTry" placeholder="Kata Sandi">
                <label for="passwordInput">Kata Sandi Ulang</label>

                <!-- Toggle button (mata) -->
                <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePasswordTry()" tabindex="-1">
                    <i id="eyeIcon" class="bi bi-eye"></i>
                </button>
            </div>
            <!-- Email input -->
            <div class="form-floating mt-4 mb-3">
                <input name="name" type="mail" class="form-control" id="floatingInput" placeholder="Nama Pengguna">
                <label for="floatingInput">Email</label>
            </div>
            <!-- Profesi -->
            <div class="mt-4 mb-3">
                <label class="mb-2 fw-bold">Daftar Sebagai</label>
                <div class="d-flex gap-4">

                    <!-- Guru -->
                    <div class="form-check">
                        <input class="form-check-input rounded-circle" type="radio" name="profesi" id="guruRadio" onchange="showInputs('guru')">
                        <label class="form-check-label" for="guruRadio">Guru</label>
                    </div>

                    <!-- Siswa -->
                    <div class="form-check">
                        <input class="form-check-input rounded-circle" type="radio" name="profesi" id="siswaRadio" onchange="showInputs('siswa')">
                        <label class="form-check-label" for="siswaRadio">Siswa</label>
                    </div>
                </div>
            </div>

            <!-- Input tambahan -->
            <div id="guruInput" class="mb-3" style="display: none;">
                <label for="guruKode" class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" id="guruKode" placeholder="Masukkan Kode Guru">
            </div>

            <div id="siswaInputs" class="mb-3" style="display: none;">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select mb-2" id="kelas" name="kelas">
                    <option selected disabled>Pilih Kelas</option>
                    <option value="10">Kelas X</option>
                    <option value="11">Kelas XI</option>
                    <option value="12">Kelas XII</option>
                </select>
                
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select mb-2" id="kelas" name="kelas">
                    <option selected disabled>Pilih Jurusan</option>
                    <option value="10">Kelas 10</option>
                    <option value="11">Kelas 11</option>
                    <option value="12">Kelas 12</option>
                </select>
            </div>
            <!-- Google reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LfvDVIrAAAAAPNN46hmvrZxkUGt9ePxzoJU3K39"></div>

            <!-- Checkbox + Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mt-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="showPasswordCheckbox" >
                    <label class="form-check-label" for="showPasswordCheckbox">Pastikan kamu telah terdaftar sebelum melakukan unggah karya</label>
                </div>
                
            </div>

            <button class="w-100 mt-3 mb-3 btn btn-lg text-white" type="submit" style="background-color: #1F304B;">Masuk</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
          function togglePassword() {
            const passwordInput = document.getElementById("passwordInput");
            const eyeIcon = document.getElementById("eyeIcon");

            const isVisible = passwordInput.type === "text";
            passwordInput.type = isVisible ? "password" : "text";
            eyeIcon.className = isVisible ? "bi bi-eye" : "bi bi-eye-slash";
        }
          function togglePasswordTry() {
            const passwordInput = document.getElementById("passwordInputTry");
            const eyeIcon = document.getElementById("eyeIcon");

            const isVisible = passwordInput.type === "text";
            passwordInput.type = isVisible ? "password" : "text";
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
