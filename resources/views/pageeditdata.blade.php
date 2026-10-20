<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .edit-card {
            max-width: 600px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .edit-card .card-header {
            background-color: #212529;
            color: #fff;
            border-radius: 12px 12px 0 0;
            padding: 16px 24px;
        }

        .edit-card .card-body {
            padding: 24px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card edit-card mx-auto">
            <div class="card-header">
                <h4 class="mb-0">Edit Data Perusahaan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dataperusahaan.update', $perusahaan->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan }}">
                    </div>

                    <div class="mb-3">
                        <label for="bidang" class="form-label">Bidang</label>
                        <input type="text" class="form-control" id="bidang" name="bidang" value="{{ $perusahaan->bidang }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $perusahaan->alamat }}">
                    </div>

                    <div class="mb-4">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $perusahaan->telepon }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dataperusahaan.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
