<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Tautan Bootstrap CSS versi 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Buku</h1>
        <form method="POST" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" name="judul" id="judul" value="{{ $buku->judul }}" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" name="penulis" id="penulis" value="{{ $buku->penulis }}" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" name="harga" id="harga" value="{{ $buku->harga }}" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="tgl_terbit" class="form-label">Tanggal Terbit:</label>
                <input type="date" name="tgl_terbit" id="tgl_terbit" value="{{ $buku->tgl_terbit }}" class="form-control" required>
            </div>

            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/buku" class="btn btn-secondary">Kembali</a>
        </div>
        </form>
    </div>

    <!-- Tautan Bootstrap JavaScript (Jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
