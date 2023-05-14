<?php
include("../../database/database/dbkoneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - Table</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Pena Bantu</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="#!">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Wahyu Rifda
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h3 class="mt-4">Update Produk</h3>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Produk > Update</li>
          </ol>
          <?php
          $id = $_GET['id'];
          $data = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN merk USING (merk_id) WHERE id = '$id'");
          $row1 = mysqli_fetch_array($data);
          $data2 = mysqli_query($conn, "SELECT * FROM merk");

          ?>
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form action="" method="POST">
                  <label for="">
                    <h6>Nama Produk</h6>
                  </label>
                  <input type="text" class="form-control mb-3" id="recipient-name" autocomplete="off" name="nama" value="<?php echo $row1['nama'] ?>">
                  <label for="">
                    <h6>Stok</h6>
                  </label>
                  <input type="text" class="form-control mb-3" id="recipient-name" autocomplete="off" name="stok" value="<?php echo $row1['stok'] ?>">
                  <label for="">
                    <h6>Harga</h6>
                  </label>
                  <input type="text" class="form-control mb-3" id="recipient-name" autocomplete="off" name="harga" value="<?php echo $row1['harga'] ?>">
                  <label for="">
                    <h6>Merk</h6>
                  </label>
                  <select name="merk" class="form-control mb-3" id="">
                    <?php
                    while ($row2 = mysqli_fetch_array($data2)) {
                    ?>
                      <option value="<?php echo $row2['merk_id'] ?>"><?php echo $row2['nama_merk'] ?></option>
                    <?php } ?>
                  </select>
                  <input type="submit" class="btn btn-sm btn-success mt-4" name="update" value="Update">
                </form>
                <?php
                if (isset($_POST['update'])) {
                  $nama = $_POST['nama'];
                  $stok = $_POST['stok'];
                  $harga = $_POST['harga'];
                  $merk = $_POST['merk'];
                  
                  $update = mysqli_query($conn, "UPDATE produk SET 
                  nama = '$nama',
                  stok = '$stok',
                  harga = '$harga',
                  merk_id = '$merk'
                  WHERE id = '$id'");                 

                  if($update){
                    echo '<script>window.location="index.php"</script>';
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>