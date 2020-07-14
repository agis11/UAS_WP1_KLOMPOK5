<?php 
include "koneksi.php";
include "admin_head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

$id=$_GET['id'];

$q="SELECT * FROM lapangan WHERE id_lapangan='$id'";
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

	$detail	= $_POST['detail'];
	if(empty($file_name)){
		$q2="UPDATE lapangan SET detail='$detail' WHERE id_lapangan='$id'";
		$qry2=mysql_query($q2);
		if($qry2){
			header('location:admin_lapangan.php');
		}
	}else{


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
				$catat = mysql_query('update lapangan set image="'.$file_name.'",detail="'.$detail.'" where id_lapangan="'.$id.'" ');
				echo '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
				header('location:admin_lapangan.php');
			} else{
				echo "Proses upload eror";
			}
		}
	}
}
?>

<div class="container">
<h1>Edit Lapangan</h1>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <?php while ($row=mysql_fetch_array($qry)) { ?>

		    <input type="file" name="data_upload" id="fileToUpload">
		    <input type="hidden" name="picture" value="<?php echo $row['image']?>" readonly>
		    <br>
    		<textarea name="detail" id="" cols="30" rows="5"><?php echo $row['detail']?></textarea>
    <?php } ?>
    <br>
    <input type="submit" value="Simpan" name="submit">
</form>