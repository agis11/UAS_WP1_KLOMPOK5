<?php
include "koneksi.php";
include "head.php";

$q="SELECT * FROM lapangan";
$qry = mysql_query($q);
while ($row=mysql_fetch_array($qry)) {

?>

<div class="col-md-6">
    <img src="uploads/<?php echo $row['image']?>" alt="" width="95%">
    <?php echo $row['detail'] ?>
</div>

<?php } ?>
