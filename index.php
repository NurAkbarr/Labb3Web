<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #1e1e1e;
        }

        .main {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        img {
            max-width: 80px;
            height: auto;
            border-radius: 5px;
        }

        .aksi {
            display: flex;
            justify-content: space-around;
        }

        a {
            text-decoration: none;
            background-color: #6495ED;
            margin: 2px;
            color: #fff;
            border-radius: 5px;
            padding: 5px;
            font-size: 12px;
            cursor: pointer;
        }

        .tambah {
            display: inline-block;
            padding: 10px 15px;
            background-color: #6495ED;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .ubah {
            background-color: #4CAF50;
        }

        .hapus {
            background-color: #FF6347;
        }
    </style>
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <a class="tambah" href="tambah.php">Tambah Barang</a>
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if($result): ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>"></td>
                            <td><?= $row['nama'];?></td>
                            <td><?= $row['kategori'];?></td>
                            <td><?= $row['harga_beli'];?></td>
                            <td><?= $row['harga_jual'];?></td>
                            <td><?= $row['stok'];?></td>
                            <td class="aksi">
                                <a class="ubah" href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                                <a class="hapus" href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr>
                            <td colspan="7">Belum ada data</td>
                        </tr>
                    <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>
