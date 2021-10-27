<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Barber Shop</title>
	<link rel="icon" type="images/png" href="img/logo.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar fixed-top navbar-expand-lg">
		  <a class="navbar-brand" href="#">
		  	<img src="img/logo.png" alt="">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php" style="margin-top: 15px">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="service.php" style="margin-top: 15px">Service</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="about.php" style="margin-top: 15px">About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="contact.php" style="margin-top: 15px">Contact <span class="sr-only">(current)</span></a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" href="galeri.php" style="margin-top: 15px">Galery</a>
		      </li>
		      <li class="nav-item">
		        <a href="#" class="popup-login" data-toggle="modal" data-target="#loginModal">login</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h1 class="text">Modern Barber Shop in Malang City</h1>
				<p class="jl">Jalan Galunggung No.53 Malang</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="about_area ">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-8 col-lg-8 col-md-8">
						<h3>About Us</h3>
						<p>Hal pertama yang membedakan barbershop dengan pangkas rambut tradisional yaitu dilihat dari segi fasilitas yang disediakan. Jika kamu masuk ke ruangan barbershop kamu akan menemukan berbagai alat pangkas rambut yang lengkap dan modern, berbagai cream rambut, perlengkapan perawatan rambut, seperti alat untuk creambath, cat rambut, hingga tattoo rambut. Serta dilengkapi dengan fasilitas tambahan yang membuat pelanggan nyaman seperti AC atau Wifi gratis.</p>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-6">
					<h1>Opening Hour <span>10:00 am - 10:00 pm</span></h1>
				</div>
			</div>
		</div>
	</div>


	<footer>
		<div class="copy-right_text">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<p class="copy_right text-center">
							<p>
							Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Bunayya Wahyu
							</p>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="loginModal" role="dialog" tabindex="-1" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
      	<!-- <form action="proses.php" type="POST"> -->
	      <div class="modal-body">
	        	<?php include('formlogin.php');  ?>
	      </div>
        <!-- </form> -->
	    </div>
	  </div>
	</div>
	<!-- bootstrap -->
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<!-- jquery -->
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
</body>
</html>