<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
include "config.php";

// Fungsi untuk menambah data instansi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_instansi'])) {
    $nama_instansi = $_POST['nama_instansi'];
    $deskripsi = $_POST['deskripsi'];
    
    $add_query = "INSERT INTO instansi (nama_instansi, deskripsi) VALUES ('$nama_instansi', '$deskripsi')";
    $conn->query($add_query);
}

// Fungsi untuk mengubah data instansi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_instansi'])) {
    $id = $_POST['id'];
    $nama_instansi = $_POST['nama_instansi'];
    $deskripsi = $_POST['deskripsi'];

    $update_query = "UPDATE instansi SET nama_instansi = '$nama_instansi', deskripsi = '$deskripsi' WHERE id = $id";
    $conn->query($update_query);
}

// Fungsi untuk menghapus data instansi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_query = "DELETE FROM instansi WHERE id = $id";
    $conn->query($delete_query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM instansi WHERE nama_instansi LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM instansi";
}
$result = $conn->query($query);

if ($result === false) {
    die("Error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Instansi</title>
    <style>
        body {
            background-color: yellow;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        .search-form, .add-form, .logout-button {
            margin: 10px;
        }
        .add-form {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Instansi</h2>
        <form method="POST" class="search-form">
            <input type="text" name="keyword" placeholder="Cari instansi" required>
            <button type="submit" name="search">Cari</button>
        </form>
        <button class="show-add-form">Tambah Instansi</button>
        <div class="add-form">
            <h2>Tambah Instansi</h2>
            <form method="POST">
                <input type="text" name="nama_instansi" placeholder="Nama Instansi" required>
                <input type="text" name="deskripsi" placeholder="Deskripsi">
                <button type="submit" name="add_instansi">Tambah</button>
            </form>
        </div>
        <a href="logout.php" class="logout-button">Logout</a>
        <table>
            <tr>
                <th>No</th>
                <th>Instansi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>$no</td>";
                echo "<td>{$row['nama_instansi']}</td>";
                echo "<td>{$row['deskripsi']}</td>";
                echo "<td>
                        <form method='POST'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' name='delete'>Hapus</button>
                        </form>
                    </td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </table>
    </div>
    <script>
        document.querySelector('.show-add-form').addEventListener('click', function() {
            var addForm = document.querySelector('.add-form');
            if (addForm.style.display === 'none') {
                addForm.style.display = 'block';
            } else {
                addForm.style.display = 'none';
            }
        });
    </script>
</body>
</html>
