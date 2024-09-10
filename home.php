<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Placement Prediction</title>
    <link rel="stylesheet" href="styles3.css" />
    <style>
      /* styles3.css */
.loader-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 9999; /* Ensure it is above all other elements */
  display: flex;
  justify-content: center;
  align-items: center;
}

.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


    </style>
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
              <li><a href="profile.php">View Profile</a></li>
              <li><a href="signout.php">Sign Out</a></li>
            </ul>
          </div>
        </div>
        <h1>Predict Your Future Now!</h1>
      </div>
      <div class="form-wrapper">
        <div class="form-container">
          <div class="form-group">
            <label for="age">Age:</label>
            <input
              type="number"
              id="age"
              name="age"
              required
              placeholder="Enter your age"
            />
          </div>
    </br>
          <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
              <option value="" selected disabled>Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
    </br>
          <div class="form-group">
            <label for="stream">Stream:</label>
            <select id="stream" name="stream" required>
              <option value="" selected disabled>Select</option>
              <option value="Electronics And Communication">Electronics And Communication</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Mechanical">Mechanical</option>
              <option value="Civil">Civil</option>
              <option value="Information Technology">Information Technology</option>
              <option value="Electrical">Electrical</option>
            </select>
          </div>
    </br>
          <div class="form-group">
            <label for="internships">Number of Internships:</label>
            <input
              type="number"
              id="internships"
              name="internships"
              required
              placeholder="Enter the number of internships"
            />
          </div>
    </br>
          <div class="form-group">
            <label for="cgpa">CGPA:</label>
            <input
              type="number"
              id="cgpa"
              name="cgpa"
              step="0.01"
              required
              placeholder="Enter your CGPA"
            />
          </div>
    </br>
          <div class="form-group">
            <label for="hostel">Do you live in a hostel?</label>
            <select id="hostel" name="hostel" required>
              <option value="" selected disabled>Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
    </br>
          <div class="form-group">
            <label for="backpapers">Do you have any back papers?</label>
            <select id="backpapers" name="backpapers" required>
              <option value="" selected disabled>Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
    </br>
          <button id="predictBtn">Predict Now!</button>
    </br>
    </br>
          <div id="loaderOverlay" class="loader-overlay" style="display: none;">
            <div class="loader"></div>
          </div>
          <div id="predictionResult"></div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
    <script>
      document.getElementById("predictBtn").addEventListener("click", function() {
        var age = document.getElementById("age").value;
        var gender = document.getElementById("gender").value;
        var stream = document.getElementById("stream").value;
        var internships = document.getElementById("internships").value;
        var cgpa = document.getElementById("cgpa").value;
        var hostel = document.getElementById("hostel").value;
        var backpapers = document.getElementById("backpapers").value;

        var loaderOverlay = document.getElementById("loaderOverlay");
        var predictionResult = document.getElementById("predictionResult");

        loaderOverlay.style.display = "flex"; // Show the overlay loader
        predictionResult.innerHTML = ""; // Clear previous results

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            loaderOverlay.style.display = "none"; // Hide the overlay loader
            if (xhr.status === 200) {
              predictionResult.innerHTML = xhr.responseText;
            } else {
              console.log("Error:", xhr.status);
            }
          }
        };

        xhr.open("POST", "predict.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("age=" + age + "&gender=" + gender + "&stream=" + stream + "&internships=" + internships + "&cgpa=" + cgpa + "&hostel=" + hostel + "&backpapers=" + backpapers);
      });
    </script>
  </body>
</html>
