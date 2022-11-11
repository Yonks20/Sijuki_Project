<?php

//index.php


$connect = new PDO("mysql:host=localhost; dbname=kinerjapegawai", "root", "");

$query = "
SELECT divisi FROM tb_divisi
ORDER BY divisi ASC
";

$result = $connect->query($query);

$data = array();

foreach($result as $row)
{
    $data[] = array(
        'label'     =>  $row['divisi'],
        'value'     =>  $row['divisi']
    );
}


?>


<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

  //jika button simpan diklik
  if(isset($_POST['btn-simpan'])){
    if(isset($_GET['hal']) == "edit"){

          $edit = mysqli_query($koneksi, "UPDATE tb_data2 SET
          deskripsi2 = '$_POST[tdeskripsi]',
          usulan_deskripsi2 = '$_POST[tusulan_deskripsi]',
          definisi2 = '$_POST[tdefinisi]',
          tujuan2 = '$_POST[ttujuan]',
          satuan2 = '$_POST[tsatuan]',
          kategori_satuan2 = '$_POST[tkategori]',
          formula2 = '$_POST[tformula]',
          sumber_target2 = '$_POST[tsumber]',
          tipe_kpi2 = '$_POST[ttipe]',
          tipe_target2 = '$_POST[ttarget]',
          frekuensi2 = '$_POST[tfrekuensi]',
          polaritas2 = '$_POST[tpolaritas]',
          divisi2 = '$_POST[tdivisi]',
          pemilik2 = '$_POST[tpemilik]',
          eviden2 = '$_POST[teviden]',
          syarat_ketentuan2 = '$_POST[tsyarat]',
          kpi_parent2 = '$_POST[tparent]'
          WHERE id_data2 = '$_GET[id]'
          ");


          if($edit){
            echo "<script>
              alert('Data berhasil edit!');
              document.location='juknis-admin.php'
            </script>";
          }
          else{
            echo "<script>
              alert('Data gagal edit!');
              document.location='juknis-admin.php'
            </script>";
          }
    }
    //Data akan disimpan

    else{
      $simpan = mysqli_query($koneksi, "INSERT INTO tb_data (id_data,deskripsi,usulan_deskripsi,definisi,tujuan,satuan,kategori_satuan,formula,sumber_target,tipe_kpi,tipe_target,frekuensi,polaritas,divisi,pemilik,eviden,syarat_ketentuan,kpi_parent)
      VALUE ( '$_POST[tid]',
              '$_POST[tdeskripsi]',
              '$_POST[tusulan_deskripsi]',
              '$_POST[tdefinisi]',
              '$_POST[ttujuan]',
              '$_POST[tsatuan]',
              '$_POST[tkategori]',
              '$_POST[tformula]',
              '$_POST[tsumber]',
              '$_POST[ttipe]',
              '$_POST[ttarget]',
              '$_POST[tfrekuensi]',
              '$_POST[tpolaritas]',
              '$_POST[tdivisi]',
              '$_POST[tpemilik]',
              '$_POST[teviden]',
              '$_POST[tsyarat]',
              '$_POST[tparent]')
  ");
  $simpan2 = mysqli_query($koneksi, "INSERT INTO tb_data2 (deskripsi2,definisi2,tujuan2,satuan2,kategori_satuan2,formula2,sumber_target2,tipe_kpi2,tipe_target2,frekuensi2,polaritas2,divisi2,pemilik2,eviden2,syarat_ketentuan2,kpi_parent2)
  VALUE ( '$_POST[tdeskripsi]',
          '$_POST[tdefinisi]',
          '$_POST[ttujuan]',
          '$_POST[tsatuan]',
          '$_POST[tkategori]',
          '$_POST[tformula]',
          '$_POST[tsumber]',
          '$_POST[ttipe]',
          '$_POST[ttarget]',
          '$_POST[tfrekuensi]',
          '$_POST[tpolaritas]',
          '$_POST[tdivisi]',
          '$_POST[tpemilik]',
          '$_POST[teviden]',
          '$_POST[tsyarat]',
          '$_POST[tparent]')
  ");




//uji jika simpan data sukses
if($simpan){
echo "<script>
alert('data berhasil disimpan!');
document.location='juknis-admin.php';
</script>";
} else{
echo "<script>
alert('Simpan data gagal');
document.location='juknis-admin.php'
</script>";
}
    }

    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data2 order by id_data asc");
            while($data = mysqli_fetch_array($tampil));
  }

  //deklarasi variabel untuk menampung data yang akan diedit
  $vid = "";
  $vdeskripsi = "";
  $vusulan_deskripsi = "";
  $vdefinisi = "";
  $vtujuan = "";
  $vsatuan = "";
  $vkategori_satuan = "";
  $vformula = "";
  $vsumber_target = "";
  $vtipe_kpi = "";
  $vtipe_target="";
  $vfrekuensi = "";
  $vpolaritas ="";
  $vdivisi = "";
  $vpemilik = "";
  $veviden = "";
  $vsyarat_ketentuan = "";
  $vkpi_parent = "";

  $vid2 = "";
  $vdeskripsi2 = "";
  $vusulan_deskripsi2 = "";
  $vdefinisi2 = "";
  $vtujuan2 = "";
  $vsatuan2 = "";
  $vkategori_satuan2 = "";
  $vformula2 = "";
  $vsumber_target2 = "";
  $vtipe_kpi2 = "";
  $vtipe_target2 ="";
  $vfrekuensi2 = "";
  $vpolaritas2 ="";
  $vdivisi2 = "";
  $vpemilik2 = "";
  $veviden2 = "";
  $vsyarat_ketentuan2 = "";
  $vkpi_parent2 = "";


  //jika tombol edit diedit/hapus
  if(isset($_GET['hal'])){
    //jika edit data
    if($_GET['hal'] == "edit"){
      //tampilkan data yang akan diedit


      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_data WHERE id_data = '$_GET[id]'");
      $tampil2=mysqli_query($koneksi, "SELECT * FROM tb_data2 WHERE id_data2 = '$_GET[id]'");

      $data = mysqli_fetch_array($tampil);
      $data2 = mysqli_fetch_array($tampil2);
      if($data){
        //jika data ditemukan, maka data ditampung kedalam variabel
        $vid = $data['id_data'];
        $vdeskripsi = $data['deskripsi'];
        $vusulan_deskripsi = $data['usulan_deskripsi'];
        $vdefinisi = $data['definisi'];
        $vtujuan = $data['tujuan'];
        $vsatuan = $data['satuan'];
        $vkategori_satuan = $data['kategori_satuan'];
        $vformula = $data['formula'];
        $vsumber_target = $data['sumber_target'];
        $vtipe_kpi = $data['tipe_kpi'];
        $vtipe_target = $data['tipe_target'];
        $vfrekuensi = $data['frekuensi'];
        $vpolaritas = $data['polaritas'];
        $vdivisi = $data['divisi'];
        $vpemilik = $data['pemilik'];
        $veviden = $data['eviden'];
        $vsyarat_ketentuan = $data['syarat_ketentuan'];
        $vkpi_parent = $data['kpi_parent'];
      }

      else if($data2){
        //jika data ditemukan, maka data ditampung kedalam variabel
        $vid2 = $data2['id_data2'];
        $vdeskripsi2 = $data2['deskripsi2'];
        $vusulan_deskripsi2 = $data2['usulan_deskripsi2'];
        $vdefinisi2 = $data2['definisi2'];
        $vtujuan2 = $data2['tujuan2'];
        $vsatuan2 = $data2['satuan2'];
        $vkategori_satuan2 = $data2['kategori_satuan2'];
        $vformula2 = $data2['formula2'];
        $vsumber_target2 = $data2['sumber_target2'];
        $vtipe_kpi2 = $data2['tipe_kpi2'];
        $vtipe_target2 = $data2['tipe_target2'];
        $vfrekuensi2 = $data2['frekuensi2'];
        $vpolaritas2 = $data2['polaritas2'];
        $vdivisi2 = $data2['divisi2'];
        $vpemilik2 = $data2['pemilik2'];
        $veviden2 = $data2['eviden2'];
        $vsyarat_ketentuan2 = $data2['syarat_ketentuan2'];
        $vkpi_parent2 = $data2['kpi_parent2'];
      }
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>log-data</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}


if (empty($_GET['hash'])){
  header("location:juknis-admin.php");
}

?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/Logo_PLNN.png" alt="PLNLOGO" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="superadmin.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php
           echo $_SESSION['username'];
          ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="keluar.php" class="dropdown-item">
          <i class="fa-solid fa-right-from-bracket"></i>
logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/Logo_PLNN.png" alt="PLNLOGO" class="brand-image img-rectangle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">For-Pi</span>
    </a>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php
         echo $_SESSION['username'];
          ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="superadmin.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
           <li class="nav-item  menu-open">
            <a href="juknis-superadmin.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Juknis</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="user-superadmin.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>

          </li>
           <li class="nav-item">
            <a href="tools-super.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Tools</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perubahan Data</h1>
          </div>
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="superadmin.php">Home</a></li>
              <li class="breadcrumb-item"><a href="juknis-superadmin.php">Juknis</a></li>
              <li class="breadcrumb-item active">Perubahan Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-striped table:hover table-bordered">
              <?php

            //persiapan menampilkan data
            $no = 1;
          // $tampil = mysqli_query($koneksi, "SELECT tb_data2.*,tb_data.* FROM tb_data2,tb_data LIMIT 10");

          $hash = $_GET['hash'];

          $tampil = mysqli_query($koneksi, "SELECT tb_data.*,tb_data2.* FROM tb_data INNER JOIN tb_data2 ON tb_data.is_updated = tb_data2.is_updated WHERE tb_data.is_updated= '$hash' AND tb_data.is_updated != ''");
          // Percepatan pemenuhan FTK Struktural SPV Dasar yang kosong pada UI kewenangan
          // Percepatan pemenuhan FTK Struktural SPV Dasar yang kosong pada UI kewenangan
          // var_dump($tampil);
          // die;

          // $tampill = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");

          while( $data = mysqli_fetch_array($tampil)):?>
            <tr>
            <?php
                    if ($data['usulan_deskripsi'] != $data['usulan_deskripsi2']) {
                      echo '<th align="left">'.'Usulan Deskripsi'.'</th>';
                      echo '<td>'. $data['usulan_deskripsi2'] .'</td>';
                      echo '<td>'. '<a href="detail-superadmin.php?hash='.$data['is_updated'].'" class="btn btn-info">' . 'Lihat Detail' . '</a>' .'</td>';
                    }
                    ?>
            </tr>

            <tr>


           <?php endwhile; ?>

            </table>

     <!--Akhir input data-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
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
