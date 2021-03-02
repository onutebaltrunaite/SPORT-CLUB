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

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
<!-- <a class="navbar-brand" href="#">Gym <strong>Plus++</strong> <i class="fas fa-dumbbell"></i></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/about">About Us</a>
            <!-- <a class="nav-link" href="/contact">Contact</a> -->
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


<div class="container">
    {{content}}
</div>




<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>



    <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom">
        <div class="container text-center">
            <small> &copy; <?php echo date('Y');?>. Onute Baltrunaite, all rights reserved.</small>
        </div>
    </footer>


</body>
</html>