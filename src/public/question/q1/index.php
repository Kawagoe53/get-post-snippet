<body>

  <h1>問題1</h1>
  <a href = "../../index.php">トップへ</a>

  <div>
  <span>---------------------------------------------------------------------------------------------------<span>
    <p>⓵下記の仕様になるようにお問合せフォームのコードを修正しましょう</p>
    <li>仕様1: 送信ボタンをクリックすると、post.phpに遷移する</li>
    <li>仕様2: 送信ボタンをクリックすると、post.phpにデータが送られる</li>
    <span>---------------------------------------------------------------------------------------------------</span>

    <p>②下記のお問合せフォームでgetまたはpost送信にした方が良い理由を答えましょう</p> 
    <span>---------------------------------------------------------------------------------------------------</span>
  </div>

  <h2>お問い合わせフォーム</h1>
  <form action="post.php" method="post">
    <table>
      <tr>
        <td>タイトル：</td>
        <td><input name="title"></td>
      </tr>

      <tr>
        <td>メールアドレス：</td>
        <td><input name="email"></td>
      </tr>

      <tr>
        <td>お問い合わせ内容：</td>
        <td><textarea name="content"></textarea></td>
      </tr>

      <tr>
        <td></td>
        <td><button type="submit" name="button">送信</button></td>
      </tr>

    </table>

  </from>
</body>
