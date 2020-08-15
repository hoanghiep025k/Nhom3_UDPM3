<?php 
	 //setcookie("user", "", time() - (3600), "/");
 if (isset($_COOKIE['user']))
        {
        	$user_ = $_COOKIE['vaitro'];
        } else
        {
        	$user_ = "khong co cookie!";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NhacCuaTui- Nghe nhac</title>
  <link rel="icon" type="image/png" href="images/logo1.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style_public.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


	<script src="script.js"></script>

 
</head>
<script type="text/javascript">
$(document).ready(function()
{
	$url = "http://localhost/cnweb/public/index.php";
    var submit = $("button[type='submit']");
     
    // bắt sự kiện click vào nút Login
    submit.click(function()
    {
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
         
        // Kiểm tra đã nhập tên tài khoản chưa
        if (username == '') {
            alert('Vui lòng nhập tài khoản');
            return false;
        }
         
        // Kiểm tra đã nhập mật khẩu chưa
        if (password == '') {
            alert('Vui lòng nhập mật khẩu');
            return false;
        }
         
        // Lấy tất cả dữ liệu trong form login
        var data = $('form#form-login').serialize();
        // Sử dụng $.ajax()
        $.ajax({
        type : 'post', //kiểu post
        url  : 'submit.php', //gửi dữ liệu sang trang submit.php
        dataType : "text",
        data : data,
        success :  function(result)
               {
                    if (result == 'false')
                    {
                        alert('Sai tên đăng nhập hoặc mật khẩu');
                    } else {
                         $('#content').html(result);
                        // window.location.replace($url);  
                    }
               }
        });
        return false;
    });
});
</script>
<body>
	<div class="container ">
		<nav class="navbar navbar-expand-sm bg-white  fixed-top clear_both">
		  <!-- Brand/logo -->
			<a class="navbar-brand nav-brand" href="#" style="margin-left: 40px !important">
			    <img src="images/ic_bigo_talent.png" alt="logo" style="max-width: 100%;height: 30px">
			</a>
			  <!-- Links -->
			<ul id="navmenu" class="navbar-nav ">
			    <li class="nav-item">
			      <a class="nav-link" href="#">Bài Hát</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Việt Nam</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Rap Việt</a></li>
			      				<li><a href="#">Tiền Chiến</a></li>
			      				<li><a href="#">Nhạc Trịnh</a></li>
			      				<li><a href="#">Rock Việt</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Âu Mỹ</b></a></li>
			      				<li><a href="#">Top</a></li>
			      				<li><a href="#">Rock</a></li>
			      				<li><a href="#">Electronica</a>/Dance</li>
			      				<li><a href="#">R&B/Rap</a></li>
			      				<li><a href="#">Blues/Jazz</a></li>
			      				<li><a href="#">Country</a></li>
			      				<li><a href="#">Latin</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Châu Á</b></a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Thái</a></li>
			      				<li><a href="#">Nhạc Nhật</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khác</b></a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      				<li><a href="#">Beat</a></li>
			      				<li><a href="#">Khác</a></li>
			      				<li><a href="#">Tui Hát</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Playlist</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Việt Nam</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Rap Việt</a></li>
			      				<li><a href="#">Tiền Chiến</a></li>
			      				<li><a href="#">Nhạc Trịnh</a></li>
			      				<li><a href="#">Rock Việt</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Âu Mỹ</b></a></li>
			      				<li><a href="#">Top</a></li>
			      				<li><a href="#">Rock</a></li>
			      				<li><a href="#">Electronica</a>/Dance</li>
			      				<li><a href="#">R&B/Rap</a></li>
			      				<li><a href="#">Blues/Jazz</a></li>
			      				<li><a href="#">Country</a></li>
			      				<li><a href="#">Latin</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Châu Á</b></a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Thái</a></li>
			      				<li><a href="#">Nhạc Nhật</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khác</b></a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      				<li><a href="#">Beat</a></li>
			      				<li><a href="#">Khác</a></li>
			      				<li><a href="#">Tui Hát</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Tuyển Tập</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Thể Loại</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">SoundTrack</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      				
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Tâm Trạng</b></a></li>
			      				<li><a href="#">Buồn</a></li>
			      				<li><a href="#">Hưng Phần</a></li>
			      				<li><a href="#">Thất Tình</a></li>
			      				<li><a href="#">Nhạy Cảm</a></li>
			      				<li><a href="#">Nhẹ Nhàng</a></li>
			      				<li><a href="#">Nhớ Nhung</a></li>
			      				<li><a href="#">Vui Vẻ</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khung Cảnh</b></a></li>
			      				<li><a href="#">Cafe</a></li>
			      				<li><a href="#">Bar - Club</a></li>
			      				<li><a href="#">Phòng Trà</a></li>
			      				<li><a href="#">Tắm - Bơi Lội</a></li>
			      				<li><a href="#">Gym</a></li>
			      				<li><a href="#">Lãng Mạn</a></li>
			      				<li><a href="#">Mưa</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Chủ Đề</b></a></li>
			      				<li><a href="#">Tình Yêu</a></li>
			      				<li><a href="#">Top 100</a></li>
			      				<li><a href="#">Weekend</a></li>
			      				<li><a href="#">Chill Out</a></li>
			      				<li><a href="#">Bất Hủ</a></li>
			      				<li><a href="#">Song Ca</a></li>
			      				<li><a href="#">Mashup</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Video</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Việt Nam</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Cách Mạng</a></li>
			      				<li><a href="#">Rap Việt</a></li>
			      				<li><a href="#">Rock Việt</a></li>
			      				
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Âu Mỹ</b></a></li>
			      				<li><a href="#">Top</a></li>
			      				<li><a href="#">Rock</a></li>
			      				<li><a href="#">Electronica</a>/Dance</li>
			      				<li><a href="#">R&B/Rap</a></li>
			      				<li><a href="#">Blues/Jazz</a></li>
			      				<li><a href="#">Country</a></li>
			      				<li><a href="#">Latin</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Châu Á</b></a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Thái</a></li>
			      				<li><a href="#">Nhạc Nhật</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>KARAOKE</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Cách Mạng</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Âu Mỹ</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khác</b></a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Clip Vui</a></li>
			      				<li><a href="#">Hài Kịch</a></li>
			      				<li><a href="#">Giải Trí Khác</a></li>
			      				<li><a href="#">Thể Loại Khác</a></li>
			      				<li><a href="#">Phim Việt Nam</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">BXH</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Việt Nam</a></li>
			      				<li><a href="#">Âu Mỹ</a></li>
			      				<li><a href="#">Hàn Quốc</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Chủ Đề</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Hôm Nay Nghe Gì</a></li>
			      				<li><a href="#">Tình Yêu</a></li>
			      				<li><a href="#">Bất Hủ Âu Mỹ</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Cover & Mashup</a></li>
			      				<li><a href="#">Wedding</a></li>
			      				<li><a href="#">Nhạc Thiếu Nhi</a></li>
			      				
			      			</ul>
			      			<ul>
			      				<li><a href="#">Chill Out</a></li>
			      				<li><a href="#">Hot</a></li>
			      				<li><a href="#">EDM</a></li>
			      				<li><a href="#">Nhạc Hoa Lời Việt</a></li>
			      				<li><a href="#">Coffe Time</a></li>
			      				<li><a href="#">Nhạc Phim</a></li>
			      				<li><a href="#">Nhạc Buồn</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#">Accoustic</a></li>
			      				<li><a href="#">Hải Ngoại</a></li>
			      				<li><a href="#">Nhạc Bất Hủ Việt</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Gym</a></li>
			      				<li><a href="#">Bolero</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Top 100</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Việt Nam</a></li>
			      				<li><a href="#">Âu Mỹ</a></li>
			      				<li><a href="#">Châu Á</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
				

			    <li class="nav-item">
			      <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Nghệ Sĩ</a></li>
			      				<li><a href="#">Khám Phá</a></li>
			      				<li><a href="#">Sự Kiện - TV</a></li>
			      				<li><a href="#">Tin Tức Âm Nhạc</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			</ul>
			

			
			<span id="sidenavid"class="hideShowCase"><i class="fas fa-list-ul"></i></span>


			<ul class="navbar-nav ml-auto nav-icon">
				<li class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Đăng Nhập</a></li>
			      				<hr>
			      				<li><a href="#">Đăng Kí</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#" style="color: #fab905 !important"><i class="fas fa-crown"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Giới Thiệu</a></li>
			      				<hr>
			      				<li><a href="#">Mua NhacCuaTui VIP</a></li>
			      				<hr>
			      				<li><a href="#">Thông Tin Thanh Toán</a></li>
			      				<hr>
			      				<li><a href="#">Tin Tức VIP</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-headphones"></i></a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-cloud-upload-alt"></i></a>
				</li>
			</ul>
			<form class="form-inline ml-auto  " action="/action_page.php">
			    <div class="input-group">
			      <input type="text" class="form-control" placeholder="Tìm bài hát, video, ca sĩ">
			      <div class="input-group-prepend">
			        <span class="input-group-text"><i class="fas fa-search"></i></span>
			      </div>
			    </div>
			</form>
		</nav>
		
	</div>

	

	<div class="container-fluid margin_top" style="height: 1000px;width: 100%;background-color: #black;">
		<div class="row">
		    <div class="col-lg-9 left">
		    	<form method="POST" id="form-login">
				    <div class="form-group">
				      <label for="email">Tên Đăng Nhập:</label>
				      <input type="text" class="form-control" id="email" placeholder="Enter email" name="username">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Mật Khẩu:</label>
				      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="password">
				    </div>
				    <div class="checkbox">
				      <label><input type="checkbox" name="remember"> Remember me</label>
				    </div>
				    <button type="submit" class="btn btn-default">Submit</button>
				  </form>
		    </div>

		    <div class="col-lg-3 right">
		    	<p id="content">du lieu ra o day</p>
		    	<h1><?php echo $user_?></h1>
		    </div>

		    
	 </div>
	</div>
  




	<div class="footer">
	  <div class="container-footer">
	  	<ul>
	  		<li><i class="fas fa-map-marker-alt"></i>Tòa nhà HAGL Safomec, 7/1 Thành Thái,P14,Q10,Tp.HCM</li>
	  		<li><i class="fas fa-envelope"></i>support@nct.vn</li>
	  		<li><i class="fas fa-phone-alt"></i>(028)38687979</li>
	  		<li style="float: right; padding-right: 20px;"><i class="far fa-copyright"></i> NCT Corp.All rights reserved</li>
	  	</ul>
	  </div>
	</div>

</body>
</html>
