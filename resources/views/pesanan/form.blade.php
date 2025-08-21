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
      <button type="submit" class="btn btn-success">Kirim Pesanan</button>
      <a href="{{ route('pekerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

  </div>
</body>
</html>
