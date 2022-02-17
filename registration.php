<!--- реєстрація користувача --->
<?php
    session_start();
    if (!empty($_SESSION['user'])) {
        header('Location: profile_user.php');
    }
?>
<html>
    <head>
        <title></title>
        <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,500,400,600' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/strock-icon.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body background="images/bg1.png">
        <div style="height: 150px;"> <?php require_once("header.php");?></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h2 class="text-center" style="color: #ffffff;">Реєстрація</h2>
                <div style="height: 25px;"></div>
                <form method="POST" action="registration.php">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6">
                            <h3 style="color: #ffffff;">Логін: <input type="text" name="login" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                            <h3 style="color: #ffffff;">Пароль: <input type="password" name="pass1" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                            <h3 style="color: #ffffff;">Повторіть пароль: <input type="password" name="pass2" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3> 
                            <h3 style="color: #ffffff;">Ім'я: <input type="text" name="name" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3> 
                            <h3 style="color: #ffffff;">Сайт: <input type="text" name="site" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3> 
                            <h3 style="color: #ffffff;">Телефон: <input type="text" name="phone" style="border: 1px solid #ffffff; border-radius: 20px; background-color: #282828; color: white;"></h3>
                            <input type="submit" name="reg" value="Зареєструватись" style="border: 1px solid #ffffff; border-radius: 30px; background-color: #e0e0e0; font-size: 20px;"><br><br>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['reg'])){
                        $login=$_POST['login'];
                        $pass1=$_POST['pass1'];
                        $pass2=$_POST['pass2'];
                        $name=$_POST['name'];
                        $site=$_POST['site'];
                        $phone=$_POST['phone'];
                        if($pass1==$pass2){
                            $sql="INSERT INTO user (name, login, password, phone, site,  favourites) VALUES ('$name', '$login', '$pass1', '$phone', '$site',  ' ')";
                            $res=mysqli_query($connect,$sql);
                            $sql1="SELECT id FROM user WHERE login='$login'";
                            $res1=mysqli_query($connect,$sql1);
                            $result=mysqli_fetch_array($res1);
                            $_SESSION['user'] = ['id' => $result['id'], 'login' => $login];
                        } else {
                            echo '<h3 style="color: #ffffff;">Паролі не співпадають!</h3>';
                        }
                    }
                ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </body>
</html>