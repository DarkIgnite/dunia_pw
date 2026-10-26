<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>
<body>
    <h2>Daftar Data Perusahaan</h2>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Perusahaan</th>
                <th>Bidang</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($perusahaan as $listperusahaan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $listperusahaan->nama_perusahaan }}</td>
                    <td>{{ $listperusahaan->bidang }}</td>
                    <td>{{ $listperusahaan->alamat }}</td>
                    <td>{{ $listperusahaan->telepon }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Belum ada data perusahaan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>