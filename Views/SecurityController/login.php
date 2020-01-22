<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/style.css"/>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/common.css"/>

    <title>ParkingPlanner</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <script src="../../Public/js/swapDivsWithClick.js"></script>

</head>

<body>

<div class="container">
    <div class="logo">
        <img src="../../Public/img/logo.svg" alt="Logo">
        <img src="../../Public/img/welcomeText.svg" alt="welcomeText">
    </div>

    <div class="rightBox" id="rightBox1">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../Public/img/entryMap.svg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>1. Plan your travel</h1>
                        Parking Planner is the first application <br>
                        that will allow you to plan a parking <br>
                        space for your car. <br>
                        You will save time and fuel! <br>
                        What is more… You will save nature! <br>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../Public/img/entryPhoto.svg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>2. Find perfect spot</h1>
                        Wherever you go, <br>
                        You can reserve parking spot. <br>
                        You don't need to worry <br>
                        how much time you'll need to find free one. <br>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="buttonSwap">
            <button type="submit" onclick="SwapDivsWithClick('rightBox1', 'rightBox2')">CONTINUE</button>
        </div>
    </div>

    <div class="rightBox" id="rightBox2" style="display: none;">
        <h1>Do You have an account?</h1>
        <h2>Sign in!</h2>
        <div id="loginform">
            <form action="?page=login" method="POST" id="login">
                <div class="messages">
                    <?php
                    if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">CONTINUE</button>
            </form>
        </div>
        <h3>You are new?</h3>
        <h3>Create free account!</h3>
        <h3>It's wort it!</h3>
        <div class="buttonSwap">
            <a href="?page=register">
                <button type="submit">REGISTER</button>
            </a>
        </div>
    </div>

</div>
</body>