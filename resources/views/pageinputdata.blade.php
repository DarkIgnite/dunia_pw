<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('dataperusahaan.store') }}" method="post">
        @csrf
        <div>
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan">
        </div>

        <div>
            <label>Bidang</label>
            <input type="text" name="bidang">
        </div>
        
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat">
        </div>

        <div>
            <label>Telepon</label>
            <input type="text" name="telepon">
        </div>
        
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>