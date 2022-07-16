<?php

$page = array("title" => "Index", "active" => "buku");

include '../koneksi.php';

$cari = "";

if(isset($_GET['cari']))
{
    $cari = $_GET['cari'];
}

$query = "SELECT id_buku, judul, penulis, penerbit, genre FROM buku INNER JOIN genre ON buku.id_genre = genre.id_genre WHERE judul LIKE '%$cari%' OR penulis LIKE '%$cari%' OR penerbit LIKE '%$cari%' OR genre LIKE '%$cari%' ORDER BY (judul)"; // untuk menampilkan data

$hasil = mysqli_query($koneksi, $query); 

$buku = array();

while ($data = mysqli_fetch_assoc($hasil)) 
{
    $buku[] = $data;
}

include '../template/header.php';

?>

    <h1 class="title">Data Buku</h1>
        <div class="head-table">
            <form action="" method="get" class="form-cari">
            <input type="search" name="cari" id="cari" placeholder="Masukkan kata kunci...">
            <button type="submit" class="teal">Cari</button>
            </form>
            <button type="button" id="tambah" onclick="window.location='tambah.php'">Tambah Data</button>
        </div>
        <?php if(isset($_SESSION['pesan'])) { ?>
        <div class="alert <?= $_SESSION['pesan']['warna'] ?>">
            <span class="btn-close" onclick="this.parentElement.style.display='none'">&times;</span>
            <?php echo $_SESSION['pesan']['isi'] ?>
        </div>
        <?php 
        unset($_SESSION['pesan']);
        }
        ?>
        <table class="data">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Genre</th>
            <th>Aksi</th>
        </tr>

<?php
$no = 1;
foreach ($buku as $b) { ?>
    <tr>
        <td><?= $no; ?></td>
        <td><?= $b['judul']; ?></td>
        <td><?= $b['penulis']; ?></td>
        <td><?= $b['penerbit']; ?></td>
        <td><?= $b['genre']; ?></td>
        <td>
            <a href="detail.php?id_buku=<?= $b['id_buku'] ?>" class="aksi hijau">Detail</a>
            <a href="edit.php?id_buku=<?= $b['id_buku'] ?>" class="aksi kuning">Edit</a>
            <a href="hapus.php?id_buku=<?= $b['id_buku'] ?>" class="aksi merah" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</a>
        </td>
    </tr>
<?php
$no++;
}
?>

<?php

include '../template/footer.php';

?>