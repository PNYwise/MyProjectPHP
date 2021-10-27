

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
            <li><a href="menu_user.php">Data Service</a></li>
            <li class="active"><a href="data_galeri.php">Data Galeri</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!-- <div class="container"> -->
            <div class="card" style="margin-top: 5rem;">
                <div class="card-header">
                    <h1 class="text-center">Data Service</h1>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th><a class="btn btn-success" href="#" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-plus"></i> Tambah</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include '../koneksi.php';
                                $data = mysqli_query($koneksi,"SELECT * FROM galeri");
                                $no=1;
                                while($row=mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['judul'] ?></td>
                                <td  width="50%"><img src="<?php echo '../foto/'.$row['foto']; ?>" width="21%"></td>
                                <td>
                                    <a class="btn btn-danger" href="delete_galeri.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"> Delete</i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <!-- </div> -->
        </div>
    </div>  <!--/.main-->
    <div class="modal fade" id="tambahuser" role="dialog" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title text-center">Tambah User</h4>
          </div>
        <!-- <form action="proses.php" type="POST"> -->
          <div class="modal-body">
                <?php include('tambahgaleri.php');  ?>
          </div>
        <!-- </form> -->
        </div>
      </div>
    </div>

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
          "responsive": true, "lengthChange": false, "autoWidth": true,"searching": true,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "responsive": true,
        });
      });
</script>
        
</body>
</html>

    
