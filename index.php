<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrtap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="./img/login-circle.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form action="./php/login.php" method="POST">
                <input type="text" id="user" class="fadeIn second" name="user" placeholder="User/Email">                
                <input type="password" id="pwd" class="fadeIn third" name="pwd" placeholder="Contrasenya">                
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="./index.php?pwd=norem">Forgot Password?</a>                
            </div>         

        </div>
    </div>

</body>

