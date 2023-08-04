<?php
$title = filter_input(INPUT_POST, 'title');
$email = filter_input(INPUT_POST, 'email');
$content = filter_input(INPUT_POST, 'content');

$errors = [];
if(empty($title)||empty($email)||empty($content)){
  $errors[] = '「タイトル」「email」「お問い合わせ内容」のどれかが記入されていません!';
}

$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO(
  "mysql:host=mysql; dbname=contactform; charset=utf8", 
  $dbUserName, 
  $dbPassword
); 

$stmt = $pdo->prepare("INSERT INTO contacts (
	title, email, content
) VALUES (
	:title, :email, :content
)");

$stmt->bindParam( ':title', $title, PDO::PARAM_STR);
$stmt->bindParam( ':email', $email, PDO::PARAM_STR);
$stmt->bindParam( ':content', $content, PDO::PARAM_STR);
$res = $stmt->execute();

?>

<body>
  <h1>お問い合わせ内容</h1>
  <p>タイトル　→　<?php echo $title; ?></p>
  <p>メールアドレス　→　<?php echo $email; ?></p>
  <p>お問い合わせ内容　→　<?php echo $content; ?></p>

  <a href = "./index.php">戻る</a>
</body>