<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/bukuapp/css/style.css">
    <title>Index</title>
</head>
<body>
    <ul class="nav">
        <div class="wrapper">            
            <li class="logo nav-item"><a href="#">BOOK APP</a> </li>
            <li class="nav-item"><a class="active" href="#">Buku</a></li>
            <li class="nav-item"><a href="#">Genre</a></li>
            <li class="nav-item"><a href="#">Logout</a></li>
        </div>
    </ul>

    <div class="wrapper">
        <h1 class="title">Data Buku</h1>
        <div class="head-table">
            <form action="" method="get" class="form-cari">
            <input type="search" name="cari" id="cari" placeholder="Masukkan kata kunci...">
            <button type="submit" class="teal">Cari</button>
            </form>
            <button type="submit" id="tambah">Tambah Data</button>
        </div>
        <table class="data">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Genre</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Dune</td>
            <td>Frank Herbert</td>
            <td>Chilton Books</td>
            <td>Science Fiction</td>
            <td>
                <a href="#" class="aksi hijau">Detail</a>
                <a href="#" class="aksi kuning">Edit</a>
                <a href="#" class="aksi merah">Hapus</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Talk</td>
            <td>Linda Rosenkrantz</td>
            <td>The New York Review of Books, Inc</td>
            <td>Comedy</td>
            <td>
                <a href="#" class="aksi hijau">Detail</a>
                <a href="#" class="aksi kuning">Edit</a>
                <a href="#" class="aksi merah">Hapus</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Girl on Fire</td>
            <td>Robin Wasserman</td>
            <td>HarperCollins Publisher</td>
            <td>Dark/Suspense</td>
            <td>
                <a href="#" class="aksi hijau">Detail</a>
                <a href="#" class="aksi kuning">Edit</a>
                <a href="#" class="aksi merah">Hapus</a>
            </td>
        </tr>
        </table>
        <div class="form">            
            <h1>Tambah Buku</h1>
            <form action="" method="post" class="form-tambah-edit">
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
                        <option value="1">Science fiction</option>
                        <option value="2">Comedy</option>
                        <option value="3">Dark/suspense</option>
                    </select>
                    <label for="">Ringkasan</label>
                    <textarea name="ringkasan" id="" rows="5"></textarea>
                    <label for="">Cover</label>
                    <input type="file" name="cover" id="">
                <button type="submit" class="btn-large">Simpan</button>
            </form>
        </div>

        <div class="detail">
            <h1>Detail Buku</h1>
            <div class="container">
                <div class="col-1">
                    <img src="buku/cover/girl-on-fire.jpg" alt="" srcset="">
                </div>
                <div class="col-2">
                    <table>
                        <tr>
                            <td colspan="2">                                
                                <h2>Girl on Fire (2016)</h2>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">                                
                                <i>Dark / Suspense</i>
                            </td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>Robin Wasserman</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>HarperCollins Publisher</td>
                        </tr>
                        <tr>
                            <th>Ringkasan</th>
                            <td>
                            On Halloween, 1991, a popular high school basketball star ventures into the woods near Battle Creek, Pennsylvania, and disappears. Three days later, he’s found with a bullet in his head and a gun in his hand—a discovery that sends tremors through this conservative community, already unnerved by growing rumors of Satanic worship in the region.
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="button">Kembali</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>