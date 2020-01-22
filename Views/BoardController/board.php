<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role']) and !isset($_SESSION['name']) and !isset($_SESSION['surname']) and !isset($_SESSION['email'])) {
    die('You are not logged in!');
}

if (!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/board.css"/>
    <script src="https://kit.fontawesome.com/d97e416d7e.js" crossorigin="anonymous"></script>
    <title>ParkingPlanner</title>
</head>
<body>
<div class="container">

    <div class="topnavbar">
        <nav class="navbar navbar-dark">
            <a class="nav-link" href="?page=logout">
                <i class="fas fa-sign-out-alt">Logout</i>
            </a>
            <img src="../../Public/img/smallLogo.svg" alt="small logo">
            <div class="buttons">
                <i class="fas fa-user"></i>
                <i class="fas fa-bell"></i>
            </div>
        </nav>
    </div>


    <div class="main">
        <div class="leftnavbar">
            <nav class="navbar navbar-dark">
                <div class="optionButtons">
                    <div class="button">
                        <input class="check" name="fadsfasd" type="checkbox">
                        Search bar
                    </div>
                    <div class="button">
                        <input class="check" name="fadsfasd" type="checkbox">
                        Only free spots
                    </div>
                    <div class="button">
                        <input class="check" name="fadsfasd" type="checkbox">
                        Show traffic
                    </div>
                    <div class="button">
                        <i class="fas fa-heart"></i> Favourite places
                    </div>
                    <div class="button">
                        <i class="far fa-calendar-alt"></i> History
                    </div>
                    <div class="button">
                        <i class="fas fa-star"></i> Bonus Points
                    </div>
                    <div class="button">
                        <i class="fas fa-bell"></i> Notifications
                    </div>
                    <div class="button">
                        <i class="fas fa-user"></i> Account
                    </div>
                    <div class="button">
                        <i class="fas fa-shopping-bag"></i> Payments
                    </div>
                    <div class="button">
                        <i class="fas fa-cog"></i> General Settings
                    </div>
                    <div class="button">
                        <i class="fas fa-th-large" style="color: black;"></i> Dark Mode
                    </div>
                    <div class="button">
                        <i class="fas fa-question-circle"></i> Help
                    </div>
                    <div class="button">
                        <i class="fas fa-info-circle"></i> About us
                    </div>
                </div>
            </nav>
        </div>


        <div class="mainmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.828905932636!2d19.941378785044556!3d50.07076578262722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b04a4a0d5bf%3A0x41a815e1860a19eb!2sPolitechnika%20Krakowska%20im.%20Tadeusza%20Ko%C5%9Bciuszki!5e0!3m2!1spl!2spl!4v1579598779340!5m2!1spl!2spl"
                    width="1400" height="750" style="border:0;" allowfullscreen=""></iframe>
        </div>

    </div>

    <div class="foot">
        <nav class="navbar navbar-dark">
            ParkingPlannerFooter
            <div class="buttons">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fas fa-ellipsis-v"></i>
            </div>
        </nav>
    </div>

</div>
</body>