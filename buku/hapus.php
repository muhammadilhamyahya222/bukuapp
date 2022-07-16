<?php

include '../koneksi.php';

$id_buku = $_GET['id_buku'];

$query = "DELETE FROM buku WHERE id_buku = $id_buku";

$hasil = mysqli_query($koneksi, $query);

$cek = mysqli_affected_rows($koneksi);

if($cek == 1)
{
    header("Location: index.php");
}
else
{
    echo "Gagal hapus data";
}

?>