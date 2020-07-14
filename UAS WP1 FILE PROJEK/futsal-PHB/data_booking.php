<?php 
include "koneksi.php";
include "head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

$q="SELECT * FROM booking WHERE username='$nama'";
// echo $q;
$qry = mysql_query($q);
?>

<div class="container">
<div class"col-md-8">
<table class="table">
    <tr>
        <td>Nama</td>
        <td>Lapangan</td>
        <td>Jam mulai</td>
        <td>Jam selesai</td>
        <td>Tanggal</td>
        <td>Pembayaran</td>
    </tr>
    <?php
    while ($row = mysql_fetch_array($qry)) { ?>
    <tr>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['lapangan']?></td>
        <td><?php echo $row['jam_mulai']?></td>
        <td><?php echo $row['jam_selesai']?></td>
        <td><?php echo $row['date']?></td>
        <td><a href="detail_booking.php?id_booking=<?php echo $row['id_booking']?>">Detail</a></td>
        <td></td>
    </tr>
    <?php } ?>
</table>

</div>
</div>















<?php
include "foot.php";
?>
