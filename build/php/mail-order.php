<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // access
        $secretKey = '6LfturoUAAAAACJH8MsOmREM27he9hfcpp2xBYsE';
        $captcha = $_POST['g-recaptcha-response'];

        # FIX: Replace this email with recipient email
        $mail_to = "sales.novachats@gmail.com";
        #$mail_to = "vovakotik34@ukr.net";

        $nameSite = "order-novachats@com";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["firstname"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $orderlist = trim($_POST["orderlist"]);
        $ordertotal = trim($_POST["ordertotal"]);
        $orderops = trim($_POST["orderops"]);
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        
        
        if (empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone)){# OR intval($responseKeys["success"]) !== 1) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            exit;
        }
        
        
        # Mail Content
        
        $content = "Имя: $name\n";
        $content .= "Почта: $email\n";
        $content .= "Номер телефона: $phone\n";
        $content .= "Мессенжеры: $orderlist\n";
        $content .= "Цена: $ordertotal\n";
        if (isset($_POST['orderops']) && !empty($_POST['orderops']) ) {
            $content .= "Доп.Операторы: $orderops\n";
        }

        # email headers.
        //$headers = "From: $name <dev-chats.novait@com.ua>";
        $headers = "Content-type:text/plain; charset = utf-8\r\nFrom:$nameSite"."\r\n";
        $subject = '=?utf-8?B?'.base64_encode('Новый заказ от клиента').'?=';

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);              
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
