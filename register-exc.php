<?php
include("lib_db.php");
if ($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $nguoidung = array("tentaikhoan"=>$username , "matkhau"=>$password,"vaitro"=>"1");

    $checkUsernamesql = "SELECT tentaikhoan FROM nguoidung ";
    //echo($checkUsernamesql);exit();
    $checkUsername = select_list($checkUsernamesql);
    //print_r($checkUsername);exit();
    if(array_search($username, array_column($checkUsername, 'tentaikhoan')) !== FALSE){
        echo "Đã tồn tại tài khoản: ".$username;
        exit();
    }
    //$topSql = "SELECT * FROM nguoidung where tentaikhoan = '".$username."'";
    //echo($topSql);exit();
	$datauser = data_to_sql_insert("nguoidung",$nguoidung);
	//print_r($datauser);exit();
    $ret = exec_update($datauser);
    if ($ret == 1)
    {
            $name = "user";
            $cookie_name = $nguoidung["tentaikhoan"];
            $vaitro = "vaitro";
            $cookie_vaitro = $nguoidung["vaitro"];
            if (!isset($_COOKIE['user']))
            {
                setcookie($name, $cookie_name, time() + (3600), "/");
                setcookie($vaitro,$cookie_vaitro , time() + (3600), "/"); 
            }
            else
            {
                setcookie($name, "", time() - (3600), "/");
                setcookie($vaitro,"" , time() - (3600), "/"); 
                
                setcookie($name, $cookie_name, time() + (3600), "/");
                setcookie($vaitro,$cookie_vaitro , time() + (3600), "/"); 
            }
        echo "Đăng kí thành công";exit();
    } else {
        echo "Đăng kí thất bại";
    }
}

?>
