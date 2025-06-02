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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        
    </head>
    <body class="d-flex justify-content-center align-items-center vh-100" style="background-color: #efefef;">
    <div class="m-auto bg-white d-flex flex-column justify-content-center py-4 px-5" style="border-radius: 2rem; width: 100%; max-width: 500px;">
        <h1 class="text-center my-4 fw-bold">Masuk</h1>
        
        <form action="">
        <!-- Email input -->
        <div class="form-floating mt-4 mb-3">
            <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Nama Pengguna">
            <label for="floatingInput">Nama Pengguna</label>
        </div>

        <!-- Password input -->
        <div class="form-floating mt-4 mb-3">
            <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Kata Sandi">
            <label for="passwordInput">Kata Sandi</label>
        </div>

        <!-- Checkbox + Forgot Password -->
        <div class="d-flex justify-content-between align-items-center mt-2">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="showPasswordCheckbox" onclick="togglePassword()">
            <label class="form-check-label" for="showPasswordCheckbox">Tampilkan Kata Sandi</label>
            </div>
            <div>
            <a href="#" class="text-decoration-none" style="color: black;" onmouseover="this.style.color='gray'" onmouseout="this.style.color='black'">Lupa Kata Sandi</a>
            </div>
        </div>

        <button class="w-100 mt-3 mb-3 btn btn-lg text-white" type="submit" style="background-color: #1F304B;">Masuk</button>
        </form>

        <!-- Daftar link -->
        <div class="d-flex justify-content-center mb-2 gap-1">
        <span>Belum punya akun?</span>
        <a href="#" class="text-decoration-none" style="color: black;" onmouseover="this.style.color='gray'" onmouseout="this.style.color='black'">Daftar</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function togglePassword() {
        const passwordInput = document.getElementById("passwordInput");
        passwordInput.type = passwordInput.type === "text" ? "password" : "text";
        }
    </script>
    </body>

</html>
