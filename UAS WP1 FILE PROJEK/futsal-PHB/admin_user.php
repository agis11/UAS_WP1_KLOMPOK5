<?php 
include "koneksi.php";
include "admin_head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

$q="SELECT * FROM user";
// echo $q;
$qry = mysql_query($q);
?>

<div class="container">
<h1>Data User</h1>
<table class="table">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>No HP</td>
        <td>Alamat</td>

        <!-- <td>Pembayaran</td> -->
    </tr>
    <?php
    $no=1;
    while ($row = mysql_fetch_array($qry)) { ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['no_hp']?></td>
        <td><?php echo $row['alamat']?></td>
        <!-- <td><a href="detail_booking.php?id_booking=<?php echo $row['id_booking']?>">Detail</a></td> -->
    </tr>
    <?php $no++;} ?>
</table>


</div>




<?php
include "foot.php";
?>
