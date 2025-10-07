<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Latar belakang keseluruhan halaman */
        body {
            background-color: #e6f7ff; /* biru muda */
        }
        /* Judul default (tanpa latar kuning) */
        .page-title {
            color: #0b0b0b;
            padding: 10px 16px;
            display: inline-block;
            border-radius: 6px;
            font-weight: 600;
            margin-bottom: 16px;
            background: transparent; /* tidak kuning */
        }
        /* Judul yang diberi highlight kuning */
        .title-highlight {
            background-color: #ffeb3b; /* kuning */
            color: #0b0b0b;
            padding: 10px 16px;
            display: inline-block;
            border-radius: 6px;
            font-weight: 600;
            margin-bottom: 16px;
        }
        /* Container tambahan agar konten tidak menempel ke tepi */
        .content-wrap {
            padding: 24px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dosens.index') }}">CRUD App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dosens.index') }}">Dosens</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('mata_kuliah.index') }}">Mata Kuliah</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrap">
        @yield('content')
    </div>

    <!-- tempat untuk memasukkan script per-view (Chart.js dll) -->
    @yield('scripts')
</body>
</html>
