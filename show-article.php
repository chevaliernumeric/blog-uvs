<?php
require_once './database/models/database.php';
$autDB = require_once './database/security.php';
$articleDB = require_once __DIR__ . './database/models/ArticleDB.php';
require_once './database/security.php';
$currentUser = $autDB->isLoggedIn();


$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
if (!$id) {
    header('Location: /');
} else {
    $article = $articleDB->fetchOne($id);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="/public/css/show-article.css">
    <title>Article</title>
</head>

<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="article-container">
                <a class="article-back" href="/">Retour à la liste des articles</a>
                <div class="article-cover-img" style="background-image:url(<?= $article['image'] ?>)"></div>
                <h1 class="article-title"><?= $article['title'] ?></h1>
                <div class="separator"></div>
                <p class="article-content"><?= $article['content'] ?></p>
                <p class="article-author"><?= $article['firstname'] . ' ' . $article['lastname'] ?></p>
                <?php if ($currentUser && $currentUser['id'] === $article['author']) : ?>
                    <div class="form-actions">
                        <a href="/delete.php?id=<?= $article['id'] ?>" class="btn btn-secondary">Supprimer</a>
                        <a href="/form-article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Editer</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php' ?>
    </div>

</body>

</html>