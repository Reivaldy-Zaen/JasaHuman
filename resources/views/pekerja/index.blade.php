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
      background: #f8fafc;
      min-height: 100vh;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* IMPROVED ALERT STYLING */
    .welcome-alert {
      background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%);
      border: 1px solid #bbf7d0;
      border-left: 4px solid #22c55e;
      border-radius: 0 16px 16px 0;
      padding: 20px;
      margin-bottom: 24px;
      box-shadow: 0 4px 6px -1px rgba(34, 197, 94, 0.1), 0 2px 4px -1px rgba(34, 197, 94, 0.06);
      animation: slideInRight 0.5s ease-out;
      transition: all 0.3s ease;
    }

    .welcome-alert:hover {
      box-shadow: 0 10px 15px -3px rgba(34, 197, 94, 0.1), 0 4px 6px -2px rgba(34, 197, 94, 0.05);
    }

    .alert-icon-container {
      width: 32px;
      height: 32px;
      background: linear-gradient(135deg, #22c55e, #16a34a);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      box-shadow: 0 2px 4px rgba(34, 197, 94, 0.2);
      animation: scaleIn 0.6s ease-out 0.2s both;
    }

    .alert-icon {
      width: 16px;
      height: 16px;
      color: white;
    }

    .alert-content {
      flex: 1;
      margin-left: 16px;
      animation: fadeInLeft 0.6s ease-out 0.3s both;
    }

    .alert-title {
      font-weight: 700;
      color: #166534;
      margin-bottom: 4px;
      font-size: 14px;
    }

    .alert-message {
      color: #15803d;
      font-size: 13px;
      margin: 0;
      opacity: 0.9;
    }

    .alert-close {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      border: none;
      background: transparent;
      color: #16a34a;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
      flex-shrink: 0;
      margin-left: 12px;
    }

    .alert-close:hover {
      background: rgba(34, 197, 94, 0.1);
      color: #15803d;
      transform: scale(1.1);
    }

    .alert-close svg {
      width: 14px;
      height: 14px;
    }

    /* Animations */
    @keyframes slideInRight {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes scaleIn {
      0% {
        transform: scale(0);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }

    @keyframes fadeInLeft {
      0% {
        transform: translateX(-20px);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes fadeOut {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        transform: scale(0.95);
        opacity: 0;
      }
    }

    .alert-fade-out {
      animation: fadeOut 0.3s ease-in forwards;
    }

    /* Header yang lebih minimalis */
    .header-section {
      background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
      color: white;
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 16px rgba(30, 41, 59, 0.15);
      position: relative;
    }

    .header-section h2 {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .header-section p {
      font-size: 0.95rem;
      opacity: 0.85;
      margin-bottom: 0;
    }

    /* Tombol Back */
    .btn-back {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 40px;
      height: 40px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      font-size: 1.1rem;
      transition: all 0.2s ease;
      text-decoration: none;
    }

    .btn-back:hover {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      border-color: rgba(255, 255, 255, 0.3);
      transform: translateX(-2px);
    }

    /* Tombol Logout (ikon saja, rapi) */
    .btn-logout {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 40px;
      height: 40px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      font-size: 1.1rem;
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .btn-logout:hover {
      background: rgba(255, 255, 255, 0.2);
      color: #000000; /* merah soft saat hover */
      border-color: rgba(255, 255, 255, 0.3);
      transform: translateX(2px);
    }

    .btn-logout i {
      pointer-events: none;
    }

    /* Card */
    .modern-card {
      border: 1px solid #e2e8f0;
      border-radius: 16px; 
      background: white;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      position: relative;
      overflow: hidden;
      transition: all 0.2s ease;
    }

    .modern-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      border-color: #cbd5e1;
    }

    .profile-img {
      width: 80px; 
      height: 80px; 
      object-fit: cover;
      border-radius: 50%; 
      border: 3px solid #f1f5f9;
      margin-bottom: 1rem;
      transition: all 0.3s ease;
    }

    .worker-name {
      color: #1e293b;
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 0.75rem;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .block {
      text-decoration: none;
      color: inherit;
      display: block;
    }
    
    .block:hover {
      text-decoration: none;
      color: inherit;
    }

    .gender-icon {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 0.8rem;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .gender-male {
      background: #f0f9ff;
      color: #0284c7;
      border: 1px solid #e0f2fe;
    }

    .gender-female {
      background: #fdf2f8;
      color: #be185d;
      border: 1px solid #fce7f3;
    }

    .card-stats {
      display: flex;
      justify-content: space-around;
      margin: 1rem 0;
      padding: 0.75rem 0;
      border-top: 1px solid #f1f5f9;
      border-bottom: 1px solid #f1f5f9;
    }

    .stat-item {
      text-align: center;
      flex: 1;
    }

    .stat-value {
      font-weight: 600;
      color: #334155;
      font-size: 1.2rem;
    }

    .stat-label {
      font-size: 0.75rem;
      color: #64748b;
      margin-top: 2px;
    }

    .btn-success-custom {
      background: linear-gradient(135deg, #059669, #047857);
      border: none;
      border-radius: 12px;
      padding: 10px 20px;
      font-weight: 600;
      font-size: 0.85rem;
      color: white;
      box-shadow: 0 2px 8px rgba(5, 150, 105, 0.2);
      transition: all 0.2s ease;
    }

    .btn-success-custom:hover {
      background: linear-gradient(135deg, #047857, #065f46);
      box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25);
      transform: translateY(-1px);
      color: white;
    }

    .profile-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      color: #64748b;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      transition: all 0.2s ease;
      padding: 6px 12px;
      border-radius: 8px;
      background-color: #f8fafc;
      text-decoration: none;
    }
    
    .profile-link:hover {
      color: #3b82f6;
      background-color: #eff6ff;
      text-decoration: none;
      transform: translateY(-1px);
    }

    @media (max-width: 768px) {
      .header-section {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
      }
      
      .header-section h2 {
        font-size: 1.5rem;
      }
      
      .modern-card {
        margin-bottom: 1rem;
      }

      .welcome-alert {
        margin-left: -15px;
        margin-right: -15px;
        border-radius: 0;
      }
    }

    .card-hover-effect {
      cursor: pointer;
    }

    .card-hover-effect:hover .profile-img {
      border-color: #d1fae5;
      transform: scale(1.05);
    }

    .card-hover-effect:hover .worker-name {
      color: #059669;
    }
  </style>
</head>
<body>
   <div class="container py-4">
    <!-- Alert Selamat Datang -->
    @if(session('welcome_message'))
    <div class="welcome-alert" id="welcomeAlert">
        <div class="d-flex align-items-center">
            <div class="alert-icon-container">
                <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            @if ($roles=Auth::user()->role === 'klien')
            <div class="alert-content">
                <div class="alert-title">Selamat datang, Klient!</div>
                <p class="alert-message">{{ session('welcome_message') }}</p>
            </div>
            @endif
            <div class="alert-content">
              <div class="alert-title">Selamat datang, Pekerja!</div>
              <p class="alert-message">{{ session('welcome_message') }}</p>
            </div>
            <button type="button" class="alert-close" onclick="closeAlert()">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Header -->
    <div class="header-section">
      <div class="d-flex align-items-center justify-content-between mb-3">
        @if(Auth::user()->role === 'admin')
        <a href="{{ route('dashboard.index') }}" class="btn-back">
          <i class="bi bi-arrow-left"></i>
        </a>
        @endif
        
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" class="m-0">
          @csrf
          @if(Auth::user()->role != 'admin')
          <button type="submit" class="btn-logout" title="Logout">
            <i class="bi bi-box-arrow-right"></i>
          </button>
          @endif
        </form>
      </div>
      <div class="text-center">
        <h2>Pilih Pekerja Profesional</h2>
        <p>Temukan pekerja terbaik yang sesuai dengan kebutuhan Anda</p>
      </div>
    </div>

    <!-- Card List -->
    <div class="row g-3">
      @foreach($pekerja as $p)
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card modern-card h-100 text-center p-3 card-hover-effect">
          <div class="pt-2">
            <a href="{{ route('pekerja.profile', $p->id) }}" class="block">
              <img src="{{ $p->foto_url }}" class="profile-img mx-auto" alt="Foto Pekerja">
            </a>
            
            <a href="{{ route('pekerja.profile', $p->id) }}" class="block">
              <h2 class="worker-name">{{ $p->name }}</h2>
            </a>
            
            <div class="mb-2">
              @if($p->gender == 'Laki-laki')
                <span class="gender-icon gender-male">
                  <i class="bi bi-gender-male"></i> Laki-laki
                </span>
              @else
                <span class="gender-icon gender-female">
                  <i class="bi bi-gender-female"></i> Perempuan
                </span>
              @endif
            </div>

            <div class="card-stats">
              <div class="stat-item">
                <div class="stat-value">{{ $p->umur }} th</div>
                <div class="stat-label">Usia</div>
              </div>
              <div class="stat-item">
                <div class="stat-value">{{ $p->negara }}</div>
                <div class="stat-label">Asal</div>
              </div>
            </div>

            <!-- Link Lihat Profile Lengkap -->
            <a href="{{ route('pekerja.profile', $p->id) }}" class="profile-link">
              <i class="bi bi-eye"></i> Lihat Profile Lengkap
            </a>
            
            <a href="{{ route('pesanan.form', $p->id) }}" class="btn btn-success-custom w-100">
              <i class="bi bi-calendar-plus me-1"></i> Pesan
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- JavaScript untuk Alert -->
  <script>
    function closeAlert() {
        const alert = document.getElementById('welcomeAlert');
        if (alert) {
            alert.classList.add('alert-fade-out');
            setTimeout(() => {
                alert.remove();
            }, 300);
        }
    }

    // Auto hide alert after 5 seconds
    setTimeout(() => {
        closeAlert();
    }, 5000);
  </script>
</body>
</html>
