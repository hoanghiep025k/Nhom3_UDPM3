<?php
include("lib_db.php");
if ($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //neu dang nhap dung, fake data
    $topSql = "SELECT * FROM nguoidung where tentaikhoan = '".$username."'";
    //$topSql = "SELECT * FROM nguoidung where id = 1";
    //echo($topSql);exit();
	$datauser = select_one($topSql);
	//print_r($datauser["matkhau"]);exit();

    if ($password == $datauser["matkhau"])
    {
?>
<p>Đăng nhập thành công</p>
<h1>Xin chào: <?php echo $username ?></h1>
<?php
    } else {
?>
 <h1>Tên đăng nhập hoặc mật khẩu sai rồi</h1>
<?php
    }
}
?>