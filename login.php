<?php
session_start();
require 'assets/db/dbConnect.php';
$conn = OpenCon();
$getUserSQL = "SELECT * FROM nhif_userdetails";
$getUserData = $conn->query($getUserSQL);
$loginErr="";
$newAcc = "";
if(isset($_POST['submit'])){
  $inputEmail = $_POST['emailaddress'];
  $inputPass = $_POST['password'];
  while ($rowUsers=$getUserData->fetch_assoc()) {
    if ($rowUsers['email']==$inputEmail) {
      if (password_verify($inputPass,$rowUsers['password'])) {
        $_SESSION['useridx'] = $rowUsers['userid'];
        $_SESSION['name'] = $rowUsers['name'];
        $_SESSION['email'] = $rowUsers['email'];
        $_SESSION['phone'] = $rowUsers['phonenumber'];
        $_SESSION['usertype'] = $rowUsers['usertype'];
        header("Location: register.php");
        die();
      }else {
      $loginErr = "Sorry but your credentials do not match our records";
    }
    }else {
    $loginErr = "Sorry but your credentials do not match our records";
  }
  }
}
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

  <title>Login - NHIF System</title>
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
                          <div class="card-header">Login Form</div>
                          <div class="card-body">
                              <form name="my-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <?php if (isset($_SESSION['newAccount'])) {
                                  if ($_SESSION['newAccount'] == 'TRUE') {
                                    $newAcc  = "Kindly Login to your New Account";
                                  }
                                } ?>
                                <?php echo $newAcc; ?>
                                  <div class="form-group row">
                                      <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                      <div class="col-md-6">
                                          <input type="text" id="email_address" class="form-control" name="emailaddress">
                                          <span style="color:red;font-size:13px;"><?php echo $loginErr; ?></span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                      <div class="col-md-6">
                                          <input type="password" id="password" name="password" class="form-control">
                                      </div>
                                  </div>
                                      <div class="col-md-6 offset-md-4">
                                          <button name="submit" id="submit" type="submit" class="btn btn-primary">
                                            Login
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
