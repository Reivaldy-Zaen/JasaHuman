<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Cards Grid</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bs-primary: #2563eb;
      --bs-primary-rgb: 37, 99, 235;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      min-height: 100vh;
    }

    .modern-card {
      border: none;
      border-radius: 20px !important;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      overflow: hidden;
      position: relative;
      background: white;
    }

    .modern-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--bs-primary), #3b82f6);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .modern-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
      border-color: var(--bs-primary) !important;
    }

    .modern-card:hover::before {
      opacity: 1;
    }

    .profile-img {
      width: 120px;
      height: 120px;
      border: 4px solid #f1f5f9;
      transition: all 0.3s ease;
      object-fit: cover;
    }

    .modern-card:hover .profile-img {
      border-color: var(--bs-primary);
      transform: scale(1.05);
    }

    .btn-modern {
      background: var(--bs-primary);
      border: none;
      border-radius: 12px;
      padding: 0.875rem 2rem;
      font-weight: 500;
      transition: all 0.2s ease;
      text-transform: none;
      letter-spacing: 0.01em;
    }

    .btn-modern:hover {
      background: #1d4ed8;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .btn-modern:active {
      transform: translateY(0);
    }

    .text-muted-custom {
      color: #6b7280 !important;
    }

    .fw-semibold {
      font-weight: 600;
    }

    .display-6 {
      letter-spacing: -0.025em;
    }

    .lead {
      color: #6b7280;
      max-width: 600px;
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <!-- Header Section -->
    <div class="text-center mb-5">
      <h2 class="display-6 fw-bold text-dark mb-3">Pekerja</h2>
      <p class="lead mx-auto">Silahkan cari pekerja yang anda suka dan anda order</p>
    </div>

    <!-- Cards Grid -->
    <div class="row g-4">
      
      <!-- Card 1 -->
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100">
          <div class="card-body text-center p-4">
            <img src="https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg" 
                 class="profile-img rounded-circle mx-auto d-block mb-3" 
                 alt="Profile Photo">
            <h5 class="card-title fw-semibold mb-2">John Doe</h5>
            <p class="card-text text-muted-custom mb-1">Age: 25</p>
            <p class="card-text text-muted-custom mb-1">Country: Indonesia</p>
            <p class="card-text mb-4">
              <i class="bi bi-gender-male" style="color:#2563eb; font-size:1.2rem;"></i>
              <span class="text-muted-custom">Male</span>
            </p>
            <button class="btn btn-primary btn-modern w-100">Order</button>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100">
          <div class="card-body text-center p-4">
            <img src="https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg" 
                 class="profile-img rounded-circle mx-auto d-block mb-3" 
                 alt="Profile Photo">
            <h5 class="card-title fw-semibold mb-2">Jane Smith</h5>
            <p class="card-text text-muted-custom mb-1">Age: 30</p>
            <p class="card-text text-muted-custom mb-1">Country: Malaysia</p>
            <p class="card-text mb-4">
              <i class="bi bi-gender-female" style="color:#ec4899; font-size:1.2rem;"></i>
              <span class="text-muted-custom">Female</span>
            </p>
            <button class="btn btn-primary btn-modern w-100">Order</button>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100">
          <div class="card-body text-center p-4">
            <img src="https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg" 
                 class="profile-img rounded-circle mx-auto d-block mb-3" 
                 alt="Profile Photo">
            <h5 class="card-title fw-semibold mb-2">Michael Lee</h5>
            <p class="card-text text-muted-custom mb-1">Age: 28</p>
            <p class="card-text text-muted-custom mb-1">Country: Singapore</p>
            <p class="card-text mb-4">
              <i class="bi bi-gender-male" style="color:#2563eb; font-size:1.2rem;"></i>
              <span class="text-muted-custom">Male</span>
            </p>
            <button class="btn btn-primary btn-modern w-100">Order</button>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100">
          <div class="card-body text-center p-4">
            <img src="https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg" 
                 class="profile-img rounded-circle mx-auto d-block mb-3" 
                 alt="Profile Photo">
            <h5 class="card-title fw-semibold mb-2">Alex Tan</h5>
            <p class="card-text text-muted-custom mb-1">Age: 32</p>
            <p class="card-text text-muted-custom mb-1">Country: Thailand</p>
            <p class="card-text mb-4">
              <i class="bi bi-gender-male" style="color:#2563eb; font-size:1.2rem;"></i>
              <span class="text-muted-custom">Male</span>
            </p>
            <button class="btn btn-primary btn-modern w-100">Order</button>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100">
          <div class="card-body text-center p-4">
            <img src="https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg" 
                 class="profile-img rounded-circle mx-auto d-block mb-3" 
                 alt="Profile Photo">
            <h5 class="card-title fw-semibold mb-2">Sarah Wilson</h5>
            <p class="card-text text-muted-custom mb-1">Age: 27</p>
            <p class="card-text text-muted-custom mb-1">Country: Philippines</p>
            <p class="card-text mb-4">
              <i class="bi bi-gender-female" style="color:#ec4899; font-size:1.2rem;"></i>
              <span class="text-muted-custom">Female</span>
            </p>
            <button class="btn btn-primary btn-modern w-100">Order</button>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="card modern-card h-100">
          <div class="card-body text-center p-4">
            <img src="https://kaltimkita.com/po-content/uploads/raffi-ahmad-harta.jpg" 
                 class="profile-img rounded-circle mx-auto d-block mb-3" 
                 alt="Profile Photo">
            <h5 class="card-title fw-semibold mb-2">David Chen</h5>
            <p class="card-text text-muted-custom mb-1">Age: 29</p>
            <p class="card-text text-muted-custom mb-1">Country: Vietnam</p>
            <p class="card-text mb-4">
              <i class="bi bi-gender-male" style="color:#2563eb; font-size:1.2rem;"></i>
              <span class="text-muted-custom">Male</span>
            </p>
            <button class="btn btn-primary btn-modern w-100">Order</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
