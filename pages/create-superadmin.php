<?php

//index.php


$connect = new PDO("mysql:host=localhost; dbname=kinerjapegawai", "root", "");

$query = "
SELECT divisi FROM tb_divisi
ORDER BY divisi ASC
";

$queri = "
SELECT pemilik FROM tb_pemilik
ORDER BY pemilik ASC
";

$result = $connect->query($query);
$resultt = $connect->query($queri);

$data = array();

foreach($result as $row)
{
    $data[] = array(
        'label'     =>  $row['divisi'],
        'value'     =>  $row['divisi']
    );
}

foreach($resultt as $row)
{
    $data[] = array(
        'label'     =>  $row['pemilik'],
        'value'     =>  $row['pemilik']
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
    //Data akan disimpan
    $tujuan2 = htmlspecialchars($_POST['ttujuan']);
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_data (deskripsi,definisi,tujuan,satuan,kategori_satuan,formula,sumber_target,tipe_kpi,tipe_target,frekuensi,polaritas,divisi,pemilik,eviden,syarat_ketentuan,kpi_parent)
                                      VALUE ( '$_POST[tdeskripsi]',
                                              '$_POST[tdefinisi]',
                                              '$tujuan2',
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
      document.location='juknis-superadmin.php';
      </script>";
    } else{
      echo "<script>
        alert('Simpan data gagal');
        document.location='juknis-superadmin.php'
      </script>";
    }
    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
            while($data = mysqli_fetch_array($tampil));
    $tampil2 = mysqli_query($koneksi, "SELECT * FROM tb_data2 order by id_data2 asc");
            while($data2 = mysqli_fetch_array($tampil));
  }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="../library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="../library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="../library/autocomplete.js"></script>
        <title>Typeahead Autocomplete using JavaScript in PHP for Bootstrap 5</title>
    </head>

    <?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}

	?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="juknis-admin.php" class="nav-link">Juknis</a>
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php
           echo $_SESSION['username'];
          ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="keluar.php" class="dropdown-item">
          <i class="fa-solid fa-door-open">logout</i>

          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
            <p>User</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="jabatan-superadmin.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Jabatan</p>
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


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header mx-auto">
                <h1>Input Data Karyawan</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <!--Input Data-->
        <form method="POST">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdeskripsi"></textarea>
    </div>
  </div>


  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Definisi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdefinisi"></textarea>
    </div>
  </div>


        <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tujuan KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ttujuan"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsatuan">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Kategori Satuan</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tkategori">
  <option selected disabled>Kategori Satuan</option>
  <?php
  $records = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
  while($data = mysqli_fetch_array($records)){
    echo "<option value='".$data['kategori_satuan']."'>".$data['kategori_satuan']."</option>";
  }
  ?>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Formula</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tformula"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Sumber Target</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsumber">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe KPI</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="ttipe">
  <option selected disabled>Tipe KPI</option>
  <?php
  $records = mysqli_query($koneksi, "SELECT * FROM tb_tipekpi");
  while($data = mysqli_fetch_array($records)){
    echo "<option value='".$data['tipe_kpi']."'>".$data['tipe_kpi']."</option>";
  }
  ?>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe Target</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="ttarget">
  <option selected disabled>Tipe Target</option>
  <?php
  $records = mysqli_query($koneksi, "SELECT * FROM tb_tipetarget");
  while($data = mysqli_fetch_array($records)){
    echo "<option value='".$data['tipe_target']."'>".$data['tipe_target']."</option>";
  }
  ?>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Frekuensi</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tfrekuensi">
  <option selected disabled>Frekuensi</option>
  <?php
  $records = mysqli_query($koneksi, "SELECT * FROM tb_frekuensi");
  while($data = mysqli_fetch_array($records)){
    echo "<option value='".$data['frekuensi']."'>".$data['frekuensi']."</option>";
  }
  ?>
</select>
</div>
  </div>


  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Polaritas</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tpolaritas">
  <option selected disabled>Polaritas</option>
  <?php
  $records = mysqli_query($koneksi, "SELECT * FROM tb_polaritas");
  while($data = mysqli_fetch_array($records)){
    echo "<option value='".$data['polaritas']."'>".$data['polaritas']."</option>";
  }
  ?>
</select>
</div>
  </div>

  <div class="row mb-3">
      <label for="" class="col-sm-2 col-form-label">Jabatan Pemilik KPI</label>
      <div class="col-sm-10">
          <input type="text" name="tdivisi" id="divisi" class="form-control"/>
      </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Pemilik KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tpemilik" id="pemilik">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Eviden</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="teviden"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Syarat & Ketentuan</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tsyarat"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">KPI Parent</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tparent"></textarea>
    </div>
  </div>
  <div class="text-center">
      <hr>
      <button class="btn btn-success" name="btn-simpan" type="submit">Save</button>
      <button class="btn btn-danger" name="btn-clear" type="reset">Clear</button>
     </div>
</form>
        </div>
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
<script>
var auto_complete = new Autocomplete(document.getElementById('divisi'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
});

var auto_pemilik = new Autocomplete(document.getElementById('pemilik'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
});

</script>
<script src="../library/autocomplete.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('tdefinisi');
  CKEDITOR.replace('ttujuan');
  CKEDITOR.replace('tformula');
  CKEDITOR.replace('teviden');
  CKEDITOR.replace('tsyarat');
  CKEDITOR.replace('tparent');
</script>
<script type="text/javascript">
$(function() {
    $('#your_textarea').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
CKEDITOR.config.autoParagraph = false;
</script>
</body>
</html>
