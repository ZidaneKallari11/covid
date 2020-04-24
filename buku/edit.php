<?php 

include 'koneksi.php';
include '../aset/header.php';

$ID = $_GET["id_buku"];

$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku.id_buku = '$ID' ");

$query1 = mysqli_query($koneksi, "SELECT * FROM kategori");



include 'koneksi.php';

if(isset($_POST['simpan'])){

    $id = $_GET['id_buku'];

    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['id_kategori'];
    

    $sql = "UPDATE buku SET
            judul = '$judul',
            penerbit  = '$penerbit',
            pengarang = '$pengarang',
            ringkasan = '$ringkasan',
            cover = '$cover',
            stok = '$stok',
            id_kategori = '$id_kategori'
            WHERE id_buku = '$id'
            ";

    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

    var_dump($count);
         
    if($count==1){
        echo "<script>
                alert('Data Berhasil Diubah'); 
                document.location.href='index.php';
              </script>";
        
    }
    else{
        echo "<script>
        alert('Data Gagal Diubah'); 
        document.location.href='edit.php';
      </script>";
    }
}
?>

<div class="container">
 <div class="row mt-4">
  <div class="col-md-9">
   <div class="card">
    <div class="card-header">
    <h2>Edit Daftar Pasien</h2>
    </div>
    <div class="card-body">
         <form method="post" action="">

         <?php while($edit = mysqli_fetch_assoc($query)): ?>
                <div class="form-group">
                 <label for="buku">Nama</label>
                 <input type="text" class="form-control" name="judul" id="judul"  value="<?= $edit['judul']?>">
                </div>

                <div class="form-group">
                 <label for="buku">Alamat</label>
                 <input type="text" class="form-control" name="penerbit" id="penerbit"   value="<?= $edit['penerbit']?>">
                </div>  

                <div class="form-group">
                 <label for="buku">Nama dokter</label>
                 <input type="text" class="form-control" name="pengarang" id="pengarang"  value="<?= $edit['pengarang']?>">
                </div>

                <div class="form-group">
                 <label for="buku">Gejala</label>
                 <textarea name="ringkasan" id="ringkasan" class="form-control" placeholder="<?= $edit['ringkasan']?>"></textarea>
                </div>

                
                
                <div class="form-group">
                 <label for="buku">Jumlah perawat</label>
                 <input type="number" class="form-control" name="stok" id="stok" value="<?= $edit['stok']?>">
                </div>

                <?php
                     endwhile;
                ?>
                
                <div class="form-group">
                 <label for="buku">Kategori</label>
                 <select name="id_kategori" class="form-control" id="id_kategori">
                     <option value="">-- Pilih Kategori --</option>

                        <?php while($kategori = mysqli_fetch_assoc($query1)):?>
                      <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori["kategori"]; ?></option>
                        <?php endwhile; ?>
                 </select>
                </div>
                
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
         </form>        
    </div>
   </div>
  </div>
 </div>
</div>    






<?php

include '../aset/footer.php';

?>