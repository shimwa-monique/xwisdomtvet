<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('location: ../index.php?error= 😁 You are trying to hack us!');
}

include("../db/db_connect.php");
if(isset($_POST['add_trade'])){
    $trade_name = $_POST['trade_name'];
    $query = "INSERT INTO trade VALUES('','$trade_name')";
    $result = mysqli_query($connect_db, $query);
    if($result == true){
       header("location: add_trade.php?success= Trade is created succesfully");
    }else{
       header("location: add_trade.php?error= Trade is created succesfully");

    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trade</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form div {
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            width: 100%;
            background-color: #ff4d4d;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 15px;
        }

        .success-message {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if(isset($_GET['error'])) { ?>
            <div class="error-message"><?php echo $_GET['error']; ?></div>
        <?php } ?>
        <?php if(isset($_GET['success'])) { ?>
            <div class="success-message"><?php echo $_GET['success']; ?></div>
        <?php } ?>

        <h1>Add Trade</h1>
        <form action="" method="post">
            <div>
                <input type="text" name="trade_name" required placeholder="Trade name">
            </div>
            <div>
                <input type="submit" name="add_trade" value="Add Trade">
            </div>
        </form>

        <a href="index.php">Home</a>
    </div>
</body>
</html>
