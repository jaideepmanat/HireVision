<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles3.css" />
    <script>
      function validateForm() {
        const password = document.getElementById("password").value;
        const cpassword = document.getElementById("cpassword").value;
        if (password !== cpassword) {
          alert("Passwords do not match.");
          return false;
        }
        return true;
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <a href="index.php">
          <img src="back2.png" height="50px" width="50px" />
        </a>
      </div>
      <div class="header">
        <h1>Create a New Account</h1>
      </div>
      <div class="form-wrapper">
        <div class="form-container">
          <?php 
            include("php/config.php");
            $accountCreated = false;
            if(isset($_POST['submit'])){
              $name = $_POST['name'];
              $email = $_POST['email'];
              $password = hash('sha256', $_POST['password']); // Hash the password using SHA-256

              $verify = mysqli_query($con, "SELECT email FROM user_details WHERE email = '$email';");
              if(mysqli_num_rows($verify) != 0){
                echo "<p>Email already in use!</p>";
              } else {
                mysqli_query($con, "INSERT INTO user_details(name, email, password) VALUES('$name', '$email', '$password');") or die("Error occurred");
                $accountCreated = true;
              }
            }
          ?>

          <?php if($accountCreated): ?>
            <p>Account Created Successfully</p>
            <a href="login.php"><button>Login</button></a>
          <?php else: ?>
            <h2>Sign Up</h2>
            <br />
            <form action="" method="post" onsubmit="return validateForm()">
              <div class="input-row">
                <div class="input-container">
                  <input type="text" id="name" name="name" required />
                  <label for="name" class="label">Enter Name</label>
                  <div class="underline"></div>
                </div>
                
                <div class="input-container">
                  <input type="email" id="email" name="email" required />
                  <label for="email" class="label">Enter Email</label>
                  <div class="underline"></div>
                </div>
              </div>
              
              <div class="input-row">
                <div class="input-container">
                  <input type="password" id="password" name="password" required />
                  <label for="password" class="label">Enter a Password</label>
                  <div class="underline"></div>
                </div>
                <div class="input-container">
                  <input type="password" id="cpassword" name="cpassword" required />
                  <label for="cpassword" class="label">Confirm Password</label>
                  <div class="underline"></div>
                </div>
              </div>
              <button type="submit" name="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </body>
</html>
