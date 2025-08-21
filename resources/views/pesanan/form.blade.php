<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h3 class="mb-4">Form Pemesanan untuk <span class="text-primary">{{ $pekerja->nama }}</span></h3>

    <!-- Foto pekerja -->
    <div class="text-center mb-4">
      <img src="{{ $pekerja->foto }}" alt="Foto {{ $pekerja->nama }}" 
           class="rounded-circle" 
           style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #e2e8f0;">
    </div>

    <form method="POST" action="{{ route('pesanan.simpan', $pekerja->id) }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nama Anda</label>
        <input type="text" name="nama_pemesan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email Anda</label>
        <input type="email" name="email_pemesan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nomer Anda</label>
        <input type="number" name="nomer" class="form-control" required min="1000000000" max="99999999999999">
      </div>

      <!-- Pilih Jam -->
      <div class="mb-3">
        <label class="form-label">Pilih Jam</label>
        <div class="d-flex flex-wrap gap-2">
          @foreach(['11:30', '14:05', '16:40', '19:15'] as $jam)
              @php
                  $isBooked = \App\Models\Pesanan::where('pekerja_id', $pekerja->id)
                              ->where('jam', $jam)
                              ->where('status', 'aktif')
                              ->exists();
              @endphp

              <input type="checkbox"
                     class="btn-check"
                     name="jam[]"
                     id="jam-{{ $loop->index }}"
                     value="{{ $jam }}"
                     {{ $isBooked ? 'disabled' : '' }}>

              <label class="btn {{ $isBooked ? 'btn-secondary' : 'btn-outline-primary' }}"
                     for="jam-{{ $loop->index }}">
                     {{ $jam }}
                     @if($isBooked)  @endif
              </label>
          @endforeach
        </div>
      </div>

      <button type="submit" class="btn btn-success">Kirim Pesanan</button>
      <a href="{{ route('pekerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
