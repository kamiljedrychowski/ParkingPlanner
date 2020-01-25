<?php

if (!isset($_SESSION['id']) and !isset($_SESSION['role']) and !isset($_SESSION['name']) and !isset($_SESSION['surname']) and !isset($_SESSION['email'])) {
    die('You are not logged in!');
}

if ($_SESSION['role'] !== 'ROLE_ADMIN') {
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
    <script src="../../Public/js/swapDivsWithClick.js"></script>
    <script src="../../Public/js/app.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <title>ParkingPlanner</title>
</head>
<body>
<div class="container">

    <div class="topnavbar">
        <nav class="navbar navbar-dark">
            <div class="buttons">
                <a class="nav-link" href="?page=logout">
                    <i class="fas fa-sign-out-alt">Logout</i>
                </a>
                <a class="nav-link" href="?page=board">
                    <i class="fas fa-user-cog">Normal Panel</i>
                </a>
            </div>
            <img src="../../Public/img/smallLogo.svg" alt="small logo">
            <div class="buttons">
                <i class="fas fa-user"></i>
                <i class="fas fa-bell"></i>
            </div>
        </nav>
    </div>


    <div class="m">
        <button class="btn btn-dark btn-lg" type="button" onclick="getUsers()">Get all
            users
        </button>
        <div class="row">
            <h1 class="col-12 pl-0">ADMIN PANEL</h1>
            <h4 class="mt-4">Your data:</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Points</th>
                    <th>Plate Numbers</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $user->getId(); ?></td>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getName(); ?></td>
                    <td><?= $user->getSurname(); ?></td>
                    <td><?= $user->getPoints(); ?></td>
                    <td><?= $user->getPlatenumber(); ?></td>
                    <td><?= $user->getRole(); ?></td>
                    <td>-</td>

                </tr>
                </tbody>
                <tbody class="users-list">
                </tbody>
            </table>
        </div>


    </div>

    <div class="foot">
        <nav class="navbar navbar-dark">
            ParkingPlanner
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