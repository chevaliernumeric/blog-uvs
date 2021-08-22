<?php
$dns = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$pwd = 'H@kkufr@mwork12*';

try {
    //code...
    $pdo = new PDO($dns, $user, $pwd, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    //throw $th;
    throw new Exception($e->getMessage());
}

return $pdo;
