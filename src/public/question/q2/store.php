<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=sample; charset=utf8mb4',
    $dbUserName,
    $dbPassword
);

$content = filter_input(INPUT_POST, 'contents');
$sql = 'INSERT INTO `samples`(`contents`) VALUES(:contents)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':contents', $content, PDO::PARAM_STR);
$statement->execute();

header('Location: ./index.php');
exit();

