<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sukses Pesan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5 text-center">
    <h2 class="text-success">✅ Pesanan Berhasil!</h2>
    <p class="lead">Terima kasih, pesanan anda sudah tercatat.</p>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Daftar Pekerja</a>
  </div>
</body>
</html>
