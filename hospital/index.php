<?php
require '../assets/db/dbConnect.php';
$conn = OpenCon();
$getUserSQL = "SELECT * FROM hospital";
$nhifData = $conn->query($getUserSQL);
session_start();
CloseCon($conn);
 ?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../assets/images/hospital-100x100.png" type="image/x-icon">
  <meta name="description" content="">

  <title>NHIF - Dashboard</title>
  <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/tether/tether.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/theme/css/style.css">
  <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<body><br><br><br><br><br><br>
  <?php include 'header.php'; ?>
    <main class="my-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                  <table id="table_id" class="display">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Full Names</th>.
                          <th>Date Of Birth</th>
                          <th>Treatment</th>
                          <th>Image Upload</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($rownhif = $nhifData->fetch_assoc()){ ?>
                      <tr>
                          <td><?php echo $rownhif['id']; ?></td>
                          <td><?php echo $rownhif['full_names']; ?></td>
                          <td><?php echo $rownhif['DateOfBirth']; ?></td>
                          <td><?php echo $rownhif['treatment']; ?></td>
                          <td> <img src="images/<?php echo $rownhif['imageUpload']; ?>" style="width:10%;"> </td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>

                </div>
                </div>
            </div>
        </div>

    </main>


  <script src="../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../assets/popper/popper.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/tether/tether.min.js"></script>
  <script src="../assets/smoothscroll/smooth-scroll.js"></script>
  <script src="../assets/dropdown/js/nav-dropdown.js"></script>
  <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="../assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="../assets/parallax/jarallax.min.js"></script>
  <script src="../assets/theme/js/script.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" charset="utf-8"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
  $(document).ready( function () {
  $('#table_id').DataTable();
} );
  </script>
</body>
</html>
