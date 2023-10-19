<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!-- Tautan Bootstrap CSS versi 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <div class="container mt-4">
         <!-- Alert cari buku -->
         @if(count($data_buku))
        <div class="alert alert-success alert-dismissible fade show" role="alert">Ditemukan <strong>{{count($data_buku)}}</strong> data buku dengan kata:
            <strong>{{$cari}}</strong>
        </div>
        @else
        <div class="alert alert-warning">Tidak ditemukan data buku dengan kata: <strong>{{$cari}}</strong>
        </div>
        @endif
        @if(Session::has('pesan'))
        <div class="alert alert-success">{{session::get('pesan')}}</div>
        @endif
        <h1>Daftar Buku</h1>
        <form action="{{ route('buku.search')}}" method="get">
            <input type="text" name="kata" class="form-control" placeholder="Cari buku... " style="width: 30%;
            display: inline; margin-top: 10px; margin-bottom: 10px; float: left;">
        </form>
        <table class="table table-striped">
            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                <tr>
                    <td>{{ $buku->id }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>Rp {{ number_format($buku->harga, 2, ',', '.') }}</td>
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td>
    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form>
    <form action="{{ route('buku.edit', $buku->id) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-edit"></i> Update
        </button>
    </form>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $data_buku->links() }}</div>
        <!-- <div><strong>Jumlah Buku: {{ $jumlahData }}</strong></div> -->
        <p class="mt-3">Jumlah Data: {{ $jumlahData }}</p>
        <p>Total Harga: Rp {{ number_format($total, 2) }}</p>
        <p><a href="/buku" class="btn btn-warning">Kembali</a></p>
    </div>

    <!-- Tautan Bootstrap JavaScript (Jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
