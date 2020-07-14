<?php
include "koneksi.php";
include "admin_head.php";

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $password = $_POST['password'];

    $q="SELECT * FROM admin WHERE username='$name' AND password='$password'";

    $qry=mysql_query($q);
    $row = mysql_fetch_array($qry);
    if ($row['username'] == $name AND $row['password'] == $password) {

        session_start(); // memulai fungsi session
        $_SESSION['nama'] = $name;

        header("location:admin_user.php"); 
    }else {
        echo "Gagal Masuk"; // jika gagal, maka muncul teks gagal masuk
    }
}

?>

<div class="col-md-6">
<h1>Admin login</h1>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="username" class="form-control" id="exampleInputEmail1" placeholder="username" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <input type="submit" class="btn btn-success btn-block" name="submit" value="Masuk">
</form>
</div>

<!-- <form action="" method="post">
Username
<input type="text" name="username" id="">
password
<input type="password" name="password" id="">
<input type="submit" name="submit" value="Login">
</form> -->

<?php  include "foot.php"; ?>