<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // access
        $secretKey = '6LfturoUAAAAACJH8MsOmREM27he9hfcpp2xBYsE';
        $captcha = $_POST['g-recaptcha-response'];

        # FIX: Replace this email with recipient email
        $mail_to = "sales@novabots.ai";
        $nameSite = "contact-novabots@novabots.ai";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["firstname"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        
        
        if (empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL)){
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            exit;
        }
        
        
        # Mail Content
        
        $content = "Имя: $name\n";
        $content .= "Почта: $email\n";
        $content .= "Сообщение: $message\n";

        # email headers.
        //$headers = "From: $name <dev-chats.novait@com.ua>";
        $headers = "Content-type:text/plain; charset = utf-8\r\nFrom:$nameSite"."\r\n";
        $subject = '=?utf-8?B?'.base64_encode('Новый заказ от клиента').'?=';

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);              
            # header("Location:/en/thank-you");
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
        }
    //}

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
    }

?>
