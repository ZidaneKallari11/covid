<?php

include 'koneksi.php';
include 'fungsi-transaksi.php';

$buku = mysqli_query($koneksi, "SELECT * FROM buku");
$anggota = mysqli_query($koneksi,"SELECT * FROM anggota");
$query = mysqli_query($koneksi,"SELECT * FROM petugas");

include '../aset/header.php';

?>

<div class = "container">
  <div class = "row mt-4">
    <div class = "col md-8">

       <div class="card">

         <div class="card-header">
           <h3>Form Pasien COVID_19</h3>
         </div>        

           <div class="card-body">
             <form method="post" action="proses-pinjam.php">

               <div class="form-group">
                <label for="anggota">Nama Pendaftar</label>
                <select name="id_anggota" class="form-control">
                 <?php
                  while($a = mysqli_fetch_assoc($anggota)):?>
                   <option value="<?= $a['id_anggota']?>"><?= $a['nama']?></option>
                  <?php endwhile;
                   ?>   
                </select>
               </div>

               <div class="form-group">
                <label for="buku">Nama Pasien</label>
                <select name="id_buku" class="form-control">
                 <?php
                  while($b = mysqli_fetch_assoc($buku)):?>
                   <option value="<?= $b['id_buku']?>"><?= $b['judul']?></option>
                  <?php endwhile;
                   ?>   
                </select>
               </div>

               <div class="form-group">
                <label for="datepicker">Tanggal Daftar</label>
                <input type="date" name="tgl_pinjam" class="form-control">
               </div>

               <div class="form-group">
                 <label for="petugas">Petugas</label>
                 <select name="petugas" class="form-control" id="petugas">
                      <option value="">-- Petugas --</option>

                      <?php
                        while($kategori = mysqli_fetch_assoc($query)):
                      ?>

                      <option value="<?php echo $kategori['id_petugas']; ?>"><?php echo $kategori["nama_petugas"]; ?></option>

                      <?php
                       endwhile;
                      ?>
                 </select>
                </div>

               <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-primary mr-auto">Simpan</button>
               </div>
             </form>
           </div> 
             
     </div>
   </div>
 </div>
</div>     

<?php

include '../aset/footer.php';

?>