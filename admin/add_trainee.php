<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../index.php?error= 😁 You are trying to hack us!');
}

include "../db/db_connect.php";

if (isset($_POST['add_trainee'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $trade_id = $_POST['trade_id'];

    $query = "INSERT INTO trainess VALUES('','$fname','$lname','$gender','$trade_id')";
    $result = mysqli_query($connect_db, $query);
    if ($result == true) {
        header("location: add_trainee.php?success= Trainee is added successfully");
    } else {
        header("location: add_trainee.php?error= Trainee is not added successfully");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add trainee</title>
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

        input[type="text"],
        select {
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
    </style>
</head>

<body>
    <div class="container">
        <?php include("message.php"); ?>
        <h1>Add Trainee</h1>
        <form action="" method="post">
            <div>
                <input type="text" name="fname" required placeholder="First name">
            </div>
            <div>
                <input type="text" name="lname" placeholder="Last name">
            </div>
            <div>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                <select name="trade_id">
                    <?php
                    $query = "SELECT * FROM trade";
                    $result = mysqli_query($connect_db, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['trade_id'] ?>"><?php echo $row['trade_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" name="add_trainee" value="Add Trainee">
            </div>
        </form>
        <a href="index.php">Home</a>
    </div>
</body>

</html>
