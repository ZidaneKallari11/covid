<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 


     include 'koneksi.php';
     $sql = "SELECT * FROM buku INNER JOIN kategori USING(id_kategori) ORDER BY judul";
     
     $res = mysqli_query($koneksi,$sql);
 
     $pinjam = array();
 
     while($data = mysqli_fetch_assoc($res)){
         $pinjam[] = $data;
     }

    include '../aset/header.php';
   
    ?>



        <div class="container">
            <div class="row mt-4">
                <div class="col-md">
                </div>
            </div>
        </div>

                    <div class="card">
            <div class="card-header">
            <h2 class="card-title"><i class="fab fa-accessible-icon"></i> Daftar Pasien</h2>
            </div>
            <a href="tambah.php"><button type="button" class="btn btn-outline-primary" style="width: 100%; height:40px">+ Tambah</button></a>
            <div class="card-body">

                            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gejala</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach($pinjam as $p){?>

                    <tr>
                        <th scope="row"><?=$no ?></th>
                        <td><?= $p['judul']?></td>
                        <td><?= $p['penerbit']?></td>
                        <td><?= $p['ringkasan']?></td> 
                        <td>
                           <a href="detail.php?id_buku=<?= $p["id_buku"];?>" class="badge badge-success">Detail</a>
                           <a href="edit.php?id_buku=<?= $p["id_buku"];?>  " class="badge badge-warning">Edit</a>
                           <a href="hapus.php?id_buku=<?= $p["id_buku"];?> " onclick="return confirm('Yakin ingin menghapus data?')" class="badge badge-danger">Hapus</a>
                        </td>
                     </tr>
                 <?php
                    $no++;
                        }
                 ?>            

                </table>
                            </div>
                            </div>

        
    <?php 
    include '../aset/footer.php';
    ?>
 
</body>
</html>