<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - {{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: #f8fafc;
            font-family: 'Inter', sans-serif;
        }
        .profile-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f1f5f9;
        }
        .profile-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
        }
        .info-item {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .info-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="profile-header text-center">
            <a href="{{ route('pekerja.index') }}" class="btn btn-light mb-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h1>Profil Saya</h1>
            <p>Detail informasi akun Anda</p>
        </div>

        <div class="profile-card">
            <div class="text-center mb-4">
                <img src="{{ $user->foto_url }}" class="profile-img" alt="Foto Profil">
                <h2 class="mt-3">{{ $user->name }}</h2>
                <span class="badge bg-primary">{{ ucfirst($user->role) }}</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="info-item">
                        <strong><i class="bi bi-envelope"></i> Email:</strong>
                        <p class="mb-0">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <strong><i class="bi bi-telephone"></i> Telepon:</strong>
                        <p class="mb-0">{{ $user->phone ?? 'Belum diisi' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <strong><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin:</strong>
                        <p class="mb-0">{{ $user->gender }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <strong><i class="bi bi-calendar"></i> Umur:</strong>
                        <p class="mb-0">{{ $user->umur }} tahun</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <strong><i class="bi bi-globe"></i> Negara:</strong>
                        <p class="mb-0">{{ $user->negara }}</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</body>
</html>