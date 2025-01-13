<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="<?php echo base_url('produk/edit/' . $produk->id_produk); ?>" method="post">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name=" nama_produk" value="<?php echo $produk->nama_produk; ?>" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="<?php echo $produk->harga; ?>" required>
        <br>
        <label for="kategori_id">Kategori:</label>
        <select name="kategori_id">
            <!-- Tambahkan opsi kategori di sini -->
        </select>
        <br>
        <label for="status_id">Status:</label>
        <select name="status_id">
            <!-- Tambahkan opsi status di sini -->
        </select>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>