<?php

$cookieName = "visits";


if (isset($_COOKIE[$cookieName])) {
    $visits = $_COOKIE[$cookieName] + 1;
} else {
    $visits = 1;
}


setcookie($cookieName, $visits, time() + 3600);

echo "Número de visitas: $visits";
?>

