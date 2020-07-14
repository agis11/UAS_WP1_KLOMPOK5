<?php
include "koneksi.php";
include "head.php";

if(isset($_POST['submit'])){
    $nama = $_POST['name'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    
    if($pass == $repass){
        $q="INSERT INTO user (username, password,no_hp,alamat) VALUES ('$nama', '$pass', '$nohp','$alamat')";
        $qry=mysql_query($q);
        if($qry){
          echo "<script>alert('Berhasil mendaftar')</script>";
          header('location:login.php');
        }

    }else{
        echo "<center><p style='color:red'>Maaf, password tidak sama</p></center>";
    }

}

?>

<div class="col-md-6">
<h1>Silahkan isi form dibawah ini</h1>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="username" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">No Handphone</label>
    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="username" name="nohp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Alamat</label>
    <textarea name="alamat" class="form-control" id="" cols="10" rows="5"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repassword</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="RePassword" name="repassword">
  </div>


  <input type="submit" class="btn btn-primary btn-block" name="submit" value="Daftar">
</form>
</div>

    <!-- <div class="container">
        <form action="" method="post">
            Username
            <input type="text" name="name" id="">
            password
            <input type="password" name="password" id="">
            re-password
            <input type="password" name="repassword" id="">

            <input type="submit" value="Daftar" name="submit">
        </form>
    </div> -->
<?php include "foot.php";?>


