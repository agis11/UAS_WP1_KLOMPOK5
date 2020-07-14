<?php 
include "koneksi.php";
include "admin_head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

$q="SELECT * FROM bukti";
// echo $q;
$qry = mysql_query($q);
?>

<div class="container">
<h1>Data Transfer</h1>
<table class="table">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Bukti transfer</td>

        <!-- <td>Pembayaran</td> -->
    </tr>
    <?php
    $no=1;
    while ($row = mysql_fetch_array($qry)) { ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['atasnama']?></td>
        <td><img src="uploads/bukti/<?php echo $row['image']?>" alt="" width="10%"></td>
    </tr>
    <?php $no++;} ?>
</table>


</div>




<?php
include "foot.php";
?>
