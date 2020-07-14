<?php
include "koneksi.php";
// include "head.php";
$idbooking = $_GET['id_booking'];

$q="SELECT * FROM booking WHERE id_booking='$idbooking'";
$qry=mysql_query($q);
?>

<center><h1>Futsal PHB</h1></center>
<center>---------------------------------------
<table border="1">
    <?php
    while ($row=mysql_fetch_array($qry)) { ?>
    <tr>
        <th>Nama</th>
        <td><?php echo $row['username']?></td>
    </tr>
    <tr>
        <th>Lapangan</th>
        <td><?php echo $row['lapangan']?></td>
    </tr>
    <tr>
        <th>Jam mulai</th>
        <td><?php echo $start = $row['jam_mulai']?></td>
    </tr>
    <tr>
        <th>Jam selesai</th>
        <td><?php echo $end = $row['jam_selesai']?></td>
    </tr>
    <tr>
        <th>Tgl</th>
        <td><?php echo $row['date']?></td>
    </tr>
    
    <?php } ?>
</table>
<br>
Total Bayar : <?php echo "Rp ".$total=($end-$start)*150000 ?>
<br><br>
Uang Muka : <?php echo "Rp ".$total/2 ?>
<br><br>
Silahkan, melakukan transfer ke No rek <b>0700001911910</b> atas nama Futsal PHB
<br>

<?php
//Buat konfigurasi upload
//Folder tujuan upload file
$eror       = false;
$folder     = 'uploads/bukti/';
//type file yang bisa diupload
$file_type  = array('jpg','jpeg','png','JPG','JPEG','PNG');
//tukuran maximum file yang dapat diupload
$max_size   = 1000000; // 1MB
if(isset($_POST['submit'])){
    //Mulai memorises data
    $file_name  = $_FILES['data_upload']['name'];
    $file_size  = $_FILES['data_upload']['size'];
    $detail = $_POST['atasnama'];
    //cari extensi file dengan menggunakan fungsi explode
    $explode    = explode('.',$file_name);
    $extensi    = $explode[count($explode)-1];

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
            $catat = mysql_query('insert into bukti(image,atasnama) values ("'.$file_name.'","'.$detail.'")');
            echo '<div id="msg">Berhasil mengupload bukti '.$file_name.'</div>';
        } else{
            echo "Proses upload eror";
        }
    }
}
?>


<br><br>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Upload bukti</th>
            <td> <input type="file" name="data_upload" id="fileToUpload"></td>
        </tr>

        <tr>
            <th>Atas Nama</th>
            <td><input type="text" name="atasnama"></td>
        </tr>
    </table>

    <input type="submit" value="Simpan" name="submit">
</form>
<button onclick="myFunction()">Cetak</button>
<script>
function myFunction() {
    window.print();
}
</script>
<center>

<?php
include "foot.php";
?>
