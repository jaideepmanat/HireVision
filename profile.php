<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Profile</title>
    <link rel="stylesheet" href="styles3.css" />
  </head>
  <body>
  <?php 
      session_start();
      if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
      }
      include("php/config.php");
      $email = $_SESSION['email'];
      $result = mysqli_query($con, "SELECT name FROM user_details WHERE email = '$email'");
      if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
      } else {
        // Handle the error appropriately
        $name = "User";
      }
    ?>
    <div class="container">
      <div class="header">
        <div class="profile-info">
          <div class="profile-icon">
            <img src="profile-icon.png" alt="Profile Icon" />
          </div>
          <span class="username"><?php echo $name; ?></span>
          <div class="dropdown-menu">
            <ul>
              <li><a href="home.php">Predict Now!</a></li>
              <li><a href="signout.php">Sign Out</a></li>
            </ul>
          </div>
        </div>
        <h1>Your Profile</h1>
      </div>
      <div class="profile-wrapper">
        <div class="profile-container">
          <div class="profile-icon-large">
            <img src="profile-icon.png" alt="Profile Icon" />
          </div>
          <div class="profile-section">
            <label>Name:</label>
            <span><?php echo $name; ?></span>
          </div>
          <div class="profile-section">
            <label>Email:</label>
            <span><?php echo $email; ?></span>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
