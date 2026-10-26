<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Data Perusahaan</h2>
            <div>
                <a href="{{ route('dataperusahaan.pdf') }}" class="btn btn-danger">Export PDF</a>
                <a href="{{ route('dataperusahaan.excel') }}" class="btn btn-success">Export Excel</a>
                <a href="{{ route('dataperusahaan.create') }}" class="btn btn-primary">+ Tambah Data Perusahaan</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Bidang</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perusahaan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_perusahaan }}</td>
                        <td>{{ $item->bidang }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>
                            <a href="{{ route('dataperusahaan.show', $item->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                            <a href="{{ route('dataperusahaan.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('dataperusahaan.destroy', $item->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data perusahaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
