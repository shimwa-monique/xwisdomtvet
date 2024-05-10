<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .dashboard-links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .dashboard-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-header">
            <h1>Welcome to Admin Dashboard</h1>
        </div>
        <div class="dashboard-links">
            <a href="add_trade.php">Add Trade</a>
            <a href="add_trainee.php">Add Trainee</a>
            <a href="add_marks.php">Add Marks</a>
            <a href="nyc.php">Not Competent</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
