<?php
session_start();
if (empty($_SESSION['username']))
{
    header('Location: login.php');
    exit;
}

require 'inc/connect.php';

$result =  $con->query('SELECT * FROM notifications LIMIT 10')
?>

<!DOCTYPE html>
<html lang="">
<head>
    
    <title>Notification</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #292b2c;
            color: #fff;
            text-align: center;
            padding: 1em;
            font-size: 1.5em;
        }
        nav { 
            background-color: #001f3f;
            color: #ffffff;
            text-align: center;
            padding: 1em;
            font-size: 1.5em;
        }
        nav a {
            text-decoration:none;
            color: #ffffff;
        }
        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 2em;
        }

        .item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 1em;
            margin: 1em;
            width: 200px;
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
        }
        .text-red{
            color: red;
        }
    </style>
</head>





<body>

    <header>
        <h1>Notification</h1>
    </header>



    <nav>
        <a href="index.php">Home</a>
        <a href="notification.php">Notifications</a>
        <a href="logout.php">Logout</a>
    </nav>
    

   

    <section>
        <?php if ($result->rowCount() > 0){ ?>
        <table style="width:100%">
        <tr>
            <th>alert</th>
            <th>date</th>
        </tr>
            <?php while ($row = $result->fetch()){ ?>
        <tr>
            <td><?php echo $row['alert']?></td>
            <td><?php echo $row['date']?></td>
        </tr>
            <?php } ?>
        </table>
        <?php }else{

            echo "<h1 class='text-red'>There are no notifications</h1>";
        } ?>
    </section>



</body>

</html>
