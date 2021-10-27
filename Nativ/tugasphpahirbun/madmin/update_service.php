

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Barber Admin</title>
    <link rel="icon" type="images/png" href="../img/logo.png">
    <link href="../lumino/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lumino/css/font-awesome.min.css" rel="stylesheet">
    <link href="../lumino/css/datepicker3.css" rel="stylesheet">
    <link href="../lumino/css/styles.css" rel="stylesheet">


    <!-- datatable -->
    <link rel="stylesheet" href="../datatables-bs4/css/dataTables.bootstrap4.css">

    
    <!--Custom Font-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
        <?php 
        session_start();
     
        // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['level']==""){
            header("location:index.php?pesan=gagal");
        }
    ?>

    <?php
        include '../koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi,"SELECT * FROM service WHERE id=$id");
        $row = mysqli_fetch_array($data);
    ?>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Barber</span>Admin</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="../img/logo.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li> <a href="menu_admin.php">Setting User</a></li>
            <li class="active"><a href="data_service.php">Data Service</a></li>
            <li><a href="data_galeri.php">Data Galeri</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!-- <div class="container"> -->
            <div class="card " style="width: 100%; padding-left: 50px; padding-right: 50px; padding-top: 10rem">
                <div class="card-header">
                    <h1 class="text-center">Edit Service</h1>
                </div>
                <div class="card-body">
                    
    <form action="proses_update_service.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label" for="nama">Nama</label>
            <div class="col-lg-10">
                <input id="nama" type="text" class="form-control" name="nama" required autocomplete="nama" placeholder="Masukkan Nama" value="<?php echo $row['nama']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label">Keterangan</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="keterangan"><?php echo $row['keterangan']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-2 col-form-label form-control-label" for="foto">Foto</label>
            <div class="col-lg-10">
                <div class="custom-file">
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Pilih Foto">
                </div>
            </div>
        </div>
        <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="reset" class="btn btn-danger waves-effect waves-light m-1" value="Reset">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SIMPAN</button>
            </div>
        </div>
    </form>
                </div>
            <!-- </div> -->
        </div>
    </div>  <!--/.main-->
    
    <script src="../lumino/js/jquery-1.11.1.min.js"></script>
    <script src="../lumino/js/bootstrap.min.js"></script>
    <script src="../lumino/js/chart.min.js"></script>
    <script src="../lumino/js/chart-data.js"></script>
    <script src="../lumino/js/easypiechart.js"></script>
    <script src="../lumino/js/easypiechart-data.js"></script>
    <script src="../lumino/js/bootstrap-datepicker.js"></script>
    <script src="../lumino/js/custom.js"></script>
    <!-- datatable -->
    <script src="../datatables/jquery.dataTables.js"></script>
    <script src="../datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
        responsive: true,
        scaleLineColor: "rgba(0,0,0,.2)",
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleFontColor: "#c5c7cc"
        });
    };
    </script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
</script>
        
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>