<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perusahaan - {{ $perusahaan->nama_perusahaan }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
        }
        th {
            width: 30%;
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detail Perusahaan</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-4">
                            <tbody>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                                </tr>
                                <tr>
                                    <th>Bidang</th>
                                    <td>{{ $perusahaan->bidang }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $perusahaan->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{ $perusahaan->telepon }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dataperusahaan.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('dataperusahaan.edit', $perusahaan->id) }}" class="btn btn-warning">Edit Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
