<?php

include 'koneksi.php';

include 'fungsi-transaksi.php';

if(isset($_POST['submit'])){


    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_jatuh_tempo = date('Y-m-d',strtotime($tgl_pinjam.'+7 days'));
    $id_petugas = $_POST['petugas'];

    $sql = "INSERT INTO peminjaman VALUES('','$id_anggota','$id_buku','$tgl_pinjam','$tgl_jatuh_tempo','0000-00-00','$id_petugas','','dipinjam')";

    $stok = ambilstok($id_buku);

    if(cekpinjam($id_anggota) && $stok > 0){
        $res = mysqli_query($koneksi,$sql);

        $count = mysqli_affected_rows($koneksi);

        $stok_update = $stok - 1;
        if($count == 1){
            updatestok($id_buku,$stok_update);
            header("Location: index.php");
        }else{
            // header("Location: form-pinjam.php");
    }
}
}

?>