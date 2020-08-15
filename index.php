<?php
//echo "OK"; exit();
	include("lib_db.php");
	//echo "OK"; exit();
	//1.Lấy thông tin bản ghi top > 0 limit 1
	//1.1 Tạo SQL
	$topSql = "SELECT * FROM nghesi where id = 2 ";
	//1.1 Kiểm tra sql đúng không?
	//echo $topSql; exit();
	//1.2 Thự thi
	$data = select_one($topSql);
	//kiểm tra kết quả
	//print_r($data); exit();

	//print_r($dataLeft); exit();
	$slcoursel = "SELECT * FROM baihat limit 4";
	$slideSong = select_list($slcoursel);

	$slNgesi = "SELECT * FROM nghesi limit 5";
	$ngheSi = select_list($slNgesi);
	//print_r($ngheSi[0]["img"]);exit();


	$slNghegihomnay = "SELECT * FROM baihat limit 5";
	$ngheGiHomNay = select_list($slNghegihomnay);
	//print_r($ngheGiHomNay[0]["img_square"]);exit();



	$slAlbumhot = "SELECT * FROM baihat ORDER BY timecreate DESC limit 10";
	//echo $slAlbumhot ;exit();
	$albumHot = select_list($slAlbumhot);
	//print_r($albumHot);exit();

	$slAllnghesi = "SELECT id,name FROM nghesi ";
	//echo $slAllnghesi ;exit();
	$allNghesi = select_list($slAllnghesi);
	//print_r($allNghesi);exit();

	$nghesi0 = array();

	$slbaihat = "SELECT * FROM baihat limit 12";
	$baihat = select_list($slbaihat);
	//print_r($baihat);exit();

	$slbxhBaihat = "SELECT * FROM baihat ORDER BY luotnghetuan DESC limit 10";
	$bxhBaihat = select_list($slbxhBaihat);
	//print_r($bxhBaihat);exit();


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

	<script src="https://www.youtube.com/redirect?v=ylbWDYN_r0o&event=video_description&redir_token=QUFFLUhqbFJESWFJVHNoUGR2QkU2TmxFSElzM3MtR05SQXxBQ3Jtc0tsS01hekNMNHh6dDdjTU0xODl2X2tac3BOU1hDSldXSzk3aE9BR0QwNlR2YnZ2T0JSaUhVSnFQZnpIQVZRWERiY283T3V2VVNGQ2JvSmhfRkpvTDU5alh3VEktc2x6Zl9nS1RxUHdNMUNIWkVvQTY5OA%3D%3D&q=https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2Fjs-cookie%402%2Fsrc%2Fjs.cookie.min.js"></script>

	<script src="script.js" ></script>
 	<script src="login-logout.js" type="text/javascript"></script>
</head>
<script>
$(document).ready(function(){
	var x = document.getElementById("idBaihat");
	var time;
 	$("div.play-pause i:eq(0)").click(function(){
 		$("div.play-pause i:eq(0)").addClass("hideShowCase");
 		$("div.play-pause i:eq(1)").removeClass("hideShowCase");
 		x.play();
 		var duration = Math.floor(x.duration);
 		//alert(duration);
 		$("div.time-audio input").attr("max",duration);
 		//alert($("div.time-audio input").attr("max"));
 		time = setInterval(addTime, 1000);
 	})

 	function addTime() {
	  	var timeAdd = $("div.time-audio input[type=range]").val();
	  	//alert(timeAdd);
	  	var minute = Math.floor(parseInt(timeAdd)/60);
	  	var second = parseInt(timeAdd)%60;
	  	if(Math.floor(minute/10) == 0) {
	  		$("div.time-audio p span:eq(0)").text("0"+ minute);
	  	} else {
	  		$("div.time-audio p span:eq(0)").text(minute);
	  	}

	  	var second = parseInt(timeAdd)%60;
	  	if(Math.floor(second/10) == 0) {
	  		$("div.time-audio p span:eq(1)").text("0"+second);
	  	} else {
	  		$("div.time-audio p span:eq(1)").text(second);
	  	}
	  	timeAdd = parseInt(timeAdd) + 1;
 	 	$("div.time-audio input[type=range]").val(timeAdd);
	}

 	$("div.play-pause i:eq(1)").click(function(){
 		$("div.play-pause i:eq(1)").addClass("hideShowCase");
 		$("div.play-pause i:eq(0)").removeClass("hideShowCase");
 		x.pause();
 		clearInterval(time);
 	})
 	$("div.volume-audio").mouseenter(function(){
 		$("input",this).removeClass("hideShowCase")
 	})
 	$("div.volume-audio").mouseleave(function(){
 		$("input",this).addClass("hideShowCase")
 	})
 	$("div.volume-audio input").change(function(){
 		x.volume = $(this).val();
 		/*alert($(this).val());*/
 	})
 	$("div.time-audio input[type=range]").change(function(){
 		var timeAdd = $(this).val();
	  	//alert(timeAdd);
	  	var minute = Math.floor(parseInt(timeAdd)/60);
	  	var second = parseInt(timeAdd)%60;
	  	if(Math.floor(minute/10) == 0) {
	  		$("div.time-audio p span:eq(0)").text("0"+ minute);
	  	} else {
	  		$("div.time-audio p span:eq(0)").text(minute);
	  	}

	  	var second = parseInt(timeAdd)%60;
	  	if(Math.floor(second/10) == 0) {
	  		$("div.time-audio p span:eq(1)").text("0"+second);
	  	} else {
	  		$("div.time-audio p span:eq(1)").text(second);
	  	}
 	 	x.currentTime = parseInt(timeAdd);
 	})
 	$(".choose-song").click(function(){
 		clearInterval(time);
 		$("div.play-pause i:eq(0)").addClass("hideShowCase");
 		$("div.play-pause i:eq(1)").removeClass("hideShowCase");
 		var srcSong = $("source",this).attr("src");
 		var formData = new FormData();
	 	formData.append("id", srcSong);
	 	for (var value of formData.values()) {
		   console.log(value);
		}
		//console.log(formData.get("name"));
	    $.ajax({
                url: 'player.php', 
                method: "POST",
                data: formData,
                contentType: false,
                cache:false,
                processData:false,
                success: function (res) {
                	//alert("ket qua tra ve:" + res +":");
                	var obj = JSON.parse(res);
                	$("audio").html('<source src="' + obj[3] + '" type="audio/mpeg">');
                	$("div.play-music img").attr("src" , obj[2] );
                	$("div.play-music .singer-audio").text(obj[1]);
                	$("div.play-music .song-audio").text(obj[0]);
                	$("div.play-music").removeClass("hideShowCase");
			 		/*x = document.getElementById("idBaihat");
			 		$("div.play-music img").attr("src" , $("img",this).attr("src") );*/
			 		//x = new Audio(url);
			 		x.load();
			 		x.play();
			 		var duration = Math.floor(x.duration);
			 		//alert(duration);
			 		$("div.time-audio input").attr("max",duration);
			 		$("div.time-audio input[type=range]").val("0");
			 		//alert($("div.time-audio input").attr("max"));
			 		time = setInterval(addTime, 1000);
                }
            });
 	})
});

</script>
<body>

<!-- Modal -->
<div id="modalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng Nhập</h4>
      </div>
	<div class="modal-body">
	<form method="POST" id="formm-login">
	    <div class="form-group">
	      <label for="email">Tên Tài Khoản:</label>
	      <input type="text" class="form-control" placeholder="Tên Tài Khoản" name="username" id="txtTentaikhoan">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Mật Khẩu:</label>
	      <input type="password" class="form-control" placeholder="Mật Khẩu" name="password" id="txtMatkhau">
	    </div>
	    <div class="form-group form-check">
	      <label class="form-check-label">
	        <input class="form-check-input" type="checkbox" name="remember"> Remember me
	      </label>
	    </div>
	   
	</form>
	</div>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
    	 <button id="btnDangnhap" type="submit" class="btn btn-primary">Submit</button>
     </div>
  
    </div>
  </div>
</div>


<div id="modalRegister" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng Kí</h4>
      </div>
	<div class="modal-body">
	<form method="POST" id="form-register">
	    <div class="form-group">
	      <label for="email">Tên Tài Khoản:</label>
	      <input type="text" class="form-control" placeholder="Tên Tài Khoản" name="username" id="dkTentaikhoan">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Mật Khẩu:</label>
	      <input type="password" class="form-control" placeholder="Mật Khẩu" name="password" id="dkMatkhau">
	    </div>
	    <div class="form-group form-check">
	      <label class="form-check-label">
	        <input class="form-check-input" type="checkbox" name="remember"> Remember me
	      </label>
	    </div>
	   
	</form>
	</div>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
    	 <button id="btnDangki" type="submit" class="btn btn-primary">Submit</button>
     </div>
  
    </div>
  </div>
</div>



	<div class="container ">
		<nav class="navbar navbar-expand-sm bg-white  fixed-top clear_both">
		  <!-- Brand/logo -->
			<a class="navbar-brand nav-brand" href="index.php" style="margin-left: 40px !important">
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


			<ul id="menu-icon" class="navbar-nav ml-auto nav-icon">
				<?php if(!isset($_COOKIE['user'])){
				?>
				<li id="login" class="nav-item" >
				    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#" data-toggle="modal" data-target="#modalLogin">Đăng Nhập</a></li>
			      				<hr>
			      				<li><a href="#" data-toggle="modal" data-target="#modalRegister">Đăng Kí</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
			<?php } else {?>
				<li id="logined" class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-user-times"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="javascript:" id="btnDangxuat">Đăng Xuất</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
			<?php } ?>
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

	

	<div class="container-fluid margin_top">
		<div class="row">
		    <div class="col-lg-9 left">
		    	<div class="content-left">
		    		<div class="slide-default">
		    			<div class="group-slide">
		    				<div class="img-slide">
		    					<ul id="myList" >
		    						<li class="slide0 ">
			    						<a href="javascript:" class="choose-song" >
			    							<img src="<?php print_r($slideSong[0]["img"])?>" alt="Song">
			    							<source src="<?php echo $slideSong[0]["id"]?>" type="audio/mpeg">
		    							</a>
		    						</li>
		    					</ul>
		    				</div>
		    				<div class="img-choose">
		    					<ul class="img-choose-ul">
		    						<?php foreach ($slideSong as $item) {?>
									<li class="slide">
		    							<a href="javascript:" class="choose-song">
		    								<img src="<?php print_r($item["img"])?>" alt="Song">
		    								<source src="<?php echo $item['id']?>" type="audio/mpeg">
		    							</a>
		    						</li>
									<?php } ?>


		    						
		    					</ul>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="ngheGiHomNay">
		    			<div>
		    				<h2>
		    					<a href="#">NGHE GÌ HÔM NAY ></a>
		    				</h2>
							
						
		    				<ul>
		    					<?php foreach ($ngheGiHomNay as $item) {?>
		    					<li>
		    						<div class="box-main" >
		    							<a href="javascript:" class="choose-song">
		    								
		    								<div class="bg_action_info" style="position: absolute;">
		    									<span class="view_listen">
		    										<span class="icon_listen"  >
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number"><?php echo ($item["luotnghe"]);?></span>
		    									</span>
		    									<span class="icon_play hideShowCase">
		    										<i class="far fa-play-circle fa-3x"></i>
		    									</span>
		    								</div>
		    								<img src="<?php echo ($item["img_square"]);?>" alt="">
		    								<source src="<?php echo $item['id']?>" type="audio/mpeg" >
		    							</a>
		    						</div>
		    						<div class="infor">
									
		    							<a href="#"><?php echo $item["name"]?></a>
		    						</div>
		    					</li>
								<?php } ?>
		    				</ul> 
		    			</div>
		    		</div>

		    		<div class="albumHot">
		    			<div>
		    				<h2>
		    					<a href="#">MỚI PHÁT HÀNH ></a>
		    				</h2>
		    				<ul>
		    					<?php foreach ($albumHot as $item) {?>
					
				
		    					<li>
		    						<div class="box-main" >
		    							<a href="javascript:" class="choose-song">
		    								
		    								<div class="bg_action_info" style="position: absolute;">
		    									<span class="view_listen">
		    										<span class="icon_listen"  >
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number"><?php echo $item["luotnghe"];?></span>
		    									</span>
		    									<span class="icon_play hideShowCase">
		    										<i class="far fa-play-circle fa-3x"></i>
		    									</span>
		    								</div>
		    								<img src="<?php echo $item["img_square"];?>" alt="">
		    								<source src="<?php echo $item['id']?>" type="audio/mpeg">
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#"><?php echo $item["name"];?></a>
		    							<h4><?php 
		    								$nghesi0 = explode( "," , $item["idNghesi"]);
											    foreach($nghesi0 as $y ) {?>

											    	<?php foreach($allNghesi as $z ){?>
											  			<?php if( $z["id"] == $y ) {?>
											  				<a href="#"><?php echo $z["name"]?></a>, 
											  			<?php } ?>
											  		<?php } ?>

												<?php } ?>
		    							</h4>
		    						</div>
		    					</li>
		    					<?php } ?>
		    					
		    				</ul>
		    			</div>
		    		</div>

		    		<div class="mvHot">
		    			<div>
		    				<h2>
		    					<a href="#">MV HOT ></a>
		    				</h2>
		    				<ul>
		    					<li class="mvLi">
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Khác Biệt To Lớn</a>
		    							<h4>
		    								<a href="#">Trịnh Thăng Bình</a>,
		    								<a href="#">Liz Kim Cương</a>
		    							</h4>
		    						</div>
		    					</li>
		    					<li class="mvLi">
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Em Không Sai Chúng Ta Sai</a>
		    							<h4>
		    								<a href="#">Erik</a>,
		    								
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Đi Cùng Em</a>
		    							<h4>
		    								<a href="#">Minh Vương M4U</a>,
		    								<a href="#">Lemon Climb</a>
											<a href="#">ACV</a>
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Cho Anh Say</a>
		    							<h4>
		    								<a href="#">Phạm Duy Anh</a>,
		    								<a href="#">ACV</a>
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Thích Thì Đến </a>
		    							<h4>
		    								<a href="#">Lê Bảo Bình</a>,
		    								
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Anh Kết Em Rồi</a>
		    							<h4>
		    								<a href="#">Hồng Thanh</a>,
		    								<a href="#">Dj Mie</a>
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Cứ Thế Rời Đi</a>
		    							<h4>
		    								<a href="#">Yến Tatto</a>,
		    								<a href="#">Great</a>
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Đừng Thương</a>
		    							<h4>
		    								<a href="#">Datkaa</a>,
		    								
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Tình Sầu Thiên Thu Muôn Lối</a>
		    							<h4>
		    								<a href="#">Doãn Hiếu</a>,
		    								
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">52.990</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Tình Anh</a>
		    							<h4>
		    								<a href="#">Đình Dũng</a>,
		    								<a href="#">ACV</a>
		    							</h4>
		    						</div>
		    					</li>

		    				</ul>
		    			</div>
		    		</div>

					<div class="baiHat"> 
						<div>
		    				<h2>
		    					<a href="#">BÀI HÁT ></a>
		    				</h2>
		    				<ul>
		    					<?php foreach ($baihat as $item) {?>
									<li>
		    						<div class="baihat">
										<a class="thumbnail_baihat choose-song" href="javascript:" >
											<span class="play"><i class="fas fa-play " style="color: #fff"></i></span>
											<img src="<?php echo $item["img_square"]?>" alt="">
											<source src="<?php echo $item['id']?>" type="audio/mpeg">
										</a>
										<div class="infor_data_mv" >
											<h3><a href="javascript:" class="choose-song"><source src="<?php echo $item['id']?>" type="audio/mpeg"><?php echo $item["name"]?></a></h3>
											<h4><?php 
		    								$nghesi0 = explode( "," , $item["idNghesi"]);
											    foreach($nghesi0 as $y ) {?>

											    	<?php foreach($allNghesi as $z ){?>
											  			<?php if( $z["id"] == $y ) {?>
											  				<a href="#"><?php echo $z["name"]?></a>, 
											  			<?php } ?>
											  		<?php } ?>

												<?php } ?>
		    								</h4>		
										</div>
										<span class="view_listen" style="">
		    								<span class="icon_listen"> 			
		    									<i class="fas fa-headphones"></i>
		    								</span>
		    								<span class="viewed_number"><?php echo $item["luotnghe"]?></span>
		    							</span>
		    						</div>
								</li>
								<?php } ?>	
		    				</ul>
		    			</div>
					</div>
		    		
		    		
		    		<div class="karaoke">
		    			<div>
		    				<h2>
		    					<a href="#">KARAOKE ></a>
		    				</h2>
		    				<ul>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number"></span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">Buồn Làm Chi Em Ơi</a>
		    							<h4>
		    								<a href="#">Hoài Lâm</a>,
		    								
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number">10.000</span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						
		    					</li>

		    				</ul>
		    			</div>
		    		</div>
		    		<div class="giaitri">
		    			<div>
		    				<h2>
		    					<a href="#">GIẢI TRÍ ></a>
		    				</h2>
		    				<ul>
		    					<li>
		    						<dliv class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number"></span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						<div class="infor">
		    							<a href="#">15 Ca Khúc Trẻ Hot Nhất Tuần</a>
		    							<h4>
		    								<a href="#">K-ICM</a>,
		    								<a href="#">Xesi</a>
		    							</h4>
		    						</div>
		    					</li>
		    					<li>
		    						<div class="box-main">
		    							<a href="#">
		    								<div class="bg_action_info">
		    									<span class="view_listen">
		    										<span class="icon_listen">
		    											<i class="fas fa-headphones"></i>
		    										</span>
		    										<span class="viewed_number"></span>
		    									</span>
		    									<!--<span class="icon_play">
		    										<i class="far fa-play-circle"></i>
		    									</span>-->
		    								</div>
		    								<!--<span class="avatar">
		    									<img src="images/item.jpg" alt="">
		    								</span>-->
		    							</a>
		    						</div>
		    						
		    					</li>

		    				</ul>
		    			</div>
		    		</div>
		    	</div>
		    </div>

		    <div class="col-lg-3 right">
		    	<div class="nghe-si">
		    		<ul class="image-nghe-si">
		    			<li>
			    			<a href="#">
			    			<img src="<?php print_r($ngheSi[4]["img"]); ?>" alt="Bích Phương">
			    			</a>
		    			</li>
		    		</ul>
		    		<div style="text-align: center; color: rgba(0,0,0,.5); font-size: 14px;">Top Nghệ Sĩ Trending Trong Tuần</div>
		    		<div class="name-nghe-si"><a href="#">
		    			<p><?php print_r($ngheSi[0]["name"]); ?></p></a></div>
		    		<div class="trendNgheSi">
		    			<ul>
		    				<?php foreach ($ngheSi as $item) {?>
								<li ><a href="javascript:">
		    					<img src="<?php print_r($item["img"]); ?>" alt="<?php print_r($item["name"]); ?>">
		    				</a></li>
							<?php } ?>
		    			</ul>
		    		</div>
		    	</div>
				
				<div class="goi-y">
					<a href="#">
						<div >
							<div class="content_playlist">
	                        <h2 style="font-size: 16px; color: #fff">GỢI Ý DÀNH CHO BẠN</h2>        
	                        <p class="text_detail" style="font-size: 14px;">Thưởng thức những ca khúc phù hợp nhất với bạn</p>
	                            <p class="btn_playlist">
	                                <span class="ic_play_normal"><i class="fas fa-play" style="color: #2daaed;text-shadow: none;"></i></span>
	                                <span class="btn_text" style="color: #2daaed">Nghe bài hát</span>
	                            </p>
	                    	</div>
						</div>
					</a>
				</div>
				<div class="chu-de-hot">
					<div>
						<h3>
							<a href="#" title="Chủ Đề Hot">CHỦ ĐỀ HOT ></a>
						</h3>
					</div>
					<ul>
						<li class="topic-hot" style="margin-top: 0px;">
							<a href="#"><img src="images/remix.jpg" alt=""></a>
						</li>
						<li class="topic-hot">
							<a href="#"><img src="images/summer.jpg" alt=""></a>
						</li>
						<li class="topic-hot">
							<a href="#"><img src="images/party.jpg" alt=""></a>
						</li>
						<li class="topic-hot">
							<a href="#"><img src="images/lamviec.jpg" alt=""></a>
						</li>
					</ul>
				</div>
				<div class="box_chart_music">
					<h3 >
						<a href="#" style="color: #2daaed;">BXH BÀI HÁT <i class="far fa-play-circle" style="text-shadow: none;color: gray;"></i></a>
					</h3>
					<ul class="chart-choose">
						<li style="
						"><a class="active" href="javascript:;" >Việt Nam</a></li>
						<li ><a href="javascript:;" >Âu Mỹ</a></li>
						<li style=""><a href="javascript:;" >Hàn Quốc</a></li>	
					</ul>
					<div class="list-chart-music">
						<ul class="">
							<li class="one">
								<div class="infor_data">
									<a href="">
										<span>1</span>
										<img src="<?php echo $bxhBaihat[0]["img_square"]?>" alt="">
									</a>
									<div class="infor_data_song">
										<h3><a href=""><?php echo $bxhBaihat[0]["name"]?></a></h3>
										<h4><?php 
		    								$nghesi0 = explode( "," , $bxhBaihat[0]["idNghesi"]);
											    foreach($nghesi0 as $y ) {?>

											    	<?php foreach($allNghesi as $z ){?>
											  			<?php if( $z["id"] == $y ) {?>
											  				<a href="#"><?php echo $z["name"]?></a>, 
											  			<?php } ?>
											  		<?php } ?>

												<?php } ?>
											</h4>
									</div>
								</div>
							</li>

							<?php for ($index = 1; $index < 10; $index++) {?>
								<li class="two">
								<div>
									<?php if($index+1 ==2 ) {?>
										<span style="color: #1abc9c">
											<?php echo $index+1?>
										</span>
									<?php }elseif ($index+1 ==3 ) {?>
										<span style="color: #f39c12">
											<?php echo $index+1?>
										</span>
									<?php } else {?>
										<span style="color: #7a7a7a;">
											<?php echo $index+1?>
										</span>
									<?php }?>
									<div class="infor_data_song">
										<h3><a href=""><?php echo $bxhBaihat[$index]["name"]?></a></h3>
										<h4><?php 
		    								$nghesi0 = explode( "," , $bxhBaihat[$index]["idNghesi"]);
											    foreach($nghesi0 as $y ) {?>

											    	<?php foreach($allNghesi as $z ){?>
											  			<?php if( $z["id"] == $y ) {?>
											  				<a href="#"><?php echo $z["name"]?></a>, 
											  			<?php } ?>
											  		<?php } ?>

												<?php } ?>
										</h4>
									</div>
								</div>
							</li>
							<?php }?>
						</ul>


						<ul class="hideShowCase">
							<li class="one">
								<div class="infor_data">
									<a href="">
										<span>1</span>
										<img src="images/sour_candy.jpg" alt="">
									</a>
									<div class="infor_data_song">
										<h3><a href="">How You Like That</a></h3>
										<h4><a href="">BlackPink</a></h4>
									</div>
								</div>
							</li>
							<li class="two">
								<div>
									<span style="color: #1abc9c">2</span>
									<div class="infor_data_song">
										<h3><a href="">Hoa Nở Không Màu</a></h3>
										<h4><a href="">Hoài Lâm</a>
										</h4>
									</div>
								</div>
							</li>
							
						</ul>	
					</div>
				</div>
				<div class="box_chart_mv">
					<h3 >
						<a href="#" style="color: #2daaed;">BXH MV <i class="far fa-play-circle" style="color: gray;text-shadow: none;"></i></a>
					</h3>
					<ul class="chart-choose">
						<li style="
						"><a class="active" href="javascript:;" >Việt Nam</a></li>
						<li ><a href="javascript:;" >Âu Mỹ</a></li>
						<li style=""><a href="javascript:;" >Hàn Quốc</a></li>	
					</ul>
					<div class="list-chart-mv">
						<ul class="hideShowCase">
							<li class="one">
								<div class="infor_mv">
									<a href="#">
										<span  style="">1</span>
										<span id="play"><i class="fas fa-play fa-2x" style="color: #fff"></i></span>
										<img src="images/anh_muon_noi_voi_em.jpg" alt="">
									</a>
									<div class="name_video">
										<h3><a href="#">Muốn Nói Với Em</a></h3>
										<h4><a href="#">T Team</a></h4>
									</div>
								</div>
								
							</li>
							
						</ul>


						<ul class="hideShowCase">
							<li class="one">
								<div class="infor_mv">
									<a href="#">
										<span  style="">1</span>
										<span id="play"><i class="fas fa-play fa-2x" style="color: #fff"></i></span>
										<img src="images/lady_gaga.jpg" alt="">
									</a>
									<div class="name_video">
										<h3><a href="#">Muốn Nói Với Em</a></h3>
										<h4><a href="#">T Team</a></h4>
									</div>
								</div>
							</li>
							<li>
								<div>
									<a class="thumbnail_small" href="#">
										<span style="color: #1abc9c"></span>
										<span class="play"><i class="fas fa-play " style="color: #fff"></i></span>
										<img src="images/isaac.jpg" alt="">
									</a>
									<div class="infor_data_mv">
										<h3><a href="">How You Like That</a></h3>
										<h4><a href="">BlackPink</a>		</h4>
									</div>
								</div>
							</li>
							
						</ul>

						<ul class="">
							<li class="one">
								<div class="infor_mv">
									<a href="#">
										<span  style="">1</span>
										<span id="play"><i class="fas fa-play fa-2x" style="color: #fff"></i></span>
										<img src="images/jenny.jpg" alt="">
									</a>
									<div class="name_video">
										<h3><a href="#">Muốn Nói Với Em</a></h3>
										<h4><a href="#">T Team</a></h4>
									</div>
								</div>
							</li>
							
						</ul>	
					</div>
				</div>
				<div class="top_100_song">
					<div class="top100_head">
						<div>
						<a href="#"><img src="images/logo.png" alt=""></a>
						</div>
						<div>
						<a href="#">TOP 100 BÀI HÁT</a>
						</div>
						<div class="flower" style="width: 63px;"><img src="images/flower.png" alt=""></div>
					</div>
					<div class="top100_content">
						<ul>
							<li>
								<a href="javascript:">
									<img src="images/top100_korean.jpg" alt="">
									<span><i class="fas fa-play" style="color: #fff"></i></span>
								</a>
								<div><a href="" style="font-size: 16px;">Top 100 Nhạc Âu Mỹ</a></div>
							</li>
							<li>
								<a href="javascript:">
									<img src="images/top100_bluejazz.jpg" alt="">
									<span><i class="fas fa-play" style="color: #fff"></i></span>
								</a>
								<div><a href="" style="font-size: 16px;">Top 100 Nhạc Trẻ</a></div>
							</li>
							<li>
								<a href="javascript:">
									<img src="images/top100_country.jpg" alt="">
									<span><i class="fas fa-play" style="color: #fff"></i></span>
								</a>
								<div><a href="" style="font-size: 16px;">Top 100 Nhạc Việt</a></div>
							</li>
							<li>
								<a href="javascript:">
									<img src="images/top100_nhackhongloi.jpg" alt="">
									<span><i class="fas fa-play" style="color: #fff"></i></span>
								</a>
								<div><a href="" style="font-size: 16px;">Top 100 Nhạc Trữ Tình</a></div>
							</li>
							<li>
								<a href="javascript:">
									<img src="images/top100_nhactrutinh.jpg" alt="">
									<span><i class="fas fa-play" style="color: #fff"></i></span>
								</a>
								<div><a href="" style="font-size: 16px;">Top 100 Rap Việt</a></div>
							</li>
						</ul>
						<div><a href="">Xem tất cả TOP 100</a></div>
					</div>
				</div>
				
				<div class="play-music  hideShowCase" style="">
					<img src="images/top100_nhactrutinh.jpg" alt="">
					<div class="song-audio">How You Like That</div>
					<div class="singer-audio">Black Pink</div>


					<div class="play-control">

						<div class="prior-song"><i class="fas fa-step-backward"></i></div>

						<div class="play-pause">
							<i class="fas fa-play fa-2x hideShowCase"></i>
							<i class="fas fa-pause fa-2x "></i>
						</div>

						<div class="next-song"><i class="fas fa-step-forward"></i></div>
					</div>


					<div class="time-audio">
						<input type="range" id="time-audio" name="points" min="0" step="1" value="0">
						<p><span style="color: black;">00</span>:<span style="color: black;">00</span></p>
					</div>

					<div class="volume-audio">
						<i class="fas fa-volume-up"></i><input class="hideShowCase" type="range" id="volume-audio" name="points" min="0" max="1" step="0.05">
					</div>

					<div>

						<audio id="idBaihat"controls class="hideShowCase">
						 <!--  <source src="audio/HoaNoKhongMau_HoaiLam.mp3" type="audio/mpeg"> -->
						</audio>
					</div>
				</div>
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
