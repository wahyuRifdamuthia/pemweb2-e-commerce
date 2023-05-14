<?php
require('../../database/database/dbkoneksi.php');
  if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM produk WHERE id = '" . $_GET['id'] . "'");
    echo '<script>window.location="index.php"</script>';
  }
