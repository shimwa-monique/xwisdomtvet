<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NYC Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>NYC Table</h1>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Trade Name</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include("../db/db_connect.php");
                $query = "SELECT trade.trade_name, trainess.frirstName, trainess.lastName, marks.total_marks FROM trade LEFT JOIN trainess ON trade.trade_id = trainess.trade_id LEFT JOIN marks ON marks.trade_id = trade.trade_id HAVING marks.total_marks < 70";
                $result = mysqli_query($connect_db, $query);

                while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['frirstName'] ?></td>
                        <td><?php echo $row['lastName'] ?></td>
                        <td><?php echo $row['trade_name'] ?></td>
                        <td><?php echo $row['total_marks'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
