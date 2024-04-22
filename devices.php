<?php

session_start();
if (empty($_SESSION['username']))
{
    header('Location: login.php');
    exit;
}
require 'inc/functions.php';

$inputs = shell_exec('lsusb');
$devices = explode('Bus', $inputs);

$camera = isDeviceConnected($devices, "camera name");
$device = ($camera ? "connected" : "disconnected");

?>
<!DOCTYPE html>

<head>
    <title>Devices</title>

    <body>

        <img src="home.jpeg" alt="Image" style="position: absolute; top: 0; left: 0; width: 135px; height: auto;">
    
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
            background-color: #002245;
            text-align: center;
            padding: 1%;
            font-size:x-large;
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
            text-decoration:double; 
            background-color: rgb(255, 255, 255);
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 1em;
            margin: 1em;
            width: 390px;
            text-align: center;
            font-size: large;
        }
        .connected{
            background: #00ff2d;
            display: inline-block;
            padding: 7px;
            border-radius: 14px;
        }
        .disconnected
        {
            background: #ff0000;
            color: #fff;
            display: inline-block;
            padding: 7px;
            border-radius: 14px;
        }
    </style>




</head>

<body>

<header> 
    <h1>Devices</h1>
</header>


<nav>
    <a href="index.php">Home</a>
    <a href="notification.php">Notifications</a>
    <a href="logout.php">Logout</a>
</nav>
   


    <section>
        <div class="item">
            <img src="cameraimg.jpeg"  height="400">
            <div>
                <h2>CAMERA</h2>
                <p class="<?php echo $device?>"><?php echo $device?></p>
            </div>
        </div>

    </section>


</body>

</html>
