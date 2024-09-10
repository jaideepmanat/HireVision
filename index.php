<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to HireVision</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url("background.jpg") no-repeat center center fixed;
      background-size: cover;
    }

    .container {
      position: relative;
      width: 100%;
      height: 100%;
      background: linear-gradient(rgba(128, 0, 128, 0.5), rgba(128, 0, 128, 0.5));
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column; /* Center content vertically */
    }

    .header {
      width: 100%;
      text-align: center;
      margin-bottom: 20px; /* Adds space between header and content */
    }

    .header h1 {
      color: white;
      font-size: 2em;
      margin: 10px 0;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .header .logo {
      font-family: 'Lucida Console', Monaco, monospace; /* Apply Lucida Console font to HireVision */
      font-weight: bold; /* Make HireVision text bold */
    }

    .content-container {
      background: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 550px; /* Increased width for more space */
      text-align: center;
      line-height: 1.6;
    }

    .content-container:hover {
      background: rgba(255, 255, 255, 0.9);
    }

    .content-container h2 {
      color: purple;
    }

    .content-container p {
      color: black;
      margin-top: 20px;
      font-size: 1.1em;
      font-family: 'Montserrat', Arial, sans-serif;
      text-align: justify;
      text-justify: inter-word; /* Ensures proper justification */
    }

    .content-container .logo {
      font-family: 'Lucida Console', Monaco, monospace; /* Apply Lucida Console font to HireVision in paragraph */
      font-weight: bold; /* Make HireVision text in paragraph bold */
    }

    .button-group {
      margin-top: 30px;
    }

    .button {
      margin: 10px;
      padding: 10px 20px;
      border: 2px solid transparent;
      background-color: purple;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }

    .button:hover {
      background-color: transparent;
      color: purple;
      border-color: purple;
    }

    .button-secondary {
      background-color: purple;
      color: white;
      border: 2px solid purple;
    }

    .button-secondary:hover {
      background-color: transparent;
      color: purple;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Welcome to </span><span class="logo">HireVision</span></h1>
    </div>
    <div class="content-container">
      <h2>About Our Service</h2>
      <p>
        Welcome to <span class="logo">HireVision</span>, your personalized gateway to career success! Enter your age, gender, academic stream, internship experience, CGPA, residential status, and academic standing to uncover tailored predictions about your job placement prospects. Our advanced algorithms crunch the numbers based on industry trends and historical data, empowering you with valuable insights to steer your career journey confidently. Whether you're gearing up for interviews or planning your next academic move, let <span class="logo">HireVision</span> illuminate the path to your professional dreams. Discover your potential today!
      </p>
      <div class="button-group">
        <a href="login.php" class="button">Login</a>
        <a href="signup.php" class="button button-secondary">Sign Up</a>
      </div>
    </div>
  </div>
</body>
</html>
