<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pekerja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body { 
      background: linear-gradient(135deg, #f8fffe 0%, #ecfdf5 100%);
      min-height: 100vh;
    }

    .header-section {
      background: linear-gradient(135deg, #22c55e, #16a34a);
      color: white;
      border-radius: 20px;
      padding: 3rem 2rem;
      margin-bottom: 3rem;
      box-shadow: 0 8px 32px rgba(34, 197, 94, 0.2);
      position: relative;
      overflow: hidden;
    }

    .header-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 200px;
      height: 200px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
    }

    .header-section::after {
      content: '';
      position: absolute;
      bottom: -30%;
      left: -10%;
      width: 150px;
      height: 150px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 50%;
    }

    .modern-card {
      border: none; 
      border-radius: 20px; 
      background: white;
      box-shadow: 0 4px 20px rgba(34, 197, 94, 0.08);
      position: relative;
      overflow: hidden;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .modern-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 24px rgba(34, 197, 94, 0.15);
    }

    .profile-img {
      width: 120px; 
      height: 120px; 
      object-fit: cover;
      border-radius: 50%; 
      border: 4px solid #e5f3e7;
    }

    .worker-name {
      color: #1f2937;
    }

    .gender-icon {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 8px 12px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .gender-male {
      background: rgba(34, 197, 94, 0.1);
      color: #16a34a;
      border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .gender-female {
      background: rgba(236, 72, 153, 0.1);
      color: #be185d;
      border: 1px solid rgba(236, 72, 153, 0.2);
    }

    .btn-success-custom {
      background: linear-gradient(135deg, #22c55e, #16a34a);
      border: none;
      border-radius: 15px;
      padding: 12px 24px;
      font-weight: 600;
      color: white;
      box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
      transition: all 0.2s ease;
    }

    .btn-success-custom:hover {
      background: linear-gradient(135deg, #16a34a, #15803d);
      box-shadow: 0 6px 20px rgba(34, 197, 94, 0.25);
    }

    .btn-back {
      background: white;
      color: #16a34a;
      border-radius: 12px;
      padding: 8px 18px;
      font-weight: 500;
      border: 1px solid #d1fae5;
      transition: all 0.2s ease;
    }

    .btn-back:hover {
      background: #f0fdf4;
      color: #15803d;
      border-color: #bbf7d0;
    }

    .card-stats {
      display: flex;
      justify-content: space-around;
      margin: 1rem 0;
      padding: 1rem 0;
      border-top: 1px solid #f3f4f6;
      border-bottom: 1px solid #f3f4f6;
    }

    .stat-item {
      text-align: center;
      flex: 1;
    }

    .stat-value {
      font-weight: 700;
      color: #16a34a;
      font-size: 1.1rem;
    }

    .stat-label {
      font-size: 0.8rem;
      color: #6b7280;
      margin-top: 2px;
    }

    @media (max-width: 768px) {
      .header-section {
        padding: 2rem 1.5rem;
        margin-bottom: 2rem;
      }
      
      .modern-card {
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <!-- Header -->
    <div class="header-section text-center">
      <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Daftar Pekerja</h2>
      <p class="mb-4 opacity-90" style="font-size: 1.1rem;">
        Pilih pekerja terbaik sesuai kebutuhan Anda <br>
        <span style="opacity: 0.85;">Profesional, terlatih, dan siap membantu</span>
      </p>
      <a href="{{ route('dashboard') }}" class="btn btn-back">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
      </a>
    </div>

    <!-- Card List -->
    <div class="row g-4">
      @foreach($pekerja as $p)
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100 text-center p-4">
          <img src="{{ $p->foto }}" class="profile-img mx-auto mb-3" alt="Foto Pekerja">
          
          <h5 class="fw-semibold worker-name mb-2">{{ $p->nama }}</h5>
          
          <div class="card-stats">
            <div class="stat-item">
              <div class="stat-value">{{ $p->umur }}</div>
              <div class="stat-label">Tahun</div>
            </div>
            <div class="stat-item">
              <div class="stat-value">{{ $p->negara }}</div>
              <div class="stat-label">Negara</div>
            </div>
          </div>

          <div class="mb-3">
            @if($p->jenis_kelamin == 'Laki-laki')
              <span class="gender-icon gender-male">
                <i class="bi bi-gender-male"></i> Laki-laki
              </span>
            @else
              <span class="gender-icon gender-female">
                <i class="bi bi-gender-female"></i> Perempuan
              </span>
            @endif
          </div>
          
          <a href="{{ route('pesanan.form', $p->id) }}" class="btn btn-success-custom w-100">
            <i class="bi bi-calendar-check me-2"></i>Pesan Sekarang
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
