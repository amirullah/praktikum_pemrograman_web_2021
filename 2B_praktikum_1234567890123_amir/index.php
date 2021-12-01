<?php
date_default_timezone_set('America/New_York');
$d = date("D");
$date = date("d:m:Y H:i:s");
if ($d == "Mon") {
    $d = "Senin";
    echo "Selamat belajar <br>";
} else
    echo "Ini hari $d <br>";

echo $d . " " . $date;
