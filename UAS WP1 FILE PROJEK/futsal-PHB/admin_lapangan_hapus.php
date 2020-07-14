<?php

include 'koneksi.php';

$id=$_GET['id'];
if(empty($id)){
	header('location:admin_lapangan.php');
}

$q="DELETE FROM lapangan WHERE id_lapangan='$id'";
$qry=mysql_query($q);
if($qry){
	header('location:admin_lapangan.php');
}