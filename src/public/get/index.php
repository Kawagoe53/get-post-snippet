<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=sample; charset=utf8mb4',
    $dbUserName,
    $dbPassword
);

if (isset($_GET['search_query'])) {
    $title = '%' . $_GET['search_query'] . '%';
    $contents = '%' . $_GET['search_query'] . '%';
} else {
    $title = '%%';
    $contents = '%%';
}

$query = 'SELECT * FROM samples WHERE contents LIKE :contents';
$stmt = $pdo->prepare($query);
$stmt->bindValue(':contents', $contents, PDO::PARAM_STR);
$stmt->execute();
$posts = $stmt->fetchAll();
?>

<body>

  <h1>問題2解答</h1>

  <a href = "../index.php">戻る</a>

  <div>
  <span>---------------------------------------------------------------------------------------------------<span>
    <p>⓵下記の仕様になるようにお問合せフォームのコードを修正しましょう</p>
    <li>仕様: 検索ボタンをクリックすると、検索ワードが含まれるもののみ表示されます</li>
    <span>---------------------------------------------------------------------------------------------------</span>

    <p>②下記のお問合せフォームでgetまたはpost送信にした方が良い理由を答えましょう</p> 
    <p>
      今回の場合はget送信が良いです。<br>
      検索によって表示結果(取得するもの)を変える場合は、getを使用します。<br>
      例えば、get送信だと下記のように検索ワードをパラメータとして渡すことができます。<br>
      http://localhost:8080/get/index.php/?検索ワード<br>
      このように検索ワードをパラメータとして渡すことで、このURLを共有するだけで、同じ表示結果を見ることができます。<br>
      もし、post送信にした場合、毎回検索しないと同じ結果を表示できないです。<br>
    </p> 
    <span>---------------------------------------------------------------------------------------------------</span>
  </div>

  <div>
    <a href="./create.php">追加</a><br>
  </div>

  <form action="index.php" method="get">
      <input name="search_query" type="text" value="<?php echo $_GET[
          'search_query'
      ] ?? ''; ?>" placeholder="キーワードを入力" />
      <input type="submit" value="検索" />
  </form>

  <div>
    <table border="1">
      <tr>
        <th>内容</th>
        <th>作成日時</th>
      </tr>

      <?php foreach ($posts as $post): ?>
        <tr>
          <td><?php echo $post['contents']; ?></td>
          <td><?php echo $post['created_at']; ?></td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>

</body>
