<?php

require("mail.php");

function validate($name, $email, $subject, $message, $form){

    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if(isset($_POST["form"])){

    if(validate(...$_POST)){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $body = "$name <$email> te envía el siguiente mensaje: <br><br>$message";

        // Mandar el correo.
        sendMail($subject, $body, $email, $name, true);


        $status = "success";
    } else {

        $status = "danger";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de contacto</title>
</head>

<body>

    <?php if($status == "danger"): ?>
        <div class="alert danger">
            <span>Surgió un problema</span>
        </div>
    <?php endif; ?>

    <?php if($status == "success"): ?>
        <div class="alert success">
            <span>Mensaje enviado con éxito</span>
        </div>
    <?php endif; ?>

    <form action="./" method="POST">
        <h1>Contáctanos</h1>

        <div class="input-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="input-group">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <div class="button-container">
            <button type="submit" name="form">Enviar</button>
        </div>

        <div class="contact-info">
            <div class="info">
                <span><i class="fa-solid fa-map"></i> 13 Saw Mill Circle, Nort Olmested.</span>
            </div>
            <div class="info">
                <span><i class="fa-solid fa-phone-volume"></i> +1 1234567890</span>
            </div>
        </div>
    </form>
    <script src="https://kit.fontawesome.com/669f321021.js" crossorigin="anonymous"></script>
</body>

</html>