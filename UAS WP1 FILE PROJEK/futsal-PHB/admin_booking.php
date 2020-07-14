<?php 
include "koneksi.php";
include "admin_head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

$q="SELECT * FROM booking";
// echo $q;
$qry = mysql_query($q);
?>

<div class="container">
<h1>Data Pemesan</h1>
<table class="table">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Lapangan</td>
        <td>Jam mulai</td>
        <td>Jam selesai</td>
        <td>Tanggal</td>
        <td>Hapus</td>
        <!-- <td>Pembayaran</td> -->
    </tr>
    <?php
    $no=1;
    while ($row = mysql_fetch_array($qry)) { ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['lapangan']?></td>
        <td><?php echo $row['jam_mulai']?></td>
        <td><?php echo $row['jam_selesai']?></td>
        <td><?php echo $row['date']?></td>
        <td><a href="admin_booking_hapus.php?id_booking=<?php echo $row['id_booking']?>">Hapus</a></td>
    </tr>
    <?php $no++;} ?>
</table>


</div>




<?php
include "foot.php";
?>
