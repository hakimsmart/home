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

    if(trim(empty($_POST['password_confirmation'])))
    {
        echo $errors['password_confirmationError'] = 'Password confirmation is empty';

    }

    if ($_POST['password']  != $_POST['password_confirmation'])

    {
        echo $errors['passwordError'] = 'Password does not match';
    }




    if(empty($errors))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $result = $con->prepare("SELECT * FROM users WHERE username=?");
        $result->execute([$username]);
        if ($result->rowCount() == 0)
        {
            $query = $con->prepare("INSERT INTO  users (username,password) VALUES (?,?)");
            $query->execute([$username,$password]);

            header('Location: login.php');
            exit;
        }else
        {
            $errors['systemError'] = 'User already exists';
        }
    }
}

?>

<!DOCTYPE html>
<head>
    
    <title>Register</title>
    
        <body>

        <img src="home.jpeg" alt="Image" style="position: absolute; top: 0; left: 0; width: 135px; height: auto;">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        form {

            max-width: 400px;
            margin: 230px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            border: 0.5px  solid #9fa0a4;
        }

        button {
            background-color: #9fa0a4;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 1em;
            border-radius: 3px;
            width: 150px; 
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
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <h2>Register</h2>
        <?php  echo isset($errors['systemError']) ? "<p class='error'>".$errors['systemError']."</p>" : '';  ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" >
        <?php  echo isset($errors['usernameError']) ? "<p class='error'>".$errors['usernameError']."</p>" : '';  ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <?php  echo isset($errors['passwordError']) ? "<p class='error'>".$errors['passwordError']."</p>" : '';  ?>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" >
        <?php  echo isset($errors['password_confirmationError']) ? "<p class='error'>".$errors['password_confirmationError']."</p>" : '';  ?>

        <button type="submit">Register</button>
    </form>
</body>
</html>
