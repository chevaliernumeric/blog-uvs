<?php
require_once __DIR__ . '/database/models/database.php';
$authDB = require_once './database/security.php';
$sessionId = $_COOKIE['session'];
if ($sessionId) {
    $authDB->logout($sessionId);
    header('Location:/auth-login.php');
}