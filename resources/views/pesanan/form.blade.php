<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); transition: all 0.3s ease; }
    .time-slot { border-radius: 8px; cursor: pointer; margin-bottom: 10px; border: 1px solid #dee2e6; }
    .time-slot.selected { background-color: #0d6efd; color: white; border-color: #0d6efd; }
    .time-slot.booked { background-color: #6c757d; color: white; cursor: not-allowed; opacity: 0.7; }
    .time-slot.available:hover { background-color: #e9ecef; }
    .progress-bar { height: 8px; border-radius: 4px; }
    .worker-img { border: 4px solid #e2e8f0; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
  </style>
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0 card-hover">
          <div class="card-header bg-white py-4">
            <h3 class="mb-0 text-center">Form Pemesanan untuk <span class="text-primary">{{ $pekerja->nama }}</span></h3>
          </div>
          <div class="card-body p-4">
            <!-- Foto pekerja -->
            <div class="text-center mb-4">
              <img src="{{ $pekerja->foto }}" alt="Foto {{ $pekerja->nama }}" 
                   class="rounded-circle worker-img" 
                   style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('pesanan.simpan', $pekerja->id) }}" id="bookingForm">
              @csrf
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Nama Anda</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="nama_pemesan" class="form-control" required value="{{ old('nama_pemesan') }}">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Email Anda</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email_pemesan" class="form-control" required value="{{ old('email_pemesan') }}">
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  <input type="number" name="nomer" class="form-control" required min="1000000000" max="99999999999999" value="{{ old('nomer') }}">
                </div>
                <div class="form-text">Contoh: 081234567890</div>
              </div>

              <div class="mb-3">
                <label class="form-label">Durasi (jam)</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-clock"></i></span>
                  <select name="durasi_jam" class="form-select" id="durationSelect" required>
                    <option value="1" {{ old('durasi_jam', 1) == 1 ? 'selected' : '' }}>1 Jam</option>
                    <option value="2" {{ old('durasi_jam') == 2 ? 'selected' : '' }}>2 Jam</option>
                    <option value="3" {{ old('durasi_jam') == 3 ? 'selected' : '' }}>3 Jam</option>
                    <option value="4" {{ old('durasi_jam') == 4 ? 'selected' : '' }}>4 Jam</option>
                  </select>
                </div>
              </div>

              <!-- Pilih Jam Mulai -->
              <div class="mb-4">
                <label class="form-label">Pilih Jam Mulai</label>
                <div class="row g-2" id="timeSlotsContainer">
                  @foreach(['11:30', '14:05', '16:40', '19:15', '22:50'] as $jam)
                    @php
                        $isBooked = \App\Models\Pesanan::isBooked($pekerja->id, $jam);
                    @endphp

                    <div class="col-sm-6 col-md-3">
                      <div class="time-slot p-3 text-center {{ $isBooked ? 'booked' : 'available' }} {{ old('jam_mulai') == $jam ? 'selected' : '' }}"
                           data-time="{{ $jam }}"
                           onclick="{{ !$isBooked ? 'selectTimeSlot(this)' : '' }}">
                        <div class="fw-bold">{{ $jam }}</div>
                        <small class="status-text">{{ $isBooked ? 'Sudah dipesan' : 'Tersedia' }}</small>
                      </div>
                    </div>
                  @endforeach
                </div>
                <input type="hidden" name="jam_mulai" id="selectedTime" value="{{ old('jam_mulai') }}" required>
                <div class="form-text" id="selectedTimeInfo"></div>
              </div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('pekerja.index') }}" class="btn btn-secondary me-md-2"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane me-2"></i>Kirim Pesanan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // pilih timeslot
    function selectTimeSlot(element) {
      document.querySelectorAll('.time-slot').forEach(slot => {
        if (slot.classList.contains('available')) {
          slot.classList.remove('selected');
        }
      });
      element.classList.add('selected');
      const selectedTime = element.dataset.time;
      document.getElementById('selectedTime').value = selectedTime;
      updateTimeInfo(selectedTime);
    }
    
    // update info jam selesai
    function updateTimeInfo(startTime) {
      const duration = parseInt(document.getElementById('durationSelect').value);
      const [hours, minutes] = startTime.split(':').map(Number);
      let endHours = hours + duration;
      if (endHours >= 24) endHours -= 24;
      const endTime = `${endHours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;
      document.getElementById('selectedTimeInfo').textContent = 
        `Pemesanan akan berlangsung dari ${startTime} hingga ${endTime}`;
    }

    // refresh slot booked dari server
    function refreshTimeSlots(pekerjaId) {
      fetch(`/pesanan/available-times/${pekerjaId}`)
        .then(res => res.json())
        .then(data => {
          data.forEach(item => {
            const slot = document.querySelector(`.time-slot[data-time='${item.time}']`);
            if (slot) {
              if (!item.available) {
                slot.classList.remove('available', 'selected');
                slot.classList.add('booked');
                slot.querySelector('.status-text').textContent = 'Sudah dipesan';
                slot.onclick = null;
              }
            }
          });
        });
    }

    document.getElementById('durationSelect').addEventListener('change', function() {
      const selectedTime = document.getElementById('selectedTime').value;
      if (selectedTime) updateTimeInfo(selectedTime);
    });

    document.getElementById('bookingForm').addEventListener('submit', function(e) {
      const selectedTime = document.getElementById('selectedTime').value;
      if (!selectedTime) {
        e.preventDefault();
        alert('Silakan pilih jam pemesanan terlebih dahulu.');
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      const selectedTime = document.getElementById('selectedTime').value;
      if (selectedTime) updateTimeInfo(selectedTime);

      // auto refresh tiap 10 detik
      const pekerjaId = "{{ $pekerja->id }}";
      refreshTimeSlots(pekerjaId);
      setInterval(() => refreshTimeSlots(pekerjaId), 10000);
    });
  </script>
</body>
</html>
