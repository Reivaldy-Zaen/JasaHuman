<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pekerja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body { background: #f8fafc; }

    .modern-card {
      border: none; border-radius: 20px; background: white;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: all 0.35s ease;
      cursor: pointer;
    }
    .modern-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 14px 24px rgba(0,0,0,0.18);
    }

    .profile-img {
      width: 120px; height: 120px; object-fit: cover;
      border-radius: 50%; border: 4px solid #e2e8f0;
      transition: 0.4s;
    }
    .modern-card:hover .profile-img {
      border-color: #3b82f6;
      transform: scale(1.08) rotate(2deg);
    }

    .modern-card h5 {
      transition: color 0.3s;
    }
    .modern-card:hover h5 {
      color: #2563eb;
    }

    .btn-primary {
      border-radius: 12px;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background-color: #1d4ed8;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(37,99,235,0.4);
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Daftar Pekerja</h2>
      <p class="text-muted">Silahkan pilih pekerja yang ingin anda pesan</p>
    </div>

    <div class="row g-4">
      @foreach($pekerja as $p)
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100 text-center p-4">
          <img src="{{ $p->foto }}" class="profile-img mx-auto mb-3" alt="Foto Pekerja">
          <h5 class="fw-semibold">{{ $p->nama }}</h5>
          <p class="text-muted mb-1">Umur: {{ $p->umur }}</p>
          <p class="text-muted mb-1">Negara: {{ $p->negara }}</p>
          <p class="mb-3">
            @if($p->jenis_kelamin == 'Laki-laki')
              <i class="bi bi-gender-male text-primary"></i> Laki-laki
            @else
              <i class="bi bi-gender-female text-danger"></i> Perempuan
            @endif
          </p>
          <a href="{{ route('pesanan.form', $p->id) }}" class="btn btn-primary w-100">Pesan</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>
</html>
