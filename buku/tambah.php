<?php

include '../koneksi.php';
$page = array("title" => "Tambah", "active" => "buku");
include '../template/header.php';

$query = "SELECT * FROM genre ORDER BY (genre)";
$hasil = mysqli_query($koneksi, $query);

$genre = array();

while($data = mysqli_fetch_assoc($hasil))
{
    $genre[] = $data;
}

if (isset($_POST['simpan']))
{
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $id_genre = $_POST['id_genre'];
    $ringkasan = addslashes($_POST['ringkasan']);
    
    $file = $_FILES['cover']['tmp_name'];
    $cover = $_FILES['cover']['name'];

    $destination = "./cover/" . $cover;

    $q_insert = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, id_genre, ringkasan, cover)
    VALUES ('$judul', '$penulis', '$penerbit', $tahun_terbit, $id_genre, '$ringkasan', '$cover')";

    $hasil = mysqli_query($koneksi, $q_insert);

    $cek = mysqli_affected_rows($koneksi);

    if($cek == 1)
    {
        move_uploaded_file($file, $destination);
        $_SESSION['pesan']['isi'] = "Data berhasil ditambahkan";
        $_SESSION['pesan']['warna'] = "hijau";
    }
    else
    {
        $_SESSION['pesan']['isi'] = "Data gagal ditambahkan";
        $_SESSION['pesan']['warna'] = "merah";
    }
    header("Location: index.php");
}

?>

<div class="form">            
    <h1>Tambah Buku</h1>
    <form action="" method="post" class="form-tambah-edit" enctype="multipart/form-data">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control">
            <label for="">Penulis</label>
            <input type="text" name="penulis" class="form-control">
            <label for="">Penerbit</label>
            <input type="text" name="penerbit" class="form-control">
            <label for="">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control">
            <label for="">Genre</label>
            <select name="id_genre">
                <?php
                foreach ($genre as $g){?>
                <option value="<?= $g['id_genre']?>"><?= $g['genre']?></option>
                <?php
                }
                ?>
            </select>
            <label for="">Ringkasan</label>
            <textarea name="ringkasan" id="" rows="5"></textarea>
            <label for="">Cover</label>
            <input type="file" name="cover" id="">
        <button type="submit" name="simpan" class="btn-large">Simpan</button>
    </form>
</div>

<?php

include '../template/footer.php';

?>