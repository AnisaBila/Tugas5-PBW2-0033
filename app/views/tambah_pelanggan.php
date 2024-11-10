
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">


    <div class="container mt-5">
        <h2>Tambah Pelanggan</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>ID Pelanggan</label>
                <input type="text" class="form-control" name="id_pelanggan" required>
            </div>
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama_pelanggan" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php?page=pelanggan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>