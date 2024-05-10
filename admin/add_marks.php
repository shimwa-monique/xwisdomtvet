
<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location: ../index.php?error= 😁 You are trying to hack us!');
}

include "../db/db_connect.php";

if(isset($_POST['add_marks'])){
    $trainee_id = $_POST['trainee_id'];
    $trade_id = $_POST['trade_id'];
    $module_name = $_POST['module_name'];
    $formative_assessment = $_POST['formative_assessment'];
    $sumative_assessment = $_POST['sumative_assessment'];
    $total_marks = $formative_assessment + $sumative_assessment;

    $query = "INSERT INTO marks VALUES('$module_name', '$formative_assessment', '$sumative_assessment','$total_marks','$trainee_id','$trade_id')";
    $result = mysqli_query($connect_db, $query);
    if($result){
        header("location: add_marks.php?success= Marks added successfully.");
    }else{
        header("location: add_marks.php?error=Marks is not added.");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
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

        select,
        input[type="text"],
        input[type="number"] {
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
        <h1>Add Marks</h1>
        <form action="" method="post">
            <div>
                <select name="trainee_id" required>
                    <?php 
                    $query = "SELECT * FROM trainess";
                    $result = mysqli_query($connect_db, $query);
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['trainee_id'] ?>"><?php echo $row['frirstName'].' '.$row['lastName']?></option>
                    <?php 
                    }
                    ?>
                </select>
            </div>
            <div>
                <select name="trade_id" required>
                    <?php
                    $query = "SELECT * FROM trade";
                    $result = mysqli_query($connect_db, $query);
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['trade_id']?>"><?php echo $row['trade_name'] ?></option>
                    <?php 
                    }
                    ?>
                </select>
            </div>    
            <div>
                <input type="text" name="module_name" required placeholder="Module name">
            </div>
            <div>
                <input type="number" step="any" max="50" name="formative_assessment" required placeholder="Formative assessment">
            </div>
            <div>
                <input type="number" step="any" max="50" name="sumative_assessment" required placeholder="Summative assessment">
            </div>
            <div>
                <input type="submit" name="add_marks" value="Add Marks">
            </div>
        </form>
        <a href="index.php">Home</a>
    </div>
</body>
</html>
