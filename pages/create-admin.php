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
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_data (deskripsi,definisi,tujuan,satuan,kategori_satuan,formula,sumber_target,tipe_kpi,tipe_target,frekuensi,polaritas,divisi,pemilik,eviden,syarat_ketentuan,kpi_parent)
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
    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
            while($data = mysqli_fetch_array($tampil));
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
		header("location:login.php?pesan=gagal");
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
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
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
          <a href="#" class="d-block">Alexander Pierce</a>
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
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>            
           <li class="nav-item  menu-open">
            <a href="juknis-admin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Juknis</p>
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
  <option value="Jumlah">Jumlah</option>
  <option value="Persentase">Persentase</option>
  <option value="Rupiah">Rupiah</option>
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
  <option value="EXACT">EXACT</option>
  <option value="PROXY">PROXY</option>
  <option value="ACTIVITY">ACTIVITY</option>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe Target</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="ttarget">
  <option selected disabled>Tipe Target</option>
  <option value="Akumulatif">Akumulatif</option>
  <option value="Non Akumulatif">Non Akumulatif</option>
</select>
</div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Frekuensi</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tfrekuensi">
  <option selected disabled>Frekuensi</option>
  <option value="Bulanan">Bulanan</option>
  <option value="Triwulan">Triwulan</option>
  <option value="Semesteran">Semesteran</option>
</select>
</div>
  </div>
  

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Polaritas</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="tpolaritas">
  <option selected disabled>Polaritas</option>
  <option value="POSITIF">POSITIF</option>
  <option value="NEGATIF">NEGATIF</option>
  <option value="RANGE">RANGE</option>
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
</body>
</html>