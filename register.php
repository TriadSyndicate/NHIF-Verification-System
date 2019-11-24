<?php
session_start();
if (isset($_SESSION['usertype'])) {
  if ($_SESSION['usertype']=='HOSPITAL') {
    header('Location:hospital/index.php');
  }
  elseif ($_SESSION['usertype']=='NHIF') {
      header('Location:nhif/index.php');
    }

}
require './assets/db/dbConnect.php';
$conn = OpenCon();
$selectUserDetails = "SELECT * FROM nhif_userdetails";
$userDetails = $conn->query($selectUserDetails);
$emailArray = [];
$phoneArray = [];
while ($rowUsers = $userDetails->fetch_assoc()) {
  array_push($emailArray,$rowUsers["email"]);
  array_push($phoneArray,$rowUsers["phonenumber"]);
}
CloseCon($conn);
?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.11.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/hospital-100x100.png" type="image/x-icon">
  <meta name="description" content="">

  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body><br><br><br><br><br><br>
  <?php include 'header.php'; ?>
    <main class="my-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Registration Form</div>
                            <div class="card-body">
                                <form name="my-form" action="assets/db/insertuser.php" method="post">
                                    <div class="form-group row">
                                        <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="full_name" class="form-control" name="fullname">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email_address" class="form-control" name="emailaddress">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number (+254)</label>
                                        <div class="col-md-6">
                                            <input type="number" name="phonenumber" placeholder="07XX XXX XXX" maxlength="10" min="10" id="phone_number" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="present_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input type="password" id="confirmpassword" class="form-control" name="cpassword">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="selectionx" class="col-md-4 col-form-label text-md-right">Choose Admin Type</label>
                                        <div class="col-md-6">
                                            <select  id="selectionx" class="form-control" name="selectionx">
                                              <option>NHIF</option>
                                              <option>HOSPITAL</option>
                                            </select>
                                        </div>
                                    </div>

                                        <div class="col-md-6 offset-md-4">
                                            <button name="submit" id="submit" type="submit" class="btn btn-primary">
                                            Register
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


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/theme/js/script.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#submit").on('click', function(e){
      var email = $("#email_address").val();
      var pass = $("#password").val();
      var cpass = $("#confirmpassword").val();
      var phone = $("#phone_number").val();

          if (email=='<?php foreach($emailArray as $key => $value){echo "$value";}?>') {
          alert('Email has already been Taken!');
          e.preventDefault();
          return false;
      }
      if (phone=='<?php foreach($phoneArray as $key => $value){echo "$value";}?>') {
      alert('Phone Number has already been used to register');
      e.preventDefault();
      return false;
  }
        if (pass!=cpass) {
            alert("Passwords Must Match");
           e.preventDefault();
            return false;
        }

    });
  });
  </script>
</body>
</html>
