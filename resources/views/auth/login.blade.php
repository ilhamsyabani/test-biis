<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tes Pegawai</title>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-10/assets/css/login-10.css">
    <!-- Fonts -->
</head>

<body class="">
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="mb-5">
                        <h4 class="text-center mb-4">Selamat datang kembali, kami merindukanmu!</h4>
                    </div>
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <form  method="POST" action="{{ route('login') }}">
                                @csrf
                                <p class="text-center mb-4">Silakan masuk menggunakan email</p>
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="name@example.com" required>
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="" placeholder="Password" required>
                                            <label for="password" class="form-label">Kata Sandi</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="remember_me" id="remember_me">
                                            <label class="form-check-label text-secondary" for="remember_me">
                                                Tetap masuk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-dark btn-lg" type="submit">Masuk</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
