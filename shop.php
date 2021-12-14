<?php
require 'Functions/bdd.php';
require 'Functions/functions.php';
session_start();
$template = "shop";
$title = "SHOP";
$chart = true;
// $_SESSION['chart'] = [];
$req = $pdo->prepare("select * from articles;");
$req->execute();
$results = $req->fetchAll(PDO::FETCH_ASSOC);
if (isset($_GET['article'])) {
    $requete = $pdo->prepare("select * from articles where code=:code");
    $requete->bindValue(':code', htmlspecialchars($_GET['article']));
    $requete->execute();
    $res = $requete->fetchAll(PDO::FETCH_ASSOC);
    $articleV1 = $res[0];
    $article = recuperationArticle($articleV1);
    $template = "oneShop";
} else if (isset($_SESSION["email"], $_GET['delete']) && $_SESSION['email'] === 'mounzei@outlook.fr') {
    $requete = $pdo->prepare("delete from articles where code=:code");
    $requete->bindValue(':code', htmlspecialchars($_GET['delete']));
    $requete->execute();
    header("Location: shop.php");
}
include 'index.phtml';
