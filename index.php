<?php
require_once "./vendor/autoload.php";
require_once "./model/Database.php";
require_once "./model/Liste_resto.php";
$db = new Database();

$dbConnection = $db->initDatabase();
$restoListe = new Liste_resto($dbConnection);

if (isset($_GET["p"])) {
    $p = $_GET["p"];
} else {
    $p = "home";
}

ob_start();
if ($p != "base" && !strpos($p, ".") && !strpos($p, "/") && file_exists("./vue/" . $p . ".php")) {
    require "./vue/" . $p . ".php";
} else {
    require "./vue/404.php";
}
$content = ob_get_clean();
require "./vue/base.php";
