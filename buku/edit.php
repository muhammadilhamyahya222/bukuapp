<?php

include '../koneksi.php';
$page = array("title" => "Edit", "active" => "buku");
include '../template/header.php';

$query = "SELECT * FROM genre ORDER BY (genre)";
$hasil = mysqli_query($koneksi, $query);

$genre = array();

while($data = mysqli_fetch_assoc($hasil))
{
    $genre[] = $data;
}

$id_buku = $_GET['id_buku'];

$q_buku = "SELECT * FROM buku INNER JOIN genre ON buku.id_genre = genre.id_genre WHERE id_buku = $id_buku";

$hasil_buku = mysqli_query($koneksi, $q_buku);

$buku = mysqli_fetch_assoc($hasil_buku);

$cover_lama = $buku['cover'];

if(isset($_POST['simpan']))
{
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $id_genre = $_POST['id_genre'];
    $ringkasan = addslashes($_POST['ringkasan']);

    if(!empty($_FILES['cover']['tmp_name']))
    {
        $file = $_FILES['cover']['tmp_name'];
        $cover = $_FILES['cover']['name'];
        $destination = './cover/' . $cover;
    }
    else
    {
        $cover = $cover_lama;
    }
    
    $q_update = "UPDATE buku SET judul = '$judul',
                                penulis = '$penulis',
                                penerbit = '$penerbit',
                                tahun_terbit = '$tahun_terbit',
                                id_genre = '$id_genre',
                                ringkasan = '$ringkasan',
                                cover = '$cover'
                WHERE id_buku = $id_buku";

    $hasil_update = mysqli_query($koneksi, $q_update);
    $cek = mysqli_affected_rows($koneksi);           
    if($cek ==1)
    {
        if(!empty($_FILES['cover']['tmp_name']))
        {
            unlink('./cover/'. $cover_lama);
            move_uploaded_file($file, $destination);
        }
        $_SESSION['pesan']['isi'] = "Data berhasil diubah";
        $_SESSION['pesan']['warna'] = "hijau";
    }
    else
    {
        $_SESSION['pesan']['isi'] = "Data gagal diubah";
        $_SESSION['pesan']['warna'] = "merah";
    }
    header("Location: index.php");
}


?>

<div class="form">            
            <h1>Tambah Buku</h1>
            <form action="" method="post" class="form-tambah-edit" enctype="multipart/form-data">
                    <label for="">Judul</label>
                    <input type="text" name="judul" value="<?= $buku['judul']?>" class="form-control">
                    <label for="">Penulis</label>
                    <input type="text" name="penulis" value="<?= $buku['penulis']?>" class="form-control">
                    <label for="">Penerbit</label>
                    <input type="text" name="penerbit" value="<?= $buku['penerbit']?>" class="form-control">
                    <label for="">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit']?>" class="form-control">
                    <label for="">Genre</label>
                    <select name="id_genre">
                        <?php
                        foreach ($genre as $g){?>
                        <option value="<?= $g['id_genre']?>"<?php if($buku['id_genre'] == $g['id_genre']){echo"selected";}?>><?= $g['genre']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="">Ringkasan</label>
                    <textarea name="ringkasan" id="" rows="5"><?= $buku['ringkasan'] ?>></textarea>
                    <label for="">Cover</label>
                    <input type="file" name="cover" id="">
                <button type="submit" name="simpan" class="btn-large">Simpan</button>
            </form>
        </div>

<?php

include '../template/footer.php';

?>