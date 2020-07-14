<?php 
include "koneksi.php";
include "admin_head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

$q="SELECT * FROM lapangan";
// echo $q;
$qry = mysql_query($q);

//Buat konfigurasi upload
//Folder tujuan upload file
$eror		= false;
$folder		= 'uploads/';
//type file yang bisa diupload
$file_type	= array('jpg','jpeg','png','JPG','JPEG','PNG');
//tukuran maximum file yang dapat diupload
$max_size	= 1000000; // 1MB
if(isset($_POST['submit'])){
	//Mulai memorises data
	$file_name	= $_FILES['data_upload']['name'];
	$file_size	= $_FILES['data_upload']['size'];
	$detail = $_POST['detail'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		$pesan .= '- Type file yang anda upload tidak sesuai<br />';
	}
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= '- Ukuran file melebihi batas maximum<br />';
	}
	//check ukuran file apakah sudah sesuai

	if($eror == true){
		echo '<div id="eror">'.$pesan.'</div>';
	}
	else{
		//mulai memproses upload file
		if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
			//catat nama file ke database
			$catat = mysql_query('insert into lapangan(image,detail) values ("'.$file_name.'","'.$detail.'")');
			echo '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
		} else{
			echo "Proses upload eror";
		}
	}
}
?>

<div class="container">
<h1>Data Lapangan</h1>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="data_upload" id="fileToUpload">
    <textarea name="detail" id="" cols="30" rows="5"></textarea>
    <br>
    <input type="submit" value="Simpan" name="submit">
</form>
<table class="table">
    <tr>
        <td>No</td>
        <!-- <td>Nama</td> -->
        <td>Gambar</td>
        <td>Detail</td>
        <td>Edit</td>
        <td>Hapus</td>
        <!-- <td>Jam selesai</td> -->
        <!-- <td>Tanggal</td> -->
        <!-- <td>Pembayaran</td> -->
    </tr>
    <?php
    $no=1;
    while ($row = mysql_fetch_array($qry)) { ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><img width="15%" src="uploads/<?php echo $row['image']?>" alt=""></td>
        <td><?php echo $row['detail']?></td>
        <td><a href="admin_lapangan_edit.php?id=<?php echo $row['id_lapangan']?>">Edit</a></td>
        <td><a href="admin_lapangan_hapus.php?id=<?php echo $row['id_lapangan']?>">Hapus</a></td>
        <!-- <td><?php echo $row['jam_mulai']?></td> -->
        <!-- <td><?php echo $row['jam_selesai']?></td> -->
        <!-- <td><?php echo $row['date']?></td> -->
        <!-- <td><a href="detail_booking.php?id_booking=<?php echo $row['id_booking']?>">Detail</a></td> -->
    </tr>
    <?php $no++;} ?>
</table>


</div>




<?php
include "foot.php";
?>
