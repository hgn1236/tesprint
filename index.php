<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus produk ini?');
        }
    </script>
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="<?php echo base_url('produk/add'); ?>">Tambah Produk</a>
    <table border="1">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($produk as $item): ?>
        <tr>
            <td><?php echo $item->nama_produk; ?></td>
            <td><?php echo $item->harga; ?></td>
            <td><?php echo $item->nama_kategori; ?></td>
            <td><?php echo $item->nama_status; ?></td>
            <td>
                <a href="<?php echo base_url('produk/edit/' . $item->id_produk); ?>">Edit</a>
                <a href="<?php echo base_url('produk/delete/' . $item->id_produk); ?>" onclick="return confirmDelete();">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>