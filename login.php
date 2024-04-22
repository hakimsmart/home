<?php 
session_start();
if (isset($_SESSION['username']))
{
    header('Location: index.php');
    exit;
}


require 'inc/connect.php';


$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if(trim(empty($_POST['username'])))
    {
         $errors['usernameError'] = 'Username is empty';
        
    }

    if(trim(empty($_POST['password'])))
    {
         $errors['passwordError'] = 'Password is empty';
        
    }

    if(empty($errors))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $con->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $query->execute([$username,$password]);
        if ($query->rowCount() > 0)
        {
        $_SESSION['username'] = $username;

        header('Location: index.php');
        exit;
        }else
        {
           $errors['systemError'] = 'The username or password is incorrect';
        }
    }
}

?>

<!DOCTYPE html>

<head>
       <body>

        <img src="home.jpeg" alt="Image" style="position: absolute; top: 0; left: 0; width: 135px; height: auto;">

    <title>Sign In</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
        }
        nav { 
            color: #ffffff;
            text-align: center;
            padding: 1em;
            font-size: 1em;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #9fa0a4;
            border: none;
            padding: 10px;
            font-size: 1em;
            border-radius: 4px;
            width: 200px;
        }
        button a {
            text-decoration: none; 
            color: #ffffff;
        
        }

        button:hover {
            background-color: #2dad33;
        }

        .error
        {
            background: #d50101;
            color: #fff;
            padding: 3px;
            border-radius: 10px;
        }
    </style>
</head>


<body>

    

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php  echo isset($errors['systemError']) ? "<p class='error'>".$errors['systemError']."</p>" : '';  ?>

        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        <?php  echo isset($errors['usernameError']) ? "<p class='error'>".$errors['usernameError']."</p>" : '';  ?>

        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <?php  echo isset($errors['passwordError']) ? "<p class='error'>".$errors['passwordError']."</p>" : '';  ?>
        <button type="submit">Sign In</button>
    
        
        <nav>
            <a href='register.php'>Register</a>
        </nav>
    </form>

   


</body>
</html>
