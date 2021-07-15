<?php

$error = '';
$email = '';

function clean_text($string)
{
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  return $string;
}

if (isset($_POST["submit"])) {

  if (empty($_POST["email"])) {
    $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
  } else {
    $email = clean_text($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error .= '<p><label class="text-danger">Invalid email format</label></p>';
    }
  }

  if ($error == '') {
    $file_open = fopen("xHV~SDWX/mailing_list/mailing_list.csv", "a");
    $no_rows = count(file("xHV~SDWX/mailing_list/mailing_list.csv"));
    if ($no_rows > 1) {
      $no_rows = ($no_rows - 1) + 1;
    }
    $form_data = array(
      'sr_no'  => $no_rows,
      'email'  => $email,
    );

    fputcsv($file_open, $form_data);
    $error = '<label class="text-success">Thank you, we will keep you updated !</label>';
    $email = '';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="We give your company that extra edge it needs!" />
  <meta name="keywords" content="Saas, Software, Automation" />
  <meta name="author" content="iRUN Technology" />
  <meta name="email" content="info@irunauto.com" />
  <meta name="website" content="https://irunauto.com" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>iRUN:HRM | Coming soon</title>
</head>

<body>

  <section class="whole">

    <div class="content">
      <h1><span class="logo"><img src="img/logo.png" alt="Irun" style="width: 100px;"></h1>
      <h2>We are building something awesome. Follow us for Updates now!</h2>
      <div class="form">
        <form method="post">
          <label class="alert"><?php echo $error; ?></label><br>
          <input id="email" name="email" type="email" placeholder="Email" required>
          <input type="submit" name="submit" class="btn btn-success" value="Submit" />
        </form>
      </div>
      <p class="small">We promise to never spam you.</p><br>
      <span class="greece">iRUN <i class="fas fa-heart"></i> you</span>
      <div class="social-icons">
        <a href="https://web.facebook.com/irunhq" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/irun_hq" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/irun_hq/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com/company/irun-technology/" target="_blank"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </section>

</body>
<!-- Import jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="javascript/index.js"></script>

</html>