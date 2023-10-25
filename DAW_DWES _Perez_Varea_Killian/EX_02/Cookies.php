<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? "";
    $language = $_POST["language"] ?? "";


    setcookie("username", $username, time() + 3600);
    setcookie("language", $language, time() + 3600);


    header("Location: index.php");
    exit();
}


header("Location: index.php");
exit();
?>
