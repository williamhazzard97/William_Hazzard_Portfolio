<?php

    $captcha;
    if(isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }

    $secretKey = "6LfDKqsaAAAAAEkzVTeZEr-lJt41LwWMslSsDA0h";

    $ip = $_SERVER['REMOTE_ADDR'];

    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);

    $response = file_get_contents($url);

    $responseKeys = json_decode($response,true);

    if($responseKeys["success"]) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $email_from = 'williamhazzard.co.uk';

        $email_subject = "New Form Submission - williamhazzard.co.uk";

        $email_body =   "Hi William, \n".
                            "$message \n".
                                "From: $name \n".
                                    "Email: $email \n";

        $to = "williamhazzard67@gmail.com";

        mail($to,$email_subject,$email_body);

        header("Location: /index.html");
    }

    else {
        echo '<h2>Verification Failed - Please check the box.</h2>';
    }
   

?>