
<?php

require_once 'Tugas.php';
require_once 'TugasPrioritas.php';

session_start();

// Menyiapkan tempat penyimpanan tugas
if (!isset($_SESSION['daftar_tugas'])) {
    $_SESSION['daftar_tugas'] = [];
}

// Menghapus tugas
if (isset($_GET['hapus'])) {
    $nomor = $_GET['hapus'];

    if (isset($_SESSION['daftar_tugas'][$nomor])) {
        unset($_SESSION['daftar_tugas'][$nomor]);
        $_SESSION['daftar_tugas'] = array_values(
            $_SESSION['daftar_tugas']
        );
    }

    header("Location: index.php");
    exit;
}

// Mengubah nama tugas
if (isset($_POST['simpan'])) {
    $nomor = $_POST['nomor'];

    if (isset($_SESSION['daftar_tugas'][$nomor])) {
        $_SESSION['daftar_tugas'][$nomor]->ubahTugas(
            $_POST['nama_baru']
        );
    }

    header("Location: index.php");
    exit;
}

// Menambahkan tugas
if (isset($_POST['tambah'])) {

    $tugas = new TugasPrioritas(
        count($_SESSION['daftar_tugas']) + 1,
        $_POST['nama'],
        $_POST['deskripsi'],
        $_POST['batas_waktu'],
        'Belum selesai',
        $_POST['prioritas'],
        $_POST['kategori'],
        $_POST['pengingat'],
        'Pengguna',
        'Ya'
    );

    $_SESSION['daftar_tugas'][] = $tugas;

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Manajemen Tugas</h1>

<h2>Tambah Tugas Baru</h2>

<form method="POST">

    <p>Nama Tugas</p>
    <input type="text" name="nama" required>

    <p>Deskripsi</p>
    <textarea name="deskripsi" required></textarea>

    <p>Batas Waktu</p>
    <input type="date" name="batas_waktu" required>

    <p>Prioritas</p>
    <select name="prioritas">
        <option value="Rendah">Rendah</option>
        <option value="Sedang">Sedang</option>
        <option value="Tinggi">Tinggi</option>
    </select>

    <p>Kategori</p>
    <input type="text" name="kategori" required>

    <p>Pengingat</p>
    <input type="date" name="pengingat">

    <br><br>

    <button type="submit" name="tambah">
        Tambah Tugas
    </button>

</form>

<hr>

<h2>Daftar Tugas</h2>

<?php foreach ($_SESSION['daftar_tugas'] as $nomor => $tugas) { ?>

    <div>
        <h3>
            <?php echo htmlspecialchars($tugas->lihatTugas()); ?>
        </h3>

        <p>
            <?php echo $tugas->tampilkanDetail(); ?>
        </p>

        <form method="POST">

            <input type="hidden" name="nomor"
                   value="<?php echo $nomor; ?>">

            <input type="text" name="nama_baru"
                   placeholder="Nama tugas baru" required>

            <button type="submit" name="simpan">
                Edit Tugas
            </button>

        </form>

        <a href="?hapus=<?php echo $nomor; ?>"
           onclick="return confirm('Yakin ingin menghapus tugas ini?')">
            Hapus Tugas
        </a>
    </div>

    <hr>

<?php } ?>

</body>
</html>
