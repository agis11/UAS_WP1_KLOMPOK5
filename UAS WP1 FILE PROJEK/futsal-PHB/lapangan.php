<?php
include "koneksi.php";
include "head.php";

$nama = $_SESSION['nama'];
if($nama==''){
    header('location:index.php');
}

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $lapangan = $_POST['lapangan'];
    $jammulai = $_POST['mulai'];
    $jamselesai = $_POST['selesai'];
    $date = date('Y-m-d');

    if($jamselesai <= $jammulai){
        echo "<center><h3><p style='color:red;'>Maaf, Jam mulai harus dibawah jam selesai</p></h3></center>";
    }

    $qcek = "SELECT jam_mulai FROM booking WHERE jam_mulai='$jammulai' AND lapangan='$lapangan' AND date='$date'";
    // echo $qcek;
    // die();
    $qrycek = mysql_query($qcek);
    if(mysql_num_rows($qrycek) > 0){
        echo "<center><h2><p style='color:red;'>Maaf, Jam $jammulai dan lapangan $lapangan sudah di booking</p></h2></center>";
    }else{
        $q="INSERT INTO booking (username,lapangan,jam_mulai, jam_selesai,date)VALUES ('$nama','$lapangan','$jammulai', '$jamselesai','$date')";
        $qry=mysql_query($q);
        if($qry){
            echo "<center><h2><p style='color:green;'>Anda berhasil membooking, Silahkan cek Data pemesanan anda</p></h2></center>";
        }else{
            echo "gagal membooking";
        }
    }

}

?>
<div class="container">
<div class="col-md-6">
<form action="" method="post">
    Nama pemesan
    <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>" readonly>
    Pilih lapangan
    <select name="lapangan" class="form-control" id="">
        <option value="1">Lapangan 1</option>
        <option value="2">Lapangan 2</option>
    </select>
    Jam Mulai
    <select name="mulai" class="form-control" id="">
        <option value="8">08.00</option>
        <option value="9">09.00</option>
        <option value="10">10.00</option>
        <option value="11">11.00</option>
        <option value="12">12.00</option>
        <option value="13">13.00</option>
        <option value="14">14.00</option>
        <option value="15">15.00</option>
        <option value="16">16.00</option>
        <option value="17">17.00</option>
        <option value="18">18.00</option>
        <option value="19">19.00</option>
        <option value="20">20.00</option>
        <option value="21">21.00</option>
        <option value="22">22.00</option>
        <option value="23">23.00</option>
        <option value="24">24.00</option>
    </select>

    Jam Selesai
    <select name="selesai" class="form-control" id="">
        <option value="8">08.00</option>
        <option value="9">09.00</option>
        <option value="10">10.00</option>
        <option value="11">11.00</option>
        <option value="12">12.00</option>
        <option value="13">13.00</option>
        <option value="14">14.00</option>
        <option value="15">15.00</option>
        <option value="16">16.00</option>
        <option value="17">17.00</option>
        <option value="18">18.00</option>
        <option value="19">19.00</option>
        <option value="20">20.00</option>
        <option value="21">21.00</option>
        <option value="22">22.00</option>
        <option value="23">23.00</option>
        <option value="24">24.00</option>
    </select>
    <!-- <br>
    <input type="checkbox" name="jam" id="">08.00<br>
    <input type="checkbox" name="jam" id="">09.00<br>
    <input type="checkbox" name="jam" id="">10.00<br>

    <input type="checkbox" name="jam" id="">11.00<br>
    <input type="checkbox" name="jam" id="">12.00<br>
    <input type="checkbox" name="jam" id="">13.00<br>

    <input type="checkbox" name="jam" id="">14.00<br>
    <input type="checkbox" name="jam" id="">15.00<br>
    <input type="checkbox" name="jam" id="">16.00<br>

    <input type="checkbox" name="jam" id="">17.00<br>
    <input type="checkbox" name="jam" id="">18.00<br>
    <input type="checkbox" name="jam" id="">19.00<br>

    <input type="checkbox" name="jam" id="">20.00<br>
    <input type="checkbox" name="jam" id="">21.00<br>
    <input type="checkbox" name="jam" id="">22.00<br>

    <input type="checkbox" name="jam" id="">23.00<br>
    <input type="checkbox" name="jam" id="">24.00<br> -->
<input type="submit" name="submit" value="Booking">
</form>
</div>

<div class="col-md-6">
    Jadwal Booking

    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Lapangan</th>
            <th>JamMulai</th>
            <th>Jam Selesai</th>
        </tr>

    <?php
    $date = date('Y-m-d');
    $q="SELECT * FROM booking WHERE date='$date'";
    // echo $q;
    $qry = mysql_query($q);
    while ($row = mysql_fetch_array($qry)) { ?>
    <tr>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['lapangan'];?></td>
        <td><?php echo $row['jam_mulai'];?></td>
        <td><?php echo $row['jam_selesai'];?></td>
    </tr>
    <?php }

?>
</table>
</div>
</div>

<?php include "foot.php"; ?>