<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../../Public/css/register.css"/>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/common.css"/>

    <title>Register</title>
</head>
<body>

<div class="container">

    <form action="?page=register" method="POST" id="register">
        <div id="registerform">
            <div class="step">
                <h1>Step I</h1>
                <h1>Give us Your personal data</h1>
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <div class="formreg">
                    <input name="email" type="email" required placeholder="email@email.com">
                    <input name="password1" type="password" required placeholder="password">
                    <input name="password2" type="password" required placeholder="repeat password">
                    <input name="name" type="text" required placeholder="John">
                    <input name="surname" type="text" required placeholder="Smith">
                    <input name="phoneNumber" type="tel" required placeholder="555-555-555">
                </div>

            </div>

            <div class="step">
                <h1>Step II</h1>
                <h1>Give us Your car details</h1>

                <div class="formreg">
                    <input name="plateNumber" type="text" required placeholder="plate number">
                    <input name="brand" type="text" required placeholder="brand">
                    <input name="model" type="text" required placeholder="model">
                </div>

            </div>

            <div class="step">
                <h1>Step III</h1>
                <h1>Give us Your payment details</h1>

                <div class="formreg">
                    <input name="cardNumber" type="text" required placeholder="card number">
                    <input name="cardholderName" type="text" required placeholder="cardholder name">
                    <input name="expireDate" type="text" required placeholder="expire date">
                    <input name="CVV" type="password" required placeholder="cvv">
                    <button type="submit">CONTINUE</button>
                </div>

            </div>

        </div>
    </form>


</div>
</body>
