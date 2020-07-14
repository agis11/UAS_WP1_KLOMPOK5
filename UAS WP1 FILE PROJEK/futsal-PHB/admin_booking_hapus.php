<?php

include 'koneksi.php';

$id=$_GET['id_booking'];
if(empty($id)){
	header('location:admin_booking.php');
}

$q="DELETE FROM booking WHERE id_booking='$id'";
$qry=mysql_query($q);
if($qry){
	header('location:admin_booking.php');
}