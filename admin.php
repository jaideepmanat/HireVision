<?php
session_start();
include("php/config.php");

// Check if user is logged in and is admin
if (!isset($_SESSION['email']) || $_SESSION['email'] != 'manatjaideep@gmail.com') {
    header("Location: login.php");
    exit();
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $con->prepare("DELETE FROM user_details WHERE user_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: admin.php");
            exit();
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $con->error;
    }
}

// Fetch all users
$result = mysqli_query($con, "SELECT user_id, name, email FROM user_details");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
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
        flex-direction: column;
        align-items: center;
        padding: 20px;
      }
      .header {
        position: relative;
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
      }
      .header h1 {
        color: white;
        font-size: 2em;
        margin: 10px 0;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      }
      .signout {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 10px 20px;
        border: 2px solid transparent;
        background-color: purple;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
      }
      .signout:hover {
        background-color: transparent;
        color: white;
        border-color: white;
      }
      .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
      }
      .form-container {
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 80%;
        max-width: 1000px;
        position: relative;
      }
      .form-container:hover {
        background: rgba(255, 255, 255, 0.9);
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      table, th, td {
        border: 1px solid #ddd;
      }
      th, td {
        padding: 10px;
        text-align: left;
      }
      th {
        background-color: purple;
        color: white;
      }
      button.delete-button {
        background-color: purple;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
      }
      button.delete-button:hover {
        background-color: darkpurple;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Page</h1>
            <button class="signout" onclick="location.href='signout.php'">Sign Out</button>
        </div>
        <div class="form-wrapper">
            <div class="form-container">
                <h2>User Details</h2>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <form action="admin.php" method="get" style="display: inline;">
                                <input type="hidden" name="delete" value="<?php echo htmlspecialchars($row['user_id']); ?>">
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
