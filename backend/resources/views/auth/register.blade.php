<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Peminjam</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px 16px;
        }

        .container {
            max-width: 480px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            margin-bottom: 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font: inherit;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 12px;
        }

        .login-link {
            text-align: center;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register Peminjam</h2>
    <p>Silakan isi data untuk membuat akun peminjam.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <label for="name">Nama Lengkap</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            maxlength="255"
            autocomplete="name"
            required
        >

        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            maxlength="255"
            autocomplete="email"
            required
        >

        <label for="no_hp">Nomor HP</label>
        <input
            type="text"
            id="no_hp"
            name="no_hp"
            value="{{ old('no_hp') }}"
            maxlength="20"
            autocomplete="tel"
        >

        <label for="alamat">Alamat</label>
        <textarea
            id="alamat"
            name="alamat"
            rows="3"
            maxlength="1000"
        >{{ old('alamat') }}</textarea>

        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            minlength="8"
            autocomplete="new-password"
            required
        >

        <label for="password_confirmation">
            Konfirmasi Password
        </label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            minlength="8"
            autocomplete="new-password"
            required
        >

        <button type="submit">Daftar sebagai Peminjam</button>
    </form>

    <p class="login-link">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </p>
</div>

</body>
</html>