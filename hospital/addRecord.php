<?php
require '../assets/db/dbConnect.php';
$conn = OpenCon();
session_start();
if (isset($_POST['submit'])) {
  $name = $_POST['fullname'];
  $dob = $_POST['dob'];
  $treat = $_POST['treatment'];
  $imageName = time().'_'.$_FILES['imgUpload']['name'];

  $target = 'images/' . $imageName;
  move_uploaded_file($_FILES['imgUpload']['tmp_name'], $target);

  $sqlIn = "INSERT INTO hospital(full_names,DateOfBirth,imageUpload,treatment) VALUES('$name','$dob','$imageName','$treat')";
  $conn->query($sqlIn);
}
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

                  <div class="card">
                      <div class="card-header">Add Hospital Record</div>
                      <div class="card-body">
                          <form name="my-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-group row">
                                  <label for="fullname" class="col-md-4 col-form-label text-md-right">Full Names</label>
                                  <div class="col-md-6">
                                      <input required type="text" id="fullname" class="form-control" name="fullname">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="dob" class="col-md-4 col-form-label text-md-right">Date Of Birth</label>
                                  <div class="col-md-6">
                                      <input type="date" id="dob" name="dob" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="treatment" class="col-md-4 col-form-label text-md-right">Patient Treatment</label>
                                  <div class="col-md-6">
                                      <input required type="textarea" id="treatment" class="form-control" name="treatment">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="imgUpload" class="col-md-4 col-form-label text-md-right">Upload Image</label>
                                  <div  class="col-md-6">
                                      <input type="file" id="imgUpload" name="imgUpload" class="form-control">
                                  </div>
                              </div>
                                  <div class="col-md-6 offset-md-4">
                                      <button name="submit" id="submit" type="submit" class="btn btn-primary">
                                        Add
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>

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
</body>
</html>
