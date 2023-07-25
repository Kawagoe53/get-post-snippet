<?php
$title = filter_input(INPUT_POST, 'title');
$email = filter_input(INPUT_POST, 'email');
$content = filter_input(INPUT_POST, 'content');
?>

<body>
  <h1>お問い合わせ内容</h1>
  <p>タイトル　→　<?php echo $title; ?></p>
  <p>メールアドレス　→　<?php echo $email; ?></p>
  <p>お問い合わせ内容　→　<?php echo $content; ?></p>

  <a href = "./index.php">戻る</a>
</body>