<?php
session_start();
if (empty($_SESSION['username']))
{
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>

<head>
    <title>NIDPS</title>
    <body>

        <img src="home.jpeg" alt="Image" style="position: absolute; top: 0; left: 0; width: 135px; height: auto;">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        header {
            background-color: #292b2c;
            color: #fff;
            text-align: center;
            padding: 2em;
            font-size: .8em;
        }

        nav {
            background-color: #00294a;
            color: #fff;
            text-align: center;
            padding: 0.5em;
            font-size: 1em;
        }

        nav a {
            text-decoration: none;
            color: #ffffff;
            margin: 0 10px;
        }

        section {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        footer {
            background-color: #292b2c;
            color: #fff;
            text-align: left;
            padding: 1em;
            position: fixed;
            bottom: 0%;
            width: 100%;           
}
footer img {
            width: 80px;
            height: auto;
        }


        h2 {
            color: #292b2c;
        }

        ul {
            list-style: none;
            padding: 1em
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
        .image-container {
            text-align: center;
        }

        
    </style>
</head>

<body>

    <header>
        <h1>PROTECT YOUR HOME WITH SAFE HOME </h1>
    </header>




    <nav>
        <a href="index.php">Home</a>
        <a href="notification.php">Notifications</a>
        <a href="logout.php">Logout</a>
    </nav>

    <section>
        <article>
            <h2>Our Services</h2>
            <ul>
                <li><a href="devices.php">Devices</a></li>
            </ul>
        </article>
    </section>

    <footer>
        <div class="image-container">
            <img src="home.jpeg" alt= "SAFE HOME">
        </div>
        <div>
            Customers Service : 966+ 50 800 2413 <br>
            Email : Mazenxg3@gmail.com <br>
        </div>
        
    </footer>
    
</body>

</html>
