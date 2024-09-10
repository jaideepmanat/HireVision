<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="styles3.css" />
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="logo">
        <a href="index.php"><img src="back2.png" height="50px" width="50px" /></a>
      </div>
      <h1>Login to Your Account</h1>
    </div>
    <div class="form-wrapper">
      <div class="form-container">
        <?php 
          include("php/config.php");
          session_start();

          if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = hash('sha256', $_POST['password']); // Hash the password using SHA-256

            if ($email == 'manatjaideep@gmail.com' && $_POST['password'] == '12345') {
              $_SESSION['email'] = $email;
              header("Location: admin.php");
            } else {
              $result = mysqli_query($con, "SELECT * FROM user_details WHERE email = '$email' AND password = '$password'");
              
              if(mysqli_num_rows($result) == 1){
                $_SESSION['email'] = $email;
                header("Location: home.php");
              } else {
                echo "Invalid email or password!";
              }
            }
          }
        ?>
        <h2>Login</h2>
        <br />
        <form action="" method="post">
          <div class="input-row">
            <div class="input-container">
              <input type="text" id="email" name="email" required />
              <label for="email" class="label">Enter Email</label>
              <div class="underline"></div>
            </div>
            <div class="input-container">
              <input type="password" id="password" name="password" required />
              <label for="password" class="label">Enter Password</label>
              <div class="underline"></div>
            </div>
          </div>
          <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
      </div>
    </div>
  </div>
</body>
</html>
