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

  <h1>問題2</h1>

  <a href = "../../index.php">トップへ</a>

  <div>
  <span>---------------------------------------------------------------------------------------------------<span>
    <p>⓵下記の仕様になるようにお問合せフォームのコードを修正しましょう</p>
    <li>仕様: 検索ボタンをクリックすると、検索ワードが含まれるもののみ表示されます</li>
    <span>---------------------------------------------------------------------------------------------------</span>

    <p>②下記のお問合せフォームでgetまたはpost送信にした方が良い理由を答えましょう</p> 
    <span>---------------------------------------------------------------------------------------------------</span>
  </div>

  <div>
    <a href="./create.php">追加</a>
    <span> ← データはこちらから追加しましょう(DBとテーブルはコードを見て自身で作成してください)</span>
  </div>

  <form action="top.php" method="">
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
