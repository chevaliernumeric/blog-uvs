<?php
require_once './database/models/database.php';
$authDB = require_once __DIR__ . './database/security.php';
$currentUser = $authDB->isLoggedIn();
$articleDB = require_once __DIR__ . './database/models/ArticleDB.php';

if ($currentUser) {

    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = $_GET['id'] ?? '';
    if (!$id) {
        $article = $articleDB->fetchOne($id);
        if ($article['author'] === $currentUser['id']) {

            $articleDB->deleteOne($id);
        }
    }
}
header('Location: /');
