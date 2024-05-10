<?php 
include"db/db_connect.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users where UserName='$username' AND Password='$password'";
    $result = mysqli_query($connect_db, $query);
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['username']= $username;
        header("location: admin/index.php");
    }else{
        echo "user is not logged in";
    }
    

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container form div {
            margin-bottom: 15px;
        }

        .login-container form input[type="text"],
        .login-container form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .login-container a:hover {
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
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if(isset($_GET['error'])) { ?>
            <div class="error-message"><?php echo $_GET['error']; ?></div>
        <?php } ?>
        <form action="" method="post">
            <div>
                <input type="text" name="username" required placeholder="Username">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div>
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <a href="signup.php">Sign up</a>
    </div>
</body>
</html>
