<?php
require 'vendor/autoload.php';

try {
    $uri = 'mongodb+srv://pathaniadeepti05_db_user:deepti123@storerecipies.abmmaim.mongodb.net/recipe?retryWrites=true&w=majority&appName=storeRecipies&tlsInsecure=true';    $m = new MongoDB\Client($uri);
    $dbs = $m->listDatabases();
    foreach ($dbs as $db) {
        echo $db->getName() . PHP_EOL;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
