<?php

include '../koneksi.php';

$page = array("title" => "Detail", "active" => "buku");

$id_buku = $_GET['id_buku'];

$query = "SELECT * FROM buku INNER JOIN genre ON buku.id_genre = genre.id_genre WHERE id_buku = $id_buku";

$hasil = mysqli_query($koneksi, $query);

$buku = mysqli_fetch_assoc($hasil);

include '../template/header.php';

?>

<div class="detail">
        <h1>Detail Buku</h1>
        <div class="container">
            <div class="col-1">
                <img src="./cover/<?= $buku['cover']; ?>" alt="" srcset="">
            </div>
            <div class="col-2">
                <table>
                    <tr>
                        <td colspan="2">                                
                            <h2><?= $buku['judul'] ?> (<?= $buku['tahun_terbit'] ?>)</h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">                                
                            <i><?= $buku['genre'] ?></i>
                        </td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td><?= $buku['penulis'] ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td><?= $buku['penerbit'] ?></td>
                    </tr>
                    <tr>
                        <th>Ringkasan</th>
                        <td>
                        <?= $buku['ringkasan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" onclick="top.location='index.php'">Kembali</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

<?php

include '../template/footer.php';

?>