<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strict</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">

    <!--Font-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type="text/css">

    <!--My CSS-->
    <!--<link rel="stylesheet" type="text/css" href="./css/style.css">-->
    <link rel="stylesheet" href="../scss/style.css">

    <!-- Javascript -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="../js/myjs.js"></script>

    <!--Media Query-->
    <!--<link rel="stylesheet" href="./css/mediaquery.css">-->
    <link rel="stylesheet" href="../scss/mediaquery.css">

    <!--Font awesome-->
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <style>

    </style>
</head>
<body>
<!-- HEADER -->
<header>
    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <a href="../index.php" class="navbar-brand">
                        <img src="../image/logo.png" alt="logo_item">
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- END HEADER-->
<div class="login-box col-xs-offset-4 col-xs-4 text-center " style="margin-top:40px">
    <div class="login-logo">
        <h2>STRICT LOGIN </h2>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <form action="" method="post">
            <?php
            include "PDO_Connection.php";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                session_start();

                $username = $_POST["username"];
                $password = $_POST["password"];

                $query = "	SELECT *
                        FROM users
                        WHERE user_name = '" .$username ."'
                                AND password = '" .$password ."'";

                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch();

                if($result == true)
                {
                    $_SESSION["LOGIN_USER"] = $result;
                    header("Location: admin.php");
                }
                else{
                    echo "<strong style= 'color:red'>Sai tài khoản hoặc mật khẩu</strong>";
                }
            }
            ?>
            <div class="form-group has-feedback">
                <input type="username" class="form-control" name="username" placeholder="username" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat" style="width: 60%;margin-left: 20%">Sign In</button>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>

</body>
</html>