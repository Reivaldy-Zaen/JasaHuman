<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      min-height: 100vh;
    }
    
    .booking-container {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      backdrop-filter: blur(10px);
    }
    
    .worker-section {
      background: linear-gradient(135deg, #28a745, #20c997);
      color: white;
      position: relative;
    }
    
    .worker-section::after {
      content: '';
      position: absolute;
      bottom: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 20px solid transparent;
      border-right: 20px solid transparent;
      border-top: 20px solid #20c997;
    }
    
    .worker-photo {
      width: 100px;
      height: 100px;
      border: 4px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }
    
    .worker-photo:hover {
      transform: scale(1.1);
    }
    
    .form-floating .form-control {
      border: 2px solid #e9ecef;
      border-radius: 12px;
      transition: all 0.3s ease;
    }
    
    .form-floating .form-control:focus {
      border-color: #28a745;
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.15);
      transform: translateY(-2px);
    }
    
    .time-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
    }
    
    @media (min-width: 768px) {
      .time-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }
    
    .time-slot {
      position: relative;
      border: 2px solid #e9ecef;
      border-radius: 15px;
      padding: 15px 10px;
      text-align: center;
      transition: all 0.3s ease;
      background: white;
      cursor: pointer;
    }
    
    .time-slot:hover:not(.disabled) {
      border-color: #28a745;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
    }
    
    .time-slot.selected {
      background: linear-gradient(135deg, #28a745, #20c997);
      border-color: #28a745;
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
    }
    
    .time-slot.disabled {
      background: #f8f9fa;
      border-color: #dee2e6;
      color: #6c757d;
      cursor: not-allowed;
      opacity: 0.6;
    }
    
    .time-slot .time-text {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 5px;
    }
    
    .time-slot .status-text {
      font-size: 0.8rem;
      opacity: 0.8;
    }
    
    .btn-submit {
      background: linear-gradient(135deg, #28a745, #20c997);
      border: none;
      border-radius: 50px;
      padding: 12px 40px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }
    
    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
    }
    
    .btn-back {
      border: 2px solid #6c757d;
      border-radius: 50px;
      padding: 10px 30px;
      color: #6c757d;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-back:hover {
      background: #6c757d;
      color: white;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="container-fluid px-4 py-5">
    <div class="row justify-content-center">
      <!-- Worker Info Section -->
      <div class="col-lg-4 col-md-5 mb-4">
        <div class="worker-section p-4 text-center" style="border-radius: 20px; height: fit-content;">
          <div class="mb-3">
            <img src="{{ $pekerja->foto }}" alt="Foto {{ $pekerja->nama }}" 
                 class="rounded-circle worker-photo object-fit-cover">
          </div>
          <h4 class="fw-bold mb-2">{{ $pekerja->nama }}</h4>
          <p class="mb-0 opacity-75">Pilih waktu yang tersedia untuk booking</p>
        </div>
      </div>
      
      <!-- Form Section -->
      <div class="col-lg-6 col-md-7">
        <div class="booking-container p-4">
          <h3 class="text-center mb-4 fw-bold text-success">Form Pemesanan</h3>
          
          <form method="POST" action="{{ route('pesanan.simpan', $pekerja->id) }}">
            @csrf
            
            <!-- Personal Info in Row -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" name="nama_pemesan" class="form-control" id="nama" placeholder="Nama Anda" required>
                  <label for="nama">Nama Anda</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" name="email_pemesan" class="form-control" id="email" placeholder="Email Anda" required>
                  <label for="email">Email Anda</label>
                </div>
              </div>
            </div>
            
            <div class="mb-4">
              <div class="form-floating">
                <input type="number" name="nomer" class="form-control" id="nomer" placeholder="Nomor Anda" required min="1000000000" max="99999999999999">
                <label for="nomer">Nomor Telepon Anda</label>
              </div>
            </div>

            <!-- Time Selection -->
            <div class="mb-4">
              <h5 class="fw-bold mb-3 text-success">Pilih Waktu Booking</h5>
              <div class="time-grid">
                @foreach(['11:30', '14:05', '16:40', '19:15'] as $jam)
                    @php
                        $isBooked = \App\Models\Pesanan::where('pekerja_id', $pekerja->id)
                                    ->where('jam', $jam)
                                    ->where('status', 'aktif')
                                    ->exists();
                    @endphp

                    <div class="time-slot {{ $isBooked ? 'disabled' : '' }}" 
                         onclick="toggleTimeSlot(this, '{{ $jam }}', {{ $isBooked ? 'true' : 'false' }})">
                      <div class="time-text">{{ $jam }}</div>
                      <div class="status-text">
                        @if($isBooked)
                          Tidak Tersedia
                        @else
                          Tersedia
                        @endif
                      </div>
                      
                      <input type="checkbox" 
                             name="jam[]" 
                             value="{{ $jam }}" 
                             {{ $isBooked ? 'disabled' : '' }}
                             style="display: none;">
                    </div>
                @endforeach
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-between align-items-center">
              <a href="{{ route('pekerja.index') }}" class="btn btn-back">
                ← Kembali ke Daftar
              </a>
              <button type="submit" class="btn btn-success btn-submit">
                Kirim Pesanan →
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleTimeSlot(element, jam, isBooked) {
      if (isBooked) return;
      
      const checkbox = element.querySelector('input[type="checkbox"]');
      const isSelected = element.classList.contains('selected');
      
      if (isSelected) {
        element.classList.remove('selected');
        checkbox.checked = false;
      } else {
        element.classList.add('selected');
        checkbox.checked = true;
      }
    }
  </script>
</body>
</html>