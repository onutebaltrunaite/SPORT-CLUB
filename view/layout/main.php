<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./js/app.js"></script>
    <title>Sport Club</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-center">
            <div class="collapse navbar-collapse justify-content-around" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/">Home</a>
                    <a class="nav-link" href="/feedbacks">About Us</a>
                </div>
                <div class="navbar-nav">
                    <?php if(!\app\core\Session::isUserLoggedIn()) : ?>
                        <a class="nav-link" href="/login">Login</a>
                        <a class="nav-link" href="/register">Register</a>
                    <?php else : ?>   
                        <a class="nav-item nav-link disabled" href="#"><?php echo $_SESSION['user_name']; ?></a>
                        <a class="nav-link" href="/logout">Logout</a>
                    <?php endif; ?>   
                </div>
            </div>        
    </nav>

    <div class="content">
        {{content}}
    </div>

    <footer id="footer" class="py-4 bg-dark text-white-50" style="height: 70px;">
        <div class="cont text-center">
            <small> &copy; <?php echo date('Y');?>. Onute Baltrunaite, all rights reserved.</small>
        </div>
    </footer>


</body>
</html>