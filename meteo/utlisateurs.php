<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $data = json_encode(array(
                "username" => $username,
                "password" => $password,
                "email"    => $email
        ));
        var_dump($data);

        if ($username != "" && $password != "" && $email != "") {
            $testReq = curl_init();
            curl_setopt($testReq, CURLOPT_URL, "localhost:5000/users");
            curl_setopt($testReq, CURLOPT_POST, TRUE); // remove body
            curl_setopt($testReq, CURLOPT_POSTFIELDS, $data);
            curl_setopt($testReq, CURLOPT_RETURNTRANSFER, TRUE);
            curl_exec($testReq);
            curl_close($testReq);
            
            /*
            $request = new HttpRequest("localhost:5000/users", HTTP_METH_POST);
            $request->setRawPostData($data);
            $request->send();
            */
        }
    }



?><!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style_meteo.css">
	<title>Connection</title>
</head>
<body>

    <form method="post" action="#">
        Username : <input type="text" name="username"><br>
        Password : <input type="text" name="password"><br>
        Email : <input type="text" name="email"><br>
        <button type="submit">Se Connecter</button>
    </form>

</body>
</html>